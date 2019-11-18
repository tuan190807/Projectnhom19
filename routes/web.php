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
    return redirect(route('login'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin','TeachingContentController@goHome')->name('admin');
// ->middleware('admin');
Route::get('/admin/client','TeachingContentController@index')->name('client');
// ->middleware('admin');
Route::post('/client/create','TeachingContentController@create')->name('client-create');
// ->middleware('admin');
Route::put('/client/update/{id}','TeachingContentController@update')->name('client-update');
// ->middleware('admin');
Route::delete('/client/delete/{id}','TeachingContentController@destroy')->name('client-delete');
// ->middleware('admin');
Route::get('/admin/managerteacher','TeacherController@index')->name('teacher-index');
// ->middleware('admin');
Route::post('/client/createteacher','TeacherController@create')->name('teacher-create');
// ->middleware('admin');
Route::put('/client/updateteacher/{id}','TeacherController@update')->name('teacher-update');
// ->middleware('admin');
Route::delete('/client/deleteteacher/{id}','TeacherController@destroy')->name('teacher-delete');
// ->middleware('admin');

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

Route::get('/user', 'CustomUserController@index')->name('user');

Route::get('/teachings', 'TeachingController@getAllByCustomer')->name('teachings');
Route::POST('/forgetSession', 'TeachingController@forgetSession')->name('forgetSession');


