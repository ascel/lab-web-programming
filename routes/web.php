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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/item/{id}', 'HomeController@details')->name('home.item.desc');
Route::get('/item/add-to-cart/{id}', 'HomeController@add_to_cart')->name('home.item.add.to.cart');

Route::get('/manage', 'ManagerController@index')->name('manage');
Route::get('/manage/itemlist', 'ManagerController@showItem')->name('manage.item.list');
Route::get('/manage/newitem', 'ManagerController@newItem')->name('manage.new.item');
Route::post('/manage/item/store', 'ManagerController@storeItem')->name('manage.store.item');
Route::delete('/manage/itemlist/{item:id}/delete', 'ManagerController@destroyItem')->name('manage.destroy.item');

Route::get('/manage/categorylist', 'ManagerController@showCategory')->name('manage.category.list');
Route::get('/manage/categorylist/{id}', 'ManagerController@showCategorySpecific')->name('manage.category.specific');
Route::get('/manage/newCategory', 'ManagerController@newCategory')->name('manage.new.category');
Route::post('/manage/category/store', 'ManagerController@storeCategory')->name('manage.store.category');