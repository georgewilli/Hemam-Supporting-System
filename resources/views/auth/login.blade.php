@extends('layouts.app')

@section('content')

<div class="login-body">
    <div class="contain">
      <!-- sign in page -->
      <div class="form-container sign-in-container">
        <form method="POST" action="{{ route('login') }}" class="form login-form" id="login">
          @csrf
          <h1 class="form__title bold">Login</h1>
          <div class="form__input-group">
            <label for="email">Email: </label>
            <input type="email" class="form__input login-input form-control  @error('email') is-invalid @enderror " name="email" id="email" maxlength="50" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
          </div>
          <div class="form__input-group">
            <label for="password">Password: </label>
            <input type="password" class="form__input login-input form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" id="password" >

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
          </div>


          @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
          <div class="form__input-group">
            <button type="submit" class=" form__button login-button">{{ __('Login') }}</button>
          </div>
       </form>
      </div>

     <div class="overlay-container">
          <div class="over">

              <div class="overlay-panel overlay-right">
                  <h1 class="bold">Hello, Dear friend</h1>
                  <p class="par">Enter your personal information  and your case's details and start journey with us</p>
                  <a class="ghost login-button" href="/register" id="signUp">Sign Up</a>
              </div>
          </div>
      </div>
   </div>


  </div>
@endsection
