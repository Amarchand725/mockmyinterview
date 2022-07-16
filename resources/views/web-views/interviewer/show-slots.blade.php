<div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                @foreach ($model->hasBookedSlots as $key=>$slot)
                    @php
                        $date_time = $slot->slot;
                        $slot_date = explode(' ', $date_time)[0];
                        $slot_time = date('h:i A', strtotime($date_time));
                    @endphp
                    <div class="col-sm-3">
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
