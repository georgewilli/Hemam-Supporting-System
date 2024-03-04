@extends('Admin.layouts.app')

@section('con')
<h1 >All the Courses</h1>

<a href="/admin/courses/create" class="btn btn-success">create new course</a>
<br>
<br>
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>ID</td>
			<td>Name</td>
			<td>Videos number</td>
			<td>Description</td>
            <td>Price</td>
			<td>Actions</td>
		</tr>
	</thead>
	<tbody>
		@foreach ($courses as $course)
        <tr>
            <td>{{ $course->id }}</td>
            <td>{{ $course->name }}</td>
            <td>{{ $course->videos_number }}</td>
            <td>{{ $course->descreption }}</td>
            <td>{{ $course->price }}</td>


            <td>


                <form action="/admin/courses/{{ $course->id }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-small btn-danger" type="submit">Delete</button>
                </form>

                <a class="btn btn-small btn-success mb-3" href="/admin/courses/{{ $course->id }}">Show</a>

                <a class="btn btn-small btn-info" href="/admin/courses/{{ $course->id }}/edit">Edit</a>

            </td>
        </tr>
    @endforeach
	</tbody>
</table>

           @endsection