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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::apiResources(['patient' => 'API\PatientController']);
// Route::apiResources(['inventory' => 'API\InventoryController']);
// Route::apiResources(['payment' => 'API\PaymentController']);

// Route::get('product', 'API\InventoryController@product');
// Route::get('payments', 'API\PaymentController@payments');
