@extends('Admin.layouts.app')

@section('con')
<h1 >All the Questions</h1>

<a href="/admin/questions/create" class="btn btn-success">create new question</a>
<br>
<br>
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>ID</td>
            <td>course ID</td>
			<td>question head</td>
			<td>options</td>
            <td>answer</td>
			<td>Actions</td>
		</tr>
	</thead>
	<tbody>
		@foreach ($questions as $question)

        <tr>
            <td>{{ $question->id }}</td>
            <td>{{ $question->course_id }}</td>

            <td>{{ $question->question_head }}</td>
            <td><ul><li>
            True
            </li>
            <li>
            False
            </li>
            @isset($question->third_option)

            <li>
            {{ $question->third_option }}
            </li>
            @endisset
            @isset($question->fourth_option)

            <li>
            {{ $question->fourth_option }}
            </li>@endisset

        </ul></td>
        <td>{{ $question->answer }}</td>
            <td>


                <form action="/admin/questions/{{ $question->id }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-small btn-danger" type="submit">Delete</button>
                </form>

                <a class="btn btn-small btn-success mb-3" href="/admin/questions/{{ $question->id }}">Show</a>

                <a class="btn btn-small btn-info" href="/admin/questions/{{ $question->id }}/edit">Edit</a>

            </td>
        </tr>
    @endforeach
	</tbody>
</table>

           @endsection