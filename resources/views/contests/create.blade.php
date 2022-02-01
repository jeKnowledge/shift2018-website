@extends('layouts.platform')

@section('content')

    <div class="section section-large">
        <div class="section-left section-text">
            <h3>New Challenge </h3>

            {{ Form::open(['action' => 'ContestsController@store']) }}

                <div>

                    {{ Form::label('Name:') }}
                    {{ Form::text('name') }}

                </div>

                <div>

                    {{ Form::label('Description:') }}
                    {{ Form::textarea('description') }}

                </div>

                <div>

                    {{ Form::label('Documentation:') }}
                    {{ Form::text('documentation') }}

                </div>

                <div>

                    {{ Form::label('Prize:') }}
                    {{ Form::text('prize') }}

                </div>

                <div>

                    {{ Form::label('Partner:') }}
                    {{ Form::text('partner_id') }}

                </div>

                <div>
                    {{ Form::submit("Guardar", ['class' => 'button']) }}
                </div>

            {{ Form::close() }}

        </div>
        <div class="section-right section-text">
            
        <table class="table fw">
          <thead>
            <tr>
                <td>ID </td>
                <td>Name </td>
                <td></td>
                <td>&nbsp;</td>
            </tr>
          </thead>
          <tbody>
            @foreach ($partners as $partner)
                <tr>
                    <td>{{ $partner->id }}</td>
                    <td>{{ $partner->name }}</td>
                </tr>
            @endforeach
          </tbody>
      </table>
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
