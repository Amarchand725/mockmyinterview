@extends('web-views.dashboard.master.app')

@section('title', $page_title)

@push('css')
@endpush

@section('content')
    <div class="container-fluid py-3 ">
        <div class="row mx-auto">
            <div class="col-md-12 email_verificaion_box ">
                <div class="row side-heading-font">
                    <span class="col-md-12"><center>Update your 'Profile' before attending your session for a complete evaluation!</center></span>
                </div>
            </div>
            <div class="col-md-12 email_verificaion_box ">
                <div class="row ">
                    <div class="col-md-12">
                        <span class="side-heading-font">Verify your Email </span>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-12">
                        <span class="sub-text-normal">
                            We have sent a verification mail to your registered email address. Open your email and click on the confirmation link.
                        </span>
                    </div>
                    <div class="col-md-12 mt-3">
                        <div class="row padding-none ng-scope" ng-if="user.group == 1">
                            <div class="col-md-2">
                                <button class="btn-default-enabled edit-email-btn" type="button">
                                    <span style="text-align:center;"><i class="fa fa-send"></i> Update Email</span>
                                </button> 
                            </div>
                            <div class="col-md-2">
                                <form action="{{ route('send_email') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                                    <input type="hidden" name="type" value="resend">
                                    <button class="btn-default-enabled " type="submit">
                                        <i class="fa fa-send"></i> Resend Email
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3" id="editable-email" style="display: none">
                        <form action="{{ route('send_email') }}" method="post">
                            @csrf
                            <div class="col-md-6">
                                <div class="input-group">
                                <input type="email" name="email" class="form-control ng-pristine ng-valid ng-touched" placeholder="Enter your email*" required>
                                <span style="color:red">{{ $errors->first('email') }}</span>
                                <span class="input-group-btn ">
                                    <button class="blue-btn-small p-2" type="submit" data-toggle="tooltip" data-placement="top" title="Click to submit email">
                                        <i class="fa fa-send"></i> Update
                                    </button>
                                </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mx-auto">
            <div class="col-md-12 well bg-white text-center shedule-first">
                <center>
                    <h1 class="main-content-heading-font">
                        Get Yourself Interview Ready!
                    </h1>

                    <button class="col-md-4 blue-btn-large" type="button" id="scheduleFirstInterview" ng-show="!is_sessions_completed &amp;&amp; !is_sessions_scheduled" ng-click="schedule_session()" aria-hidden="false">Schedule First Interview</button>
                </center>
            </div>
        </div>

        <div class=" well mx-auto mt-4 p-4">
            <h2>Resources</h2>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <span class="res_img pull-left">
                            <img src="assets/img/Interview Tips 2.png" alt="" class="img-fluid">
                            <span class="ml-2">
                                <a href="#">
                                    How to Refine Your English through Listening
                                </a> 
                            </span>
                        </span>
                    </div>
                    <div class="col-md-4">
                        <span class="carrer_man">Career Management</span>
                        <span class="carrer ">Career </span>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-6">
                        <span class="res_img pull-left">
                            <img src="assets/img/Interview Tips 2.png" alt="" class="img-fluid">
                            <span class="ml-2"><a href="#">
                            How to Refine Your English through Listening
                            </a> </span>
                        </span>
                    </div>
                    <div class="col-md-4">
                        <span class="carrer_man">Career Management</span>
                        <span class="carrer ">Career </span>
                    </div>
                </div>
                <div class="col-md-12 mt-2">
                    <div class="col-md-6">

                        <span class="res_img pull-left">
                            <img src="assets/img/Interview Tips 2.png" alt="" class="img-fluid">
                            <span class="ml-2"><a href="#">
                            How to Refine Your English through Listening
                            </a> </span>
                        </span>
                    </div>
                    <div class="col-md-4">
                        <span class="carrer_man">Career Management</span>
                        <span class="carrer ">Career </span>
                    </div>
                </div>
                <div class="col-md-12 mt-2">
                    <div class="col-md-6">

                        <span class="res_img pull-left">
                            <img src="assets/img/Interview Tips 2.png" alt="" class="img-fluid">
                            <span class="ml-2"><a href="#">
                            How to Refine Your English through Listening
                            </a> </span>
                        </span>
                    </div>
                    <div class="col-md-4">
                        <span class="carrer_man">Career Management</span>
                        <span class="carrer ">Career </span>
                    </div>
                    <button class="btn btn primary pull-right view_btn">View All</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).on('click', '.edit-email-btn', function(){
            if(!$(this).hasClass('edit-email')){
                $(this).addClass("edit-email");
                $('#editable-email').css('display', 'block');
            }else{
                $(this).removeClass("edit-email");
                $('#editable-email').css('display', 'none');
            }
        });
    </script>
@endpush