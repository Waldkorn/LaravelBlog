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

Route::get('/profile/{profileName}/upgrade', 'profileController@upgrade');

Route::post('/profile/{profileName}/setUpgrade', 'profileController@setUpgrade');

Route::get('/profile', 'profileController@read');


//////////////////////////////////
// InformationController routes //
//////////////////////////////////

Route::get('/information', 'InformationController@index');


//////////////////////////////////
// SQL Dump Test routes //
//////////////////////////////////

Route::get('/sqldump', function(){
  
  $command;
  $dbConnection = env('DB_CONNECTION');
  $dbName = env('DB_DATABASE');
  $dbHost = env('DB_HOST');
  $dbPort = env('DB_PORT');
  $dbUsername = env('DB_USERNAME');
  $dbPassword = env('DB_PASSWORD');

  switch ($dbConnection) {
    case "mysql":
        $command = "mysqldump $dbName -h$dbHost -P$dbPort -u$dbUsername -p$dbPassword > database_backup.sql";
        break;
    case "pgsql":
        $command = "PGPASSWORD='$dbPassword' pg_dump -h $dbHost -p $dbPort -U $dbUsername $dbName > database_backup.sql";
        break;
  }

  exec($command);
  return response()->download('database_backup.sql')->deleteFileAfterSend(true);

});
