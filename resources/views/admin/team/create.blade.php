@extends('layouts.admin.app')

@section('content')
<section class="content-header">
	<div class="content-header-left">
		<h1>Add Team Member</h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route('team.index') }}" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="{{ route('team.store') }}" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				@csrf
				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">First Name <span style="color: red">*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="first_name" value="{{ old('first_name') }}" placeholder="Enter first_name">
								<span style="color: red">{{ $errors->first('first_name') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Last Name </label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="last_name" value="{{ old('last_name') }}" placeholder="Enter last_name">
								<span style="color: red">{{ $errors->first('last_name') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Designation <span style="color: red">*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="designation" value="{{ old('designation') }}" placeholder="Enter designation">
								<span style="color: red">{{ $errors->first('designation') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Twitter Link </label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="twitter_link" value="{{ old('twitter_link') }}" placeholder="Enter twitter_link">
								<span style="color: red">{{ $errors->first('twitter_link') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Facbook Link </label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="facebook_link" value="{{ old('facebook_link') }}" placeholder="Enter facebook_link">
								<span style="color: red">{{ $errors->first('facebook_link') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Instagram Link </label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="instagram_link" value="{{ old('instagram_link') }}" placeholder="Enter instagram_link">
								<span style="color: red">{{ $errors->first('instagram_link') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Linkedin Link </label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="linkedin_link" value="{{ old('linkedin_link') }}" placeholder="Enter linkedin_link">
								<span style="color: red">{{ $errors->first('linkedin_link') }}</span>
							</div>
						</div>
						
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Description </label>
							<div class="col-sm-9">
								<textarea class="form-control texteditor" name="description" style="height:200px;" placeholder="Enter description"></textarea>
								<span style="color: red">{{ $errors->first('description') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Image <span style="color: red">*</span></label>
							<div class="col-sm-9" style="padding-top:5px">
								<input type="file" name="image" accept="image/*">
								(Only jpg, jpeg, gif and png are allowed) <br />
								<span style="color: red">{{ $errors->first('image') }}</span>
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
	$(document).ready(function() {
		if ($(".texteditor").length > 0) {
			tinymce.init({
				selector: "textarea.texteditor",
				theme: "modern",
				height: 150,
				plugins: [
					"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
					"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
					"save table contextmenu directionality emoticons template paste textcolor"
				],
				toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

			});
		}

		$("#regform").validate({
			rules: {
				image: "required",
				first_name: "required",
				designation: "required",
			}
		});
	});
</script>
@endpush