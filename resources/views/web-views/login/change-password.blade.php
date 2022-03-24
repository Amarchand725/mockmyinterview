@extends('layouts.auth.app')

@section('title', $page_title)

@push('css')
@endpush

@section('content')
    <main id="main">
        <section id="log" class="d-flex align-items-center">
            <div class="container ">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-5 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                        <h1 class="text-center">CHANGE PASSWORD</h1>
                        <div class="card signup_v4 mb-30 ">
                            <div class="card-body ">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="candidate-login" role="tabpanel" aria-labelledby="candidate-login-tab">
                                        <h4 class="text-center mt-4 mb-4" style="text-transform: uppercase;"></h4>
                                        <form method="POST" action="{{ route('change-password') }}">
                                            @csrf
                                            <input type="hidden" name="email" value="{{ $email }}">
                                            <div class="form-row">
                                                <div class="form-group col-md-12 mt-3">
                                                    <input type="password" class="form-control" name="password" id="password" placeholder=" Enter new password">
                                                    <span style="color:red">{{ $errors->first('password') }}</span>
                                                </div>
                                                <div class="form-group col-md-12 mt-3">
                                                    <input type="password" class="form-control" name="confirm_password" id="confirm-password" placeholder=" confirm password">
                                                    <span style="color:red">{{ $errors->first('confirm-password') }}</span>
                                                </div>
                                            </div>
                                            <div class="mt-2 mb-3"> <button class="btn btn-primary full-width" type="submit">Save New Password</button> </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('js')
@endpush