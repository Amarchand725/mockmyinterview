@extends('web-views.dashboard.master.app')

@section('title', $page_title)

@section('content')
    <div class="container-fluid py-3 ">
        <div class="row mx-auto">
            <h2 class="mb-3">Resource - Single - Blog  <span><a href="{{ route('blog-resources') }}" class="btn btn-primary btn-sm">Back to List</a></span></h2>
            
            <div class="container pt-5">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered resource_tb">
                            <tr>
                                @if($blog->post)
                                <td>
                                    @if($blog->mime_type=='video')
                                        <video width="320" height="240" controls>
                                            <source src="{{ asset('public/admin/assets/posts') }}/{{ $blog->post }}" type="video/mp4">
                                            <source src="movie.ogg" type="video/ogg">
                                            Your browser does not support the video tag.
                                        </video>
                                    @else 
                                        <img src="{{ asset('public/admin/assets/posts') }}/{{ $blog->post }}" width="320" height="240" alt="">
                                    @endif
                                </td>
                                @endif
                                <td>
                                    <b><u> {{ $blog->title }}</u></b>
                                    <br>
                                    <span class="label interview-tips"> {{ $blog->hasCategory->name }}</span>
                                    <span class="label interview-tips1 ml-2 ">
                                        @if($blog->is_paid)
                                            Paid
                                        @else 
                                            Free
                                        @endif
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {!! $blog->description !!}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
    
@push('js')
@endpush