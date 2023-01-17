<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
// use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Project;
use App\Models\Tag;

use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $projects = Project::all();
        $projects = Project::paginate(10);

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.projects.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $formData = $request->validated();
        $slug = Project::generateSlug($request->title);
        $formData['slug'] = $slug;

        if($request->hasFile('project_image')){
            $path = Storage::disk('public')->put('project_images', $request->project_image);
            $formData['project_image'] = $path;
        }

        $newProject = Project::create($formData);

        if($request->has('tags')){
            $newProject->tags()->attach($request->tags);
        }

        return redirect()->route('admin.projects.show', $newProject->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.projects.edit', compact('project', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $formData = $request->validated();
        $slug = Project::generateSlug($request->title);
        $formData['slug'] = $slug;

        if($request->hasFile('project_image')){
            if ($project->project_image) {
                Storage::delete($project->project_image);
            }

            $path = Storage::disk('public')->put('project_images', $request->project_image);
            $formData['project_image'] = $path;
        }

        $project->update($formData);

        if($request->has('tags')){
            $project->tags()->sync($request->tags);
        }

        return redirect()->route('admin.projects.index')->with('message', "$project->title updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if($project->project_image){
            Storage::delete($project->project_image);
        }

        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', "$project->title deleted successfully!");
    }
}
