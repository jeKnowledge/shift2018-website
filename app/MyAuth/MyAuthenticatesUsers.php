<?php

namespace App\MyAuth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;

trait MyAuthenticatesUsers {
    use RedirectsUsers, ThrottlesLogins;


    // return login view
    public function showLoginForm() {
        return view('auth.login');

    }


    // return TODO
    public function login(Request $request) {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);

    }


    // return void
    protected function validateLogin(Request $request) {
        $this->validate(
            $request,
            [
                $this->username() => 'required',
                'password' => 'required',
            ]
        );

    }


    // return bool
    protected function attemptLogin(Request $request) {
        return $this->guard()->attempt(
            $this->credentials($request),
            $request->has('remember')
        );

    }


    // return array
    protected function credentials(Request $request) {
        return $request->only($this->username(), 'password');

    }


    // On user authenticated return true
    //  else return redirect to current path
    protected function sendLoginResponse(Request $request) {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if ($this->authenticated($request, $this->guard()->user())) {
          return true;
        }

        return redirect()->intended($this->redirectPath());

    }


    // return TODO
    protected function authenticated(Request $request, $user) {

 }


    // return redirect back
    protected function sendFailedLoginResponse(Request $request) {
        return redirect()
            ->back()
            ->withInput(
                $request->only(
                    $this->username(),
                    'remember'
                )
            )
            ->withErrors([$this->username() => Lang::get('auth.failed')]);

    }


    // return string
    public function username() {
        return 'email';

    }


    // return redirect to login
    public function logout(Request $request) {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/auth/login');

    }


    // return StatefulGuard
    protected function guard() {
        return Auth::guard();

    }


}
