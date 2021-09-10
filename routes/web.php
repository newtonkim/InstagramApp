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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/post/create', 'PostsController@create')->name('post.create');
Route::get('/post/{id}', 'PostsController@show')->name('post.show');
Route::get('/profile/{id}', 'userProfileController@index')->name('profile.index');
Route::post('/post', 'PostsController@store')->name('post.store');

