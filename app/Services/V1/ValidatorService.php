<?php


namespace App\Services\V1;

use Exception;
use Illuminate\Http\Request;
use Validator;

class ValidatorService
{
    public static function makeUsers(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'login' => 'required|unique:users',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            throw new Exception($validator->errors()->first(), 406);
        }
    }

    public static function makeProjects(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            throw new Exception($validator->errors()->first(), 406);
        }
    }

    public static function makeAddTime(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'projects_id' => 'required',
            'started_at' => 'required|unique:time_recordings',
            'ended_at' => 'required|unique:time_recordings'
        ]);

        if ($validator->fails()) {
            throw new Exception($validator->errors()->first(), 406);
        }
    }

    public static function makeEditTime(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'projects_id' => 'required',
            'started_at' => 'required',
            'ended_at' => 'required'
        ]);

        if ($validator->fails()) {
            throw new Exception($validator->errors()->first(), 406);
        }
    }
}
