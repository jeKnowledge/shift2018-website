@extends('layouts.platform')

@section('content')

    <div class="section section-small">
      <div class="section-left section-text">
        <table class="table fw">
            <thead>
                <tr>
                    <td>Index</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Status</td>
                    <td>T-Shirt</td>
                    @if (Auth::user()->isAdmin())
                       <td>&nbsp;</td>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($applications as $application)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$application->user->name}}</td>
                        <td>{{$application->user->email}}</td>
                        @if ($application->isAccepted != 0)
                            <td>Aceite</ld>
                        @else
                            <td> - </td>
                        @endif
                        <td>{{$application->tshirt}}</td>
                        @if (Auth::user()->isAdmin())
                        <td class="t-right">
                            <a href="{{route('applications.show', ['application' => $application->id])}}">Detalhes</a>
                        </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
      </div>

      <div class="section-right section-text">
      @if (Auth::user()->isAdmin() || Auth::user()->isPartner()) 
          <a href="{{ action('ApplicationsController@exportApplications') }}" class="button is-black is-fullwidth"> Export as CSV </a>
      @endif 
      </div>
    </div>


@endsection
