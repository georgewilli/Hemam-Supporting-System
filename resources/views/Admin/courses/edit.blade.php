@extends('Admin.layouts.app')

@section('con')
<h1>Update Course</h1>
<form action="/admin/courses/{{ $courses->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @if ($errors->any())

    @foreach ($errors->all() as $error)
    <div class="alert alert-danger" role="alert">{{ $error }}</div>
    @endforeach

  @endif
    <div class="form-group">
      <label for="name">Name</label>
      <input value="{{ $courses->name }}" type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp">
    </div>

    <div class="form-group">
      <label for="Description">Description</label>
      <input value="{{ $courses->descreption }}" type="text" name="descreption" class="form-control" id="Description">
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input value="{{ $courses->price }}" type="text" name="price" class="form-control" id="price">
      </div>
      <div class=" form-group input-group ">
  <div class="custom-file ">

    <input type="file" class="custom-file-input form-control" name="image_path" id="myInput">
    <label class="custom-file-label" for="myInput">{{ $courses->image_path }}</label>
  </div>

</div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection