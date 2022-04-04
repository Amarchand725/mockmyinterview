

<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startPush('css'); ?>
    <link href="<?php echo e(asset('public/css/calendar/main.min.css')); ?>" rel="stylesheet" />
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid py-3 ">
        <h2 class="mb-3 text-center">Interview Scheduler </h2>
        <div class="py-3">
            <div class="row mx-auto" style="border: 2px solid #eee;">
                <div class="col-md-6">
                    <div class="form-group float-label-control">
                        <label for="start-date">Start Date</label>
                        <input type="text" class="form-control datepicker" id="start-date" placeholder="Start Date">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-check">
                        <div class="row">
                            <div class="col-md-4">
                                <div>
                                    <h6> Interview Type </h6>
                                </div>
                                <input class="form-check-input" type="checkbox" name="technical_type" value="1" id="technical">
                                <label class="form-check-label" for="technical">
                                Technical
                            </label>
                                <div class="mt-3">
                                    <input class="form-check-input" type="checkbox" name="hr_type" value="1" id="hr">
                                    <label class="form-check-label" for="hr">
                                    HR
                                </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group float-label-control">
                        <label for="end-date">End Date</label>
                        <input type="text" class="form-control datepicker" id="end-date" placeholder="End Date">
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
                            <input type="radio" name="sessiontype" id="createBulkInterviews" ng-change="sessionType('1')" ng-model="selection.sessionType" style="height:20px; width:20px;" value="1" class="ng-pristine ng-untouched ng-valid" aria-checked="true" tabindex="0" aria-invalid="false"> &nbsp;&nbsp;Create
                        </label>
                    </div>
                    <div class="col-md-10">
                        <label class="radio-inline">
                            <input type="radio" name="sessiontype" id="cancelBulkInterviews" ng-change="sessionType('2')" ng-model="selection.sessionType" style="height:20px; width:20px;" value="2" class="ng-pristine ng-untouched ng-valid" aria-checked="false" tabindex="-1" aria-invalid="false">&nbsp;&nbsp;Cancel 
                        </label>
                    </div>
                </div>

                
                    <div class="row mx-auto pt-4" style="border: 2px solid #eee;">
                        <center>
                            <div class="panel-heading weekdays-slot-days" id="weekdays" style="display: block">
                                <label><span class="text-md">&nbsp;<strong>Weekdays</strong> </span></label>
                                <input type="checkbox" name="weekdays[]" id="mon" value="Mon" class="text-md"> 
                                <label for="mon">Mon</label> 
                                <input type="checkbox" name="weekdays[]" id="tues" value="Tue" class="text-md"> 
                                <label for="tues">Tue</label> 
                                <input type="checkbox" name="weekdays[]" id="wed" value="Wed" class="text-md"> 
                                <label for="wed">Wed</label> 
                                <input type="checkbox" name="weekdays[]" id="thur" value="Thu" class="text-md"> 
                                <label for="thur">Thu</label> 
                                <input type="checkbox" name="weekdays[]" id="fri" value="Fri" class="text-md"> 
                                <label for="fri">Fri</label> 
                            </div>
                            <div class="panel-heading weekands-slot-days" id="weekdays" style="display: none">
                                <label><span class="text-md">&nbsp;<strong>Weekands</strong> </span></label>
                                <input type="checkbox" name="weekands[]" id="sat" value="sat" class="text-md"> 
                                <label for="sat">Sat</label> 
                                <input type="checkbox" name="weekands[]" id="sun" value="sun" class="text-md"> 
                                <label for="sun">Sun</label> 
                            </div>
                        </center>
                        <center>
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <div class="title">
                                        <button class="blue-btn-small weekdays-btn opened">
                                            Weekdays(-)
                                        </button>
                                        <button class="blue-btn-small weekands-btn">
                                            Weekands(+)
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </center>
                        <span class="weekdays-slot-days">
                            <div class="row mt-4 mb-4" style="margin-left:97px">
                                <div class="well col-sm-5">
                                    <div class="py-3">
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
                                <div class="well col-sm-5 ml-4">
                                    <div class=" py-3">
                                        <center> <h6>Evening Slots</h6></center>
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
                        </span>
                        <span class="weekands-slot-days">
                            <div class="row mt-4 mb-4" style="margin-left:97px; display:none">
                                <div class="well col-sm-5">
                                    <div class="py-3">
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
                                <div class="well col-sm-5 ml-4">
                                    <div class=" py-3">
                                        <center> <h6>Evening Slots</h6></center>
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
                        </span>
                    </div>
                    <div class="row">
                    <div class="col-md-12">
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
                    </div>
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('public/js/calendar/main.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/calendar/main.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/calendar/interaction/main.js')); ?>"></script>
    <script>
        $(document).on('click', '.weekdays-btn', function(){
            if(!$(this).hasClass('opened')){
                $(this).addClass('opened');
                $('.weekdays-slot-days').css('display', 'block');
                $(this).text('Weekdays(-)');
            }else{
                $(this).removeClass('opened');
                $('.weekdays-slot-days').css('display', 'none');
                $(this).text('Weekdays(+)');
            }
        });
        $(document).on('click', '.weekands-btn', function(){
            $('.opened').removeClass();
            if(!$(this).hasClass('opened')){
                $(this).addClass('opened');
                $('.weekdays-slot-days').css('display', 'none');
                $('.weekands-slot-days').css('display', 'block');
                $(this).text('Weekands(-)');
            }else{
                $(this).removeClass('opened');
                $('.weekdays-slot-days').css('display', 'block');
                $('.weekands-slot-days').css('display', 'none');
                $(this).text('Weekands(+)');
            }
        });

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
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('web-views.dashboard.master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/web-views/interviewer/schedule-interview.blade.php ENDPATH**/ ?>