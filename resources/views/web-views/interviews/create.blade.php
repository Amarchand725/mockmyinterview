@extends('web-views.dashboard.master.app')

@section('title', $page_title)

@push('css')
@endpush

@section('content')
    <div class="container-fluid py-3 ">
        <div class="row mx-auto">
            <h2 class="mb-3">{{ $page_title }}</h2>
            <div class="col-md-12  email_verificaion_box ">
                <div class="row side-heading-font">
                    <span class="col-md-12">Check Your System Date and Time</span>
                </div>
                <div class="row">
                    <div class="col-md-12 sub-text-normal">
                        Looks like your system date and time is not set correctly. Please update your system date and time in order to start the interview on Time.
                    </div>
                </div>
            </div>

            <div class="col-md-12 well py-3">
                <div class="bg-white ">
                    <span class="side-heading-font">Schedule an Interview </span>
                    <div class="row">
                        {{-- <div class="col-md-5">
                            <div class="form-group">
                                <label for="">Date</label>
                                <input type="text" class="form-control datepicker" name="date" value="{{ date('Y/m/d') }}" id="current-date">
                            </div>
                        </div>
                        <div class="col-md-5"></div> --}}
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="">Parent Interview Type</label>
                                <select name="parent_id" id="parent-interview-type" class="form-control parent-interview-type">
                                    <option value="" selected>Select parent interview type</option>
                                    @foreach ($parent_interview_types as $interview_type)
                                        <option value="{{ $interview_type->id }}">{{ $interview_type->name }}</option>
                                    @endforeach
                                </select>
                                <span id="parent-interview-type-id" style="color: red"></span>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="">Child Interview Type</label>
                                <select name="child_interview_type_id" id="child_interview_type_id" class="form-control"></select>
                                <span id="child-interview-type-id" style="color: red"></span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-info search-btn" style="margin-top: 30px"><i class="fa fa-search"></i> Search</button>
                        </div>
                    </div>
                </div>
            </div>

            <main class="container-fluid pt-5">
                <span id="interviewers"></span>
            </main>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="interviewer-details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa fa-user"></i> Interviewer Details</h5>
                </div>
                <form id="SubmitForm">
                    @csrf

                    <div class="modal-body">
                    ...
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info">Book Slot</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $('#SubmitForm').on('submit',function(e){
            e.preventDefault();
            let booked_slot = $(".booked-slot:checked").val() ? $(".booked-slot:checked").val() : '';
            let date = $('#date').val();
            let parent_interview_type_id = $('#parent_interview_type_id').val();
            let child_interview_type_id = $('#child_interview_type_id').val();
            let interviewer_id = $('#interviewer_id').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('book_interview.store') }}",
                type:"POST",
                data:{
                    booked_slot : booked_slot,
                    date : date,
                    parent_interview_type_id : parent_interview_type_id,
                    child_interview_type_id : child_interview_type_id,
                    interviewer_id : interviewer_id,
                },

                success:function(response){
                    // console.log(response);
                    if(response=='credits'){
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'You do not have credits to book this interview please purchase credits.!',
                            footer: '<a href="{{ route('wallet.create') }}">Click to get credits</a>',
                        })
                    }else if(response=='success'){
                        $('#interviewer-details').hide();
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'You have booked slot successfully.',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        location.reload();
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong try again.',
                        })
                    }
                },
                error: function(response) {
                    $('#booked-slot-error').text(response.responseJSON.errors.booked_slot);
                },
            });
        });
        $(document).on('change', '#custom-slot', function() {
            if($(this).is(":checked")) {
                if($('.feature1').hasClass('active')){
                    $('.feature1').removeClass('active');
                    $('.feature1').removeClass('slot-selected');
                }

                var html = '<div class="form-group">'+
                                '<label for="">Slot</label>'+
                                '<input type="time" name="booked_slot" id="feature1" class="form-control booked-slot">'+
                            '</div>';
                $('#make-custom-slot').html(html);
            }else{
                $('#make-custom-slot').html('');
            }
        });

        $(document).on('click', '.more-info-btn', function(){
            $('.modal-body').html('');
            var user_id = $(this).attr('data-user-id');
            var date = $('#current-date').val();
            var parent_interview_type = $('#parent-interview-type').val();
            var child_interview_type = $('#child_interview_type_id').val();
            $.ajax({
                url : "{{ route('get-interviewer-details') }}",
                data : {'user_id' : user_id, 'date' : date, 'parent_interview_type' : parent_interview_type, 'child_interview_type' : child_interview_type},
                success : function(response){
                    $('.modal-body').html(response);
                }
            });
            $('#interviewer-details').modal('show');
        });

        $(document).on('click', '.search-btn', function(){
            var date = $('#current-date').val();
            var parent_interview_type = $('#parent-interview-type').val();
            var child_interview_type = $('#child_interview_type_id').val();
            if(parent_interview_type==''){
                $('#parent-interview-type-id').html('Interview type is required field.');
                return false;
            }else{
                $('#parent-interview-type-id').html('');
            }
            if(child_interview_type==''){
                $('#child-interview-type-id').html('Interview type is required field.');
                return false;
            }else{
                $('#child-interview-type-id').html('');
            }

            $.ajax({
                url : "{{ route('get-interviewers') }}",
                data : {'date' : date, 'parent_interview_type':parent_interview_type, 'child_interview_type':child_interview_type},
                success : function(response){
                    $('#interviewers').html(response);
                }
            });
        });

        $(document).on('click', '.slot', function(){
            if($(this).hasClass('active')){
                $(this).removeClass('active');
            }else{
                $('#custom-slot').prop('checked', false);
                $('#make-custom-slot').html('');
                $(this).addClass('active');
            }
        });
        $(document).on('click', '.slot', function(){
            $('.parent').find('.slot-selected').removeClass("slot-selected")
            if($(this).hasClass('slot-selected')){
                $(this).removeClass('slot-selected');
            }else{
                $('#custom-slot').prop('checked', false);
                $('#make-custom-slot').html('');
                $(this).addClass('slot-selected');
            }
        });

        $(document).on('change', '.current-date', function(){
            var date = $(this).val();
            var parent_id = $('#parent_interview_type_id').val();
            var child_id = $('#child_interview_type_id').val();
            var interviewer_id = $('#interviewer_id').val();
            if(parent_id != '' && child_id != ''){
                $.ajax({
                    url : "{{ route('get-interviewer-slots') }}",
                    data : {'parent_id' : parent_id, 'child_id' : child_id, 'date' : date, 'interviewer_id' : interviewer_id},
                    success : function(response){
                        // console.log(response);
                        $('.available-slots').html(response);
                    }
                });
            }
        });

        $(document).on('change', '.parent-interview-type', function(){
            var parent_id = $(this).val();
            $.ajax({
                url : "{{ route('get-child-interview-types') }}",
                data : {'parent_id' : parent_id},
                success : function(response){
                    var html = '<option value="" selected>Select child interview type</option>';
                    $.each(response.child_interview_types , function(index, val) {
                       html += '<option value="'+val.id+'">'+val.name+'</option>';
                    });

                    $('#child_interview_type_id').html(html);
                }
            });
        });

        var dateToday = new Date();
        var dates = $("#current-date").datepicker({
            defaultDate: "+2d",
            changeMonth: true,
            numberOfMonths: 1,
            minDate: "+2d",
            onSelect: function(selectedDate) {
                var option = this.id == "current-date" ? "minDate" : "maxDate",
                    instance = $(this).data("datepicker"),
                    date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
                dates.not(this).datepicker("option", option, date);
            }
        });
    </script>
@endpush
