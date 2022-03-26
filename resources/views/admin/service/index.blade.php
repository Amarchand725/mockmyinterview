@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<section class="content-header">
	<div class="content-header-left">
		<h1>All services</h1>
	</div>
	@can('service-create')
	<div class="content-header-right">
		<a href="{{ route('service.create') }}" class="btn btn-primary btn-sm">Add service</a>
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
								<th>Created by</th>
								<th>Status</th>
								<th width="140">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($services as $service)
								<tr id="id-{{ $service->slug }}">
									<td>{{$service->id}}</td>
									<td>{!! \Illuminate\Support\Str::limit($service->name,40) !!}</td>
									<td>{!! \Illuminate\Support\Str::limit($service->description,60) !!}</td>
									<td>{!! isset($service->hasCreatedBy)?$service->hasCreatedBy->name:'N/A' !!}</td>
									<td>
										@if($service->status)
											<span class="badge badge-success">Active</span>
										@else
											<span class="badge badge-danger">In-Active</span>
										@endif
									</td>
									<td width="250px">
										<a href="{{route('service.show', $service->slug)}}" data-toggle="tooltip" data-placement="top" title="Show service" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Show</a>
										@can('service-edit')
											<a href="{{route('service.edit', $service->slug)}}" data-toggle="tooltip" data-placement="top" title="Edit service" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
										@endcan
										@can('service-delete')
											<a class="btn btn-danger btn-xs delete-btn" data-toggle="tooltip" data-placement="top" title="Delete service" data-service-slug="{{ $service->slug }}"><i class="fa fa-trash"></i> Delete</a>
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
            var service_slug = $(this).attr('data-service-slug');
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
                        url : "{{ url('service') }}/"+service_slug,
                        type : 'DELETE',
                        data: {
                                "_token": "{{ csrf_token() }}",
                            },
                        success : function(response){
                            if(response){
                                $('#id-'+service_slug).hide();
                                Swal.fire(
                                    'Deleted!',
                                    'service has been deleted.',
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
