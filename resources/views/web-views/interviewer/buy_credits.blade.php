@extends('web-views.dashboard.master.app')

@section('title', $page_title)

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
            <div class="row mx-auto ">
                <div class="col-md-5 well">
                    <div class="bg-white  py-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                UNO: 1299 credits for $18.99 USD
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                UNO: 1299 credits for $18.99 USD
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                UNO: 1299 credits for $18.99 USD
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 well ml-3">
                    <div class="bg-white  py-2">
                        <div>
                            <ul class="list-styled">
                                <li>Number of Regular Interviews: 3</li>
                                <li>Standard Waiting Period: 48 Hours</li>
                                <li>Duration of Each Interview: 30 minutes</li>
                                <li>Expert’s Feedback: Yes</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- paypal sec -->

                <div class="row">
                    <div class="col-md-8 mt-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                I have an offer code  <span><a href="#">click here for offers</a></span>
                            </label>
                        </div>
                        <span class="mb-3 "><b>Payment Gateway</b></span> <br>
                        <span class="paymt_img"><a href="#">
                            <img src="assets/img/logo_paypal.png" alt="paypal" class="img-fluid ">
                        </a></span>
                    </div>
                    <div class="col-md-3 mt-3">
                        <span>Package Price : &nbsp; 	$40.99 USD</span>
                        <span>Discount Price : &nbsp; 	$40.99 USD</span>
                        <br>
                        <div class="clearfix border"></div>
                        <div class="tool-tip">
                            <div class="title">
                                <button id="addEducationinterviewerProfile" class="blue-btn-small">
                                    Pay Only &nbsp; &nbsp;&nbsp;     	$40.99 USD
                                            </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush