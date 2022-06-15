<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Referral;
use Auth;

class ReferralController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = Referral::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('offer_message', 'like', '%'. $request['search'] .'%')
                ->orWhere('offer_credits', 'like', '%'. $request['search'] .'%')
                ->orWhere('offer_credits_both', 'like', '%'. $request['search'] .'%');
            }
            if($request['status']!="All"){
                if($request['status']==2){
                    $request['status'] = 0;
                }
                $query->where('status', $request['status']);
            }
            $models = $query->paginate(10);
            return (string) view('admin.referrals.search', compact('models'));
        }
        $page_title = 'All Referrals';
        $models = Referral::orderby('id', 'desc')->paginate(10);
        return view('admin.referrals.index', compact('models', 'page_title'));
    }

    public function create()
    {
        $page_title = 'Add New Referral';
        return view('admin.referrals.create', compact('page_title'));
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'offer_credits' => 'required|max:255',
            'offer_message' => 'required|max:255',
        ]);

        try{
            $model = new Referral();
            $model->created_by = Auth::user()->id;
            $model->offer_credits = $request->offer_credits;
            $model->offer_credits_both = $request->offer_credits_both;
            $model->offer_message = $request->offer_message;
            $model->save();

            return redirect()->route('referral.index')->with('message', 'Referral Added Successfully !');
        }catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function show()
    {
        //
    }
    public function edit($referral_code)
    {
        $page_title = 'Edit Referral';
        $model  = Referral::where('referral_code', $referral_code)->first();
        return view('admin.referrals.edit', compact('page_title', 'model'));
    }
    public function update(Request $request, $referral_code)
    {
        $validator = $request->validate([
            'offer_credits' => 'required|max:255',
            'offer_message' => 'required|max:255',
        ]);

        $model = Referral::where('referral_code', $referral_code)->first();
        $model->created_by = Auth::user()->id;
        $model->offer_credits = $request->offer_credits;
        $model->offer_credits_both = $request->offer_credits_both;
        $model->offer_message = $request->offer_message;
        $model->status = $request->status;
        $model->save();

        return redirect()->route('referral.index')->with('message', 'Referral updated Successfully !');
    }
    public function destroy($referral_code)
    {
        $model = Referral::where('referral_code', $referral_code)->delete();
        if ($model) {
            return true;
        } else {
            return response()->json(['message' => 'Failed '], 404);
        }
    }
}
