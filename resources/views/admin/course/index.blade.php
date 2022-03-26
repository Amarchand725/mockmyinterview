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
                                    <th>Degree</th>
                                    <th>Course</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="body">
                                @foreach($courses as $key=>$course)
                                    <tr id="id-{{ $course->slug }}">
                                        <td>{{  $courses->firstItem()+$key }}.</td>
                                        <td>{{ isset($course->hasDegree)?$course->hasDegree->title:'N/A' }}</td>
                                        <td>{!! \Illuminate\Support\Str::limit($course->title,40) !!}</td>
                                        <td>{!! \Illuminate\Support\Str::limit($course->description,60) !!}</td>
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
                                <tr>
                                    <td colspan="6">
                                        Displying {{$courses->count()}} of {{$courses->total()}} records
                                        <div class="d-flex justify-content-center">
                                            {!! $courses->links('pagination::bootstrap-4') !!}
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
                url:'{{ route("course.index") }}?page='+page+'&search='+search+'&status='+status,
                type: 'get',
                success: function(response){
                    $('#body').html(response);
                }
            });
        }

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
