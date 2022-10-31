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

Route::get('/profile/{id}', 'App\Http\Controllers\HomeController@show')->name('profile');
Route::patch('/profile/{user}', 'App\Http\Controllers\HomeController@save')->name('edit_profile');
Route::get('/authorsPosts/{id}', 'App\Http\Controllers\HomeController@index')->name('get_posts');

Route::get('/expert/add', 'App\Http\Controllers\HomeController@create')->name('create_expert');
Route::post('/expert', 'App\Http\Controllers\HomeController@store')->name('store_expert');
Route::get('/expertRate/{id}', 'App\Http\Controllers\HomeController@getRate')->name('get_rate');

Route::get('/admin_panel','App\Http\Controllers\HomeController@adminPanel')->name('adminPanel')->middleware('role:admin');
Route::delete('profile/{id}','App\Http\Controllers\HomeController@destroy')->name('delete_user');

Route::resource('posts','App\Http\Controllers\PostController');

Auth::routes();
