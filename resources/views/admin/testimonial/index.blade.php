@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<section class="content-header">
	<div class="content-header-left">
		<h1>All Testimonials</h1>
	</div>
	@can('testimonial-create')
	<div class="content-header-right">
		<a href="{{ route('testimonial.create') }}" class="btn btn-primary btn-sm">Add Testimonial</a>
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
								<th>Image</th>
								<th>Name</th>
								<th>Designation</th>
								<th>Comment</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($testimonials as $testimonial)
								<tr id="id-{{ $testimonial->slug }}">
									<td>{{$testimonial->id}}.</td>
									<td>
										@if($testimonial->image)
											<img src="{{ asset('public/admin/assets/images/testimonials/'.$testimonial->image) }}" alt="" style="width:60px;">
										@else
											<img src="{{ asset('public/admin/assets/images/testimonials/no-photo1.jpg') }}" style="width:60px;">
										@endif
									</td>
									<td>{!! $testimonial->name !!}</td>
									<td>{!! $testimonial->designation !!}</td>
									<td>{!! \Illuminate\Support\Str::limit($testimonial->comment,60) !!}</td>
									<td>
										@can('testimonial-edit')
											<a href="{{route('testimonial.edit', $testimonial->slug)}}" data-toggle="tooltip" data-placement="top" title="Edit testimonial" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
										@endcan
										@can('testimonial-delete')
											<a class="btn btn-danger btn-xs delete-btn" data-toggle="tooltip" data-placement="top" title="Delete testimonial" data-testimonial-slug="{{ $testimonial->slug }}"><i class="fa fa-trash"></i> Delete</a>
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
            var testimonial_slug = $(this).attr('data-testimonial-slug');
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
                        url : "{{ url('testimonial') }}/"+testimonial_slug,
						type : 'DELETE',
                        data: {
                                "_token": "{{ csrf_token() }}",
                            },
                        success : function(response){
                            if(response){
                                $('#id-'+testimonial_slug).hide();
                                Swal.fire(
                                    'Deleted!',
                                    'Testimonial has been deleted.',
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
