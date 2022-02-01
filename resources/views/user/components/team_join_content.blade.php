<div class="section section-large" id="team_join_content">
    <div class="section-left section-text">
        <h1 class="title is-3">Let's start <span class="mopster">Shiftin'</span></h1>

        @if ($team_invites->count() == 0)
        <div class="no-invitations-yet">
            <p class="subtitle is-3 m24px">
              There are no invitations to join a team yet. Stay tuned!
            </p>
        </div>
        @else
        <div class="received-invitation">
            <p class="subtitle is-3 mt24px">
              You've received <strong>{{ $team_invites->count() }} invitations</strong> to join:
            </p>

            @foreach ($team_invites as $team)
              @include("user.components.team_invite", [
                "team_id" => $team->id,
                "team_name" => $team->name
              ])
            @endforeach
        </div>
        @endif
    </div>

    <div class="section-right section-text">
        <div class="insert-team-code">
            <p class="subtitle is-3" style="margin-top: 60px">
              Already have a <strong>code</strong> to join an existing Team? Go ahead!
            </p>

            <div class="field">
                <div class="control">
                    <input placeholder="Insert your Team's code here!" class="input" name="name"
                      type="text" value="">
                </div>
            </div>

            <a class="button is-black is-pulled-right">Join this Team</a>
        </div>
    </div>
</div>
