@extends('web-views.dashboard.master.app')

@section('title', $page_title)

@section('content')
    <input type="hidden" id="page_url" value="{{ route('blog.index') }}">

    <div class="container-fluid py-3 ">
        <div class="row mx-auto">
            <h2 class="mb-3">Resources </h2>
            <div class="container pt-5">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="input-group rounded">
                            <input type="search" id="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                        </div>
                    </div>
                    <div class="col-sm-6 ">
                        <select class="form-select" id="status" aria-label="Default select example">
                            <option value="All" selected>Search by category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->slug }}">{{ $category->name }}</option>    
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            
            <!-- scheduling code -->
            <div class="container pt-5">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered resource_tb">
                            <tbody id="body">
                                @foreach ($blogs as $blog)
                                    <tr>
                                        <td>
                                            <b><u><a href="{{ route('blog.show', $blog->slug) }}"> {{ $blog->title }}</a></u></b>
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
                                            {!! \Illuminate\Support\Str::limit($blog->description,300) !!}
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td>
                                        <div class="card-footer p-3">
                                            Displying {{$blogs->firstItem()}} to {{$blogs->lastItem()}} of {{$blogs->total()}} records
                                            <div class="d-flex justify-content-right mt-3">
                                                {!! $blogs->links('pagination::bootstrap-4') !!}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
    
@push('js')
@endpush