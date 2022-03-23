

<?php $__env->startSection('title', $page_title); ?>

<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <main id="main">
        <section id="log" class="d-flex align-items-center">
            <div class="container ">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-5 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                        <h1 class="text-center">Sign up
                        </h1>
                        <div class="card signup_v4 mb-30 ">
                            <div class="card-body ">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="condidate-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Candidate</a> </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="interviewer-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Interviewer</a> </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="condidate-tab">
                                        <h4 class="text-center mt-4 mb-4" style="text-transform: uppercase;"></h4>
                                        <form id="condidate" method="POST" action="<?php echo e(route('register')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="role" value="<?php echo e($roles[1]['name']); ?>">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <input type="text" class="form-control" name="name" id="name" placeholder="First Name">
                                                    <span style="color:red"><?php echo e($errors->first('name')); ?></span>
                                                </div>
                                                <div class="form-group col-md-12 mt-3">
                                                    <input type="text" class="form-control" name="last_name" id="inputEmail4" placeholder="Last Name">
                                                </div>
                                                <div class="form-group col-md-12 mt-3">
                                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                                    <span style="color:red"><?php echo e($errors->first('email')); ?></span>
                                                </div>
                                                <div class="form-group col-md-12 mt-3">
                                                    <input type="phone" class="form-control" name="phone" id="inputEmail4" placeholder="Phone">
                                                </div>
                                                <div class="form-group col-md-12 mt-3">
                                                    <input type="password" class="form-control" name="password" id="password" placeholder=" password">
                                                    <span style="color:red"><?php echo e($errors->first('password')); ?></span>
                                                </div>
                                                <div class="form-group col-md-12 mt-3">
                                                    <input type="password" class="form-control" name="password_confirmation" id="confirm-password" placeholder=" confirm password">
                                                    <span style="color:red"><?php echo e($errors->first('password_confirmation')); ?></span>
                                                </div>
                                                <div class="form-group col-md-12 mt-3">
                                                    <input type="password" class="form-control" name="promo_code" id="inputPassword4" placeholder=" Refral/Promo code">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <div class="d-flex flex-wrap justify-content-between align-items-center spantxt">
                                                        <span class="mt-3">Note: You'll receive your email confirmation on your registered email.
                                                        </span>
                                                        <div class="custom-checkbox mt-2">
                                                            <span class="my_ap">  By signing up, you agree to our</span>
                                                            <a href="#" target="_blank"> Terms and Conditions</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-2 mb-3"> 
                                                <button class="btn btn-primary full-width" type="submit">NEXT</button> 
                                            </div>
                                        </form>
                                        <span class="spantxt">
                                            Have already an account? <a ui-sref="access.signup" href="<?php echo e(route('login')); ?>">Log in here</a>
                                        </span>
                                    </div>

                                    <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="interviewer-tab">
                                        <h4 class="text-center mt-4 mb-4" style="text-transform: uppercase;"></h4>
                                        <form id="interviewer" method="POST" action="<?php echo e(route('register')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="role" value="<?php echo e($roles[0]['name']); ?>">
                                            <div class="form-row">
                                                <div class="mt-2 mb-3 linkedin_clr">
                                                    <button class="btn" type="submit">
                                                        <i class="fa fa-linkedin pull-left" aria-hidden="true"></i>
                                                        <span> Connect with Linkedin</span>
                                                    </button>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <input type="text" class="form-control" name="name" id="name" placeholder="First Name">
                                                    <span style="color:red"><?php echo e($errors->first('name')); ?></span>
                                                </div>
                                                <div class="form-group col-md-12 mt-3">
                                                    <input type="text" class="form-control" name="last_name" id="inputEmail4" placeholder="Last Name">
                                                </div>
                                                <div class="form-group col-md-12 mt-3">
                                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                                    <span style="color:red"><?php echo e($errors->first('email')); ?></span>
                                                </div>
                                                <div class="form-group col-md-12 mt-3">
                                                    <input type="phone" class="form-control" name="phone" id="inputEmail4" placeholder="Phone">
                                                </div>
                                                <div class="form-group col-md-12 mt-3">
                                                    <input type="password" class="form-control" name="password" id="password" placeholder=" password">
                                                    <span style="color:red"><?php echo e($errors->first('password')); ?></span>
                                                </div>
                                                <div class="form-group col-md-12 mt-3">
                                                    <input type="password" class="form-control" name="password_confirmation" id="confirm-password" placeholder=" confirm password">
                                                    <span style="color:red"><?php echo e($errors->first('password_confirmation')); ?></span>
                                                </div>
                                                <div class="form-group col-md-12 mt-3">
                                                    <input type="password" class="form-control" name="promo_code" id="inputPassword4" placeholder=" Refral/Promo code">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <div class="d-flex flex-wrap justify-content-between align-items-center spantxt">
                                                        <span class="mt-3">Note: You'll receive your email confirmation on your registered email.
                                                        </span>

                                                        <div class="custom-checkbox mt-2">
                                                            <span class="my_ap">  By signing up, you agree to our</span>
                                                            <a href="#" target="_blank"> Terms and Conditions
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-2 mb-3"> 
                                                <button class="btn btn-primary full-width" type="submit">NEXT</button>
                                                <span class="spantxt">
                                                    Have already an account? <a ui-sref="access.signup" href="<?php echo e(route('login')); ?>"> Log In here</a>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script>
        $("#condidate").validate({
			rules: {
				name: "required",
				email: "required",
				password: "required",
				password_confirmation: "required",
			}
		});

        $("#interviewer").validate({
			rules: {
                name: "required",
				email: "required",
				password: "required",
				password_confirmation: "required",
			}
		});
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.auth.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/web-views/login/signup.blade.php ENDPATH**/ ?>