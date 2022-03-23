<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Reports</title>
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
    <section class="reports">
        <!--===================
        Header
        =======================-->
        <?php include('header.php') ?>

        <div class="main">
        <?php include('sidebar.php') ?>

            <div class="content">

                <div class="container py-3 ">
                    <div class="row mx-auto">
                        <h2 class="mb-3">Reports
                        </h2>

                        <div class="col-md-12 email_verificaion_box bg-white ">

                            <div class="row side-heading-font ">
                                <div class="col-md-4">
                                    <div>
                                        <span>From</span>

                                        <span class="ml-3">                                         
                                               <input type="date" id="birthday" name="birthday">

                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <span>To</span>

                                        <span class="ml-3">                                         
                                               <input type="date" id="birthday" name="birthday">

                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn primary pull-right view_btn">Search</button>
                                </div>

                            </div>


                        </div>
                        <div class="row mx-auto">
                            <div class="col-md-12 well bg-white py-3 ">
                                <h5>Reports</h5>
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col">Total Scheduled Interviews -</th>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">Total Successful Interviews -</th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Total Failed Interviews -</th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Total Earnings -</th>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <div class="row mx-auto mt-3">
                            <div class="col-md-12 well bg-white py-3 ">
                                <h5>Interviews
                                </h5>
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col">Interview ID </th>
                                            <th scope="col">First</th>
                                            <th scope="col">Last</th>
                                            <th scope="col">Review</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row"> </th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>

                                        </tr>
                                        <tr>

                                        </tr>
                                    </tbody>
                                </table>

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