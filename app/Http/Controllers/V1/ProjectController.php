<?php


namespace App\Http\Controllers\V1;

use App\Models\Project;
use App\Services\V1\ValidatorService;
use Exception;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class ProjectController extends BaseController
{
    public function show()
    {
        $projects = Project::all();
        return response()->json(['projects' => $projects]);
    }

    public function get($project_id)
    {
        $project = Project::find($project_id);
        return response()->json(['project' => $project]);
    }

    public function create(Request $request)
    {
        try {
            ValidatorService::makeProjects($request);

            $project = new Project();
            $project->title = $request->input('title');
            $project->description = $request->input('description');
            $project->user_id = $request->input('user_id', []);
            $project->save();

            return response()->json(['project' => $project], 201);
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], $exception->getCode());
        }
    }

    public function update(Request $request, $project_id)
    {
        try {
            ValidatorService::makeProjects($request);

            $project = Project::find($project_id);
            $project->title = $request->input('title');
            $project->description = $request->input('description');
            $project->user_id = $request->input('user_id', []);
            $project->save();

            return response()->json(['project' => $project], 204);
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], $exception->getCode());
        }
    }
}
