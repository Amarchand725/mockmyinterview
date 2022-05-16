

<?php $__env->startSection('title', $page_title); ?>

<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

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
            <form action="<?php echo e(route('dopay.online')); ?>" method="post">
                <?php echo csrf_field(); ?>

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
                                <input type="hidden" id="get-coupon-url" value="<?php echo e(url('get_coupon')); ?>">
                                <input type="hidden" id="remove-coupon-url" value="<?php echo e(url('remove-coupon')); ?>">
                                <?php if(Session::has('used_coupon')): ?>
                                    <input class="form-check-input check-coupon-input" type="checkbox" name="is_coupon" checked value="1" id="check-coupon">
                                <?php else: ?> 
                                    <input class="form-check-input check-coupon-input" type="checkbox" name="is_coupon" value="1" id="check-coupon">
                                <?php endif; ?>
                                <label class="form-check-label" for="check-coupon">
                                    I have an offer code  
                                </label>
                                <div class="col-sm-6">
                                    <span id="coupon-input-field">
                                        <?php if(Session::has('used_coupon')): ?>
                                            <div class="row">
                                                <div class="col-sm-10">
                                                    <input type="text" name="coupon_code" readonly value="<?php echo e(Session::get('used_coupon')['coupon_code']); ?>" id="coupon_code" class="form-control" placeholder="Enter valid coupon code.">
                                                    <span style="color:red" id="error-coupon-code"></span>
                                                </div>
                                                <div class="col-sm-2">
                                                    <button type="button" class="btn btn-danger btn-md coupon-remove-btn" data-toggle="tooltip" data-placement="top" title="Remove coupon"><i class="fa fa-times"></i> Remove Coupon</button>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mt-3">
                            <span>Package Price : &nbsp; 	<span class="package-price">$0.00 USD</span></span><br />
                            <span>Discount Price : &nbsp; 	
                                <span id="discount-price">
                                    <?php if(Session::has('used_coupon')): ?>
                                        $<?php echo e(number_format(Session::get('used_coupon')['discount'], 2)); ?> USD
                                    <?php else: ?> 
                                        $0.00 USD
                                    <?php endif; ?>
                                </span>
                            </span><br>
                            <div class="clearfix border"></div>
                            <span>Grand Total : &nbsp; 	
                                <span id="grand-total">
                                    <?php if(Session::has('used_coupon')): ?>
                                        $<?php echo e(Session::get('used_coupon')['sub_total']-Session::get('used_coupon')['discount']); ?> USD
                                    <?php else: ?> 
                                        <span class="package-price">$0.00 USD</span>
                                    <?php endif; ?>
                                </span>
                            </span><br>
                            <div class="tool-tip">
                                <div class="title">
                                    <button type="button" id="proceed-btn" type="submit" class="btn btn-info">
                                        Proceed
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto proceed-payment" style="display: none">
                    <?php
                        $months = array(1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Aug', 9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec');
                    ?>
                    <div class="card-panel">
                        <div class="media wow fadeInUp" data-wow-duration="1s"> 
                            <div class="companyIcon">
                            </div>
                            <div class="media-body">
                                
                                <div class="container">
                                    <?php if(session('success_msg')): ?>
                                    <div class="alert alert-success fade in alert-dismissible show">                
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true" style="font-size:20px">×</span>
                                        </button>
                                        <?php echo e(session('success_msg')); ?>

                                    </div>
                                    <?php endif; ?>
                                    <?php if(session('error_msg')): ?>
                                    <div class="alert alert-danger fade in alert-dismissible show">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true" style="font-size:20px">×</span>
                                        </button>    
                                        <?php echo e(session('error_msg')); ?>

                                    </div>
                                    <?php endif; ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h1>Payment</h1>
                                        </div>                       
                                    </div>    
                                    <div class="row">                        
                                        <div class="col-xs-12 col-md-12" style="background: rgb(242, 245, 242); border-radius: 5px; padding: 10px;">
                                            <div class="panel panel-primary">                                       
                                                <div class="creditCardForm">                                    
                                                    <div class="payment">
                                                        <div class="row">
                                                            <div class="form-group owner col-md-6">
                                                                <label for="owner">Owner</label>
                                                                <input type="text" class="form-control" id="owner" name="owner" value="<?php echo e(old('owner')); ?>" required>
                                                                <span id="owner-error" class="error text-red">Please enter owner name</span>
                                                            </div>
                                                            <div class="form-group CVV col-md-6">
                                                                <label for="cvv">CVV</label>
                                                                <input type="number" class="form-control" id="cvv" name="cvv" value="<?php echo e(old('cvv')); ?>" required>
                                                                <span id="cvv-error" class="error text-red">Please enter cvv</span>
                                                            </div>
                                                        </div>    
                                                        <div class="row">
                                                            <div class="form-group col-md-6" id="card-number-field">
                                                                <label for="cardNumber">Card Number</label>
                                                                <input type="text" class="form-control" id="cardNumber" name="cardNumber" value="<?php echo e(old('cardNumber')); ?>" required>
                                                                <span id="card-error" class="error text-red">Please enter valid card number</span>
                                                            </div>
                                                            <div class="form-group col-md-6" >
                                                                <label for="amount">Amount</label>
                                                                <?php 
                                                                    $grand_total = '';
                                                                    if(Session::has('used_coupon')){
                                                                        $grand_total = Session::get('used_coupon')['sub_total']-Session::get('used_coupon')['discount'];
                                                                    }
                                                                ?>

                                                                <?php if(Session::has('used_coupon')): ?>
                                                                    <input type="number" class="form-control" id="amount" name="amount" min="1" value="<?php echo e($grand_total); ?>" required>
                                                                <?php else: ?> 
                                                                    <input type="number" class="form-control" id="grand-total-amount" name="amount" min="1" value="<?php echo e($grand_total); ?>" required>
                                                                <?php endif; ?>
                                                                <span id="amount-error" class="error text-red">Please enter amount</span>
                                                            </div>
                                                        </div>    
                                                        <div class="row">
                                                            <div class="form-group col-md-6" id="expiration-date">
                                                                <label>Expiration Date</label><br/>
                                                                <select class="form-control" id="expiration-month" name="expiration-month" style="float: left; width: 200px; margin-right: 10px;">
                                                                    <?php $__currentLoopData = $months; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($k); ?>" <?php echo e(old('expiration-month') == $k ? 'selected' : ''); ?>><?php echo e($v); ?></option>                                                        
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>  
                                                                <select class="form-control" id="expiration-year" name="expiration-year"  style="float: left; width: 200px;">
                                                                    <?php for($i = date('Y'); $i <= (date('Y') + 15); $i++): ?>
                                                                        <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>            
                                                                    <?php endfor; ?>
                                                                </select>
                                                            </div>                                                
                                                            <div class="form-group col-md-6" id="credit_cards" style="margin-top: 22px;">
                                                                <img src="<?php echo e(asset('public/web/assets/authorize-logos/authorize.png')); ?>" width="350px" id="visa">
                                                            </div>
                                                        </div>
                                                        
                                                        <br/>
                                                        <div class="form-group" id="pay-now">
                                                            <button id="addEducationinterviewerProfile" type="submit" class="btn btn-info">
                                                                <?php if(Session::has('used_coupon')): ?>
                                                                    Pay Only $<?php echo e(Session::get('used_coupon')['sub_total']-Session::get('used_coupon')['discount']); ?> USD
                                                                <?php else: ?> 
                                                                    <span id="grand-total-btn">$0.00 USD</span>
                                                                <?php endif; ?>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>                                
                                            </div>
                                        </div>   
                                        <div class="col-md-1"></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div> 
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('public/admin/assets/js/apply-coupon.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('web-views.dashboard.master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/web-views/candidate/wallets/create.blade.php ENDPATH**/ ?>