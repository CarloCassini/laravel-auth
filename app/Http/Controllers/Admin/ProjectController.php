<?php

// bisogna aggiornare la netspace con admin alla fine
namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;

// deve andare a perscare il controller dalla cartella controllers
use App\Http\Controllers\Controller;

use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * *@return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view("admin.projects.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * *@return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * *@return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->all();
        $project = new Project();
        $project->fill($data);
        $project->slug = Str::slug($project->name);
        $project->save();

        return redirect()->route('admin.projects.show', $project);
        // return view('admin.projects.test');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * *@return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        // dd($projects);
        // $projects = Project::where('id', '==', $project[id])->get();
        return view("admin.projects.show", compact("project"));

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * *@return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view("admin.projects.edit", compact("project"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->all();
        // gestisco lo slug
        // ma gestito prima di update, evidentemente prende esattamente le righe toccate
        $project->slug = Str::slug($project->name);

        $project->update($data);


        return redirect()->route("admin.projects.show", $project);
        // dd($data);
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}