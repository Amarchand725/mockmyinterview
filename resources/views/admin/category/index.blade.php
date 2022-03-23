@extends('layouts.admin.app')
@section('content')
<section class="content-header">
	<div class="content-header-left">
		<h1>All Categories</h1>
	</div>
	@can('category-create')
	<div class="content-header-right">
		<a href="{{ route('category.create') }}" class="btn btn-primary btn-sm">Add category</a>
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
								<th>SL</th>
								<th>Name</th>
								<th>Description</th>
								<th>Status</th>
								<th>Created by</th>
								<th width="140">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($models as $model)
								<tr id="id-{{ $model->id }}">
									<td>{{$model->id}}.</td>
									<td>{{isset($model->hasCreatedBy)?$model->hasCreatedBy->name:'N/A'}}</td>
									<td>{{\Illuminate\Support\Str::limit($model->name,40)}}</td>
									<td>{{\Illuminate\Support\Str::limit($model->description,60)}}</td>
									<td>
										@if($model->status)
											<span class="badge badge-success">Active</span>
										@else 
											<span class="badge badge-danger">In-Active</span>
										@endif
									</td>
									<td width="250px">
										@can('category-edit')
											<a href="{{route('category.edit', $model->id)}}" data-toggle="tooltip" data-placement="top" title="Edit category" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
										@endcan
										@can('category-delete')
											<a class="btn btn-danger btn-xs delete-btn" data-toggle="tooltip" data-placement="top" title="Delete category" data-category-id="{{ $model->id }}"><i class="fa fa-trash"></i> Delete</a>
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
    <script>
        $('.delete-btn').on('click', function(){
            var category_id = $(this).attr('data-category-id');
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
                        url : "{{ url('category') }}/"+category_id,
                        type : 'DELETE',
                        data: {
                                "_token": "{{ csrf_token() }}",
                            },
                        success : function(response){
                            if(response){
                                $('#id-'+category_id).hide();
                                Swal.fire(
                                    'Deleted!',
                                    'category has been deleted.',
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