

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
                                    <input class="form-check-input" checked data-price="<?php echo e($priority->price); ?>" value="<?php echo e($priority->id); ?>" type="radio" name="priority_id" id="priority-<?php echo e($priority->id); ?>">
                                <?php else: ?> 
                                    <input class="form-check-input" data-price="<?php echo e($priority->price); ?>" value="<?php echo e($priority->id); ?>" type="radio" name="priority_id" id="priority-<?php echo e($priority->id); ?>">
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

                <div class="row">
                    <div class="col-md-8 mt-3">
                        <div class="form-check check-coupon-input">
                            <input class="form-check-input check-coupon-input" type="checkbox" name="coupon" value="1" id="check-coupon">
                            <label class="form-check-label" for="check-coupon">
                                I have an offer code  
                            </label>
                            <div class="col-sm-6">
                                <span id="coupon-input-field"></span>
                            </div>
                        </div>
                        <span class="mb-3 "><b>Authorize.Net Payment Gateway</b></span> <br>
                        <span class="paymt_img">
                            <a href="#">
                                <img src="<?php echo e(asset('public/uploads/authorize-net-logo.png')); ?>" style="width: 242px !important" alt="paypal" class="img-fluid ">
                            </a>
                        </span>
                    </div>
                    <div class="col-md-3 mt-3">
                        <span>Package Price : &nbsp; 	<span id="package-price">$40.99 USD</span></span><br />
                        <span>Discount Price : &nbsp; 	<span id="discount-price">$0 USD</span></span><br>
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
        $('.check-coupon-input input').on('change', function() {
            var checked = $('input[name=coupon]:checked', '.check-coupon-input').val();
            if(checked){
                var html = '<div class="row">'+
                                '<div class="col-sm-10">'+
                                    '<input type="text" name="coupon_code" id="coupon_code" class="form-control" placeholder="Enter valid coupon code.">'+
                                    '<span style="color:red" id="error-coupon-code"></span>'+
                                '</div>'+
                                '<div class="col-sm-2">'+
                                    '<button class="btn btn-info btn-md coupon-apply-btn">Apply Coupon</button>'+
                                '</div>'+
                            '</div>';
                $('#coupon-input-field').html(html);
            }else{
                $('#coupon-input-field').html('');
            }
        });

        $(document).on('keyup', '#coupon_code', function(){
            var code = $(this).val();
            if(code.length > 6){
                $('#error-coupon-code').html('Invalid code');
            }else{
                $('#error-coupon-code').html('');
            }
        });

        $(document).on('click', '.coupon-apply-btn', function(){
            var coupon_code = $('#coupon_code').val();
            if(coupon_code.length == 0){
                $('#error-coupon-code').html('Enter code!');
            }else if(coupon_code.length < 6 || coupon_code.length > 6){
                $('#error-coupon-code').html('Invalid code');
            }else{
                $('#error-coupon-code').html('');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "Do you want to apply coupon code!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, apply it!'
                }).then((result) => {
                    $.ajax({
                        url : "<?php echo e(url('get-coupon')); ?>",
                        data : {'coupon_code' : coupon_code},
                        type : 'GET',
                        success : function(response){

                            console.log("===== " + response + " =====");

                        }
                    });
                    /* if (result.isConfirmed) {
                        Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )
                    } */
                })
            }
        });

        $('.form-check input').on('change', function() {
            var price = $('input[name=priority_id]:checked', '.form-check').attr('data-price');
            $('#package-price').html('$'+ price+' USD');
            $('.blue-btn-small').html('Pay Only $'+ price + ' USD');
        });

        $(document).ready(function(){
            var price = $('input[name=priority_id]:checked', '.form-check').attr('data-price');
            $('#package-price').html('$'+ price+' USD');
            $('.blue-btn-small').html('Pay Only $'+ price + ' USD');
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('web-views.dashboard.master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/web-views/candidate/wallets/create.blade.php ENDPATH**/ ?>