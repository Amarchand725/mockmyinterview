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
                    <div class="col-md-5">
                        <div>
                            <span>From</span>
                            <span class="ml-3">                                         
                                <input class="form-control datepicker" id="date_from" name="from_date" placeholder="Select from date">
                            </span>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div>
                            <span>To</span>
                            <span class="ml-3">                                         
                                <input class="form-control datepicker" id="date_end" name="end_date" placeholder="Select end date">
                            </span>
                        </div>
                    </div>
                    <div class="col-md-2 mt-4">
                        <button class="btn btn primary pull-right search-btn">Search</button>
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
                                <td>{{ $total_schedule_interviews }}</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Total Successful Interviews -</th>
                                <td>{{ $total_successfull_interviews }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Total Failed Interviews -</th>
                                <td>{{ $total_failed_interviews }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Total Earnings -</th>
                                <td>${{ number_format(123,2) }}</td>
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
                                <th scope="col">SL </th>
                                <th scope="col">Interview ID </th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Review</th>
                            </tr>
                        </thead>
                        <tbody id="body">
                            @foreach ($interviews as $key=>$interview)
                                <tr>
                                    <td>{{  $interviews->firstItem()+$key }}.</td>
                                    <th>{{ $interview->meeting_id }}</th>
                                    <td>{{ $interview->hasCandidate->name }}</td>
                                    <td>{{ $interview->hasCandidate->last_name }}</td>
                                    <td>{{ $interview->review }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="6">
                                    Displying {{$interviews->firstItem()}} to {{$interviews->lastItem()}} of {{$interviews->total()}} records
                                    <div class="d-flex justify-content-center">
                                        {!! $interviews->links('pagination::bootstrap-4') !!}
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
   
@endpush