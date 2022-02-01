<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TeamRequest;
use App\Team;
use App\Edition;
use App\User;
use Auth;

class TeamsController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');

    }


    public function index()
    {
      // TODO: Apply middleware
      // 1. No Team -> Create team
      // 2. Has Team -> Show profile
        $section = 'teams';
        $teams   = Team::all()->filter(
            function($team) {
                $edition = Edition::where('active', true)->first();
                return $team->edition_id == $edition->id;
            }
        );

        return view('teams.index', compact('section', 'teams'));

    }


    // TODO: Middleware if has team cant access
    public function create()
    {
        $section = 'teams';

        return view('teams.create', compact('section'));

    }


    public function store(TeamRequest $request) {
        $user = Auth::user();

        if ($user->isShifter() && !$user->currentTeam()) {
            $edition = Edition::where('active', true)->first();

            $image     = $request->file('team_logo');
            $logo_path = null;
            if ($image != null) {
                $logo_path = time().'.'.$image->getClientOriginalExtension();

                $destination_path = public_path('images/photos');
                $image->move($destinationPath, $logo_path);
            }

            $team = Team::create(
                [
                    'name' => $request->team_name,
                    'owner_id' => Auth::user()->id,
                    'edition_id' => $edition->id,
                    'logoPath' => $logo_path,
                    'project_name' => $request->project_name,
                    'project_url' => $request->project_url,
                    'project_description' => $request->project_description
                ]
            );

            $team->shifters()->attach(Auth::user()->id);
            if ($request->card0) {
              $team->shifters()->attach(intval($request->card0));
            }

            if ($request->card1) {
              $team->shifters()->attach(intval($request->card1));
            }

            if ($request->card2) {
              $team->shifters()->attach(intval($request->card2));
            }

            if ($request->card3) {
              $team->shifters()->attach(intval($request->card3));
            }

            return redirect()->route('teams.create');
        } else {
          return redirect()->route('teams.index')->with('status', 'error');
        }

    }


    // TODO - DATA BINDING NOT CORRECTED
    public function show(Team $team)
    {
        $section = 'teams';

        return view('teams.show', compact('team', 'section'));

    }


    // TODO - DATA BINDING NOT CORRECTED
    public function edit(Team $team)
    {
        $section = 'teams';
        if ((Auth::user()->isShifter() && Auth::user()->id == $team->owner->id) || (Auth::user()->isAdmin())) {
            return view('teams.edit', compact('team', 'section'));
        } else {
            return redirect()->route('teams.show', ['team' => $team->id]);
        }

    }


    // TODO - DATA BINDING NOT CORRECTED
    public function update(TeamRequest $request, Team $team)
    {
        if (isset($request['add_shifter'])) {
            if ($team->shifters()->count() < 4) {
                $user = User::find($request['add_shifter']);
                if ($user->shifter->team()->count() == 0) {
                    $team->shifters()->attach($user->shifter->id);
                    return redirect()->route('teams.edit', ['team' => $team->id])->with('status', 'success');
                }
            }

            return redirect()->route('teams.edit', ['team' => $team->id])->with('status', 'error');
        } else if (isset($request['remove_shifter'])) {
            $team->shifters()->detach($request['remove_shifter']);
                return redirect()->route('teams.edit', ['team' => $team->id])->with('status', 'success');
        } else {
            $team->project()->update(['name' => $request['name'], 'description' => $request['description']]);
        }

        return redirect()->route('teams.edit', ['team' => $team->id])->with('status', 'success');

    }


    // TODO
    public function destroy(Team $team)
    {

    }


}
