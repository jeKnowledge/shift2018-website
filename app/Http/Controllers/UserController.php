<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Role;
use Image;
use Auth;

class UserController extends Controller {


    public function __construct() {
        $this->middleware('auth');
        $this->middleware('auth.user');

    }


    // return user view
    public function index(Request $request) {
        $team = Auth::user()->currentTeam();

        if ($team == null) {
          $shifters = array_fill(0, 4, null);
        } else {
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
        }

        $success_messages = [
            "team_create" => "Team successfully created",
            "user_edit" => "Profile successfully updated",
            "change_password" => "Password successfully updated",
            "join_team" => "Joined team successfully",
            "leave_team" => "Left team successfully",
            "decline_team" => "Declined invited successfully",
            "applications_create" => "Application created successfully ",
            "applications_edit" => "Application updated successfully"
        ];

        if (isset($request["success"])) {
          $request->session()->put("status", "success");
          $success_message = $success_messages[$request["success"]];
        } else {
          $request->session()->put("status", null);
        }

        $team_invites = Auth::user()->teamInvites()->get();

        return view('user.index', compact("team", "shifters", "success_message", "team_invites"));

    }


    public function update(UserRequest $request, User $user)
    {
      if (isset($request['password'])) {
          if (!Hash::check($request['old_password'], $user['password'])) {
            return response()->json(["status" => "failed", "old_password" => ["Wrong password"]]);
          }

          $request['password'] = bcrypt($request['password']);
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

      if ($request['age'] == "") {
          unset($request['age']);
      }

      if ($request['phoneNumber'] == "") {
          unset($request['phoneNumber']);
      }

      $user->update($request->all());

      if (Auth::user()->isPartner()) {
        $user->partner()->first()->update($request->all());
      }

      return response()->json(["status" => "success"]);

    }


}
