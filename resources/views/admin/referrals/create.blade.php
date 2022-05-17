@extends('layouts.admin.app')
@section('title', $page_title)
@push('css')
@endpush
@section('content')
<section class="content-header">
	<div class="content-header-left">
		<h1>{{ $page_title }}</h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route('referral.index') }}" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="{{ route('referral.store') }}" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				@csrf
				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Offer Credits <span style="color: red">*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control numeric" name="offer_credits" value="{{ old('offer_credits') }}" placeholder="Enter offer_credits">
								<span style="color: red">{{ $errors->first('offer_credits') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Offer Credits both </label>
							<div class="col-sm-9">
								<div class="form-check">
									@if(old('offer_credits_both')==1)
										<input class="form-check-input" checked value="1" type="checkbox" checked name="offer_credits_both" id="offer_credits_both">	
									@else 
										<input class="form-check-input" value="1" type="checkbox" checked name="offer_credits_both" id="offer_credits_both">
									@endif
									<label class="form-check-label" for="offer_credits_both">
										<strong>Both</strong> 
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Offer Credits Message </label>
							<div class="col-sm-9">
								<textarea class="form-control" name="offer_message" style="height:100px;" placeholder="Enter offer_message">{{ old('offer_message') }}</textarea>
								<span style="color: red">{{ $errors->first('offer_message') }}</span>
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
