@foreach ($booked_interviews as $key=>$interview)
    <tr id="id-{{ $interview->id }}">
        <td>{{  $booked_interviews->firstItem()+$key }}.</td>
        @if(Auth::user()->hasRole('Interviewer'))
            <td>{{ $interview->hasCandidate->name }}</td>
        @elseif(Auth::user()->hasRole('Candidate'))
            <td>{{ $interview->hasInterviewer->name }}</td>
        @else 
            <td>{{ $interview->hasCandidate->name }}</td>
            <td>{{ $interview->hasInterviewer->name }}</td>
        @endif
        
        <td>{{ \Illuminate\Support\Str::upper($interview->booking_type_slug) }}</td>
        <td>{{ \Illuminate\Support\Str::upper($interview->interview_type) }}</td>
        <td>{{ $interview->meeting_id }}</td>
        <td>{{ $interview->duration }} Minutes</td>
        <td>
            @if($interview->status==1)
                <span class="badge badge-info">Confirmed</span>

                @if($interview->date<date('Y-m-d'))
                    <span class="badge badge-warning">Expired</span>
                @endif
            @elseif($interview->status==2)
                <span class="badge badge-danger">Rejected</span>
            @elseif($interview->status==0)
                <span class="badge badge-primary">Pending</span>
            @endif
        </td>
        <td>
            @if($interview->status==1)
                @if($interview->date >= date('Y-m-d'))
                    <div class="time-slot">
                        <div id="countdown">
                            <span class="badge badge-primary p-2" id="timer-{{ $interview->id }}">--</span>
                        </div>
                    </div>
                @elseif($interview->date == date('Y-m-d'))
                    <a href="{{ $interview->join_url }}">JOIN MEETING</a>
                @else 
                    <span class="badge badge-warning">Expired</span>
                @endif
            @elseif($interview->status==0)
                <span class="badge badge-info">Pending</span>
            @endif
        </td>
        <td>{{ date('d, F-Y', strtotime($interview->date)) }}</td>
    </tr>
@endforeach
<tr>
    <td colspan="9">
        Displying {{$booked_interviews->firstItem()}} to {{$booked_interviews->lastItem()}} of {{$booked_interviews->total()}} records
        <div class="d-flex justify-content-right mt-3">
            {!! $booked_interviews->links('pagination::bootstrap-4') !!}
        </div>
    </td>
</tr>