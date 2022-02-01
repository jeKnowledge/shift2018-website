@extends('layouts.platform')

@section('content')

	<h1>Partners</h1>
    <div>
        <ul>
            @foreach ($partners as $partner)
                <li><a href="{{ route('partners.show', ['partner' => $partner]) }}">{{ $partner->name }}</a></li>
            @endforeach
        </ul>
    </div>

    @if (Auth::user()->isAdmin())
        <a href="{{ route('partners.create') }}" class='button'>New Partner</a>
    @endif

@endsection
