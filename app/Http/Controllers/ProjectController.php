<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectStoreRequest;
use App\Models\Project;
use App\models\Image;
use Illuminate\Http\Request;


class ProjectController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('show, index');
    }

    public function show($id)
    {
        return view('projects.show', [
            'project' => Project::with('images', 'user')->findOrFail($id)
        ]);
    }

    public function index()
    {
        return view('projects.index', [
            'projects' => Project::with('images','user')->get()
        ]);
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(ProjectStoreRequest $request)
    {
        // Return only validated data without the image
        $validated = $request->safe();
        $project = new Project();
        $project->name = $validated['name'];
        $project->description = $validated['description'];
        $project->user_id = auth()->user()->id;


        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imagefile) {
                $image = new Image;
                $image_file_name = time() . '.' . $imagefile->extension();
                $path = $imagefile->store(storage_path('app/public/images'), $image_file_name);
                $image->url = $path;
                $image->project_id = $project->id;
                $image->save();
            }
        }

        $project->save();

        //Redirect after storing in database
        return redirect()->route('projects.index');

    }
}
