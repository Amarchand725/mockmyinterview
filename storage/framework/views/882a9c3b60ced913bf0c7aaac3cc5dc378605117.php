

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
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                        HR
                                    </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                        Technical
                                    </label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                        Specilized
                                    </label>
                                    </div>
                                </div>
                            </div>
                            <!-- date -->
                            <div class="mt-3">
                                <input type="text" class="form-control datepicker" name="" value="<?php echo e(date('d/m/Y')); ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- scheduling code -->
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
                        <a id="previousDay" ng-click="previousDays()" class="bg-slotDisabledColor">
                           &lt; Previous Day
                        </a>&nbsp;&nbsp;&nbsp;
                        <a id="nextDay" class="prev-next-day" ng-click="nextDays()">
                            Next Day &gt;
                        </a>
                    </div>
                    <!-- iterate here -->
                    <div class="card-block p-0 ">
                        <table class="table  table-responsive  w-100 ">
                            <tbody>
                                <tr>
                                    <th rowspan="3">29 Jan' 2022</th>
                                    <td>10:00AM</td>
                                    <td>10:00AM</td>
                                    <td>10:00AM</td>
                                    <td>10:00AM</td>
                                    <td>10:00AM</td>
                                    <td>10:00AM</td>
                                </tr>
                                <tr>
                                    <td>10:00AM</td>
                                    <td>10:00AM</td>
                                    <td>10:00AM</td>
                                    <td>10:00AM</td>
                                    <td>10:00AM</td>
                                    <td>10:00AM</td>
                                </tr>
                                <tr>
                                    <td>10:00AM</td>
                                    <td>10:00AM</td>
                                    <td>10:00AM</td>
                                    <td>10:00AM</td>
                                    <td>10:00AM</td>
                                    <td>10:00AM</td>
                                </tr>
                                <tr>
                                    <th rowspan="3">29 Jan' 2022</th>
                                    <td>10:00AM</td>
                                    <td>10:00AM</td>
                                    <td>10:00AM</td>
                                    <td>10:00AM</td>
                                    <td>10:00AM</td>
                                    <td>10:00AM</td>
                                </tr>
                                <tr>
                                    <td>10:00AM</td>
                                    <td>10:00AM</td>
                                    <td>10:00AM</td>
                                    <td>10:00AM</td>
                                    <td>10:00AM</td>
                                    <td>10:00AM</td>
                                </tr>
                                <tr>
                                    <td>10:00AM</td>
                                    <td>10:00AM</td>
                                    <td>10:00AM</td>
                                    <td>10:00AM</td>
                                    <td>10:00AM</td>
                                    <td>10:00AM</td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- booking sec -->
                        <hr />
                        <div class="row py-3 ml-2">
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-1">
                                        <div class="priority_circle"></div>
                                    </div>
                                    <div class="col-md-10">
                                        <strong>
                                            <span class="ml-3">                                               
                                                Priority Booking: 1599 Credits
                                            </span>
                                        </strong>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-1">
                                        <div class="regular_circle"></div>
                                    </div>
                                    <div class="col-md-10">
                                        <strong>
                                            <span class="ml-3">                                               
                                                Standard Booking: 1299 Credits
                                            </span>
                                        </strong>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-1">
                                        <div class="waitlist_circle"></div>
                                    </div>
                                    <div class="col-md-7">
                                        <strong>
                                            <span class="ml-3">                                               
                                                Tentative Booking
                                            </span>
                                        </strong>
                                    </div>
                                    <div class="col-md-1">
                                        <button class="blue-btn-small">Continue</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
            </main>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('web-views.dashboard.master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/web-views/candidate/book_interview.blade.php ENDPATH**/ ?>