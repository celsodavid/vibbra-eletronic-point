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


}
