@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<section class="content-header">
    <div class="content-header-left">
        <h1>All Users</h1>
    </div>
    @can('user-create')
    <div class="content-header-right">
        <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm">Add New</a>
    </div>
    @endcan
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            @if (session('success'))
                <div class="callout callout-success">
                    {{ session('success') }}
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
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Phone</th>
                                <th>E-mail</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="body">
                            @foreach($users as $key=>$user)
                                @if($user->hasRole('Admin'))
                                    @continue;
                                @endif
                                <tr id="id-{{ $user->id }}">
                                    <td>{{  $users->firstItem()+$key }}.</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->last_name??'N/A'}}</td>
                                    <td>{{$user->phone??'N/A'}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
										@if($user->status)
											<span class="badge badge-success">Active</span>
										@else
											<span class="badge badge-danger">In-Active</span>
										@endif
									</td>
                                    <td>
                                        @can('user-edit')
                                            <a href="{{ route('user.edit', $user->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                        @endcan
                                        @can('user-delete')
                                            <a class="btn btn-danger btn-xs delete-btn" data-user-id="{{ $user->id }}"><i class="fa fa-trash"></i> Delete</a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="7">
                                    Displying {{$users->count()}} of {{$users->total()}} records
                                    <div class="d-flex justify-content-center">
                                        {!! $users->links('pagination::bootstrap-4') !!}
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
                url:'{{ route("user.index") }}?page='+page+'&search='+search+'&status='+status,
                type: 'get',
                success: function(response){
                    $('#body').html(response);
                }
            });
        }
        $('.delete-btn').on('click', function(){
            var user_id = $(this).attr('data-user-id');
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
                        url : "{{ url('user') }}/"+user_id,
                        type : 'DELETE',
                        data: {
                                "_token": "{{ csrf_token() }}",
                            },
                        success : function(response){
                            if(response){
                                $('#id-'+user_id).hide();
                                Swal.fire(
                                    'Deleted!',
                                    'User has been deleted.',
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
