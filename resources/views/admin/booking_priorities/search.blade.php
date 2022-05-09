@foreach($booking_priorities as $key=>$booking_priority)
    <tr id="id-{{ $booking_priority->slug }}">
        <td>{{  $booking_priorities->firstItem()+$key }}.</td>
        <td>{!! \Illuminate\Support\Str::limit($booking_priority->title,40) !!}</td>
        <td>{{ Str::upper($booking_priority->type) }}</td>
        <td><span class="dot" style="background: {{ $booking_priority->color }}"></span></td>
        <td>{{ $booking_priority->credits }}</td>
        <td>{{ number_format($booking_priority->price, 2) }}</td>
        <td>{{ $booking_priority->currency_code }}</td>
        <td>{!! \Illuminate\Support\Str::limit($booking_priority->description,60) !!}</td>
        <td>
            @if($booking_priority->status)
                <span class="badge badge-success">Active</span>
            @else
                <span class="badge badge-danger">In-Active</span>
            @endif
        </td>
        <td>
            @can('booking_type-edit')
                <a class="btn btn-primary btn-xs" href="{{ route('booking_priority.edit', $booking_priority->slug) }}"><i class="fa fa-edit"></i> Edit</a>
            @endcan
            @can('booking_type-delete')
                <button class="btn btn-danger btn-xs delete" data-slug="{{ $booking_priority->slug }}" data-del-url="{{ url('booking_priority', $booking_priority->slug) }}"><i class="fa fa-trash"></i> Delete</button>
            @endcan
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="10">
        Displying {{$booking_priorities->firstItem()}} to {{$booking_priorities->lastItem()}} of {{$booking_priorities->total()}} records
        <div class="d-flex justify-content-center">
            {!! $booking_priorities->links('pagination::bootstrap-4') !!}
        </div>
    </td>
</tr>