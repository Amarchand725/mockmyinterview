<table class="table">
    <tbody>
        <tr>
            <th colspan="3"><i class="fa fa-user"></i> Basic Info</th>
        </tr>
        <tr>
            <td style="width: 10px">
                @if($model->image)
                    <img src="{{ asset('public/web/assets/images/user') }}/{{ $model->image }}" class="card-img-top" alt="..." style="height: 100px; width:120px">
                @else 
                    <img src="https://picsum.photos/200/300" class="card-img-top" alt="..." style="height: 100px; width:120px">
                @endif
            </td>
            <td>{{ $model->name }}</td>
        </tr>
        <tr>
            <td>Languages</td>
            <td>{{ $model->hasUserDetails->hasLanguage->title }}</td>
        </tr>
        <tr>
            <th colspan="3"><i class="fa fa-graduation-cap"></i> Education</th>
        </tr>
        <tr>
            <td colspan="3">
                <table class="table" style="margin-top: -20px">
                    <thead>
                        <tr>
                            <th>Degree</th>
                            <th>Course</th>
                            <th>Passing Year</th>
                            <th>Institute</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($model->hasUserQualification as $qualification)
                            <tr>
                                <td>{{ $qualification->hasDegree->title }}</td>
                                <td>{{ $qualification->hasCourse->title }}</td>
                                <td>{{ $qualification->passing_year }}</td>
                                <td>{{ $qualification->institute }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <th colspan="3"><i class="fa fa-history"></i> Experience</th>
        </tr>
        <tr>
            <td colspan="3">
                <table class="table" style="margin-top: -20px">
                    <thead>
                        <tr>
                            <th>Position</th>
                            <th>Company</th>
                            <th>Joining Date</th>
                            <th>Leaving Date</th>
                            <th>Experience</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($model->hasUserExperiences as $experience)
                            <tr>
                                <td>{{ $experience->position }}</td>
                                <td>{{ $experience->company }}</td>
                                <td>{{ $experience->joining_date }}</td>
                                <td>{{ $experience->leaving_date }}</td>
                                <td>{{ $experience->experiences }} - Years</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </td>
        </tr>

        <tr>
            <th colspan="3"><i class="fa fa-diamond"></i> Familiar Interviews</th>
        </tr>
        <tr>
            <td colspan="3">
                <ul>
                    @foreach ($model->hasInterviewTypes as $interview_type)
                        <li>{{ $interview_type->hasParentInterviewType->name }} - {{ $interview_type->hasChildInterviewType->name }}</li>   
                    @endforeach
                </ul>
            </td>
        </tr>
        <tr>
            <th colspan="3"><i class="fa fa-clock-o"></i> Date 
                <input type="text" class="form-control datepicker current-date" name="date" value="{{ date('Y/m/d') }}" id="current-date">
                <span style="color: red" id="booked-slot-error">{{ $errors->first('booked_slot') }}</span>
            </th>
        </tr>
        <tr>
            <td colspan="3">
                <div class="col-md-12 block-rows next-slots">
                    <div class="row" id="slotsInDate">
                        <div class="col-md-10">
                            <div class="row parent available-slots">
                                {{-- @php
                                $date = date('Y-m-d');
                                $day = date("D", strtotime($date));
                                @endphp
                                @if(sizeof($slots)>0)
                                    @foreach ($slots as $slot)
                                        <div class="col-sm-2">
                                            <article class="feature1 slot">
                                                @if(!empty($booked_slots))
                                                    @php $ifbooked = 0; @endphp 
                                                    @foreach ($booked_slots as $booked)
                                                        @if($slot->slot==$booked->slot)
                                                            @php $ifbooked=1; @endphp 
                                                        @endif
                                                    @endforeach
                                                    @if($ifbooked)
                                                        <input type="radio" disabled/>
                                                        <span style="text-decoration: line-through !important">{{ $slot->slot }}</span>
                                                    @else 
                                                        <input type="radio" name="booked_slot" class="booked-slot" value="{{ $slot->slot }}" id="feature1"/>
                                                        <span>{{ $slot->slot }}</span>
                                                    @endif
                                                @else 
                                                    <input type="radio" name="booked_slot" class="booked-slot" value="{{ $slot->slot }}" id="feature1"/>
                                                    <span>{{ $slot->slot }}</span>
                                                @endif
                                            </article>
                                        </div>
                                    @endforeach
                                @else 
                                    Not available slot
                                @endif --}}
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <th colspan="3">
                <div class="form-check" id="">
                    <input type="checkbox" name="custom_slot" class="form-check-input" value="1" id="custom-slot">
                    <label class="form-check-label" for="custom-slot"> Create Custom Slot </label>
                </div>
            </th>
        </tr>
        <tr>
            <td colspan="3" id="make-custom-slot"></td>
        </tr>
    </tbody>
</table>
<input type="hidden" id="parent_interview_type_id" name="parent_interview_type_id" value="{{ $parent_interview_type_id }}">
<input type="hidden" id="child_interview_type_id" name="child_interview_type_id" value="{{ $child_interview_type_id }}">
<input type="hidden" id="interviewer_id" name="interviewer_id" value="{{ $model->id }}">
<script>
    $( ".current-date" ).datepicker({
        dateFormat: "yy-mm-dd"
    });
</script>