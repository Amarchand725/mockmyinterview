@extends('web-views.dashboard.master.app')

@section('title', $page_title)

@section('content')
    <div class="container py-3 ">
        <div class="row mx-auto">
            <h2 class="mb-3">Test My Setup</h2>
            <div class="row   mx-auto  ">
                <div class="col-md-12 email_verificaion_box bg-white  ">
                    <button class="btn btn primary  view_btn">  Microphone Test  </button>
                </div>
            </div>
            <div class="row   mx-auto  ">
                <div class="col-md-12 email_verificaion_box bg-white  ">
                    <button class="btn btn primary  view_btn">  Webcam Test </button>
                </div>
                <center>
                    <span class="band_test"><a href="#">Bandwidth Test</a></span>
                </center>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush