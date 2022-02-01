<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
use Image;
use Auth;

class UsersController extends Controller {


    public function __construct() {
        $this->middleware('auth');
        $this->middleware('auth.custom');
        $this->middleware('auth.admin')->only('create', 'store', 'destroy', 'index');

    }


    // return user view
    public function index() {
        $users   = User::all();
        $section = 'users';

        return view('users.index', compact('users', 'section'));

    }


    // TODO
    // return user creation view
    public function create() {
        $section = 'users';

        return view('users.create', compact('section'));

    }


    // return redirect to platform.profile with sucess status
    public function store(UserRequest $request) {
        User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => $request->role,
            ]
        );

        return redirect('platform.profile')->with('status', 'sucess');

    }


    // TODO parteners
    // return display user view
    public function show(User $user) {
        $section = 'users';
        return view('users.show', compact('user', 'section'));

    }


    // return user edit view
    public function edit(User $user) {
        $section = 'users';
        return view('users.edit', compact('user', 'section'));

    }


    //  On change_password request
    //    On invalid password
    //      return redirect to platform.changePassword with error status
    //  return redirect to platform.profile with success status
    public function update(UserRequest $request, User $user) {
        if ($request->action == 'change_password') {
            if (Hash::check($request->old_password, $user->password) && $request->password == $request->password_confirmation) {
                $request['password'] = bcrypt($request->password);
            } else {
                return redirect()->route('platform.changePassword')->with('status', 'error');
            }
        }

        $image = $request->file('photoFile');
        if ($image != null) {
            $input['photoPath'] = time().'.'.$image->getClientOriginalExtension();

            //Save original image
            $destinationPath = public_path('images/photos');
            $image->move($destinationPath, $input['photoPath']);

            //Save registration on DB
            $request['photoPath'] = $input['photoPath'];
        }

        if ($request->age == "") {
            $request['age'] = null;
        }

        if ($request->phoneNumber == "") {
            $request['phoneNumber'] = null;
        }

        $user->update($request->all());

        if (Auth::user()->isAdmin()) {
          return redirect()->route('users.index')->with('status', 'success');
        }

        return redirect()->route('platform.profile')->with('status', 'success');

    }


    // return redirect to platform/users
    public function destroy(User $user) {
        $user->delete();

        return redirect('platform/users');

    }


    // return user profile view
    public function profile() {
        $section = 'profile';

        return view('users.profile', compact('section'));

    }


    // return user password change view
    public function changePassword() {
        $section = 'profile';

        $user = Auth::user();

        return view('users.changepassword', compact('section', 'user'));

    }


    // TODO partners
    // return redirect to platform/users
    public function setRole(User $user, UserRequest $request) {
        if ($request->partnerType == 'gold') {
            $userRole = Role::whereName('gold-partner')->first();

            $user->roles()->attach($userRole);
        } else {
            $userRole = Role::whereName('silver-partner')->first();

            $user->roles()->attach($userRole);
        }

        return redirect('platform/users');

    }


    // return users ajax view
    public function search(UserRequest $request) {
        $users = User::advancedSearch($request->type, $request->name);

        return view('users.ajax', compact('users'));

    }


}
