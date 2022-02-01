@extends('layouts.website')

@section('content-faq')
<div class="section section-small  section-faq" style="background-color: white;" id="section-faq">
	<div class="section-left section-text" style="padding-top: 52px; padding-bottom: 52px;">
		<h1 class="title is-3">FAQ</h1>
		<h2 class="subtitle is-5">Got any? Ask away.</h2>
	</div>
	<div class="q-container">
		<div class="q" onclick="faqAnimation(this.id)" id="q1">
			<div class="q-top">
				<div class="q-left">
					<p class="title is-5">
						Can I be part of it?
					</p>
				</div>
				<div class="q-right title is-4">
					^
				</div>
			</div>
			<div class="q-bottom">
				Any student, professional or enthusiast can be part of our fifth edition of Shift APPens! Only by this way it is possible to create a heterogeneous knowledge-sharing network that will foster the growth of the most inexperienced in the field and increase the spirit of mutual aid.
				As long as you are creative, motivated, and ready to have fun, Shift APPens is definitely YOUR hackathon!
			</div>
		</div>
		<div class="q" onclick="faqAnimation(this.id)" id="q2">
			<div class="q-top">
				<div class="q-left">
					<p class="title is-5">
						How do I register?
					</p>
				</div>
				<div class="q-right title is-4">
					^
				</div>
			</div>
			<div class="q-bottom">
				Applications are open!
				You can apply on our website (https://shiftappens.com/), registering and filling in the application form, or otherwise, you can look for our Tiger at your school during our Roadshow and apply directly with our organization committee!
			</div>
		</div>
		<div class="q" onclick="faqAnimation(this.id)" id="q3">
			<div class="q-top">
				<div class="q-left">
					<p class="title is-5">
						What can I do at Shift APPens?

					</p>
				</div>
				<div class="q-right title is-4">
					^
				</div>
			</div>
			<div class="q-bottom">
				Any application (mobile, web, desktop, game or other) that has come to your mind, but that you still haven’t had the chance to make it real, can fit the Shift APPens concept, and qualify to be one of the winning ideas to be awarded with  the awesome prizes we have. Our jury will take into account the originality, the technical difficulty involved, the final quality and the degree of utility for the target audience of the product that was developed during the event.
			</div>
		</div>
		<div class="q" onclick="faqAnimation(this.id)" id="q4">
			<div class="q-top">
				<div class="q-left">
					<p class="title is-5">
						With who can I participate?

					</p>
				</div>
				<div class="q-right title is-4">
					^
				</div>
			</div>
			<div class="q-bottom">
				You can apply alone or with your friends! Teams need to have between 2 to 4 participants, but if your friends don’t want to be part of this incredible hackathon, you can register alone and find a team during the event! You just need to bring ideas and a lot of motivation!
			</div>
		</div>
		<div class="q" onclick="faqAnimation(this.id)" id="q5">
			<div class="q-top">
				<div class="q-left">
					<p class="title is-5">
						How much will it cost?
					</p>
				</div>
				<div class="q-right title is-4">
					^
				</div>
			</div>
			<div class="q-bottom">
				Application is free! But if your application is accepted you will have to pay 10€.
			</div>
		</div>
		<div class="q" onclick="faqAnimation(this.id)" id="q6">
			<div class="q-top">
				<div class="q-left">
					<p class="title is-5">
						Where is it APPening?
					</p>
				</div>
				<div class="q-right title is-4">
					^
				</div>
			</div>
			<div class="q-bottom">
				This year’s edition is going to take place at the same building as last year’s edition, Mário Mexia Pavilion, in the centre of Coimbra provided by a good transports network and a shopping centre.

			</div>
		</div>
		<div class="q" onclick="faqAnimation(this.id)" id="q7">
			<div class="q-top">
				<div class="q-left">
					<p class="title is-5">
						How is it going to be?
					</p>
				</div>
				<div class="q-right title is-4">
					^
				</div>
			</div>
			<div class="q-bottom">
				We won’t tell you everything, but be prepared because anything can APPen! You will probably be shot several times by a ninja nerf gun or even find Chewbacca around the venue. We promise to give you all the conditions to be able to code for more than 48 hours!
			</div>
		</div>
		<div class="q" onclick="faqAnimation(this.id)" id="q8">
			<div class="q-top">
				<div class="q-left">
					<p class="title is-5">
						What about sleeping and showering?

					</p>
				</div>
				<div class="q-right title is-4">
					^
				</div>
			</div>
			<div class="q-bottom">
				If you decide to be a REAL Shifter, you may spend the 48 hours at our venue. We will have a resting area ready for you, you just need to bring a sleeping bag (you can also bring a mattress and a pillow!). You will also be able to take a shower (eventually) at our changing rooms!
			</div>
		</div>
		<div class="q" onclick="faqAnimation(this.id)" id="q9">
			<div class="q-top">
				<div class="q-left">
					<p class="title is-5">
						And what about food?
					</p>
				</div>
				<div class="q-right title is-4">
					^
				</div>
			</div>
			<div class="q-bottom">
				We will ensure you don’t starve and give you all major meals. You can count on breakfasts, lunches and dinners, as well as several coffee breaks throughout the day.
			</div>
		</div>
	</div>
</div>
@endsection

@section('content-juri')
<div class="section section-small section-juri" id="section-juri">
	<div class="section-left section-text">
		<h1 class="title is-3">Juri</h1>
		<h2 class="subtitle is-5">Make sure to have them love your projects.</h2>
	</div>
	<div class="juri-container">
		<div class="juri-card">
			<div class="juri-card-overlay">
				<a href="https://github.com/radcortez">
					<img src="{{ asset('images/shift18/github.svg')}}"style="width: 32px;">
				</a>
				<a href="https://www.radcortez.com/">
					<img src="{{ asset('images/shift18/website.svg')}}"style="width: 32px;">
				</a>
				<a href="https://www.linkedin.com/in/radcortez/">
					<img src="{{ asset('images/shift18/linkedin.svg')}}"style="width: 32px;">
				</a>
			</div>
			<div class="juri-card-top roberto"></div>
			<div class="juri-card-bottom">
				<p class="juri-name title is-5">Roberto Cortez</p>
				<p class="juri-title subtitle is-6">Software Engineer at Tomitribe</p>
				<p class="juri-desc subtitle is-7" style="margin-top: -12px;">
          Roberto Cortez is a professional Java Developer working in the software development industry with more than 9 years of experience on business areas like Finance, Insurance and Government.				</p>
			</div>
		</div>
		<div class="juri-card">
			<div class="juri-card-overlay">
				<a href="https://www.linkedin.com/in/andrerabanea">
					<img src="{{ asset('images/shift18/linkedin.svg')}}"style="width: 32px;">
				</a>
			</div>
			<div class="juri-card-top andre"></div>
			<div class="juri-card-bottom">
				<p class="juri-name title is-5">André Rabanea</p>
				<p class="juri-title subtitle is-6">Cofounder & Head of Creative at Beta-i, Founder & Chairman at Torkecc, Cofounder Stuntsoccer, Founder BillytheGroup</p>
				<p class="juri-desc subtitle is-7" style="margin-top: -12px;">
					André Rabanea (b. 1982, São Paulo) is CoFounder of Beta-i since January 2018 and Head of Creative at the company. He is a creative, disruptive and serial entrepreneur.
				</p>
			</div>
		</div>
		<div class="juri-card">
			<div class="juri-card-overlay">
				<a href="https://www.linkedin.com/in/celsomartinho/">
					<img src="{{ asset('images/shift18/linkedin.svg')}}"style="width: 32px;">
				</a>
				<a href="https://github.com/celso">
					<img src="{{ asset('images/shift18/github.svg')}}"style="width: 32px;">
				</a>
			</div>
			<div class="juri-card-top celso"></div>
			<div class="juri-card-bottom">
				<p class="juri-name title is-5">Celso Martinho</p>
				<p class="juri-title subtitle is-6">Co-founder & CEO Bright Pixel</p>
				<p class="juri-desc subtitle is-7" style="margin-top: -12px;">
					Celso is a challenge-driven, optimistic geek technologist, product person, and entrepreneurial soul, eventually thrown into a management career. Founder and CEO of Bright Pixel.
				</p>
			</div>
		</div>
		<div class="juri-card">
			<div class="juri-card-top tania"></div>
			<div class="juri-card-bottom">
				<p class="juri-name title is-5">Tânia Covas</p>
				<p class="juri-title subtitle is-6">Divisão de Inovação e Transferências do Saber da Universidade de Coimbra - Gestora de Inovação</p>
				<p class="juri-desc subtitle is-7" style="margin-top: -12px;">
					Desafiar o presente para reinventar o futuro! Ser capaz de desenvolver soluções originais e transformar ameaças em grandes oportunidades, esta é a vocação de Tânia Covas. Licenciada em Comunicação, especialista em Gestão do Conhecimento, Mestre em Gestão Pública e Doutoranda em Gestão.
				</p>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content-prizes')
<div class="section section-small section-prizes" id="section-prizes">
	<div class="section-left section-text">
		<h1 class="title is-3">Prizes</h1>
		<h2 class="subtitle is-5">You can win these</h2>
	</div>
	<div class="prize-container">
		<div class="prize-medium prize">
			<h3 class="title is-5">Wow!</h3>
			<h4 class="subtitle is-5">
				This amazing prize is for the 2nd place winner!
			</h4>
			<ul>
				<li>- LG 25UM58-P Widescreen Monitor, 1 for each participant;</li>
				<li>- 4x 250$ Digital Ocean;</li>
				<li>- 4x 75€ Formações FLAG;</li>
				<li>- 4x Hoodies UC.</li>
			</ul>
		</div>
		<div class="prize-big prize">
			<h3 class="title is-5">Damn!</h3>
			<h4 class="subtitle is-5">
				This amazing prize is for the Winner of all Winners, the 1st place Winner!
			</h4>
			<ul>
				<li>- PlayStation 4, 1 for each participant;</li>
				<li>- 4x 500$ Digital Ocean;</li>
				<li>- 4x Licenças Sketch;</li>
				<li>- 4x 125€ Formações FLAG;</li>
				<li>- 4x Hoodies UC.</li>
			</ul>
		</div>
		<div class="prize-small prize">
			<h3 class="title is-5">Nice!</h3>
			<h4 class="subtitle is-5">
				This amazing prize is for the 3rd place winner!
			</h4>
			<ul>
				<li>- Logitech MX Master Mouse, 1 for each participant;</li>
				<li>- 4x 125$ Digital Ocean;</li>
				<li>- 4x 40€ Formações FLAG;</li>
				<li>- 4x Hoodies UC.</li>
			</ul>
		</div>
	</div>
	<div class="special-container">
		<div class="special">
			<h3 class="title is-5">Special!</h3>
			<h4 class="subtitle is-5">This is a very special prize.</h4>
		</div>
		<div class="special">
			<h3 class="title is-5">Special!</h3>
			<h4 class="subtitle is-5">This is a very special prize.</h4>
		</div>
	</div>
</div>
@endsection

@section('content-join')
<div class="section" style="background-color: white;" id="contact">
	<div class="container has-text-centered section-text">
		<h1 class="title is-1">Ready to start <span class="mopster">Shiftin'</span>?</h1>
		<h2 class="subtitle is-4">We sure are. Click the button below to Register.</h2>
		<div class="countdown" style="margin-bottom: 12px;">
      <div id="timer"></div>
    </div>
		<a href='{{ url('auth/login') }}' class="button is-black">Apply now!</a>
	</div>
</div>
@endsection

@section('content-contact')
<div class="section section-small section-contact" id="section-contact">
	<div class="container has-text-centered section-text" style="padding-left: 0px; padding-right: 0px;">
		<h1 class="title is-1" style="color: white;">Interested?</h1>
		<h2 class="subtitle is-4" style="color: white;">Get in touch <a href="mailto:geral@shiftappens.com" class="blue sliding-middle-out">here!</a></h2>
	</div>
</div>
@endsection

@section('content-about')
<div class="section" style="background: linear-gradient(#F2684A, #DF3C4B);">
	<div class="container has-text-centered section-text">
		<h1 class="title is-1" style="color: black;">Any questions left?</h1>
		<h2 class="subtitle is-4" style="color: black;">Juri, challenges, some FAQ, PRIZES!</h2>
		<h2 class="subtitle is-4" style="color: black;"> Check our <a href="/about" class="sliding-middle-out blue">about</a> page!</h2>
	</div>
</div>
@endsection


@section('content-what')
	<div class="section section-large section-what" id="section-what">
        <div class="section-left section-text" style="padding-top: 96px;">
          <h1 class="title is-3">What is &nbsp;<span class="mopster">Shift Appens</span>?</h1>
          <span class="margin-24"></span>
          <p class="subtitle is-5">
	          Shift APPens is a technological event, where the goal is to create an app in 48 hours. This event gathers students from several technological areas, as well as entrepreneurs and high tech enthusiasts!          </p>
          <p class="subtitle is-5">
            On its way to the fifth edition, Shift APPens is on the top of the portuguese technological environment, offering year after year innovation and the best challenges to its participants.
            Counting on a relaxed environment and looking to promote a healthy competition and trade of different knowledge from the high-tech world, this hackathon makes it easy to develop hard and soft skills, like creativity, team spirit and the ability to work against the clock.
          </p>
          <br>
          <h1 class="title is-3">Interested?</h1>
          <span class="margin-24"></span>
          <p class="subtitle is-5">Subscribe to our newsletter!</p>


          {{ Form::open(['url'=> '/mailchimp', 'id' => 'form-email']) }}
          <div class="field has-addons" style="margin-bottom: 48px;">
              {{--  <input type="email" value="" placeholder="Email" name="EMAIL" class="input" id="mce-EMAIL" required>  --}}
              {{ Form::email('email', '', array('placeholder'=>'Email', 'required' ,'class'=>'input')) }}
              <div class="clear">
                <button id="subscribe-button" type="submit" value="Subscribe!" class="button is-black" style="margin-left: 12px;">Subscribe!</button>
                {{--  {!! Form::submit('Subscribe!',['id' => 'subscribe-button', 'class'=>'button is-black', 'style' => 'margin-left: 12px;'])!!}  --}}
              </div>
          </div>
          {{ Form::close() }}
          <p id="message-mailchimp" style="margin-top: -30px; margin-bottom: 20px;" class="subtitle is-5"></p>
          <div class="icons-div" style="position: inline-block;">
            <div class="icon-div">
            <img src="{{ asset('images/shift18/icons.svg')}}" class="icons">
          </div>
          <div class="icons-overlay">
						<p style="font-weight: 900; font-size: 24px;">Coming Soon</p>
          </div>

      </div>

    </div>
	</div>
@endsection

@section('content-when-where')
<div class="section section-small section-whenwhere" id="section-whenwhere">
        <div class="section-left section-map section-under">
            <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d97475.68919423707!2d-8.486314308075942!3d40.2287388414744!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd22f9144aacd16d%3A0x634564477b42a6b9!2sCoimbra!5e0!3m2!1spt-PT!2spt!4v1505472835210" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>-->
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3047.1649327207197!2d-8.410162684668506!3d40.20539397939021!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd22f99d304cc5ff%3A0xe174dd2479ebff48!2sPavilh%C3%A3o+Multidesportos+Dr.+M%C3%A1rio+Mexia!5e0!3m2!1spt-PT!2spt!4v1516128908944" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
						<!--
						<div class="section-overlay" style="padding-left: 20px; padding-right: 20px;">
              <p class="title" style="font-size: 300px;">?</p>
              <p class="title is-2" style="margin-top: -30px;">Coming soon...</p>
            </div>
						-->
        </div>

        <div class="section-right section-text section-map-text">
          <h1 class="title is-3" style="color: white !important;">When and where?</h1>
          <span class="margin-24"></span>
          <p class="subtitle is-5" style="color: white !important;">
						Shift APPens will happen on the 20th, 21st and 22nd of April of 2018, in the beautiful city of Coimbra.
						These three intense days of coding, coffee drinking and random things happening will take place in the Dr. Mário Mexia Pavilion, in the centre of Coimbra  provided by a good transports network and a shopping centre!
					</p>
          <br>
          <h1 class="title is-3" style="color: white !important;">Stay with us!</h1>
          <span class="margin-24"></span>
          <p class="subtitle is-5" style="color: white !important;">
            Don’t worry, we have your best interests at heart and we’ll provide you the best hackathon ever, with the best conditions and confort.
          </p>
          <br>
          <h1 class="title is-3" style="color: white !important;">Wanna know how to get there?</h1>
          <span class="margin-24"></span>
          <p class="subtitle is-5" style="color: white !important;">
						By bus:
						<br>
						If you arrive at Coimbra by bus you can take the yellow bus no. 5 and get out at “Infanta Dona Maria”
						<br>
						<br>
						By train:
						<br>
						If you arrive at Coimbra by train (Coimbra-B) you can take the yellow bus no. 5 and get out at “Infanta Dona Maria”.
						<br>
						If you arrive at Coimbra by train (Coimbra-A) you can take the yellow bus no. 24T and get out at “Infanta Dona Maria”.
						<br>
						You can also take a taxi and tell them to leave at Dr. Mário Mexia Pavilion.
          </p>
        </div>
      </div>

@endsection

@section('content-partners')
<div class="section section-small section-partners" id="section-partners">
	<div class="section-left section-text">
		<h1 class="title is-3">Partners</h1>
		<h2 class="subtitle is-5">Without them, we’d all be living under a bridge.</h2>
	</div>
	<!-- required hooks -->
	<div class="c-my-flooper js-flooper1">
		<a class="c-my-flooper__el js-flooper-item flooper-large" href="http://weareredlight.com/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image redlight"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-large" href="http://whitesmith.co/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image whitesmith"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-large" href="https://www.wit-software.com/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image wit"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-large" href="http://tisystems.pt/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image tisystems"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-large" href="https://www.outsystems.com/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image outsystems"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-large" href="http://weareredlight.com/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image redlight"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-large" href="http://whitesmith.co/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image whitesmith"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-large" href="https://www.wit-software.com/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image wit"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-large" href="http://tisystems.pt/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image tisystems"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-large" href="https://www.outsystems.com/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image outsystems"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-large" href="http://weareredlight.com/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image redlight"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-large" href="http://whitesmith.co/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image whitesmith"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-large" href="https://www.wit-software.com/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image wit"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-large" href="http://tisystems.pt/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image tisystems"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-large" href="https://www.outsystems.com/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image outsystems"></div>
		</a>
	</div>
	<div class="c-my-flooper js-flooper2">
		<a class="c-my-flooper__el js-flooper-item flooper-medium" href="https://feedzai.com" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image feedzai"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-medium" href="http://space.ipn.pt/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image esabic"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-medium" href="https://www.digitalocean.com/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image digitalocean"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-medium" href="https://www.revolut.com/pt/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image revolut"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-medium" href="https://feedzai.com" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image feedzai"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-medium" href="http://space.ipn.pt/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image esabic"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-medium" href="https://www.digitalocean.com/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image digitalocean"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-medium" href="https://www.revolut.com/pt/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image revolut"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-medium" href="https://feedzai.com" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image feedzai"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-medium" href="http://space.ipn.pt/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image esabic"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-medium" href="https://www.revolut.com/pt/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image revolut"></div>
		</a>
	</div>
	<div class="c-my-flooper js-flooper3">
		<a class="c-my-flooper__el js-flooper-item flooper-small" href="https://www.accenture.com/pt-pt" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image accenture"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-small" href="https://lifeonmars.pt/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image lifeonmars"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-small" href="https://github.com/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image github"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-small" href="http://www.novabase.pt/pt" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image novabase"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-small" href="https://unbabel.com/pt/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image unbabel"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-small" href="https://subvisual.co/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image subvisual"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-small" href="https://www.sketchapp.com/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image sketch"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-small" href="https://www.criticalsoftware.com/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image critical"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-small" href="https://www.accenture.com/pt-pt" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image accenture"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-small" href="https://lifeonmars.pt/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image lifeonmars"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-small" href="https://github.com/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image github"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-small" href="http://www.novabase.pt/pt" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image novabase"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-small" href="https://unbabel.com/pt/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image unbabel"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-small" href="https://subvisual.co/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image subvisual"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-small" href="https://www.sketchapp.com/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image sketch"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-small" href="https://www.criticalsoftware.com/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image critical"></div>
		</a>
	</div>

	<div class="section-left section-text" style="padding-bottom: 24px; padding-top: 96px;">
		<h1 class="title is-3">Institutional Partners</h1>
	</div>
	<!-- required hooks -->
	<div class="c-my-flooper js-flooper4">
		<a class="c-my-flooper__el js-flooper-item flooper-medium" href="https://www.uc.pt/fctuc" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image fctuc"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-medium" href="https://www.uc.pt/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image uc"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-medium" href="https://www.cp.pt" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image cp"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-medium" href="https://www.cm-coimbra.pt/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image cm"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-medium" href="https://www.dei.uc.pt/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image dei"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-medium" href="https://www.ipn.pt/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image ipn"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-medium" href="https://academica.pt/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image aac"></div>
		</a>

	</div>

	<div class="section-left section-text" style="padding-bottom: 24px; padding-top: 24px;">
		<h1 class="title is-3">Support</h1>
	</div>
	<!-- required hooks -->
	<div class="c-my-flooper js-flooper5">
		<a class="c-my-flooper__el js-flooper-item flooper-small" href="https://www.dreampills.pt/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image dreampills"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-small" href="https://www.facebook.com/BolasdeBerlim.Lovers/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image bolasberlim"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-small" href="https://www.flag.pt/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image flag"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-small" href="https://arcadegame.pt/index.php/pt/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image arcade"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-small" href="http://www.sociedadeagualuso.pt/pt/.aspx" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image luso"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-small" href="https://www.facebook.com/sportscaffecoimbra" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image sportscaffe"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-small" href="https://www.dreampills.pt/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image dreampills"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-small" href="https://www.facebook.com/BolasdeBerlim.Lovers/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image bolasberlim"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-small" href="https://www.flag.pt/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image flag"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-small" href="https://arcadegame.pt/index.php/pt/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image arcade"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-small" href="http://www.sociedadeagualuso.pt/pt/.aspx" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image luso"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-small" href="https://www.facebook.com/sportscaffecoimbra" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image sportscaffe"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-small" href="https://www.dreampills.pt/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image dreampills"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-small" href="https://www.facebook.com/BolasdeBerlim.Lovers/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image bolasberlim"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-small" href="https://www.flag.pt/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image flag"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-small" href="https://arcadegame.pt/index.php/pt/" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image arcade"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-small" href="http://www.sociedadeagualuso.pt/pt/.aspx" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image luso"></div>
		</a>
		<a class="c-my-flooper__el js-flooper-item flooper-small" href="https://www.facebook.com/sportscaffecoimbra" target="_blank">
			<div class="flooper-overlay"></div>
			<div class="flooper-image sportscaffe"></div>
		</a>

	</div>
</div>

@endsection

@section('content-who')

        <div class="section section-small section-who section-who-gif" id="section-who">
        <div class="section-left section-text" style="padding-bottom: 24px;">
          <h1 class="title is-3">Who is &nbsp;<span class="mopster">SA</span>?</h1>
          <span class="margin-24"></span>
          <p class="subtitle is-5">
            The main activity of Shift APPens is the 48-hour hackathon.
						Participants are invited to create teams, bringing together the most variated technological and creative skills.
					</p>
					<p class="subtitle is-5">
						After this comes the brainstorming moment, where each team must give way to their imagination and choose an innovative idea to develop.
					</p>
					<p class="subtitle is-5">
						In the following hours, there is a period of intense work, concentration, caffeine and a lot of fun, where all the team’s efforts come together to give life to the idea chosen by them.
					</p>
					<p class="subtitle is-5">
						In the final pitch, they will have to present the idea in a dynamic and appealing way, in order to captivate the jury and get on the podium.
					</p>
        </div>
        <div class="section-right section-text right-who" style="padding-bottom: 24px;">
					<a href="{{ asset('images/shift18/schedule.png')}}">
						<img src="{{ asset('images/shift18/schedule.png')}}" class="schedule">
					</a>
        </div>

      </div>
@endsection

@section('content-us')

<div class="section section-large section-us" id="section-us">
        <div class="container has-text-centered section-text">
					<h1 class="title is-3" style="color: black !important;">Made with&nbsp; <img src="{{ asset('images/shift18/heart.png')}}" style="height: 28px;"> &nbsp;by us.</h1>
          <span class="margin-24"></span>
          <p class="subtitle is-5" style="font-weight: 300 !important; color: black !important;">
            This hackathon is brought to you by two lovely groups that join together to give the best weekend of your life: the students core of Informatics Engineering and Multimedia Design and a junior enterprise from the University of Coimbra.
          </p>
        </div>

        <div class="section-left section-text" style="padding-top: 0px !important">
          <div class="section-right section-us-logo section-text" style="padding-top: 0px !important; margin-bottom: -50px;">
						<a href="https://nei.dei.uc.pt/" target="_blank">
							<img src="{{ asset('images/shift18/nei.png')}}" class="image is-96x96 logo-mobile">
						</a>
          </div>
          <article class="media">
            <a href="#">
              <div class="">
                <figure class="media-left">
                  <a class="image is-64x64" href="https://nei.dei.uc.pt/" target="_blank">
                    <img src="{{ asset('images/shift18/nei.png')}}">
                  </a>
                </figure>
                <div class="under-media"></div>
              </div>
            </a>
            <div class="media-content">
              <div class="content">
                <p class="subtitle is-5 is-spaced">
                  <strong style="color: black !important;">NÚCLEO DE ESTUDANTES DE INFORMÁTICA DA ASSOCIAÇÃO ACADÉMICA DE COIMBRA</strong>
                </p>
                <p class="subtitle is-5" style="font-weight: 300 !important; color: black !important;">
                  The enrichment of student’s experience during their time in University of Coimbra is one of the main principles of NEI/AAC.
                  The main goals of this student's core are to represent the students of Informatic Engineering and Multimedia Design and to regularly organize formative, cultural and sports activities and events like Shift APPens, ENEI, ENED, OpenDEI and Summer University.
                </p>
              </div>
            </div>
          </article>
        </div>

        <div class="section-right section-text" style="padding-top: 0px !important">
          <div class="section-right section-us-logo section-text" style="padding-top: 10px !important; margin-bottom: -50px;">
						<a href="http://jeknowledge.pt/" target="_blank">
							<img src="{{ asset('images/shift18/jek.svg')}}" class="image is-96x96 logo-mobile">
						</a>
          </div>
          <article class="media">
            <a href="#">
              <div class="">
                <figure class="media-left">
                  <a class="image is-64x64" href="http://jeknowledge.pt/" target="_blank">
                    <img src="{{ asset('images/shift18/jek.svg')}}">
                  </a>
                </figure>
                <div class="under-media"></div>
              </div>
            </a>
            <div class="media-content">
              <div class="content">
                <p class="subtitle is-5 is-spaced">
                  <strong style="color: black !important;">JEKNOWLEDGE</strong>
                </p>
                <p class="subtitle is-5" style="font-weight: 300 !important; color: black !important;">
                  jeKnowledge was founded in 2008 with the purpose to provide the students from various courses from the FCTUC the possibility to use the knowledge they acquired at the University in the global market, through an enormous panoply of internal and external projects.
                  It’s entirely formed by students from the area of Science and Technology with the ambition to go further, and believes that that step is given through real projects, for real clients.
                </p>
              </div>
            </div>
          </article>
        </div>
      </div>
@endsection

@section('content-past')

      <div class="section section-small section-past" id="section-past">
        <div class="section-left section-text" style="padding-bottom: 0px !important;">
          <h1 class="title is-3" style="color: white !important;">This is Shift’s 5th Edition!</h1>
          <span class="margin-24"></span>
          <p class="subtitle is-5" style="color: white !important;">
            This year, we want to bring you more coding, more connecting, more sharing and more fun! Don’t miss out on this amazing hackathon.           </p>
          <br>
          <h1 class="title is-3" style="color: white !important;">Have a look at our past Editions!</h1>
          <span class="margin-24"></span>
          <p class="subtitle is-5" style="color: white !important;">
            Are you curious to know a little bit more about Shift APPens?
          </p>
          <br>
          <div class="past-dates">
            <a href="//2014.shiftappens.com" target="_blank" class="title is-3 sliding-middle-out" style="color: white !important;">2014</a>
            <a href="//2015.shiftappens.com" target="_blank" class="title is-3 sliding-middle-out" style="color: white !important;">2015</a>
            <a href="//2016.shiftappens.com" target="_blank" class="title is-3 sliding-middle-out" style="color: white !important;">2016</a>
            <a href="//2017.shiftappens.com" target="_blank" class="title is-3 sliding-middle-out" style="color: white !important;">2017</a>
          </div>
        </div>

        <div class="section-right section-text">
          <h1 class="title is-3" style="color: white !important;">These are some of the awesome teams we’ve worked with…</h1>
          <span class="margin-24"></span>
          <p class="subtitle is-5" style="color: white !important;">
            During these 4 editions we were able to work with some of the most valuable teams in our country! Learn more about them!          </p>
          <br>

          <div class="multiple-items" style="margin-left: 40px; margin-right: 40px;">
            <a class="slick-item" href="//www.accenture.com" target="_blank" >
                <img class="partner-logo" src="{{ asset('images/partners/accenture.png') }}" alt="Placeholder image">
            </a>
            <a class="slick-item" href="//www.criticalsoftware.com" target="_blank">
                <img class="partner-logo" src="{{ asset('images/partners/critical.png') }}" alt="Placeholder image">
            </a>
            <a class="slick-item" href="//deemaze.com" target="_blank">
                <img class="partner-logo" src="{{ asset('images/partners/deemaze.png') }}" alt="Placeholder image">
            </a>
            <a class="slick-item" href="//www.glintt.com/" target="_blank">
                <img class="partner-logo" src="{{ asset('images/partners/glintt.png') }}" alt="Placeholder image">
            </a>
            <a class="slick-item" href="//www.rightitservices.com/" target="_blank">
                <img class="partner-logo" src="{{ asset('images/partners/rightit.png') }}" alt="Placeholder image">
            </a>
            <a class="slick-item" href="//unbabel.com" target="_blank">
                <img class="partner-logo" src="{{ asset('images/partners/unbabel.png') }}" alt="Placeholder image">
            </a>
            <a class="slick-item" href="//www.uc.pt" target="_blank">
                <img class="partner-logo" src="{{ asset('images/partners/academicastartuc.png') }}" alt="Placeholder image">
            </a>
            <a class="slick-item" href="//www.almashopping.pt" target="_blank">
                <img class="partner-logo" src="{{ asset('images/partners/alma.png') }}" alt="Placeholder image">
            </a>
            <a class="slick-item" href="//www.licorbeirao.com/" target="_blank">
                <img class="partner-logo" src="{{ asset('images/partners/beirao.png') }}" alt="Placeholder image">
            </a>
            <a class="slick-item" href="//cafestorrados.nestle.pt/buondi" target="_blank">
                <img class="partner-logo" src="{{ asset('images/partners/buondi.png') }}" alt="Placeholder image">
            </a>
            <a class="slick-item" href="//space.ipn.pt" target="_blank">
                <img class="partner-logo" src="{{ asset('images/shift18/partners-18/esabic.png') }}" alt="Placeholder image">
            </a>
            <a class="slick-item" href="//www.uc.pt/fctuc" target="_blank">
                <img class="partner-logo" src="{{ asset('images/partners/fctuc.png') }}" alt="Placeholder image">
            </a>
            <a class="slick-item" href="//portal.i9magazine.pt/" target="_blank">
                <img class="partner-logo" src="{{ asset('images/partners/i9.png') }}" alt="Placeholder image">
            </a>
            <a class="slick-item" href="//www.ipn.pt/" target="_blank">
                <img class="partner-logo" src="{{ asset('images/partners/ipn.png') }}" alt="Placeholder image">
            </a>
            <a class="slick-item" href="//www.novabase.pt/" target="_blank">
                <img class="partner-logo" src="{{ asset('images/partners/novabase.png') }}" alt="Placeholder image">
            </a>
            <a class="slick-item" href="//www.revista-programar.info" target="_blank">
                <img class="partner-logo" src="{{ asset('images/partners/programar.png') }}" alt="Placeholder image">
            </a>
            <a class="slick-item" href="//redlightsoft.com/" target="_blank">
                <img class="partner-logo" src="{{ asset('images/partners/redlight.svg') }}" alt="Placeholder image">
            </a>
            <a class="slick-item" href="//www.reidosfrangos.pt" target="_blank">
                <img class="partner-logo" src="{{ asset('images/partners/reidosfrangos.svg') }}" alt="Placeholder image">
            </a>
            <a class="slick-item" href="//www.trifida.pt" target="_blank">
                <img class="partner-logo" src="{{ asset('images/partners/trifida.png') }}" alt="Placeholder image">
            </a>
            <a class="slick-item" href="//www.whitesmith.co/" target="_blank">
                <img class="partner-logo" src="{{ asset('images/partners/whitesmith-logo.svg') }}" alt="Placeholder image">
            </a>
            <a class="slick-item" href="//www.wit-software.com/" target="_blank">
                <img class="partner-logo" src="{{ asset('images/partners/wit.png') }}" alt="Placeholder image">
            </a>
          </div>
        </div>
      </div>
@endsection
