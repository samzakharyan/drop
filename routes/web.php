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

Auth::routes();

Route::get('/', function () {
    return "This is landing page\n Login Page <a href='login'>Go</a>";
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('logout', 'DashboardController@logout');
    Route::get('home', 'DashboardController@index');
    Route::group(['prefix' => 'service'], function () {
        Route::get('/', 'ServiceController@index');
        Route::get('create/{serviceId}', 'ServiceController@create');
        Route::any('search', 'ServiceController@get')->name('service.search');
        Route::post('shopify', 'ServiceController@shopify')->name('service.shopify');
    });
    Route::group(['prefix' => 'shop'], function () {
        Route::get('add', 'ShopController@addShop')->name('shop.add');
        Route::post('/make', 'ShopController@makeShop')->name('shop.make');
        Route::get('/redirect', 'ShopController@redirect');
    });
});
