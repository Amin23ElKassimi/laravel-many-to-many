<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $projects = Project::all();
        return view('admin.projects.index', compact('projects')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $types = Type::all();
        $projects = Project::all();
        $project = new Project();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('projects','types','project', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all()['technologies ']);
        $data = $request->all();
        
        $project = Project::create($data);
        
        $project->technologies()->sync($data['technologies']);

        return redirect()->route('admin.projects.show',  compact('project'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

        $project = Project::findOrFail($id);
        $technologies = Technology::findOrFail($id);


        return view('admin.projects.show', compact('project', 'technologies'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.edit', compact('project','types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Project $project,)
    {
        //
        $data = $request->all();
        $project->update($data);
        
        $project->technologies()->sync($data['technologies']);

        return redirect()->route('admin.projects.show',compact('project'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
        $project->delete();
        return redirect()->route('admin.projects.index');
    }

    public function deletedIndex(){
        $projects = Project::onlyTrashed()->get();
        return view('admin.projects.deleted-index', compact('projects'));
    }

    public function deletedShow(string $id){
        $project = Project::withTrashed()->where('id', $id)->first();
        return view('admin.projects.deleted-show', compact('project'));
    }

    public function deletedRestore(string $id){
        $post = Project::withTrashed()->where('id', $id)->first();
        $post->restore();

        return redirect()->route('admin.projects.show', $post);
    }

    // public function deletedDestroy(string $id){
    //     $post = Project::withTrashed()->where('id', $id)->first();
    //     $post->tags()->detach(); // ? rimuovi tutti i collegamenti con me
    //     $post->forceDelete();

    //     return redirect()->route('admin.projects.deleted.index');
    // }
}
