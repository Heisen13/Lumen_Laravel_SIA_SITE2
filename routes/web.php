<?php

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/getuser',['uses' => 'UserController@getall']);
$router->get('/induser', 'UserController@index'); 
$router->post('/adduser', 'UserController@add'); 
$router->get('/showuser/{Student_ID}', 'UserController@show'); 
$router->put('/upuser/{Student_ID}', 'UserController@update'); 
$router->patch('/upuser/{Student_ID}', 'UserController@update');
$router->delete('/deluser/{Student_ID}', 'UserController@delete'); 
