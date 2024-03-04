@extends('Admin.layouts.app')

@section('con')
<h1 >All the Videos of {{ $course->name }} </h1>

<a href="/admin/videos/create" class="btn btn-success">create new video</a>
<br>
<br>
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>ID</td>
            <td>course ID</td>
			<td>Name</td>
			<td>Description</td>
            <td>Video URL</td>
			<td>Actions</td>
		</tr>
	</thead>
	<tbody>
		@foreach ($videos as $video)

        <tr>
            <td>{{ $video->id }}</td>
            <td>{{ $video->course_id }}</td>
            <td>{{ $video->video_name }}</td>
            <td>{{ $video->description }}</td>
            <td><a href="/admin/videos/show/{{ $video->video_path }}">{{ $video->video_path }}</a></td>

            <td>


                <form action="/admin/videos/{{ $video->id }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-small btn-danger" type="submit">Delete</button>
                </form>

                <a class="btn btn-small btn-success mb-3" href="/admin/videos/{{ $video->id }}">Show</a>

                <a class="btn btn-small btn-info" href="/admin/videos/{{ $video->id }}/edit">Edit</a>

            </td>
        </tr>
    @endforeach
	</tbody>
</table>

           @endsection