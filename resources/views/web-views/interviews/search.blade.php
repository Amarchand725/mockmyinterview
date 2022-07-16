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

        <td>{{ $interview->meeting_id }}</td>
        <td>{{ isset($interview->hasParentInterviewType)?$interview->hasParentInterviewType->name:'' }}</td>
        <td>{{ isset($interview->hasChildInterviewType)?$interview->hasChildInterviewType->name:'' }}</td>
        <td>{{ date('d, F-y H:i A', strtotime($interview->slot)) }}</td>
        <td>{{ $interview->duration }} Mins</td>
        <td>
            @if($interview->status==1)
                <span class="badge badge-info">Confirmed</span>

                @if($interview->date<date('Y-m-d'))
                    <span class="badge badge-warning">Expired</span>
                @endif
            @elseif($interview->status==3)
                <span class="badge badge-danger">Rejected</span>
            @elseif($interview->status==0)
                <span class="badge badge-primary">Pending</span>
            @elseif($interview->status==4)
                <span class="badge badge-success">Completed</span>
            @endif
        </td>
        <td>
            @if($interview->date < date('Y-m-d'))
                <span class="badge badge-warning">Expired</span>
            @else
                @if($interview->status==1)
                    @if($interview->date > date('Y-m-d'))
                        <div class="time-slot">
                            <div id="countdown">
                                <span class="badge badge-primary p-2" id="timer-{{ $interview->id }}">--</span>
                            </div>
                        </div>
                    @elseif($interview->date == date('Y-m-d'))
                        <?php
                            $start_date_time = strtotime($interview->slot);
                            $meeting_time = strtotime(date('H:i:s', $start_date_time) . ' +15 minutes');
                            $current_time = strtotime(date('H:i:s'). ' +15 minutes');
                        ?>
                        @if($meeting_time==$current_time)
                            <a href="{{ $interview->join_url }}">JOIN MEETING</a>
                        @else
                            Yet Meeting...
                        @endif
                    @else
                        <span class="badge badge-warning">Expired</span>
                    @endif
                @elseif($interview->status==0)
                    <span class="badge badge-info">Pending</span>
                @elseif($interview->status==3)
                    <span class="badge badge-danger">Rejected</span>
                @elseif($interview->status==4)
                    <span class="badge badge-success">Completed</span>
                @endif
            @endif
        </td>
        <td>{{ date('d, F-Y', strtotime($interview->date)) }}</td>
        <td>
            @if(Auth::user()->hasRole('Candidate'))
                <select name="" id="booking-status" data-interview-id="{{ $interview->id }}" class="form-control" id="">
                    @if($interview->status==0)
                        <option value="0" disabled {{ $interview->status==0?'selected':'' }}>Pending</option>
                        <option value="3" {{ $interview->status==3?'selected':'' }}>Reject</option>
                    @elseif($interview->status==1)
                        <option value="1" disabled {{ $interview->status==1?'selected':'' }}>Confirme</option>
                    @elseif($interview->status==3)
                        <option value="3" disabled {{ $interview->status==3?'selected':'' }}>Reject</option>
                    @elseif($interview->status==4)
                        <option value="4" disabled {{ $interview->status==4?'selected':'' }}>Complete</option>
                    @endif
                </select>
                @if($interview->status==4)
                    <button class="btn btn-info mt-2 suggetion-btn" data-url="{{ route('rating.show', $interview->id) }}" id="suggetion-btn"><i class="fa fa-check"></i> Suggestion</button>
                    <button class="btn btn-primary mt-2 review-btn" data-interview-id="{{ $interview->id }}" data-toggle="tooltip" data-placement="top" title="Review"><i class="fa fa-star"></i> Review</button>
                @endif
            @else
                @if($interview->status==4)
                    @if($interview->hasRated)
                        <label class="badge badge-primary"><i class="fa fa-check"></i> Rated</label>
                    @else
                        <button class="btn btn-info" data-course-title='{{ $interview->hasChildInterviewType->name??'' }}' data-course-id='{{ $interview->hasChildInterviewType->id??'' }}' data-interview-id="{{ $interview->id }}" id="rating-btn"><i class="fa fa-star"></i> Ratings</button>
                    @endif

                    <a href="{{ route('book_interview.show', $interview->meeting_id) }}" class="btn btn-success mt-2" data-toggle="tooltip" data-placement="top" title="Meeting Recordings">Meeting Recordings</a>
                @endif
                <select name="" id="booking-status" data-interview-id="{{ $interview->id }}" class="form-control mt-2" id="">
                    <option value="" selected>Status</option>
                    @if($interview->status==0)
                        <option value="0" disabled {{ $interview->status==0?'selected':'' }}>Pending</option>
                        <option value="1" {{ $interview->status==1?'selected':'' }}>Confirm</option>
                        <option value="3" {{ $interview->status==3?'selected':'' }}>Reject</option>
                    @elseif($interview->status==1)
                        <?php
                            $start_date_time = strtotime($interview->slot);
                            $meeting_date_time = strtotime(date('Y-d-m H:i:s', $start_date_time));
                            $current_date_time = strtotime(date('Y-d-m H:i:s'));
                        ?>
                        @if($meeting_date_time>$current_date_time)
                            <option value="4" {{ $interview->status==4?'selected':'' }}>Complete</option>
                        @else
                        <option disabled selected>Yet Meeting...</option>
                        @endif

                    @elseif($interview->status==3)
                        <option value="3" disabled {{ $interview->status==3?'selected':'' }}>Reject</option>
                    @elseif($interview->status==4)
                        <option value="4" disabled {{ $interview->status==4?'selected':'' }}>Complete</option>
                    @endif
                </select>
            @endif
        </td>
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
