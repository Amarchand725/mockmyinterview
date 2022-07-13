@php
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
@endif