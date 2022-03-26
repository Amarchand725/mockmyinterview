@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<section class="content-header">
    <div class="content-header-left">
        <h1>All Pages</h1>
    </div>
    @can('page-create')
	<div class="content-header-right">
		<a href="{{ route('page.create') }}" class="btn btn-primary btn-sm">Add Page</a>
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
                    <div class="row">
                        <div class="col-sm-1">Search:</div>
                        <div class="d-flex col-sm-6">
                            <input type="text" id="search" class="form-control" placeholder="Search">
                        </div>
                        <div class="d-flex col-sm-5">
                            <select name="" id="status" class="form-control status" style="margin-bottom:5px">
                                <option value="All" selected>Search by status</option>
                                <option value="1">Active</option>
                                <option value="2">In-Active</option>
                            </select>
                        </div>
                    </div>
					<table id="" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>SL</th>
								<th>Title</th>
								<th>Meta Title</th>
								<th>Meta Keyword</th>
								<th>Meta Description</th>
								<th>Description</th>
                                <th>Status</th>
								<th width="140">Action</th>
							</tr>
						</thead>
						<tbody id="body">
							@foreach($models as $key=>$model)
								<tr id="id-{{ $model->slug }}">
									<td>{{  $models->firstItem()+$key }}.</td>
									<td>{!! $model->title??'N/A' !!}</td>
									<td>{!! $model->meta_title??'N/A' !!}</td>
									<td>{!! $model->meta_keyword??'N/A' !!}</td>
									<td>{!! \Illuminate\Support\Str::limit($model->meta_description??'N/A',60) !!}</td>
									<td>{!! \Illuminate\Support\Str::limit($model->description,60) !!}</td>
									<td>
										@if($model->status)
											<span class="badge badge-success">Active</span>
										@else
											<span class="badge badge-danger">In-Active</span>
										@endif
									</td>
									<td width="250px">
										@can('page-edit')
											<a href="{{route('page.edit', $model->slug)}}" data-toggle="tooltip" data-placement="top" title="Edit page" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
										@endcan
										{{-- @can('page-delete')
											<a class="btn btn-danger btn-xs delete-btn" data-toggle="tooltip" data-placement="top" title="Delete page" data-page-slug="{{ $model->slug }}"><i class="fa fa-trash"></i> Delete</a>
										@endcan --}}

                                        <a href="{{route('page_setting.show', $model->slug)}}" data-toggle="tooltip" data-placement="top" title="Page Setting" class="btn btn-info btn-xs"><i class="fa fa-cog"></i> Setting</a>
									</td>
								</tr>
							@endforeach
                            <tr>
                                <td colspan="8">
                                    Displying {{$models->count()}} of {{$models->total()}} records
                                    <div class="d-flex justify-content-center">
                                        {!! $models->links('pagination::bootstrap-4') !!}
                                    </div>
                                </td>
                            </tr>
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
    $(document).on('change','#status',function(e) {
        $select = $(this);
        $selectedOption = $select.find( "option[value=" + $select.val() + "]" );
        status =  $selectedOption.val();
        var search = $('#search').val();
        var page = 1;
        fetchAll(page, search, status);
    });
    $('#search').keyup((function(e) {
        var search = $(this).val();
        var status = $('#status').val();
        var page = 1;
        fetchAll(page, search, status);
    }));

    $(document).on('click', '.pagination a', function(event){
        event.preventDefault();
        var search = $('#search').val();
        var status = $('#status').val();
        var page = $(this).attr('href').split('page=')[1];
        fetchAll(page, search, status);
    });

    function fetchAll(page, search, status){
        $.ajax({
            url:'{{ route("page.index") }}?page='+page+'&search='+search+'&status='+status,
            type: 'get',
            success: function(response){
                $('#body').html(response);
            }
        });
    }

    $('.delete-btn').on('click', function(){
        var slug = $(this).attr('data-page-slug');
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
                    url : "{{ url('page') }}/"+slug,
                    type : 'DELETE',
                    data: {
                            "_token": "{{ csrf_token() }}",
                        },
                    success : function(response){
                        if(response){
                            $('#id-'+slug).hide();
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
