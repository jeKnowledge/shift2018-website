<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use \Illuminate\Http\Request;

class CustomAuthorization {


    public function handle(Request $request, Closure $next) {
        switch ($request->route()->getName()) {
        case 'applications.show':
            if (Auth::user()->isShifter()) {
                if ($request->route('application')->user->id != Auth::user()->id) {
                    return redirect()->route('home');
                }
            }
            break;
        case 'applications.edit':
            if (Auth::user()->isShifter()) {
                if ($request->route('application')->user->id != Auth::user()->id) {
                    return redirect()->route('home');
                }
            }
            break;
        case 'applications.update':
            if (Auth::user()->isShifter()) {
                if ($request->route('application')->user->id != Auth::user()->id) {
                    return redirect()->route('home');
                }
            }
            break;
        case 'applications.delete':
            if (Auth::user()->isShifter()) {
                if ($request->route('application')->user->id != Auth::user()->id) {
                    return redirect()->route('home');
                }
            }
            break;
        case 'users.edit':
            if (Auth::user()->isShifter()) {
                if ($request->route('user')->id != Auth::user()->id) {
                    return redirect()->route('home');
                }
            }
            break;
        case 'shifters.index':
            if (Auth::user()->isUser()) {
                return redirect()->route('home');
            }
            break;
        case 'shifters.show':
            if (Auth::user()->isShifter()) {
                if ($request->route('shifter')->id != Auth::user()->id) {
                    return redirect()->route('home');
                }
            }

            if (!Auth::user()->isShifter() && !Auth::user()->isAdmin()) {
                return redirect()->route('home');
            }
            break;
        case 'contests.create':
            if (!Auth::user()->isAdmin()) {
                return redirect()->route('home');
            }

        case 'contests.edit':
            if (Auth::user()->isPartner()) {
                if ($request->route('contest')->partner_id != Auth::user()->partner_id) {
                    return redirect()->route('contests.index');
                }
            } else if (!Auth::user()->isAdmin()) {
                return redirect()->route('home');
            }

        default:
            // code...
            break;
        }

        return $next($request);

    }


}
