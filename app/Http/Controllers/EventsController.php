<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EventsRequest;
use App\Event;
use App\Edition;
use Carbon\Carbon;

class EventsController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.admin')->only('create', 'store', 'edit', 'update', 'destroy', 'index');

    }


    // TODO
    public function index()
    {
        $edition = Edition::where('active', true)->first();
        $events  = Event::where('edition_id', $edition->id)->get();
        $section = 'event';

        return view('events.index', compact('events', 'section'));

    }


    // TODO
    public function create()
    {
        $section = 'event';

        return view('events.create', compact('section'));

    }


    // TODO
    public function store(EventsRequest $request)
    {

        $edition = Edition::where('active', true)->first();
        $section = 'event';
        $edition->events()->create($request->all());

        return redirect()->route('events.index');

    }


    // TODO
    public function show($event)
    {
        $section = 'event';

        return view('events.show', compact('event', 'section'));

    }


    // TODO
    public function edit($event)
    {
        $section = 'event';

        return view('events.edit', compact('event', 'section'));

    }


    public function update(EventsRequest $request, $event)
    {
        $event->update($request->all());
        $section = 'event';

        return redirect('platform/events')->with(compact('section'));

    }


    public function destroy($event)
    {
        $event->delete();
        $section = 'event';

        return redirect('platform/events')->with(compact('section'));

    }


}
