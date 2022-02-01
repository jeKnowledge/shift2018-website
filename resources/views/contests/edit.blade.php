@extends('layouts.platform')

@section('content')

    {{ Form::model($contest, ['route' => ['contests.update', $contest->id], 'method' => 'put']) }}
    {{ Form::hidden('name',$contest->name) }}
    <section class="modal-card-body">
        <div class="field">
            <label class="label">Name</label>
            <div class="alert alert-danger"></div>
            <div class="error">{{ $errors->first('name') }}</div>
            <div class="control">
              {{ Form::textarea('name', $contest->name, ['placeholder' => "Name your awesome challenge", 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'input']) }}
            </div>
        </div>

        <div class="field">
            <label class="label">Description</label>
            <div class="alert alert-danger"></div>
            <div class="error">{{ $errors->first('description') }}</div>
            <div class="control">
              {!! Form::textarea('description', $contest->description, ['placeholder' => "Describe your awesome challenge", 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'input']) !!}
            </div>
        </div>

        <div class="field">
            <label class="label">Documentation</label>
            <div class="alert alert-danger"></div>
            <div class="error">{{ $errors->first('documentation') }}</div>
            <div class="control">
              {{ Form::text('documentation', $contest->documentation, ['placeholder' => "Any useful doc?", 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'input']) }}
            </div>
        </div>

        <div class="field">
            <label class="label">Prize 🏆</label>
            <div class="alert alert-danger"></div>
            <div class="error">{{ $errors->first('prize') }}</div>
            <div class="control">
              {{ Form::text('prize', $contest->prize, ['placeholder' => "This one is for winners", 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'input']) }}
            </div>
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
