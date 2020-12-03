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

Route::get('/manage', 'ManagerController@index')->middleware('auth')->middleware('admin')->name('manage');
Route::get('/manage/itemlist', 'ManagerController@showItem')->middleware('auth')->middleware('admin')->name('manage.item.list');
Route::delete('/manage/itemlist/{item:id}/delete', 'ManagerController@destroyItem')->middleware('auth')->middleware('admin')->name('manage.destroy.item');