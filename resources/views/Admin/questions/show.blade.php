@extends('Admin.layouts.app')

@section('con')

<strong>{{ $question->question_head }}</strong>
<fieldset><div class="form-group some-class">
    <div class="form-check mb-1">
    <input type="radio" class="form-check-input">
  <label class="form-check-label radio-label">  {{ $question->first_option }}</label>
</div>
<div class="form-check mb-1">

    <input type="radio" class="form-check-input">
     <label class="form-check-label radio-label"> {{ $question->second_option }}
  </label>
</div>
@isset( $question->third_option )


<div class="form-check mb-1">

    <input type="radio" class="form-check-input">
    <label class="form-check-label radio-label">  {{ $question->third_option }}
  </label>
</div>
@endisset
@isset( $question->fourth_option)


<div class="form-check mb-1 ">
    <input type="radio" class="form-check-input">
     <label class="form-check-label radio-label"> {{ $question->fourth_option }}
  </label>
</div>
@endisset</div>
</fieldset>

@endsection