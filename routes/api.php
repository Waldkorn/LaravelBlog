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

Route::get('/categories', 'API\CategoryController@get');

Route::get('/categories/{category}', 'API\CategoryController@getPostsFromCategory');


Route::get('/topUsers', 'API\UserController@getTopUsers');

Route::get('/archives', 'API\PostController@getArchives');


Route::get('/posts', 'API\PostController@get');

Route::get('/posts/{user}', 'API\PostController@getMessagesFromUser');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
