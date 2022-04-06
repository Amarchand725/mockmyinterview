

<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startPush('css'); ?>
    <link href="<?php echo e(asset('public/css/calendar/main.min.css')); ?>" rel="stylesheet" />

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
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid py-3 ">
        <h2 class="mb-3 text-center">Interview Scheduler </h2>
        <div class="py-3">
            <form action="<?php echo e(route('available_slot.store')); ?>" method="post" id="subform">
                <?php echo csrf_field(); ?>

                <div class="row mx-auto" style="border: 2px solid #eee;">
                    <div class="col-md-6">
                        <div class="form-group float-label-control">
                            <label for="start-date">Start Date</label>
                            <input type="text" name="start_date" class="form-control datepicker" id="start-date" value="<?php echo e(date('d-m-Y')); ?>" placeholder="Start Date">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-check">
                            <div class="row">
                                <div class="col-md-4">
                                    <div>
                                        <h6> Interview Type </h6>
                                    </div>
                                    <?php if(Auth::user()->hasResume->technical): ?>
                                        <input type="checkbox" name="technical_type" value="1" id="technical" class="form-check-input">
                                    <?php else: ?> 
                                        <input type="checkbox" name="technical_type" value="1" disabled id="technical" class="form-check-input">
                                    <?php endif; ?>
                                    <label class="form-check-label" for="technical">
                                    Technical
                                </label>
                                    <div class="mt-3">
                                        <?php if(Auth::user()->hasResume->hr): ?>
                                            <input type="checkbox" name="hr_type" value="1" id="hr" class="form-check-input">
                                        <?php else: ?> 
                                            <input type="checkbox" name="hr_type" value="1" disabled id="hr" class="form-check-input">
                                        <?php endif; ?>
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
                            <input type="text" name="end_date" class="form-control datepicker" id="end-date" value="<?php echo e(date('d-m-Y')); ?>" placeholder="End Date">
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
                            <input type="radio" name="sessiontype" id="createBulkInterviews" style="height:20px; width:20px;" value="1"> &nbsp;&nbsp;Create
                        </label>
                    </div>
                    <div class="col-md-10">
                        <label class="radio-inline">
                            <input type="radio" name="sessiontype" id="cancelBulkInterviews" style="height:20px; width:20px;" value="2">&nbsp;&nbsp;Cancel 
                        </label>
                    </div>
                </div>
                
                <div class="row mx-auto pt-4" style="border: 2px solid #eee;">
                    <center>
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <div class="title">
                                    <button class="blue-btn-small get-slots-btn opened" id="weekdays_btn_label" value="weekdays">
                                        Weekdays(-)
                                    </button>
                                    <button class="blue-btn-small get-slots-btn" id="weekands_btn_label" value="weekands">
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
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('public/js/calendar/main.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/calendar/main.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/calendar/interaction/main.js')); ?>"></script>
    <script>
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
                    url : "<?php echo e(route('get-slots')); ?>",
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
                    url : "<?php echo e(route('get-slots')); ?>",
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
                        url : "<?php echo e(route('get-slots')); ?>",
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