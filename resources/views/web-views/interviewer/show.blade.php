@foreach($interviewer_slots as $key=>$slot)
    <tr id="id-{{ $slot->id }}">
        <td>{{  $interviewer_slots->firstItem()+$key }}.</td>
        <td>{{ date('d, F-Y', strtotime($slot->start_date)) }}</td>
        <td>{{ $slot->start_time }}</td>
        <td>{{ date('d, F-Y', strtotime($slot->end_date)) }}</td>
        <td>{{ $slot->end_time }}</td>
        <td>
            <button class="btn btn-info btn-sm slots-btn" data-show-url="{{ route('available_slot.show', $slot->id) }}"><i class="fa fa-eye"></i> Slots</button>
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="6">
        Displying {{$interviewer_slots->firstItem()}} to {{$interviewer_slots->lastItem()}} of {{$interviewer_slots->total()}} records
        <div class="d-flex justify-content-center">
            {!! $interviewer_slots->links('pagination::bootstrap-4') !!}
        </div>
    </td>
</tr>