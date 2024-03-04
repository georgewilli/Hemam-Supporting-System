@extends('layouts.app')

@section('content')
@isset($pass)
<div class="container justify-content-center mt-5 d-flex">
  <div class="alert alert-success " style="width: 600px" role="alert">
    <h1 class="alert-heading">Well done!</h1>
    <p>{{ $pass }}.</p>
    <hr>
    <p class="mb-0">Whenever you need the certificate , click <a href="/Course/certificate/{{ $courseId }}"
        target="_blank"> here </a>.</p>
  </div>

</div>
@endisset
@isset($fail)
<div class="container justify-content-center mt-5 d-flex">
  <div class="alert alert-danger " style="width: 600px" role="alert">
    <h1 class="alert-heading">Hard luck!</h1>
    <p>{{ $fail }}.</p>
    <hr>
    <p class="mb-0">You can try again later.</p>
  </div>

</div>
@endisset
@endsection