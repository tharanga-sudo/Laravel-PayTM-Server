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
Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
Route::get('/appConfig', 'API\AppController@getAppConfig');
Route::get('/products', 'API\ProductController@getProducts');
Route::group(['middleware' => 'auth:api'], function(){
	Route::post('/prepareOrder', 'API\OrderController@prepareOrder');

	Route::post('/orders', 'API\OrderController@createOrder');
	Route::get('/orders/{id}', 'API\OrderController@getOrder');
	Route::get('/transactions', 'API\TransactionController@getTransactions');
	Route::post('/getChecksum', 'API\OrderController@generateCheckSum');
	Route::post('/transactionStatus', 'API\OrderController@checkTransactionStatus');
});
