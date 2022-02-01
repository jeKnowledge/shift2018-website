@extends('layouts.platform')

@section('content')
  <div class="section section-large">
    <div class="section-left section-text">
        <h3>Candidatura</h3>
        <p>Nome: {{$application->user->name}}</p>
        <p>Idade: {{$application->user->age}}</p>
        <p>Localidade: {{$application->user->location}}</p>
        <p>Contacto: {{ $application->user->phoneNumber }}
        <p>Função: {{$application->user->type}}</p>
        @if($application->user->isStudent == true)
            <p>Estudante: Sim</p>
            <p>Universidade: {{$application->user->university}}</p>
            <p>Curso: {{$application->user->course}}</p>
        @else
            <p>Estudante: Não</p>
            <p>Instituição: {{$application->user->institution}}</p>
            <p>Function: {{$application->user->function}}</p>
        @endif
        <p>Bio: {{$application->user->bio}}</p>
        <p>Pitch: {{$application->pitch}}</p>
        <p>Skills:
         @foreach($application->user->skills()->get() as $skill)
                {{$skill->name}}
            @endforeach
        </p>
        <p>T-shirt: {{$application->tshirt}}</p>
        <p>Primeira vez: {{$application->isFirstTime}}</p>
        <p>Twitter: {{$application->user->twitter}}</p>
        <p>Github: {{$application->user->github}}</p>
        <p>Website: {{$application->user->website}}</p>
        <p>Portefolio: {{$application->user->portefolio}}</p>
        <p>URLs úteis: {{$application->urls}}</p>
        <p>Comentários úteis: {{$application->comments}}</p>
        @if(Auth::user()->isAdmin())
              <div>
                  {{Form::model($application, ['route' => ['applications.evaluate', $application->id], 'method' => 'put'])}}
                      {{Form::hidden('isAccepted', '1')}}
                      {{Form::submit('Aceitar Candidatura', ['class' => 'button flex'])}}
                  {{Form::close()}}
                  {{Form::model($application, ['route' => ['applications.evaluate', $application->id], 'method' => 'put'])}}
                      {{Form::hidden('isAccepted', '0')}}
                      {{Form::submit('Rejeitar Candidatura', ['class' => 'button flex button-border'])}}
                  {{Form::close()}}
              </div>
        @elseif(Auth::user()->isUser() && $application->isAccepted == null)
            <br>
            <a href="{{route('applications.create')}}" class="button">Editar candidatura</a>
        @endif
        </div>
      </div>
@endsection
