

<?php $__env->startSection('title', $page_title); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid py-3 ">
        <h2 class="mb-3">My Profile </h2>
        <div class=" email_verificaion_box bg-white ">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-borderless table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">Account Details</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">User ID</th>
                                <td>1</td>

                            </tr>
                            <tr>
                                <th scope="row">Name</th>
                                <td>Jacob</td>

                            </tr>
                            <tr>
                                <th scope="row">Email</th>

                                <td>Abc@123gmail.com</td>
                            </tr>
                            <tr>
                                <th scope="row">Mobile</th>
                                <td colspan="2">1221321</td>
                                <td></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <span>
                        <a href="#">Change Password</a>
                        </span>
                    <span class="ml-5">
                        <a href="#">Edit Details</a>
                    </span>
                    <br>
                    <div class="avatar">
                        <img src="assets/img/avatarr.png" alt="avatarr" class="img-fluid">
                    </div>

                    <span class="ml-1">
                        <a href="#">Change Pic</a>
                    </span>
                </div>
            </div>

        </div>
        <!-- educatgional details sec -->
        <div id="edu " class="well ">
            <div id="edu1">
                <div class="container py-3">
                    <div class="row ">
                        <h6><b>Educational Details</b></h6>
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

                        <div class="form-group float-label-control">
                            <label for="">Skills</label>
                            <textarea class="form-control" placeholder="Skills" rows="5"></textarea>
                        </div>
                        <div class="form-group float-label-control">
                            <label for="">Projects</label>
                            <textarea class="form-control" placeholder="Projects" rows="5"></textarea>
                        </div>
                        <div class="col-md-10 save_btn">
                            <div class="tool-tip">
                                <div class="title">

                                    <button id="addEducationinterviewerProfile" class="blue-btn-small">
                                            Save
                                        </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Resume sec -->
        <div class="well mt-4">
            <form action="/action_page.php">
                <div class="container py-3">
                    <div class="row">
                        <div class="col-md-6">
                            <div>
                                <label for="upload"><b>Resume</b></label>
                            </div>
                            <div>
                                <input type="file" id="myFile" name="filename2">

                            </div>
                        </div>
                        <div class="col-md-6 mt-4 mb-4">
                            <button type="submit" class="btn btn-primary pull-right blue-btn-small">Upload</button>

                        </div>
                        <div class="col-md-6">
                            <div>
                                <label for="upload"><b>Record Video</b></label>
                            </div>
                            <div>
                                <input type="file" id="myFile" name="filename2">

                            </div>
                        </div>
                        <span>Note:  You'll have upto 2 attempts to record your Video Resume</span>

                    </div>
                </div>




            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('web-views.dashboard.master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/web-views/interviewer/my_profile.blade.php ENDPATH**/ ?>