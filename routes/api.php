<?php

use Illuminate\Http\Request;
use App\Models\User;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::middleware('auth:api')->get('/user', 'User');


// Route::group(['middleware' => 'auth:api'] , function () {
	Route::get('rooms', 'Api\AllController@rooms');
	Route::get('expertises', 'Api\AllController@expertises');
	Route::get('teachers', 'Api\AllController@teachers');
	Route::get('lessons', 'Api\AllController@lessons');
	Route::get('majors', 'Api\AllController@majors');
	Route::get('levels', 'Api\AllController@levels');

// });
