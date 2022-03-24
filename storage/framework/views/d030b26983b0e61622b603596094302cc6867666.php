

<?php $__env->startSection('title', $page_title); ?>

<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <main id="main">
        <section id="log" class="d-flex align-items-center">
            <div class="container ">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-5 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                        <h1 class="text-center">FORGOT PASSWORD</h1>
                        <div class="card signup_v4 mb-30 ">
                            <div class="card-body ">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="candidate-login" role="tabpanel" aria-labelledby="candidate-login-tab">
                                        <h4 class="text-center mt-4 mb-4" style="text-transform: uppercase;"></h4>
                                        <form method="POST" action="<?php echo e(route('verified-account')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email" required=""> 
                                                    <span style="color:red"><?php echo e($errors->first('email')); ?></span>
                                                </div>
                                            </div>
                                            <div class="mt-2 mb-3"> <button class="btn btn-primary full-width" type="submit">Verify Account</button> </div>
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
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.auth.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/web-views/login/forgot-password.blade.php ENDPATH**/ ?>