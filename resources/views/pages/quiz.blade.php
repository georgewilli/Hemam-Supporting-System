@extends('layouts.app')

@section('content')
<div class="container">
<h1><strong>Questions</strong></h1>
<hr>

<form method="POST" action="/quiz/{{ $quiz['id'] }}" class="">
     @csrf
     @method('PUT')

@foreach ($quiz['quizzesQuestions'] as $key => $question)



<strong>{{ $key+1 }}- {{ $question->question_head }}</strong>
<fieldset><div class="form-group some-class">
    <div class="form-check mb-1">
    <input type="radio" class="form-check-input"  value="1" name="question_{{ $key+1 }}">
  <label class="form-check-label radio-label">True</label>
</div>
<div class="form-check mb-1">

    <input type="radio" class="form-check-input" value="2" name="question_{{ $key+1 }}">
     <label class="form-check-label radio-label">False
  </label>
</div>
@isset($question->third_option)
<div class="form-check mb-1">

    <input type="radio" class="form-check-input" value="3" name="question_{{ $key+1 }}">
    <label class="form-check-label radio-label">  {{ $question->third_option }}
  </label>
</div>
@endisset
@isset($question->fourth_option)
<div class="form-check mb-1 ">
    <input type="radio" class="form-check-input" value="4" name="question_{{ $key+1 }}">
     <label class="form-check-label radio-label"> {{ $question->fourth_option }}
  </label>
</div>
@endisset</div>
</fieldset>

    <hr>
@endforeach
@foreach ($errors->all() as $error)
    <div class="alert alert-danger" role="alert">{{ $error }}</div>
    @endforeach
<div class="row input_row">
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-2">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-success">Submit</button> &nbsp;
                <a href="{{ route('home') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </div>
</div>

</form>

</div>
           @endsection