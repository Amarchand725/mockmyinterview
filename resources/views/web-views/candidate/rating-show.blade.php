<table class="table">
    <tr>
        <th>Title</th>
        <td>{{ $model->title }}</td>
    </tr>
    <tr>
        <th>Review</th>
        <td>{{ $model->description }}</td>
    </tr>
    <tr>
        <th>Recommended Study Link</th>
        <td>
            <a href="{{ isset($model->hasCourse)?$model->hasCourse->video_url:'' }}" target="_blank">{{ isset($model->hasCourse)?$model->hasCourse->video_url:'N/A' }}</a>
        </td>
    </tr>
</table>