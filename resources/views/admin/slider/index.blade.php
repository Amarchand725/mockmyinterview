@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<section class="content-header">
	<div class="content-header-left">
		<h1>All Sliders</h1>
	</div>
	@can('slider-create')
	<div class="content-header-right">
		<a href="{{ route('slider.create') }}" class="btn btn-primary btn-sm">Add Slider</a>
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
								<th>Image</th>
								<th>Created by</th>
								<th>Title</th>
								<th>Description</th>
								<th>Status</th>
								<th width="140">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($sliders as $slider)
								<tr id="id-{{ $slider->id }}">
									<td>{{$slider->id}}.</td>
									<td style="width:150px;">
										@if($slider->left_sec_image)
											<img src="{{ asset('public/admin/assets/images/slider/'.$slider->left_sec_image) }}" style="width:60px;">
										@else
											<img src="{{ asset('public/admin/assets/images/slider/no-photo1.jpg') }}" style="width:60px;">
										@endif
									</td>
									<td>{{$slider->hasCreatedBy->name}}</td>
									<td>{!! \Illuminate\Support\Str::limit($slider->left_sec_title,40) !!}</td>
									<td>{!! \Illuminate\Support\Str::limit($slider->left_sec_sub_description,60) !!}</td>
									<td>
										@if($slider->status)
											<span class="badge badge-success">Active</span>
										@else
											<span class="badge badge-danger">In-Active</span>
										@endif
									</td>
									<td width="250px">
										<a href="{{route('slider.show', $slider->id)}}" data-toggle="tooltip" data-placement="top" title="Show Slider" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Show</a>
										@can('slider-edit')
											<a href="{{route('slider.edit', $slider->id)}}" data-toggle="tooltip" data-placement="top" title="Edit Slider" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
										@endcan
										@can('slider-delete')
											<a class="btn btn-danger btn-xs delete-btn" data-toggle="tooltip" data-placement="top" title="Delete Slider" data-slider-id="{{ $slider->id }}"><i class="fa fa-trash"></i> Delete</a>
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
            var slider_id = $(this).attr('data-slider-id');
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
                        url : "{{ url('slider') }}/"+slider_id,
                        type : 'DELETE',
                        data: {
                                "_token": "{{ csrf_token() }}",
                            },
                        success : function(response){
                            if(response){
                                $('#id-'+slider_id).hide();
                                Swal.fire(
                                    'Deleted!',
                                    'Slider has been deleted.',
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
