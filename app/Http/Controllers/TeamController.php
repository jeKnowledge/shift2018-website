<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TeamRequest;
use App\Http\Requests\TeamRequest2;
use App\Team;
use App\Edition;
use App\User;
use Auth;

class TeamController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.team');

    }


    public function store(TeamRequest $request) {
        $edition = Edition::where('active', true)->first();

        $image     = $request->file('team_logo');
        $logo_path = null;
        if ($image != null) {
            $logo_path = time().'.'.$image->getClientOriginalExtension();

            $destinationPath = public_path('images/teams');
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

        $team->shifters()->attach(intval($request->card0));

        if ($request->card1) {
          $team->invitedShifters()->attach(intval($request->card1));
        }

        if ($request->card2) {
          $team->invitedShifters()->attach(intval($request->card2));
        }

        if ($request->card3) {
          $team->invitedShifters()->attach(intval($request->card3));
        }

        return response()->json(["status" => "success"]);

    }


    public function searchShifters(Request $request) {
    $edition = Edition::where('active', true)->first();
    $shifters_with_teams = Team::where('edition_id',$edition->id)->get()->map(
        function($team, $key) {
            return $team->shifters()->pluck('shifter_id');
          }
    )->flatten();

      if ($request->name == '') {
        $users = User::where('role', User::Shifter)
                  ->where('id', '!=', Auth::user()->id)
                  ->whereNotIn('id', $shifters_with_teams)
                  ->get();
      } else {
        $users = User::where('name', 'like', '%'.$request->name.'%')
                  ->where('role', User::Shifter)
                  ->where('id', '!=', Auth::user()->id)
                  ->whereNotIn('id', $shifters_with_teams)
                  ->get();
      }

    $users = $users->map(
        function($user, $key) {
        if ($user->photoPath != "" && !$user->hasUrlPhoto()) {
          $user->photoPath = "/images/photos/".$user->photoPath;
        } else if ($user->photoPath == "") {
          $user->photoPath = "/images/shift18/platform/default_profile.png";
        }

        return $user;
        }
    );

      return $users;

    }


    public function join(Request $request) {
      $team = Auth::user()->teamInvites()
        ->where('team_id', $request->team_id)->first();
      $team->shifters()->attach(Auth::user()->id);
      Auth::user()->teamInvites()->detach($team->id);

      return redirect('platform/user?success=join_team');

    }


    public function invite(Request $request) {
      $team    = Auth::user()->currentTeam();
      $shifter = User::where('id', $request->shifter_id)->get()->first();

      if (!$shifter->currentTeam()) {
        $team->invitedShifters()->attach($shifter->id);

        return response()->json(["status" => "success"]);
      } else {
        return response()->json(["status" => "failure", "error" => "Already has team"]);
      }

    }


    public function uninvite(Request $request) {
      $team    = Auth::user()->currentTeam();
      $shifter = User::where('id', $request->shifter_id)->get()->first();

      $team->invitedShifters()->detach($shifter->id);

      return response()->json(["status" => "success"]);

    }


    public function update(TeamRequest2 $request) {
      $team   = Auth::user()->currentTeam();
      $params = $request->request->all();
      if (isset($params['team_name'])) {
        $params['name'] = $params['team_name'];
        unset($params['team_name']);

        if ($params['name'] == '') {
          return response()->json(["status" => "faliure", 'team_name' => ['Team name is mandatory']]);
        }

        if (Team::where('name', $params['name'])->first() != null && $params['name'] != $team->name) {
          return response()->json(["status" => "faliure", 'team_name' => ['Team name has to be unique']]);
        }
      }

      if (isset($params['project_repository'])) {
        $params['project_url'] = $params['project_repository'];
        unset($params['project_repository']);
      }

      $image = $request->file('team_logo');
      if ($image != null) {
          $params['logoPath'] = time().'.'.$image->getClientOriginalExtension();

          //Save original image
          $destinationPath = public_path('images/teams');
          $image->move($destinationPath, $params['logoPath']);
      }

      unset($params['_token']);

      /*$params = array_filter($params, function($key) use ($params) {
        return $params[$key] !== '';
      }, ARRAY_FILTER_USE_KEY);*/

      $team->update($params);

      return response()->json(["status" => "success"]);

    }


    public function leave(Request $request) {
      $team = Auth::user()->currentTeam();
      $team->shifters()->detach(Auth::user()->id);

      if ($team->shifters()->count() == 0) {
        $team->delete();
      }

      return redirect('platform/user?success=leave_team');

    }


    public function show(Team $team) {
        $section = 'team';

        $team_shifters    = $team->shifters()->get();
        $invited_shifters = $team->invitedShifters()->get();

        $team_shifters = $team_shifters->map(
            function($shifter) {
            $shifter["invited"] = false;
            return $shifter;
            }
        );

        $invited_shifters = $invited_shifters->map(
            function($shifter) {
            $shifter["invited"] = true;
            return $shifter;
            }
        );

          $shifters = $invited_shifters->merge($team_shifters);

          for ($i = count($shifters); $i < 4; ++$i) {
            $shifters[$i] = null;
          }

          foreach ($shifters as $shifter) {
              if ($shifter != null && !($shifter->hasUrlPhoto())) {
                  if ($shifter->photoPath != "") {
                      $shifter->photoPath = asset('images/photos/'.$shifter->photoPath);
                  }
              }
          }

        return view('team.show', compact('team', 'shifters', 'team_shifters' ,'section'));

    }


}
