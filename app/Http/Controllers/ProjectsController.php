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

        $attributes = request()->validate([
            'name'   => ['required', 'min:4', 'max:255', 'regex:/^[a-zA-Z0-9\]*[a-zA-Z]+[a-zA-Z0-9\s]*$/'],
            'dob'    => ['required'],
            'gender' => ['required'],
            'mail'   => ['required', 'email'],
            'phone'  => ['required', 'regex:/^([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])$/'],
            'description' => '',
            'avatar' => ['max:3000', 'image']
        ]);

        if (request()->avatar) {
            request()->file('avatar')->store('public');
            $fileName = request()->file('avatar')->hashName();
            $attributes['avatar'] = $fileName;
        }

        Project::create($attributes);

        return redirect('/projects');
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project)
    {
        $attributes = request()->validate([
            'name'   => ['required', 'min:4', 'max:255', 'regex:/^[a-zA-Z0-9\]*[a-zA-Z]+[a-zA-Z0-9\s]*$/'],
            'dob'    => ['required'],
            'gender' => ['required'],
            'mail'   => ['required', 'email'],
            'phone'  => ['required', 'min:10', 'max:11', 'regex:/^[0-9]*[0-9]$/'],
            'description' => '',
            'avatar' => ['max:3000', 'image']
        ]);

        if (request()->avatar) {
            request()->file('avatar')->store('public');
            $fileName = request()->file('avatar')->hashName();
            $attributes['avatar'] = $fileName;
        }

        $project->update($attributes);

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
