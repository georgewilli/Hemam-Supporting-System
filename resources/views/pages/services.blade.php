@extends('layouts.app')

@section('content')
<div class="big-box">
    <a href="/services/hospital">
        <div class="box hospital">
            <div class="icon"><i class="fa-solid fa-house-medical"></i></div>
            <div class="content">
                <h3>Hospitals</h3>
                <p>We are presenting to you a wide number of hospitals around the aria and districs of cairo in order
                    for you to find the nearest and the most sutable option.</p>
            </div>
        </div>
    </a>

    <a href="/services/school">
        <div class="box school">
            <div class="icon"><i class="fa-solid fa-school"></i></div>
            <div class="content">
                <h3>Schools</h3>
                <p>We are presenting to you a wide number of schools around the aria and districs of cairo in order for
                    you to find the nearest and the most sutable option.</p>
            </div>
        </div>
    </a>

    <a href="/services/rehab">
        <div class="box rehaps">
            <div class="icon"><i class="fa-solid fa-hands-holding-child"></i></div>
            <div class="content">
                <h3>Rehabs</h3>
                <p>We are presenting to you a wide number of rehabs around the aria and districs of cairo in order for
                    you to find the nearest and the most sutable option.</p>
            </div>
        </div>
    </a>
</div>

@endsection