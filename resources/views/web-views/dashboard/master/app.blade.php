<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title> @yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    @if($home_page_data['header_logo'])
        <link href="{{ asset('public/admin/assets/images/page') }}/{{ $home_page_data['header_favicon'] }}" rel="icon">
    @endif
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
    <!-- Slots -->
    <style>
        .table tbody td {
            vertical-align: bottom;
            border-bottom: 0 !important;
        }
        .table tbody th {
            border-bottom: 0 !important;
        }
        .table td, .table th {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 0px solid #eceeef;
            /* padding-left: 80px; */
        }
        .slot{
            border: none;
            font-style: inherit;
            font-variant: inherit;
            font-stretch: inherit;
            line-height: inherit;
            font-size: 16px;
            font-family: "Open Sans";
            cursor: pointer;
            border: 2px solid;
            border-radius: 15px;
            padding: 5px 17px;
            border-color: #050505f2;
            background: #847e7e;
            color: white;
        }
        .slot-selected{
            color: #fff!important;
            border-radius: 4px;
            background: #008739!important;
            border: 2px solid;
            border-radius: 15px;
            padding: 5px 17px;
            border-color: #050505f2;
        }

        .next-btn{
            color: #0d6efd;

        }
        .next-btn:focus, .next-btn:hover {
            color: #014c8c;
            text-decoration: underline;
            cursor: pointer;
        }
        .available-date {
            font-family: Open Sans;
            font-size: 18px;
            font-weight: 700;
            color: #333;
        }
        .app {
            max-width: 300px;
            margin: 0 auto;
        }

        .app i {
            font-size: 80px;
            animation-duration: 3s;
            animation-name: slidein;
            animation-iteration-count: 1;
        }

        article {
            position: relative;
            margin: 4px;
            float: left;
            border: 2px solid #000;
            padding: 2px 2px 2px 9px;
            background: #847e7e;
            color: #fff;
            font-size: 18px;
            width: 76px;
            height: 35px;
            font-weight: bold;
            border-radius: 14px;
        }
        article .active {
            position: relative;
            margin: 4px;
            float: left;
            border: 2px solid #000;
            padding: 2px 2px 2px 9px;
            background: #847e7e;
            color: #fff;
            font-size: 18px;
            width: 76px;
            height: 35px;
            font-weight: bold;
            border-radius: 14px;
        }

        article div {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            line-height: 25px;
            transition: .5s ease;
        }

        article div:active{
            background-color: #008739
        }

        article input {
            position: absolute;
            top: 0;
            left: 0;
            width: 140px;
            height: 100px;
            opacity: 0;
            cursor: pointer;
        }

        .feature1 input[type=checkbox]:checked ~ div {
            background-color: #008739;
        }

        .upgrade-btn {
            display: block;
            margin: 30px auto;
            width: 200px;
            padding: 10px 20px;
            border: 2px solid #008739;
            border-radius: 50px;
            color: #f5f5f5;
            font-size: 18px;
            font-weight: 600;
            text-decoration: none;
            transition: .3s ease;
        }

        .upgrade-btn:hover {
            background-color: #008739;
        }

        .blue-color {
            color: #008739;
        }

        .gray-color {
            color: #555;
        }

        .social i:before {
            width: 14px;
            height: 14px;
            position: fixed;
            color: #fff;
            background: #0077B5;
            padding: 10px;
            border-radius: 50%;
            top:5px;
            right:5px;
        }

        @keyframes slidein {
            from {
                margin-top: 100%;
                width: 300%;
            }

            to {
                margin: 0%;
                width: 100%;
            }
        }
    </style>
    <!-- Slots -->
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
    <script src="{{asset('public/admin/assets/js/search.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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