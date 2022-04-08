<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title> @yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/hero-img.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('public/web/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/web/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('public/web/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/web/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/web/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/web/assets/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{asset('public/admin/assets/css/toastr.min.css')}}">

    <!-- Template Main CSS File -->
    <link href="{{ asset('public/web/assets/css/dashboard.css') }}" rel="stylesheet">
    <script src="{{ asset('public/web/assets/js/jquery-3.2.1.slim.min.js') }}"></script>
    <script src="{{ asset('public/web/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('public/web/assets/js/bootstrap.min.js') }}"></script>
    <style>
        .logged-in {
            color: green;
        }
        .logged-out {
            color: red;
        }
    </style>
    @stack('css')
</head>

<body>
    <section> 
        <!-- Header -->
        @include('web-views.dashboard.master.header')
        <!-- Header -->

        <div class="main">
        <!-- Sideber -->
        @include('web-views.dashboard.master.sidebar')
        <!-- Sideber -->

        <div class="content_1">
            @yield('content')
        </div>
    </section>

    <!-- Vendor JS Files -->
    <script src="{{ asset('public/web/assets/vendor/purecounter/purecounter.js') }}"></script>
    <script src="{{ asset('public/web/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('public/web/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('public/web/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('public/web/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('public/web/assets/vendor/php-email-form/validate.js') }}"></script>

    <!--  Main JS File -->
    <script src="{{ asset('public/web/assets/js/main.js') }}"></script>
    <script src="{{ asset('public/web/assets/js/jquery-3.6.0.js') }}"></script>
    <script src="{{ asset('public/web/assets/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/toastr.min.js') }}"></script>

    @stack('js')
    <script>
		@if(Session::has('message'))
		toastr.options =
		{
			"closeButton" : true,
			"progressBar" : true
		}
				toastr.success("{{ session('message') }}");
		@endif

		@if(Session::has('error'))
		toastr.options =
		{
			"closeButton" : true,
			"progressBar" : true
		}
				toastr.error("{{ session('error') }}");
		@endif

		@if(Session::has('info'))
		toastr.options =
		{
			"closeButton" : true,
			"progressBar" : true
		}
				toastr.info("{{ session('info') }}");
		@endif

		@if(Session::has('warning'))
		toastr.options =
		{
			"closeButton" : true,
			"progressBar" : true
		}
				toastr.warning("{{ session('warning') }}");
		@endif
	</script>
    <script>
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

</html>