

<?php $__env->startSection('title', $page_title); ?>

<?php $__env->startPush('css'); ?>
    
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid py-3 ">
        <div class="row mx-auto">
            <h2 class="mb-3"><?php echo e($page_title); ?></h2>
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
            <form action="<?php echo e(route('book_interview.store')); ?>" method="post">
                <?php echo csrf_field(); ?>

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
                                            <input type="radio" name="interview_type" value="hr" class="form-check-input" id="hr" checked <?php if(sizeof(Auth::user()->hasUserQualification) == 0): ?> disabled <?php endif; ?>>
                                            <label class="form-check-label" for="hr">
                                                HR
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input type="radio" name="interview_type" value="technical" class="form-check-input" id="technical" <?php if(sizeof(Auth::user()->hasUserQualification) == 0): ?> disabled <?php endif; ?>>
                                            <label class="form-check-label" for="technical">
                                                Technical
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <input type="radio" name="interview_type" value="specialized" class="form-check-input" id="spacialized" <?php if(sizeof(Auth::user()->hasUserQualification) == 0): ?> disabled <?php endif; ?>>
                                            <label class="form-check-label" for="spacialized">
                                                Specialized
                                            </label>
                                        </div>
                                    </div>
                                    <div>
                                        <span style="color: red"><?php echo e($errors->first('interview_type')); ?></span>
                                    </div>
                                </div>
                                <!-- date -->
                                <div class="mt-3">
                                    <input type="text" class="form-control datepicker" name="date" value="<?php echo e(date('d/m/Y')); ?>" id="current-date">
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
                                        <span id="first_date"><?php echo e(date('d M Y')); ?></span>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row parent">
                                            <?php
                                            $date = date('Y-m-d');
                                            $day = date("D", strtotime($date));
                                            ?>
                                            <?php if(sizeof($slots)>0): ?>
                                                <?php if($day == 'Sat' || $day == 'Sun'): ?>
                                                    <?php $__currentLoopData = $slots['weekends_slots']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $weekend_slot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="col-sm-2">
                                                            <article class="feature1 slot">
                                                                <input type="radio" name="booked_slots[<?php echo e($weekend_slot['interviewer_id']); ?>]" value="<?php echo e($weekend_slot['slot']); ?>" id="feature1"/>
                                                                <span><?php echo e($weekend_slot['slot']); ?></span>
                                                            </article>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php else: ?>
                                                    <?php $__currentLoopData = $slots['weekdays_slots']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $weekday_slot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="col-sm-2">
                                                            <article class="feature1 slot">
                                                                <input type="radio" name="booked_slots[<?php echo e($weekday_slot['interviewer_id']); ?>]" value="<?php echo e($weekday_slot['slot']); ?>" id="feature1"/>
                                                                <span><?php echo e($weekday_slot['slot']); ?></span>
                                                            </article>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            <?php else: ?> 
                                                Not available slot
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="row" id="slotsInDate">
                                    <div class="col-md-2 available-date ng-binding" id="slotDate">
                                        <span id="second_date"><?php echo e(date('d M Y', strtotime("+1 day"))); ?></span>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row parent">
                                            <?php
                                            $date = date('Y-m-d', strtotime("+1 day"));
                                            $day = date("D", strtotime($date));
                                            ?>
                                            <?php if(sizeof($next_slots)>0): ?>
                                                <?php if($day == 'Sat' || $day == 'Sun'): ?>
                                                    <?php $__currentLoopData = $next_slots['weekends_slots']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $weekend_slot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="col-sm-2">
                                                            <article class="feature1 slot">
                                                                <input type="radio" name="booked_slots[<?php echo e($weekend_slot['interviewer_id']); ?>]" value="<?php echo e($weekend_slot['slot']); ?>" id="feature1"/>
                                                                <span><?php echo e($weekend_slot['slot']); ?></span>
                                                            </article>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php else: ?>
                                                    <?php $__currentLoopData = $next_slots['weekdays_slots']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $weekday_slot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="col-sm-2">
                                                            <article class="feature1 slot">
                                                                <input type="radio" name="booked_slots[<?php echo e($weekday_slot['interviewer_id']); ?>]" value="<?php echo e($weekday_slot['slot']); ?>" id="feature1"/>
                                                                <span><?php echo e($weekday_slot['slot']); ?></span>
                                                            </article>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            <?php else: ?> 
                                                Not available slot
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <div class="row py-3 ml-2">
                                <?php $__currentLoopData = $booking_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <input type="hidden" name="booking_type" value="standard-booking">
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-1">
                                                <div class="priority_circle" style="background: <?php echo e($booking_type->color); ?>"></div>
                                            </div>
                                            <?php if($booking_type->title=='Tentative Booking'): ?>
                                                <div class="col-md-7">
                                            <?php else: ?>
                                                <div class="col-md-10">
                                            <?php endif; ?>
                                                <strong>
                                                    <span class="ml-3">
                                                        <?php echo e($booking_type->title); ?>

                                                        <?php if($booking_type->title!='Tentative Booking'): ?>
                                                            : <?php echo e($booking_type->credits); ?> Credits
                                                        <?php endif; ?>
                                                    </span>
                                                </strong>
                                            </div>
                                            <?php if($booking_type->title=='Tentative Booking'): ?>
                                                <div class="col-sm-1">
                                                    <button type="submit" class="blue-btn-small">Continue</button>
                                                </div>
                                            <?php endif; ?>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </main>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script>
        $(document).on('click', '.slot', function(){
            if($(this).hasClass('active')){
                $(this).removeClass('active');
            }else{
                $(this).addClass('active');
            }
        });
        $(document).on('click', '.slot', function(){
            $('.parent').find('.slot-selected').removeClass("slot-selected")
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
                url : "<?php echo e(route('next_pre_date')); ?>",
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
                url : "<?php echo e(route('next_pre_date')); ?>",
                type : 'GET',
                data: {current_date:current_date, type:type},
                success : function(response){
                    console.log(response);
                    $('.next-slots').html(response);
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('web-views.dashboard.master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/web-views/interviews/create.blade.php ENDPATH**/ ?>