@extends('layouts.platform')

@section('content')

    <h3>New Partner</h3>

    {{ Form::open(['action' => 'PartnersController@store']) }}

        <div>

            {{ Form::label('Name:') }}
            {{ Form::text('name') }}

        </div>

        <div>

            {{ Form::label('E-mail') }}
            {{ Form::email('email') }}

        </div>

        <div>

            {{Form::label('Password') }}
            {{Form::password('password', ['class' => 'awesome']) }}

        </div>

        </div>

        <div>

            {{ Form::label('Website:') }}
            {{ Form::text('website') }}

        </div>

        <div>
            {{ Form::submit("Guardar", ['class' => 'button']) }}
        </div>

    {{ Form::close() }}

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
