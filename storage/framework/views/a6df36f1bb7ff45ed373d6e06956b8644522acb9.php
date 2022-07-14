<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title> <?php echo $__env->yieldContent('title'); ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />

    <!-- Favicons -->
    <?php if($home_page_data['header_logo']): ?>
        <link href="<?php echo e(asset('public/admin/assets/images/page')); ?>/<?php echo e($home_page_data['header_favicon']); ?>" rel="icon">
    <?php endif; ?>
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
    <link rel="stylesheet" href="<?php echo e(asset('public/web/assets/css/jquery-ui.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/css/toastr.min.css')); ?>">

    <!-- Template Main CSS File -->
    <link href="<?php echo e(asset('public/web/assets/css/dashboard.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('public/web/assets/css/custome.css')); ?>">
    <script src="<?php echo e(asset('public/web/assets/js/jquery-3.2.1.slim.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/web/assets/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/web/assets/js/bootstrap.min.js')); ?>"></script>
    
    <?php echo $__env->yieldPushContent('css'); ?>
</head>

<body>
    <section> 
        <!-- Header -->
        <?php echo $__env->make('web-views.dashboard.master.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Header -->

        <div class="main">
            <!-- Sideber -->
            <?php echo $__env->make('web-views.dashboard.master.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- Sideber -->

            <!-- main content -->
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </section>

    <!-- Vendor JS Files -->
    <script src="<?php echo e(asset('public/web/assets/vendor/purecounter/purecounter.js')); ?>"></script>
    <script src="<?php echo e(asset('public/web/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/web/assets/vendor/glightbox/js/glightbox.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/web/assets/vendor/isotope-layout/isotope.pkgd.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/web/assets/vendor/swiper/swiper-bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/web/assets/vendor/php-email-form/validate.js')); ?>"></script>

    <!--  Main JS File -->
    <script src="<?php echo e(asset('public/web/assets/js/main.js')); ?>"></script>
    <script src="<?php echo e(asset('public/web/assets/js/jquery-3.6.0.js')); ?>"></script>
    <script src="<?php echo e(asset('public/web/assets/js/jquery-ui.js')); ?>"></script>
    <script src="<?php echo e(asset('public/admin/assets/js/toastr.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/admin/assets/js/search.js')); ?>"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php echo $__env->yieldPushContent('js'); ?>

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
	
        $(document).ready(function() {
            $('.button-left').click(function() {
                $('.sidebar').toggleClass('fliph');
            });
        });
        $( function() {
            $( ".datepicker" ).datepicker();
        } );
    </script>
</body>
</html><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/web-views/dashboard/master/app.blade.php ENDPATH**/ ?>