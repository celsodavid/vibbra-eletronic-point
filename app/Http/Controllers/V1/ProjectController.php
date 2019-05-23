<?php


namespace App\Http\Controllers\V1;

use App\Project;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;
use Validator;

class ProjectController extends BaseController
{
    public function index()
    {
        $projects = Project::all();
        return response()->json(['projects' => $projects]);
    }

    public function get($id)
    {
        $project = Project::find($id);
        return response()->json(['project' => $project]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'user_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()]);
        }

        $project = new Project();
        $project->title = $request->input('title');
        $project->description = $request->input('description');
        $project->user_id = $request->input('user_id');
        $project->save();

        return response()->json(['project' => $project]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'user_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()]);
        }

        $project = Project::find($id);
        $project->title = $request->input('title');
        $project->description = $request->input('description');
        $project->user_id = $request->input('user_id');
        $project->save();

        return response()->json(['project' => $project]);
    }
}
