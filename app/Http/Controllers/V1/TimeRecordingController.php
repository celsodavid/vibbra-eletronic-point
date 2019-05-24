<?php


namespace App\Http\Controllers\V1;

use App\Models\TimeRecording;
use App\Services\V1\ValidatorService;
use Exception;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class TimeRecordingController extends BaseController
{
    public function show()
    {
        $times = TimeRecording::all();
        return response()->json(['times' => $times]);
    }

    public function get($project_id)
    {
        $time = TimeRecording::where('projects_id', $project_id)->get();
        return response()->json(['time' => $time]);
    }

    public function create(Request $request)
    {
        try {
            ValidatorService::makeAddTime($request);

            $timeRecording = new TimeRecording();
            $timeRecording->projects_id = $request->input('projects_id');
            $timeRecording->started_at  = $request->input('started_at');
            $timeRecording->ended_at  = $request->input('ended_at');
            $timeRecording->save();

            return response()->json(['time' => $timeRecording], 201);
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], $exception->getCode());
        }
    }

    public function update(Request $request, $time_id)
    {
        try {
            ValidatorService::makeEditTime($request);

            $timeRecording = TimeRecording::find($time_id);
            $timeRecording->projects_id = $request->input('projects_id');
            $timeRecording->started_at  = $request->input('started_at');
            $timeRecording->ended_at  = $request->input('ended_at');
            $timeRecording->save();

            return response()->json(['time' => $timeRecording], 202);
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], $exception->getCode());
        }
    }
}
