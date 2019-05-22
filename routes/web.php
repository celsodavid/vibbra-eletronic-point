<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return response()->json(['API']);
});

$router->post('/api/v1/authenticate', [
    'uses' => 'V1\AuthController@authenticate'
]);

$router->group(
    ['middleware' => 'jwt.auth'],
    function () use ($router) {
        $router->get('/api/v1/users', function () {
            $users = \App\User::all();
            return response()->json($users);
        });

        $router->get('/api/v1/projects', function () {
            $projects = \App\Project::all();
            return response()->json($projects);
        });
    }
);
