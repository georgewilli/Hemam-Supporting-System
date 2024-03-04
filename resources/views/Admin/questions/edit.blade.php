@extends('Admin.layouts.app')

@section('con')

<form action="/admin/questions/{{ $question->id }}" method="POST" enctype="multipart/form-data" class="col-7">
@csrf
    @method('PUT')
    <h1>Add a new video</h1>
    @if ($errors->any())

    @foreach ($errors->all() as $error)
    <div class="alert alert-danger" role="alert">{{ $error }}</div>
    @endforeach

  @endif
    <div class="form-group">
      <label for="name">Question Head</label>
      <input type="text" value="{{ $question->question_head }}" name="question_head" class="form-control" id="name" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
      <label for="name">First option</label>
      <input type="text" value="{{ $question->first_option }}" name="first_option" class="form-control" id="first" aria-describedby="emailHelp">
    </div><div class="form-group">
      <label for="name">Second option</label>
      <input type="text" value="{{ $question->second_option }}" name="second_option" class="form-control" id="second" aria-describedby="emailHelp">
    </div><div class="form-group">
      <label for="name">Third option</label>
      <input type="text" value="{{ $question->third_option }}" name="third_option" class="form-control" id="third" aria-describedby="emailHelp">
    </div><div class="form-group">
      <label for="name">Fourth option</label>
      <input type="text" value="{{ $question->fourth_option }}" name="fourth_option" class="form-control" id="fourth" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
        <label for="inputGroupSelect01">Right answer</label>
        <select class="custom-select" id="inputGroupSelect01"  name="answer" value="{{ $question->answer }}">
    <option value="" selected disabled>Choose...</option>

    <option value="1">First option</option>
    <option value="2">Second option</option>
    <option value="3">Third option</option>
    <option value="4">Fourth option</option>

  </select>
      </div>
    <div class="form-group">
        <label for="inputGroupSelect02">Course</label>
        <select class="custom-select" id="inputGroupSelect02"  name="course_id" value="{{ $question->course_id }}">
    <option value="" selected disabled>Choose...</option>
    @foreach ($courses as $course)
    <option value="{{ $course->id }}" {{ ( $course->id == $question->course_id ) ? 'selected' : '' ; }}>{{ $course->name }}</option>
   @endforeach
  </select>
      </div>

      <div class="form-group">
        <label for="inputGroupSelect03">Quiz</label>
        <select class="custom-select" id="inputGroupSelect03" value="{{ $question->quiz_id }}"  name="quiz_id">
    <option value="" selected disabled>Choose...</option>
    @foreach ($quizzes as $quiz)
    <option value="{{ $quiz->id }}" {{ ( $quiz->id == $question->quiz_id ) ? 'selected' : '' ; }}>{{ $quiz->name }}</option>
   @endforeach
  </select>
      </div>


    <button type="submit" class="btn btn-primary">Submit</button>
  </form>



@endsection
