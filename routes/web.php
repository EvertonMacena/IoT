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
$router->get('/', function () {
    echo('Bem vindo ao servidor IOT da disciplina de Programação avançada para internet de S.I');
});

$router->post(
    'auth/login',
    [
        'as'    => 'login',
        'uses' => 'AuthController@authenticate'
    ]
);

$router->get('api/apartment/{apartmentId}/sensor/{sensorId}/show', 'ApartmentController@showSensor');

$router->group(['prefix'=>'api', 'middleware' => 'jwt.admin.auth'], function() use($router){
    $router->get('/users', 'UserController@index');
    $router->post('/user', 'UserController@store');
    $router->get('/user/{id}', 'UserController@show');
    $router->put('/user/{id}', 'UserController@update');
    $router->delete('/user/{id}', 'UserController@destroy');

    $router->get('/residents', 'ResidentController@index');
    $router->post('/resident', 'ResidentController@store');
    $router->get('/resident/{id}', 'ResidentController@show');
    $router->put('/resident/{id}', 'ResidentController@update');
    $router->delete('/resident/{id}', 'ResidentController@destroy');

    $router->get('/apartments', 'ApartmentController@index');
    $router->post('/apartment', 'ApartmentController@store');
    $router->get('/apartment/{id}', 'ApartmentController@show');
    $router->put('/apartment/{id}', 'ApartmentController@update');
    $router->delete('/apartment/{id}', 'ApartmentController@destroy');
    $router->post('/apartment/{id}/addSensor', 'ApartmentController@addSensor');
    $router->patch('/apartment/{id}/updateSensor', 'ApartmentController@updateSensor');
    $router->delete('/apartment/{apartmentId}/sensor/{sensorId}/deleteSensor', 'ApartmentController@removeSensor');

    $router->get('/models', 'ModelCarController@index');
    $router->post('/model', 'ModelCarController@store');
    $router->get('/model/{id}', 'ModelCarController@show');
    $router->put('/model/{id}', 'ModelCarController@update');
    $router->delete('/model/{id}', 'ModelCarController@destroy');

    $router->get('/cars', 'CarController@index');
    $router->post('/car', 'CarController@store');
    $router->get('/car/{id}', 'CarController@show');
    $router->put('/car/{id}', 'CarController@update');
    $router->delete('/car/{id}', 'CarController@destroy');

    $router->get('/sensors', 'SensorController@index');
    $router->post('/sensor', 'SensorController@store');
    $router->get('/sensor/{id}', 'SensorController@show');
    $router->put('/sensor/{id}', 'SensorController@update');
    $router->delete('/sensor/{id}', 'SensorController@destroy');
});

$router->group(['prefix'=>'api', 'middleware' => 'jwt.resident.auth'], function() use($router){

});
