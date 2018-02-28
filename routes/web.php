<?php

////////////////////////////
// Postscontroller routes //
////////////////////////////

Route::get('/', 'PostsController@index');

Route::get('/posts/create', 'PostsController@create');

Route::post('/posts', 'PostsController@store');

Route::get('/posts/{post}', 'PostsController@show');

Route::get('/posts/{post}/edit', 'PostsController@edit');

Route::post('/posts/{post}/update', 'PostsController@update');

Route::post('/posts/search', 'PostsController@search');

Route::post('/posts/{post}/delete', 'PostsController@remove');

Route::get('/{month}/posts', 'PostsController@month');


//////////////////////////
// BlogController routes//
//////////////////////////

Route::get('/blog/{user}', 'BlogController@index');

Route::post('/blog/{user}/blogEdit', "BlogController@edit");


///////////////////////////////
// CategoryController routes //
///////////////////////////////

Route::get('/categories/', 'CategoryController@index');

Route::get('/categories/{category}/posts', 'CategoryController@show');

Route::post('/categories/create', 'CategoryController@create');


///////////////////////////////
// CommentsController routes //
///////////////////////////////

Route::post('/comments/{comment}/delete', 'CommentsController@delete');

Route::post('/comments/{post}/toggle', 'CommentsController@toggle');

Route::post('/posts/{post}/comments', 'CommentsController@store');

Route::post('/comments/{post}/showComments', 'CommentsController@showComments');


///////////////////////////
// Authentication routes //
///////////////////////////

Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


//////////////////////////////
// ProfileController routes //
//////////////////////////////

Route::get('/profile/{profileId}/follow', 'ProfileController@followUser');

Route::get('/profile/{profileId}/unfollow', 'ProfileController@unFollowUser');

Route::get('/profile/{profileName}/upgrade', 'ProfileController@upgrade');

Route::post('/profile/{profileName}/setUpgrade', 'ProfileController@setUpgrade');

Route::get('/profile', 'ProfileController@read');


//////////////////////////////////
// InformationController routes //
//////////////////////////////////

Route::get('/information', 'InformationController@index');


//////////////////////////////////
// PlatformOwnerController routes //
//////////////////////////////////

Route::get('/dbdump', 'PlatformOwnerController@downloadDBDump');
