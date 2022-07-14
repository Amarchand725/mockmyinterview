

<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startPush('css'); ?>
    <style>
        .slot{
            border: none;
            font-style: inherit;
            font-variant: inherit;
            font-stretch: inherit;
            line-height: inherit;
            font-size: 16px;
            font-family: "Open Sans";
            cursor: pointer;
            border: 2px solid;
            border-radius: 15px;
            padding: 5px 17px;
            border-color: #050505f2;
            background: #847e7e;
            color: white;
        }
        .slot-selected{
            color: #fff!important;
            border-radius: 4px;
            background: #008739!important;
            border: 2px solid;
            border-radius: 15px;
            padding: 5px 17px;
            border-color: #050505f2;
        }
    </style>
<?php $__env->stopPush(); ?>
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
                        <li><a href="#tab05">Change Password</a></li>
                        <li><a href="#tab06">Interview Types</a></li>
                        <li><a href="#tab07">Schedule Interview</a></li>
                    </ul>
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
                                    <input type="text" name="companies[]" class="form-control" placeholder="Enter company name">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="joining_dates">Joining Date</label>
                                    <input class="form-control datepicker joining-date" name="joining_dates[]" id="joining-date" placeholder="Select joining date">
                                    <span class="error-joining-date" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="leaving_date">leaving Date</label>
                                    <input type="text" name="leaving_date[]" class="form-control datepicker leaving-date" id="leaving-date" placeholder="Select leaving date">
                                    <span class="error-leaving-date" style="color:red"></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="leaving_date">Experience</label>
                                    <input type="text" name="experiences[]" id="experience-years" class="form-control experience-years" readonly>
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
                        <?php $__currentLoopData = Auth::user()->hasUserExperiences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $experience): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="row experience">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="text" name="positions[]" class="form-control" value="<?php echo e($experience->position); ?>" placeholder="Enter position">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" name="companies[]" class="form-control" value="<?php echo e($experience->company); ?>" placeholder="Enter company name">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="text" name="joining_dates[]" class="form-control datepicker joining-date" value="<?php echo e(date('d/m/Y', strtotime($experience->joining_date))); ?>" placeholder="Select joining date">
                                        <span class="error-joining-date" style="color:red"></span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="text" name="leaving_date[]" class="form-control datepicker leaving-date" value="<?php echo e(date('d/mY', strtotime($experience->leaving_date))); ?>" placeholder="Select leaving date">
                                        <span class="error-leaving-date" style="color:red"></span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="text" name="experiences[]" class="form-control experience-years" value="<?php echo e($experience->experiences); ?>" id="experience-years" readonly>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="tool-tip">
                                        <button type="button" id="experience-remove-btn" class="blue-btn-small ml-2" style="background-color:#9d2424">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                        <span id="added-more-experience"></span>

                        <div class="clearfix mb-3"></div>
                        <div class="row ">
                            <div class="form-group">
                                <label for="summar">Summary</label>
                                <textarea name="summary" rows="3" id="summar" class="form-control" placeholder="Enter summary"><?php echo e(isset(Auth::user()->hasUserExperienceDetails)?Auth::user()->hasUserExperienceDetails->summary:''); ?></textarea>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="form-group">
                                <label for="experties">Expertise Details</label>
                                <textarea name="expertise" rows="3" id="experties" class="form-control" placeholder="Enter experties"><?php echo e(isset(Auth::user()->hasUserExperienceDetails)?Auth::user()->hasUserExperienceDetails->expertise:''); ?></textarea>
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
                            <div class="form-group float-label-control">
                                <label for="linkedin_url">LinkedIn Url  </label>
                                <input type="text" name="linkedin_url" value="<?php echo e(isset(Auth::user()->hasResume)?Auth::user()->hasResume->linkedin_url:''); ?>" class="form-control" id="linkedin_url" placeholder="LinkedIn Url">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <button type="submit" class="btn btn-info">Save</button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Password Update  -->
                <div id="tab05" class="tab-contents">
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
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Interview Type -->
                <div id="tab06" class="tab-contents">
                    <form action="<?php echo e(route('my_profile.interview')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row mx-auto custome" style="border: 2px solid #eee;">
                            <div class="row custome-interview-types">
                                <div class="col-md-5">
                                    <input type="hidden" id="parent-types" data-parent-types="<?php echo e(json_encode($parent_interview_types)); ?>">
                                    <label for="start-date">Parent Interview Type</label>
                                    <select name="parent_ids[]" id="" class="form-control parent-type">
                                        <option value="" disabled selected>Select parent</option>
                                        <?php $__currentLoopData = $parent_interview_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($type->id); ?>"><?php echo e($type->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <span style="color: red"><?php echo e($errors->first('parent_ids')); ?></span>
                                </div>
                                
                                <div class="col-md-5">
                                    <div class="form-group float-label-control">
                                        <label for="start-date">Child Interview Type</label>
                                        <span id="child-types">
                                            <select name="child_interview_types" multiple id="child_interview_type_id" class="form-control"></select>
                                            <span style="color: red"><?php echo e($errors->first('child_interview_types')); ?></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-success btn-sm add-more-types-btn" style="margin-top: 35px"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Schedule Interview -->
                <div id="tab07" class="tab-contents">
                    <h2 class="mb-3 text-left">Interview Scheduler </h2>
                    <div class="py-3">
                        <form action="<?php echo e(route('available_slot.store')); ?>" method="post" id="subform">
                            <?php echo csrf_field(); ?>
            
                            <div class="row mx-auto" style="border: 2px solid #eee;">
                                <div class="row">
                                    <div class="col-sm-6"> 
                                        <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                            <label class="control-label" for="datepicker-start">Start Date</label>
                                            <input type="datetime-local" class="form-control" name="start_date" id="datepicker-start">
                                            <span style="color: red" id="error-start-date"><?php echo e($errors->first('start_date')); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6"> 
                                        <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                            <label class="control-label" for="datepicker-end">End Date</label>
                                            <input type="datetime-local" class="form-control" name="end_date" id="datepicker-end">
                                            <span style="color: red" id="error-end-date"><?php echo e($errors->first('end_date')); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            <div class="row mx-auto pt-4" style="border: 2px solid #eee;">
                                <span class="slot-days"></span>
                            </div>
            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="tool-tip">
                                        <div class="title" style="text-align:left">
                                            <button type="submit" class="blue-btn-small" id="create-avialable-slot-btn">
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script>
        $(document).on('change', '#datepicker-start', function(){
            var start_date_time = $(this).val();
            var end_date_time = $('#datepicker-end').val();
            if(end_date_time == '' || end_date_time <= start_date_time){
                $('#error-end-date').html('Please add end date greater than start date.');
                return false;
            }else{
                $('#error-end-date').html('');
            } 
            
            if(start_date_time == '' || start_date_time >= end_date_time){
                $('#error-start-date').html('Please add start date less than end date.');
                return false;
            }else{
                $('#error-start-date').html('');
                $.ajax({
                    url : "<?php echo e(route('create-slots')); ?>",
                    data : {'start_date_time' : start_date_time, 'end_date_time' : end_date_time},
                    success : function(response){
                        // console.log(response);
                        $('.slot-days').html(response);
                    }
                });
            } 
        });

        $(document).on('change', '#datepicker-end', function(){
            var end_date_time = $(this).val();
            var start_date_time = $('#datepicker-start').val();
            if(end_date_time == '' || end_date_time <= start_date_time){
                $('#error-end-date').html('Please add end date greater than start date.');
                return false;
            }else{
                $('#error-end-date').html('');
            } 
            
            if(start_date_time == '' || start_date_time >= end_date_time){
                $('#error-start-date').html('Please add start date less than end date.');
                return false;
            }else{
                $('#error-start-date').html('');
                $.ajax({
                    url : "<?php echo e(route('create-slots')); ?>",
                    data : {'start_date_time' : start_date_time, 'end_date_time' : end_date_time},
                    success : function(response){
                        // console.log(response);
                        $('.slot-days').html(response);
                    }
                });
            }
        });

        /* $(document).on('click', '.slot', function(){
            if($(this).hasClass('slot-selected')){
                $(this).removeClass('slot-selected');
            }else{
                $(this).addClass('slot-selected');
            }
        }); */
        
        $(document).on('click', '.add-more-types-btn', function(){
            var selected=[];
            $('.parent-type :selected').each(function(){
                if($(this).val() != 'empty'){
                    selected[$(this).val()]=$(this).text();
                }
            }); 

            var parent_interview_types = $('#parent-types').data('parent-types');
            var html = '';

                html =  '<div class="row custome-interview-types">'+
                            '<div class="col-md-5">'+
                                '<select name="parent_ids[]" id="" class="form-control parent-type">'+
                                    '<option value="" disabled selected>Select parent</option>';
                                    jQuery.each(parent_interview_types, function(index, item) {
                                        if( $.inArray(item.name, selected) == -1 ) {
                                            html += '<option value="'+item.id+'">'+item.name+'</option>';
                                        }
                                    });
                                html += '</select>'+
                                '<span style="color: red"><?php echo e($errors->first("parent_id")); ?></span>'+
                            '</div>'+
                            
                            '<div class="col-md-5">'+
                                '<div class="form-group float-label-control">'+
                                    '<span id="child-types"><select name="child_interview_types" multiple id="child_interview_type_id" class="form-control"></select></span>'+
                                '</div>'+
                            '</div>'+
                            '<div class="col-md-2">'+
                                '<button type="button" class="btn btn-danger btn-sm remove-custome-btn"><i class="fa fa-times"></i></button>'+
                            '</div>'+
                        '</div>';
            $('.custome').append(html);
        });

        $(document).on('click', '.remove-custome-btn', function(){
            $(this).parents('.custome-interview-types').remove();
        });
        
        $(document).on('change', '.parent-type', function(){
            var parent_id = $(this).val();
            var current = $(this);
            $.ajax({
                url : "<?php echo e(route('get-child-interview-types')); ?>",
                data : {'parent_id' : parent_id},
                success : function(response){
                    var html = '<select name="child_interview_types['+response.parent_id+'][]" multiple id="child_interview_type_id" class="form-control">'+
                                '<label for="start-date">Child Interview Type</label>'+
                                '<option value="" selected>Select child interview type</option>';
                    $.each(response.child_interview_types , function(index, val) { 
                       html += '<option value="'+val.id+'">'+val.name+'</option>';
                    });
                    html += '</select>';

                    current.parents('.custome-interview-types').find('#child-types').html(html);
                }
            });
        });

        $(document).on('click', '.m-slot-btn', function(){
            var slot = $(this).val();
            var index = $(this).attr('data-index');
            $('#slot-m-'+index).val(slot);
        });

        $(document).on('click', '.e-slot-btn', function(){
            var slot = $(this).val();
            var index = $(this).attr('data-index');
            $('#slot-e-'+index).val(slot);
        });

        /* $(document).on('click', '.get-slots-btn', function(){
            var slot_type = $(this).val();

            if(!$(this).hasClass('opened')){
                $(this).addClass('opened');
                if(slot_type=='weekdays'){
                    $(this).text('Weekdays(-)');
                    $('#weekands_btn_label').text('Weekands(+)');
                    $('#weekands_btn_label').removeClass('opened');
                }else{
                    $(this).text('Weekands(-)');
                    $('#weekdays_btn_label').text('Weekdays(+)');
                    $('#weekdays_btn_label').removeClass('opened');
                }
                
                $.ajax({
                    url : "<?php echo e(route('get-slots')); ?>",
                    data : {'slot_type' : slot_type},
                    success : function(response){
                        $('.slot-days').html(response);
                    }
                });
            }else{
                $(this).removeClass('opened');
                $('.slot-days').html('');
                if(slot_type=='weekdays'){
                    $(this).text('Weekdays(+)');
                }else{
                    $(this).text('Weekands(+)');
                }
            }
        });

        $(document).ready(function() {
            var slot_type = $('.get-slots-btn').val();
            if(!$('.get-slots-btn').hasClass('opened')){
                $('.get-slots-btn').addClass('opened');
                if(slot_type=='weekdays'){
                    $('.get-slots-btn').text('Weekdays(-)');
                }else{
                    $('.get-slots-btn').text('Weekands(-)');
                }

                $.ajax({
                    url : "<?php echo e(route('get-slots')); ?>",
                    data : {'slot_type' : slot_type},
                    success : function(response){
                        $('.slot-days').html(response);
                    }
                });
            }else{
                $('.slot-days').html('');
                if($('.get-slots-btn').hasClass('opened')){
                    if(slot_type=='weekdays'){
                        $('.opened').text('Weekdays(-)');
                    }else{
                        $('.opened').text('Weekands(-)');
                    }

                    $.ajax({
                        url : "<?php echo e(route('get-slots')); ?>",
                        data : {'slot_type' : slot_type},
                        success : function(response){
                            $('.slot-days').html(response);
                        }
                    });
                }else{
                    if(slot_type=='weekdays'){
                        $('.opened').text('Weekdays(+)');    
                    }else{
                        $('.opened').text('Weekands(+)');    
                    }
                }
            }

            $('.button-left').click(function() {
                $('.sidebar').toggleClass('fliph');
            });
        }); */

        $(document).on('click', '.slot', function(){
            if($(this).hasClass('slot-selected')){
                $(this).removeClass('slot-selected');
            }else{
                $(this).addClass('slot-selected');
            }
        });

        /* var dateToday = new Date();
        var dates = $("#start-date, #end-date").datepicker({
            defaultDate: "+2d",
            changeMonth: true,
            numberOfMonths: 1,
            minDate: "+2d",
            onSelect: function(selectedDate) {
                var option = this.id == "start-date" ? "minDate" : "maxDate",
                    instance = $(this).data("datepicker"),
                    date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
                dates.not(this).datepicker("option", option, date);
            }
        }); */
    </script>
    <script>
        $(document).on('focus','.datepicker', function(){
            $(this).removeClass('hasDatepicker').datepicker();
        });
        $(document).on('change', '.joining-date', function(){
            var current = $(this);
            var joining_date = $(this).val();
            var leaving_date = $(this).parents('.experience').find('.leaving-date').val();
            
            if(new Date(joining_date) > new Date(leaving_date) || leaving_date==''){
                $(this).parents('.experience').find('.error-joining-date').html('Joining date should be less than leaving date.');
                return false;
            }else{
                $(this).parents('.experience').find('.error-joining-date').html('');

                $.ajax({
                    url : "<?php echo e(url('calculate-experience')); ?>",
                    data : {'joining_date' : joining_date, 'leaving_date':leaving_date},
                    type : 'GET',
                    success : function(response){
                        $(current).parents('.experience').find('.experience-years').val(response);
                    }
                });
            }
        });
        $(document).on('change', '.leaving-date', function(){
            var current = $(this);
            var leaving_date = $(this).val();
            var joining_date = $(this).parents('.experience').find('.joining-date').val();
            
            if(new Date(leaving_date) < new Date(joining_date) || joining_date==''){
                $(this).parents('.experience').find('.error-leaving-date').html('Leaving date should be greater than joining date.');
                $(this).val('');
                return false; 
            }else{
                $(this).parents('.experience').find('.error-joining-date').html('');
                $(this).parents('.experience').find('.error-leaving-date').html('');

                $.ajax({
                    url : "<?php echo e(url('calculate-experience')); ?>",
                    data : {'joining_date' : joining_date, 'leaving_date':leaving_date},
                    type : 'GET',
                    success : function(response){
                        $(current).parents('.experience').find('.experience-years').val(response);
                    }
                });
            }
        });

        $(document).on('click', '#experience-btn', function(){
            var html = '<div class="row experience">'+
                            '<div class="col-md-2">'+
                                '<div class="form-group">'+
                                    '<input type="text" name="positions[]" class="form-control" placeholder="Enter position">'+
                                '</div>'+
                            '</div>'+
                            '<div class="col-md-3">'+
                                '<div class="form-group">'+
                                    '<input type="text" name="companies[]" class="form-control" placeholder="Enter company name">'+
                                '</div>'+
                            '</div>'+
                            '<div class="col-md-2">'+
                                '<div class="form-group">'+
                                    '<input type="text" name="joining_dates[]" class="form-control datepicker joining-date" placeholder="Select joining date">'+
                                    '<span class="error-joining-date" style="color:red"></span>'+
                                '</div>'+
                            '</div>'+
                            '<div class="col-md-2">'+
                                '<div class="form-group">'+
                                    '<input type="text" name="leaving_date[]" class="form-control datepicker leaving-date" placeholder="Select leaving date">'+
                                    '<span class="error-leaving-date" style="color:red"></span>'+
                                '</div>'+
                            '</div>'+
                            '<div class="col-md-2">'+
                                '<div class="form-group">'+
                                    '<input type="text" name="experiences[]" id="experience-years" class="form-control experience-years" readonly>'+
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
<?php echo $__env->make('web-views.dashboard.master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mockmyinterview\resources\views/web-views/interviewer/my_profile.blade.php ENDPATH**/ ?>