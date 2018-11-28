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
Route::group(['prefix' => 'curriculum', 'middleware' => 'auth','role:curriculum'], function() {

	Route::get('/', 'CurriculumController@index')->name('curriculum');
});

Route::group(['prefix' => 'major', 'middleware' => 'auth','role:major'], function() {

	Route::get('/', 'MajorController@index')->name('major');
});

Route::get('/curriculum/teacher', function() {
	return view('curriculums.teachers.index');
})->name('curriculums.teachers.index');

Route::get('/404', function() { 
	return view('errors.404');
})->name('404');



Route::get('/', function() {
	return view('welcome');
});

Auth::routes();


