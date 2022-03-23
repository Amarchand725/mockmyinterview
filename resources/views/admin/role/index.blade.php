@extends('layouts.admin.app')
@section('content')
    <section class="content-header">
        <div class="content-header-left">
            <h1>All Roles</h1>
        </div>
        @can('role-create')
        <div class="content-header-right">
            <a href="{{ route('role.create') }}" class="btn btn-primary btn-sm">Add New Role</a>
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
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $counter = 1; @endphp 
                                @foreach($roles as $role)
                                    <tr id="id-{{ $role->id }}">
                                        <td>{{ $counter++ }}.</td>
                                        <td>{{ $role->name }}</td>
                                        <td>{!! $role->description !!}</td>
                                        <td>
                                            @can('role-edit')
                                                <a class="btn btn-primary btn-xs" href="{{ route('role.edit', $role->id) }}"><i class="fa fa-edit"></i> Edit</a>
                                            @endcan
                                            @can('role-delete')
                                                <button class="btn btn-danger btn-xs delete" data-role-id="{{ $role->id }}"><i class="fa fa-trash"></i> Delete</button>
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
        $('.delete').on('click', function(){
            var role_id = $(this).attr('data-role-id');
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
                        url : "{{ url('role') }}/"+role_id,
                        type : 'DELETE',
                        data: {
                                "_token": "{{ csrf_token() }}",
                            },
                        success : function(response){
                            if(response){
                                $('#id-'+role_id).hide();
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
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