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
            <form action="{{ route('book_interview.store') }}" method="post">
                @csrf

                <div class="col-md-12 well py-3">
                    <div class="bg-white ">
                        <span class="side-heading-font">Schedule an Interview </span>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="">Date</label>
                                    <input type="text" class="form-control datepicker" name="date" value="{{ date('Y/m/d') }}" id="current-date">
                                </div>
                            </div>
                            <div class="col-md-5"></div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="">Parent Interview Type</label>
                                    <select name="parent_id" id="parent-interview-type" class="form-control parent-interview-type">
                                        <option value="" selected>Select parent interview type</option>
                                        @foreach ($parent_interview_types as $interview_type)
                                            <option value="{{ $interview_type->id }}">{{ $interview_type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="">Child Interview Type</label>
                                    <select name="child_interview_type_id" id="child_interview_type_id" class="form-control"></select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-info search-btn" style="margin-top: 30px"><i class="fa fa-search"></i> Search</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Booking interview -->
                <main class="container-fluid pt-5">
                    <span class="side-heading-font">
                        Available Interviewer <span style="font-size:12px !important;font-weight:400 !important;color:inherit; ">&nbsp;&nbsp;<small>(All time slots listed are in IST)</small></span>
                    </span>
                    <span id="interviewers"></span>
                </main>
            </form>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="interviewer-details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa fa-user"></i> Interviewer Details</h5>
                </div>
                <form action="{{ route('book_interview.store') }}" method="post">
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
        $(document).on('change', '#custom-slot', function() {

            var id = $(this).val(); // this gives me null
            if (id != null) {
            alert(id)
            }

        });

        $(document).on('click', '.more-info-btn', function(){
            var user_id = $(this).attr('data-user-id');
            var date = $('#current-date').val();
            var parent_interview_type = $('#parent-interview-type').val();
            var child_interview_type = $('#child_interview_type_id').val();
            $.ajax({
                url : "{{ route('get-interviewer-details') }}",
                data : {'user_id' : user_id, 'date' : date, 'parent_interview_type' : parent_interview_type, 'child_interview_type' : child_interview_type},
                success : function(response){
                    console.log(response);
                    $('.modal-body').html(response);
                }
            });
            $('#interviewer-details').modal('show');
        });

        $(document).on('click', '.search-btn', function(){
            var date = $('#current-date').val();
            var parent_interview_type = $('#parent-interview-type').val();
            var child_interview_type = $('#child_interview_type_id').val();
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
                $(this).addClass('active');
            }
        });
        $(document).on('click', '.slot', function(){
            $('.parent').find('.slot-selected').removeClass("slot-selected")
            if($(this).hasClass('slot-selected')){
                $(this).removeClass('slot-selected');
            }else{
                $(this).addClass('slot-selected');
            }
        });

        $( "#current-date" ).datepicker({
            dateFormat: "yy-mm-dd"
        });
        $("#current-date").datepicker({
            onSelect: function(dateText) {
                // console.log("Selected date: " + dateText + "; input's current value: " + this.value);
                // alert(dateText);
                var parent_id = $('#parent-interview-type').val();
                var child_id = $('#child_interview_type_id').val();
                if(parent_id != '' && child_id != ''){
                    $.ajax({
                        url : "{{ route('get-interviewers') }}",
                        data : {'parent_id' : parent_id, 'child_id' : child_id},
                        success : function(response){
                            console.log(response);
                            /* var html = '<option value="" selected>Select child interview type</option>';
                            $.each(response.child_interview_types , function(index, val) { 
                            html += '<option value="'+val.id+'">'+val.name+'</option>';
                            });

                            $('#child_interview_type_id').html(html); */
                        }
                    });
                }
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
