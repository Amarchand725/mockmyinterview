@extends('web-views.dashboard.master.app')

@section('title', $page_title)

@section('content')
    <div class="container py-3 ">
        <div class="row mx-auto">
            <h2 class="mb-3">Notifications</h2>
            <div class="row   mx-auto text-center ">
                <div class="col-md-12 email_verificaion_box bg-white  ">
                    <span class="band_test">Currently, you have no Notifications</span>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush