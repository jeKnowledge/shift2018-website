@extends('auth.layout')

@section('content') 
  <section class="hero is-fullheight section-auth">
    <div class='hero-body'>
        <div class='container has-text-centered container-auth'>
          <img src="{{ asset('images/shift18/platform/logo-text.svg')}}" class="auth-logo">

        <br>
        <br>
          {{ Form::open(['url' => 'auth/password/reset']) }}
          <input type="hidden" name="token" value="{{ $token }}">
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
              <input class="input" type="password" name="password_confirmation" value="" placeholder="Password Confirmation" required onkeyup="this.setAttribute('value', this.value);">
            </div>
          </div>

        <button class="button is-black is-fullwidth" type="submit">Reset Password</button>
          {{ Form::close() }}
          @if ($errors->any())
              @foreach($errors->all() as $error)
                  <span class="help-block">
                      <strong>{{ $error }}</strong>
                  </span>
              @endforeach
          @endif

      <br> 
    </div>
  </section>
@endsection
