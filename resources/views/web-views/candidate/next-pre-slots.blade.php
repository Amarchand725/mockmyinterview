<div class="row" id="slotsInDate">
    <div class="col-md-2 available-date ng-binding" id="slotDate">
       <span id="first_date">{{ date('d M Y', strtotime($current_date)) }}</span>
    </div>
    <div class="col-md-10">
      <div class="row">
         @php 
         $date = date('Y-m-d', strtotime($current_date));
         $day = date("D", strtotime($date));
         @endphp
         @if(sizeof($slots)>0)
            @if($day == 'Sat' || $day == 'Sun')
                @foreach ($slots['weekends_slots'] as $weekend_slot)
                    <div class="col-sm-2">
                        <article class="feature1 slot">
                            <input type="checkbox" name="booked_slots[{{ $weekend_slot['interviewer_id'] }}][]" value="{{ $weekday_slot['slot'] }}" id="feature1"/>
                            <span>{{ $weekday_slot['slot'] }}</span>
                        </article>
                    </div>
                @endforeach
            @else
                @foreach ($slots['weekdays_slots'] as $weekday_slot)
                    <div class="col-sm-2">
                        <article class="feature1 slot">
                            <input type="checkbox" name="booked_slots[{{ $weekday_slot['interviewer_id'] }}][]" value="{{ $weekday_slot['slot'] }}" id="feature1"/>
                            <span>{{ $weekday_slot['slot'] }}</span>
                        </article>
                    </div>
                @endforeach
            @endif
        @else 
            Not available slot
        @endif
      </div>
    </div>
 </div>
 <hr />
 <div class="row" id="slotsInDate">
     <div class="col-md-2 available-date ng-binding" id="slotDate">
        <span id="second_date">{{ date('d M Y', strtotime($date. "+1 day")) }}</span>
     </div>
     <div class="col-md-10">
         <div class="row">
            @php 
            $date = date('d M Y', strtotime($date. "+1 day"));
            $day = date("D", strtotime($date));
            @endphp
            @if(sizeof($next_slots)>0)
                @if($day == 'Sat' || $day == 'Sun')
                    @foreach ($next_slots['weekends_slots'] as $weekend_slot)
                        <div class="col-sm-2">
                            <article class="feature1 slot">
                                <input type="checkbox" name="booked_slots[{{ $weekend_slot['interviewer_id'] }} =>{{ $date }}][]" value="{{ $weekend_slot['slot'] }}" id="feature1"/>
                                <span>{{ $weekend_slot['slot'] }}</span>
                            </article>
                        </div>
                    @endforeach
                @else
                    @foreach ($next_slots['weekdays_slots'] as $weekday_slot)
                        <div class="col-sm-2">
                            <article class="feature1 slot">
                                <input type="checkbox" name="booked_slots[{{ $weekday_slot['interviewer_id'] }}][]" value="{{ $weekday_slot['slot'] }}" id="feature1"/>
                                <span>{{ $weekday_slot['slot'] }}</span>
                            </article>
                        </div>
                    @endforeach
                @endif
            @else 
                Not available slot
            @endif
         </div>
     </div>
 </div>