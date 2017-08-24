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
// Route::get('blog', 'BlogController@index');
Route::get('post/{slug}', 'BlogController@showPost');
Route::get('admin', function(){
    return view('admin.index');
});

Route::group(['middleware' => 'auth', 'namespace' => 'Admin'], function(){
    Route::resource('/admin/tag', 'TagController', ['except' => 'show']);
    Route::get('/admin/tag/{id}', 'TagController@destroy');
    Route::resource('/admin/post', 'PostController');
    Route::get('/admin/post/delete/{id}', 'PostController@destroy')->where('id', '[0-9]+');
    Route::post('/admin/post/{id}', 'PostController@update');
    Route::get('admin/upload', 'UploadController@index');
});
//worker: php artisan queue:listen in procfile


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('test', function() {
    return view('admin.layout');
});
Route::resource('photos/', 'PhotoController');
Route::get('logout', 'Auth\LoginController@logout');

Route::post('comment/{id}', 'CommentController@store');
Route::post('comment/delete/{id}', 'CommentController@delete');