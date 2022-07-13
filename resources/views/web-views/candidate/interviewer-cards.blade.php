<span class="side-heading-font">
    Available Interviewer <span style="font-size:12px !important;font-weight:400 !important;color:inherit; ">&nbsp;&nbsp;<small>(All time slots listed are in IST)</small></span>
</span>
<div class="row pt-4">
    @foreach ($models as $model)
        <div class="col-md-2">
            <div class="card">
                @if($model->image)
                    <img src="{{ asset('public/web/assets/images/user') }}/{{ $model->image }}" class="card-img-top" alt="..." style="height: 150px">
                @else 
                    <img src="https://picsum.photos/200/300" class="card-img-top" alt="..." style="height: 150px">
                @endif
                <div class="card-body" style="text-align: center">
                    <h5 class="card-title">{{ $model->name }}</h5>
                    <button type="button" data-user-name="{{ $model->name }}" data-user-id="{{ $model->id }}" class="btn btn-info more-info-btn">More Info</button>
                </div>
            </div>
        </div>
    @endforeach
</div>