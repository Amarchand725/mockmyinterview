@extends('web-views.dashboard.master.app')

@section('title', $page_title)

@section('content')
    <div class="container-fluid py-3 ">
        <div class="row mx-auto">
            <h2 class="mb-3">Resources </h2>
            <div class="container pt-5">
                <div class="row">
                    <div class="col-sm-6 ">
                        <select class="form-select" aria-label="Default select example">
                            <option value="All" selected>Search by category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->slug }}">{{ $category->name }}</option>    
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <div class="input-group rounded">
                            <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                            <span class="input-group-text border-0" id="search-addon">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- scheduling code -->
            <div class="container pt-5">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered resource_tb">
                            <tbody>
                                @foreach ($blogs as $blog)
                                    <tr>
                                        <td>
                                            <b><u><a href="{{ route('blog.single', $blog->slug) }}"> {{ $blog->title }}</a></u></b>
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
                            </tbody>
                        </table>

                        <div class="card-footer p-3">
                            Displying {{$blogs->firstItem()}} to {{$blogs->lastItem()}} of {{$blogs->total()}} records
                            <div class="d-flex justify-content-right mt-3">
                                {!! $blogs->links('pagination::bootstrap-4') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
    
@push('js')
@endpush