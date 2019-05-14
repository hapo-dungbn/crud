<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project\Store;
use App\Project;
use Carbon\Carbon;
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
            $fileName = $request->file('avatar')
                ->hashName();
            $data['avatar'] = $fileName;
        }
        Project::create($data);
        return redirect()->route('projects.index')
            ->with('status', 'Created successful');
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project, Store $request)
    {
        $avatar = $project->avatar;
        $data = $request->all();
        if ($request->avatar) {
            if (Storage::disk('public')->exists($avatar)) {
                Storage::disk('public')->delete($avatar);
            }
            $request->file('avatar')
                ->store('public');
            $fileName = $request->file('avatar')
                ->hashName();
            $data['avatar'] = $fileName;
        }
        $project->update($data);
        return redirect()->route('projects.index')
            ->with('status', 'Updated successful');
    }

    public function destroy(Project $project, Request $request)
    {
        $project->delete();
        $countProjects = $project->all()
            ->count();
        $paginates = config('app.paginate');
        $currentPage = $request->currentPage;
        if (($countProjects % $paginates) == 0) {
            $currentPage--;
        }
        return redirect()->route('projects.index', ['page' => $currentPage])
            ->with('status', 'Move to trash successful');
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

    public function deleteForever($id)
    {
        Project::withTrashed()->where('id', $id)
            ->forceDelete();
        return redirect()->route('projects.trash')
            ->with('status', 'Deleted successful');
    }

    public function restore($id)
    {
        Project::withTrashed()->where('id', $id)
            ->restore();
        return redirect()->route('projects.trash');
    }
}
