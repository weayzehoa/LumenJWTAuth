<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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
    return $router->app->version();
});

// 使用者登入登出及查詢自己
$router->group([
    'prefix' => '/',
    'namespace' => 'Api',
], function () use ($router) {
    $router->post('login', 'UserLoginController@login');
    $router->get('me', 'UserLoginController@me');
    $router->get('logout', 'UserLoginController@logout');
});
