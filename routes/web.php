<?php
use App\Inventory;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $products = Inventory::all();
    return view('/welcome')->with('products', $products);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('{path}',"HomeController@index")->where('path','[-a-z0-9_\s]+');
