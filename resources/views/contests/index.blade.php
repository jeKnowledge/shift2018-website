@extends('layouts.platform')

@section('content')
    @if (Auth::user()->isAdmin())
      <a href="{{route('contests.create')}}" class='button'>New Challenge</a>
    @endif
    
      <div class="section section-large visible" id="bio-section">
          <div class="section-left section-text">
          <h1 class="title is-2"><span class="mopster">Welcome </span>to our awesome challenges!</h1>

              @foreach ($contests as $contest) 
                  <p class="title is-5" style="color: #DF3C4B;">{{ $contest->name }}</p>
                  <p class="title is-5" >{{ $contest->partner()->first()->name }}</p>
                  <div style="margin-top: -10px; margin-bottom: 35px; width: 100%;">
                    @if (Auth::user()->currentTeam() == null)
                      <a class="button is-black" style="width:100%;" id="openModal" onclick="open_modal({{$contest->id}})">Details</a>
                    @else
                      <a class="button is-black" style="width:49%; margin-right: 1.2%;" id="openModal" onclick="open_modal({{$contest->id}})">Details</a>
                      @if ($contest->signedup)
                        <a href="contest/signout?contest_id={{ $contest->id }}" class="button is-danger is-inverted" style="width: 49%; border-color: #ff3860;">Signed out</a>
                      @else
                        <a href="contest/signup?contest_id={{ $contest->id }}" class="button is-danger" style="width: 49%;">Sign up</a>
                      @endif
                    @endif
                  </div>

              <!-- Modal challenge details -->
              <div class="modal" id="contest-{{ $contest->id }}">
                  <div class="modal-background"></div>

                  <div class="modal-card">
                      <header class="modal-card-head">
                          <p class="modal-card-title"><strong>{{ $contest->name }}</strong></p>
                          <button class="delete" id="closeModal" onclick="close_modal({{$contest->id}})" aria-label="close"></button>
                      </header>

                      <section class="modal-card-body">
                          <p class="title is-6" style="margin-bottom: 5px">Description</p>
                          <p style="margin-bottom: 20px;"> {!! $contest->description !!} </p>

                          <p class="title is-6" style="margin-bottom: 5px">Documentation</p>
                          <p style="margin-bottom: 20px;"><strong><a target="_blank" href="{{ $contest->documentation }}">{{ $contest->documentation }}</a></strong></p>

                          <p class="title is-6" style="margin-bottom: 5px">Prize 🏆</p>
                          <p style="margin-bottom: 20px;">{{ $contest->prize }}</p>
                          @if ((Auth::user()->isPartner() && $contest->partner_id == Auth::user()->partner_id ) || Auth::user()->isAdmin())
                              <a href="{{route('contests.edit', ['contest'=>$contest->id])}}" class="button is-black is-fullwidth" style="margin-top: 20px;">Edit Challenge</a>
                          @endif
                          @if ((Auth::user()->isPartner() && $contest->partner_id == Auth::user()->partner_id ) || Auth::user()->isAdmin())
                              <a href="{{route('contests.show', ['contest'=>$contest->id])}}" class="button is-black is-fullwidth" style="margin-top: 20px;">Show Challenge</a> 
                          @endif
                      </section>

                      <footer class="modal-card-foot">
                      </footer>
                  </div>
              </div>
              @endforeach

          </div>

          <script>
              function open_modal(cid){
                  $("#contest-"+cid).addClass("is-active");
              };
              function close_modal(cid){
                  $("#contest-"+cid).removeClass("is-active");
              };
          </script>

      </div>



@endsection
