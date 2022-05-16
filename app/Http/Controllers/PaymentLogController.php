<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;
use App\Models\PaymentLog;
use App\Models\Wallet;
use App\Models\Payment;
use App\Models\BookingPriority;
use App\Models\Coupon;
use App\Models\CouponUsage;
use Auth;
use Session;

class PaymentLogController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        //$this->middleware('auth'); // later enable it when needed user login while payment
    }

    // start page form after start
    public function pay() {
        return view('pay');
    }

    public function handleonlinepay(Request $request) {
        $input = $request->input();
        
        /* Create a merchantAuthenticationType object with authentication details
          retrieved from the constants file */
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName(env('MERCHANT_LOGIN_ID'));
        $merchantAuthentication->setTransactionKey(env('MERCHANT_TRANSACTION_KEY'));

        // Set the transaction's refId
        $refId = 'ref' . time();
        $cardNumber = preg_replace('/\s+/', '', $input['cardNumber']);
        
        // Create the payment data for a credit card
        $creditCard = new AnetAPI\CreditCardType();
        $creditCard->setCardNumber($cardNumber);
        $creditCard->setExpirationDate($input['expiration-year'] . "-" .$input['expiration-month']);
        $creditCard->setCardCode($input['cvv']);

        // Add the payment data to a paymentType object
        $paymentOne = new AnetAPI\PaymentType();
        $paymentOne->setCreditCard($creditCard);

        // Create a TransactionRequestType object and add the previous objects to it
        $transactionRequestType = new AnetAPI\TransactionRequestType();
        $transactionRequestType->setTransactionType("authCaptureTransaction");
        $transactionRequestType->setAmount($input['amount']);
        $transactionRequestType->setPayment($paymentOne);

        // Assemble the complete transaction request
        $requests = new AnetAPI\CreateTransactionRequest();
        $requests->setMerchantAuthentication($merchantAuthentication);
        $requests->setRefId($refId);
        $requests->setTransactionRequest($transactionRequestType);

        // Create the controller and get the response
        $controller = new AnetController\CreateTransactionController($requests);
        $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);

        if ($response != null) {
            // Check to see if the API request was successfully received and acted upon
            if ($response->getMessages()->getResultCode() == "Ok") {
                // Since the API request was successful, look for a transaction response
                // and parse it to display the results of authorizing the card
                $tresponse = $response->getTransactionResponse();

                if ($tresponse != null && $tresponse->getMessages() != null) {
//                    echo " Successfully created transaction with Transaction ID: " . $tresponse->getTransId() . "\n";
//                    echo " Transaction Response Code: " . $tresponse->getResponseCode() . "\n";
//                    echo " Message Code: " . $tresponse->getMessages()[0]->getCode() . "\n";
//                    echo " Auth Code: " . $tresponse->getAuthCode() . "\n";
//                    echo " Description: " . $tresponse->getMessages()[0]->getDescription() . "\n";
                    $message_text = $tresponse->getMessages()[0]->getDescription().", Transaction ID: " . $tresponse->getTransId();
                    $msg_type = "success_msg";    
                    
                    $model = PaymentLog::create([                                         
                        'amount' => $input['amount'],
                        'response_code' => $tresponse->getResponseCode(),
                        'transaction_id' => $tresponse->getTransId(),
                        'auth_id' => $tresponse->getAuthCode(),
                        'message_code' => $tresponse->getMessages()[0]->getCode(),
                        'name_on_card' => trim($input['owner']),
                        'quantity'=>1
                    ]);

                    if($model){
                        $priority = BookingPriority::where('id', $request->priority_id)->first();
                        $coupon_id = '';
                        $sub_total = '';
                        $discount = '';
                        $grand_total = '';
                        if(Session::has('used_coupon')){
                            $used_coupon = Session::get('used_coupon');
                            $coupon_id = Coupon::where('coupon_code', $used_coupon['coupon_code'])->first()->id;
                            $sub_total = $used_coupon['sub_total'];
                            $discount = $used_coupon['discount'];
                            $grand_total = $used_coupon['sub_total']-$used_coupon['discount'];
                        }else{
                            $sub_total = $priority->price;
                            $grand_total = $priority->price;
                        }

                        $payment = Payment::create([
                            'candidate_id' => Auth::user()->id,
                            'payment_log_id' => $model->id,
                            'priority_id' => $request->priority_id,
                            'coupon_id' => $coupon_id,
                            'sub_total' => $sub_total,
                            'discount' => $discount,
                            'grand_total' => $grand_total,
                            'date' => date('Y-m-d'),
                        ]);

                        if(!empty($coupon_id)){
                            $coupon_used = CouponUsage::orderby('id', 'desc')->where('coupon_id', $coupon_id)->where('candidate_id', Auth::user()->id)->first();
                            if($coupon_used){
                                CouponUsage::create([
                                    'candidate_id' => Auth::user()->id,
                                    'coupon_id' => $coupon_id,
                                    'usages' => $coupon_used->usages+1,
                                ]);
                            }else{
                                CouponUsage::create([
                                    'candidate_id' => Auth::user()->id,
                                    'coupon_id' => $coupon_id,
                                    'usages' => 1,
                                ]);
                            }
                        }

                        $wallet = Wallet::orderby('id', 'desc')->where('candidate_id', Auth::user()->id)->first();
                        $credit_balance = $priority->credits;
                        $last_credits = 0;
                        if(!empty($wallet)){
                            $last_credits = $wallet->balance_credits;
                            $credit_balance += $wallet->balance_credits;
                        }
                        $inserted_wallet = Wallet::create([
                            'candidate_id' => Auth::user()->id,
                            'payment_id' => $payment->id,
                            'last_added_credits' => $last_credits,
                            'balance_credits' => $credit_balance,
                            'date' => date('Y-m-d'),
                        ]);

                        if($inserted_wallet){
                            Session::forget('used_coupon');
                            return redirect()->back()->with('message', 'You have purchased credits Successfully !');
                        }
                    }
                } else {
                    $message_text = 'There were some issue with the payment. Please try again later.';
                    $msg_type = "error_msg";                                    

                    if ($tresponse->getErrors() != null) {
                        $message_text = $tresponse->getErrors()[0]->getErrorText();
                        $msg_type = "error_msg";                                    
                    }
                }
                // Or, print errors if the API request wasn't successful
            } else {
                $message_text = 'There were some issue with the payment. Please try again later.';
                $msg_type = "error_msg";                                    

                $tresponse = $response->getTransactionResponse();

                if ($tresponse != null && $tresponse->getErrors() != null) {
                    $message_text = $tresponse->getErrors()[0]->getErrorText();
                    $msg_type = "error_msg";                    
                } else {
                    $message_text = $response->getMessages()->getMessage()[0]->getText();
                    $msg_type = "error_msg";
                }                
            }
        } else {
            $message_text = "No response returned";
            $msg_type = "error_msg";
        }
        return back()->with($msg_type, $message_text);
    }
}