<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/



Route::post('register', 'UsersController@register');
Route::post('login', 'UsersController@authenticate');



Route::group(['middleware' => ['jwt.verify']], function() {
    Route::apiResource("rolusers","RolusersController");
    Route::apiResource("users","UsersController");
    Route::apiResource("tasks","TaskController");
    Route::apiResource("topics","TopicsController");
    Route::apiResource("courses","CourseController");
    Route::get('download', 'TaskController@downloadFile');
});

