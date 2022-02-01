<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FAQ;
use App\Edition;
use Carbon\Carbon;
use App\Http\Requests\FAQRequest;

class FAQsController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.admin')->only('create', 'store', 'edit', 'update', 'destroy', 'index');

    }


    // TODO
    public function index()
    {
        //
        $section = 'faqs';
        $faqs    = FAQ::all();

        return view('faqs.index', compact('section', 'faqs'));

    }


    // TODO
    public function create()
    {
        //
        $section = 'faqs';

        return view('faqs.create', compact('section'));

    }


    // TODO
    public function store(FAQRequest $request)
    {
        //

        $edition = Edition::where('year', Carbon::now()->year)->first();
        $section = 'faqs';

        $edition->faqs()->create($request->all());

        return redirect()->route('faqs.index');

    }


    // TODO
    public function show(FAQ $faq)
    {
        //
        $section = 'faqs';

        return view('faqs.show', compact('section', 'faq'));

    }


    // TODO
    public function edit(FAQ $faq)
    {
        //
        $section = 'faqs';

        return view('faqs.edit', compact('section', 'faq'));

    }


    public function update(FAQRequest $request, FAQ $faq)
    {
        $section = 'faqs';

        $faq->update($request->all());

        return redirect()->route('faqs.index');

    }


    public function destroy(FAQ $faq)
    {
        //
        $section = 'faqs';

        $faq->delete();

        return redirect()->route('faqs.index');

    }


}
