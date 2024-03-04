@extends('Admin.layouts.app')

@section('con')

<form action="/admin/quizzes" method="POST" enctype="multipart/form-data" class="col-7">
    @csrf
    <h1>Add a new video</h1>
    @if ($errors->any())

    @foreach ($errors->all() as $error)
    <div class="alert alert-danger" role="alert">{{ $error }}</div>
    @endforeach

  @endif
    <div class="form-group">
      <label for="name">name</label>
      <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
        <label for="inputGroupSelect01">Course</label>
        <select class="custom-select" id="inputGroupSelect01"  name="course_id">
    <option value="" selected disabled>Choose...</option>
    @foreach ($courses as $course)
    <option value="{{ $course->id }}">{{ $course->name }}</option>
   @endforeach
  </select>
      </div>




    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection
