

<?php $__env->startSection('title', $page_title); ?>

<?php $__env->startPush('css'); ?>
    <style>
        .choose-file {
            position: relative;
            overflow: hidden;
        }
        .choose-file input {
            position: absolute;
            font-size: 50px;
            opacity: 0;
            right: 0;
            top: 0;
        }
        .table thead th {
            vertical-align: bottom;
            border-bottom: 0 !important;
        }
        .table td, .table th {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 0px solid #eceeef;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid py-3 ">
        <h2 class="mb-3">My Profile </h2>
        <div class=" email_verificaion_box bg-white ">
            <form action="<?php echo e(route('my_profile.personal_details')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-borderless table-responsive tbl-border" style="border: 0px">
                            <thead>
                                <tr>
                                    <th scope="col">Account Details</th>
                                </tr>
                            </thead>
                            <tbody id="details">                            
                                <tr>
                                    <th scope="row">User ID</th>
                                    <td><?php echo e(Auth::user()->user_id); ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Name</th>
                                    <td><?php echo e(Auth::user()->name); ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Email</th>
                                    <td><?php echo e(Auth::user()->email); ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Mobile</th>
                                    <td colspan="2"><?php echo e(Auth::user()->phone); ?></td>
                                </tr>
                            </tbody>
                            <tbody id="editable" style="display: none">
                                <input type="hidden" name="user_type" value="candidate">
                                <input type="hidden" name="last_name" value="<?php echo e(Auth::user()->last_name); ?>">
                                <tr>
                                    <th scope="row">User ID</th>
                                    <td><?php echo e(Auth::user()->user_id); ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Name</th>
                                    <td><input type="text" name="name" value="<?php echo e(Auth::user()->name); ?>" class="form-control"></td>
                                </tr>
                                <tr>
                                    <th scope="row">Email</th>
                                    <td><input type="text" value="<?php echo e(Auth::user()->email); ?>" class="form-control" readonly></td>
                                </tr>
                                <tr>
                                    <th scope="row">Mobile</th>
                                    <td colspan="2"><input type="text" name="phone" value="<?php echo e(Auth::user()->phone); ?>" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <button type="submit" class="btn btn-info">Save</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <span>
                            <a href="#" class="change-password-btn">Change Password</a>
                        </span>
                        <span class="ml-5">
                            <a href="#" class="edit-details">Edit Details</a>
                        </span>
                        <br>
                        <div class="avatar">
                            <?php if(!empty(Auth::user()->image)): ?>
                                <img class="rounded-circle" src="<?php echo e(asset('public/web/assets/images/user')); ?>/<?php echo e(Auth::user()->image); ?>" width="150px" height="150px" alt="avatarr" class="img-fluid">
                            <?php else: ?> 
                                <img src="assets/img/avatarr.png" alt="avatarr" class="img-fluid">
                            <?php endif; ?>
                        </div>

                        <div class="file btn btn-sm ml-3 p-2 btn-primary choose-file" id="choose-profile" style="display: none">
                            Choose
                            <input type="file" name="image"/>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- Password Update  -->
        <div class="email_verificaion_box bg-white" id="change-password" style="display: none">
            <div class="row">
                <div class="col-md-3 side-heading-font">Change Password</div>
                <br /><br />
                <form action="<?php echo e(route('my_profile.password')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="form-group float-label-control">
                        <label for="password">Current Password  <span style="color: red">*</span></label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Current Password" required>
                        <span style="color: red"><?php echo e($errors->first('password')); ?></span>
                    </div>
                    <div class="form-group float-label-control">
                        <label for="new_password">New password <span style="color: red">*</span></label>
                        <input type="password" name="new_password" class="form-control" id="new_password" placeholder="New password" required>
                        <span style="color: red"><?php echo e($errors->first('new_password')); ?></span>
                    </div>
                    <div class="form-group float-label-control">
                        <label for="confirm_password">Confirm Password <span style="color: red">*</span></label>
                        <input type="password" name="confirmed" class="form-control" id="confirm_password" placeholder="Confirm Password" required>
                        <span style="color: red"><?php echo e($errors->first('confirmed')); ?></span>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <button type="submit" class="btn btn-info">Save</button>
                            <button type="button" class="btn btn-info password-close">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- educatgional details sec -->
        <div id="edu " class="well ">
            <div id="edu1">
                <div class="container py-3">
                    <h6><b>Educational Details</b></h6>
                    <?php 
                        $qualifications = isset(Auth::user()->hasUserQualification)?Auth::user()->hasUserQualification:null;
                        $skills = isset(Auth::user()->hasSkills)?Auth::user()->hasSkills:null;
                        $projects = isset(Auth::user()->hasProjects)?Auth::user()->hasProjects:null;
                    ?> 
                    <form id="qualification-details" method="post" action="<?php echo e(route('my_profile.qualifications')); ?>">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="user_type" value="condidate">
                        <div class="row institute">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="institute">Institute</label>
                                    <input type="text" name="institutes[]" id="institute" class="form-control" placeholder="Enter institute name">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="degree">Degree</label>
                                    <select name="degrees[]" class="form-control select2 degree" id="">
                                        <option value="" selected>Select degree</option>
                                        <?php $__currentLoopData = $degrees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $degree): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($degree->slug); ?>"><?php echo e($degree->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>   
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="course">Course</label>
                                    <select name="courses[]" id="courses" class="form-control selecte2">
                                        <option value="" selected>Select course</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="passing_year">Year of Passing</label>
                                    <input type="text" class="form-control" id="passing_year" name="passing_years[]" placeholder="Year e.g 2022">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="tool-tip">
                                    <div class="title">
                                        <button type="button" data-degrees="<?php echo e($degrees); ?>" id="institute-btn" class="blue-btn-small">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if(!empty($qualifications)): ?>
                            <?php $__currentLoopData = $qualifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$qualification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php 
                                    $courses = courses($qualification->degree_slug);
                                ?> 
                                <div class="row institute">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" name="institutes[]" id="institute" class="form-control" value="<?php echo e($qualification->institute); ?>" placeholder="Enter institute name">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select name="degrees[]" class="form-control select2 degree" id="">
                                                <option value="" selected>Select degree</option>
                                                <?php $__currentLoopData = $degrees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $degree): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($degree->slug); ?>" <?php echo e($qualification->degree_slug==$degree->slug?'selected':''); ?>><?php echo e($degree->title); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>   
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select name="courses[]" id="courses" class="form-control selecte2">
                                                <option value="" selected>Select course</option>
                                                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($course->slug); ?>" <?php echo e($qualification->course_slug==$course->slug?'selected':''); ?>><?php echo e($course->title); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="text" value="<?php echo e($qualification->passing_year); ?>" class="form-control" id="passing_year" name="passing_years[]" placeholder="Year e.g 2022">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="tool-tip">
                                            <button type="button" data-degrees="<?php echo e($degrees); ?>" id="remove-btn" style="background-color:#b92b2b" class="blue-btn-small ml-2">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>   
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                        <span id="added-more"></span> 

                        <div class="form-group float-label-control">
                            <label for="skills">Skills</label>
                            <textarea name="skills" class="form-control" id="skills" placeholder="Skills" rows="5"><?php echo e(isset($skills)?$skills->skills:''); ?></textarea>
                        </div>
                        <div class="form-group float-label-control">
                            <label for="projects">Projects</label>
                            <textarea name="projects" class="form-control" id="projects" placeholder="Projects" rows="5"><?php echo e(isset($projects)?$projects->projects:''); ?></textarea>
                        </div>
                        <div class="form-group float-label-control">
                            <button type="submit" class="blue-btn-small">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Resume sec -->
        <div class="well mt-4">
            <div class="container py-3">
                <h6><b>Resume</b></h6>
                <form action="<?php echo e(route('my_profile.resume')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <?php if(isset(Auth::user()->hasResume) && !empty(Auth::user()->hasResume->resume)): ?>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Exist Your Resume </label>
                                <div class="col-sm-9" style="padding-top:5px">
                                    <iframe src="<?php echo e(asset('public/web/assets/resumes')); ?>/<?php echo e(Auth::user()->hasResume->resume); ?>" style="width:600px; height:500px;" frameborder="0"></iframe>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <label for="upload">Resume <small style="color: orange">(Uploade new resume if you want to replace otherwise keep it empty.)</small></label>
                            <input type="file" name="resume" id="myFile" class="form-control" accept=".doc, .docx, .pdf">
                        </div>
                        <?php if(isset(Auth::user()->hasResume) && !empty(Auth::user()->hasResume->introduction_video)): ?>
                            <div class="form-group">
                                <label for="" class="col-sm-5 control-label">Exist Your Introduction Video </label>
                                <div class="col-sm-9" style="padding-top:5px">
                                    <video width="320" height="240" controls>
                                        <source src="<?php echo e(asset('public/web/assets/resumes')); ?>/<?php echo e(Auth::user()->hasResume->introduction_video); ?>" type="video/mp4">
                                        <source src="movie.ogg" type="video/ogg">
                                        Your browser does not support the video tag.
                                        </video>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <label for="upload">Introduction Video <small style="color: orange">(Uploade new video if you want to replace otherwise keep it empty.)</small></label>
                            <input type="file" name="introduction_video" class="form-control" accept="video/mp4,video/x-m4v,video/*">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group float-label-control">
                            <button type="submit" class="blue-btn-small">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script>
        $(document).on('click', '#institute-btn', function(){
            var degrees = $(this).data('degrees');
            var html = '<div class="row institute">'+
                            '<div class="col-md-3">'+
                                '<div class="form-group">'+
                                    '<input type="text" name="institutes[]" id="institute" class="form-control" placeholder="Enter institute name">'+
                                '</div>'+
                            '</div>'+
                            '<div class="col-md-3">'+
                                '<div class="form-group">'+
                                    '<select name="degrees[]" class="form-control select2 degree" id="">'+
                                        '<option value="" selected>Select degree</option>';
                                        jQuery.each(degrees, function(index, val) {
                                            html += '<option value="'+val.slug+'">'+val.title+'</option>';
                                        });
                                    html += '</select>'+
                                '</div>'+
                            '</div>'+
                            '<div class="col-md-3">'+
                                '<div class="form-group">'+
                                    '<select name="courses[]" id="courses" class="form-control selecte2">'+
                                        '<option value="" selected>Select course</option>'+
                                    '</select>'+
                                '</div>'+
                            '</div>'+
                            '<div class="col-md-2">'+
                                '<div class="form-group">'+
                                    '<input type="text" class="form-control" name="passing_years[]" placeholder="Year e.g 2022">'+
                                '</div>'+
                            '</div>'+
                            '<div class="col-md-1">'+
                                '<div class="tool-tip">'+
                                    '<button type="button" id="remove-btn" style="background-color:#b92b2b" class="blue-btn-small ml-2">'+
                                        '<i class="fa fa-times"></i>'+
                                    '</button>'+
                                '</div>'+
                            '</div>'+
                        '</div>';
                $('#added-more').append(html);
        });

        $(document).on('click', '#remove-btn', function(){
            $(this).parents('.institute').remove();
        });

        $(document).on('change', '.degree', function(){
            var degree_slug = $(this).val();
            var current = $(this);
            $.ajax({
                type:'GET',
                url:'<?php echo e(url("get_courses")); ?>/'+degree_slug,
                success: function( response ) {
                    var html = '';
                    jQuery.each(response, function(index, val) {
                        html += '<option value="'+val.slug+'">'+val.title+'</option>';
                    });
                    $(current).parents('.institute').find('#courses').html(html);
                }
            });
        })

        $(document).on('click', '.edit-details', function(){
            if(!$(this).hasClass('details')){
                $(this).addClass("details");
                $(this).text('Close');
                $('#editable').css('display', 'block');
                $('#choose-profile').css('display', 'inline-block');
                $('#details').css('display', 'none');
            }else{
                $(this).removeClass("details");
                $(this).text('Edit Details');
                $('#editable').css('display', 'none');
                $('#choose-profile').css('display', 'none');
                $('#details').css('display', 'block');
            }
        });

        $(document).on('click', '.change-password-btn', function(){
            if(!$(this).hasClass('display')){
                $(this).addClass("display");
                $(this).text('Close');
                $('#change-password').css('display', 'block');
            }else{
                $(this).removeClass("display");
                $(this).text('Change Password');
                $('#change-password').css('display', 'none');
            }
        });

        $(document).on('click', '.password-close', function(){
            $('.change-password-btn').removeClass("display");
            $('.change-password-btn').text('Change Password');
            $('#change-password').css('display', 'none');
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('web-views.dashboard.master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/web-views/candidate/my_profile.blade.php ENDPATH**/ ?>