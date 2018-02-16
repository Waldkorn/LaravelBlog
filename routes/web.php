<?php

Route::get('/', 'PostsController@index');

Route::get('/posts/create', 'PostsController@create');

Route::post('/posts', 'PostsController@store');

Route::get('/posts/{post}', 'PostsController@show');

Route::post('/posts/{post}/comments', 'CommentsController@store');

Route::get('/categories/', 'CategoryController@index');

Route::get('/categories/{category}/posts', 'CategoryController@show');

Route::post('/comments/{comment}/delete', 'CommentsController@delete');

Route::post('/categories/create', 'CategoryController@create');

Route::post('/comments/{post}/toggle', 'CommentsController@toggle');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');