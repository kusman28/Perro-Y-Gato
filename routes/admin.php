<?php

use Illuminate\Http\Request;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResources(['patient' => 'API\PatientController']);
Route::post('pet', 'API\PatientController@addPet');
Route::get('pet/{id}', 'API\PatientController@getPet');
Route::apiResources(['inventory' => 'API\InventoryController']);
Route::apiResources(['payment' => 'API\PaymentController']);
Route::apiResources(['activities' => 'API\Admin\ActivityController']);

// Route::get('product', 'API\InventoryController@product');
Route::get('payments', 'API\PaymentController@payments');
Route::get('newpatient', 'API\PatientController@newPatient');
Route::get('totalproduct', 'API\InventoryController@totalproduct');
Route::get('totalsales', 'API\PaymentController@totalsales');

Route::get('profile', 'API\UserController@profile');
Route::put('profile', 'API\UserController@update');
