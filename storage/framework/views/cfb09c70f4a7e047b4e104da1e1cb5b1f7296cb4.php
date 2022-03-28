

<?php $__env->startSection('title', $page_title); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid py-3 ">
        <div class="row mx-auto">
            <h2 class="mb-3">Refer and Earn </h2>
            <div class="row">
                <div class="col-md-12 email_verificaion_box bg-white  ">
                    <span>                                
                        <b> Invite friends and get free credits </b>
                    </span>
                    <div>
                        <span class="sub-text-normal">                                   
                            When a friend of you joins through your invite and books first interview, both of you will get 100 Credits.
                        </span>
                    </div>
                    <div class=" mt-3 sub-heading-font-bold">
                        <b>Referral Code:</b> &nbsp;&nbsp;&nbsp;<span class="sub-text-normal">
                            <i class="ng-binding">6a820000</i></span>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row ">
                        <div class="col-md-6 mt-3">
                            <div class="form-group float-label-control">
                                <label for=""><b>Invite friends by email:</b>  </label>
                                <input type="email" class="form-control" placeholder="Add your friends emails here">
                            </div>

                        </div>
                        <div class="col-md-2 ">
                            <button type="submit" class="btn btn-primary pull-left blue-btn-small">send</button>
                        </div>
                        <div class="col-md-12">
                            <b>Note:</b> Use comma separated emails to invite multiple friends.
                        </div>
                    </div>

                    <div class="row ">
                        <div class="col-md-6 mt-3">
                            <div class="form-group float-label-control">
                                <label for="">
                                    Share your invite link
                                    </label>
                                <input type="email" class="form-control" placeholder="https//www.LinkedIn.com">
                            </div>

                        </div>
                        <div class="col-md-2 ">
                            <button type="submit" class="btn btn-primary pull-left blue-btn-small">send</button>
                        </div>

                        <div class="col-md-12  bg-white ">
                            <div class="table-responsive border-0">
                                <table class="table" data-paging="true" data-filtering="true" data-sorting="true" data-state="true">
                                    <thead>
                                        <tr>
                                            <th data-breakpoints="xs">Name</th>
                                            <th data-breakpoints="xs">Email</th>
                                            <th data-breakpoints="xs">Date of Joined</th>
                                            <th data-breakpoints="xs">Credits Earned</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr></tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>



                </div>



            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('web-views.dashboard.master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/web-views/interviewer/refer_earn.blade.php ENDPATH**/ ?>