<div class="row" style="">
    <div class="well col-sm-12">
        <div class="py-3">
            <div class="row py-3">
                @foreach ($model->hasBookedSlots as $key=>$slot)
                    @php 
                        $date_time = $slot->slot;
                        $slot_date = explode(' ', $date_time)[0];
                        $slot_time = date('h:i A', strtotime($date_time));
                    @endphp 
                    <div class="col-md-3">
                        <article class="feature1">
                            <input type="checkbox" class="e-slot-btn" value="{{ $date_time }}" id="slot-e-{{ $key }}"/>
                            <span>{{ $slot_time }}</span>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>