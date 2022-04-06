

<?php $__env->startSection('title', $page_title); ?>

<?php $__env->startPush('css'); ?>
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

        .next-btn{
            color: #0d6efd;
            
        }
        .next-btn:focus, .next-btn:hover {
            color: #014c8c;
            text-decoration: underline;
            cursor: pointer;
        }
        .available-date {
            font-family: Open Sans;
            font-size: 18px;
            font-weight: 700;
            color: #333;
        }
    </style>
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
                                        <input type="radio" name="interview_type" class="form-check-input" id="hr" <?php if(empty(Auth::user()->hasUserQualification)): ?> disabled <?php endif; ?>>
                                        <label class="form-check-label" for="hr">
                                        HR
                                    </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input type="radio" name="interview_type" class="form-check-input" id="technical" <?php if(empty(Auth::user()->hasUserQualification)): ?> disabled <?php endif; ?>>
                                        <label class="form-check-label" for="technical">
                                        Technical
                                    </label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-check">
                                        <input type="radio" name="interview_type" class="form-check-input" id="spacialized" <?php if(empty(Auth::user()->hasUserQualification)): ?> disabled <?php endif; ?>>
                                        <label class="form-check-label" for="spacialized">
                                        Specialized
                                    </label>
                                    </div>
                                </div>
                            </div>
                            <!-- date -->
                            <div class="mt-3">
                                <input type="text" class="form-control datepicker" name="" value="<?php echo e(date('d/m/Y')); ?>" id="current-date">
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
                                 <div class="row">
                                    <?php 
                                    $date = date('Y-m-d');
                                    $day = date("D", strtotime($date));
                                    ?>
                                    <?php if($day == 'Sat' || $day == 'Sun'): ?>
                                        <?php $__currentLoopData = $slots['weekends_slots']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $weekend_slot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-sm-2">
                                                <button class="mt-3 slot"><?php echo e($weekday_slot); ?></button>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <?php $__currentLoopData = $slots['weekdays_slots']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $weekday_slot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-sm-2">
                                                <button class="mt-3 slot"><?php echo e($weekday_slot); ?></button>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                    <div class="row">
                                        <?php 
                                        $date = date('d M Y', strtotime("+1 day"));
                                        $day = date("D", strtotime($date));
                                        ?>
                                        <?php if($day == 'Sat' || $day == 'Sun'): ?>
                                            <?php $__currentLoopData = $slots['weekends_slots']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $weekend_slot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-sm-2">
                                                    <button class="mt-3 slot"><?php echo e($weekend_slot); ?></button>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <?php $__currentLoopData = $slots['weekdays_slots']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $weekday_slot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-sm-2">
                                                    <button class="mt-3 slot"><?php echo e($weekday_slot); ?></button>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="row py-3 ml-2">
                            <?php $__currentLoopData = $booking_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                                <button class="blue-btn-small">Continue</button>
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
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
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
                    $('.next-slots').html(response);
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('web-views.dashboard.master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/web-views/candidate/book_interview.blade.php ENDPATH**/ ?>