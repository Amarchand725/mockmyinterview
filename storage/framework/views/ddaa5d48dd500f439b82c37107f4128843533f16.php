

<?php $__env->startSection('title', $page_title); ?>

<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container py-3 ">
        <div class="row mx-auto">
            <h2 class="mb-3">Test My Webcam</h2>
            <div class="row mx-auto">
                <div style="display: flex; flex-direction: column; align-items: center;">
                    <video id="video" style="width: 700px;" autoplay playsinlne></video>
                </div>
            </div>
            <div class="row mx-auto">
                <div class="col-sm-1">
                    <a href="<?php echo e(route('test_setup')); ?>" class="btn btn-danger webcam-test-btn"><i class="fa fa-times"></i> Cancel Test</a>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<script>
    const video = document.getElementById('video');

    const constraints = {
        audio: true,
        video:{
            width:{ min: 1024, ideal: 1280, max: 1920 },
            height:{ min: 576, ideal: 720, max: 1080 }
        }
    }

    async function startWebCam(){
        try{
            const stream = await navigator.mediaDevices.getUserMedia(constraints);
            video.srcObject = stream;
            window.stream = stream;
        }catch (e){
            console.log(e.toString());
        }
    }

    startWebCam();
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('web-views.dashboard.master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/web-views/candidate/test-webcam.blade.php ENDPATH**/ ?>