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
                                    <th>Meeting ID</th>
                                    <th>Parent Type</th>
                                    <th>Child Type</th>
                                    <th>Slot</th>
                                    <th>Duration</th>
                                    <th class="col-sm-1">Status</th>
                                    <th>Join URL</th>
                                    <th class="col-sm-1">Date</th>
                                    <th>Action</th>
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
                                        
                                        <td>{{ $interview->meeting_id }}</td>
                                        <td>{{ isset($interview->hasParentInterviewType)?$interview->hasParentInterviewType->name:'' }}</td>
                                        <td>{{ isset($interview->hasChildInterviewType)?$interview->hasChildInterviewType->name:'' }}</td>
                                        <td>{{ $interview->slot }}</td>
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
                                                        <a href="{{ $interview->join_url }}">JOIN MEETING</a>
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
                                                <select name="" id="booking-status" data-interview-id="{{ $interview->id }}" class="form-control" id="">
                                                    <option value="" selected>Status</option>
                                                    @if($interview->status==0)
                                                        <option value="0" disabled {{ $interview->status==0?'selected':'' }}>Pending</option>
                                                        <option value="1" {{ $interview->status==1?'selected':'' }}>Confirm</option>
                                                        <option value="3" {{ $interview->status==3?'selected':'' }}>Reject</option>
                                                    @elseif($interview->status==1)
                                                        <option value="4" {{ $interview->status==4?'selected':'' }}>Complete</option>
                                                    @elseif($interview->status==3)
                                                        <option value="3" disabled {{ $interview->status==3?'selected':'' }}>Reject</option>
                                                    @elseif($interview->status==4)
                                                        <option value="4" disabled {{ $interview->status==4?'selected':'' }}>Complete</option>
                                                    @endif
                                                </select>
                                                @if($interview->status==4)
                                                    <a href="{{ route('book_interview.show', $interview->meeting_id) }}" class="btn btn-success mt-2" data-toggle="tooltip" data-placement="top" title="Meeting Recordings">Meeting Recordings</a>
                                                    @if($interview->hasRated)
                                                        <label class="badge badge-primary"><i class="fa fa-check"></i> Rated</label>
                                                    @else 
                                                        <button class="btn btn-info mt-2" data-course-title='{{ $interview->hasChildInterviewType->name??'' }}' data-course-id='{{ $interview->hasChildInterviewType->id??'' }}' data-interview-id="{{ $interview->id }}" id="rating-btn"><i class="fa fa-star"></i> Ratings</button>                                                        
                                                    @endif 
                                                @endif
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Review Modal -->
    <div class="modal fade" id="review-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-star"></i> Review Interview</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('book_interview.review') }}">
                <div class="modal-body">
                    <input type="hidden" name="interview_id" id="interview-id">
                    <div class="form-group">
                        <label for="review" class="control-label">Review Interview <span style='color:red'>*</span></label>
                        <textarea name="review" class="form-control" id="" cols="30" rows="5" maxlength="255" placeholder="Enter review here..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
        </div>
    </div>

    <!-- Rating Modal -->
    <div class="modal fade" id="rating-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-star"></i> Review Interview</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="rating-form">
                <div class="modal-body">
                    <input type="hidden" name="interview_id" id="interview_id">
                    <div class="form-group">
                        <label for="title" class="control-label">Title <span style='color:red'>*</span></label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Enter title">
                        <span id="error-title" style="color: red">{{ $errors->first('title') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="review" class="control-label">Review Interview <span style='color:red'>*</span></label>
                        <textarea name="review" class="form-control" id="review" cols="30" rows="5" maxlength="255" placeholder="Enter review here..."></textarea>
                        <span id="error-review" style="color: red">{{ $errors->first('review') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="review" class="control-label">Recommended Course</label>

                        <div class="form-check">
                            <input class="form-check-input course-id" name="course_id" type="checkbox" value="" id="course-id">
                            <label class="form-check-label" for="course-id">
                              <span id="course-name"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
        </div>
    </div>

    <!-- suggetion Modal -->
    <div class="modal fade" id="suggetion-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-check"></i> Suggestions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-body">
                
            </div>
        </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).on('click', '#suggetion-btn', function(){
            var interview_id = $(this).attr('data-interview-id');
            var url = $(this).attr('data-url');
            $.ajax({
                url : url,
                type : 'GET',
                success : function(response){
                    // console.log(response);
                    $('#modal-body').html(response);
                }
            });
            $('#suggetion-modal').modal('show');
        });

        $(document).on('click', '#rating-btn', function(){
            var interview_id = $(this).attr('data-interview-id');
            var course_title = $(this).attr('data-course-title');
            var course_id = $(this).attr('data-course-id');
            $('.course-id').val(course_id);
            $('#course-name').html(course_title);
            $('#interview_id').val(interview_id);
            $('#rating-modal').modal('show');
        });

        $('#rating-form').on('submit',function(e){
            e.preventDefault();
            
            let interview_id = $("#interview_id").val();
            let title = $("#title").val();
            let review = $('#review').val();
            let course_id = $('input[name="course_id"]').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('rating.store') }}",
                type:"POST",
                data:{
                    interview_id : interview_id,
                    title : title,
                    review : review,
                    course_id : course_id,
                },
                
                success:function(response){
                    // console.log(response);
                    if(response=='success'){
                        $('#rating-modal').modal('hide');

                        $('#interview_id').val('');
                        $('#title').val('');
                        $('#review').val('');
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Rated successfully.',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong try again.',
                        })
                    }
                },
                error: function(response) {
                    $('#error-title').text(response.responseJSON.errors.title);
                    $('#error-review').text(response.responseJSON.errors.review);
                },
            });
        });

        $(document).on('click', '.review-btn', function(){
            var interview_id = $(this).attr('data-interview-id');
            $('#interview-id').val(interview_id);
            $('#review-modal').modal('show');
        });
        $(document).on('change', '#booking-status', function(){
            var status = $(this).val();
            var interview_id = $(this).attr('data-interview-id');
            if(status!=''){
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Do you want to save changes.!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, save it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url : "{{ route('book_interview.status') }}",
                            data : {'status' : status, 'interview_id' : interview_id},
                            type : 'GET',
                            success : function(response){
                                if(response){
                                    Swal.fire(
                                        'Saved!',
                                        'You changes have been saved.',
                                        'success'
                                    )
                                    window.location.reload();
                                }else{
                                    Swal.fire(
                                        'Sorry!',
                                        'Something went wrong.',
                                        'danger'
                                    )
                                }
                            }
                        });
                    }
                })
            }
        });

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
