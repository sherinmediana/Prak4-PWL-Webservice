<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource as ResourceProjectResource;
use App\Models\Projects;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $projects = ResourceProjectResource::collection(Projects::all());
        return response()->json([
            'projects' => $projects,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = Projects::create($request->validate([
            'name' => 'required',
            'description' => 'required',
        ]));
        return response()->json([
            'projects' => $project,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Projects::with('comments')->find($id);
        return response()->json([
            'project' => $project,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function edit(projects $projects)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Projects $project)
    {
        $project->name = $request['name'];
        $project->description = $request['description'];
        if ($request['image']) {
            $project->image = $request['image'];
        }
        $project->save();
        return response()->json([
            'projects' => $project,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function destroy(projects $projects)
    {
        //
    }
}
