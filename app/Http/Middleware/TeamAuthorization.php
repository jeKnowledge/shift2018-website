<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use \Illuminate\Http\Request;

class TeamAuthorization {


    public function handle(Request $request, Closure $next) {
        $user = Auth::user();
        switch ($request->route()->getName()) {
          case 'team.store':
            if ($user->isShifter() && $user->currentTeam()) {
              return redirect()->route('team.index');
            } else if (!$user->isShifter()) {
              return redirect()->route('home');
            }
            break;
          case 'team.search.shifters':
            if (!$user->isShifter() && !$user->isUser()) {
              return redirect()->route('home');
            }
            break;
          case 'team.join':
            $invited_to_team = $user->teamInvites()->where('team_id', $request->team_id)->first();
            if ($user->currentTeam() || !$invited_to_team) {
              return redirect()->route('user.index');
            }
            break;
          case 'team.invite':
            $has_team       = $user->currentTeam();
            $n_team_members = count($user->currentTeam()->shifters()->get());

            if (!($has_team && $n_team_members < 4)) {
              return redirect()->route('user.index');
            }
            break;
          case 'team.uninvite':
            $invited_shifters = $user->currentTeam()->invitedShifters()->where('shifter_id', $request->shifter_id)->get();

            if (!count($invited_shifters)) {
              return redirect()->route('user.index');
            }
            break;
          case 'team.update':
            $has_team = $user->currentTeam();

            if (!$has_team) {
              return redirect()->route('user.index');
            }
            break;
          case 'team.leave':
            $has_team = $user->currentTeam();

            if (!$has_team) {
              return redirect()->route('user.index');
            }
            break;
          case 'team.show':
            break;
          default:
            return redirect()->route('home');
            break;
        }

        return $next($request);

    }


}
