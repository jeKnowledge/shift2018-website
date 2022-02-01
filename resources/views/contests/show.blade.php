@extends('layouts.platform')

@section('content')

<style media="screen">
  .section-cards{
    padding-top:48px !important;
    padding-bottom:48px !important;
    width: 100%;
    padding-left: 24px !important;
    padding-right: 24px !important;
    display: flex;
    justify-content: center;
  }
  .card {
    margin: 12px;
    width:calc(100% / 6);
    box-sizing:border-box;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }
  .card-image {
    display: flex;
    justify-content: center;
    align-items: center;
  }
  @media only screen and (max-width: 850px) {
    .card {
      width:calc(100% / 4);
      box-sizing:border-box;
    }
  }
  @media only screen and (max-width: 600px) {
    .card {
      width:calc(100% / 2);
      box-sizing:border-box;
    }
  }
  @media only screen and (max-width: 420px) {
    .card {
      width:calc(100% / 1);
      box-sizing:border-box;
    }
    .section-cards{
      padding-left: 0px !important;
      padding-right: 0px !important;
    }
  }
</style>

        @if (Auth::user()->isAdmin()) 
          <h3><strong>Contest</strong></h3>

          <p>Name:{{ $contest->name }}<p>
          {{ Form::model($contest, ['route' => ['contests.destroy', $contest->id], 'method' => 'delete']) }}

              <div>
                  {{ Form::submit('Eliminar Contest', ['class' => 'button']) }}
              </div>

          {{ Form::close() }}
        @endif 
        
        <h1><b>Signed Teams</b></h1>
        <?php $teams_signed = $contest->teams()->get(); ?>
      <div class="section section-small visible section-cards" id="bio-section">
        @foreach ($teams_signed as $team)
              <div class="card" style="">
                  <div class="card-image" style="min-height:280px;">
                      <figure class="image" style="width:85%;" >
                      @if ($team->logoPath != "")
                          <img src="{{ asset('images/photos/' . $team->logoPath) }}" alt="">
                      @else
                          <img src="{{ asset('images/shift18/platform/default_team.png') }}" alt="">
                      @endif
                  </figure>
              </div>
              <div class="card-header-title">
                <div class="title has-text-centered is-5">
                  <a href="{{ route('team.show', ['team' => $team->id]) }}">{{ $team->name }}</a>
                </div>
              </div>
          </div>
        @endforeach

@endsection
