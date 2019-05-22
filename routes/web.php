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

$router->post(
    'auth/login',
    [
        'uses' => 'AuthController@authenticate'
    ]
);
$router->group(['prefix'=>'api', 'middleware' => 'jwt.auth'], function() use($router){
    $router->get('/users', 'UserController@index');
    $router->post('/user', 'UserController@store');
    //$router->get('/user/{id}', 'UserController@show');
    $router->put('/user/{id}', 'UserController@update');
    $router->delete('/user/{id}', 'UserController@destroy');

    $router->get('/residents', 'ResidentController@index');
    $router->post('/resident', 'ResidentController@store');
    //$router->get('/resident/{id}', 'ResidentController@show');
    $router->put('/resident/{id}', 'ResidentController@update');
    $router->delete('/resident/{id}', 'ResidentController@destroy');

    $router->get('/apartments', 'ApartmentController@index');
    $router->post('/apartment', 'ApartmentController@store');
    //$router->get('/apartment/{id}', 'ApartmentController@show');
    $router->put('/apartment/{id}', 'ApartmentController@update');
    $router->delete('/apartment/{id}', 'ApartmentController@destroy');

    $router->get('/cars', 'CarController@index');
    $router->post('/car', 'CarController@store');
    //$router->get('/car/{id}', 'CarController@show');
    $router->put('/car/{id}', 'CarController@update');
    $router->delete('/car/{id}', 'CarController@destroy');

    $router->get('/sensors', 'SensorController@index');
    $router->post('/sensor', 'SensorController@store');
    //$router->get('/sensor/{id}', 'SensorController@show');
    $router->put('/sensor/{id}', 'SensorController@update');
    $router->delete('/sensor/{id}', 'SensorController@destroy');
});
