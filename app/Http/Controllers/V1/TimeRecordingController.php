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
}
