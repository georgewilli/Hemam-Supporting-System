@extends('Admin.layouts.app')

@section('con')

<form action="/admin/courses"enctype="multipart/form-data" method="POST" class="col-7">
    @csrf
    <h1>Create a new course</h1>
    @if ($errors->any())

    @foreach ($errors->all() as $error)
    <div class="alert alert-danger" role="alert">{{ $error }}</div>
    @endforeach

  @endif
    <div class="form-group">
      <label for="name">name</label>
      <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp">
    </div>

    <div class="form-group">
      <label for="Descreption">Description</label>
      <input type="text" name="descreption" class="form-control" id="Descreption">
    </div>

    <div class="form-group">
        <label for="price">price</label>
        <input type="text" name="price" class="form-control" id="price">
      </div>



      <div class=" form-group input-group ">
  <div class="custom-file ">

    <input type="file" class="custom-file-input form-control" name="image_path" id="myInput">
    <label class="custom-file-label" for="myInput">Choose file</label>
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