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

Route::get('/', function () {
    return redirect('blog');
});
Route::get('blog', 'BlogController@index');
Route::get('blog/{slug}', 'BlogController@showPost');

Route::get('admin', function(){
    return redirect('admin/post');
});

Route::group(['middleware' => 'auth', 'namespace' => 'Admin'], function(){
    Route::resource('/admin/tag', 'TagController', ['except' => 'show']);
    Route::resource('/admin/post', 'PostController');
    Route::get('admin/upload', 'UploadController@index');
});
//worker: php artisan queue:listen in procfile


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('test', function() {
    return view('admin.layout');
});
Route::resource('photos/', 'PhotoController');