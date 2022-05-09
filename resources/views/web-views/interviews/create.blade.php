@extends('web-views.dashboard.master.app')

@section('title', $page_title)

@push('css')
    
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
            <form action="{{ route('book_interview.store') }}" method="post">
                @csrf

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
                                            <input type="radio" name="interview_type" value="hr" class="form-check-input" id="hr" @if(sizeof(Auth::user()->hasUserQualification) == 0) disabled @endif>
                                            <label class="form-check-label" for="hr">
                                            HR
                                        </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input type="radio" name="interview_type" value="technical" class="form-check-input" id="technical" @if(sizeof(Auth::user()->hasUserQualification) == 0) disabled @endif>
                                            <label class="form-check-label" for="technical">
                                            Technical
                                        </label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <input type="radio" name="interview_type" value="specialized" class="form-check-input" id="spacialized" @if(sizeof(Auth::user()->hasUserQualification) == 0) disabled @endif>
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
                                                        <article class="feature1 slot">
                                                            <input type="checkbox" name="booked_slots[{{ $date }}][]" value="{{ $weekend_slot }}" id="feature1"/>
                                                              <span>{{ $weekend_slot }}</span>
                                                        </article>
                                                    </div>
                                                @endforeach
                                            @else
                                                @foreach ($slots['weekdays_slots'] as $weekday_slot)
                                                    <div class="col-sm-2">
                                                        <article class="feature1 slot">
                                                            <input type="checkbox" name="booked_slots[{{ $date }}][]" value="{{ $weekday_slot }}" id="feature1"/>
                                                            <span>{{ $weekday_slot }}</span>
                                                        </article>
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
                                            $date = date('Y-m-d', strtotime("+1 day"));
                                            $day = date("D", strtotime($date));
                                            @endphp
                                            @if($day == 'Sat' || $day == 'Sun')
                                                @foreach ($slots['weekends_slots'] as $weekend_slot)
                                                    <div class="col-sm-2">
                                                        <article class="feature1 slot">
                                                            <input type="checkbox" name="booked_slots[{{ $date }}][]" value="{{ $weekend_slot }}" id="feature1"/>
                                                            <span>{{ $weekend_slot }}</span>
                                                        </article>
                                                    </div>
                                                @endforeach
                                            @else
                                                @foreach ($slots['weekdays_slots'] as $weekday_slot)
                                                    <div class="col-sm-2">
                                                        <article class="feature1 slot">
                                                            <input type="checkbox" name="booked_slots[{{ $date }}][]" value="{{ $weekday_slot }}" id="feature1"/>
                                                            <span>{{ $weekday_slot }}</span>
                                                        </article>
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
                                    <input type="hidden" name="booking_type" value="standard-booking">
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
                                                    <button type="submit" class="blue-btn-small">Continue</button>
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
            </form>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).on('click', '.slot', function(){
            if($(this).hasClass('active')){
                $(this).removeClass('active');
            }else{
                $(this).addClass('active');
            }
        });
        $(document).on('click', '.slot', function(){
            if($(this).hasClass('slot-selected')){
                $(this).removeClass('slot-selected');
            }else{
                $(this).addClass('slot-selected');
            }
        });

        var date = $('.datepicker').datepicker({ dateFormat: 'dd-mm-yy' }).val();
        $('.next-day').on("click", function () {
            var type = 'plus';
            var date = $('.datepicker').datepicker('getDate');
            date.setTime(date.getTime() + (1000*60*60*24))
            $('.datepicker').datepicker("setDate", date);

            var current_date = $('#current-date').val();

            $.ajax({
                url : "{{ route('next_pre_date') }}",
                type : 'GET',
                data: {current_date:current_date, type:type},
                success : function(response){
                    $('.next-slots').html(response);
                }
            });
        });

        $('.prev-day').on("click", function () {
            var type = 'minus';
            var date = $('.datepicker').datepicker('getDate');
            date.setTime(date.getTime() - (1000*60*60*24))
            $('.datepicker').datepicker("setDate", date);

            var current_date = $('#current-date').val();

            $.ajax({
                url : "{{ route('next_pre_date') }}",
                type : 'GET',
                data: {current_date:current_date, type:type},
                success : function(response){
                    $('.next-slots').html(response);
                }
            });
        });
    </script>
@endpush
