<?php


namespace App\Http\Controllers\V1;

use App\User;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;
use Validator;

class UserController extends BaseController
{
    public function show()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function get($id)
    {
        $user = User::find($id);
        return response()->json(['user' => $user]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()]);
        }

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = app('hash')->make($request->input('password'));
        $user->save();

        return response()->json(['user' => $user]);
    }
    
}
