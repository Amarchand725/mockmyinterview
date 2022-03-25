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
                                    <input type="text" class="form-control my_profile" placeholder="Date of Birth">
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
                            <select class="form-select select2" aria-label="Default select example">
                                <option selected>Select Language</option>
                                @foreach ($languages as $language)
                                    <option value="{{ $language->slug }}">{{ $language->title }}</option>
                                @endforeach    
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
                                    <div class="form-group">
                                        <label for="college">College</label>
                                        <input type="text" name="edu1_college" id="edu1_college" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="degree">Degree</label>
                                        <select name="degree" class="form-control select2 degree" id="">
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
                                        <select name="course" id="courses" class="form-control selecte2">
                                        </select>
                                        <input type="text" name="edu1_course" class="form-control ng-pristine ng-untouched ng-valid" ng-model="input.edu[1].course" id="eduT1_course" aria-invalid="false" style="display: none;">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="yearOfPassing">Year of Passing</label>
                                        <input type="text" class="form-control" name="passing_year">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="tool-tip">
                                        <div class="title">
                                            <button id="addEducationinterviewerProfile" class="blue-btn-small">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <span id="added-more"></span>
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
@endsection
@push('js')
    <script>
        $(document).on('change', '.degree', function(){
            var degree_slug = $(this).val();
            $.ajax({
                type:'GET',
                url:'{{ url("get_courses") }}/'+degree_slug,
                success: function( response ) {
                    var html = '';
                    jQuery.each(response, function(index, val) {
                        html += '<option value="'+val.slug+'">'+val.title+'</option>';
                    });
                    $('#courses').html(html);
                }
            });
        })

        $(document).ready(function() {
            $('.button-left').click(function() {
                $('.sidebar').toggleClass('fliph');
            });

        });

        /* $(function() {
            $('.selectpicker').selectpicker();
        }); */

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