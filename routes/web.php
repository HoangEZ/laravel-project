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

Route::get('/','IndexController@index');
Route::get('entry/{id}','EntryController@entry');
Route::get('about', function() {
    return view('about');
});
Route::get('blog', function() {
    return view('blog');
});
Route::get('blog-detail',function(){
	return view('blog-detail');
});
Route::get('contact', function() {
    return view('contact');
});
Route::get('admin/','IndexController@adminIndex')->middleware('checklogin');
Route::get('admin/login','LoginController@login');
Route::post('admin/login-process','LoginController@verify');
Route::get('crop', function() {
    return view('crop');
});
Route::post('add-comment','CommentController@add');