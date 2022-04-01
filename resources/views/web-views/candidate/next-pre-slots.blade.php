<div class="row" id="slotsInDate">
    <div class="col-md-2 available-date ng-binding" id="slotDate">
       <span id="first_date">{{ date('d M Y') }}</span>
    </div>
    <div class="col-md-10">
      <div class="row">
         @php 
         $date = date('Y-m-d');
         $day = date("D", strtotime($date));
         @endphp
         @if($day == 'Sat' || $day == 'Sun')
             @foreach ($slots['weekends_slots'] as $weekend_slot)
                 <div class="col-sm-2">
                     <button class="mt-3 slot">{{ $weekday_slot }}</button>
                 </div>
             @endforeach
         @else
             @foreach ($slots['weekdays_slots'] as $weekday_slot)
                 <div class="col-sm-2">
                     <button class="mt-3 slot">{{ $weekday_slot }}</button>
                 </div>
             @endforeach
         @endif
      </div>
    </div>
 </div>
 <hr />
 <div class="row" id="slotsInDate">
     <div class="col-md-2 available-date ng-binding" id="slotDate">
        <span id="second_date">{{ date('d M Y', strtotime("+1 day")) }}</span>
     </div>
     <div class="col-md-10">
         <div class="row">
             @php 
             $date = date('d M Y', strtotime("+1 day"));
             $day = date("D", strtotime($date));
             @endphp
             @if($day == 'Sat' || $day == 'Sun')
                 @foreach ($slots['weekends_slots'] as $weekend_slot)
                     <div class="col-sm-2">
                         <button class="mt-3 slot">{{ $weekend_slot }}</button>
                     </div>
                 @endforeach
             @else
                 @foreach ($slots['weekdays_slots'] as $weekday_slot)
                     <div class="col-sm-2">
                         <button class="mt-3 slot">{{ $weekday_slot }}</button>
                     </div>
                 @endforeach
             @endif
         </div>
     </div>
 </div>