@extends('web-views.dashboard.master.app')

@section('title', $page_title)

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core@4.2.0/main.min.css" rel="stylesheet" />
@endpush

@section('content')
    <div class="container py-3 ">
        <h2 class="mb-3 text-center">Interview Scheduler </h2>

        <div class="py-3">
            <div class="row mx-auto">

                <div class="col-md-6  ">
                    <div class="form-group float-label-control">
                        <label for="">Start Date</label>
                        <input class="form-control datepicker" name="from_date" placeholder="Start Date">
                    </div>
                </div>

                <div class="col-md-6   ">
                    <div class="form-check">
                        <div class="row">
                            <div class="col-md-4">
                                <div>
                                    <label for="interview">
                                    Interview type
                                </label>
                                </div>
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                Technical
                            </label>
                                <div class="mt-3">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">
                                    HR
                                </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6   ">
                    <div class="form-group float-label-control">
                        <label for="">End Date</label>
                        <input class="form-control datepicker" name="end_date" placeholder="End Date">
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="row text-md">
                            <b>Do you want to Create / Cancel Interview Slots?</b> &nbsp;
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="radio-inline">
                        <input type="radio" name="sessiontype" id="createBulkInterviews" ng-change="sessionType('1')" ng-model="selection.sessionType" style="height:20px; width:20px;" value="1" class="ng-pristine ng-untouched ng-valid" aria-checked="true" tabindex="0" aria-invalid="false"> &nbsp;&nbsp;Create
                        </label>
                        <label class="radio-inline">
                        <input type="radio" name="sessiontype" id="cancelBulkInterviews" ng-change="sessionType('2')" ng-model="selection.sessionType" style="height:20px; width:20px;" value="2" class="ng-pristine ng-untouched ng-valid" aria-checked="false" tabindex="-1" aria-invalid="false">&nbsp;&nbsp;Cancel 
                        </label>
                    </div>

                    <center>
                        <div class="panel-heading" id="WeekdaycheckboxCreate">
                            <label><span class="text-md">&nbsp;<strong>Weekdays</strong> </span></label>
                            <input type="checkbox" name="mon" id="mon" value="Mon" class="text-md"> Mon

                            <input type="checkbox" name="tues" id="tues" value="Tue" class="text-md"> Tue

                            <input type="checkbox" name="wed" id="wed" value="Wed" class="text-md"> Wed

                            <input type="checkbox" name="thur" id="thur" value="Thu" class="text-md"> Thu

                            <input type="checkbox" name="fri" id="fri" value="Fri" class="text-md"> Fri

                        </div>
                    </center>
                    <center>
                        <div class="row">
                            <div class="col-md-3 offset-md-3">
                                <div class="title">

                                    <button id="addEducationinterviewerProfile" class="blue-btn-small" onclick="myFunction()">
                                        Weekdays(+)

                                            </button>
                                </div>
                                
                            </div>
                            <div class="col-md-3 ">
                                <div class="title">

                                    <button id="addEducationinterviewerProfile" class="blue-btn-small" onclick="myFunctiontwo()">
                                        Weeends(+)

                                            </button>
                                </div>
                            </div>


                        </div>
                        
                        <div>
                                    <div class="row text-center  mt-3 cell_phone">
                                        <div class="col-md-5 well"  id="myDIV">
                                            <div class=" py-3">
                                                <center> <h6>Morning Slots</h6></center>
                                                <div class="row py-3">
                                                    <div class="col-md-3">
                                                        <button class="btn btn-success">11;30</button>
                                                    </div>
                                                    <div class="col-md-3">
                                                    <button class="btn btn-success">11;30</button>
                                                    </div>
                                                    <div class="col-md-3">
                                                    <button class="btn btn-success">11;30</button>
                                                    </div>
                                                    <div class="col-md-3">
                                                    <button class="btn btn-success">11;30</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="col-md-5 well ml-5" id="mydivtwo">
                                            <div class=" py-3">
                                                <center> <h6>Morning Slots</h6></center>
                                                <div class="row py-3">
                                                    <div class="col-md-3">
                                                        <button class="btn btn-success">11;30</button>
                                                    </div>
                                                    <div class="col-md-3">
                                                    <button class="btn btn-success">11;30</button>
                                                    </div>
                                                    <div class="col-md-3">
                                                    <button class="btn btn-success">11;30</button>
                                                    </div>
                                                    <div class="col-md-3">
                                                    <button class="btn btn-success">11;30</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    
                                </div>
                                </div>
                                <!-- new  -->

                                
                    </center>
                    <center>
                        <div class="tool-tip">
                            <div class="title">

                                <button id="addEducationinterviewerProfile" class="blue-btn-small">
                                            Create
                                        </button>
                            </div>
                        </div>
                        <h2 class="mb-3 mt-3 text-center">Calendar View </h2>

                    </center>
                    <div id="calendar"></div>


                </div>
            </div>








        </div>





    </div>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@4.2.0/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@4.2.0/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@4.2.0/main.js"></script>

    <script>
        $(document).ready(function() {
            $('.button-left').click(function() {
                $('.sidebar').toggleClass('fliph');
            });

        });

        // calander scripts
        var eventsArray = [{
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
        }];

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
   
        function myFunction() {
            var x = document.getElementById("myDIV");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
            }

            function myFunctiontwo() {
            var x = document.getElementById("mydivtwo");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>
@endpush