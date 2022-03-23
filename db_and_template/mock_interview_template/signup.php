<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Sign Up</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/hero-img.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- ======================================================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a href="index.html"> Mock</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">
                <ul>



                    <li><a class="nav-link scrollto " href="login.html">LOG IN</a></li>
                    <li><a class="nav-link scrollto active" href="login.html">SIGN-UP</a></li>

                    <!-- <li><a class="getstarted scrollto" href="#about">LOG-IN</a></li> -->
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->

        </div>
    </header>
    <!-- End Header -->



    <main id="main">

        <!-- ======= Hero Section ======= -->
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
                                        <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Candidate</a> </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Interviewer</a> </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                                        <h4 class="text-center mt-4 mb-4" style="text-transform: uppercase;"></h4>
                                        <form>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <input type="text" class="form-control" id="inputEmail4" placeholder="First Name" required="">
                                                </div>
                                                <div class="form-group col-md-12 mt-3">
                                                    <input type="text" class="form-control" id="inputEmail4" placeholder="Last Name" required="">
                                                </div>
                                                <div class="form-group col-md-12 mt-3">
                                                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email" required="">
                                                </div>
                                                <div class="form-group col-md-12 mt-3">
                                                    <input type="phone" class="form-control" id="inputEmail4" placeholder="Phone" required="">
                                                </div>
                                                <div class="form-group col-md-12 mt-3">
                                                    <input type="password" class="form-control" id="inputPassword4" placeholder=" password" required="">
                                                </div>
                                                <div class="form-group col-md-12 mt-3">
                                                    <input type="password" class="form-control" id="inputPassword4" placeholder=" confirm password" required="">
                                                </div>
                                                <div class="form-group col-md-12 mt-3">
                                                    <input type="password" class="form-control" id="inputPassword4" placeholder=" Refral/Promo code" required="">
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
                                            <div class="mt-2 mb-3"> <button class="btn btn-primary full-width" type="submit">NEXT</button> </div>
                                        </form>
                                        <span class="spantxt">Don't have an account? <a ui-sref="access.signup" href="#">Sign up here</a></span>
                                    </div>


                                    <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                        <h4 class="text-center mt-4 mb-4" style="text-transform: uppercase;"></h4>
                                        <form>
                                            <div class="form-row">
                                                <div class="mt-2 mb-3 linkedin_clr">
                                                    <button class="btn  " type="submit">
                                                        <i class="fa fa-linkedin pull-left" aria-hidden="true"></i>
                                                        <span> Connect with Linkedin</span></button>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <input type="text" class="form-control" id="inputEmail4" placeholder="First Name" required="">
                                                </div>
                                                <div class="form-group col-md-12 mt-3">
                                                    <input type="text" class="form-control" id="inputEmail4" placeholder="Last Name" required="">
                                                </div>
                                                <div class="form-group col-md-12 mt-3">
                                                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email" required="">
                                                </div>
                                                <div class="form-group col-md-12 mt-3">
                                                    <input type="phone" class="form-control" id="inputEmail4" placeholder="Phone" required="">
                                                </div>
                                                <div class="form-group col-md-12 mt-3">
                                                    <input type="password" class="form-control" id="inputPassword4" placeholder=" password" required="">
                                                </div>
                                                <div class="form-group col-md-12 mt-3">
                                                    <input type="password" class="form-control" id="inputPassword4" placeholder=" confirm password" required="">
                                                </div>
                                                <div class="form-group col-md-12 mt-3">
                                                    <input type="password" class="form-control" id="inputPassword4" placeholder=" Refral/Promo code" required="">
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
                                            <div class="mt-2 mb-3"> <button class="btn btn-primary full-width" type="submit">NEXT</button>
                                                <span class="spantxt">Don't have an account? <a ui-sref="access.signup" href="#"> Log In here
                                                </a></span>
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
        <!-- End Hero -->



















    </main>
    <!-- End #main -->

    <!-- footwe 2 -->


    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">

            <div class="container">

                <div class="row  justify-content-center">
                    <div class="col-lg-6">
                        <h3>INTERVIEW TIPS IN YOUR INBOX
                        </h3>
                        <p>Online face-to-face mock interviews with experts help you train & prepare for job interviews in a no pressure, stress-free environment simulating a real job interview. Stay ahead of the competition with expert mentoring & feedback!</p>
                    </div>
                </div>

                <div class="row mt-5 " style="text-align: left;">
                    <div class="col-md-6">
                        <h5 class="headin5_amrc col_white_amrc pt2">FIND US</h5>
                        <!--headin5_amrc-->
                        <p class="mb10">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                        <p><i class="fa fa-location-arrow"></i> 9878/25 sec 9 rohini 35 </p>
                        <p><i class="fa fa-phone"></i> +91-9999878398 </p>
                        <p><i class="fa fa fa-envelope"></i> info@example.com </p>


                    </div>
                    <div class="col-md-6">
                        <div class="mobile_2">
                            <h5 class="headin5_amrc col_white_amrc pt2">EMAIL US </h5>
                            <div class="row footer-newsletter justify-content-center">

                                <form action="" method="post">
                                    <input type="email" name="email" placeholder="Enter your Email"><input type="submit" value="Subscribe">
                                </form>

                            </div>
                            <div class="social-links">
                                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mt-4">
                            <!-- <h5 class="headin5_amrc col_white_amrc pt2 mt-4 mb-3">INTERVIEW TIPS IN YOUR INBOX </h5> -->
                            <img src="assets/img/google-play-icon.png" alt="imgs" class="img-fluid">
                        </div>
                    </div>

                </div>



            </div>
        </div>

        <div class="container footer-bottom clearfix">
            <div class="copyright">
                &copy; Copyright <strong><span>Mock</span></strong>. All Rights Reserved
            </div>

        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!--  Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>