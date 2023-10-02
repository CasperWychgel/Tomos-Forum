<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectStoreRequest;
use App\Models\Project;
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
        return view('projects.show',[
            'project' => Project::findOrFail($id)
        ]);
    }

    public function index(){
        return view('projects.index',[
            'projects' => Project::all()
        ]);
    }

    public function create(){
        return view('projects.create');
    }

    public function store(ProjectStoreRequest $request)
    {
        // Return only validated data without the image
        $validated_except_image = $request->safe()->except('image');

        $imageName = time().'.'.$request->safe()->image->extension();
        //Create array for the newly generated image
        $validated_only_image = [
            'image' => $imageName,
        ];
        // Merge the two arrays
        $validated = array_merge($validated_except_image,$validated_only_image);
        // Move image to Public Folder
        $request->image->move(storage_path('app/public/images'), $imageName);
        // Store in database
        Project::create($validated);
        //Redirect after storing in database
        return redirect()->route('projects.index');
    }
}
