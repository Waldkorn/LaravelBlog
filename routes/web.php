<?php

Route::get('/', 'PostsController@index');

Route::get('/posts/create', 'PostsController@create');

Route::post('/posts', 'PostsController@store');

Route::get('/posts/{post}', 'PostsController@show');

Route::get('/posts/{post}/edit', 'PostsController@edit');

Route::post('/posts/{post}/update', 'PostsController@update');

Route::post('/posts/search', 'PostsController@search');

Route::get('/posts/blog/{user}', 'PostsController@blog');

Route::post('/posts/blog/{user}/changeBlogName', "PostsController@changeBlogName");

Route::post('/posts/{post}/delete', 'PostsController@remove');


Route::get('/categories/', 'CategoryController@index');

Route::get('/categories/{category}/posts', 'CategoryController@show');

Route::post('/categories/create', 'CategoryController@create');



Route::post('/comments/{comment}/delete', 'CommentsController@delete');

Route::post('/comments/{post}/toggle', 'CommentsController@toggle');

Route::post('/posts/{post}/comments', 'CommentsController@store');


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');