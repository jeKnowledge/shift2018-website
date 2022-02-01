@extends('layouts.platform')

@section('content')
<div class="section">
  <div class="container has-text-centered" style="margin-top: 48px;">
    <div class="tabs is-fullwidth">
      <ul>
        <li><a id="user_index_tab"><span>Profile</span></a></li>

        @if (Auth::user()->currentTeam())
        <li><a id="team_index_tab"><span>My Team's Profile</span></a></li>
        <script src="/js/team/index.js"></script>
        <script src="/js/team/edit.js"></script>
        @endif

        @if (!Auth::user()->currentTeam() && Auth::user()->isShifter())
        <li><a id="team_create_tab"><span>Create a Team</span></a></li>
        <li><a id="team_join_tab"><span>Join a Team</span></a></li>
        <script src="/js/team/create.js"></script>
        <script src="/js/team/join.js"></script>
        @endif
      </ul>
    </div>
  </div>
</div>

@include('user.components.user_index_content')

@include('user.components.user_edit_content')

@include('user.components.user_change_password_content')

@if (Auth::user()->currentTeam())
@include('user.components.team_index_content')
@endif

@if (!Auth::user()->currentTeam() && Auth::user()->isShifter())
@include('user.components.team_create_content')
@include('user.components.team_join_content')
@endif

<script src="/js/user/index.js"></script>
<script src="/js/team/modal_handler.js"></script>
@endsection
