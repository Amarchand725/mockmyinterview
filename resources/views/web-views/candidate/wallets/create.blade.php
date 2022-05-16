@extends('web-views.dashboard.master.app')

@section('title', $page_title)

@push('css')
@endpush

@section('content')
    <div class="container-fluid py-3 ">
        <div class="row mx-auto">
            <h2 class="mb-3">Buy Credits</h2>
            <div class="col-md-12 mx-auto email_verificaion_box ">
                <div class="row side-heading-font">
                    <span class="col-md-12"><center>Update your 'Profile' before attending your session for a complete evaluation!</center></span>
                </div>
            </div>

            <div class="clear-fix"></div>
            <form action="{{ route('dopay.online') }}" method="post">
                @csrf

                <div class="row mx-auto ">
                    <div class="col-md-5 well">
                        <div class="bg-white  py-3">
                            @foreach ($booking_priorities as $key=>$priority)
                                <div class="form-check">
                                    @if($key==0)
                                        <input class="form-check-input" checked data-price="{{ $priority->price }}" value="{{ $priority->id }}" type="radio" name="priority_id" id="priority-{{ $priority->id }}">
                                    @else 
                                        <input class="form-check-input" data-price="{{ $priority->price }}" value="{{ $priority->id }}" type="radio" name="priority_id" id="priority-{{ $priority->id }}">
                                    @endif
                                    <label class="form-check-label" for="priority-{{ $priority->id }}">
                                        {{ Str::upper($priority->type) }}: {{ $priority->credits }} credits for ${{ number_format($priority->price, 2) }} USD
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @if(isset($home_page_data['terms']))
                        <div class="col-md-5 well ml-3">
                            <div class="bg-white  py-2">
                                <div>
                                    {!! $home_page_data['terms'] !!}
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-8 mt-3">
                            <div class="form-check check-coupon-input">
                                <input type="hidden" id="get-coupon-url" value="{{ url('get_coupon') }}">
                                <input type="hidden" id="remove-coupon-url" value="{{ url('remove-coupon') }}">
                                @if(Session::has('used_coupon'))
                                    <input class="form-check-input check-coupon-input" type="checkbox" name="is_coupon" checked value="1" id="check-coupon">
                                @else 
                                    <input class="form-check-input check-coupon-input" type="checkbox" name="is_coupon" value="1" id="check-coupon">
                                @endif
                                <label class="form-check-label" for="check-coupon">
                                    I have an offer code  {{-- <span><a href="#">click here for offers</a></span> --}}
                                </label>
                                <div class="col-sm-6">
                                    <span id="coupon-input-field">
                                        @if(Session::has('used_coupon'))
                                            <div class="row">
                                                <div class="col-sm-10">
                                                    <input type="text" name="coupon_code" readonly value="{{ Session::get('used_coupon')['coupon_code'] }}" id="coupon_code" class="form-control" placeholder="Enter valid coupon code.">
                                                    <span style="color:red" id="error-coupon-code"></span>
                                                </div>
                                                <div class="col-sm-2">
                                                    <button type="button" class="btn btn-danger btn-md coupon-remove-btn" data-toggle="tooltip" data-placement="top" title="Remove coupon"><i class="fa fa-times"></i> Remove Coupon</button>
                                                </div>
                                            </div>
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mt-3">
                            <span>Package Price : &nbsp; 	<span class="package-price">$0.00 USD</span></span><br />
                            <span>Discount Price : &nbsp; 	
                                <span id="discount-price">
                                    @if(Session::has('used_coupon'))
                                        ${{ number_format(Session::get('used_coupon')['discount'], 2) }} USD
                                    @else 
                                        $0.00 USD
                                    @endif
                                </span>
                            </span><br>
                            <div class="clearfix border"></div>
                            <span>Grand Total : &nbsp; 	
                                <span id="grand-total">
                                    @if(Session::has('used_coupon'))
                                        ${{ Session::get('used_coupon')['sub_total']-Session::get('used_coupon')['discount'] }} USD
                                    @else 
                                        <span class="package-price">$0.00 USD</span>
                                    @endif
                                </span>
                            </span><br>
                            <div class="tool-tip">
                                <div class="title">
                                    <button type="button" id="proceed-btn" type="submit" class="btn btn-info">
                                        Proceed
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto proceed-payment" style="display: none">
                    @php
                        $months = array(1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Aug', 9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec');
                    @endphp
                    <div class="card-panel">
                        <div class="media wow fadeInUp" data-wow-duration="1s"> 
                            <div class="companyIcon">
                            </div>
                            <div class="media-body">
                                
                                <div class="container">
                                    @if(session('success_msg'))
                                    <div class="alert alert-success fade in alert-dismissible show">                
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true" style="font-size:20px">×</span>
                                        </button>
                                        {{ session('success_msg') }}
                                    </div>
                                    @endif
                                    @if(session('error_msg'))
                                    <div class="alert alert-danger fade in alert-dismissible show">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true" style="font-size:20px">×</span>
                                        </button>    
                                        {{ session('error_msg') }}
                                    </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h1>Payment</h1>
                                        </div>                       
                                    </div>    
                                    <div class="row">                        
                                        <div class="col-xs-12 col-md-12" style="background: rgb(242, 245, 242); border-radius: 5px; padding: 10px;">
                                            <div class="panel panel-primary">                                       
                                                <div class="creditCardForm">                                    
                                                    <div class="payment">
                                                        <div class="row">
                                                            <div class="form-group owner col-md-6">
                                                                <label for="owner">Owner</label>
                                                                <input type="text" class="form-control" id="owner" name="owner" value="{{ old('owner') }}" required>
                                                                <span id="owner-error" class="error text-red">Please enter owner name</span>
                                                            </div>
                                                            <div class="form-group CVV col-md-6">
                                                                <label for="cvv">CVV</label>
                                                                <input type="number" class="form-control" id="cvv" name="cvv" value="{{ old('cvv') }}" required>
                                                                <span id="cvv-error" class="error text-red">Please enter cvv</span>
                                                            </div>
                                                        </div>    
                                                        <div class="row">
                                                            <div class="form-group col-md-6" id="card-number-field">
                                                                <label for="cardNumber">Card Number</label>
                                                                <input type="text" class="form-control" id="cardNumber" name="cardNumber" value="{{ old('cardNumber') }}" required>
                                                                <span id="card-error" class="error text-red">Please enter valid card number</span>
                                                            </div>
                                                            <div class="form-group col-md-6" >
                                                                <label for="amount">Amount</label>
                                                                @php 
                                                                    $grand_total = '';
                                                                    if(Session::has('used_coupon')){
                                                                        $grand_total = Session::get('used_coupon')['sub_total']-Session::get('used_coupon')['discount'];
                                                                    }
                                                                @endphp

                                                                @if(Session::has('used_coupon'))
                                                                    <input type="number" class="form-control" id="amount" name="amount" min="1" value="{{ $grand_total }}" required>
                                                                @else 
                                                                    <input type="number" class="form-control" id="grand-total-amount" name="amount" min="1" value="{{ $grand_total }}" required>
                                                                @endif
                                                                <span id="amount-error" class="error text-red">Please enter amount</span>
                                                            </div>
                                                        </div>    
                                                        <div class="row">
                                                            <div class="form-group col-md-6" id="expiration-date">
                                                                <label>Expiration Date</label><br/>
                                                                <select class="form-control" id="expiration-month" name="expiration-month" style="float: left; width: 200px; margin-right: 10px;">
                                                                    @foreach($months as $k=>$v)
                                                                        <option value="{{ $k }}" {{ old('expiration-month') == $k ? 'selected' : '' }}>{{ $v }}</option>                                                        
                                                                    @endforeach
                                                                </select>  
                                                                <select class="form-control" id="expiration-year" name="expiration-year"  style="float: left; width: 200px;">
                                                                    @for($i = date('Y'); $i <= (date('Y') + 15); $i++)
                                                                        <option value="{{ $i }}">{{ $i }}</option>            
                                                                    @endfor
                                                                </select>
                                                            </div>                                                
                                                            <div class="form-group col-md-6" id="credit_cards" style="margin-top: 22px;">
                                                                <img src="{{ asset('public/web/assets/authorize-logos/authorize.png') }}" width="350px" id="visa">
                                                            </div>
                                                        </div>
                                                        
                                                        <br/>
                                                        <div class="form-group" id="pay-now">
                                                            <button id="addEducationinterviewerProfile" type="submit" class="btn btn-info">
                                                                @if(Session::has('used_coupon'))
                                                                    Pay Only ${{ Session::get('used_coupon')['sub_total']-Session::get('used_coupon')['discount'] }} USD
                                                                @else 
                                                                    <span id="grand-total-btn">$0.00 USD</span>
                                                                @endif
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>                                
                                            </div>
                                        </div>   
                                        <div class="col-md-1"></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div> 
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('public/admin/assets/js/apply-coupon.js') }}"></script>
@endpush