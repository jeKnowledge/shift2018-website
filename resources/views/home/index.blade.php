@extends('layouts.platform')

@section('content')
	<div class="section section-large section-dashboard">
			<div class="section-left section-text">
                    @if (!Auth::user()->isPartner())
                        <h1 class="title is-3">Welcome &nbsp;<span class="mopster">Shifter!</span></h1>
                    @elseif (Auth::user()->isPartner())
                        <h1 class="title is-3">Welcome &nbsp;<span class="mopster">Partner!</span></h1>
                    @endif
					<span class="margin-24"></span>
                    @if (!Auth::user()->isPartner())
                        <p class="subtitle is-5">
                                This is <span class="mopster">SA</span>'s Platform, the place where you can find your application form,
                                the place where you can create your team, see other <span class="mopster">Shifters</span>, learn about
                                challenges and create the most incredible profile ever!
                        </p>
                    @elseif (Auth::user()->isPartner())
                        <p class="subtitle is-5">
                                This is <span class="mopster">SA</span>'s Platform, the place where you can find our Shifter's applications,
                                see other <span class="mopster">Shifters</span> and <span class="mopster"> Partners</span>, learn about
                                challenges and edit yours, and create the most incredible profile ever!
                        </p>
                    @endif
					<p class="subtitle is-5">
						But there's still a little while before it all starts...
					</p>
					<span class="margin-24"></span>
					<h1 class="title is-1" id="contdowndinamica">&nbsp;</h1>
			</div>

			<div class="section-right section-text has-text-centered">
				<h1 class="title is-3">Applications are here!</h1>
				<span class="margin-24"></span>
                @if (!Auth::user()->isPartner())
                    <p class="subtitle is-5">
                        You can now submit your application <span class="mopster"> Shifter! </span>Are you ready for this year's edition?
                    </p>
                    <a class="button is-black" href='{{ url('platform/applications/create') }}'>Apply now!</a>
                @elseif (Auth::user()->isPartner())
                    <p class="subtitle is-5">
                        You can now watch our Shifter's applications <span class="mopster"> Partner! </span>Are you ready for this year's edition?
                    </p>
                    <a class="button is-black" href='{{ url('platform/applications/') }}'>Watch now!</a>
                @endif

			</div>
	</div>

	<script src="/js/countdown.js"></script>
@endsection
