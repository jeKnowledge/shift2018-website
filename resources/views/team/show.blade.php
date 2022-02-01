@extends ('layouts.platform')

@section ('content')

<script>$('#team_update').on('submit', ev => ev.preventDefault())</script>
<div class="section section-large" id="team_index_content">
  <div class="section-left section-text">
    <div class="columns">
      <div class="column is-two-thirds">
        <p id="team_name" class="title is-3">{{ $team->name }}</p>
      </div>

      <div class="column is-one-third">
        <div class="team-logo-section">
          {{ Form::label("team_logo", "Team Logo", [ "class" => "label" ]) }}

          <div class="team-logo">
            <figure class="image">
              @if($team->logoPath != "")
                <img id="team_logo_image" src="{{ '/images/teams/' . $team->logoPath }}" alt="">
              @else
                <img id="team_logo_image" src="/images/shift18/platform/default_team.png" alt="">
              @endif

            </figure>
          </div>
        </div>
      </div>
    </div>

    <div class="columns">
      <div class="column">
        <div class="members">
          <label class="label">Members</label>

          @include("user.components.team_search_shifters_modal")
        </div>

        <!--Members of this team-->
        <div class="columns">
          <div class="column">
            <div class="columns">
              <div class="column" style="display: inline-flex; padding: 0">
                @include("user.components.profile_card", [
                  "photoPath" => ($shifters[0] !== null && ($shifters[0]->photoPath != ""))
                    ? $shifters[0]->photoPath : "/images/shift18/platform/default_profile.png",
                  "name" => $shifters[0] !== null ? 
                    ($shifters[0]["invited"] ? $shifters[0]->name . " - Invited" : $shifters[0]->name) 
                    : "Empty Slot",
                  "id" => "card0",
                  "fixed" => $shifters[0] !== null ? 1 : 0,
                  "shifter_id" => $shifters[0] !== null ? $shifters[0]->id : -1
                ])

                @include("user.components.profile_card", [
                  "photoPath" => ($shifters[1] !== null && $shifters[1]->photoPath != "")
                    ? $shifters[1]->photoPath : "/images/shift18/platform/default_profile.png",
                  "name" => $shifters[1] !== null ? 
                    ($shifters[1]["invited"] ? $shifters[1]->name . " - Invited" : $shifters[1]->name) 
                    : "Empty Slot",
                  "id" => "card1",
                  "fixed" => $shifters[1] !== null ? 1 : 0,
                  "shifter_id" => $shifters[1] !== null ? $shifters[1]->id : -1
                ])
              </div>
            </div>
          </div>

          <div class="column">
            <div class="columns">
              <div class="column" style="display: inline-flex; padding: 0">
                @include("user.components.profile_card", [
                  "photoPath" => ($shifters[2] !== null && $shifters[2]->photoPath != "")
                    ? $shifters[2]->photoPath : "/images/shift18/platform/default_profile.png",
                  "name" => $shifters[2] !== null ? 
                    ($shifters[2]["invited"] ? $shifters[2]->name . " - Invited" : $shifters[2]->name) 
                    : "Empty Slot",
                  "id" => "card2",
                  "fixed" => $shifters[2] !== null ? 1 : 0,
                  "shifter_id" => $shifters[2] !== null ? $shifters[2]->id : -1,
                ])

                @include("user.components.profile_card", [
                  "photoPath" => ($shifters[3] !== null && $shifters[3]->photoPath != "")
                    ? $shifters[3]->photoPath : "/images/shift18/platform/default_profile.png",
                  "name" => $shifters[3] !== null ? 
                    ($shifters[3]["invited"] ? $shifters[3]->name . " - Invited" : $shifters[3]->name) 
                    : "Empty Slot",
                  "id" => "card3",
                  "fixed" => $shifters[3] !== null ? 1 : 0,
                  "shifter_id" => $shifters[3] !== null ? $shifters[3]->id : -1
                ])
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="section-right section-text">

    <p class="subtitle is-6"><strong>Project Name</strong></p>

    <p class="subtitle is-5" style="margin-top: -24px" id="project_name">{!! $team->project_name != "" ? $team->project_name : "No project name.<br>Add one!" !!}</p>

    <p class="subtitle is-6"><strong>Project Repository</strong></p>

    <p class="subtitle is-5" id="project_repository" style="margin-top: -24px">{!! $team->project_url != "" ? $team->project_url : "No project url.<br>Add one!" !!}</p>

    <p class="subtitle is-6"><strong>Project Description</strong></p>

    <p class="subtitle is-5" id="project_description" style="margin-top: -24px">{!! $team->project_description != "" ? $team->project_description : "No project description.<br>Add one!" !!}</p>

  </div>
</div>

@endsection
