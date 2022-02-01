{{ Form::open(['url' => 'platform/team/update', 'id' => 'team_update']) }}
<script>$('#team_update').on('submit', ev => ev.preventDefault())</script>
<div class="section section-large" id="team_index_content">
  <div class="section-left section-text">
    <div class="columns">
      <div class="column is-two-thirds">
        <p id="team_name" class="title is-3">{{ $team->name }}<i onclick="edit_team_name()" style="margin-left:2%; font-size: 1rem" class="far fa-edit hover"></i></p>

        <div id="team_name_input_div" style="display: none; margin-top: -0.5rem; margin-bottom: 1.4rem;">
          <div style="display:flex;flex-direction:row">            
            <input name='team_name' id="team_name_input" class="input" type="text" placeholder="Awesome Team's Name"></input>
            
            <button onclick="save_team_name()" style="margin-left: 8px" class="button is-danger">Save</button>
          </div>

          <div id="team_name_alert" class="alert alert-danger"></div>
        </div>

        <a href="/platform/team/leave"class="button is-danger">Leave team</a>
      </div>

      <div class="column is-one-third">
        <div class="team-logo-section">
          {{ Form::label("team_logo", "Team Logo", [ "class" => "label" ]) }}

          <div class="team-logo">
            <figure class="image">
              @if(Auth::user()->currentTeam()->logoPath != "")
                <img id="team_logo_image" src="{{ '/images/teams/' . Auth::user()->currentTeam()->logoPath }}" alt="">
              @else
                <img id="team_logo_image" src="/images/shift18/platform/default_team.png" alt="">
              @endif

              <div class="file">
                <label class="file-label is-fullwidth">
                  {{ Form::file("team_logo", [
                      "class" => "file-input", "accept" => ".png,.jpeg,.jpg",
                      "onchange" => "save_team_logo(this)"
                    ])
                  }}

                  <span class="file-cta is-paddingless is-fullwidth"
                    style="justify-content: center">
                    <span class="file-icon">
                      <i class="fa fa-upload"></i>
                    </span>

                    <span class="file-label" style="font-size: 14px">Change photo… </span>
                  </span>
                </label>
              </div>
            </figure>
          </div>
        </div>
      </div>
    </div>

    <div class="columns">
      <div class="column">
        <div class="members">
          <label class="label">Members</label>

          <a class="button is-black is-fullwidth" id="open_modal_button"
            style="margin-bottom: 10px">
            Invite Shifters to Join
          </a>

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

    <p class="subtitle is-6"><strong>Project Name</strong><i onclick="edit_project_name()" style="margin-left:2%" class="far fa-edit hover"></i></p>

    <p class="subtitle is-5" style="margin-top: -24px" id="project_name">{!! $team->project_name != "" ? $team->project_name : "No project name.<br>Add one!" !!}</p>

    <div id="project_name_input_div" style="display: none; margin-top: -0.5rem; margin-bottom: 1.4rem;">
      <div style="display:flex;flex-direction:row">
        <input name="project_name" id="project_name_input" class="input" type="text" placeholder="Awesome Team's Name"></input>
        
        <button onclick="save_project_name()" style="margin-left: 8px" class="button is-danger">Save</button>
      </div>

      <div id="project_name_alert" class="alert alert-danger"></div> 
    </div>

    <p class="subtitle is-6"><strong>Project Repository</strong><i onclick="edit_project_repository()" style="margin-left:2%" class="far fa-edit"></i></p>

    <p class="subtitle is-5" id="project_repository" style="margin-top: -24px">{!! $team->project_url != "" ? $team->project_url : "No project url.<br>Add one!" !!}</p>

    <div id="project_repository_input_div" style="display: none; margin-top: -0.5rem; margin-bottom: 1.4rem;">
      <div style="display:flex;flex-direction:row">
        <input name='project_repository' id="project_repository_input" class="input" type="text" placeholder="Awesome Team's Project Repository Url"></input>
        
        <button onclick="save_project_repository()" style="margin-left: 8px" class="button is-danger">Save</button>
      </div>

      <div id="project_repository_alert" class="alert alert-danger"></div> 
    </div>

    <p class="subtitle is-6"><strong>Project Description</strong><i onclick="edit_project_description()" style="margin-left:2%" class="far fa-edit"></i></p>

    <p class="subtitle is-5" id="project_description" style="margin-top: -24px">{!! $team->project_description != "" ? $team->project_description : "No project description.<br>Add one!" !!}</p>

    <div id="project_description_input_div" style="display: none; margin-top: -0.5rem; margin-bottom: 1.4rem;">
      <div style="display:flex;flex-direction:row">
        <input name='project_description' id="project_description_input" class="input" type="text" placeholder="Awesome Team's Project Description"></input>
        
        <button onclick="save_project_description()" style="margin-left: 8px" class="button is-danger">Save</button>
      </div>

      <div id="project_description_alert" class="alert alert-danger"></div> 
    </div>

  </div>
</div>
{{ Form::close() }}
