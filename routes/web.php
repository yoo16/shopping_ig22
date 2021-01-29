<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    'prefix' => 'admin/item',
    'namespace' => 'Admin',
    'as' => 'admin.item.',
], function() {
    Route::get('/', 'ItemController@index')->name('index');
    Route::get('create/', 'ItemController@create')->name('create');
    Route::post('add/', 'ItemController@add')->name('add');
    Route::get('edit/{id}', 'ItemController@edit')->name('edit');
    Route::post('update/{id}', 'ItemController@update')->name('update');
});

Route::get('cart/', 'CartController@index')->name('cart.index');
Route::get('cart/add/{id}', 'CartController@add')->name('cart.add');
Route::get('cart/clear', 'CartController@clear')->name('cart.clear');
Route::get('cart/remove/{index}', 'CartController@remove')->name('cart.remove');
