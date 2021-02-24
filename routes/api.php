<?php
use Illuminate\Support\Facades\Route;


Route::group(['namespace' => 'Api'], function () {

    Route::post('login', 'AuthController@login')->name('login');
    Route::post('register', 'AuthController@register')->name('register');
    
    Route::middleware(['auth:api'])->group(function () {

        Route::get('profile', 'AuthController@profile')->name('profile');

        Route::apiResource('users', 'UsersController');
        Route::apiResource('roles', 'RolesController');
        Route::apiResource('products', 'ProductController');
        Route::get('orders/export', 'OrderController@export');
        Route::apiResource('orders', 'OrderController')->only(['index', 'show']);
    });

});

