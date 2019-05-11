<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project\Store;
use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::paginate(5);
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Store $request)
    {
        $attributes = $request->validated();
        if ($request->avatar) {
            $request->file('avatar')->store('public');
            $fileName = $request->file('avatar')->hashName();
            $attributes['avatar'] = $fileName;
        }
        Project::create($attributes);
        return redirect()->route('projects.index');
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project, Store $request)
    {
        $attributes = $request->validated();
        if ($request->avatar) {
            $request->file('avatar')->store('public');
            $fileName = $request->file('avatar')->hashName();
            $attributes['avatar'] = $fileName;
        }
        $project->update($attributes);
        return redirect()->route('projects.index');
    }

    public function destroy(Project $project, Request $request)
    {
        $current = $request->current_page;
        $project->delete();
        return redirect()->route('projects.index', ['page' => $current]);
    }


    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function trash()
    {
        $projects = Project::onlyTrashed()->get();
        return view('projects.trash', compact('projects'));
    }

    public function deleteforever($id)
    {
        Project::withTrashed()->where('id', $id)->forceDelete();
        return redirect()->route('projects.trash');
    }

    public function restore($id)
    {
        Project::withTrashed()->where('id', $id)->restore();
        return redirect()->route('projects.trash');
    }
}
