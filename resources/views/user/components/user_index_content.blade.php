<div class="section section-large" id="user_index_content">
  <div class="section-left section-text">
    <p class="title is-3">{{ Auth::user()->name }},</p>

    @if (Auth::user()->isPartner())
    <p class="subtitle strong is-3"><strong> {{ Auth::user()->email}}</strong></p> 
    @endif

    @if (!Auth::user()->isPartner())
    <p class="subtitle is-3">
      <strong>{{ (Auth::user()->age != 0) ? Auth::user()->age : "SA" }}</strong> years old
    </p>

    <p class="subtitle is-3" style="margin-top: -24px;">
      from <strong>
        {{ (Auth::user()->location != "") ? Auth::user()->location : "ShiftAPPens Land"  }}
      </strong>
    </p>
    @endif
    <p class="subtitle is-3">
      <strong>
        {{ (Auth::user()->github != "") ? Auth::user()->github : "shiftappens"}}
      </strong> on Github
    </p>

    <p class="subtitle is-3" style="margin-top: -24px;">
      <strong>
        {{ (Auth::user()->twitter != "") ? Auth::user()->twitter : "@shiftappens" }}
      </strong> on Twitter
    </p>

    <p class="subtitle is-3" style="margin-top: -24px;">
      Hosted on <strong>
        <a href="{{ (Auth::user()->website != '') ? URL::to(Auth::user()->website) : 'http://shiftappens.com' }}">
          {{ (Auth::user()->website != "") ? Auth::user()->website : "www.shiftappens.com" }}
        </a>
      </strong>
    </p>
    
    <br>
    @if (Auth::user()->isPartner() && isset(Auth::user()->bio))

        <p class="subtitle is-4" style="margin-top: -24px;">
          <strong> Description </strong> 
          <br>
            {{ (Auth::user()->bio != "") ? Auth::user()->bio : "@shiftappens" }}
        </p>

    @endif
  </div>

  <div class="section-right section-text">
    <div class="section section-small">
      <div class="section-left"> 
            @if (!Auth::user()->isPartner())
            <p class="subtitle is-4" style="margin-top: 24px;">Team:</p>
            <p class="title is-3">
                {{ (Auth::user()->currentTeam() != null) ? Auth::user()->currentTeam()->name: "No Team" }}
            @endif
          </p>

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

    <a class="button is-black is-fullwidth" id="user_edit_button">Edit Profile</a>
  </div>
</div>
