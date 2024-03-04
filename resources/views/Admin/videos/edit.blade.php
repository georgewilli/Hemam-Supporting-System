@extends('Admin.layouts.app')

@section('con')
<h1>Edit Video</h1>
<form action="/admin/videos/{{ $video->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @if ($errors->any())

    @foreach ($errors->all() as $error)
    <div class="alert alert-danger" role="alert">{{ $error }}</div>
    @endforeach

  @endif
  <div class="form-group">
      <label for="name">name</label>
      <input value="{{ $video->video_name }}" type="text" name="video_name" class="form-control" id="name" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
        <label for="inputGroupSelect01">Course</label>
        <select class="custom-select" id="inputGroupSelect01"  name="course_id">
    @foreach ($courses as $course)
    <option value="{{ $course->id }}" {{ ( $course->id == $video->course_id ) ? 'selected' : '' ; }}>{{ $course->name }}</option>
   @endforeach
  </select>
      </div>
    <div class="form-group">
      <label for="Descreption">Description</label>
      <input value="{{ $video->description }}" type="text" name="description" class="form-control" id="Descreption">
    </div>
    <div class=" form-group input-group ">
  <div class="custom-file ">

    <input value=" {{ asset('videos/$video->video_path') }}" type="file" class="custom-file-input form-control" name="video_path" id="myInput" >
    <label class="custom-file-label" for="myInput">{{ $video->video_path }}</label>
  </div>

</div>


    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  <script>
  document.querySelector('.custom-file-input').addEventListener('change',function(e){
  var fileName = document.getElementById("myInput").files[0].name;
  var nextSibling = e.target.nextElementSibling
  nextSibling.innerText = fileName
})
</script>
@endsection