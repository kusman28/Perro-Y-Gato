<?php

use Illuminate\Http\Request;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResources(['patient' => 'API\PatientController']);
Route::apiResources(['inventory' => 'API\InventoryController']);
Route::apiResources(['payment' => 'API\PaymentController']);
Route::apiResources(['activities' => 'API\Admin\ActivityController']);

// Route::get('product', 'API\InventoryController@product');
Route::get('payments', 'API\PaymentController@payments');
