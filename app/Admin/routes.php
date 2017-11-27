<?php

use App\Admin\Controllers\UserController;
use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'App\Admin\Controllers\HomeController@index');

    $router->resource('/users', UserController::class);
});
