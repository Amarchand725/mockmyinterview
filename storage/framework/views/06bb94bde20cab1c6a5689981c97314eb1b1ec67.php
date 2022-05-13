

<?php $__env->startSection('title', $page_title); ?>

<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container py-3 ">
        <div class="row mx-auto">
            <h2 class="mb-3">Test My Setup</h2>
            <div class="row mx-auto">
                <div class="col-md-12 email_verificaion_box bg-white  ">
                    <button class="btn btn primary view_btn microphone-test-btn" id="inputFields"> Microphone Test </button>
                    <span id="microphone-msg"></span>
                </div>
            </div>
            <div class="row mx-auto">
                <div class="col-md-12 email_verificaion_box bg-white  ">
                    <button class="btn btn primary webcam-test-btn view_btn">  Webcam Test </button>
                    <span id="webcam-msg"></span>
                    <span id="important-note"></span>
                </div>
                <center>
                    <span class="band_test"><a href="<?php echo e(route('test_webcam')); ?>">Bandwidth Test</a></span>
                </center>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<script>
    $(document).on('click', '.microphone-test-btn', function(){
        getLocalStream();
    });

    function getLocalStream() {
        navigator.mediaDevices.getUserMedia({video: false, audio: true}).then( stream => {
            window.localStream = stream; // A
            window.localAudio.srcObject = stream; // B
            window.localAudio.autoplay = true; // C
            $('#microphone-msg').html('');
        }).catch( err => {
            console.log("u got an error:" + err)
            // $('#microphone-msg').html('Microphone not Functioning. '+ '<button class="btn btn-danger btn-sm microphone-remove-btn"><i class="fa fa-times"></i></button>');
        });
    }

    $(document).on('click', '.microphone-remove-btn', function(){
        $('#microphone-msg').html(" ");
    });

    $(document).on('click', '.webcam-test-btn', function(){
        function getWebCamStream() {
            navigator.mediaDevices.getUserMedia({video: true, audio: false}).then( stream => {
                window.localStream = stream;
                window.localAudio.srcObject = stream;
                window.localAudio.autoplay = false;
            }).catch( err => {
                console.log("u got an error:" + err)
                /* $('#webcam-msg').html('Camera not Functioning. '+ '<button class="btn btn-danger btn-sm webcam-remove-btn"><i class="fa fa-times"></i></button>');
                var html = "<div>"+
                    "<b>Possible Scenario's:</b>"+
                    "<div>"+
                        "1. Make sure your Web Camera is enabled. For example in Windows,to enable Web Came, goto Device Management ==> Imaging device, right click on your Web Camera and Enable."+
                        "2. Check Permission to access Camera in Browser. For Example, in Chrome ==> Settings ==> Camera ==> Check Allow. If it is already allowed, click on Exception and find https://interviewbuddy.in change Block to Allow."+
                    "</div>"+
                "</div>"; */
            $('#important-note').html(html);
            });
        }

        getWebCamStream();
    });

    $(document).on('click', '.webcam-remove-btn', function(){
        $('#webcam-msg').html(" ");
        $('#important-note').html(" ");
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('web-views.dashboard.master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/web-views/candidate/test-setup.blade.php ENDPATH**/ ?>