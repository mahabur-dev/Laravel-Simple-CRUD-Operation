<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
            if(Auth::check()){
                // Fetch all projects from the database
            $items = Project::latest()->paginate(3);

            return view('projects.index', 
            ['projects' => $items]);
        }
        else{
            return redirect()->route('userAuth.login');
        }
       
    }

      public function all_projects()
    {
        // Fetch all projects from the database
        $items = Project::get();

        return view('projects.all_projects', 
        ['projects' => $items]);
    }


    public function create()
    {
        return view('projects.create');
    }

    public function storeForProject(Request $request)
    {
        $statusMap = [
            'draft' => 1,
            'published' => 2,
        ];
        
        // Validate the request
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'github_url' => 'nullable|url',
            'status' => 'required',
        ]);

        // Upload the image and store it in the public directory
        $imagename = time() . '.' . $request->image->extension();
        $request->image->move(public_path('projects'), $imagename);
        
        // Create new project
        $project = new project();
        $project->name = $request->name;
        $project->description = $request->description;
        $project->image = $imagename;
        $project->github_url = $request->github_url;
        $project->status = $statusMap[$request->status] ?? 1;
        
        $project->save();
        
        return redirect()->route('projects.index')->withSuccess('Project created successfully.');
    }

    public function edit($id)
    {
        // Fetch the project by ID
        $project = Project::findOrFail($id); 
        return view('projects.edit', ['project' => $project]);
    }

    public function update(Request $request, $id)
    {
        $statusMap = [
            'draft' => 1,
            'published' => 2,
        ];
        
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'github_url' => 'required|url',
            'status' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // Find the existing project
        $project = Project::findOrFail($id);
        
        // Handle image upload if provided
        if ($request->hasFile('image')) {
            // Remove old image if exists
            if (file_exists(public_path('projects/' . $project->image))) {
                unlink(public_path('projects/' . $project->image));
            }
            
            // Upload new image
            $imagename = time() . '.' . $request->image->extension();
            $request->image->move(public_path('projects'), $imagename);
            $project->image = $imagename;
        }

        // Update project details
        $project->name = $request->name;
        $project->description = $request->description;
        $project->github_url = $request->github_url;
        $project->status = $statusMap[$request->status] ?? $project->status;
        
        $project->save();
        
        return redirect()->route('projects.index')->withSuccess('Project updated successfully.');
    }
    
    public function show($id)
    {
        $project = Project::findOrFail($id);
        return view('projects.show', ['project' => $project]);
    }
    
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        
        $project->delete();
        
        return redirect()->route('projects.index')->withSuccess('Project deleted successfully.');
    }

   
}











