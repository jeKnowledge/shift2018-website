@extends('auth.layout')

@section('content')

  <section class="hero is-fullheight section-auth">
    <div class="hero-body">
      <div class="container has-text-centered container-auth">
        <img src="{{ asset('images/shift18/platform/logo-text.svg')}}" class="auth-logo">

        <br>
        <br>

        {{ Form::open(['url' => 'auth/password/email']) }}

        <div class="field">
          <div class="control">
            <input class="input" type="email" name="email" value="{{ old('email') }}" placeholder="E-mail" required onkeyup="this.setAttribute('value', this.value);">
          </div>
        </div>

        <button class="button is-black is-fullwidth" type="submit">Send Reset Link</button>

        {{ Form::close() }}
        @if (count($errors) > 0)
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <p class="subtitle is-6" style="margin-top: 24px;">Already registered?</p>
        <p class="subtitle is-6" style="margin-top: -20px;">Login <strong><a href='{{ url('auth/login') }}' style="color: black;">here</a></strong>.</p>

      </div>
    </div>
  </section>

@endsection
