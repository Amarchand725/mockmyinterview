

<?php $__env->startSection('title', $page_title); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid py-3 ">
        <div class="row mx-auto">
            <h2 class="mb-3">Buy Credits</h2>
            <div class="col-md-12 mx-auto email_verificaion_box ">
                <div class="row side-heading-font">
                    <span class="col-md-12"><center>Update your 'Profile' before attending your session for a complete evaluation!</center></span>
                </div>
            </div>

            <div class="clear-fix"></div>
            <div class="row mx-auto ">
                <div class="col-md-5 well">
                    <div class="bg-white  py-3">
                        <?php $__currentLoopData = $booking_priorities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$priority): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-check">
                                <?php if($key==0): ?>
                                    <input type="hidden" name="priority_price" value="<?php echo e($priority->price); ?>">
                                    <input class="form-check-input" checked type="radio" name="priority_id" id="priority-<?php echo e($priority->id); ?>">
                                <?php else: ?> 
                                    <input class="form-check-input" type="radio" name="priority_id" id="priority-<?php echo e($priority->id); ?>">
                                <?php endif; ?>
                                <label class="form-check-label" for="priority-<?php echo e($priority->id); ?>">
                                    <?php echo e(Str::upper($priority->type)); ?>: <?php echo e($priority->credits); ?> credits for $<?php echo e(number_format($priority->price, 2)); ?> USD
                                </label>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <?php if(isset($home_page_data['terms'])): ?>
                    <div class="col-md-5 well ml-3">
                        <div class="bg-white  py-2">
                            <div>
                                <?php echo $home_page_data['terms']; ?>

                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <!-- paypal sec -->

                <div class="row">
                    <div class="col-md-8 mt-3">
                        
                        <span class="mb-3 "><b>Authorize.Net Payment Gateway</b></span> <br>
                        <span class="paymt_img">
                            <a href="#">
                                <img src="<?php echo e(asset('public/uploads/authorize-net-logo.png')); ?>" style="width: 242px !important" alt="paypal" class="img-fluid ">
                            </a>
                        </span>
                    </div>
                    <div class="col-md-3 mt-3">
                        <span>Package Price : &nbsp; 	<span id="package-price">$40.99 USD</span></span><br />
                        
                        <div class="clearfix border"></div>
                        <div class="tool-tip">
                            <div class="title">
                                <button id="addEducationinterviewerProfile" class="blue-btn-small">
                                    Pay Only $40.99 USD
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script>
        $(document).ready(function(){
            var price = $('input[name="priority_price"]').val();
            $('#package-price').html('$'+ price+' USD');
            $('.blue-btn-small').html('Pay Only $'+ price + ' USD');
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('web-views.dashboard.master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/web-views/candidate/wallets/create.blade.php ENDPATH**/ ?>