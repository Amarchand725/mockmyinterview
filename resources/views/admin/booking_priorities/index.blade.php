@extends('layouts.admin.app')
@section('title', $page_title)
@push('css')
    <style>
        .dot {
            height: 25px;
            width: 25px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
        }
    </style>
@endpush
@section('content')
    <input type="hidden" id="page_url" value="{{ route('booking_priority.index') }}">
    <section class="content-header">
        <div class="content-header-left">
            <h1>{{ $page_title }}</h1>
        </div>
        @can('booking_type-create')
        <div class="content-header-right">
            <a href="{{ route('booking_priority.create') }}" class="btn btn-primary btn-sm">Add New Booking Priority</a>
        </div>
        @endcan
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                @if (session('success'))
                    <div class="callout callout-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="box box-info">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-1">Search:</div>
                            <div class="d-flex col-sm-6">
                                <input type="text" id="search" class="form-control" placeholder="Search">
                            </div>
                            <div class="d-flex col-sm-5">
                                <select name="" id="status" class="form-control status" style="margin-bottom:5px">
                                    <option value="All" selected>Search by status</option>
                                    <option value="1">Active</option>
                                    <option value="2">In-Active</option>
                                </select>
                            </div>
                        </div>
                        <table id="" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Title</th>
                                    <th>Priority Type</th>
                                    <th>Color</th>
                                    <th>Credits</th>
                                    <th>Price</th>
                                    <th>Currency Code</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="body">
                                @foreach($booking_priorities as $key=>$booking_priority)
                                    <tr id="id-{{ $booking_priority->slug }}">
                                        <td>{{  $booking_priorities->firstItem()+$key }}.</td>
                                        <td>{!! \Illuminate\Support\Str::limit($booking_priority->title,40) !!}</td>
                                        <td>{{ Str::upper($booking_priority->type) }}</td>
                                        <td><span class="dot" style="background: {{ $booking_priority->color }}"></span></td>
                                        <td>{{ $booking_priority->credits }}</td>
                                        <td>{{ number_format($booking_priority->price, 2) }}</td>
                                        <td>{{ $booking_priority->currency_code }}</td>
                                        <td>{!! \Illuminate\Support\Str::limit($booking_priority->description,60) !!}</td>
                                        <td>
                                            @if($booking_priority->status)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">In-Active</span>
                                            @endif
                                        </td>
                                        <td>
                                            @can('booking_type-edit')
                                                <a class="btn btn-primary btn-xs" href="{{ route('booking_priority.edit', $booking_priority->slug) }}"><i class="fa fa-edit"></i> Edit</a>
                                            @endcan
                                            @can('booking_type-delete')
                                                <button class="btn btn-danger btn-xs delete" data-slug="{{ $booking_priority->slug }}" data-del-url="{{ url('booking_priority', $booking_priority->slug) }}"><i class="fa fa-trash"></i> Delete</button>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="10">
                                        Displying {{$booking_priorities->firstItem()}} to {{$booking_priorities->lastItem()}} of {{$booking_priorities->total()}} records
                                        <div class="d-flex justify-content-center">
                                            {!! $booking_priorities->links('pagination::bootstrap-4') !!}
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </section>
@endsection

@push('js')
@endpush
