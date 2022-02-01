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
                  </li>
              </ul>
          </div>
      </div>
  </div>

  <div class="section section-normal">
      <div class="container has-text-centered" style="margin-top: 48px;">
        <h1 class="title is-5">  The time for applications has ended! If you missed your chance you can always try again next year! </h1>
      </div>
  </div>

  {{ Form::open(['url' => 'platform/applications', "enctype" => "multipart/form-data", "id" => "applications-form"]) }}

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
              {{ Form::text('age', (Auth::user()->age != 0) ? Auth::user()->age : "", ['placeholder' => '21', 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'input']) }}
            </div>
          </div>

          <div class="field">
            <label class="label">Where are you from?</label>
            <div class="error">{{ $errors->first('location') }}</div>
            <div class="control">
              {{ Form::text('location', isset(Auth::user()->location) ? Auth::user()->location: "", ['placeholder' => 'Coimbra?', 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'input']) }}
            </div>
          </div>

          <div class="field">
            <label class="label">Phone Number</label>
            <div class="error">{{ $errors->first('phoneNumber') }}</div>
            <div class="control">
              {{ Form::text('phoneNumber', isset(Auth::user()->phoneNumber) ? Auth::user()->phoneNumber : "", ['placeholder' => '','onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'input']) }}
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

          <div class="student {{ (isset(Auth::user()->isStudent) && Auth::user()->isStudent)  ? '' : 'invisible' }} field">
              <div class='field'>
                  <label class="label">University</label>
                  <div class="error">{{ $errors->first('university') }}</div>
                  <div class="control">
                    {{ Form::text('university', isset(Auth::user()->university) ? Auth::user()->university : "", ['placeholder' => 'Universidade de Coimbra', 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'input']) }}
                  </div>
              </div>

              <div class='field'>
                  <label class="label">Course</label>
                  <div class="error">{{ $errors->first('course') }}</div>
                  <div class="control">
                    {{ Form::text('course', isset(Auth::user()->course) ? Auth::user()->course : "", ['placeholder' => 'Smashing Hackathons 101', 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'input']) }}
                  </div>
              </div>
          </div>

          <div class="not-student {{ (isset(Auth::user()->isStudent) && !Auth::user()->isStudent) ? '' : 'invisible' }} field">
              <div class='field'>
                  <label class='label'>Institution</label>
                  <div class="error">{{ $errors->first('institution') }}</div>
                  <div class="control">
                    {{ Form::text('institution', isset(Auth::user()->institution) ? Auth::user()->institution : "", ['placeholder' => 'Best Startup in the World', 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'input']) }}
                  </div>
              </div>

              <div class='field'>
                  <label class='label'>Function</label>
                  <div class="error">{{ $errors->first('function') }}</div>
                  <div class="control">
                    {{ Form::text('function', isset(Auth::user()->function) ? Auth::user()->function : "", ['placeholder' => 'UI/UX Ninja Expert', 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'input']) }}
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
                {{ Form::textarea('pitch', "", ['placeholder' => "Give us all you've got, show us why we need to have you!", 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'textarea']) }}
              </div>
            </div>

            <div class="field">
              <label class="label">Skills</label>
              <div class="error">{{ $errors->first('skills') }}</div>
              <div id="skills" class="input textarea" style="resize: auto;"></div>
              {{ Form::hidden('skills', Auth::user()->skills, ['onkeyup' => 'this.setAttribute(\'value\', this.value);','id' => 'actual-skills', 'class' => 'textarea']) }}
              <script>
              var true_form = document.getElementById('actual-skills');
              var tags = {!! Auth::user()->skills()->get() !!}
              var tags_name = [];
              for (tag in tags){
                tags_name.push(tags[tag].name);
              }
              if (tags_name.length == 0){
                tags_name = ['Shifting','Random','Overpowered']
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

  <div class="section section-large invisible" id="more-section">
          <div class="section-left section-text">
              <h1 class="title is-3"><span class="mopster">Step 3 -</span> What's there more to know?</h1>

              <div class="field">
                <label class="label">First time <span class="mopster">Shiftin'</span>?</label>
                <div class="error">{{ $errors->first('isFirstTime') }}</div>
                <div class="control">
                  {{ Form::radio('isFirstTime', 1, null, ['class' => 'radio']) }} Yes
                  {{ Form::radio('isFirstTime', 0, null, ['class' => 'radio']) }} No
                </div>
              </div>

              <div class="field">
                <label class="label">T-shirt Size?</label>
                <div class="error">{{ $errors->first('tshirt') }}</div>
                <div class="control is-expanded">
                  <div class="select is-fullwidth">
                    {{ Form::select('tshirt', ["" => 'Select option', "S" => 'S', "M" => 'M', "L" => 'L', "XL" => 'XL', "XXL" => 'XXL'], null, ['class' => ''])}}
                  </div>
                </div>
              </div>
              <div class="field">
                <label class="label">Anything else on why you should come shift with us?</label>
                <div class="control">
                  {{ Form::textarea('bio', isset(Auth::user()->bio) ? Auth::user()->bio : "", ['placeholder' => "Duh?!.. I'm super awesome!", 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'textarea']) }}
                </div>
              </div>
              <div class="field">
                <label class="label">Comments?</label>
                <div class="control">
                  {{ Form::textarea('comments', "", ['placeholder' => 'You can use this field to tell us about any food restrictions you might have, or something that you feel is important for us to know. Or just something random tbh.', 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'textarea']) }}
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
                  {{ Form::text('portefolio', "", ['placeholder' => "www.behance.com/we_don't_have_one...yet!", 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'input']) }}
                </div>
              </div>
              <div class="field">
                <label class="label">Useful URLs</label>
                <div class="control">
                  {{ Form::textarea('urls', "", ['placeholder' => 'Anything we might enjoy... about you, of course!', 'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'textarea']) }}
                </div>
              </div>
              <br>

              <button class="button is-black is-fullwidth" type="submit">Save!</button>
          </div>
      </div>

      <script>
        var inputs = $('#applications-form :input');
        console.log(inputs);
        inputs.each(function () {
            $(this).prop('disabled', true);;
        });
      </script>

@endsection


@section('footer')
<div class="cp-container">
  <img src="{{ asset('images/shift18/platform/cp-logo.svg')}}" alt="" height="300px" width="300px">
</div>
@endsection
