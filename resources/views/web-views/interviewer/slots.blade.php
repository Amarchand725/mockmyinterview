<div class="row mt-4 mb-4" style="margin-left:97px">
    <div class="well col-sm-5">
        <div class="py-3">
            <center><h6>Possible Slots</h6></center>
            <div class="row py-3">
                @foreach ($data as $key=>$slot)
                    @php 
                        $date_time = $slot['start'];
                        $slot_date = explode(' ', $date_time)[0];
                        $slot_time = date('h:i A', strtotime($date_time));
                    @endphp 
                    <input type="hidden" name="date_time" value="{{ $date_time }}">
                    <div class="col-md-3">
                        <div class="col-sm-2">
                            <article class="feature1 slot">
                                <input type="checkbox" class="e-slot-btn" name="slot" value="{{ $slot_time }}" id="slot-e-{{ $key }}"/>
                                <span>{{ $slot_time }}</span>
                            </article>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>