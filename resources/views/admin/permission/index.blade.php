@extends('layouts.admin.app')
@section('content')
<section class="content-header">
    <div class="content-header-left">
        <h1>All Permissions</h1>
    </div>
    @can('permission-create')
    <div class="content-header-right">
        <a href="{{ route('permission.create') }}" class="btn btn-primary btn-sm">Add New</a>
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
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Guard Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($permissions as $permission)
                                <tr id="id-{{ $permission->id }}">
                                    <td>{{$permission->id}}.</td>
                                    <td>{{$permission->name}}</td>
                                    <td>{{$permission->guard_name}}</td>
                                    <td>
                                        @can('permission-edit')
                                            <a href="{{ route('permission.edit', $permission->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>   
                                        @endcan
                                        @can('permission-delete') 
                                            <a class="btn btn-danger btn-xs delete-btn" data-permission-id="{{ $permission->id }}"><i class="fa fa-trash"></i> Delete</a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</section>

@endsection

@push('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.delete-btn').on('click', function(){
            var permission_id = $(this).attr('data-permission-id');
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
                        url : "{{ url('permission') }}/"+permission_id,
                        type : 'DELETE',
                        data: {
                                "_token": "{{ csrf_token() }}",
                            },
                        success : function(response){
                            if(response){
                                $('#id-'+permission_id).hide();
                                Swal.fire(
                                    'Deleted!',
                                    'Permission has been deleted.',
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