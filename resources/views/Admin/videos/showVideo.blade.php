@extends('Admin.layouts.app')

@section('con')
<div class="container" style="text-align: center;">
<video width="800px" height="480" controls  autoplay style="margin: auto;">
<source src="/videos/{{ $video }}" type="video/mp4">
Your browser does not support the video tag.
</video></div>
@endsection