<?php

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

//Auth::routes();

//Route::get('/', function () {
//	return view('auth/login');
//});
Route::get('/', function () {
	return view('test');
})->middleware(['auth.shopify'])->name('home');
Route::get('/authenticat', 'ServiceController@test');
Route::group(['middleware' => 'auth'], function () {
	Route::get('logout', 'DashboardController@logout');
	Route::get('home', 'DashboardController@index');

	Route::get('service', 'ServiceController@index');
	Route::get('service/create/{serviceId}', 'ServiceController@create');

//	Route::get('{any}', 'MintonController@index');
});
