<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?php echo $__env->yieldContent('title'); ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/hero-img.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo e(asset('public/web/assets/vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/web/assets/vendor/bootstrap-icons/bootstrap-icons.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/web/assets/vendor/boxicons/css/boxicons.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/web/assets/vendor/glightbox/css/glightbox.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/web/assets/vendor/swiper/swiper-bundle.min.css')); ?>" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo e(asset('public/web/assets/css/style.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/css/toastr.min.css')); ?>">
    
    <?php echo $__env->yieldPushContent('css'); ?>
</head>

<body>
    <!-- ======= Header ======= -->
    <?php echo $__env->make('layouts.auth.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Header -->

    <!-- Main -->
    <?php echo $__env->yieldContent('content'); ?>
    <!-- Main -->

    <!-- ======= Footer ======= -->
    <?php echo $__env->make('layouts.web.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="<?php echo e(asset('public/web/assets/vendor/purecounter/purecounter.js')); ?>"></script>
    <script src="<?php echo e(asset('public/web/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/web/assets/vendor/glightbox/js/glightbox.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/web/assets/vendor/isotope-layout/isotope.pkgd.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/web/assets/vendor/swiper/swiper-bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/web/assets/vendor/php-email-form/validate.js')); ?>"></script>

    <!--  Main JS File -->
    <script src="<?php echo e(asset('public/web/assets/js/main.js')); ?>"></script>
    <script src="<?php echo e(asset('public/admin/assets/js/toastr.min.js')); ?>"></script>
    <script>
		<?php if(Session::has('message')): ?>
		toastr.options =
		{
			"closeButton" : true,
			"progressBar" : true
		}
				toastr.success("<?php echo e(session('message')); ?>");
		<?php endif; ?>

		<?php if(Session::has('error')): ?>
		toastr.options =
		{
			"closeButton" : true,
			"progressBar" : true
		}
				toastr.error("<?php echo e(session('error')); ?>");
		<?php endif; ?>

		<?php if(Session::has('info')): ?>
		toastr.options =
		{
			"closeButton" : true,
			"progressBar" : true
		}
				toastr.info("<?php echo e(session('info')); ?>");
		<?php endif; ?>

		<?php if(Session::has('warning')): ?>
		toastr.options =
		{
			"closeButton" : true,
			"progressBar" : true
		}
				toastr.warning("<?php echo e(session('warning')); ?>");
		<?php endif; ?>
	</script>
    <?php echo $__env->yieldPushContent('js'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/layouts/auth/app.blade.php ENDPATH**/ ?>