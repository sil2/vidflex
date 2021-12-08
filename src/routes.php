<?php

use Illuminate\Routing\Router;

Route::post('/token/create', '\Sil2\Vidflex\Controllers\Api\Api@createToken');

Route::group([
    'middleware' => 'auth:sanctum',
    'prefix'     => 'api',
    'namespace'  => '\\Sil2\\Vidflex\\Controllers\\Api'
], function (Router $router) {

    Route::get('order/{id}', '\Sil2\Vidflex\Controllers\Api\OrderController@get');
    Route::post('order/', '\Sil2\Vidflex\Controllers\Api\OrderController@createOrder');
    Route::get('cart/', '\Sil2\Vidflex\Controllers\Api\OrderController@get');
    Route::post('cart/products/{id}', '\Sil2\Vidflex\Controllers\Api\OrderController@addProduct');

});
