

<?php $__env->startSection('title', $page_title); ?>

<?php $__env->startSection('content'); ?>
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

                <!-- Personl Details -->
                <div id="tab01" class="tab-contents">
                    <form id="personal-details" method="post" action="<?php echo e(route('my_profile.personal_details')); ?>">
                        <?php echo csrf_field(); ?>
                        <?php $user_details = isset(Auth::user()->hasUserDetails)?Auth::user()->hasUserDetails:null; ?> 
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group float-label-control">
                                    <label for="first_name">First Name  </label>
                                    <input type="name" name="name" class="form-control" value="<?php echo e(Auth::user()->name); ?>" id="first_name" placeholder="First Name">
                                </div>
                                <div class="form-group float-label-control">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" name="last_name" class="form-control" value="<?php echo e(Auth::user()->last_name); ?>" id="last_name" placeholder="Last Name">
                                </div>
                                <div class="form-group float-label-control">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" readonly value="<?php echo e(Auth::user()->email); ?>" id="email" placeholder="email">
                                </div>
                                <div class="form-group float-label-control">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" class="form-control" value="<?php echo e(Auth::user()->phone); ?>" id="phone" placeholder="Phone">
                                </div>
                                <div class="form-group float-label-control">
                                    <label for="date_of_birth">Date of Birth</label>
                                    <input type="text" name="date_of_birth" value="<?php echo e(!empty($user_details)?$user_details->date_of_birth:''); ?>" class="form-control datepicker" id="date_of_birth" placeholder="Date of Birth">
                                </div>
                                <div class="form-check">
                                    <?php if(!empty($user_details) && $user_details->gender=='male'): ?>
                                        <input class="form-check-input" type="radio" value="male" name="gender" id="male" checked>
                                    <?php else: ?> 
                                        <input class="form-check-input" type="radio" value="male" name="gender" id="male">
                                    <?php endif; ?>
                                    <label class="form-check-label" for="male">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <?php if(!empty($user_details) && $user_details->gender=='female'): ?>
                                        <input class="form-check-input" type="radio" value="female" name="gender" id="female" checked>
                                    <?php else: ?> 
                                        <input class="form-check-input" type="radio" value="female" name="gender" id="female">
                                    <?php endif; ?>
                                    <label class="form-check-label" for="female">
                                        Female
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6 language">
                                <div class="form-group float-label-control">
                                    <label for="address">Address</label>
                                    <textarea name="address" class="form-control" id="address" placeholder="Address" rows="4"><?php echo e(!empty($user_details)?$user_details->address:''); ?></textarea>
                                </div>
                                <label for="language">Languages Known (Hold shift/ctrl to select more than one language)</label>
                                <select class="form-select select2" name="language_slug" id="language">
                                    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($language->slug); ?>" <?php echo e(!empty($user_details)?($user_details->language_slug==$language->slug?'selected':''):''); ?>><?php echo e($language->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                                </select>
                                <div class="form-group float-label-control">
                                    <label for="skype_id">Skype ID</label>
                                    <input type="name" name="skype_id" class="form-control" value="<?php echo e(!empty($user_details)?$user_details->skype_id:''); ?>" id="skype_id" placeholder="Skype ID">
                                </div>
                            </div>
                            <div class="form-group float-label-control">
                                <button type="submit" class="btn btn-info">Save</button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Qualification & Qualification Details -->
                <div id="tab02" class="tab-contents">
                    <?php 
                        $qualifications = isset(Auth::user()->hasUserQualification)?Auth::user()->hasUserQualification:null;
                        $qualification_details = isset(Auth::user()->hasUserQualificationDetails)?Auth::user()->hasUserQualificationDetails:null;
                    ?> 
                    <form id="qualification-details" method="post" action="<?php echo e(route('my_profile.qualifications')); ?>">
                        <?php echo csrf_field(); ?>
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
                            <label for="achievement">Achievemnts</label>
                            <textarea class="form-control" id="achievement" name="achievements" placeholder="Achievemnts" rows="5"><?php echo e(isset($qualification_details->achievements)?$qualification_details->achievements:''); ?></textarea>
                        </div>
                        <div class="form-group float-label-control">
                            <label for="awards">Awards</label>
                            <textarea class="form-control" id="awards" name="awards" placeholder="Awards" rows="5"><?php echo e(isset($qualification_details->awards)?$qualification_details->awards:''); ?></textarea>
                        </div>
                        <div class="form-group float-label-control">
                            <label for="additional">Additional </label>
                            <textarea class="form-control" id="additional" name="additional_data" placeholder="Additional" rows="5"><?php echo e(isset($qualification_details->additional_data)?$qualification_details->additional_data:''); ?></textarea>
                        </div>
                        <div class="form-group float-label-control">
                            <button type="submit" class="btn btn-info">Save</button>
                        </div>
                    </form>
                </div>

                <!-- Experience & Experience Details -->
                <div id="tab03" class="tab-contents">
                    <form id="experience-details" method="post" action="<?php echo e(route('my_profile.experience')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="row experience">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="position">Position</label>
                                    <input type="text" name="positions[]" class="form-control" placeholder="Enter position">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Company">Company</label>
                                    <input type="text" name="companieds[]" class="form-control" placeholder="Enter company name">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="joining_dates">Joining Date</label>
                                    <input class="form-control datepicker" name="joining_dates[]" id="joining-date" placeholder="Select joining date">
                                    <span id="error-joining-date"></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="leaving_date">leaving Date</label>
                                    <input type="text" name="leaving_date[]" class="form-control datepicker" id="leaving-date" placeholder="Select leaving date">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="leaving_date">Experience</label>
                                    <input type="text" name="experiences[]" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="tool-tip">
                                    <div class="title">
                                        <button type="button" id="experience-btn" class="blue-btn-small">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <span id="added-more-experience"></span>

                        <div class="clearfix mb-3"></div>
                        <div class="row ">
                            <div class="form-group">
                                <label for="summar">Summary</label>
                                <textarea name="summary" rows="3" id="summar" class="form-control" placeholder="Enter summary"></textarea>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="form-group">
                                <label for="experties">Expertise Details</label>
                                <textarea name="expertise" rows="3" id="experties" class="form-control" placeholder="Enter experties"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <button type="submit" class="btn btn-info">Save</button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Resume -->
                <div id="tab04" class="tab-contents">
                    <form action="/action_page.php">
                        <div class="row">
                            <div class="form-group">
                                <label for="upload">Resume</label>
                                <input type="file" id="myFile" class="form-control" name="resume">
                            </div>
                            <div class="form-group float-label-control">
                                <label for="">LinkedIn Url  </label>
                                <input type="text" class="form-control" placeholder="LinkedIn Url">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <button type="submit" class="btn btn-info">Save</button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Interview Type -->
                <div id="tab05" class="tab-contents">
                    <div class="form-check">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="div">
                                    <label for="interview">
                                        Interview type
                                    </label>
                                </div>
                                <input class="form-check-input" type="checkbox" value="" id="technical">

                                <label class="form-check-label" for="technical">
                                    Technical
                                </label>
                                <div class="mt-3">
                                    <input class="form-check-input" type="checkbox" value="" id="hr">

                                    <label class="form-check-label" for="hr">
                                        HR
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 mt-3">
                                    <button type="submit" class="btn btn-info">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Password Update  -->
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
                                <button type="submit" class="btn btn-info">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script>
        $(document).on('change', '#joining-date', function(){
            var joining_date = $(this).val();
            var leaving_date = $('#leaving-date').val();
            if(joining_date > leaving_date){
                $('#error-joining-date').html('Joining date should be less than leaving date.');
            }else{
                $('#error-joining-date').html('');
            }
        });
        $(document).on('change', '#leaving-date', function(){
            var leaving_date = $(this).val();
            var joining_date = $('#joining-date').val();
            if(leaving_date < leaving_date){
                $('#error-joining-date').html('Leaving date should be greater than leaving date.');
                return false; 
            }else{
                $('#error-joining-date').html('');
            }
            // Below one is the single line logic to calculate the no. of years...
            var years = new Date(new Date(joining_date) - new Date(leaving_date)).getFullYear() - 1970;
            alert(years);
        });
        /* document.getElementById('getYearsBtn').addEventListener('click', function () {
            var enteredDate = document.getElementById('sampleDate').value;
            // Below one is the single line logic to calculate the no. of years...
            var years = new Date(new Date() - new Date(enteredDate)).getFullYear() - 1970;
            console.log(years);
        }); */

        $(document).on('click', '#experience-btn', function(){
            var html = '<div class="row experience">'+
                            '<div class="col-md-2">'+
                                '<div class="form-group">'+
                                    '<input type="text" class="form-control" placeholder="Enter position">'+
                                '</div>'+
                            '</div>'+
                            '<div class="col-md-3">'+
                                '<div class="form-group">'+
                                    '<input type="text" class="form-control" placeholder="Enter company name">'+
                                '</div>'+
                            '</div>'+
                            '<div class="col-md-2">'+
                                '<div class="form-group">'+
                                    '<input type="text" class="form-control" placeholder="Select joining date">'+
                                '</div>'+
                            '</div>'+
                            '<div class="col-md-2">'+
                                '<div class="form-group">'+
                                    '<input type="text" class="form-control" placeholder="Select leaving date">'+
                                '</div>'+
                            '</div>'+
                            '<div class="col-md-2">'+
                                '<div class="form-group">'+
                                    '<input type="text" class="form-control" readonly>'+
                                '</div>'+
                            '</div>'+
                            '<div class="col-md-1">'+
                                '<div class="tool-tip">'+
                                    '<button type="button" id="experience-remove-btn" style="background-color:#b92b2b" class="blue-btn-small ml-2">'+
                                        '<i class="fa fa-times"></i>'+
                                    '</button>'+
                                '</div>'+
                            '</div>'+
                        '</div>';
                $('#added-more-experience').append(html);
        });

        $(document).on('click', '#experience-remove-btn', function(){
            $(this).parents('.experience').remove();
        });

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
        
        $(document).ready(function() {
            $('.button-left').click(function() {
                $('.sidebar').toggleClass('fliph');
            });
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
<?php $__env->stopPush(); ?>
<?php echo $__env->make('web-views.dashboard.master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/web-views/candidate/my_profile.blade.php ENDPATH**/ ?>