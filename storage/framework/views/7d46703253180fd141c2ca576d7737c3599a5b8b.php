

<?php $__env->startSection('title', $page_title); ?>

<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="login-box">
        <div class="login-logo" style="width: 370px">
            <b>Send Password Reset Link</b>
        </div>
        <div class="card-body login-box-body">
            <form method="GET" action="<?php echo e(route('admin.send-password-reset-link')); ?>">
                <?php echo csrf_field(); ?>

                <div class="form-group has-feedback">
                    <label for="email" class="col-md-6 col-form-label"><?php echo e(__('Email Address')); ?></label>
                    <input class="form-control" placeholder="Email address" name="email" type="email" autocomplete="off" autofocus>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            <?php echo e(__('Send Password Reset Link')); ?>

                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('auth.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/auth/passwords/forgot-password.blade.php ENDPATH**/ ?>