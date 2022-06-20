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
                            <div class="col-md-6">
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Child Interview Type</label>
                                    <select name="child_interview_type_id" id="child_interview_type_id" class="form-control"></select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Date</label>
                                    <input type="text" class="form-control datepicker" name="date" value="{{ date('d/m/Y') }}" id="current-date">
                                </div>
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

                    <div class="row pt-4">
                        <div class="col-md-3">
                            <div class="card" style="width: 18rem;">
                                <img src="https://picsum.photos/200/300" class="card-img-top" alt="..." style="height: 200px">
                                <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card" style="width: 18rem;">
                                <img src="https://picsum.photos/200/300" class="card-img-top" alt="..." style="height: 200px">
                                <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </form>
        </div>
    </div>
@endsection

@push('js')
    <script>
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
