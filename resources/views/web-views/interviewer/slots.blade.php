<div class="row" style="">
    <div class="well col-sm-12">
        <div class="py-3">
            <center><h6>Possible Slots</h6></center>
            <div class="row py-3">
                @foreach ($data as $key=>$slot)
                    @php 
                        $date_time = $slot['start'];
                        $slot_date = explode(' ', $date_time)[0];
                        $slot_time = date('h:i A', strtotime($date_time));
                    @endphp 
                    @if(getSlot(Auth::user()->id, $date_time))
                        <div class="col-md-2">
                            <div class="col-sm-2">
                                <article class="feature1">
                                    <input type="checkbox" id="slot-m-{{ $key }}" class="m-slot-btn" value="{{ $date_time }}"/>
                                    <span style="text-decoration: line-through;">{{ $slot_time }}</span>
                                </article>
                            </div>
                        </div>
                    @else 
                        <div class="col-md-2">
                            <div class="col-sm-2">
                                <article class="feature1 slot">
                                    <input type="checkbox" class="e-slot-btn" name="slots[]" value="{{ $date_time }}" id="slot-e-{{ $key }}"/>
                                    <span>{{ $slot_time }}</span>
                                </article>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>