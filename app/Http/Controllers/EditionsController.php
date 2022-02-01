<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EditionsRequest;
use App\Edition;

class EditionsController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.admin')->only('index', 'show', 'create', 'store', 'edit', 'update', 'destroy');

    }


    // TODO
    public function index()
    {
        $editions = Edition::all();

        $section = 'editions';

        return view('editions.index', compact('editions', 'section'));

    }


    public function create()
    {
        $section = 'editions';
        return view('editions.create', compact('section'));

    }


    public function store(EditionsRequest $request)
    {
        Edition::create($request->all());

        return redirect('platform/editions');

    }


    // TODO
    public function show(Edition $edition)
    {
        $section = 'editions';
        return view('editions.show', compact('edition', 'section'));

    }


    public function edit(Edition $edition)
    {
        $section = 'editions';
        return view('editions.edit', compact('edition', 'section'));

    }


    public function update(EditionsRequest $request, Edition $edition)
    {
        $edition->update($request->all());

        return redirect('platform/editions');

    }


    public function destroy(Edition $edition)
    {
        $edition->delete();

        return redirect('platform/editions');

    }


}
