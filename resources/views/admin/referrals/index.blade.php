@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<input type="hidden" id="page_url" value="{{ route('referral.index') }}">
<section class="content-header">
	<div class="content-header-left">
		<h1>{{ $page_title }}</h1>
	</div>
	@can('referral-create')
	<div class="content-header-right">
		<a href="{{ route('referral.create') }}" class="btn btn-primary btn-sm">Add New Referral</a>
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
								<th>Offer Credits</th>
								<th>Offer Message</th>
								<th>Offer (both?)</th>
								<th>Date</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody id="body">
							@foreach($models as $key=>$model)
								<tr id="id-{{ $model->id }}">
									<td>{{ $models->firstItem()+$key }}.</td>
									<td>{{ $model->offer_credits }}</td>
									<td>{!! \Illuminate\Support\Str::limit($model->offer_message,40) !!}</td>
									<td>
										@if($model->offer_credits_both)
											Yes
										@else 
											No
										@endif
									</td>
									<td>{{ date('d, M-Y H:i A', strtotime($model->created_at)) }}</td>
									<td>
										@if($model->status)
											<span class="badge badge-success">Active</span>
										@else
											<span class="badge badge-danger">In-Active</span>
										@endif
									</td>
									<td>
										@can('referral-edit')
											<a href="{{route('referral.edit', $model->id)}}" data-toggle="tooltip" data-placement="top" title="Edit model" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
										@endcan
										@can('referral-delete')
                                            <button class="btn btn-danger btn-xs delete" data-slug="{{ $model->id }}" data-del-url="{{ url('referral', $model->id) }}"><i class="fa fa-trash"></i> Delete</button>
										@endcan
									</td>
								</tr>
							@endforeach
                            <tr>
                                <td colspan="7">
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
