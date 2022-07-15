@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
	<section class="content-header">
		<div class="content-header-left">
			<h1>{{ $page_title }}</h1>
		</div>
		<div class="content-header-right">
			<a href="{{ route('course.index') }}" class="btn btn-primary btn-sm">View All</a>
		</div>
	</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="{{ route('course.update', $course->slug) }}" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				@csrf
				{{ method_field('PATCH') }}
				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Degree <span style="color: red">*</span></label>
							<div class="col-sm-9">
								<select name="degree_slug" id="" class="form-control">
									<option value="" selected>Select Degree</option>
									@foreach ($degrees as $degree)
										<option value="{{ $degree->slug }}" {{ $course->degree_slug==$degree->slug?'selected':'' }}>{{ $degree->title }}</option>
									@endforeach
								</select>
								<span style="color: red">{{ $errors->first('degree_slug') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Title <span style="color: red">*</span></label>
							<div class="col-sm-9">
								<input type="text" class="form-control" value="{{ $course->title }}" name="title" placeholder="Enter course">
								<span style="color: red">{{ $errors->first('title') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Study Video URL <span style="color: red">*</span></label>
							<div class="col-sm-9">
								<input type="text" class="form-control" value="{{ $course->video_url }}" name="video_url" placeholder="Enter study video url">
								<span style="color: red">{{ $errors->first('video_url') }}</span>
							</div>
						</div>
						
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Description </label>
							<div class="col-sm-9">
								<textarea class="form-control" name="description" style="height:80px;" placeholder="Enter description">{{ $course->description }}</textarea>
								<span style="color: red">{{ $errors->first('description') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Status</label>
							<div class="col-sm-9">
								<select name="status" class="form-control" id="">
									<option value="1" {{ $course->status==1?'selected':'' }}>Active</option>
									<option value="0" {{ $course->status==0?'selected':'' }}>In-Active</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form1">Submit</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
<script>
	$(document).ready(function() {
		$("#regform").validate({
			rules: {
				title: "required",
			}
		});
	});
</script>
@endsection