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

Route::get('/','TeachingContentController@index');
Route::post('/client/create','TeachingContentController@create');
Route::put('/client/update/{id}','TeachingContentController@update');
Route::delete('/client/delete/{id}','TeachingContentController@destroy');
Route::get('/managerteacher','TeacherController@index');
Route::post('/client/createteacher','TeacherController@create');
Route::put('/client/updateteacher/{id}','TeacherController@update');
Route::delete('/client/deleteteacher/{id}','TeacherController@destroy');
