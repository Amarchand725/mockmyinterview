@foreach ($interviews as $key=>$interview)
    <tr>
        <td>{{  $interviews->firstItem()+$key }}.</td>
        <th>{{ $interview->meeting_id }}</th>
        <td>{{ $interview->hasCandidate->name }}</td>
        <td>{{ $interview->hasCandidate->last_name }}</td>
        <td>{{ date('d, F-Y', strtotime($interview->date)) }}</td>
        <td>{{ $interview->review }}</td>
    </tr>
@endforeach
<tr>
    <td colspan="6">
        Displying {{$interviews->firstItem()}} to {{$interviews->lastItem()}} of {{$interviews->total()}} records
        <div class="d-flex justify-content-center">
            {!! $interviews->links('pagination::bootstrap-4') !!}
        </div>
    </td>
</tr>