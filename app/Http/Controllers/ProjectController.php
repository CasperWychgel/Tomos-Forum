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

    public function admin(){
        return view('admin',[
            'projects' => Project::all()
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
        $request->image->move(public_path('/images'), $imageName);
        // Store in database
        Project::create($validated);
        //Redirect after storing in database
        return redirect()->route('projects.index');
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('projects.edit' , compact('project'));
    }


    public function update(ProjectStoreRequest $request, $id)
    {
        // Find project by ID
        $project = Project::findOrFail($id);
        // Return only validated data without the image
        $validated_except_image = $request->safe()->except('image');

        $current_img_destination = 'images/'.$project->image;
        if (\File::exists($current_img_destination))
        {
            \File::delete($current_img_destination);
        }

        $imageName = time().'.'.$request->safe()->image->extension();
        //Create array for the newly generated image
        $validated_only_image = [
            'image' => $imageName,
        ];
        // Merge the two arrays
        $validated = array_merge($validated_except_image,$validated_only_image);
        // Move image to Public Folder
        $request->image->move(public_path('/images'), $imageName);
        // Update in database
        $project ->update($validated);
        //Redirect after storing in database
        return redirect()->route('projects.index');

    }

    public function destroy($id)
    {
        // delete
        $project = Project::findOrFail($id);

        $project->delete();
        return redirect()->route('admin');
    }
}
