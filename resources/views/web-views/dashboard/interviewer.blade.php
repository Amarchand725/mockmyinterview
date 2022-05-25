@extends('web-views.dashboard.master.app')

@section('title', $page_title)

@push('css')
@endpush

@section('content')
    <div class="container-fluid py-3 wrapper-sd wrp-d1 ">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 ">
                        <div class="panel1 wrapper">
                            <h3 class="font-thin m-t-none m-b text-muted">Getting Started</h3>
                            <div class="row">
                                <div class="col-xs-12 font-thin">
                                    <h4>Welcome to Mockmyinterview</h4>
                                    <p>Hey Buddy! Complete the steps below to start Mockmyinterview.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="list-group  alt title p-3" data-title="Click to verify your email id">
                                        <a class="list-group-item" style="border-color:#333945" href="#/app/page/provider/demo_data" ui-sref="app.page.demo_data_provider">
                                            <div class="checkbox">
                                                <label class="i-checks">
                                            <input type="checkbox" id="providerEmailStatus" ng-checked="dashboard.account_status.email_verified" value="" checked="checked">
                                            <i></i>
                                            Email Id
                                            </label>
                                            </div>
                                            <!--<span class="tool-tip-text">Click to verify your email ID</span> -->
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="list-group  alt title p-3" data-title="Click to verify your mobile number">
                                        <a class="list-group-item" style="border-color:#333945" href="#/app/page/provider/demo_data" ui-sref="app.page.demo_data_provider">
                                            <div class="checkbox">
                                                <label class="i-checks">
                                            <input type="checkbox" id="providerMobileStatus" ng-checked="dashboard.account_status.mobile_verified" value="" checked="checked">
                                            <i></i>
                                            Mobile
                                            </label>
                                            </div>
                                            <!-- <span class="tool-tip-text">Click to verify your mobile number</span> -->
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="list-group  alt title p-3" data-title="Click to edit your profile">
                                        <a class="list-group-item bg-papaya" style="border-color:#333945" href="#/app/page/provider/demo_data" ui-sref="app.page.demo_data_provider">
                                            <div class="checkbox">
                                                <label class="i-checks">
                                            <input type="checkbox" id="providerProfileStatus" ng-checked="dashboard.account_status.profile_verified" value="">
                                            <i></i>
                                            Profile
                                            </label>
                                            </div>
                                            <!--                            <span class="tool-tip-text">Click to edit your profile</span> -->
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="list-group  alt title p-3" data-title="Click to create a slot">
                                        <a class="list-group-item bg-grape" style="border-color:#333945" href="#/app/sessions/provider" ui-sref="app.sessions_provider">
                                            <div class="checkbox">
                                                <label class="i-checks">
                                            <input type="checkbox" id="providerInterviewStatus" ng-checked="dashboard.account_status.session_created" value="">
                                            <i></i>
                                            Interviews
                                            </label>
                                            </div>
                                            <!--                            <span class="tool-tip-text">Click to create a slot</span> -->
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 ">
                        <!-- For Provider Only-->
                        <div class="panel1 wrapper">
                            <div class="row">
                                <h3 class="font-thin m-t-none m-b text-muted"> Sessions Data </h3>
                                <div class="col-md-6">
                                    <div class="bg_pannel">
                                        <span class="g1">0</span>
                                        <br>
                                        <span class="text-white">Open Slots</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="bg_pannel_2">
                                        <span class="g1">0</span>
                                        <br>
                                        <span class="text-white">Open Slots</span>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="bg_pannel">
                                        <span class="g1">0</span>
                                        <br>
                                        <span class="text-white">Open Slots</span>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="bg_pannel_2">
                                        <span class="g1">0</span>
                                        <br>
                                        <span class="text-white">Open Slots</span>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="bg_pannel_2">
                                        <span class="g1">0</span>
                                        <br>
                                        <span class="text-white">Open Slots</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h6>
                        <center class="bg-white p-2 font-thin">Previous Interview Sessions</center>
                    </h6>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush