    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard</title>
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
    <link href="assets/css/dashboard.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- ======================================================================================== -->
</head>

<body>

    <!--===================
        Header
        =======================-->
    <section>
        <!--===================
        Header
        =======================-->
        <?php include('header.php') ?>

        <div class="main">
        <?php include('sidebar.php') ?>

            <div class="content">
                <!-- Bootstrap 5 Contact Form Snippet -->

                <div class="container py-3 ">
                    <div class="row mx-auto">

                        <div class="col-md-12 email_verificaion_box ">

                            <div class="row side-heading-font">
                                <span class="col-md-12"><center>Update your 'Profile' before attending your session for a complete evaluation!</center></span>
                            </div>
                        </div>
                        <div class="col-md-12 email_verificaion_box ">
                            <div class="row ">
                                <div class="col-md-12">
                                    <span class="side-heading-font">Verify your Email </span>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-12">
                                    <span class="sub-text-normal">
                                  We have sent a verification mail to your registered email address. Open your email and click on the confirmation link.
                                  </span>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <!-- ngIf: user.group == 1 -->
                                    <div class="col-md-6 padding-none ng-scope" ng-if="user.group == 1">
                                        <button class="btn-default-enabled " type="button" ng-click="update_email()"><span style="text-align:center;">Update Email</span>
                                        </button> &nbsp;&nbsp;
                                        <button class="btn-default-enabled " type="button" id="verifyemail" ng-click="send_verification_email()"><span style="text-align:center;">Resend Email</span>
                                        </button>
                                    </div>
                                    <!-- end ngIf: user.group == 1 -->

                                </div>

                            </div>





                        </div>

                    </div>
                    <div class="row mx-auto">
                        <div class="col-md-12 well bg-white text-center shedule-first">
                            <center>
                                <h1 class="main-content-heading-font">
                                    <!-- Do great on Big Interview -->Get Yourself Interview Ready!
                                </h1>

                                <button class="col-md-4 blue-btn-large" type="button" id="scheduleFirstInterview" ng-show="!is_sessions_completed &amp;&amp; !is_sessions_scheduled" ng-click="schedule_session()" aria-hidden="false">Schedule First Interview</button>
                                <!-- <button class="col-md-4 blue-btn-large ng-hide" type="button" id="scheduleNewInterview" ng-show="is_sessions_completed || is_sessions_scheduled" ng-click="schedule_session()" aria-hidden="true">Schedule Interview</button> -->
                            </center>
                        </div>
                    </div>


                    <div class=" well mx-auto mt-4 p-4">
                        <h2>Resources</h2>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-6">

                                    <span class="res_img pull-left">
                                       <img src="assets/img/Interview Tips 2.png" alt="" class="img-fluid">
                                       <span class="ml-2"><a href="#">
                                        How to Refine Your English through Listening
                                       </a> </span>
                                    </span>
                                </div>
                                <div class="col-md-4">
                                    <span class="carrer_man">Career Management</span>
                                    <span class="carrer ">Career </span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-6">

                                    <span class="res_img pull-left">
                                       <img src="assets/img/Interview Tips 2.png" alt="" class="img-fluid">
                                       <span class="ml-2"><a href="#">
                                        How to Refine Your English through Listening
                                       </a> </span>
                                    </span>
                                </div>
                                <div class="col-md-4">
                                    <span class="carrer_man">Career Management</span>
                                    <span class="carrer ">Career </span>
                                </div>
                            </div>
                            <div class="col-md-12 mt-2">
                                <div class="col-md-6">

                                    <span class="res_img pull-left">
                                       <img src="assets/img/Interview Tips 2.png" alt="" class="img-fluid">
                                       <span class="ml-2"><a href="#">
                                        How to Refine Your English through Listening
                                       </a> </span>
                                    </span>
                                </div>
                                <div class="col-md-4">
                                    <span class="carrer_man">Career Management</span>
                                    <span class="carrer ">Career </span>
                                </div>
                            </div>
                            <div class="col-md-12 mt-2">
                                <div class="col-md-6">

                                    <span class="res_img pull-left">
                                       <img src="assets/img/Interview Tips 2.png" alt="" class="img-fluid">
                                       <span class="ml-2"><a href="#">
                                        How to Refine Your English through Listening
                                       </a> </span>
                                    </span>
                                </div>
                                <div class="col-md-4">
                                    <span class="carrer_man">Career Management</span>
                                    <span class="carrer ">Career </span>
                                </div>
                                <button class="btn btn primary pull-right view_btn">View All</button>
                            </div>

                        </div>

                    </div>
                </div>





            </div>

    </section>



    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!--  Main JS File -->
    <script src="assets/js/main.js"></script>
    <script>
        $(document).ready(function() {
            $('.button-left').click(function() {
                $('.sidebar').toggleClass('fliph');
            });

        });
    </script>

</body>

</html>