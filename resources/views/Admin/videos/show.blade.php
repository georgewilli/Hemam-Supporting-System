@extends('Admin.layouts.app')

@section('con')


<div class="card mb-3">
    <div class="card-body">
      <h5 class="card-title">{{ $video->video_name }}</h5>
      <p class="card-text">{{ $video->description }}</p>
      <a href="/admin/videos/show/{{ $video->video_path }}" class="card-text">watch video</a>

    </div>
  </div>
@endsection