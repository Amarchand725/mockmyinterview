@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<section class="content-header">
	<div class="content-header-left">
		<h1>{{ $page_title }}</h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route('coupon.index') }}" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="{{ route('coupon.update', $model->slug) }}" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				@csrf
				{{ method_field('PATCH') }}
				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Name <span style="color: red">*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="name" value="{{ $model->name }}" placeholder="Enter name">
								<span style="color: red">{{ $errors->first('name') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Type <span style="color: red">*</span></label>
							<div class="col-sm-9">
								<div class="form-check">
									@if($model->type=='percent')
										<input class="form-check-input" checked value="percent" type="radio" name="type" id="percent">	
									@else 
										<input class="form-check-input" value="percent" type="radio" name="type" id="percent">
									@endif
									<label class="form-check-label" for="percent">
										<strong>Percent</strong> 
									</label>
								</div>
								<div class="form-check">
									@if($model->type=='fix')
										<input class="form-check-input" checked value="fix" type="radio" name="type" id="fix">
									@else 
										<input class="form-check-input" value="fix" type="radio" name="type" id="fix">
									@endif
									<label class="form-check-label" for="fix">
										<strong>Fix Amount</strong>
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Discount <span style="color: red">*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control numeric" name="discount" value="{{ $model->discount }}" placeholder="Enter discount">
								<span style="color: red">{{ $errors->first('discount') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Max Usages <span style="color: red">*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control numeric" name="max_usages" value="{{ $model->max_usages }}" placeholder="Enter max_usages">
								<span style="color: red">{{ $errors->first('max_usages') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Start Date </label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control datepicker" readonly value="{{ $model->start_date }}" name="start_date">
								<span style="color: red">{{ $errors->first('start_date') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">End Date </label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control datepicker" readonly value="{{ $model->end_date }}" name="end_date">
								<span style="color: red">{{ $errors->first('end_date') }}</span>
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Description </label>
							<div class="col-sm-9">
								<textarea class="form-control" name="description" style="height:100px;" placeholder="Enter description">{{ $model->description }}</textarea>
								<span style="color: red">{{ $errors->first('description') }}</span>
							</div>
						</div>
						@if($model->banner)
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Exist Banner </label>
								<div class="col-sm-9" style="padding-top:5px">
									<img src="{{ asset('public/admin/assets/coupons/'.$model->banner) }}" alt="" style="width:60px;">
								</div>
							</div>
						@endif
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Banner </label>
							<div class="col-sm-9" style="padding-top:5px">
								<input type="file" name="banner" accept="image/*">
								(Only jpg, jpeg, gif and png are allowed) <br />
								<span style="color: red">{{ $errors->first('banner') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Status</label>
							<div class="col-sm-9">
								<select name="status" class="form-control" id="">
									<option value="1" {{ $model->status==1?'selected':'' }}>Active</option>
									<option value="0" {{ $model->status==0?'selected':'' }}>In-Active</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-9">
								<button type="submit" class="btn btn-success pull-left" name="form1">Submit</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>

@endsection
@push('js')
<script>
</script>
@endpush
