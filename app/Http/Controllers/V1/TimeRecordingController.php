<?php


namespace App\Http\Controllers\V1;

use App\Models\TimeRecording;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;
use Validator;

class TimeRecordingController extends BaseController
{
    public function show()
    {
        $times = TimeRecording::all();
        return response()->json(['times' => $times]);
    }

    public function get($project_id)
    {
        $time = TimeRecording::where('projects_id', $project_id)->first();
        return response()->json(['time' => $time]);
    }
}
