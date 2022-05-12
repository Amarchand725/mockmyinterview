@extends('web-views.dashboard.master.app')

@section('title', $page_title)

@push('css')

@endpush

@section('content')
    <input type="hidden" id="page_url" value="{{ route('book_interview.index') }}">
    <div class="container-fluid py-3 ">
        <div class="row mx-auto">
            <h2 class="mb-3">Booked Interviews </h2>
            <div class="container pt-5">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="input-group rounded">
                            <input type="search" class="form-control rounded" id="search" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                            <input type="hidden" id="status" value="All">
                        </div>
                    </div>
                </div>
            </div>

            <!-- scheduling code -->
            <div class="container pt-5">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered pl-0">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    @if(Auth::user()->hasRole('Interviewer'))
                                        <th>Condidate</th>
                                    @elseif(Auth::user()->hasRole('Candidate'))
                                        <th>Interviewer</th>
                                    @else 
                                        <th>Condidate</th>
                                        <th>Interviewer</th>
                                    @endif
                                    <th>Priority</th>
                                    <th>Interview Type</th>
                                    <th>Meeting ID</th>
                                    <th>Duration</th>
                                    <th>Status</th>
                                    <th>Join URL</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody id="body">
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script>
        $(document).ready(function(){
            $.ajax({
                url : "{{ route('get_booked_interview_ids') }}",
                type : 'GET',
                success : function(response){
                    jQuery.each(response, function(index, item) {
                        timer(item.id, item.start_at);
                    });
                }
            });
        });
        function timer(id, start_at){
            // Set the date we're counting down to
            var countDownDate = new Date(start_at).getTime();
            // Update the count down every 1 second
            var x = setInterval(function() {
                // Get today's date and time
                var now = new Date().getTime();
                // Find the distance between now and the count down date
                var distance = countDownDate - now;
                
                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                // Output the result in an element with id="demo"
                var date_time = document.getElementById('timer-'+id);

                if(date_time!=null){
                    var full_timer = days+'d '+hours+' : '+minutes+' : '+seconds
                    if(distance<=0){
                        full_timer = 'Expired';
                    }
                    document.getElementById('timer-'+id).innerHTML=full_timer;
                }
            }, 1000);
        }
    </script>
@endpush
