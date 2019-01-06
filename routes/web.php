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

//KURIKULUM

Route::group(['prefix' => 'curriculum', 'middleware' => ['auth','role:curriculum']], function() {

	Route::get('generate/{level_id}/{major_id}/{expertise_id}', 'GenerateController@showmixexpert')->name('showmixexpert.generate');

	Route::get('generate/{level_id}/{major_id}', 'GenerateController@showmixcurri')->name('showmixcurri.generate');

	Route::get('expertise/{level_id}/{major_id}', 'ExpertiseController@mix')->name('mix.expertise');

	Route::get('expertise/{level_id}/{major_id}/{expertise_id}/edit', 'ExpertiseController@editmix')->name('editmix.expertise');

	Route::get('teacher/{typeteacher_id}', 'TeacherController@mix')->name('mix.teacher');

	Route::get('teacher/{typeteacher_id}/{teacher_id}/edit', 'TeacherController@editmix')->name('editmix.teacher');

	Route::get('lesson/{typelesson_id}', 'LessonController@mix')->name('mix.lesson');

	Route::get('lesson/{typelesson_id}/{lesson_id}/edit', 'LessonController@editmix')->name('editmix.lesson');

	Route::get('room/{typeroom_id}', 'RoomController@mix')->name('mix.room');

	Route::get('room/{typeroom_id}/{room_id}/edit', 'RoomController@editmix')->name('editmix.room');

	Route::resource('teacher', 'TeacherController')->except(['create', 'show']);

	Route::resource('room', 'RoomController')->except(['create', 'show']);

	Route::resource('lesson', 'LessonController')->except(['create', 'show']);

	Route::resource('expertise', 'ExpertiseController')->except(['create', 'show']);

	Route::get('/', function() {
	    return view('curriculums.content');
	})->name('curriculum');
});

// JURUSAN

Route::group(['prefix' => 'major', 'middleware' => ['auth','role:major']], function() {

	Route::get('generate/{level_id}/{major_id}', 'GenerateController@showmixmajor')->name('showmixmajor.generate');
	
	Route::get('room/{typeroom_id}', 'RoomController@view')->name('room.view');

	Route::get('lesson/{typelesson_id}', 'LessonController@view')->name('lesson.view');
	
	Route::get('expertise/{level_id}/{major_id}', 'ExpertiseController@view')->name('expertise.view');
	
	Route::get('teacher/{typeteacher_id}', 'TeacherController@view')->name('teacher.view');

	Route::get('/', function() {
	    return view('majors.content');
	})->name('major');
});

Route::get('/404', function() { 
	return view('errors.404');
})->name('404');

Route::get('/', function() {
	return view('welcome');
});

Auth::routes();


// Route::get('/curriculum/teacher', function() {
// 	return view('curriculums.teachers.index');
// })->name('curriculums.teachers.index');

// Route::group(['prefix' => 'major', 'middleware' => 'auth','role:major'], function() {

// 	Route::get('/', 'MajorController@index')->name('major');
// });
