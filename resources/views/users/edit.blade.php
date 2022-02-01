@extends('layouts.platform')

@section('content')
  <div class="section section-large">
    <div class="section-left section-text">
        {{ Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put']) }}
            <div class="field">
                {!! Form::label('Nome'); !!}
                {!! Form::text('name', $value = $user->name, ['class' => 'input']); !!}
            </div>
            <div class="field">
                {!! Form::label('E-mail'); !!}
                {!! Form::email('email', $value = $user->email, ['class' => 'input']); !!}

            </div>
            <div class="field">
                {!! Form::label('Student'); !!}
                <br>
                @if(isset(Auth::user()->isStudent))
                    {{ Form::radio('isStudent', 1, Auth::user()->isStudent, ['class' => 'radio']) }} Yes
                    {{ Form::radio('isStudent', 0, !Auth::user()->isStudent, ['class' => 'radio']) }} No
                @else
                    {{ Form::radio('isStudent', 1, null, ['class' => 'radio']) }} Yes
                    {{ Form::radio('isStudent', 0, null, ['class' => 'radio']) }} No
                @endif
            </div>
            <div class="field">
                {!! Form::label('University'); !!}
                {!! Form::text('university', $value = $user->university, ['class' => 'input']); !!}
            </div> 
            <div class="field">
                {!! Form::label('Course'); !!}
                {!! Form::text('course', $value = $user->course, ['class' => 'input']); !!}
            </div> 
            <div class="field">
                {!! Form::label('Institution'); !!}
                {!! Form::text('institution', $value = $user->institution, ['class' => 'input']); !!}
            </div> 
            <div class="field">
                {!! Form::label('Role'); !!}
                {!! Form::text('type', $value = $user->type, ['class' => 'input']); !!}
            </div> 
             <div class="field">
                {!! Form::label('Location'); !!}
                {!! Form::text('location', $value = $user->location, ['class' => 'input']); !!}
            </div> 
            <div class="field">
                {!! Form::label('Bio'); !!}
                {!! Form::textarea('bio', $value = $user->bio, ['class' => 'input']); !!}
            </div> 
            <div class="field">
                {!! Form::label('Phone'); !!}
                {!! Form::text('phoneNumber', $value = $user->phoneNumber, ['class' => 'input']); !!}
            </div> 
            <div class="field">
                {!! Form::label('Twitter'); !!}
                {!! Form::text('twitter', $value = $user->twitter, ['class' => 'input']); !!}
            </div> 
            <div class="field">
                {!! Form::label('Github'); !!}
                {!! Form::text('github', $value = $user->github, ['class' => 'input']); !!}
            </div> 
            <div class="field">
                {!! Form::label('Website'); !!}
                {!! Form::text('website', $value = $user->website, ['class' => 'input']); !!}
            </div> 
            <div class="field">
                {!! Form::submit('Editar', ['class' => 'button']); !!}
            </div> 
        {!! Form::close() !!} 
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
      </div>
    </div>
@endsection
