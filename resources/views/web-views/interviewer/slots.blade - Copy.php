<center>
    <input type="hidden" name="slot_type" value="{{ $slot_type }}">
    @if($slot_type=='weekdays')
        <div class="panel-heading" id="weekdays">
            <label><span class="text-md">&nbsp;<strong>Weekdays</strong> </span></label>
            <input type="checkbox" name="weekdays[]" id="mon" value="Mon" class="text-md"> 
            <label for="mon">Mon</label> 
            <input type="checkbox" name="weekdays[]" id="tues" value="Tue" class="text-md"> 
            <label for="tues">Tue</label> 
            <input type="checkbox" name="weekdays[]" id="wed" value="Wed" class="text-md"> 
            <label for="wed">Wed</label> 
            <input type="checkbox" name="weekdays[]" id="thur" value="Thu" class="text-md"> 
            <label for="thur">Thu</label> 
            <input type="checkbox" name="weekdays[]" id="fri" value="Fri" class="text-md"> 
            <label for="fri">Fri</label> 
        </div>
    @else 
        <div class="panel-heading" id="weekdays">
            <label><span class="text-md">&nbsp;<strong>Weekands</strong> </span></label>
            <input type="checkbox" name="weekdays[]" id="sat" value="sat" class="text-md"> 
            <label for="sat">Sat</label> 
            <input type="checkbox" name="weekdays[]" id="sun" value="sun" class="text-md"> 
            <label for="sun">Sun</label> 
        </div>
    @endif
</center>

<div class="row mt-4 mb-4" style="margin-left:97px">
    <div class="well col-sm-5">
        <div class="py-3">
            <center><h6>Morning Slots</h6></center>
            <div class="row py-3">
                @foreach ($slots['morning_slots'] as $key=>$slot)
                    @if (in_array($slot, $booked_slots))
                        <div class="col-md-3">
                            <div class="col-sm-2">
                                <article class="feature1">
                                    <input type="checkbox" id="slot-m-{{ $key }}" class="m-slot-btn" name="mornings[]" value="{{ $slot }}"/>
                                    <span style="text-decoration: line-through;">{{ $slot }}</span>
                                </article>
                            </div>
                        </div>
                    @else 
                        <div class="col-md-3">
                            <div class="col-sm-2">
                                <article class="feature1 slot">
                                    <input type="checkbox" id="slot-m-{{ $key }}" class="m-slot-btn" name="mornings[]" value="{{ $slot }}"/>
                                    <span>{{ $slot }}</span>
                                </article>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="well col-sm-5 ml-4">
        <div class=" py-3">
            <center><h6>Evening Slots</h6></center>
            <div class="row py-3">
                @foreach ($slots['evening_slots'] as $key=>$slot)
                    @if (in_array($slot, $booked_slots))
                        <div class="col-md-3">
                            <div class="col-sm-2">
                                <article class="feature1">
                                    <input type="checkbox" class="e-slot-btn" name="evenings[]" value="{{ $slot }}" id="slot-e-{{ $key }}"/>
                                    <span style="text-decoration: line-through;">{{ $slot }}</span>
                                </article>
                            </div>
                        </div>
                    @else
                        <div class="col-md-3">
                            <div class="col-sm-2">
                                <article class="feature1 slot">
                                    <input type="checkbox" class="e-slot-btn" name="evenings[]" value="{{ $slot }}" id="slot-e-{{ $key }}"/>
                                    <span>{{ $slot }}</span>
                                </article>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>