@extends('web-views.dashboard.master.app')

@section('title', $page_title)
@push('css')
    <link href="{{ asset('public/css/calendar/main.min.css') }}" rel="stylesheet" />

    <style>
        .slot{
            border: none;
            font-style: inherit;
            font-variant: inherit;
            font-stretch: inherit;
            line-height: inherit;
            font-size: 16px;
            font-family: "Open Sans";
            cursor: pointer;
            border: 2px solid;
            border-radius: 15px;
            padding: 5px 17px;
            border-color: #050505f2;
            background: #847e7e;
            color: white;
        }
        .slot-selected{
            color: #fff!important;
            border-radius: 4px;
            background: #008739!important;
            border: 2px solid;
            border-radius: 15px;
            padding: 5px 17px;
            border-color: #050505f2;
        }
    </style>
@endpush
@section('content')
    <div class="container-fluid py-3 ">
        <h2 class="mb-3 text-center">Interview Scheduler </h2>
        <div class="py-3">
            <form action="{{ route('available_slot.store') }}" method="post" id="subform">
                @csrf

                <div class="row mx-auto" style="border: 2px solid #eee;">
                    <div class="col-md-6">
                        <div class="form-group float-label-control">
                            <label for="start-date">Start Date</label>
                            <input type="text" name="start_date" class="form-control datepicker" id="start-date" value="{{ old('start_date') }}" placeholder="Start Date">
                            <span style="color: red">{{ $errors->first('start_date') }}</span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="start-date">Parent Interview Type</label>
                        <select name="parent_id" id="" class="form-control parent-type">
                            <option value="" selected>Select parent</option>
                            @foreach ($parent_interview_types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                        <span style="color: red">{{ $errors->first('parent_id') }}</span>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group float-label-control">
                            <label for="end-date">End Date</label>
                            <input type="text" name="end_date" class="form-control datepicker" id="end-date" value="{{ old('end_date') }}" placeholder="End Date">
                            <span style="color: red">{{ $errors->first('end_date') }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group float-label-control">
                            <label for="start-date">Child Interview Type</label>
                            <select name="child_interview_type_id" id="child_interview_type_id" class="form-control"></select>
                        </div>
                    </div>
                </div>
                
                <div class="row mx-auto" style="border: 2px solid #eee;">
                    <div class="col-md-8">
                        <div class="row text-md">
                            <b>Do you want to Create / Cancel Interview Slots?</b> &nbsp;
                        </div>
                    </div>
                    <div class="col-md-10">
                        <label class="radio-inline">
                            <input type="radio" name="sessiontype" id="createBulkInterviews" value="1" checked style="height:20px; width:20px;"> &nbsp;&nbsp;Create
                        </label>
                    </div>
                    <div class="col-md-10">
                        <label class="radio-inline">
                            <input type="radio" name="sessiontype" id="cancelBulkInterviews" value="2" style="height:20px; width:20px;">&nbsp;&nbsp;Cancel 
                        </label>
                    </div>
                </div>
                
                <div class="row mx-auto pt-4" style="border: 2px solid #eee;">
                    <center>
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <div class="title">
                                    <button type="button" class="blue-btn-small get-slots-btn opened" id="weekdays_btn_label" value="weekdays">
                                        Weekdays(-)
                                    </button>
                                    <button type="button" class="blue-btn-small get-slots-btn" id="weekands_btn_label" value="weekands">
                                        Weekands(+)
                                    </button>
                                </div>
                            </div>
                        </div>
                    </center>
                    
                    <span class="slot-days"></span>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <center>
                            <div class="tool-tip">
                                <div class="title">
                                    <button type="submit" class="blue-btn-small" id="create-avialable-slot-btn">
                                        Create
                                    </button>
                                </div>
                            </div>
                            <h2 class="mb-3 mt-3 text-center">Calendar View </h2>
                        </center>
                    </div>
                    <div id="calendar"></div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('public/js/calendar/main.min.js') }}"></script>
    <script src="{{ asset('public/js/calendar/main.js') }}"></script>
    <script src="{{ asset('public/js/calendar/interaction/main.js') }}"></script>
    <script>
        $(document).on('change', '.parent-type', function(){
            var parent_id = $(this).val();
            $.ajax({
                url : "{{ route('get-child-interview-types') }}",
                data : {'parent_id' : parent_id},
                success : function(response){
                    var html = '<option value="" selected>Select child interview type</option>';
                    $.each(response.child_interview_types , function(index, val) { 
                       html += '<option value="'+val.id+'">'+val.name+'</option>';
                    });

                    $('#child_interview_type_id').html(html);
                }
            });
        });

        $(document).on('click', '.m-slot-btn', function(){
            var slot = $(this).val();
            var index = $(this).attr('data-index');
            $('#slot-m-'+index).val(slot);
        });

        $(document).on('click', '.e-slot-btn', function(){
            var slot = $(this).val();
            var index = $(this).attr('data-index');
            $('#slot-e-'+index).val(slot);
        });

        $(document).on('click', '.get-slots-btn', function(){
            var slot_type = $(this).val();

            if(!$(this).hasClass('opened')){
                $(this).addClass('opened');
                if(slot_type=='weekdays'){
                    $(this).text('Weekdays(-)');
                    $('#weekands_btn_label').text('Weekands(+)');
                    $('#weekands_btn_label').removeClass('opened');
                }else{
                    $(this).text('Weekands(-)');
                    $('#weekdays_btn_label').text('Weekdays(+)');
                    $('#weekdays_btn_label').removeClass('opened');
                }
                
                $.ajax({
                    url : "{{ route('get-slots') }}",
                    data : {'slot_type' : slot_type},
                    success : function(response){
                        $('.slot-days').html(response);
                    }
                });
            }else{
                $(this).removeClass('opened');
                $('.slot-days').html('');
                if(slot_type=='weekdays'){
                    $(this).text('Weekdays(+)');
                }else{
                    $(this).text('Weekands(+)');
                }
            }
        });

        $(document).ready(function() {
            var slot_type = $('.get-slots-btn').val();
            if(!$('.get-slots-btn').hasClass('opened')){
                $('.get-slots-btn').addClass('opened');
                if(slot_type=='weekdays'){
                    $('.get-slots-btn').text('Weekdays(-)');
                }else{
                    $('.get-slots-btn').text('Weekands(-)');
                }

                $.ajax({
                    url : "{{ route('get-slots') }}",
                    data : {'slot_type' : slot_type},
                    success : function(response){
                        $('.slot-days').html(response);
                    }
                });
            }else{
                $('.slot-days').html('');
                if($('.get-slots-btn').hasClass('opened')){
                    if(slot_type=='weekdays'){
                        $('.opened').text('Weekdays(-)');
                    }else{
                        $('.opened').text('Weekands(-)');
                    }

                    $.ajax({
                        url : "{{ route('get-slots') }}",
                        data : {'slot_type' : slot_type},
                        success : function(response){
                            $('.slot-days').html(response);
                        }
                    });
                }else{
                    if(slot_type=='weekdays'){
                        $('.opened').text('Weekdays(+)');    
                    }else{
                        $('.opened').text('Weekands(+)');    
                    }
                }
            }

            $('.button-left').click(function() {
                $('.sidebar').toggleClass('fliph');
            });
        });

        $(document).on('click', '.slot', function(){
            if($(this).hasClass('slot-selected')){
                $(this).removeClass('slot-selected');
            }else{
                $(this).addClass('slot-selected');
            }
        });

        // calander scripts
        /* var eventsArray = [{
            title: 'event1',
            start: '2019-07-20'
        }, {
            title: 'event2',
            start: '2019-08-05',
            end: '2019-08-07'
        }, {
            title: 'event3',
            start: '2019-09-03'
        }, {
            title: 'event3',
            start: '2019-10-05'
        }]; */

        var dateToday = new Date();
        var dates = $("#start-date, #end-date").datepicker({
            defaultDate: "+2d",
            changeMonth: true,
            numberOfMonths: 1,
            minDate: "+2d",
            onSelect: function(selectedDate) {
                var option = this.id == "start-date" ? "minDate" : "maxDate",
                    instance = $(this).data("datepicker"),
                    date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
                dates.not(this).datepicker("option", option, date);
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                height: 600,
                plugins: ['dayGrid', 'interaction'],

                dateClick: function(info) {
                    alert('Clicked on: ' + info.dateStr);

                    eventsArray.push({
                        date: info.dateStr,
                        title: "test event added from click"
                    });

                    calendar.refetchEvents();
                },

                eventClick: function(info) {
                    alert(info.event.title)
                },

                events: function(info, successCallback, failureCallback) {
                    successCallback(eventsArray);
                }
            });

            calendar.render();
        });
    </script>
@endpush