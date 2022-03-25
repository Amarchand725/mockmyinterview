@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
    <section class="content-header">
        <div class="content-header-left">
            <h1>{{ $page_title }}</h1>
        </div>
        @can('course-create')
        <div class="content-header-right">
            <a href="{{ route('course.create') }}" class="btn btn-primary btn-sm">Add New course</a>
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
                                    <th>Degree</th>
                                    <th>Course</th>
                                    <th>Description</th>
                                    <th>Created By</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $counter = 1; @endphp 
                                @foreach($courses as $course)
                                    <tr id="id-{{ $course->slug }}">
                                        <td>{{ $counter++ }}.</td>
                                        <td>{{ isset($course->hasDegree)?$course->hasDegree->title:'N/A' }}</td>
                                        <td>{!! \Illuminate\Support\Str::limit($course->title,40) !!}</td>
                                        <td>{!! \Illuminate\Support\Str::limit($course->description,60) !!}</td>
                                        <td>{!! isset($course->hasCreatedBy)?$course->hasCreatedBy->name:'N/A' !!}</td>
                                        <td>
                                            @if($course->status)
                                                <span class="badge badge-success">Active</span>
                                            @else 
                                                <span class="badge badge-danger">In-Active</span>
                                            @endif
                                        </td>
                                        <td>
                                            @can('course-edit')
                                                <a class="btn btn-primary btn-xs" href="{{ route('course.edit', $course->slug) }}"><i class="fa fa-edit"></i> Edit</a>
                                            @endcan
                                            @can('course-delete')
                                                <button class="btn btn-danger btn-xs delete" data-course-slug="{{ $course->slug }}"><i class="fa fa-trash"></i> Delete</button>
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
            var slug = $(this).attr('data-course-slug');
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
                        url : "{{ url('course') }}/"+slug,
                        type : 'DELETE',
                        data: {
                                "_token": "{{ csrf_token() }}",
                            },
                        success : function(response){
                            if(response){
                                $('#id-'+slug).hide();
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