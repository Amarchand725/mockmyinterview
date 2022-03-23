<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin Login</title>

	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/css/bootstrap.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/css/font-awesome.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/css/ionicons.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/css/datepicker3.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/css/all.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/css/select2.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/css/dataTables.bootstrap.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/css/AdminLTE.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/css/_all-skins.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/css/style.css')); ?>">
	<style>
		.login-page {
			background: #333;
		}
		.login-logo {
			color: #fff;
		}
	</style>

</head>

<body class="hold-transition login-page sidebar-mini">

<div class="login-box">
	<div class="login-logo">
		<b>Admin Panel</b>
	</div>
    <div class="card-body login-box-body">
        <form method="POST" action="<?php echo e(route('admin.login')); ?>">
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
			<div class="form-group has-feedback">
                <label for="password" class="col-md-6 col-form-label text-md-end"><?php echo e(__('Password')); ?></label>
				<input class="form-control" placeholder="Password" name="password" type="password" autocomplete="off" value="">
                <?php $__errorArgs = ['password'];
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

            <div class="row mb-3">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>

                        <label class="form-check-label" for="remember">
                            <?php echo e(__('Remember Me')); ?>

                        </label>
                    </div>
                </div>
            </div>

            <div class="row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        <?php echo e(__('Login')); ?>

                    </button>

                    <?php if(Route::has('password.request')): ?>
                        <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                            <?php echo e(__('Forgot Your Password?')); ?>

                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="<?php echo e(asset('public/admin/assets/js/jquery-2.2.3.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/assets/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/assets/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/assets/js/dataTables.bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/assets/js/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/assets/js/jquery.inputmask.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/assets/js/jquery.inputmask.date.extensions.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/assets/js/jquery.inputmask.extensions.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/assets/js/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/assets/js/bootstrap-datepicker.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/assets/js/icheck.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/assets/js/fastclick.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/assets/js/jquery.sparkline.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/assets/js/jquery.slimscroll.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/assets/js/app.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/assets/js/demo.js')); ?>"></script>

</body>
</html><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/auth/login.blade.php ENDPATH**/ ?>