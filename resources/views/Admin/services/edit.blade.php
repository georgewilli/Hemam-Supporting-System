@extends('Admin.layouts.app')

@section('con')
<h1>Update service</h1>
<form action="/admin/services/{{ $services->id }}" method="POST">
    @csrf
    @method('PUT')
    @if ($errors->any())

    @foreach ($errors->all() as $error)
    <div class="alert alert-danger" role="alert">{{ $error }}</div>
    @endforeach

  @endif
    <div class="form-group">
      <label for="title">Title</label>
      <input value="{{ $services->title }}" type="text" name="title" class="form-control" id="title" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
        <label for="inputGroupSelect01">Course</label>
        <select class="custom-select" id="inputGroupSelect01"  name="type">
    <option value="" selected disabled>Choose...</option>

    <option value="hospital">hospital</option>
    <option value="school">school</option>
    <option value="rehab">rehab</option>


  </select>
      </div>
    <div class="form-group">
      <label for="Description">Description</label>
      <input value="{{ $services->description }}" type="text" name="description" class="form-control" id="Description">
    </div>
    <div class="form-group">
        <label for="url">URL</label>
        <input value="{{ $services->url }}" type="text" name="url" class="form-control" id="url">
      </div>
      <div class="form-group">
        <label for="district">District</label>
        <input value="{{ $services->district }}" type="text" name="district" class="form-control" id="district">
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection