@extends('layouts.admin.app')
@section('content')
<section class="content-header">
	<div class="content-header-left">
		<h1>Add Page Setting of <strong>{{ $model->title }}</strong></h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route('page.index') }}" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			@if (session('message'))
				<div class="callout callout-success">
					{{ session('message') }}
				</div>
			@endif
			<form action="{{ route('page_setting.store') }}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				@csrf

				<input type="hidden" name="parent_slug" id="" value="{{ $model->slug }}">
				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Meta Title </label>
							<div class="col-sm-9">
								<input type="text" name="mt_contact" class="form-control" value="{{ isset($page_data['mt_contact'])?$page_data['mt_contact']:'' }}" placeholder="Enter meta title">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Meta Keyword </label>
							<div class="col-sm-9">
								<textarea class="form-control" name="mk_contact" style="height:60px;" placeholder="Enter meta keyword">{{ isset($page_data['mk_contact'])?$page_data['mk_contact']:'' }}</textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Meta Description </label>
							<div class="col-sm-9">
								<textarea class="form-control" name="md_contact" style="height:60px;" placeholder="Enter meta description">{{ isset($page_data['md_contact'])?$page_data['md_contact']:'' }}</textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Contact Heading </label>
							<div class="col-sm-9">
								<input type="text" name="contact_heading" class="form-control" value="{{ isset($page_data['contact_heading'])?$page_data['contact_heading']:'' }}" placeholder="Enter heading">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Contact Address </label>
							<div class="col-sm-9">
								<textarea class="form-control" name="contact_address" style="height:60px;" placeholder="Enter address">{{ isset($page_data['contact_address'])?$page_data['contact_address']:'' }}</textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Contact Email </label>
							<div class="col-sm-9">
								<input type="email" class="form-control" name="contact_email" value="{{ isset($page_data['contact_email'])?$page_data['contact_email']:'' }}" placeholder="Enter email">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Contact Phone </label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="contact_phone" value="{{ isset($page_data['contact_phone'])?$page_data['contact_phone']:'' }}" placeholder="Enter phone number">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Contact Map (iframe Code) </label>
							<div class="col-sm-9">
								<textarea class="form-control" name="contact_map" style="height:120px;" placeholder="Enter map iframe code">{{ isset($page_data['contact_map'])?$page_data['contact_map']:'' }}</textarea>
							</div>
						</div>
						
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form_contact">Update</button>
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
	});
</script>
@endpush