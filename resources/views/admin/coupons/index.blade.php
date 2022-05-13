@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<input type="hidden" id="page_url" value="{{ route('coupon.index') }}">
<section class="content-header">
	<div class="content-header-left">
		<h1>{{ $page_title }}</h1>
	</div>
	@can('coupon-create')
	<div class="content-header-right">
		<a href="{{ route('coupon.create') }}" class="btn btn-primary btn-sm">Add New Coupon</a>
	</div>
	@endcan
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			@if (session('status'))
				<div class="callout callout-success">
					{{ session('status') }}
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
								<th width="30">SL</th>
								<th>Banner</th>
								<th>Name</th>
								<th>Type</th>
								<th>Code</th>
								<th>Discount</th>
								<th>Date</th>
								<th>Description</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody id="body">
							@foreach($models as $key=>$model)
								<tr id="id-{{ $model->slug }}">
									<td>{{ $models->firstItem()+$key }}.</td>
									<td>
										@if($model->banner)
											<img src="{{ asset('public/admin/assets/coupons/'.$model->banner) }}" alt="" style="width:60px;">
										@else
											<img src="{{ asset('public/admin/assets/images/team/no-photo1.jpg') }}" style="width:60px;">
										@endif
									</td>
									<td>{{ \Str::ucfirst($model->name) }}</td>
									<td>{{ \Str::upper($model->type) }}</td>
									<td>{{ $model->coupon_code }}</td>
									<td>${{ number_format($model->discount, 2) }}</td>
									<td>{{ date('d, M-Y', strtotime($model->start_date)) }} - {{ date('d, M-Y', strtotime($model->end_date)) }}</td>
									<td>{!! \Illuminate\Support\Str::limit($model->description,40) !!}</td>
									<td>
										@if($model->status)
											<span class="badge badge-success">Active</span>
										@else
											<span class="badge badge-danger">In-Active</span>
										@endif
									</td>
									<td>
										@can('coupon-edit')
											<a href="{{route('coupon.edit', $model->slug)}}" data-toggle="tooltip" data-placement="top" title="Edit model" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
										@endcan
										@can('coupon-delete')
                                            <button class="btn btn-danger btn-xs delete" data-slug="{{ $model->slug }}" data-del-url="{{ url('coupon', $model->slug) }}"><i class="fa fa-trash"></i> Delete</button>
										@endcan
									</td>
								</tr>
							@endforeach
                            <tr>
                                <td colspan="10">
									Displying {{$models->firstItem()}} to {{$models->lastItem()}} of {{$models->total()}} records
                                    <div class="d-flex justify-content-center">
                                        {!! $models->links('pagination::bootstrap-4') !!}
                                    </div>
                                </td>
                            </tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection

@push('js')
@endpush
