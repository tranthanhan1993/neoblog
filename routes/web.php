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

Route::get('/', 'BlogController@index');
Route::get('post/{slug}', 'BlogController@showPost');

Route::group(['middleware' => ['auth', 'admin'], 'namespace' => 'Admin'], function(){
    Route::get('admin', 'AdminController@index');
    Route::resource('/admin/tag', 'TagController', ['except' => 'show']);
    Route::get('/admin/tag/{id}', 'TagController@destroy');
    Route::resource('/admin/post', 'PostController');
    Route::get('/admin/post/delete/{id}', 'PostController@destroy')->where('id', '[0-9]+');
    Route::post('/admin/post/{id}', 'PostController@update');
    Route::get('admin/upload', 'UploadController@index');
    Route::get('admin/message', 'MessageController@index');
    Route::post('admin/message/delete/{id}', 'MessageController@delete');
    Route::get('admin/comment', 'CommentController@index');
    Route::post('admin/comment/delete/{id}', 'CommentController@delete');
});

Auth::routes();
Route::group(['middleware'=>'auth'], function(){
    Route::get('profile', 'UserController@profile');
    Route::get('profile/edit', 'UserController@editProfile');
    Route::post('profile/{id}', 'UserController@updateProfile');
    Route::get('/message', 'MessageController@index');
    Route::post('/message', 'MessageController@store');
    Route::post('comment/{id}', 'CommentController@store');
Route::post('comment/delete/{id}', 'CommentController@delete');
});

Route::get('logout', 'Auth\LoginController@logout');

