@extends('web-views.dashboard.master.app')

@section('title', $page_title)

@push('css')
@endpush

@section('content')
    <div class="container py-3 ">
        <div class="row mx-auto">
            <h2 class="mb-3">Test My Webcam</h2>
            <div class="row mx-auto">
                <div style="display: flex; flex-direction: column; align-items: center;">
                    <video id="video" style="width: 700px;" autoplay playsinlne></video>
                </div>
            </div>
            <div class="row mx-auto">
                <div class="col-sm-1">
                    <a href="{{ route('test_setup') }}" class="btn btn-danger webcam-test-btn"><i class="fa fa-times"></i> Cancel Test</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
<script>
    const video = document.getElementById('video');

    const constraints = {
        audio: true,
        video:{
            width:{ min: 1024, ideal: 1280, max: 1920 },
            height:{ min: 576, ideal: 720, max: 1080 }
        }
    }

    async function startWebCam(){
        try{
            const stream = await navigator.mediaDevices.getUserMedia(constraints);
            video.srcObject = stream;
            window.stream = stream;
        }catch (e){
            console.log(e.toString());
        }
    }

    startWebCam();
</script>
@endpush