@extends('layouts.app')

@section('content')
@isset($error)

<div class="alert alert-danger" role="alert">{{ $error }}</div>

@endisset

@isset($message)
<div class="alert alert-success " role="alert">
  {{ $message }}
</div>
@endisset
<div class="container text-center mt-4 mb-4">
  <h1 style="font-family: 'Baloo Chettan', cursive;">{{ $course->name }}</h1>
</div>
<div class="container mb-5">
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Number</th>
        <th scope="col">Name</th>
        <th scope="col">URL</th>
        <th scope="col">Dedsciption</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($course->coursesVideos as $video)
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $video->video_name }}</td>
        <td><a href="/Courses/video/show/{{ $video->video_path }}">The url of the video</a></td>
        <td>{{ $video->description }}</td>
      </tr> @endforeach

    </tbody>
  </table>
  @empty( $finished)
  <form action="/quiz/{{ $course->id }}" method="POST">

    @csrf
    @method('GET')

    <button type="submit" class="btn btn-success ">Go to quiz</button>
  </form>
  @endempty
  @isset($finished)
  <div>you already finished this course
    <a href="/Course/certificate/{{ $course->id }}" target="_blank">click here</a> to get your certificate
  </div>
  @endisset
</div>

@endsection