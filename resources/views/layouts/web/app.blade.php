<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Mock My Interview</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Favicons -->
    <link href="{{ asset('public/web/assets/img/hero-img.png') }}" rel="icon">
    <link href="{{ asset('public/web/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('public/web/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/web/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('public/web/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/web/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/web/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('public/web/assets/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/admin/assets/css/toastr.min.css')}}">
    @stack('css')
    <!-- ======================================================================================== -->
</head>

<body>
    <!-- ======= Header ======= -->
    @include('layouts.web.header')
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1>{!! $home_page_data['home_right_title'] !!}</h1>
                    <h2>{!! $home_page_data['home_right_sub_title'] !!}</h2>
                    <div class="d-flex btn_lft">
                        <a href="#about" class="btn-get-started scrollto">Learn More</a>
                        <a href="{{ route('signup') }}" class="btn-get-started scrollto btnn">
                            <span>Sign-Up </span>
                        </a>
                    </div>
                    <span class="mt-4 watch_video">
                        <a href="{!! $home_page_data['home_right_video'] !!}" class="glightbox btn-watch-video ">
                            <i class="bi bi-play-circle"></i><span>Watch Video
                        </a>
                    </span>
                </div>
                </span>

                <div class="col-lg-6  ">
                    <div class="container d-flex justify-content-left align-items-center flex-wrap">
                        <div class="hero-content hero-content-2022 mt-0 mx-0 mx-sm-2 mx-md-2 mx-lg-2 mx-xl-2">
                            <h1>{!! $home_page_data['home_left_heading'] !!}</h1>
                            <h2 class="col-12">
                                {!! $home_page_data['home_left_description'] !!}
                            </h2>
                            <div class="">
                                <form class="cta-form cta-concierge-url"
                                    action="#" method="get"
                                    id="cta-form" _lpchecked="1">
                                    <div class="laf-search lg mb-3 px-2 px-sm-0 px-md-0 px-lg-0 px-xl-0 bg-transparent">
                                        <div class="d-flex flex-wrap">
                                            <div class="search-container w-100">
                                                <input class="rounded-pill text-center" type="tel" maxlength="200"
                                                    name="postcode" value="" autocomplete="nope"
                                                    placeholder="Enter  postcode for your interviewer search.">
                                               
                                            <div class="btn-container w-100 mt-2">
                                                <button
                                                    class="btn btn-primary btn-xl w-100 rounded-pill btn-get-started"><span>Search</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <center>
                                    <a href="{{ route('login') }}" class="returning-link">I've registered before</a>
                                </center>
                                <h4 class="font-weight-normal">{!! $home_page_data['home_left_bottom_label'] !!}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero -->

    <!-- #main -->
    @yield('content')
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('layouts.web.footer');
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('public/web/assets/vendor/purecounter/purecounter.js') }}"></script>
    <script src="{{ asset('public/web/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('public/web/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('public/web/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('public/web/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('public/web/assets/vendor/php-email-form/validate.js') }}"></script>

    <!--  Main JS File -->
    <script src="{{ asset('public/web/assets/js/main.js') }}"></script>
    <script src="{{asset('public/admin/assets/js/toastr.min.js')}}"></script>
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
    @stack('js')
</body>

</html>