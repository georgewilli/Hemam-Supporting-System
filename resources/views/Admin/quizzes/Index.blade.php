@extends('Admin.layouts.app')

@section('con')
<h1 >All the Quizzes</h1>

<a href="/admin/quizzes/create" class="btn btn-success">create new quiz</a>
<br>
<br>
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>ID</td>
            <td>course ID</td>
			<td>Name</td>
			<td>Actions</td>
		</tr>
	</thead>
	<tbody>
		@foreach ($quizzes as $quiz)

        <tr>
            <td>{{ $quiz->id }}</td>
            <td>{{ $quiz->course_id }}</td>
            <td>{{ $quiz->name }}</td>
            <td>


                <form action="/admin/quizzes/{{ $quiz->id }}" method="post" style="display: inline;">
                    @csrf
                    @method('delete')
                    <button class="btn btn-small btn-danger" type="submit">Delete</button>
                </form>

                <a class="btn btn-small btn-success" href="/admin/quizzes/{{ $quiz->id }}">Show</a>

                <a class="btn btn-small btn-info" href="/admin/quizzes/{{ $quiz->id }}/edit">Edit</a>

            </td>
        </tr>
    @endforeach
	</tbody>
</table>

           @endsection