@extends('web-views.dashboard.master.app')

@section('title', $page_title)

@section('content')
    <div class="container-fluid py-3 ">
        <div class="row mx-auto">
            <h2 class="mb-3">Booked Interviews </h2>
            <div class="container pt-5">
                <div class="row">
                    <div class="col-sm-6 ">
                        <select class="form-select" id="interview_type" name="interview_type" aria-label="Default select example">
                            <option value="All" selected>Search by interview type</option>
                            <option value="hr">HR</option>
                            <option value="technical">TECHNICAL</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <div class="input-group rounded">
                            <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                            <span class="input-group-text border-0" id="search-addon">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- scheduling code -->
            <div class="container pt-5">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered resource_tb">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Condidate</th>
                                    <th>Priority</th>
                                    <th>Interview Type</th>
                                    <th>Meeting ID</th>
                                    <th>Duration</th>
                                    <th>Join URL</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($booked_interviews as $key=>$interview)
                                    <tr id="id-{{ $interview->id }}">
                                        <td>{{  $booked_interviews->firstItem()+$key }}.</td>
                                        <td>{{ $interview->hasCandidate->name }}</td>
                                        <td>{{ \Illuminate\Support\Str::upper($interview->booking_type_slug) }}</td>
                                        <td>{{ \Illuminate\Support\Str::upper($interview->interview_type) }}</td>
                                        <td>{{ $interview->meeting_id }}</td>
                                        <td>{{ $interview->duration }} Minutes</td>
                                        <td>
                                            <a href="{{ $interview->join_url }}">JOIN Meeting</a>
                                        </td>
                                        <td>{{ date('d, F-Y', strtotime($interview->date)) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="card-footer p-3">
                            Displying {{$booked_interviews->firstItem()}} to {{$booked_interviews->lastItem()}} of {{$booked_interviews->total()}} records
                            <div class="d-flex justify-content-right mt-3">
                                {!! $booked_interviews->links('pagination::bootstrap-4') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush
