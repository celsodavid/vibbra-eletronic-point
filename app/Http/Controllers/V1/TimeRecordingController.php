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

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'projects_id' => 'required',
            'started_at' => 'required|unique:time_recordings',
            'ended_at' => 'required|unique:time_recordings'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()]);
        }

        $timeRecording = new TimeRecording();
        $timeRecording->projects_id = $request->input('projects_id');
        $timeRecording->started_at  = $request->input('started_at');
        $timeRecording->ended_at  = $request->input('ended_at');
        $timeRecording->save();

        return response()->json(['time' => $timeRecording]);
    }
}
