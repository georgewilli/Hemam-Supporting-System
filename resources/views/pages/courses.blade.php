@extends('layouts.app')

@section('content')
@isset($error)

<div class="alert alert-danger" role="alert">{{ $error }}</div>

@endisset
@isset($message)
<div class="alert alert-success" role="alert">
	{{ $message }}
</div>
@endisset


<div class="body-bg">
	@foreach ($courses as $course)

	<div id="container">
		<div class="product-details">
			<h1>{{ $course->name }} </h1>
			<br><br><br>
			<p class="information">" {{ $course->descreption }} "</p>
			<form class="control" action="/Courses/submit/{{ $course->stripe_id }}" method="POST" target="_blank">
				@csrf
				@method('GET')

				<button class="btn btn-buy " type="submit">
					<span class="price">${{ $course->price }}</span>
					<span class="shopping-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
					<span class="buy">Subiscribe</span>
				</button>
			</form>
		</div>
		<div class="product-image">
			<img src="/images/{{ $course->image_path }}" alt="{{ $course->name }}">
			<div class="info">
				<h2> Description</h2>
				<ul>
					<li><strong>NO.of videos : </strong>{{ $course->videos_number }}</li>
					<li><strong>Video duration </strong> 5 to 10 mins</li>
					<li><strong> Exams</strong> one test of 20 questions</li>
					<li><strong>Certificats </strong> faundementals of communication</li>

				</ul>
			</div>
		</div>

	</div>
	@endforeach
</div>
@endsection