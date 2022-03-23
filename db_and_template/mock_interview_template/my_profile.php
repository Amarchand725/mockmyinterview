<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>profile</title>
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

    <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/css/intlTelInput.css" rel="stylesheet" media="screen">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/intlTelInput.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/intlTelInput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/utils.js"></script>

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
    <section class="profile_page">
        <!--===================
        Header
        =======================-->
        <?php include('header.php') ?>

        <div class="main">
        <?php include('sidebar.php') ?>

            <div class="content">

                <div class="container py-3 ">
                    <div class="row mx-auto">
                        <h2 class="mb-3 text-center">PROFILE </h2>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="tabs">
                            <div class="tab-button-outer">
                                <ul id="tab-button">
                                    <li><a href="#tab01">Personal Details</a></li>
                                    <li><a href="#tab02">Qualifications</a></li>
                                    <li><a href="#tab03">Experience</a></li>
                                    <li><a href="#tab04">Resume Upload</a></li>
                                    <li><a href="#tab05">Interview prefrence</a></li>
                                    <li><a href="#tab06">Change Password</a></li>
                                </ul>
                            </div>
                            <div class="tab-select-outer">
                                <select id="tab-select">
                                <option value="#tab01">Personal Details</option>
                                <option value="#tab02">Qualifications</option>
                                <option value="#tab03">Experience</option>
                                <option value="#tab04">Resume Upload</option>
                                <option value="#tab05">Interview prefrence</option>
                                <option value="#tab06">Change Password</option>
                              </select>
                            </div>

                            <div id="tab01" class="tab-contents">
                                <div class="row">
                                    <div class="col-md-6">
                                        <form role="form">
                                            <div class="form-group float-label-control">
                                                <label for="">First Name  </label>
                                                <input type="email" class="form-control" placeholder="First Name">
                                            </div>
                                            <div class="form-group float-label-control">
                                                <label for="">Last Name</label>
                                                <input type="text" class="form-control" placeholder="Last Name">
                                            </div>
                                            <div class="form-group float-label-control">
                                                <label for="">Email</label>
                                                <input type="email" class="form-control" placeholder="email">
                                            </div>
                                            <div class="form-group float-label-control">
                                                <label for="">Number</label>
                                                <input type="number" class="form-control" placeholder="Number">
                                            </div>
                                            <div class="form-group float-label-control">
                                                <label for="">Date of Birth</label>
                                                <input type="date" class="form-control" placeholder="Date of Birth">
                                            </div>
                                            <div class="form-group float-label-control">
                                                <label for="">Gender</label>
                                                <input type="name" class="form-control" placeholder="Gender">
                                            </div>


                                        </form>
                                    </div>
                                    <div class="col-md-6 language">
                                        <div class="form-group float-label-control">
                                            <label for="">Address</label>
                                            <textarea class="form-control" placeholder="Address" rows="1"></textarea>
                                        </div>
                                        <label for="country">Languages Known (Hold shift/ctrl to select more than one language)</label>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected></option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                          </select>
                                        <div class="form-group float-label-control">
                                            <label for="">Skype ID</label>
                                            <input type="name" class="form-control" placeholder="Skype ID">
                                        </div>


                                    </div>

                                </div>

                            </div>

                            <!-- end of tab 1 -->
                            <div id="tab02" class="tab-contents">

                                <div id="edu ">
                                    <div id="edu1">
                                        <div class="row ">
                                            <div class="col-md-3">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="college">College</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="text" name="edu1_college" id="edu1_college" class="form-control ng-pristine ng-untouched ng-valid" ng-model="input.edu[1].college" aria-invalid="false" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAAAXNSR0IArs4c6QAAAfBJREFUWAntVk1OwkAUZkoDKza4Utm61iP0AqyIDXahN2BjwiHYGU+gizap4QDuegWN7lyCbMSlCQjU7yO0TOlAi6GwgJc0fT/fzPfmzet0crmD7HsFBAvQbrcrw+Gw5fu+AfOYvgylJ4TwCoVCs1ardYTruqfj8fgV5OUMSVVT93VdP9dAzpVvm5wJHZFbg2LQ2pEYOlZ/oiDvwNcsFoseY4PBwMCrhaeCJyKWZU37KOJcYdi27QdhcuuBIb073BvTNL8ln4NeeR6NRi/wxZKQcGurQs5oNhqLshzVTMBewW/LMU3TTNlO0ieTiStjYhUIyi6DAp0xbEdgTt+LE0aCKQw24U4llsCs4ZRJrYopB6RwqnpA1YQ5NGFZ1YQ41Z5S8IQQdP5laEBRJcD4Vj5DEsW2gE6s6g3d/YP/g+BDnT7GNi2qCjTwGd6riBzHaaCEd3Js01vwCPIbmWBRx1nwAN/1ov+/drgFWIlfKpVukyYihtgkXNp4mABK+1GtVr+SBhJDbBIubVw+Cd/TDgKO2DPiN3YUo6y/nDCNEIsqTKH1en2tcwA9FKEItyDi3aIh8Gl1sRrVnSDzNFDJT1bAy5xpOYGn5fP5JuL95ZjMIn1ya7j5dPGfv0A5eAnpZUY3n5jXcoec5J67D9q+VuAPM47D3XaSeL4AAAAASUVORK5CYII=&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="degree">Degree</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <select name="edu1_degree" class="form-control ng-pristine ng-valid ng-touched" ng-model="input.edu[1].degree" id="edu1_degree" ng-change="getCourse(input.edu[1].degree,1)" aria-invalid="false"><option value="? undefined:undefined ?"></option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="course">Course</label>
                                                    <select name="edu1_course" id="edu1_course" class="form-control ng-pristine ng-valid ng-touched" ng-model="input.edu[1].course" aria-invalid="false"><option value="hsc"></option>
                                                    </select>
                                                    <input type="text" name="edu1_course" class="form-control ng-pristine ng-untouched ng-valid" ng-model="input.edu[1].course" id="eduT1_course" aria-invalid="false" style="display: none;">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="yearOfPassing">Year of Passing</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control ng-pristine ng-valid ng-valid-maxlength ng-touched" aria-invalid="false">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="tool-tip">
                                                    <div class="title">

                                                        <button id="addEducationinterviewerProfile" class="blue-btn-small">
                                                                    Add
                                                                </button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group float-label-control">
                                    <label for="">Achievemnts</label>
                                    <textarea class="form-control" placeholder="Achievemnts" rows="5"></textarea>
                                </div>
                                <div class="form-group float-label-control">
                                    <label for="">Awards</label>
                                    <textarea class="form-control" placeholder="Awards" rows="5"></textarea>
                                </div>
                                <div class="form-group float-label-control">
                                    <label for="">Additional data</label>
                                    <textarea class="form-control" placeholder="Additional" rows="5"></textarea>
                                </div>
                            </div>




                            <div id="tab03" class="tab-contents">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <label for="Title">Title</label>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control ng-pristine ng-valid ng-valid-maxlength ng-touched" aria-invalid="false">
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <label for="Company">Company</label>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control ng-pristine ng-valid ng-valid-maxlength ng-touched" aria-invalid="false">
                                        </div>
                                    </div>

                                </div>
                                <div class="clearfix mb-3"></div>
                                <div id="edu1">
                                    <div class="row ">
                                        <div class="col-md-10">
                                            <label for="job"> job Summary</label>
                                            <textarea name="awards" rows="3" id="interviewerProfilePersonalAwards" cols="50" class="form-control ng-pristine ng-valid ng-binding ng-touched" ng-model="input.awards" aria-multiline="true" aria-invalid="false" spellcheck="false"></textarea>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="tool-tip">
                                                <div class="title">

                                                    <button id="addEducationinterviewerProfile" class="blue-btn-small">
                                                                    Add
                                                                </button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <div class="col-md-12">
                                                <label for="Title">Total experience(in years)</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control ng-pristine ng-valid ng-valid-maxlength ng-touched" aria-invalid="false">
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-md-12">
                                                <label for="Company">                                 
                                                        Expertise Details
                                                </label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control ng-pristine ng-valid ng-valid-maxlength ng-touched" aria-invalid="false">
                                            </div>
                                        </div>

                                    </div>

                                </div>



                            </div>



                            <!-- end of tab 3 -->
                            <div id="tab04" class="tab-contents">

                                <form action="/action_page.php">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div>
                                                <label for="upload">Resume</label>
                                            </div>
                                            <div>
                                                <input type="file" id="myFile" name="filename2">

                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-4 mb-4">
                                            <button type="submit" class="btn btn-primary pull-right blue-btn-small">Upload</button>

                                        </div>
                                        <div class="form-group float-label-control">
                                            <label for="">LinkedIn Url  </label>
                                            <input type="text" class="form-control" placeholder="LinkedIn Url">
                                        </div>
                                    </div>




                                </form>
                            </div>
                            <div id="tab05" class="tab-contents">

                                <div class="form-check">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div>
                                                <label for="interview">
                                              Interview type
                                           </label>
                                            </div>
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                         Technical
                                        </label>
                                            <div class="mt-3">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                <label class="form-check-label" for="defaultCheck1">
                                             HR
                                            </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 mt-3">
                                                <button type="submit" class="btn btn-primary pull-left blue-btn-small">Save</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>


                            <!-- end of 5  -->
                            <div id="tab06" class="tab-contents">

                                <form role="form">
                                    <div class="form-group float-label-control">
                                        <label for="">Current Password  </label>
                                        <input type="password" class="form-control" placeholder="Current Password">
                                    </div>
                                    <div class="form-group float-label-control">
                                        <label for="">New password</label>
                                        <input type="password" class="form-control" placeholder="New password">
                                    </div>
                                    <div class="form-group float-label-control">
                                        <label for="">Confirm Password</label>
                                        <input type="password" class="form-control" placeholder="Confirm Password">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mt-3">
                                            <button type="submit" class="btn btn-primary pull-right blue-btn-small">Update</button>
                                        </div>
                                    </div>



                                </form>
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

        $(function() {
            $('.selectpicker').selectpicker();
        });

        $(function() {
            var $tabButtonItem = $('#tab-button li'),
                $tabSelect = $('#tab-select'),
                $tabContents = $('.tab-contents'),
                activeClass = 'is-active';

            $tabButtonItem.first().addClass(activeClass);
            $tabContents.not(':first').hide();

            $tabButtonItem.find('a').on('click', function(e) {
                var target = $(this).attr('href');

                $tabButtonItem.removeClass(activeClass);
                $(this).parent().addClass(activeClass);
                $tabSelect.val(target);
                $tabContents.hide();
                $(target).show();
                e.preventDefault();
            });

            $tabSelect.on('change', function() {
                var target = $(this).val(),
                    targetSelectNum = $(this).prop('selectedIndex');

                $tabButtonItem.removeClass(activeClass);
                $tabButtonItem.eq(targetSelectNum).addClass(activeClass);
                $tabContents.hide();
                $(target).show();
            });
        });
    </script>

</body>

</html>