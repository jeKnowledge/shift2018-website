@extends('layouts.platform')

@section('content')

{{ Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put']) }}

    {{ Form::hidden('action', 'change_password') }}


<div class="section section-large">
  <div class="section-left section-text">
      <h1 class="title is-3"><span class="mopster">Hi! -</span> Change your password below</h1>

      <div class="field">
        <label class="label">Old Password</label>
        <div class="control">
          {{ Form::password('old_password', ['placeholder' => "shiftappens17", 'class' => 'input', 'required' => '']) }}
        </div>
      </div>

      <div class="field">
        <label class="label">New Password</label>
        <div class="control">
          {{ Form::password('password', ['placeholder' => "shiftappens18", 'class' => 'input', 'required' => '']) }}
        </div>
      </div>

      <div class="field">
        <label class="label">Confirm Password</label>
        <div class="control">
          {{ Form::password('password_confirmation', ['placeholder' => "shiftappens18", 'class' => 'input', 'required' => '']) }}
        </div>
      </div>

      <br>

      {{ Form::submit('Alterar Password', ['class' => 'button is-black is-fullwidth']) }}
      {{ Form::close() }}
  </div>

  <div class="section-right section-text">


  </div>
</div>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection
