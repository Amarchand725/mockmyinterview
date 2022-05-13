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