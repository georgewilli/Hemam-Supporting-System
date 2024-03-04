@extends('Admin.layouts.app')

@section('con')
<h1>Edit Video</h1>
<form action="/admin/quizzes/{{ $quiz->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @if ($errors->any())

    @foreach ($errors->all() as $error)
    <div class="alert alert-danger" role="alert">{{ $error }}</div>
    @endforeach

  @endif
  <div class="form-group">
      <label for="name">name</label>
      <input value="{{ $quiz->name }}" type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
        <label for="inputGroupSelect01">Course</label>
        <select class="custom-select" id="inputGroupSelect01"  name="course_id">
    @foreach ($courses as $course)
    <option value="{{ $course->id }}">{{ $course->name }}</option>
   @endforeach
  </select>
      </div>




    <button type="submit" class="btn btn-primary">Submit</button>
  </form>


@endsection