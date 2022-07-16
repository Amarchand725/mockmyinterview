@extends('web-views.dashboard.master.app')

@section('title', $page_title)
<input type="hidden" id="page_url" value="{{ route('available_slot.index') }}">
@push('css')
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
@endpush
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
                        <li><a href="#tab05">Change Password</a></li>
                        <li><a href="#tab06">Interview Types</a></li>
                        <li><a href="#tab07">Schedule Interview</a></li>
                    </ul>
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

                <!-- Password Update  -->
                <div id="tab05" class="tab-contents">
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

                <!-- Interview Type -->
                <div id="tab06" class="tab-contents">
                    <form action="{{ route('interviewer_interview_types.store') }}" method="post" id="interviewer_interview_type_form">
                        @csrf
                        <div class="row mx-auto custome" style="border: 2px solid #eee;">
                            @if(!empty($interviewer_interview_types))
                                @foreach ($interviewer_interview_types as $interview_type)
                                    <div class="row" id="id-{{ $interview_type->parent_interview_type_id }}">
                                        <div class="col-md-5">
                                            <label for="start-date">Parent Interview Type</label>
                                            <select name="parent_ids[]" id="" class="form-control parent-type" required>
                                                <option value="" disabled selected>Select parent</option>
                                                @foreach ($parent_interview_types as $type)
                                                    <option value="{{ $type->id }}" {{ $interview_type->parent_interview_type_id==$type->id?'selected':'' }}>{{ $type->name }}</option>
                                                @endforeach
                                            </select>
                                            <span style="color: red" id="error-parent_ids">{{ $errors->first('parent_ids') }}</span>
                                        </div>

                                        <div class="col-md-5">
                                            <div class="form-group float-label-control">
                                                <label for="start-date">Child Interview Type</label>
                                                @php
                                                    $child_interviewer_types = [];
                                                    foreach (getInterviewerChildInterviewTypes($interview_type->parent_interview_type_id) as $key => $child) {
                                                        $child_interviewer_types[] = $child->child__interview_type_id;
                                                    }
                                                @endphp
                                                <span id="child-types">
                                                    <select name="child_interview_types[{{ $interview_type->parent_interview_type_id }}][]" multiple id="child_interview_type_id" class="form-control">
                                                        @foreach (getChildInterviewTypes($interview_type->parent_interview_type_id) as $child_type)
                                                            <option value="{{ $child_type->id }}" {{in_array($child_type->id, $child_interviewer_types) ? 'selected' : '' }}>{{ $child_type->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span style="color: red" id="error-child_interview_types">{{ $errors->first('child_interview_types') }}</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-danger delete" data-interviewer-interview-id="{{ $interview_type->parent_interview_type_id }}" data-del-url="{{ route('interviewer_interview_types.destroy', $interview_type->parent_interview_type_id) }}" style="margin-top: 35px"><i class="fa fa-times"></i></button>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <div class="row custome-interview-types">
                                <div class="col-md-5">
                                    <input type="hidden" id="parent-types" data-parent-types="{{ json_encode($parent_interview_types) }}">
                                    <label for="start-date">Parent Interview Type</label>
                                    <select name="parent_ids[]" id="" class="form-control parent-type" @if(empty($interviewer_interview_types)) required @endif>
                                        <option value="" disabled selected>Select parent</option>
                                        @foreach ($parent_interview_types as $type)
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                    <span style="color: red" id="error-parent_ids">{{ $errors->first('parent_ids') }}</span>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-group float-label-control">
                                        <label for="start-date">Child Interview Type</label>
                                        <span id="child-types">
                                            <select name="child_interview_types" multiple id="child_interview_type_id" class="form-control"></select>
                                            <span style="color: red" id="error-child_interview_types">{{ $errors->first('child_interview_types') }}</span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-success btn-sm add-more-types-btn" style="margin-top: 35px"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group mt-4">
                                    <button class="btn btn-info" type="submit">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Schedule Interview -->
                <div id="tab07" class="tab-contents">
                    <h2 class="mb-3 text-left">Interview Scheduler </h2>
                    <div class="py-3">
                        <form id="available-slot-form">
                            <div class="row mx-auto" style="border: 2px solid #eee;">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                            <label class="control-label" for="datepicker-start">Start Date</label>
                                            <input type="datetime-local" class="form-control" name="start_date" id="datepicker-start">
                                            <span style="color: red" id="error-datepicker-start">{{ $errors->first('start_date') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                            <label class="control-label" for="datepicker-end">End Date</label>
                                            <input type="datetime-local" class="form-control" name="end_date" id="datepicker-end">
                                            <span style="color: red" id="error-datepicker-end">{{ $errors->first('end_date') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mx-auto" style="border: 2px solid #eee;">
                                <span style="color: red" id="error-slots"></span>
                                <span class="slot-days">
                                    {{-- <div class="row" style="">
                                        <div class="well col-sm-12">
                                            <div class="py-3">
                                                <center><h6>Available Slots</h6></center>
                                                <div class="row py-3">
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                </span>
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
                    <br />
                    <h2 class="mb-3 text-left">Your Exist Slots </h2>
                    <div class="py-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>S.No#</th>
                                    <th>Start Date</th>
                                    <th>Start Time</th>
                                    <th>End Date</th>
                                    <th>End Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="body">
                                @foreach($interviewer_slots as $key=>$slot)
                                    <tr id="id-{{ $slot->id }}">
                                        <td>{{  $interviewer_slots->firstItem()+$key }}.</td>
                                        <td>{{ date('d, F-Y', strtotime($slot->start_date)) }}</td>
                                        <td>{{ $slot->start_time }}</td>
                                        <td>{{ date('d, F-Y', strtotime($slot->end_date)) }}</td>
                                        <td>{{ $slot->end_time }}</td>
                                        <td>
                                            <button class="btn btn-info btn-sm slots-btn" data-show-url="{{ route('available_slot.show', $slot->id) }}"><i class="fa fa-eye"></i> Slots</button>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="6">
                                        Displying {{$interviewer_slots->firstItem()}} to {{$interviewer_slots->lastItem()}} of {{$interviewer_slots->total()}} records
                                        <div class="d-flex justify-content-center">
                                            {!! $interviewer_slots->links('pagination::bootstrap-4') !!}
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="slot-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #2279d3; color:white ">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-clock-o"></i> Exist Slots</h5>
                </div>
                <div class="modal-body">
                ...
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).on('click', '.slots-btn', function(){
            var url = $(this).attr('data-show-url');
            $.ajax({
                url : url,
                success : function(response){
                    $('.modal-body').html(response);
                }
            });
            $('#slot-modal').modal('show');
        });

        $('#available-slot-form').on('submit',function(e){
            e.preventDefault();
            var pageurl = $('#page_url').val();
            var page = 1;

            let start_date = $("#datepicker-start").val();
            let end_date = $('#datepicker-end').val();

            let selected_dates = [];
            $("input[name='slots[]']:checked").each(function() {
                selected_dates.push(this.value);
            });
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('available_slot.store') }}",
                type:"POST",
                data:{
                    start_date : start_date,
                    end_date : end_date,
                    selected_dates : selected_dates,
                },

                success:function(response){
                    fetchAll(pageurl, page);
                    // console.log(response);

                    if(response=='success'){
                        $('#datepicker-start').val('');
                        $('#datepicker-end').val('');
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Slots saved successfully.',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong try again.',
                        })
                    }
                },
                error: function(response) {
                    $('#error-datepicker-start').text(response.responseJSON.errors.start_date);
                    $('#error-datepicker-end').text(response.responseJSON.errors.end_date);
                    $('#error-slots').text(response.responseJSON.errors.selected_dates);
                },
            });
        });

        $(document).on('click', '.pagination a', function(event){
            event.preventDefault();
            var pageurl = $('#page_url').val();
            var page = $(this).attr('href').split('page=')[1];
            fetchAll(pageurl, page);
        });

        function fetchAll(pageurl, page){
            $.ajax({
                url:pageurl+'?page='+page,
                type: 'get',
                success: function(response){
                    $('#body').html(response);
                }
            });
        }

        //delete record
        $('.delete').on('click', function(){
            var slug = $(this).attr('data-interviewer-interview-id');
            var delete_url = $(this).attr('data-del-url');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url : delete_url,
                        type : 'DELETE',
                        success : function(response){
                            if(response){
                                $('#id-'+slug).hide();
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                            }else{
                                Swal.fire(
                                    'Not Deleted!',
                                    'Sorry! Something went wrong.',
                                    'danger'
                                )
                            }
                        }
                    });
                }
            })
        });

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
                    url : "{{ route('create-slots') }}",
                    data : {'start_date_time' : start_date_time, 'end_date_time' : end_date_time},
                    success : function(response){
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
                    url : "{{ route('create-slots') }}",
                    data : {'start_date_time' : start_date_time, 'end_date_time' : end_date_time},
                    success : function(response){
                        $('.slot-days').html(response);
                    }
                });
            }
        });

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
                                '<span style="color: red">{{ $errors->first("parent_id") }}</span>'+
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
                url : "{{ route('get-child-interview-types') }}",
                data : {'parent_id' : parent_id},
                success : function(response){
                    var html = '<select name="child_interview_types['+response.parent_id+'][]" multiple id="child_interview_type_id" class="form-control" @if(empty($interviewer_interview_types)) required @endif>'+
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

        $(document).on('click', '.slot', function(){
            if($(this).hasClass('slot-selected')){
                $(this).removeClass('slot-selected');
            }else{
                $(this).addClass('slot-selected');
            }
        });
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
