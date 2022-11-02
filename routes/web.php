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

Route::get('/', 'App\Http\Controllers\PostController@index')->name('home');

Route::get('/profile/{id}', 'App\Http\Controllers\HomeController@show')->name('profile');
Route::patch('/profile/{user}', 'App\Http\Controllers\HomeController@save')->name('edit_profile');
Route::get('/authorsPosts/{id}', 'App\Http\Controllers\HomeController@index')->name('get_posts');


Route::get('/expert/add', 'App\Http\Controllers\HomeController@create')->name('create_expert');
Route::post('/expert', 'App\Http\Controllers\HomeController@store')->name('store_expert');
Route::get('/expertRate/{id}', 'App\Http\Controllers\HomeController@getRate')->name('get_rate');
Route::get('/rate/{postID}/add', 'App\Http\Controllers\RateController@create')->name('rates.create')->middleware('role:expert');
Route::get('/rate/{id}/{postId}/edit', 'App\Http\Controllers\RateController@edit')->name('rates.edit')->middleware('role:expert');
Route::post('/rate/{postID}/create', 'App\Http\Controllers\RateController@store')->name('rates.store')->middleware('role:expert');
Route::patch('/rate/{id}/{postId}/update', 'App\Http\Controllers\RateController@update')->name('rates.update')->middleware('role:expert');

Route::get('/admin_panel', 'App\Http\Controllers\HomeController@adminPanel')->name('adminPanel')->middleware('role:admin');
Route::delete('profile/{id}', 'App\Http\Controllers\HomeController@destroy')->name('delete_user');

Route::resource('posts', 'App\Http\Controllers\PostController');

Route::post('/send_comment', 'App\Http\Controllers\CommentController@store');
Route::post('/send_answer', 'App\Http\Controllers\CommentController@answer');

Route::post('/search', 'App\Http\Controllers\SearchController@searchByAuthor');
Route::post('/sort', 'App\Http\Controllers\SearchController@SortBy');
Route::post('/getByCat', 'App\Http\Controllers\SearchController@SortByCat');

Auth::routes(['verify' => true]);
