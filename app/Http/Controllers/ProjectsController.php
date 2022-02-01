<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Team;
use App\Http\Requests\ProjectRequest;

class ProjectsController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.admin')->only('index', 'create', 'store', 'edit', 'update', 'show', 'destroy');

    }


    // TODO
    public function index()
    {
        $projects = Project::all();
        $section  = 'project';

        return view('projects.index', compact('projects', 'section'));//

    }


    // TODO
    public function create()
    {
        $section = 'project';

        return view('projects.create', compact('section'));

    }


    public function store(ProjectRequest $request)
    {
        $team = Team::where('id', $request->team_id)->first();

        $team->projects()->create($request->all());

        return redirect()->route('projects.index');

    }


    // TODO
    public function show(Project $project)
    {
        $section = 'project';

        return view('projects.show', compact('project', 'section'));

    }


    // TODO
    public function edit(Project $project)
    {
        $section = 'project';

        return view('projects.edit', compact('project', 'section'));

    }


    public function update(ProjectRequest $request, Project $project)
    {
        $project->update($request->all());

        return redirect()->route('projects.index');

    }


    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index');

    }


}
