@extends('layouts.platform')

@section('content')
	<div class="edit-profile">

			<div>
		            @foreach ($events as $event)

						<div display="inline-block">
							<a href="{{ route('events.show', ['event' => $event]) }}">{{ $event->name }}</a> 
              @if (!Auth::user()->isShifter())
							  <a href="{{ route('events.edit', ['event' => $event]) }}">Edit</a>
              @endif
						</div>

		            @endforeach
			</div>

			<br>

			<a href="{{ url('platform/events/create ')}}" class='button'>Novo Evento</a>

	</div>

@endsection
