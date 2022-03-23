<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title> Interviewer - Dashboard</title>
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
        <!--=================== Header
        =======================-->
       
        <?php include('header.php') ?>

        <div class="main">
        <?php include('sidebar.php') ?>

            <div class="content_1">
                <!-- Bootstrap 5 Contact Form Snippet -->

                <div class="container py-3 wrapper-sd wrp-d1 ">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="panel1 wrapper">
                                        <h3 class="font-thin m-t-none m-b text-muted">Getting Started</h3>
                                        <div class="row">
                                            <div class="col-xs-12 font-thin">
                                                <h4>Welcome to InterviewBuddy™</h4>
                                                <p>Hey Buddy! Complete the steps below to start InterviewBuddy™.</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="list-group  alt title p-3" data-title="Click to verify your email id">
                                                    <a class="list-group-item" style="border-color:#333945" href="#/app/page/provider/demo_data" ui-sref="app.page.demo_data_provider">
                                                        <div class="checkbox">
                                                            <label class="i-checks">
                                                        <input type="checkbox" id="providerEmailStatus" ng-checked="dashboard.account_status.email_verified" value="" checked="checked">
                                                        <i></i>
                                                        Email Id
                                                        </label>
                                                        </div>
                                                        <!--                            <span class="tool-tip-text">Click to verify your email ID</span> -->
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="list-group  alt title p-3" data-title="Click to verify your mobile number">
                                                    <a class="list-group-item" style="border-color:#333945" href="#/app/page/provider/demo_data" ui-sref="app.page.demo_data_provider">
                                                        <div class="checkbox">
                                                            <label class="i-checks">
                                                        <input type="checkbox" id="providerMobileStatus" ng-checked="dashboard.account_status.mobile_verified" value="" checked="checked">
                                                        <i></i>
                                                        Mobile
                                                        </label>
                                                        </div>
                                                        <!-- <span class="tool-tip-text">Click to verify your mobile number</span> -->
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="list-group  alt title p-3" data-title="Click to edit your profile">
                                                    <a class="list-group-item bg-papaya" style="border-color:#333945" href="#/app/page/provider/demo_data" ui-sref="app.page.demo_data_provider">
                                                        <div class="checkbox">
                                                            <label class="i-checks">
                                                        <input type="checkbox" id="providerProfileStatus" ng-checked="dashboard.account_status.profile_verified" value="">
                                                        <i></i>
                                                        Profile
                                                        </label>
                                                        </div>
                                                        <!--                            <span class="tool-tip-text">Click to edit your profile</span> -->
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="list-group  alt title p-3" data-title="Click to create a slot">
                                                    <a class="list-group-item bg-grape" style="border-color:#333945" href="#/app/sessions/provider" ui-sref="app.sessions_provider">
                                                        <div class="checkbox">
                                                            <label class="i-checks">
                                                        <input type="checkbox" id="providerInterviewStatus" ng-checked="dashboard.account_status.session_created" value="">
                                                        <i></i>
                                                        Interviews
                                                        </label>
                                                        </div>
                                                        <!--                            <span class="tool-tip-text">Click to create a slot</span> -->
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 ">
                                    <!-- For Provider Only-->
                                    <div class="panel1 wrapper">
                                        <div class="row">
                                            <h3 class="font-thin m-t-none m-b text-muted"> Sessions Data </h3>
                                            <div class="col-md-6">
                                                <div class="bg_pannel">
                                                    <span class="g1">0</span>
                                                    <br>
                                                    <span class="text-white">Open Slots</span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="bg_pannel_2">
                                                    <span class="g1">0</span>
                                                    <br>
                                                    <span class="text-white">Open Slots</span>
                                                </div>
                                            </div>

                                            <div class="col-md-6 mt-3">
                                                <div class="bg_pannel">
                                                    <span class="g1">0</span>
                                                    <br>
                                                    <span class="text-white">Open Slots</span>
                                                </div>
                                            </div>

                                            <div class="col-md-6 mt-3">
                                                <div class="bg_pannel_2">
                                                    <span class="g1">0</span>
                                                    <br>
                                                    <span class="text-white">Open Slots</span>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <div class="bg_pannel_2">
                                                    <span class="g1">0</span>
                                                    <br>
                                                    <span class="text-white">Open Slots</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h6>
                                    <center class="bg-white p-2 font-thin">Previous Interview Sessions</center>
                                </h6>
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