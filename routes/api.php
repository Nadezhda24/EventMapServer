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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/users", 'EventsController@getUsers' );

Route::get("/users/{id}", 'EventsController@userLogin');

Route::post("/users", 'EventsController@loginData' );

Route::get("/event", 'EventsController@getEvents' );

Route::get("/category", 'EventsController@getCategory');

Route::get("event/{id}", 'EventsController@getEventFilter');

Route::post("/new_event", 'EventsController@newEvent');

Route::post("/password", 'EventsController@getPassword');
