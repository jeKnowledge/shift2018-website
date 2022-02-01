<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContestRequest;
use App\Contest;
use App\Edition;
use App\Partner;
use Auth;

class ContestsController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.custom');

    }


    // TODO
    public function index(Request $request)
    {
        $edition  = Edition::where('active', true)->first();
        $contests = Contest::where('edition_id', $edition->id)->get();
        $team     = Auth::user()->currentTeam();

        if ($team != NULL) {
          $contests_signedup  = [];
          $contests_to_signup = [];

          foreach ($contests as $contest) {
            if ($contest->teams()->where('team_id', $team->id)->first() != NULL) {
              $contest->signedup = 1;
              array_push($contests_signedup, $contest);
            } else {
              $contest->signedup = 0;
              array_push($contests_to_signup, $contest);
            }
          }

          $contests = array_merge($contests_signedup, $contests_to_signup);

          $has_team = 1;
        } else {
          $has_team = 0;
        }

        $success_messages = [
            "signup" => "Contest signed up sucessfully",
            "signout" => "Contest signed out sucessfully"
        ];

        if (isset($request["success"])) {
          $request->session()->put("status", "success");
          $success_message = $success_messages[$request["success"]];
        } else {
          $request->session()->put("status", null);
          $success_message = null;
        }

        $section = 'contests';

        return view('contests.index', compact('contests', 'section', 'has_team', 'success_message'));

    }


    // TODO
    public function create()
    {
        $edition  = Edition::where('active', true)->first();
        $partners = Partner::where('edition_id', $edition->id)->get();
        $section  = 'contests';
        return view('contests.create', compact('section','partners'));

    }


    // TODO
    public function store(ContestRequest $request)
    {
        $edition = Edition::where('active', true)->first();
        $contest = Contest::create(
            [
                'name' => $request->name,
                'description' => $request->description,
                'documentation' => $request->documentation,
                'prize' => $request->prize,
                'edition_id' => $edition->id,
                'partner_id' => $request->partner_id
            ]
        );

        return redirect('platform/contests');

    }


    // TODO
    public function show(Contest $contest)
    {
        $section = 'contests';
        return view('contests.show', compact('contest', 'section'));

    }


    // TODO
    public function edit(Contest $contest)
    {
        $section = 'contests';
        return view('contests.edit', compact('contest', 'section'));

    }


    public function update(ContestRequest $request, Contest $contest)
    {
      try {
        $contest->update($request->all());
      } catch (\Exception $e) {
        return redirect()->route('contests.edit', [ 'contest' => $contest->id ])->withErrors('errors','x');
      } catch (\Throwable $t) {
        return redirect()->route('contests.edit', [ 'contest' => $contest->id ])->withErrors('errors','x');
      }

      return redirect('platform/contests');

    }


    public function destroy(Contest $contest)
    {
        $contest->delete();

        return redirect('platform/contests');

    }


    public function signup(Request $request) {
      $team    = Auth::user()->currentTeam();
      $contest = Contest::where('id', $request->contest_id)->first();
      $contest->teams()->attach($team->id);

      return redirect('platform/contests?success=signup');

    }


    public function signout(Request $request) {
      $team    = Auth::user()->currentTeam();
      $contest = Contest::where('id', $request->contest_id)->first();
      $contest->teams()->detach($team->id);

      return redirect('platform/contests?success=signout');

    }


}
