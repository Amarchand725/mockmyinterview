

<?php $__env->startSection('title', $page_title); ?>

<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid py-3 ">
        <div class="row mx-auto">
            <div class="col-md-12 email_verificaion_box ">
                <div class="row side-heading-font">
                    <span class="col-md-12"><center>Update your 'Profile' before attending your session for a complete evaluation!</center></span>
                </div>
            </div>
            <div class="col-md-12 email_verificaion_box ">
                <div class="row ">
                    <div class="col-md-12">
                        <span class="side-heading-font">Verify your Email </span>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-12">
                        <span class="sub-text-normal">
                            We have sent a verification mail to your registered email address. Open your email and click on the confirmation link.
                        </span>
                    </div>
                    <div class="col-md-12 mt-3">
                        <div class="col-md-6 padding-none ng-scope" ng-if="user.group == 1">
                            <button class="btn-default-enabled " type="button" ng-click="update_email()"><span style="text-align:center;">Update Email</span>
                            </button> &nbsp;&nbsp;
                            <button class="btn-default-enabled " type="button" id="verifyemail" ng-click="send_verification_email()"><span style="text-align:center;">Resend Email</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mx-auto">
            <div class="col-md-12 well bg-white text-center shedule-first">
                <center>
                    <h1 class="main-content-heading-font">
                        Get Yourself Interview Ready!
                    </h1>

                    <button class="col-md-4 blue-btn-large" type="button" id="scheduleFirstInterview" ng-show="!is_sessions_completed &amp;&amp; !is_sessions_scheduled" ng-click="schedule_session()" aria-hidden="false">Schedule First Interview</button>
                </center>
            </div>
        </div>

        <div class=" well mx-auto mt-4 p-4">
            <h2>Resources</h2>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <span class="res_img pull-left">
                            <img src="assets/img/Interview Tips 2.png" alt="" class="img-fluid">
                            <span class="ml-2">
                                <a href="#">
                                    How to Refine Your English through Listening
                                </a> 
                            </span>
                        </span>
                    </div>
                    <div class="col-md-4">
                        <span class="carrer_man">Career Management</span>
                        <span class="carrer ">Career </span>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-6">
                        <span class="res_img pull-left">
                            <img src="assets/img/Interview Tips 2.png" alt="" class="img-fluid">
                            <span class="ml-2"><a href="#">
                            How to Refine Your English through Listening
                            </a> </span>
                        </span>
                    </div>
                    <div class="col-md-4">
                        <span class="carrer_man">Career Management</span>
                        <span class="carrer ">Career </span>
                    </div>
                </div>
                <div class="col-md-12 mt-2">
                    <div class="col-md-6">

                        <span class="res_img pull-left">
                            <img src="assets/img/Interview Tips 2.png" alt="" class="img-fluid">
                            <span class="ml-2"><a href="#">
                            How to Refine Your English through Listening
                            </a> </span>
                        </span>
                    </div>
                    <div class="col-md-4">
                        <span class="carrer_man">Career Management</span>
                        <span class="carrer ">Career </span>
                    </div>
                </div>
                <div class="col-md-12 mt-2">
                    <div class="col-md-6">

                        <span class="res_img pull-left">
                            <img src="assets/img/Interview Tips 2.png" alt="" class="img-fluid">
                            <span class="ml-2"><a href="#">
                            How to Refine Your English through Listening
                            </a> </span>
                        </span>
                    </div>
                    <div class="col-md-4">
                        <span class="carrer_man">Career Management</span>
                        <span class="carrer ">Career </span>
                    </div>
                    <button class="btn btn primary pull-right view_btn">View All</button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('web-views.dashboard.master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/web-views/dashboard/condidate.blade.php ENDPATH**/ ?>