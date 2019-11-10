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

Route::get('/','TeachingContentController@index');
Route::post('/client/create','TeachingContentController@create');
Route::put('/client/update/{id}','TeachingContentController@update');
Route::delete('/client/delete/{id}','TeachingContentController@destroy');

Route::get('/teaching-manage', 'TeachingController@getByTeacherId')->name('teaching-manage')
																   ->middleware('teacher');
Route::get('/teaching-create', 'TeachingController@create')->name('teaching-create')
									 					   ->middleware('teacher');
Route::post('/teaching-store', 'TeachingController@store')->name('teaching-store')
									 					  ->middleware('teacher');
Route::get('/teaching-edit', 'TeachingController@edit')->name('teaching-edit')
									 				   ->middleware('teacher');
Route::post('/teaching-update', 'TeachingController@update')->name('teaching-update')
									 						->middleware('teacher');
Route::post('/teaching-delete', 'TeachingController@delete')->name('teaching-delete')
									 						->middleware('teacher');
Route::get('/teaching-view', 'TeachingController@view')->name('teaching-view');

