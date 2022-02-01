<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shifter;
use Auth;
use App\Edition;
use App\User;

class ShiftersController extends Controller
{
    // QUESTION SUSPICIONS BEHAVIOUR
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.custom');

    }


    public function index()
    {
        $shifters = User::all()->filter(
            function ($user) {
                $edition = Edition::where('active', true)->first();
                return $user->isShifter() && $user->applications()->orderBy('applications.id','desc')->first()->edition_id == $edition->id;
            }
        );

        $section = 'shifters';

        return view('shifters.index', compact('shifters', 'section'));

    }


    public function show(User $shifter)
    {
        $section = 'shifters';
        //if(Auth::user()->isGoldPartner()){
        if ($shifter->allowPartners) {
            return view('shifters.show', compact('shifter', 'section'));
        } else {
                return redirect()->route('shifters.index');
        }

        /*
        }
        else
            return view('shifters.show', compact('shifter', 'section'));
        */

    }


}
