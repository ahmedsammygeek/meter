<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Board\Projects\StoreProjectRequest;
use App\Http\Requests\Board\Projects\UpdateProjectRequest;
use Auth;
use App\Models\Project;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('board.projects.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('board.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $project = new Project;
        $project->setTranslation('name' , 'ar' , $request->name_ar );
        $project->setTranslation('name' , 'en' , $request->name_en );
        $project->user_id = Auth::id();
        $project->image = basename($request->file('image')->store('projects'));
        $project->is_active = $request->filled('active') ? 1 : 0;
        $project->save();

        return redirect(route('board.projects.index'))->with('success' , 'تم إضافه المشروع بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('board.projects.show' , compact('project') );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('board.projects.edit' , compact('project') );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->setTranslation('name' , 'ar' , $request->name_ar );
        $project->setTranslation('name' , 'en' , $request->name_en );
        if ($request->hasFile('image')) {
            $project->image = basename($request->file('image')->store('projects'));
        }
        $project->is_active = $request->filled('active') ? 1 : 0;
        $project->save();
        return redirect(route('board.projects.index'))->with('success' , 'تم تعديل المشروع بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
