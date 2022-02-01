@extends('layouts.platform')

@section('content')
  <div class="section">
      <div class="container has-text-centered" style="margin-top: 48px;">
          <div class="tabs is-fullwidth">
              <ul>
                  <li class="is-active" id="bio">
                      <a>
                          <span>Bio</span>
                      </a>
                  </li>
                  <li id="pitch">
                      <a>
                          <span>Pitch</span>
                      </a>
                  </li>
                  <li id="more">
                      <a>
                          <span>More</span>
                      </a>
                  </li> </ul>
          </div>
      </div>
  </div>
  @if (Auth::user()->isShifter()) 
  <div class="section section-normal">
      <div class="container has-text-centered" style="margin-top: 48px;">
        <h1 class="title is-5"> &#127881; Congratulations <span class="mopster"> Shifter! </span> Your application has been accepted! &#127881; </h1>
      </div>
  </div>
  @endif
  {{ Form::open(['url' => ['platform/applications', 'application' => $application], "enctype" => "multipart/form-data", 'method' => 'put', 'id' => 'applications-form']) }}

  <div class="section section-small visible" id="bio-section">
      <div class="section-left section-text">
          <h1 class="title is-3"><span class="mopster">Step 1 -</span> Check your info</h1>

          <div class="field">
            <label class="label">Name</label>
            <div class="control">
              {{ Form::text('name', Auth::user()->name, ['placeholder' => "Awesome Shifter's Name", 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'input']) }}
            </div>
          </div>

          <div class="field">
            <label class="label">Age</label>
            <div class="error">{{ $errors->first('age') }}</div>
            <div class="control">
              {{ Form::text('age', Auth::user()->age, ['placeholder' => '21', 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'input']) }}
            </div>
          </div>

          <div class="field">
            <label class="label">Where are you from?</label>
            <div class="error">{{ $errors->first('location') }}</div>
            <div class="control">
              {{ Form::text('location', Auth::user()->location, ['placeholder' => 'Coimbra?', 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'input']) }}
            </div>
          </div>

          <div class="field">
            <label class="label">Phone Number</label>
            <div class="error">{{ $errors->first('phoneNumber') }}</div>
            <div class="control">
              {{ Form::text('phoneNumber', isset(Auth::user()->phoneNumber) ? Auth::user()->phoneNumber : "", ['onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'input']) }}
            </div>
          </div>

      </div>

      <div class="section-right section-text">
          <h1 class="title is-3">Answer with care!</h1>
          <span class="margin-24"></span>
          <p class="subtitle is-5">
              Don't wanna make a mistake here... What if we get your name wrong?
          </p>

          <div class="field">
            <label class="label">What do you do?</label>
            <div class="error">{{ $errors->first('type') }}</div>
            <div class="control is-expanded">
              <div class="select is-fullwidth">
                {{ Form::select('type', ["" => 'Select Option', "Designer" => 'Designer', "Developer" => 'Developer'], Auth::user()->type, ['class' => 'fw mt-20'])}}
              </div>
            </div>
          </div>

          <br>

          <div class="field">
            <label class="label">Are you a student?</label>
            <div class="error">{{ $errors->first('isStudent') }}</div>
            <div class="control">
              @if(isset(Auth::user()->isStudent))
                  {{ Form::radio('isStudent', 1, Auth::user()->isStudent, ['class' => 'radio']) }} Yes
                  {{ Form::radio('isStudent', 0, !Auth::user()->isStudent, ['class' => 'radio']) }} No
              @else
                  {{ Form::radio('isStudent', 1, null, ['class' => 'radio']) }} Yes
                  {{ Form::radio('isStudent', 0, null, ['class' => 'radio']) }} No
              @endif
            </div>
          </div>

          <div class="student {{ (isset(Auth::user()->isStudent) && Auth::user()->isStudent)  ? '' : 'invisible' }}">
              <div class='field'>
                  <label class="label">University</label>
                  <div class="error">{{ $errors->first('university') }}</div>
                  <div class="control">
                    {{ Form::text('university', Auth::user()->university, ['placeholder' => 'Universidade de Coimbra', 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'input']) }}
                  </div>
              </div>
              <div class='field'>
                  <label class="label">Course</label>
                  <div class="error">{{ $errors->first('course') }}</div>
                  <div class="control">
                    {{ Form::text('course', Auth::user()->course, ['placeholder' => 'Smashing Hackathons 101', 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'input']) }}
                  </div>
              </div>
          </div>

          <div class="not-student {{ (isset(Auth::user()->isStudent) && !Auth::user()->isStudent)  ? '' : 'invisible' }}">
              <div class='field'>
                  <label class='label'>Institution</label>
                  <div class="error">{{ $errors->first('institution') }}</div>
                  <div class="control">
                    {{ Form::text('institution', Auth::user()->institution, ['placeholder' => 'Best Startup in the World', 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'input']) }}
                  </div>
              </div>
              <div class='field'>
                  <label class='label'>Function</label>
                  <div class="error">{{ $errors->first('function') }}</div>
                  <div class="control">
                    {{ Form::text('function', Auth::user()->function, ['placeholder' => 'UI/UX Ninja Expert', 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'input']) }}
                  </div>
              </div>
          </div>
          <br>

          <a class="button is-black is-fullwidth" id="bio-button">Next Step</a>
      </div>
  </div>

  <div class="section section-small invisible" id="pitch-section">
        <div class="section-left section-text">
            <h1 class="title is-3"><span class="mopster">Step 2 -</span> Show us you're a real <span class="mopster">Shifter</span></h1>

            <div class="field">
              <label class="label">Pitch</label>
              <div class="error">{{ $errors->first('pitch') }}</div>
              <div class="control">
              {{ Form::textarea('pitch', $application->pitch, ['placeholder' => 'Dá-lhe tudo o que tens', 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'textarea']) }}
              </div>
            </div>

            <div class="field">
              <label class="label">Skills</label>
              <div class="error">{{ $errors->first('skills') }}</div>
              <div id="skills" class="input textarea" style="resize: auto;"></div>
              {{ Form::hidden('skills', Auth::user()->skills, ['placeholder' => 'Coloca as tuas skills sob a forma de hashtag, por exemplo: #PHP #React #Rails', 'onkeyup' => 'this.setAttribute(\'value\', this.value);','id' => 'actual-skills', 'class' => 'textarea']) }}
              <script>
              var true_form = document.getElementById('actual-skills');
              var tags = {!! Auth::user()->skills()->get() !!}
              var tags_name = [];
              for (tag in tags){
                tags_name.push(tags[tag].name);
              }
              var example = new Taggle('skills', {
                  tags: tags_name,
                  duplicateTagClass: 'bounce',
                  placeholder: 'Give us your skills!',

                  onTagAdd: function(event, tag) {
                      tags_name.push(tag);
                      $('#actual-skills').val(tags_name.join(" "));
                      return true_form;
                  },

                  onTagRemove: function(event, tag){
                      tags_name.pop(tag);
                      $('#actual-skills').val(tags_name.join(" "));
                      return true_form;
                  }
              });
                @if(Auth::user()->isShifter()) 
                    example.disable();
                @endif
              </script>
            </div>
        </div>

        <div class="section-right section-text">
            <h1 class="title is-3">You've got this!</h1>
            <span class="margin-24"></span>
            <p class="subtitle is-5">
                How long has it been? Like 2 seconds?
            </p>

            <br>

            <a class="button is-black is-fullwidth" id="pitch-button">Next Step</a>
        </div>

    </div>

  <div class="section section-small invisible" id="more-section">
          <div class="section-left section-text">
              <h1 class="title is-3"><span class="mopster">Step 3 -</span> What's there more to know?</h1>

              <div class="field">
                <label class="label">First time <span class="mopster">Shiftin'</span>?</label>
                <div class="error">{{ $errors->first('isFirstTime') }}</div>
                <div class="control">
                  {{ Form::radio('isFirstTime', 1, $application->isFirstTime, ['class' => 'radio']) }} Yes
                  {{ Form::radio('isFirstTime', 0, !$application->isFirstTime , ['class' => 'radio']) }} No
                </div>
              </div>

              <div class="field">
                <label class="label">T-shirt Size?</label>
                <div class="error">{{ $errors->first('tshirt') }}</div>
                <div class="control is-expanded">
                  <div class="select is-fullwidth">
                    {{ Form::select('tshirt', ["" => 'Select option', "S" => 'S', "M" => 'M', "L" => 'L', "XL" => 'XL', "XXL" => 'XXL'],$application->tshirt, ['class' => ''])}}
                  </div>
                </div>
              </div>

              <div class="field">
                <label class="label">Anything else on why you should come shift with us?</label>
                <div class="control">
                  {{ Form::textarea('bio', Auth::user()->bio, ['placeholder' => "Duh?!.. I'm super awesome!", 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'textarea']) }}
                </div>
              </div>
              <div class="field">
                <label class="label">Comments?</label>
                <div class="control">
                  {{ Form::textarea('comments', isset($application->comments) ? $application->comments : "" , ['placeholder' => 'You can use this field to tell us about any food restrictions you might have, or something that you feel is important for us to know. Or just something random tbh.', 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'textarea']) }}
                </div>
              </div>


          </div>

          <div class="section-right section-text">

              <div class="field">
                <label class="label">Github</label>
                <div class="control">
                  {{ Form::text('github', isset(Auth::user()->github) ? Auth::user()->github : "", ['placeholder' => 'shiftappens', 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'input']) }}
                </div>
              </div>
              <div class="field">
                <label class="label">Twitter</label>
                <div class="control">
                  {{ Form::text('twitter', isset(Auth::user()->twitter) ? Auth::user()->twitter : "", ['placeholder' => '@shiftappens', 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'input']) }}
                </div>
              </div>
              <div class="field">
                <label class="label">Website</label>
                <div class="control">
                  {{ Form::text('website', isset(Auth::user()->website) ? Auth::user()->website : "" , ['placeholder' => 'www.shiftappens.com', 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'input']) }}
                </div>
              </div>
              <div class="field">
                <label class="label">Portfolio</label>
                <div class="control">
                  {{ Form::text('portfolio', isset(Auth::user()->portfolio) ? Auth::user()->portfolio : "", ['placeholder' => "www.behance.com/we_don't_have_one...yet!", 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'input']) }}
                </div>
              </div>
              <div class="field">
                <label class="label">Useful URLs</label>
                <div class="control">
                  {{ Form::textarea('urls', isset($application->urls) ? $application->urls : "" , ['placeholder' => 'Anything we might enjoy... about you, of course!', 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'textarea']) }}
                </div>
              </div>
              <br>

              <button class="button is-black is-fullwidth" type="submit">Save!</button>
          </div>
      </div>

      <script>
        
      @if(Auth::user()->isShifter()) 
        var inputs = $('#applications-form :input');
        inputs.each(function () {
            $(this).prop('disabled', true);;
        });
      @endif
      </script>

@endsection

@section('footer')
<div class="cp-container">
  <img src="{{ asset('images/shift18/platform/cp-logo.svg')}}" alt="" height="300px" width="300px">
</div>
@endsection
