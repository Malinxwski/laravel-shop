<?php

use Illuminate\Support\Facades\Auth;
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
//
Auth::routes([
    'reset'=>false,
    'confirm'=>false,
    'verify'=>false,
]);
Route::get('/', 'MainController@index')->name('index');
Route::get('/home','HomeController@index')->name('home');
Route::get('/logout','Auth\LoginController@logout' )->name('get-logout');
Route::get('/categories', 'MainController@categories')->name('categories');

Route::post('/basket/add/{id}', 'BasketController@basketAdd')->name('basket-add');
Route::group(['middleware'=>'basket_not_empty', 'prefix'=>'basket'], function(){
    Route::get('/', 'BasketController@basket')->name('basket');
    Route::get('/place', 'BasketController@basketPlace')->name('basket-place');
    Route::post('/place','BasketController@basketConfirm')->name('basket-confirm');
    Route::post('/remove/{id}', 'BasketController@basketRemove')->name('basket-remove');
});
Route::get('/{category?}', 'MainController@category')->name('category');
Route::get('/{category}/{product?}', 'MainController@product')->name('product');











Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
