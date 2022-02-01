@extends('auth.layout')

@section('content')
  <section class="hero is-fullheight section-auth">
    <div class="hero-body">
      <div class="container has-text-centered container-auth">
        <img src="{{ asset('images/shift18/platform/logo-text.svg')}}" class="auth-logo">

        <br>
        <br>

        {{ Form::open(['url' => 'auth/register']) }}

        <div class="field">
          <div class="control">
            <input class="input" type="name" name="name" value="" placeholder="Name" required onkeyup="this.setAttribute('value', this.value);">
          </div>
        </div>
        <div class="field">
          <div class="control">
            <input class="input" type="email" name="email" value="{{ old('email') }}" placeholder="E-mail" required onkeyup="this.setAttribute('value', this.value);">
          </div>
        </div>

        <div class="field">
          <div class="control">
            <input class="input" type="password" name="password" value="" placeholder="Password" required onkeyup="this.setAttribute('value', this.value);">
          </div>
        </div>

        <div class="field">
          <div class="control">
            <input class="input" type="password" name="password_confirmation" value="" placeholder="Confirm Password" required onkeyup="this.setAttribute('value', this.value);">
          </div>
        </div>

        <button class="button is-black is-fullwidth" type="submit">Register</button>

        {{ Form::close() }}

        <br>

        <p class="subtitle is-6" style="margin-bottom: 12px;">or Login with</p>

        <a class="icon is-large" href="{{ url('auth/github') }}">
          <i class="fab fa-github fa-3x" aria-hidden="true"></i>
        </a>
        <a class="icon is-large" href="{{ url('auth/google') }}">
            <i class="fab fa-google fa-3x" aria-hidden="true"></i>
        </a>
        <a class="icon is-large" href="{{ url('auth/facebook') }}">
            <i class="fab fa-facebook-square fa-3x" aria-hidden="true"></i>
        </a>

        <p class="subtitle is-6" style="margin-top: 24px;">Already registered?</p>
        <p class="subtitle is-6" style="margin-top: -20px;">Login <strong><a href='{{ url('auth/login') }}' style="color: black;">here</a></strong>.</p>

      </div>
    </div>
  </section>

@endsection
