@extends('layouts.admin.app')
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
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                @if($user->hasRole('Admin'))
                                    @continue;
                                @endif
                                <tr id="id-{{ $user->id }}">
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
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