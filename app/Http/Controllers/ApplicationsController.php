<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\BadgesRequest;
use App\Http\Requests\ApplicationRequest;
use App\User;
use App\Edition;
use Auth;
use App\Skill;
use App\Application;
use Carbon\Carbon;

class ApplicationsController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.custom');
        $this->middleware('auth.shifter')->only('create', 'store', 'edit', 'update');

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $edition          = Edition::where('active', true)->first();
        $application_user = Application::where([['user_id', Auth::user()->id], ['edition_id', $edition->id]])->get();

        if (Auth::user()->isUser()) {
            if ($application_user->isEmpty()) {
                return redirect()->route('applications.create');
            } else if (!$application_user->isEmpty()) {
                return redirect()->route('applications.edit', ['applications' => $application_user->first()]);
            } else {
                return redirect()->route('applications.show', ['applications' => Auth::user()->applications()]);
            }
        }

        if (Auth::user()->isShifter()) {
            return redirect()->route('applications.edit', ['applications' => $application_user->first()]);
        }

        $applications = Application::where('edition_id', $edition->id)->distinct()->get();
        $ids          = [];
        $i            = 0;
        foreach ($applications as $application) {
            if (!in_array($application->user->id, $ids)) {
                array_push($ids, $application->user->id);
            } else {
                $applications->forget($i);
            }

            $i++;
        }

      $applications = Application::where('edition_id', $edition->id)->distinct()->get();
      $ids          = [];
      $i            = 0;
      foreach ($applications as $application) {
        if (!in_array($application->user->id, $ids)) {
          array_push($ids, $application->user->id);
        } else {
          $applications->forget($i);
        }

        $i++;
      }

      $section = 'application';

      return view('applications.index', compact('applications', 'section'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edition          = Edition::where('active', true)->first();
        $application_user = Application::where([['user_id', Auth::user()->id], ['edition_id', $edition->id]])->get();

        if (!Auth::user()->isUser()) {
            return redirect()->route('403');
        }

        if (!$application_user->isEmpty()) {
            return redirect()->route('applications.edit', ['application' => $application_user->first()]);
        }

        $section = 'application';

        return view('applications.create', compact('section'));

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApplicationRequest $request)
    {
        $user = Auth::user();

        $edition     = Edition::where('active', true)->first();
        $application = $user->applications()->create(
            [
                'pitch' => $request->pitch,
                'urls' => $request->urls,
                'comments' => $request->comments,
                'isFirstTime' => $request->isFirstTime,
                'isAccepted' => $request->isAccepted,
                'tshirt' => $request->tshirt,
                'edition_id' => $edition->id,
                'user_id' => $user->id,
                'shifter_id' => $user->id,
            ]
        );

        $user->update($request->all());

        $skills = explode(' ', $request->skills);

        foreach ($skills as $s) {
            if ($s != "") {
                $skill = Skill::firstOrCreate(['name' => $s]);
                $user->skills()->attach($skill);
            }
        }

        return redirect()->route('user.index', ['success' => 'applications_create']);

    }


    /**
     * Display the specified resource.
     *
     * @param  int $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        if (!Auth::user()->isAdmin()) {
            return redirect()->route('403');
        }

        $section = 'application';
        return view('applications.show', compact('application', 'section'));

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        Auth::user()->skills = "";
        foreach (Auth::user()->skills()->get(['name']) as $skill) {
            Auth::user()->skills .= $skill->name.' ';
        }

        $section = 'application';

        return view('applications.edit', compact('application', 'skills', 'section'));

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $application
     * @return \Illuminate\Http\Response
     */
    public function update(ApplicationRequest $request, Application $application)
    {
        $user = Auth::user();

        $edition = Edition::where('active', true)->first();

        $application->update(
            [
                'pitch' => $request->pitch,
                'urls' => $request->urls,
                'comments' => $request->comments,
                'isFirstTime' => $request->isFirstTime,
                'isAccepted' => $request->isAccepted,
                'isStudent' => $request->isStudent,
                'tshirt' => $request->tshirt,
                'edition_id' => $edition->id,
                'user_id' => $user->id,
                'shifter_id' => $user->id,
            ]
        );

        Auth::user()->update($request->all());

        $skills = explode(' ', $request->skills);

        $user->skills()->delete();

        foreach ($skills as $s) {
            if ($s != "") {
                $skill = Skill::firstOrCreate(['name' => $s]);
                $user->skills()->attach($skill);
            }
        }

        return redirect()->route('user.index', ['success' => 'applications_edit']);

    }


    public function evaluate(Request $request, Application $application) {
        $application->update(['isAccepted' => $request['isAccepted']]);
        $user = $application->user()->first()->id;
        $user = User::find($user);
        if ($request['isAccepted'] == "1") {
            $user->setShifter();
        } else if ($request['isAccepted'] == "0") {
            $user->setUser();
        }

        $user->update();

        return redirect()->route('applications.index')->with('status', 'success');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        //
        $application->delete();

        return redirect('platform/applications');

    }


    public function exportApplications() {
        $edition      = Edition::where('active', true)->first();
        $applications = Application::where('edition_id', $edition->id)->distinct()->get();
        $ids          = [];
        $i            = 0;
        foreach ($applications as $application) {
            if (!in_array($application->user->id, $ids)) {
                array_push($ids, $application->user->id);
            } else {
                $applications->forget($i);
            }

            $i++;
        }

        $csv_data = ['Name,Age,Email,Location,Contact,Type,isStudent,University,Course,Institution,Function,Bio,Pitch,Skills,Twitter,Github,Website,T-Shirt'];
        foreach ($applications as $application) {
            $skills        = $application->user()->first()->skills()->get();
            $skills_to_csv = [];
            foreach ($skills as $skill) {
                $skills_to_csv[] = $skill->name;
            }

            $csv_data[] = $application->user()->first()->name.','.$application->user()->first()->age.','.$application->user()->first()->email.','.str_replace(',', '.', $application->user()->first()->location).','.$application->user()->first()->phoneNumber.','.$application->user()->first()->type.','.$application->user()->first()->isStudent.','.$application->user()->first()->university.','.$application->user()->first()->course.','.$application->user()->first()->institution.','.str_replace(',','.', $application->user()->first()->function).','.str_replace(',', '.', $application->user()->first()->bio).','.str_replace(',', '.', $application->pitch).','.implode("|", $skills_to_csv).','.$application->user()->first()->twitter.','.$application->user()->first()->github.','.str_replace(',', '.',$application->user()->first()->website).','.$application->tshirt;
        }

        $filename  = 'shiftappens_applications.csv';
        $file_path = base_path().'/'.$filename;
        $file      = fopen($file_path,"w+");
        foreach ($csv_data as $data) {
            fputcsv($file,explode(',',$data));
        }

        fclose($file);
        $headers = ['Content-Type' => 'text/csv'];
        return response()->download($file_path, $filename, $headers);

    }


}
