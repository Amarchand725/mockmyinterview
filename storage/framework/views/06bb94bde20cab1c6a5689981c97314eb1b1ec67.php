

<?php $__env->startSection('title', $page_title); ?>

<?php $__env->startSection('content'); ?>
    <div class="container py-3 ">
        <div class="row mx-auto">
            <h2 class="mb-3">Test My Setup</h2>
            <div class="row   mx-auto  ">
                <div class="col-md-12 email_verificaion_box bg-white  ">
                    <button class="btn btn primary  view_btn">  Microphone Test  </button>
                </div>
            </div>
            <div class="row   mx-auto  ">
                <div class="col-md-12 email_verificaion_box bg-white  ">
                    <button class="btn btn primary  view_btn">  Webcam Test </button>
                </div>
                <center>
                    <span class="band_test"><a href="#">Bandwidth Test</a></span>
                </center>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('web-views.dashboard.master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/web-views/candidate/test-setup.blade.php ENDPATH**/ ?>