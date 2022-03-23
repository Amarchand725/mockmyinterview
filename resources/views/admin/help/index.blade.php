@extends('layouts.admin.app')

@section('content')
<section class="content-header">
	<div class="content-header-left">
		<h1>All Hiring Helps</h1>
	</div>
	@can('help-create')
	<div class="content-header-right">
		<a href="{{ route('help.create') }}" class="btn btn-primary btn-sm">Add Hire Help</a>
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
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="30">SL</th>
								<th>Title</th>
								<th>Description</th>
								<th>Created by</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($models as $model)
								<tr id="id-{{ $model->slug }}">
									<td>{{$model->id}}.</td>
									<td>{{ $model->title }}</td>
									<td>{!! \Illuminate\Support\Str::limit($model->description,60) !!}</td>
									<td>{{isset($model->hasCreatedBy)?$model->hasCreatedBy->name:'N/A'}}</td>
									<td>
										@if($model->status)
											<span class="badge badge-success">Active</span>
										@else 
											<span class="badge badge-danger">In-Active</span>
										@endif
									</td>
									<td>
										@can('help-edit')
											<a href="{{route('help.edit', $model->slug)}}" data-toggle="tooltip" data-placement="top" title="Edit model" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
										@endcan
										@can('help-delete')
											<a class="btn btn-danger btn-xs delete-btn" data-toggle="tooltip" data-placement="top" title="Delete model" data-model-slug="{{ $model->slug }}"><i class="fa fa-trash"></i> Delete</a>
										@endcan
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection

@push('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.delete-btn').on('click', function(){
            var model_slug = $(this).attr('data-model-slug');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url : "{{ url('help') }}/"+model_slug,
						type : 'DELETE',
                        data: {
                                "_token": "{{ csrf_token() }}",
                            },
                        success : function(response){
                            if(response){
                                $('#id-'+model_slug).hide();
                                Swal.fire(
                                    'Deleted!',
                                    'model has been deleted.',
                                    'success'
                                ) 
                            }else{
                                Swal.fire(
                                    'Not Deleted!',
                                    'Sorry! Something went wrong.',
                                    'danger'
                                ) 
                            }
                        }
                    });
                }
            })
        });

        $(document).ready(function() {
            $("#example1").DataTable();
        });
    </script>
@endpush