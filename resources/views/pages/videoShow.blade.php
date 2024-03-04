@extends('layouts.app')

@section('content')
<div class="container" style="text-align: center;">
    <video width="800px" height="480" controls autoplay style="margin: auto;">
        <source src="/videos/{{ $video_path }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</div>
@endsection