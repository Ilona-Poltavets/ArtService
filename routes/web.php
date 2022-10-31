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

Route::get('/', function(){
    return view('welcome');
})->name('home');
Route::get('/profile', 'App\Http\Controllers\HomeController@show')->name('profile');
Route::get('/my_posts', 'App\Http\Controllers\HomeController@index')->name('myPosts');
Route::resource('posts','App\Http\Controllers\PostController');

Auth::routes();
