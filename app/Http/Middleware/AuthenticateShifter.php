<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AuthenticateShifter
{


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::user()->isUser() && !Auth::user()->isShifter()) {
            return redirect()->route('403');
        }

        return $next($request);

    }


}
