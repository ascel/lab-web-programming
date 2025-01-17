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

Auth::routes();

// Member & Guest

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/item/{id}', 'HomeController@details')->name('home.item.desc');
Route::get('/item/add-to-cart/{id}', 'HomeController@add_to_cart')->name('home.item.add.to.cart');
Route::post('/item/store-to-cart/{id}', 'HomeController@storeCart')->name('home.store.cart');

Route::get('/cart', 'HomeController@cart')->name('cart');
Route::delete('/cart/{cart:id}/delete', 'HomeController@cartDelete')->name('cart.delete');
Route::get('/cart/checkout', 'HomeController@checkout')->name('checkout');

Route::get('/history', 'HomeController@history')->name('history');
Route::get('/history/{id}', 'HomeController@transactionDetail')->name('detail.transaction');

// Admin

Route::get('/manage', 'ManagerController@index')->name('manage');
Route::get('/manage/itemlist', 'ManagerController@showItem')->name('manage.item.list');
Route::get('/manage/newitem', 'ManagerController@newItem')->name('manage.new.item');
Route::post('/manage/item/store', 'ManagerController@storeItem')->name('manage.store.item');
Route::delete('/manage/itemlist/{item:id}/delete', 'ManagerController@destroyItem')->name('manage.destroy.item');

Route::get('/manage/categorylist', 'ManagerController@showCategory')->name('manage.category.list');
Route::get('/manage/categorylist/{id}', 'ManagerController@showCategorySpecific')->name('manage.category.specific');
Route::get('/manage/newCategory', 'ManagerController@newCategory')->name('manage.new.category');
Route::post('/manage/category/store', 'ManagerController@storeCategory')->name('manage.store.category');