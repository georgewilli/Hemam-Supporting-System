@extends('Admin.layouts.app')

@section('con')

<form action="/admin/services" method="POST" class="col-7">
    @csrf
    <h1>Create a new service</h1>
    @if ($errors->any())

    @foreach ($errors->all() as $error)
    <div class="alert alert-danger" role="alert">{{ $error }}</div>
    @endforeach

  @endif
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" name="title" class="form-control" id="title" aria-describedby="emailHelp">
    </div>
    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
      <input type="text" name="description" class="form-control" id="Description">
    </div>
    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    <div class="form-group">
        <label for="url">URL</label>
        <input type="text" name="url" class="form-control" id="url">
      </div>
      @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
      <div class="form-group">
        <label for="district">district</label>
        <input type="text" name="district" class="form-control" id="district">
      </div>
      @if ($errors->has('district'))                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('district') }}</strong>
                                    </span>
                                @endif





    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection