@extends('web-views.dashboard.master.app')

@section('title', $page_title)

@push('css')
@endpush

@section('content')
    <div class="container-fluid py-3 ">
        <div class="row mx-auto">
            <h2 class="mb-3">Reports</h2>
            <div class="col-md-12 email_verificaion_box bg-white ">
                <div class="row side-heading-font ">
                    <div class="col-md-4">
                        <div>
                            <span>From</span>
                            <span class="ml-3">                                         
                                <input class="form-control datepicker" id="datepicker" name="from_date" placeholder="Select from date">
                            </span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div>
                            <span>To</span>
                            <span class="ml-3">                                         
                                <input class="form-control datepicker" id="datepicker" name="end_date" placeholder="Select end date">
                            </span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn primary pull-right view_btn">Search</button>
                    </div>
                </div>
            </div>
            <div class="row mx-auto">
                <div class="col-md-12 well bg-white py-3 ">
                    <h5>Reports</h5>
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">Total Scheduled Interviews -</th>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Total Successful Interviews -</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">Total Failed Interviews -</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">Total Earnings -</th>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row mx-auto mt-3">
                <div class="col-md-12 well bg-white py-3 ">
                    <h5>Interviews </h5>
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">Interview ID </th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Review</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row"> </th>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr></tr>
                            <tr></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush