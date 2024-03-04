<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Certificate</title>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aleo:wght@300&display=swap" rel="stylesheet">



</head>

<style>
    .certificate-container {
        background-image: url("{{ public_path('certificate1.png') }}");
        background-size: cover;
        background-position: center;
        height: 500px;
        text-align: center;
        justify-content: center;
        /* padding-top: 25%; */
    }

    .course {
        padding-top: 127.7px;
        text-transform: uppercase;
        font-weight: lighter;
        padding-left: 140px;
        letter-spacing: 1.5px;
        font-size: 18px;
        font-family: 'Aleo', serif;
    }

    .certificate {
        padding-top: 28px;
        font-size: 55px;
        font-family: 'Alex Brush', cursive;

    }
</style>

<body>

    <div class=" certificate-container">

        <div class="course">{{ $course->name }}</div>

        <div class="certificate">{{ $user->name }}</div>
    </div>

</body>

</html>