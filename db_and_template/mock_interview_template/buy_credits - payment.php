<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>book interview</title>
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
<?php include('header.php') ?>
    <!--===================  Header ================-->
       
    <section class="notifications_page">
       
        <div class="main">
        <?php include('sidebar.php') ?>

            <div class="content">

                <div class="container py-3 ">
                    <div class="row mx-auto">
                        <h2 class="mb-3">Book Interview


                        </h2>


                        <div class="col-md-12 mx-auto email_verificaion_box ">

                            <div class="row side-heading-font">
                                <span class="col-md-12"><center>Update your 'Profile' before attending your session for a complete evaluation!</center></span>
                            </div>
                        </div>

                        <div class="clear-fix"></div>

                        <div class="col-md-12">
                            <div class="col-md-12 well bg-white">
                                <div class="row">
                                    <h4><b><label for="prioritySchedule" class="side-heading-font">Interview Details
                                            </label></b> </h4>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2">
                                        <img ng-src="img/calender.PNG" class="icon-size margin_botton_icon" src="assets/img/calender.png"> <span class="sub-heading-font ng-binding"> 31 Jan' 2022</span>
                                    </div>
                                    <div class="col-md-2">
                                        <img ng-src="img/clock.PNG" class="icon-size margin_botton_icon" src="assets/img/clock.PNG"> <span class="sub-heading-font ng-binding"> 08:30 PM </span>
                                    </div>
                                    <div class="col-md-3" style="padding-top:6px;">

                                        <a ui-sref="app.sessions_user" href="#"><span class="Change-date-and-time" id="changeDateTime">Change date
                                                and time </span> </a>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <img ng-src="img/interview_type.PNG" class="icon-size margin_botton_icon" src="assets/img/interview_type.PNG"> <span class="sub-heading-font ng-binding"> Interview Type :Technical</span>
                                    </div>
                                    <div class="col-md-4">
                                        <img ng-src="img/interview_type.PNG" class="icon-size margin_botton_icon" src="assets/img/interview_type.PNG"> <span class="sub-heading-font ng-binding"> Booking Type :Priority</span>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4"> <br>
                                        <img class="icon-size" src="assets/img/credits.PNG"> &nbsp; <span class="sub-heading-font-bold">Available Credits:</span>&nbsp;<span class="sub-text-normal ">100</span>
                                        <br>
                                        <img class="icon-size" src="assets/img/credits.PNG"> &nbsp; <span class="sub-heading-font-bold">Available Credits:</span>&nbsp;<span class="sub-text-normal ">0</span>

                                        <div class="row">&nbsp;</div>

                                        <div class="less-credits"><b>Buy Credits / Package</b></div>
                                    </div>

                                    <div class="col-md-12">
                                        <br>
                                        <span class="less-credits">
                                            You don't have any credits in your wallet. Please purchase Package to Book Interview.
                                        </span>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>



                        <div class="row mx-auto mt-3">
                            <div class="col-md-5 well">
                                <div class="bg-white  py-3">

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            UNO: 1299 credits for $18.99 USD

                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            UNO: 1299 credits for $18.99 USD

                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            UNO: 1299 credits for $18.99 USD

                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 well ml-3">
                                <div class="bg-white  py-2">

                                    <div>
                                        <ul class="list-styled">
                                            <li>Number of Regular Interviews: 3</li>
                                            <li>Standard Waiting Period: 48 Hours

                                            </li>
                                            <li>Duration of Each Interview: 30 minutes</li>
                                            <li>Expert’s Feedback: Yes</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- paypal sec -->

                            <div class="row">
                                <div class="col-md-8 mt-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            I have an offer code  <span><a href="#">click here for offers</a></span>
					
                                        </label>
                                    </div>
                                    <span class="mb-3 "><b>Payment Gateway</b></span> <br>
                                    <span class="paymt_img"><a href="#">
                                        <img src="assets/img/logo_paypal.png" alt="paypal" class="img-fluid ">
                                    </a></span>
                                </div>
                                <div class="col-md-3 mt-3">
                                    <span>Package Price : &nbsp; 	$40.99 USD</span>
                                    <span>Discount Price : &nbsp; 	$40.99 USD</span>
                                    <br>
                                    <div class="clearfix border"></div>
                                    <div class="tool-tip">
                                        <div class="title">

                                            <button id="addEducationinterviewerProfile" class="blue-btn-small">
                                                Pay Only &nbsp; &nbsp;&nbsp;     	$40.99 USD
                                                        </button>
                                        </div>
                                    </div>

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