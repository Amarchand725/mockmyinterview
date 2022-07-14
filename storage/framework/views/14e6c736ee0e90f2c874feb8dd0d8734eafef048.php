

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

                <div class="row mx-auto custome" style="border: 2px solid #eee;">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group float-label-control">
                                <label for="start-date">Start Date</label>
                                <input type="text" name="start_date" class="form-control datepicker" id="start-date" value="<?php echo e(old('start_date')); ?>" placeholder="Start Date">
                                <span style="color: red"><?php echo e($errors->first('start_date')); ?></span>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group float-label-control">
                                <label for="end-date">End Date</label>
                                <input type="text" name="end_date" class="form-control datepicker" id="end-date" value="<?php echo e(old('end_date')); ?>" placeholder="End Date">
                                <span style="color: red"><?php echo e($errors->first('end_date')); ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="row custome-interview-types">
                        <div class="col-md-5">
                            <input type="hidden" id="parent-types" data-parent-types="<?php echo e(json_encode($parent_interview_types)); ?>">
                            <label for="start-date">Parent Interview Type</label>
                            <select name="parent_ids[]" id="" class="form-control parent-type">
                                <option value="" disabled selected>Select parent</option>
                                <?php $__currentLoopData = $parent_interview_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($type->id); ?>"><?php echo e($type->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <span style="color: red"><?php echo e($errors->first('parent_ids')); ?></span>
                        </div>
                        
                        <div class="col-md-5">
                            <div class="form-group float-label-control">
                                <label for="start-date">Child Interview Type</label>
                                <span id="child-types">
                                    <select name="child_interview_types" multiple id="child_interview_type_id" class="form-control"></select>
                                    <span style="color: red"><?php echo e($errors->first('child_interview_types')); ?></span>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-success btn-sm add-more-types-btn" style="margin-top: 35px"><i class="fa fa-plus"></i></button>
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
                                <span style="color: red"><?php echo e($errors->first('mornings')); ?></span>
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
        $(document).on('click', '.add-more-types-btn', function(){
            var selected=[];
            $('.parent-type :selected').each(function(){
                if($(this).val() != 'empty'){
                    selected[$(this).val()]=$(this).text();
                }
            }); 

            var parent_interview_types = $('#parent-types').data('parent-types');
            var html = '';

                html =  '<div class="row custome-interview-types">'+
                            '<div class="col-md-5">'+
                                '<select name="parent_ids[]" id="" class="form-control parent-type">'+
                                    '<option value="" disabled selected>Select parent</option>';
                                    jQuery.each(parent_interview_types, function(index, item) {
                                        if( $.inArray(item.name, selected) == -1 ) {
                                            html += '<option value="'+item.id+'">'+item.name+'</option>';
                                        }
                                    });
                                html += '</select>'+
                                '<span style="color: red"><?php echo e($errors->first("parent_id")); ?></span>'+
                            '</div>'+
                            
                            '<div class="col-md-5">'+
                                '<div class="form-group float-label-control">'+
                                    '<span id="child-types"><select name="child_interview_types" multiple id="child_interview_type_id" class="form-control"></select></span>'+
                                '</div>'+
                            '</div>'+
                            '<div class="col-md-2">'+
                                '<button type="button" class="btn btn-danger btn-sm remove-custome-btn"><i class="fa fa-times"></i></button>'+
                            '</div>'+
                        '</div>';
            $('.custome').append(html);
        });

        $(document).on('click', '.remove-custome-btn', function(){
            $(this).parents('.custome-interview-types').remove();
        });
        
        $(document).on('change', '.parent-type', function(){
            var parent_id = $(this).val();
            var current = $(this);
            $.ajax({
                url : "<?php echo e(route('get-child-interview-types')); ?>",
                data : {'parent_id' : parent_id},
                success : function(response){
                    var html = '<select name="child_interview_types['+response.parent_id+'][]" multiple id="child_interview_type_id" class="form-control">'+
                                '<label for="start-date">Child Interview Type</label>'+
                                '<option value="" selected>Select child interview type</option>';
                    $.each(response.child_interview_types , function(index, val) { 
                       html += '<option value="'+val.id+'">'+val.name+'</option>';
                    });
                    html += '</select>';

                    current.parents('.custome-interview-types').find('#child-types').html(html);
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
<?php $__env->stopPush(); ?>
<?php echo $__env->make('web-views.dashboard.master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/web-views/interviewer/schedule-interview.blade.php ENDPATH**/ ?>