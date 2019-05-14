<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project\Store;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::paginate(config('app.paginate'));
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Store $request)
    {
        $data = $request->all();
        if ($request->avatar) {
            $request->file('avatar')->store('public');
            $fileName = $request->file('avatar')->hashName();
            $data['avatar'] = $fileName;
        }
        Project::create($data);
        return redirect()->route('projects.index');
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project, Store $request)
    {
        $data = $project->avatar;
        $newData = $request->all();
        if ($request->avatar) {
            if (Storage::disk('public')->exists($data)) {
                Storage::disk('public')->delete($data);
            }
            $request->file('avatar')->store('public');
            $fileName = $request->file('avatar')->hashName();
            $newData['avatar'] = $fileName;
        }
        $project->update($newData);
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
        $projects = Project::onlyTrashed()->paginate(config('app.paginate'));
        return view('projects.trash', compact('projects'));
    }

    public function deletfForever($id)
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
