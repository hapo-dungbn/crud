<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::all();


        return view('projects.index', compact('projects'));
    }

    public function create()

    {
        return view('projects.create');
    }

    public function store()

    {
        request()->file('avatar')->store('public');
        $fileName = request()->file('avatar')->hashName();

        $project = new Project();

//        $project->save();

        $attributes = request()->validate([
            'name'   => ['required', 'min:3', 'max:255'],
            'dob'    => ['required'],
            'gender' => ['required'],
            'mail'   => ['required', 'min:3', 'max:255'],
            'phone'  => ['required'],
            'description' => '',
            'avatar' => ''
        ]);

        $attributes['avatar'] = $fileName;

        Project::create($attributes);

        return redirect('/projects');

    }

    public function edit(Project $project)

    {
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project)

    {
        $project->update(request(['name', 'dob', 'gender', 'mail', 'phone', 'description', 'avatar']));

        return redirect('/projects');
    }

    public function destroy(Project $project)

    {
        $project->delete();

        return redirect('/projects');
    }

    public function show(Project $project)

    {
        return view('projects.show', compact('project'));
    }
}
