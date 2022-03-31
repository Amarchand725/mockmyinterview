@extends('web-views.dashboard.master.app')

@section('title', $page_title)

@section('content')
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
                    <form id="personal-details" method="post" action="{{ route('my_profile.personal_details') }}">
                        @csrf
                        @php $user_details = isset(Auth::user()->hasUserDetails)?Auth::user()->hasUserDetails:null; @endphp 
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group float-label-control">
                                    <label for="first_name">First Name  </label>
                                    <input type="name" name="name" class="form-control" value="{{ Auth::user()->name }}" id="first_name" placeholder="First Name">
                                </div>
                                <div class="form-group float-label-control">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" name="last_name" class="form-control" value="{{ Auth::user()->last_name }}" id="last_name" placeholder="Last Name">
                                </div>
                                <div class="form-group float-label-control">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" readonly value="{{ Auth::user()->email }}" id="email" placeholder="email">
                                </div>
                                <div class="form-group float-label-control">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" class="form-control" value="{{ Auth::user()->phone }}" id="phone" placeholder="Phone">
                                </div>
                                <div class="form-group float-label-control">
                                    <label for="date_of_birth">Date of Birth</label>
                                    <input type="text" name="date_of_birth" value="{{ !empty($user_details)?$user_details->date_of_birth:'' }}" class="form-control datepicker" id="date_of_birth" placeholder="Date of Birth">
                                </div>
                                <div class="form-check">
                                    @if(!empty($user_details) && $user_details->gender=='male')
                                        <input class="form-check-input" type="radio" value="male" name="gender" id="male" checked>
                                    @else 
                                        <input class="form-check-input" type="radio" value="male" name="gender" id="male">
                                    @endif
                                    <label class="form-check-label" for="male">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    @if(!empty($user_details) && $user_details->gender=='female')
                                        <input class="form-check-input" type="radio" value="female" name="gender" id="female" checked>
                                    @else 
                                        <input class="form-check-input" type="radio" value="female" name="gender" id="female">
                                    @endif
                                    <label class="form-check-label" for="female">
                                        Female
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6 language">
                                <div class="form-group float-label-control">
                                    <label for="address">Address</label>
                                    <textarea name="address" class="form-control" id="address" placeholder="Address" rows="4">{{ !empty($user_details)?$user_details->address:'' }}</textarea>
                                </div>
                                <label for="language">Languages Known (Hold shift/ctrl to select more than one language)</label>
                                <select class="form-select select2" name="language_slug" id="language">
                                    @foreach ($languages as $language)
                                        <option value="{{ $language->slug }}" {{ !empty($user_details)?($user_details->language_slug==$language->slug?'selected':''):'' }}>{{ $language->title }}</option>
                                    @endforeach    
                                </select>
                                <div class="form-group float-label-control">
                                    <label for="skype_id">Skype ID</label>
                                    <input type="name" name="skype_id" class="form-control" value="{{ !empty($user_details)?$user_details->skype_id:'' }}" id="skype_id" placeholder="Skype ID">
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
                    @php 
                        $qualifications = isset(Auth::user()->hasUserQualification)?Auth::user()->hasUserQualification:null;
                        $qualification_details = isset(Auth::user()->hasUserQualificationDetails)?Auth::user()->hasUserQualificationDetails:null;
                    @endphp 
                    <form id="qualification-details" method="post" action="{{ route('my_profile.qualifications') }}">
                        @csrf
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
                                        @foreach ($degrees as $degree)
                                            <option value="{{ $degree->slug }}">{{ $degree->title }}</option>
                                        @endforeach
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
                                        <button type="button" data-degrees="{{ $degrees }}" id="institute-btn" class="blue-btn-small">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(!empty($qualifications))
                            @foreach ($qualifications as $key=>$qualification)
                                @php 
                                    $courses = courses($qualification->degree_slug);
                                @endphp 
                                <div class="row institute">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" name="institutes[]" id="institute" class="form-control" value="{{ $qualification->institute }}" placeholder="Enter institute name">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select name="degrees[]" class="form-control select2 degree" id="">
                                                <option value="" selected>Select degree</option>
                                                @foreach ($degrees as $degree)
                                                    <option value="{{ $degree->slug }}" {{ $qualification->degree_slug==$degree->slug?'selected':'' }}>{{ $degree->title }}</option>
                                                @endforeach
                                            </select>   
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select name="courses[]" id="courses" class="form-control selecte2">
                                                <option value="" selected>Select course</option>
                                                @foreach ($courses as $course)
                                                    <option value="{{ $course->slug }}" {{ $qualification->course_slug==$course->slug?'selected':'' }}>{{ $course->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="text" value="{{ $qualification->passing_year }}" class="form-control" id="passing_year" name="passing_years[]" placeholder="Year e.g 2022">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="tool-tip">
                                            <button type="button" data-degrees="{{ $degrees }}" id="remove-btn" style="background-color:#b92b2b" class="blue-btn-small ml-2">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>   
                            @endforeach
                        @endif
                        <span id="added-more"></span>    

                        <div class="form-group float-label-control">
                            <label for="achievement">Achievemnts</label>
                            <textarea class="form-control" id="achievement" name="achievements" placeholder="Achievemnts" rows="5">{{ isset($qualification_details->achievements)?$qualification_details->achievements:'' }}</textarea>
                        </div>
                        <div class="form-group float-label-control">
                            <label for="awards">Awards</label>
                            <textarea class="form-control" id="awards" name="awards" placeholder="Awards" rows="5">{{ isset($qualification_details->awards)?$qualification_details->awards:'' }}</textarea>
                        </div>
                        <div class="form-group float-label-control">
                            <label for="additional">Additional </label>
                            <textarea class="form-control" id="additional" name="additional_data" placeholder="Additional" rows="5">{{ isset($qualification_details->additional_data)?$qualification_details->additional_data:'' }}</textarea>
                        </div>
                        <div class="form-group float-label-control">
                            <button type="submit" class="btn btn-info">Save</button>
                        </div>
                    </form>
                </div>

                <!-- Experience & Experience Details -->
                <div id="tab03" class="tab-contents">
                    <form id="experience-details" method="post" action="{{ route('my_profile.experience') }}">
                        @csrf
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
                        @foreach (Auth::user()->hasUserExperiences as $experience)
                            <div class="row experience">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="text" name="positions[]" class="form-control" value="{{ $experience->position }}" placeholder="Enter position">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" name="companies[]" class="form-control" value="{{ $experience->company }}" placeholder="Enter company name">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="text" name="joining_dates[]" class="form-control datepicker joining-date" value="{{ date('d/m/Y', strtotime($experience->joining_date)) }}" placeholder="Select joining date">
                                        <span class="error-joining-date" style="color:red"></span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="text" name="leaving_date[]" class="form-control datepicker leaving-date" value="{{ date('d/mY', strtotime($experience->leaving_date)) }}" placeholder="Select leaving date">
                                        <span class="error-leaving-date" style="color:red"></span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="text" name="experiences[]" class="form-control experience-years" value="{{ $experience->experiences }}" id="experience-years" readonly>
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
                        @endforeach
                        
                        <span id="added-more-experience"></span>

                        <div class="clearfix mb-3"></div>
                        <div class="row ">
                            <div class="form-group">
                                <label for="summar">Summary</label>
                                <textarea name="summary" rows="3" id="summar" class="form-control" placeholder="Enter summary">{{ isset(Auth::user()->hasUserExperienceDetails)?Auth::user()->hasUserExperienceDetails->summary:'' }}</textarea>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="form-group">
                                <label for="experties">Expertise Details</label>
                                <textarea name="expertise" rows="3" id="experties" class="form-control" placeholder="Enter experties">{{ isset(Auth::user()->hasUserExperienceDetails)?Auth::user()->hasUserExperienceDetails->expertise:'' }}</textarea>
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
                    <form action="{{ route('my_profile.resume') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            @if(isset(Auth::user()->hasResume) && !empty(Auth::user()->hasResume->resume))
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Exist Your Resume </label>
                                    <div class="col-sm-9" style="padding-top:5px">
                                        <iframe src="{{ asset('public/web/assets/resumes') }}/{{ Auth::user()->hasResume->resume }}" style="width:600px; height:500px;" frameborder="0"></iframe>
                                    </div>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="upload">Resume <small style="color: orange">(Uploade new resume if you want to replace otherwise keep it empty.)</small></label>
                                <input type="file" name="resume" id="myFile" class="form-control" accept=".doc, .docx, .pdf">
                            </div>
                            @if(isset(Auth::user()->hasResume) && !empty(Auth::user()->hasResume->introduction_video))
                                <div class="form-group">
                                    <label for="" class="col-sm-5 control-label">Exist Your Introduction Video </label>
                                    <div class="col-sm-9" style="padding-top:5px">
                                        <video width="320" height="240" controls>
                                            <source src="{{ asset('public/web/assets/resumes') }}/{{ Auth::user()->hasResume->introduction_video }}" type="video/mp4">
                                            <source src="movie.ogg" type="video/ogg">
                                            Your browser does not support the video tag.
                                          </video>
                                    </div>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="upload">Introduction Video <small style="color: orange">(Uploade new video if you want to replace otherwise keep it empty.)</small></label>
                                <input type="file" name="introduction_video" class="form-control" accept="video/mp4,video/x-m4v,video/*">
                            </div>
                            <div class="form-group float-label-control">
                                <label for="linkedin_url">LinkedIn Url  </label>
                                <input type="text" name="linkedin_url" value="{{ isset(Auth::user()->hasResume)?Auth::user()->hasResume->linkedin_url:'' }}" class="form-control" id="linkedin_url" placeholder="LinkedIn Url">
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
                    <form action="{{ route('my_profile.interview') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-check">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="div">
                                        <label for="interview">
                                            Interview type
                                        </label>
                                    </div>
                                    @if(isset(Auth::user()->hasResume) && Auth::user()->hasResume->technical==1)
                                        <input class="form-check-input" type="checkbox" name="technical" value="1" checked id="technical">
                                    @else 
                                        <input class="form-check-input" type="checkbox" name="technical" value="1" id="technical">
                                    @endif
                                    <label class="form-check-label" for="technical">
                                        Technical
                                    </label>
                                    <div class="mt-3">
                                        @if(isset(Auth::user()->hasResume) && Auth::user()->hasResume->hr==1)
                                            <input class="form-check-input" type="checkbox" name="technical" value="1" checked id="technical">
                                        @else 
                                            <input class="form-check-input" type="checkbox" name="technical" value="1" id="technical">
                                        @endif
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
                    </form>
                </div>

                <!-- Password Update  -->
                <div id="tab06" class="tab-contents">
                    <form action="{{ route('my_profile.password') }}" method="post">
                        @csrf
                        <div class="form-group float-label-control">
                            <label for="password">Current Password  <span style="color: red">*</span></label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Current Password" required>
                            <span style="color: red">{{ $errors->first('password') }}</span>
                        </div>
                        <div class="form-group float-label-control">
                            <label for="new_password">New password <span style="color: red">*</span></label>
                            <input type="password" name="new_password" class="form-control" id="new_password" placeholder="New password" required>
                            <span style="color: red">{{ $errors->first('new_password') }}</span>
                        </div>
                        <div class="form-group float-label-control">
                            <label for="confirm_password">Confirm Password <span style="color: red">*</span></label>
                            <input type="password" name="confirmed" class="form-control" id="confirm_password" placeholder="Confirm Password" required>
                            <span style="color: red">{{ $errors->first('confirmed') }}</span>
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
@endsection
@push('js')
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
                    url : "{{ url('calculate-experience') }}",
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
                    url : "{{ url('calculate-experience') }}",
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
                url:'{{ url("get_courses") }}/'+degree_slug,
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
@endpush