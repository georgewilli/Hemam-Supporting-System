@extends('Admin.layouts.app')

@section('con')
<h1>All the services</h1>
<a href="/admin/services/create" class="btn btn-success">create new service</a>
<br>
<br>

<table class="table table-striped table-bordered">

	<thead>
		<tr>
			<td>ID</td>
			<td>Title</td>
			<td>Type</td>
			<td>Description</td>
            <td>District</td>
            <td>URL</td>
			<td>Actions</td>
		</tr>
	</thead>
	<tbody>
		@foreach ($services as $service)
        <tr>
            <td>{{ $service->id }}</td>
            <td>{{ $service->title }}</td>
            <td>{{ $service->type }}</td>
            <td>{{ $service->description }}</td>
            <td>{{ $service->district }}</td>
            <td><a href="{{ $service->url }}">{{ $service->url }}</a></td>

            <td>


                <form action="/admin/services/{{ $service->id }}" method="post" >
                    @csrf
                    @method('delete')
                    <button class="btn btn-small btn-danger" type="submit">Delete</button>
                </form>

                <a class="btn btn-small btn-success mb-3 " href="/admin/services/{{ $service->id }}">Show</a>

                <a class="btn btn-small btn-info" href="/admin/services/{{ $service->id }}/edit">Edit</a>

            </td>
        </tr>
    @endforeach
	</tbody>
</table>
           @endsection