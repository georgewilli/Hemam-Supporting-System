@extends('Admin.layouts.app')

@section('con')


<div class="card mb-3">
    <img class="card-img-top" src="/images/{{ $course->image_path }}" alt="Card image cap" height="360px">
    <div class="card-body">
      <h5 class="card-title">{{ $course->name }}</h5>
      <p class="card-text">{{ $course->descreption }}</p>
      <a href="/admin/courses/videos/{{ $course->id }}" class="card-text">show course videos</a><br><br>
      <a href="/admin/courses/quizzes/{{ $course->id }}" class="card-text">show course quizzes</a>

    </div>
  </div>
@endsection