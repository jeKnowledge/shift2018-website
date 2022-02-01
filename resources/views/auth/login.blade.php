@extends('auth.layout')

@section('content')
  <section class="hero is-fullheight section-auth">
    <div class="hero-body">
      <div class="container has-text-centered container-auth">
        <img src="{{ asset('images/shift18/platform/logo-text.svg')}}" class="auth-logo">

        <br>
        <br>

        {{ Form::open(['url' => 'auth/login']) }}

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

        @if ($errors->any())
            @foreach($errors->all() as $error)
                <span class="help-block">
                    <strong>{{ $error }}</strong>
                </span>
            @endforeach
        @endif

        <button class="button is-black is-fullwidth" type="submit">Login</button>

        {{ Form::close() }}

        <br>

        <p class="subtitle is-6" style="margin-bottom: 12px;">or Login with</p>

        <a class="icon is-large" href="{{ url('auth/github') }}">
          <i class="fab fa-github fa-3x" aria-hidden="true"></i>
        </a>
        <a class="icon is-large" href="{{ url('auth/google') }}">
            <i class="fab fa-google fa-3x" aria-hidden="true"></i>
        </a>
        <!-- Commenting this out ehehe not gonna tell you why you sneaky shifter ;)
        <a class="icon is-large" href="{{ url('auth/facebook') }}">
            <i class="fab fa-facebook-square fa-3x" aria-hidden="true"></i>
        </a>
        -->

        <p class="subtitle is-6" style="margin-top: 24px;">Register <strong><a href='{{ url('auth/register') }}' style="color: black;">here</a></strong>.</p>
        <p class="subtitle is-6" style="margin-top: -20px;"><strong><a href='{{ url('auth/password/reset') }}' style="color: black;">Forgot your password?</a></strong></p>

      </div>
    </div>
  </section>

@endsection
