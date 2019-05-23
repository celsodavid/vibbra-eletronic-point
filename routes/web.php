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
    [
        'prefix' => '/api/v1/user',
        'namespace' => 'V1',
        'middleware' => 'jwt.auth'
    ],
    function () use ($router) {
        $router->get('/', 'UserController@show');
    }
);

$router->group(
    [
        'prefix' => '/api/v1/project',
        'namespace' => 'V1',
        'middleware' => 'jwt.auth'
    ],
    function () use ($router) {
        $router->get('/', 'ProjectController@index');
        $router->get('{id}', 'ProjectController@get');
        $router->post('/', 'ProjectController@create');
        $router->put('{id}', 'ProjectController@update');
    }
);
