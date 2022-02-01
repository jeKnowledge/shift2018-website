{{ Form::open([
    'route' => ['user.update', Auth::user()], 'method' => 'put', 'id' => 'user_edit_content',
    "enctype" => "multipart/form-data"
  ])
}}
<div class="section section-large">
  <div class="section-left section-text">
      <h1 class="title is-3"><span class="mopster">Hi Shifter! -</span> Edit you info below</h1>

        
        @if (!Auth::user()->isPartner())

          <div class="field">
            <label class="label">Name</label>
                <div class="control">
                  {{ Form::text('name', Auth::user()->name, [
                    'placeholder' => "Awesome Shifter's Name",
                    'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'input'
                    ])
                  }}
                </div>

                <div id="user_name_alert" class="alert alert-danger"></div>
              </div>

              <div class="field">
                <label class="label">Age</label>

                <div class="control">
                  {{ Form::text('age', (Auth::user()->age != 0) ? Auth::user()->age : "", [
                    'placeholder' => '21', 'onkeyup' => 'this.setAttribute(\'value\', this.value);',
                    'class' => 'input'
                    ])
                  }}
                </div>

                <div id="user_age_alert" class="alert alert-danger"></div>
              </div>
          @elseif (Auth::user()->isPartner()) 

          <div class="field">
            <label class="label">Partner Name</label>
                <div class="control">
                  {{ Form::text('name', Auth::user()->name, [
                    'placeholder' => "Awesome Partner Name",
                    'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'input'
                    ])
                  }}
                </div>

                <div id="user_name_alert" class="alert alert-danger"></div>
              </div>
          
          @endif


      <div class="field">
        <label class="label">Where are you from?</label>

        <div class="control">
          {{ Form::text('location', isset(Auth::user()->location) ? Auth::user()->location : "" , [
            'placeholder' => 'Coimbra?', 'onkeyup' => 'this.setAttribute(\'value\', this.value);',
            'class' => 'input'
            ])
          }}
        </div>

        <div id="user_location_alert" class="alert alert-danger"></div>
      </div>

        @if (!Auth::user()->isPartner())
          <div class="field">
            <label class="label">Phone Number</label>

            <div class="control">
              {{ Form::text('phoneNumber',
                  isset(Auth::user()->phoneNumber) ? Auth::user()->phoneNumber : "", [
                    'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'input'
                  ]
                )
              }}
            </div>
            
            <div id="user_phoneNumber_alert" class="alert alert-alert"></div>
          </div>

          <div class="field">
            <label class="label">What do you do?</label>
            <div class="control is-expanded">
              <div class="select is-fullwidth">
                {{ Form::select('type', [
                    "" => 'Select Option', "Designer" => 'Designer', "Developer" => 'Developer'
                  ], Auth::user()->type, ['class' => 'fw mt-20'])
                }}
              </div>
            </div>
          </div>
        @endif

          <div class="field">
            <label class="label">Github</label>
            <div class="control">
              {{ Form::text('github', Auth::user()->github, [
                  'placeholder' => 'shiftappens', 'onkeyup' => 'this.setAttribute(\'value\', this.value)',
                  'class' => 'input'
                ])
              }}
            </div>
          </div>

          <div class="field">
            <label class="label">Twitter</label>

            <div class="control">
              {{ Form::text('twitter', Auth::user()->twitter, [
                  'placeholder' => '@shiftappens', 'onkeyup' => 'this.setAttribute(\'value\', this.value)',
                  'class' => 'input'
                ])
              }}
            </div>

            <div id="user_twitter_alert" class="alert alert-danger"></div>
          </div>

          <div class="field">
            <label class="label">Website</label>
            <div class="control">
              {{ Form::text('website', Auth::user()->website, [
                  'placeholder' => 'www.shiftappens.com',
                  'onkeyup' => 'this.setAttribute(\'value\', this.value)', 'class' => 'input'
                ])
              }}
            </div>
          </div>
        
        @if (!Auth::user()->isPartner())
          <div class="field">
            <label class="label">Are you a student?</label>
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

          <div class="student {{ (Auth::user()->isStudent) ? '' : 'invisible' }} field">
              <div class='field'>
                  <label class="label">University</label>
                  <div class="control">
                    {{ Form::text('university', Auth::user()->university, [
                        'placeholder' => 'Universidade de Coimbra',
                        'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'input'
                      ])
                    }}
                  </div>
              </div>
              <div class='field'>
                  <label class="label">Course</label>
                  <div class="control">
                    {{ Form::text('course', Auth::user()->course, [
                        'placeholder' => 'Smashing Hackathons 101',
                        'onkeyup' => 'this.setAttribute(\'value\', this.value)', 'class' => 'input'
                      ])
                    }}
                  </div>
              </div>
          </div>

          <div class="not-student field {{
            (!Auth::user()->isStudent && isset(Auth::user()->isStudent)) ? '' : 'invisible' }}">
              <div class='field'>
                  <label class='label'>Institution</label>
                  <div class="control">
                    {{ Form::text('institution', Auth::user()->institution, [
                        'placeholder' => 'Best Startup in the World',
                        'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'input'
                      ])
                    }}
                  </div>
              </div>
              <div class='field'>
                  <label class='label'>Function</label>
                  <div class="control">
                    {{ Form::text('function', Auth::user()->function, [
                        'placeholder' => 'UI/UX Ninja Expert',
                        'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'input'
                      ])
                    }}
                  </div>
              </div>
          </div>
        @endif

          <div class="field">
            <label class="label">Anything else on why you should come shift with us?</label>

            <div class="control">
              {{ Form::textarea('bio', Auth::user()->bio, [
                  'placeholder' => "Duh?!.. I'm super awesome!",
                  'onkeyup' => 'this.setAttribute(\'value\', this.value);', 'class' => 'textarea'
                ])
              }}
            </div>

            <div id="user_bio_alert" class="alert alert-danger"></div>
          </div>

          <br>
        
        @if (!Auth::user()->isPartner())
          <label class="checkbox">
            {{ Form::checkbox('allowPartners', true, Auth::user()->allowPartners)}}
            I allow my info to be shared with Shift APPens' official event partners.
          </label>

        @endif

  </div>

  <div class="section-right section-text">

    <div class="image-change-container">
      <figure class="image" style="max-width:256px;">
        @if(Auth::user()->photoPath != "" && !Auth::user()->hasUrlPhoto())
            <img id="photoFileImage" src="{{ asset('images/photos/' . Auth::user()->photoPath) }}" alt="">
        @elseif(Auth::user()->photoPath != "" && Auth::user()->hasUrlPhoto())
            <img id="photoFileImage" src="{{ Auth::user()->photoPath }}" alt="">
        @else
            <img id="photoFileImage" src="{{ asset('images/shift18/shift-placeholder.png') }}" alt="">
        @endif
        <div class="error">{{ $errors->first('type') }}</div>
        <div class="file">
          <label class="file-label" style="width: 100%">
            <input class="file-input" type="file" name="photoFile" id="photoFile" accept=".png,.jpeg,.jpg">
            <span class="file-cta" style="width: 100%; justify-content:center;">
              <span class="file-icon">
                <i class="fa fa-upload"></i>
              </span>
              <span class="file-label">
                Change photo…
              </span>
            </span>
          </label>
        </div>
      </figure>
    </div>

      <br>

      <a id="user_change_password_button" class="button is-warning is-fullwidth">
        Alterar Password
      </a>

      <br>

      {{ Form::submit('Update Info', ['class' => 'button is-black is-fullwidth']) }}

  </div>
</div>
{{ Form::close() }}
