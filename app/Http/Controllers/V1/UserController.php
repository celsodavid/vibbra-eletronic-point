<?php


namespace App\Http\Controllers\V1;

use App\Models\User;
use App\Services\V1\ValidatorService;
use Exception;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class UserController extends BaseController
{
    public function show()
    {
        $users = User::all();
        return response()->json(['users' => $users]);
    }

    public function get($id)
    {
        $user = User::find($id);
        return response()->json(['user' => $user]);
    }

    public function create(Request $request)
    {
        try {
            ValidatorService::makeUsers($request);

            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->login = $request->input('login');
            $user->password = app('hash')->make($request->input('password'));
            $user->save();

            return response()->json(['user' => $user], 201);
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], $exception->getCode());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            ValidatorService::makeUsers($request);

            $user = User::find($id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->login = $request->input('login');
            $user->password = app('hash')->make($request->input('password'));
            $user->save();

            return response()->json(['user' => $user], 202);
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], $exception->getCode());
        }
    }
}
