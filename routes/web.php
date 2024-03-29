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

$router->get('/test', function () use ($router) {
    return response()->json([
        "id" => "1",
        "isbn" => "438227",
        "title" => "Book One"
    ]);
});

$router->post('/api/v1/authenticate', [
    'uses' => 'V1\AuthController@authenticate'
]);

$router->group(
    [
        'prefix' => '/api/v1/user',
        'namespace' => 'V1',
        'middleware' => 'jwt.auth'
    ],
    function () use ($router) {
        $router->get('/', 'UserController@show');
        $router->get('{id}', 'UserController@get');
        $router->post('/', 'UserController@create');
        $router->put('{id}', 'UserController@update');
    }
);

$router->group(
    [
        'prefix' => '/api/v1/project',
        'namespace' => 'V1',
        'middleware' => 'jwt.auth'
    ],
    function () use ($router) {
        $router->get('/', 'ProjectController@show');
        $router->get('{project_id}', 'ProjectController@get');
        $router->post('/', 'ProjectController@create');
        $router->put('{project_id}', 'ProjectController@update');
    }
);

$router->group(
    [
        'prefix' => '/api/v1/time',
        'namespace' => 'V1',
        'middleware' => 'jwt.auth'
    ],
    function () use ($router) {
        $router->get('/', 'TimeRecordingController@show');
        $router->get('{project_id}', 'TimeRecordingController@get');
        $router->post('/', 'TimeRecordingController@create');
        $router->put('{time_id}', 'TimeRecordingController@update');
    }
);
