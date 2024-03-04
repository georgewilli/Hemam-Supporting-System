@extends('Admin.layouts.app')

@section('con')


<div class="card mb-3">

    <div class="card-body">
      <h5 class="card-title">{{ $services->title }}</h5>
      <p class="card-text">{{ $services->description }}</p>
      <a href="{{ $services->url }}" class="card-text">wepsite</a>

    </div>
  </div>
@endsection