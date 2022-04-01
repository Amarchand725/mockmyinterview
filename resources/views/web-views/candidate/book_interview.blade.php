@extends('web-views.dashboard.master.app')

@section('title', $page_title)

@push('css')
    <style>
        .table tbody td {
            vertical-align: bottom;
            border-bottom: 0 !important;
        }
        .table tbody th {
            border-bottom: 0 !important;
        }
        .table td, .table th {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 0px solid #eceeef;
            padding-left: 80px;
        }
        .slot{
            border: none;
            font-style: inherit;
            font-variant: inherit;
            font-stretch: inherit;
            line-height: inherit;
            font-size: 16px;
            font-family: "Open Sans";
            background: 0 0!important;
            cursor: pointer;
        }
        .slot-selected{
            color: #fff!important;
            padding: 4px 8px!important;
            border-radius: 4px;
            background: #ff5900!important;
        }

        .next-btn{
            color: #0d6efd;
            
        }
        .next-btn:focus, .next-btn:hover {
            color: #014c8c;
            text-decoration: underline;
            cursor: pointer;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid py-3 ">
        <div class="row mx-auto">
            <h2 class="mb-3">{{ $page_title }}</h2>
            <div class="col-md-12  email_verificaion_box ">
                <div class="row side-heading-font">
                    <span class="col-md-12">Check Your System Date and Time</span>
                </div>
                <div class="row">
                    <div class="col-md-12 sub-text-normal">
                        Looks like your system date and time is not set correctly. Please update your system date and time in order to start the interview on Time.
                    </div>
                </div>
            </div>

            <div class="col-md-12 well py-3">
                <div class="bg-white ">
                    <span class="side-heading-font">Schedule an Interview </span>
                    <div class="row">
                        <div class="col-md-3">
                            <b>Select Interview Type:</b>
                            <br> <br>
                            <span class="mt-4">Select Date </span>
                        </div>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-check">
                                        <input type="radio" name="interview_type" class="form-check-input" id="hr" @if(empty(Auth::user()->hasUserQualification)) disabled @endif>
                                        <label class="form-check-label" for="hr">
                                        HR
                                    </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input type="radio" name="interview_type" class="form-check-input" id="technical" @if(empty(Auth::user()->hasUserQualification)) disabled @endif>
                                        <label class="form-check-label" for="technical">
                                        Technical
                                    </label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-check">
                                        <input type="radio" name="interview_type" class="form-check-input" id="spacialized" @if(empty(Auth::user()->hasUserQualification)) disabled @endif>
                                        <label class="form-check-label" for="spacialized">
                                        Specialized
                                    </label>
                                    </div>
                                </div>
                            </div>
                            <!-- date -->
                            <div class="mt-3">
                                <input type="text" class="form-control datepicker" name="" value="{{ date('d/m/Y') }}" id="current-date">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Booking interview -->
            <main class="container-fluid pt-5">
                <div class="col-md-12 well bg-white avilable-slots" ng-hide="showSpecialForm" aria-hidden="false">
                    <div class="row m-l-none">
                       <b>
                            <center>
                              <span ng-show="isError" class="text-danger ng-binding ng-hide" aria-hidden="true"></span>
                            </center>
                       </b>
                    </div>
                    <span class="side-heading-font">
                        Available Slots <span style="font-size:12px !important;font-weight:400 !important;color:inherit; ">&nbsp;&nbsp;<small>(All time slots listed are in IST)</small></span>
                    </span>
                    <div class="col-md-12 text-right">
                        <span class="prev-day next-btn" >< Previous Day</span>
                        &nbsp;&nbsp;&nbsp;
                        <span class="next-day next-btn" >Next Day ></span>
                    </div>
                    <!-- iterate here -->
                    <div class="card-block p-0 ">
                        <div class="col-md-12 block-rows next-slots">
                            <div class="row" id="slotsInDate">
                               <div class="col-md-2 available-date ng-binding" id="slotDate">
                                  <span id="first_date">{{ date('d M Y') }}</span>
                               </div>
                               <div class="col-md-10">
                                 <div class="row">
                                    @php 
                                    $date = date('Y-m-d');
                                    $day = date("D", strtotime($date));
                                    @endphp
                                    @if($day == 'Sat' || $day == 'Sun')
                                        @foreach ($slots['weekends_slots'] as $weekend_slot)
                                            <div class="col-sm-2">
                                                <button class="mt-3 slot">{{ $weekday_slot }}</button>
                                            </div>
                                        @endforeach
                                    @else
                                        @foreach ($slots['weekdays_slots'] as $weekday_slot)
                                            <div class="col-sm-2">
                                                <button class="mt-3 slot">{{ $weekday_slot }}</button>
                                            </div>
                                        @endforeach
                                    @endif
                                 </div>
                               </div>
                            </div>
                            <hr />
                            <div class="row" id="slotsInDate">
                                <div class="col-md-2 available-date ng-binding" id="slotDate">
                                   <span id="second_date">{{ date('d M Y', strtotime("+1 day")) }}</span>
                                </div>
                                <div class="col-md-10">
                                    <div class="row">
                                        @php 
                                        $date = date('d M Y', strtotime("+1 day"));
                                        $day = date("D", strtotime($date));
                                        @endphp
                                        @if($day == 'Sat' || $day == 'Sun')
                                            @foreach ($slots['weekends_slots'] as $weekend_slot)
                                                <div class="col-sm-2">
                                                    <button class="mt-3 slot">{{ $weekend_slot }}</button>
                                                </div>
                                            @endforeach
                                        @else
                                            @foreach ($slots['weekdays_slots'] as $weekday_slot)
                                                <div class="col-sm-2">
                                                    <button class="mt-3 slot">{{ $weekday_slot }}</button>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="row py-3 ml-2">
                            @foreach ($booking_types as $booking_type)
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <div class="priority_circle" style="background: {{ $booking_type->color }}"></div>
                                        </div>
                                        @if($booking_type->title=='Tentative Booking')
                                            <div class="col-md-7">
                                        @else 
                                            <div class="col-md-10">
                                        @endif
                                            <strong>
                                                <span class="ml-3">                                               
                                                    {{ $booking_type->title }}
                                                    @if($booking_type->title!='Tentative Booking')
                                                        : {{ $booking_type->credits }} Credits
                                                    @endif
                                                </span>
                                            </strong>
                                        </div>
                                        @if($booking_type->title=='Tentative Booking')
                                            <div class="col-sm-1">
                                                <button class="blue-btn-small">Continue</button>
                                            </div>
                                        @endif
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                 </div>
            </main>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).on('click', '.slot', function(){
            if($(this).hasClass('slot-selected')){
                $(this).removeClass('slot-selected');
            }else{
                $(this).addClass('slot-selected');
            }
        });

        var date = $('.datepicker').datepicker({ dateFormat: 'dd-mm-yy' }).val();
        $('.next-day').on("click", function () {
            var date = $('.datepicker').datepicker('getDate');
            date.setTime(date.getTime() + (1000*60*60*24))
            $('.datepicker').datepicker("setDate", date);

            var current_date = $('#current-date').val();

            // alert(current_date);

            $.ajax({
                url : "{{ route('next_pre_date') }}",
                type : 'GET',
                data: {current_date:current_date}
                success : function(response){
                    console.log(response);
                })
            });
        });

        $('.prev-day').on("click", function () {
            var date = $('.datepicker').datepicker('getDate');
            date.setTime(date.getTime() - (1000*60*60*24))
            $('.datepicker').datepicker("setDate", date);
        });
    </script>
@endpush