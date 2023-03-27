<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;


use Faker\Generator as Faker;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $request->validate([
            'title' => 'required|max:100|min:3',
            'description' => 'required|min:5|max:4096',
        ]);

        $data = $request->all();

        $imgPath = Storage::put('projects', $data['image']);

        $titolo = $request->title;

        $singleProject = new Project;
        $singleProject->title = $titolo;
        $singleProject->description = $data['description'];
        $singleProject->slug = Str::slug($titolo);
        if (array_key_exists('image', $data)) {
            $singleProject->image = $imgPath;
        }
        $singleProject->save();


        return redirect()->route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $project = Project::findOrFail($project->id);

        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {

        $request->validate([
            'title' => 'required|max:100|min:3',
            'description' => 'required|min:5|max:4096',
        ]);

        $project = Project::findOrFail($project->id);

        $data = $request->all();

        $project->title = $data['title'];
        $project->description = $data['description'];
        $project->slug = Str::slug($data['title']);
        $project->save();

        return redirect()->route('admin.projects.index', $project->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index');

    }


    // public function destroy($id)
    // {

    //     dd($id);

    //     $project = Project::findOrFail($id);
        
    //     $project->delete();

    //     return redirect()->route('admin.projects.index');
    // }
}
