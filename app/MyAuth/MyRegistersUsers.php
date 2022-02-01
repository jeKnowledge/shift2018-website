<?php

namespace App\MyAuth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RedirectsUsers;
use App\Http\Requests\RegisterRequest;
use App\User;
use App\Role;

trait MyRegistersUsers {
    use RedirectsUsers;


    // return register view
    public function showRegistrationForm() {
        return view('auth.register');

    }


    // On user registered return true
    //  else return redirect to current path
    public function register(RegisterRequest $request) {
        $request['password'] = bcrypt($request->password);

        $user = User::createUser($request->all());

        //Login user that was created
        $this->guard()->login($user);

        if ($this->registered($request, $user)) {
          return true;
        }

        return redirect($this->redirectPath());

    }


    // return StatefulGuard
    protected function guard()
    {
        return Auth::guard();

    }


    // return TODO
    protected function registered(RegisterRequest $request, $user) {

 }


}
