@foreach($models as $key=>$model)
    <tr id="id-{{ $model->slug }}">
        <td>{{ $models->firstItem()+$key }}.</td>
        <td>
            @if($model->banner)
                <img src="{{ asset('public/admin/assets/coupons/'.$model->banner) }}" alt="" style="width:60px;">
            @else
                <img src="{{ asset('public/admin/assets/images/team/no-photo1.jpg') }}" style="width:60px;">
            @endif
        </td>
        <td>{{ $model->name }}</td>
        <td>{{ $model->type }}</td>
        <td>{{ $model->coupon_code }}</td>
        <td>{{ $model->discount }}</td>
        <td>{{ $model->start_date }} - {{ $model->end_date }}</td>
        <td>{!! \Illuminate\Support\Str::limit($model->description,40) !!}</td>
        <td>
            @if($model->status)
                <span class="badge badge-success">Active</span>
            @else
                <span class="badge badge-danger">In-Active</span>
            @endif
        </td>
        <td>
            @can('coupon-edit')
                <a href="{{route('coupon.edit', $model->slug)}}" data-toggle="tooltip" data-placement="top" title="Edit model" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
            @endcan
            @can('coupon-delete')
                <button class="btn btn-danger btn-xs delete" data-slug="{{ $model->slug }}" data-del-url="{{ url('coupon', $model->slug) }}"><i class="fa fa-trash"></i> Delete</button>
            @endcan
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="10">
        Displying {{$models->firstItem()}} to {{$models->lastItem()}} of {{$models->total()}} records
        <div class="d-flex justify-content-center">
            {!! $models->links('pagination::bootstrap-4') !!}
        </div>
    </td>
</tr>