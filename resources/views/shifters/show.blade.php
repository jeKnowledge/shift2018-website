@extends('layouts.platform')

@section('content')
    <div class="flex dir-row mb-20">
        <div class="fw">
            <div class="header bdb-dark flex dir-row">
                <div class="w-35 mb-20">
                  <figure class="image" style="max-width:320px;">
                      @if(Auth::user()->photoPath != "" && !Auth::user()->hasUrlPhoto())
                          <img src="{{ asset('images/photos/' . Auth::user()->photoPath) }}" alt="">
                      @elseif(Auth::user()->photoPath != "" && Auth::user()->hasUrlPhoto())
                          <img src="{{ Auth::user()->photoPath }}" alt="">
                      @else
                          <img src="{{ asset('images/shift18/shift-placeholder.png') }}" alt="">
                      @endif
                  </figure>
                </div>
                <div class="half ml-20 mb-20 flex al-end">
                    <h3 class="mb-15">{{ $shifter->name }}</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="flex dir-row jus-between form">
        <div class="half">
            <div class='mt-20'>
                <h5>Idade</h5>
                {{ $shifter->age }}
            </div>
            <div class='mt-20'>
                <h5>Localidade</h5>
                {{ $shifter->location }}
            </div>
            <div class='mt-20'>
                <h5>Role</h5>
                {{ $shifter->type }}
            </div>
        </div>
        <div class="half">
            @if($shifter->website != "")
                <div class="mt-20">
                    <h5>Website</h5>
                    {{ $shifter->website }}
                </div>
            @endif
            @if($shifter->twitter != "")
                <div class='mt-20'>
                    <h5>Twitter</h5>
                    {{ $shifter->twitter }}
                </div>
            @endif
            @if($shifter->github != "")
                <div class='mt-20'>
                    <h5>Github</h5>
                    {{ $shifter->github }}
                </div>
            @endif
            <div class='mt-20'>
                <h5>Estudante</h5>
                {{ $shifter->isStudent == true ? 'Sim' : 'Não' }}
            </div>
        </div>
    </div>
    <div class="student {{ (isset($shifter->isStudent) && $shifter->isStudent)  ? '' : 'hide' }} flex dir-row wrap jus-between fw mt-20">
        <div class='half'>
            <div class='mt-20'>
                <h5>Universidade</h5>
                {{ $shifter->university }}
            </div>
        </div>
        <div class='half'>
            <div class='mt-20'>
                <h5>Curso</h5>
                {{ $shifter->course }}
            </div>
        </div>
    </div>
    <div class="not-student {{ (isset($shifter->isStudent) && !$shifter->isStudent) ? '' : 'hide' }} flex dir-row wrap jus-between fw mt-20">
        <div class='half'>
            <div class='mt-20'>
                <h5>Instituição</h5>
                {{ $shifter->institution }}
            </div>
        </div>
        <div class='half'>
            <div class='mt-20'>
                <h5>Função</h5>
                {{ $shifter->role }}
            </div>
        </div>
    </div>
    <div class="flex dir-row form">
        <div class="fw">
            <div class='mt-20'>
                <h5>Bio</h5>
                {{ $shifter->bio }}
            </div>
        </div>
    </div>
@endsection
