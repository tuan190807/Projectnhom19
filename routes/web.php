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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/teaching-manage', 'TeachingController@getByTeacherId')->name('teaching-manage');
Route::get('/teaching-create', 'TeachingController@create')->name('teaching-create');
Route::post('/teaching-store', 'TeachingController@store')->name('teaching-store');
Route::get('/teaching-edit', 'TeachingController@edit')->name('teaching-edit');
Route::post('/teaching-update', 'TeachingController@update')->name('teaching-update');
Route::post('/teaching-delete', 'TeachingController@delete')->name('teaching-delete');
Route::get('/teaching-view', 'TeachingController@view')->name('teaching-view');
