@extends('layouts.admin.app')

@section('content')
<section class="content-header">
	<div class="content-header-left">
		<h1>All Why Choose us</h1>
	</div>
	@can('why_choose-create')
	<div class="content-header-right">
		<a href="{{ route('why_choose.create') }}" class="btn btn-primary btn-sm">Add New</a>
	</div>
	@endcan
</section>

<section class="content" style="min-height:auto;margin-bottom: -30px;">
	<div class="row">
		<div class="col-md-12">
			@if (session('status'))
				<div class="callout callout-success">
					{{ session('status') }}
				</div>
			@endif
		</div>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>SL</th>
								<th>Image</th>
								<th>Icon</th>
								<th>Name</th>
								<th>Content</th>
								<th>Status</th>
								<th width="140">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($whychooses as $whychoose)
							<tr id="id-{{ $whychoose->id }}">
								<td>{{$whychoose->id}}.</td>
								<td>
									@if($whychoose->image)
										<img src="{{ asset('public/admin/assets/images/why_choose/'.$whychoose->image) }}" alt="" style="width:60px; height:40px">
									@else 
										<img src="{{ asset('public/admin/assets/images/why_choose/no-photo1.jpg') }}" alt="" style="width:60px;">
									@endif
								</td>
								<td>
									@if($whychoose->icon)
										<img src="{{ asset('public/admin/assets/images/why_choose/'.$whychoose->icon) }}" alt="" style="width:60px; height:40px">
									@else 
										<img src="{{ asset('public/admin/assets/images/why_choose/no-photo1.jpg') }}" alt="" style="width:60px;">
									@endif
								</td>
								<td>{!! \Illuminate\Support\Str::limit($whychoose->name,40) !!}</td>
								<td>{!! \Illuminate\Support\Str::limit($whychoose->content,60) !!}</td>
								<td>
									@if($whychoose->status)
										<span class="badge badge-success">Active</span>
									@else 
										<span class="badge badge-danger">In-Active</span>
									@endif
								</td>
								<td>
									@can('why_choose-edit')
										<a href="{{ route('why_choose.edit', $whychoose->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
									@endcan
									@can('why_choose-delete')
										<a class="btn btn-danger btn-xs delete-btn" data-whychoose-id="{{ $whychoose->id }}"><i class="fa fa-trash"></i> Delete</a>
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
            var whychoose_id = $(this).attr('data-whychoose-id');
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
                        url : "{{ url('why_choose') }}/"+whychoose_id,
                        type : 'DELETE',
                        data: {
                                "_token": "{{ csrf_token() }}",
                            },
                        success : function(response){
                            // console.log(response);
                            if(response){
                                $('#id-'+whychoose_id).hide();
                                Swal.fire(
                                    'Deleted!',
                                    'Whychoose us has been deleted successfully.',
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