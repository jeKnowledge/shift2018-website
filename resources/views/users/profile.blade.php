@extends('layouts.platform') @section('content')

<div class="section">
  <div class="container has-text-centered" style="margin-top: 48px;">
    <div class="tabs is-fullwidth">
      <ul>
        <li>
          <a href="{{ url('platform/profile')}}">
            <span>Profile</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>

<div class="section section-large" id="profile-info">
  <div class="section-left section-text">

    <p class="title is-3">{{ Auth::user()->name }},</p>

    <p class="subtitle is-3"><strong>{{ (Auth::user()->age != 0) ? Auth::user()->age : "SA" }}</strong> years old</p>

    <p class="subtitle is-3" style="margin-top: -24px;">from <strong>{{ (Auth::user()->location != "") ? Auth::user()->location : "ShiftAPPens Land"  }}</strong></p>

    <p class="subtitle is-3"><strong>{{ (Auth::user()->github != "") ? Auth::user()->github : "shiftappens"}}</strong> on Github</p>

    <p class="subtitle is-3" style="margin-top: -24px;"><strong>{{ (Auth::user()->twitter != "") ? Auth::user()->twitter : "shiftappens" }}</strong> on Twitter</p>

    <p class="subtitle is-3" style="margin-top: -24px;">Hosted on <strong><a href="{{ (Auth::user()->website != "") ? Auth::user()->website : "http://shiftappens.com" }}">{{ (Auth::user()->website != "") ? Auth::user()->website : "www.shiftappens.com" }}</a></strong></p>

  </div>

  <div class="section-right section-text">
    <div class="section section-small">
      <div class="section-left">
        <!--
        <p class="subtitle is-4">Shift Coins:</p>
        <p class="title is-3">666</p>
        -->

          <p class="subtitle is-4" style="margin-top: 24px;">Team:</p>
          <p class="title is-3">{{ isset(Auth::user()->team_id ) ? Auth::user()->team()->name: "ShiftAPPens" }}</p>

      </div>
      <div class="section-right">
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
    </div>

    <br>
    <br>

    <a class="button is-black is-fullwidth" id="edit-profile-button">Edit Profile</a>
  </div>

</div>

<div id="edit-profile" class="invisible">
  @include('users._user')
</div>

@if (count($errors) > 0 )
  <script>
    $("#profile-info").addClass("invisible");
    $("#edit-profile").removeClass("invisible");
    $("#edit-profile").addClass("visible");
  </script>
@endif

<script>
  $('#edit-profile-button').click(function() {
    $("#profile-info").addClass("invisible");
    $("#edit-profile").removeClass("invisible");
    $("#edit-profile").addClass("visible");
  });
</script>

@endsection
