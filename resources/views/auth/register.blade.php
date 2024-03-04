@extends('layouts.app')

@section('content')
<div class="login-body">
<div class="contain" id="container" style="padding: 20px;">
      <div class="form-container sign-in-container">
        <form method="POST" action="{{ route('register') }}" class="form login-form" id="login">
            @csrf
          <h1 class="form__title bold">Sign up</h1>
          <div class="form__input-group">
            <label for="name">Name: </label>
            <input type="text" class="login-input form-control form__input @error('name') is-invalid @enderror" id="name" maxlength="20" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
          </div>
          <div class="form__input-group">
            <label for="username"> email </label>
            <input type="email" class="login-input form-control form__input @error('email') is-invalid @enderror" id="email" maxlength="100" name="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
          </div>
          <div class="form__input-group">
            <label for="pass">Password: </label>
            <input type="password" class="login-input form-control form__input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"id="pass" maxlength="20" >
            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
          </div>
          <div class="form__input-group">
            <label for="pass"> confirm Password: </label>
            <input type="password" class="login-input form-control form__input" name=" password_confirmation" id="con pass" maxlength="20" required autocomplete="new-password">
          </div>


         <button class="login-button form__button" type="submit">Submit</button>
       </form>
          <div class="form__input-group">
            <button type="submit" class="login-button form__button">Submit</button>
          </div>
       </form>
      </div>

     <!--  create account page -->

     <div class="overlay-container">
          <div class="over">
              <div class="overlay-panel overlay-left">
                  <h1 class="bold">Welcome Back!</h1>
                  <p class="par">Please login with your personal info</p>
                  <button class="login-button ghost" id="signIn">Sign In</button>
              </div>
              <div class="overlay-panel overlay-right">
                  <h1 class="bold">Hello, Dear friend</h1>
                  <p class="par">if you are aleady signned up with us please log in with your username and password</p>
                  <a class="login-button ghost" href="/login" id="log in" >Log in</a>
              </div>
          </div>
      </div>
   </div>
</div>
@endsection
