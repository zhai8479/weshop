<?php

use App\Admin\Controllers\UserController;
use Illuminate\Routing\Router;
use App\Admin\Controllers\CommodityController;
use App\Admin\Controllers\CommodityTypeController;
use App\Admin\Controllers\CommodityAbbrTypeController;
use App\Admin\Controllers\CommodityAbbrValController;
use App\Admin\Controllers\OrderController;
Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'App\Admin\Controllers\HomeController@index');

    $router->resource('/users', UserController::class);
    $router->resource('/commodity', CommodityController::class);
    $router->resource('/commodityType',CommodityTypeController::class);
    $router->resource('/commodity_abbr_types',CommodityAbbrTypeController::class);
    $router->resource('/commodity_abbr_vals',CommodityAbbrValController::class);
    $router->resource('/orders',OrderController::class);
});
