<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'users'], function () {
    //手机注册
    Route::post('mobile_register', 'UserController@mobile_register');
    // 发送手机验证码
    Route::post('send_mobile_reg_code', 'UserController@send_mobile_reg_code');
    //邮箱注册
    Route::post('email_register', 'UserController@email_register');
    //发送邮箱验证码
    Route::post('send_email_reg_code', 'UserController@send_email_reg_code');
    //登陆
    Route::post('login', 'UserController@login');
    //获取自己的信息
    Route::get('show', 'UserController@show');
    //修改自己的信息
    Route::post('update', 'UserController@update');
    //上传头像
    Route::post('avatar', 'UserController@avatar');
});

Route::group(['prefix' => 'informations'], function () {
    //新建收货信息
    Route::post('store', 'InformationController@store');
    //修改收货信息
    Route::post('update', 'InformationController@update');
    //查看收货信息列表
    Route::get('index', 'InformationController@index');
    //收货信息详情
    Route::get('show/{id}', 'InformationController@show');
    //删除收货信息
    Route::delete('delete/{id}', 'InformationController@delete');
});