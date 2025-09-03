<?php
$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('/register', 'AuthController@register');
    $router->post('/login', 'AuthController@login');

    $router->group(['middleware' => 'auth:api'], function () use ($router) {
        $router->get('/posts', 'PostController@index');
        $router->post('/posts', 'PostController@store');
        $router->get('/posts/{id}', 'PostController@show');
    });
});