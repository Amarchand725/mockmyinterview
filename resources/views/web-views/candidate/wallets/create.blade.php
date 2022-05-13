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
                        @foreach ($booking_priorities as $key=>$priority)
                            <div class="form-check">
                                @if($key==0)
                                    <input type="hidden" name="priority_price" value="{{ $priority->price }}">
                                    <input class="form-check-input" checked type="radio" name="priority_id" id="priority-{{ $priority->id }}">
                                @else 
                                    <input class="form-check-input" type="radio" name="priority_id" id="priority-{{ $priority->id }}">
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
                <!-- paypal sec -->

                <div class="row">
                    <div class="col-md-8 mt-3">
                        {{-- <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                I have an offer code  <span><a href="#">click here for offers</a></span>
                            </label>
                        </div> --}}
                        <span class="mb-3 "><b>Authorize.Net Payment Gateway</b></span> <br>
                        <span class="paymt_img">
                            <a href="#">
                                <img src="{{ asset('public/uploads/authorize-net-logo.png') }}" style="width: 242px !important" alt="paypal" class="img-fluid ">
                            </a>
                        </span>
                    </div>
                    <div class="col-md-3 mt-3">
                        <span>Package Price : &nbsp; 	<span id="package-price">$40.99 USD</span></span><br />
                        {{-- <span>Discount Price : &nbsp; 	<span id="discount-price">$40.99 USD</span></span><br> --}}
                        <div class="clearfix border"></div>
                        <div class="tool-tip">
                            <div class="title">
                                <button id="addEducationinterviewerProfile" class="blue-btn-small">
                                    Pay Only $40.99 USD
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
    <script>
        $(document).ready(function(){
            var price = $('input[name="priority_price"]').val();
            $('#package-price').html('$'+ price+' USD');
            $('.blue-btn-small').html('Pay Only $'+ price + ' USD');
        });
    </script>
@endpush