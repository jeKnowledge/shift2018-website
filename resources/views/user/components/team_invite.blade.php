<div>
    <p class="subtitle is-5 mt24px"><strong>{{ $team_name }}</strong></p>

    <div class="columns">
        <div class="column is-one-quarter ">
            <a class="button is-fullwidth"
              style="background-color: #66d7d1; border-color: #66d7d1"
              href="/platform/team/join?team_id={{ $team_id }}">
              Accept
            </a>
        </div>

        <div class="column is-one-quarter">
            <a class="button is-danger is-fullwidth decline-button" {{ "team_id=" . $team_id }}>Decline</a>
        </div>
    </div>
</div>
