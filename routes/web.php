<?php

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/users', 'UserController@index'); 
$router->post('/users', 'UserController@add'); 
$router->get('/users/{id}', 'UserController@show'); 
$router->put('/users/{id}', 'UserController@update'); 
$router->patch('/users/{id}', 'UserController@update');
$router->delete('/users/{id}', 'UserController@delete'); 

$router->get('/usersjob', 'UserJobController@index');
$router->get('/usersjob/{id}', 'UserJobController@show');