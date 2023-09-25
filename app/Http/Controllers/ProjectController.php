<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectStoreRequest;
use App\Models\Project;
use Illuminate\Http\Request;


class ProjectController extends Controller
{
    public function show($id)
    {
        return view('projects.show',[
            'project' => Project::findOrFail($id)
        ]);
    }

    public function index(){
        return view('projects.index',[
            'projects' => Project::all()
        ]);
    }
}
