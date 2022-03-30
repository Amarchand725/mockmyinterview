@extends('web-views.dashboard.master.app')

@section('title', $page_title)

@push('css')
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
@endpush

@section('content')
    <div class="container-fluid py-3 ">
        <h2 class="mb-3">My Profile </h2>
        <div class=" email_verificaion_box bg-white ">
            <form action="{{ route('my_profile.personal_details') }}" method="post" enctype="multipart/form-data">
                @csrf
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
                                    <td>{{ Auth::user()->user_id }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Name</th>
                                    <td>{{ Auth::user()->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Email</th>
                                    <td>{{ Auth::user()->email }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Mobile</th>
                                    <td colspan="2">{{ Auth::user()->phone }}</td>
                                </tr>
                            </tbody>
                            <tbody id="editable" style="display: none">
                                <input type="hidden" name="user_type" value="candidate">
                                <input type="hidden" name="last_name" value="{{ Auth::user()->last_name }}">
                                <tr>
                                    <th scope="row">User ID</th>
                                    <td>{{ Auth::user()->user_id }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Name</th>
                                    <td><input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control"></td>
                                </tr>
                                <tr>
                                    <th scope="row">Email</th>
                                    <td><input type="text" value="{{ Auth::user()->email }}" class="form-control" readonly></td>
                                </tr>
                                <tr>
                                    <th scope="row">Mobile</th>
                                    <td colspan="2"><input type="text" name="phone" value="{{ Auth::user()->phone }}" class="form-control"></td>
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
                            @if(!empty(Auth::user()->image))
                                <img class="rounded-circle" src="{{ asset('public/web/assets/images/user') }}/{{ Auth::user()->image }}" width="150px" height="150px" alt="avatarr" class="img-fluid">
                            @else 
                                <img src="assets/img/avatarr.png" alt="avatarr" class="img-fluid">
                            @endif
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
                <form action="{{ route('my_profile.password') }}" method="post">
                    @csrf
                    <div class="form-group float-label-control">
                        <label for="password">Current Password  <span style="color: red">*</span></label>
                        <input type="password" name="current_password" class="form-control" id="password" placeholder="Current Password" required>
                        <span style="color: red">{{ $errors->first('current_password') }}</span>
                    </div>
                    <div class="form-group float-label-control">
                        <label for="new_password">New password <span style="color: red">*</span></label>
                        <input type="password" name="password" class="form-control" id="new_password" placeholder="New password" required>
                        <span style="color: red">{{ $errors->first('password') }}</span>
                    </div>
                    <div class="form-group float-label-control">
                        <label for="confirm_password">Confirm Password <span style="color: red">*</span></label>
                        <input type="password" name="confirm-password" class="form-control" id="confirm_password" placeholder="Confirm Password" required>
                        <span style="color: red">{{ $errors->first('confirm-password') }}</span>
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
                    @php 
                        $qualifications = isset(Auth::user()->hasUserQualification)?Auth::user()->hasUserQualification:null;
                        $skills = isset(Auth::user()->hasSkills)?Auth::user()->hasSkills:null;
                        $projects = isset(Auth::user()->hasProjects)?Auth::user()->hasProjects:null;
                    @endphp 
                    <form id="qualification-details" method="post" action="{{ route('my_profile.qualifications') }}">
                        @csrf

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
                            <label for="skills">Skills</label>
                            <textarea name="skills" class="form-control" id="skills" placeholder="Skills" rows="5">{{ isset($skills)?$skills->skills:'' }}</textarea>
                        </div>
                        <div class="form-group float-label-control">
                            <label for="projects">Projects</label>
                            <textarea name="projects" class="form-control" id="projects" placeholder="Projects" rows="5">{{ isset($projects)?$projects->projects:'' }}</textarea>
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
@endsection
@push('js')
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
@endpush