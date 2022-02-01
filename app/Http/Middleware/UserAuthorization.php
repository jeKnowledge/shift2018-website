<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use \Illuminate\Http\Request;

class UserAuthorization {


    public function handle(Request $request, Closure $next) {
        $user = Auth::user();

        switch ($request->route()->getName()) {
          case 'user.index':
            if ($user->isAdmin()) {
              return redirect()->route('users.index');
            } else if (!$user->isUser() && !$user->isShifter() && !$user->isPartner()) {
              return redirect()->route('home');
            }
            break;
          case 'user.update':
            if (!Auth::user()->isUser() && !$user->isShifter() && !$user->isPartner()) {
                return redirect()->route('403');
            }
            break;
          default:
              // code...
              break;
        }

        return $next($request);

    }


}
