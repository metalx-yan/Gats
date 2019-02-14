<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('type-teacher/{id}', 'ApiController@typeTeacher');
Route::get('hours/{day}/{major}', 'ApiController@hours');
Route::get('rooms/{type}/{day}/{hour}/{sesi}', 'ApiController@rooms');
// Route::get('typelesson/{type}/{major}', 'ApiController@typeLessons');
Route::group(['middleware' => 'auth:api'] , function () {
});