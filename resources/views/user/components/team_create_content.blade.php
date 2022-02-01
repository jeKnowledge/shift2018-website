{{ Form::open(["action" => "TeamController@store", "method" => "post",
    "enctype" => "multipart/form-data", "id" => "team_create_content"
  ])
}}
  <div class="section section-large">
    <div class="section-left section-text">
      <h1 class="title is-3">Create My Team</h1>

      <div class="columns">
        <div class="column is-two-thirds">
          <div class="field">
            {{ Form::label("team_name", "Team Name", [ "class" => "label" ]) }}

            <div class="control">
              {{ Form::text("team_name", "", [
                  "placeholder" => "Awesome Team's Name", "class" => "input"
                ])
              }}

              <div id="team_name_alert" class="alert alert-danger"></div>
            </div>

          </div>
        </div>

        <div class="column is-one-third">
          <div class="team-logo-section">
            {{ Form::label("team_logo", "Team Logo", [ "class" => "label" ]) }}

            <div class="team-logo">
              <figure class="image">
                <img id="team_logo_image" src="/images/shift18/platform/default_team.png" alt="">

                <div class="file">
                  <label class="file-label is-fullwidth">
                    {{ Form::file("team_logo", [
                        "class" => "file-input", "accept" => ".png,.jpeg,.jpg"
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
                  <div class="column">
                    {{ Form::hidden("card0", Auth::user()->id) }}

                    <div class="card" id="card0" fixed=1 }}>
                      <div class="card-image">
                        <figure class="image">
                          @if(Auth::user()->photoPath != "" && Auth::user()->hasUrlPhoto())
                            <img src={{ Auth::user()->photoPath }} alt="Member's picture">
                          @elseif(Auth::user()->photoPath != "")
                            <img src={{ "/images/photos/" . Auth::user()->photoPath }} alt="Member's picture">
                          @else
                            <img src={{ "/images/shift18/platform/default_profile.png" }} alt="Member's picture">
                          @endif
                          </figure>
                      </div>

                      <div class="card-footer" style="padding: 8px">
                        <p class="subtitle is-6 is-fullwidth" style="text-align: center">
                          {{ Auth::user()->name }}
                        </p>
                      </div>
                    </div>
                  </div>

                  @include("user.components.profile_card", [
                    "photoPath" => "/images/shift18/platform/default_profile.png",
                    "name" => "Empty Slot",
                    "id" => "card1"
                  ])
                </div>
              </div>
            </div>

            <div class="column">
              <div class="columns">
                <div class="column" style="display: inline-flex; padding: 0">
                  @include("user.components.profile_card", [
                    "photoPath" => "/images/shift18/platform/default_profile.png",
                    "name" => "Empty Slot",
                    "id" => "card2"
                  ])

                  @include("user.components.profile_card", [
                    "photoPath" => "/images/shift18/platform/default_profile.png",
                    "name" => "Empty Slot",
                    "id" => "card3"
                  ])
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="section-right section-text">
      <div class="field">
        {{ Form::label("project_name", "Project Name", [
            "class" => "label", "style" => "margin-top:59px"
          ])
        }}

        <div class="control">
          {{ Form::text("project_name", "", [
              "class" => "input", "placeholder" => "Awesome Project's Name"
            ])
          }}
        </div>
      </div>

      <div class="field">
        {{ Form::label("project_name", "Project Repository", [ "class" => "label" ]) }}

        <div class="control">
          {{ Form::text("project_url", "", [
              "class" => "input", "placeholder" => "URL Repository"
            ])
          }}
        </div>
      </div>

      <div class="field">
        {{ Form::label("project_description", "Project Description", [ "class" => "label" ]) }}

        <div class="control">
          {{ Form::textarea("project_description", "", [
              "class" => "textarea", "style" => "height: 265px", "rows" => "20",
              "placeholder" => "Tell us what this awesome project is all about!"
            ])
          }}
        </div>
      </div>

      {{ Form::submit("Create Team", [ "class" => "button is-black is-focused is-fullwidth" ]) }}
    </div>
  </div>
{{ Form::close() }}
