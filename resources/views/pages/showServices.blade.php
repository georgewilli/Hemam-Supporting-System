@extends('layouts.app')

@section('content')




@if ($type == 'hospital')
<div class="container">

  <div class="card first-card">
    <img src="/images/hospital1.png" height=590px class="card-img-top" alt="...">
    <div class="card-body">
      <h1 style="color: rgb(3, 117, 117)" class="card-title">Hospitals</h1>
      <p class="card-text">We are presnting you the most trusted hospitals for HANDY-CAPS.
        <br>Scroll down to find your nearst hospital.<br>
      </p>
      <p class="card-text"><small class="text-muted">Thanks for choosing us !</small></p>
    </div>
  </div>

  @foreach ($services as $service)

  <div class=" services-card ">

    <div class="card-body body-small-card hospital-border">
      <h3 class="card-title"> {{ $service->title }} </h3>
      <p class="card-text">{{ $service->description }}</p>
      <div class="link_location"><a href="{{ $service->url }}" target="_blank" class="btn btn-info">{{ $service->title }}
          locataion <i class="fa-solid fa-location-dot"></i></a></div>

    </div>
    <div class="card-footer text-muted" style="border-bottom-left-radius: 40px; border-bottom-right-radius: 40px;">
      {{ $service->district }}
    </div>
  </div>
  @endforeach
</div>

@endif
@if ($type == 'school')
<div class="container">
  <div class="card first-card">
    <img src="/images/school3.png" height=590px class="card-img-top" alt="...">
    <div class="card-body">
      <h1 style="color: rgb(3, 117, 117)" class="card-title">Schools</h1>
      <p class="card-text">We are presnting you the most trusted schools for HANDY-CAPS.
        <br>Scroll down to find your nearst school.<br>
      </p>
      <p class="card-text"><small class="text-muted">Thanks for choosing us !</small></p>
    </div>
  </div>
  @foreach ($services as $service)
  <div class=" services-card ">

    <div class="card-body body-small-card school-border">
      <h3 class="card-title"> {{ $service->title }} </h3>
      <p class="card-text">{{ $service->description }}</p>
      <div class="link_location"><a href="{{ $service->url }}" class="btn btn-info" target="_blank">{{ $service->title }}
          locataion <i class="fa-solid fa-location-dot"></i></a></div>

    </div>
    <div class="card-footer text-muted" style="border-bottom-left-radius: 40px; border-bottom-right-radius: 40px;">
      {{ $service->district }}
    </div>
  </div>
  @endforeach
</div>
</div>
@endif
@if ($type == 'rehab')
<div class="container">
  <div class="card first-card">
    <img src="/images/rehab.png" height=490px class="card-img-top" alt="...">
    <div class="card-body">
      <h1 style="color: rgb(3, 117, 117)" class="card-title">Rehabs</h1>
      <p class="card-text">We are presnting you the most trusted Rehablitaion Centers for HANDY-CAPS.
        <br>Scroll down to find your nearst rehab.<br>
      </p>
      <p class="card-text"><small class="text-muted">Thanks for choosing us !</small></p>
    </div>
  </div>
  @foreach ($services as $service)
  <div class=" services-card ">

    <div class="card-body body-small-card rehab-border">
      <h3 class="card-title"> {{ $service->title }} </h3>
      <p class="card-text">{{ $service->description }}</p>
      <div class="link_location"><a href="{{ $service->url }}" target="_blank" class="btn btn-info">{{ $service->title }}
          locataion <i class="fa-solid fa-location-dot"></i></a></div>

    </div>
    <div class="card-footer text-muted" style="border-bottom-left-radius: 40px; border-bottom-right-radius:40px;">
      {{ $service->district }}
    </div>
  </div>
  @endforeach
</div>
</div>
@endif


@endsection