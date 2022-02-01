{{ Form::open(['route' => ['user.update', Auth::user()], 'method' => 'put',
    'id' => 'user_change_password_content'
  ])
}}
<div class="section section-large">
  <div class="section-left section-text">
      <h1 class="title is-3"><span class="mopster">Hi! -</span> Change your password below</h1>

      <div class="field">
        <label class="label">Old Password</label>
        <div id="user_old_password_alert" class="alert alert-danger"></div>
        <div class="control">
          {{ Form::password('old_password', ['placeholder' => "shiftappens17", 'class' => 'input']) }}
        </div>
      </div>

      <div class="field">
        <label class="label">New Password</label>
        <div id="user_password_alert" class="alert alert-danger"></div>
        <div class="control">
          {{ Form::password('password', ['placeholder' => "shiftappens18", 'class' => 'input']) }}
        </div>
      </div>

      <div class="field">
        <label class="label">Confirm Password</label>
        <div id="user_password_confirmation_alert" class="alert alert-danger"></div>
        <div class="control">
          {{ Form::password('password_confirmation', ['placeholder' => "shiftappens18", 'class' => 'input']) }}
        </div>
      </div>

      <br>

      {{ Form::submit('Alterar Password', ['class' => 'button is-black is-fullwidth']) }}
  </div>

  <div class="section-right section-text">


  </div>
</div>

{{ Form::close() }}
