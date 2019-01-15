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
Route::get('admin/register','RegisterController@display');
Route::post('admin/register','RegisterController@add');
Route::get('admin/','IndexController@adminIndex')->middleware('checklogin');
Route::post('admin/name_update','UpdateUserController@update_name')->middleware('checklogin');
Route::post('admin/email_update','UpdateUserController@update_email')->middleware('checklogin');
Route::post('admin/password_update','UpdateUserController@update_password')->middleware('checklogin');
Route::post('admin/accept_comment','CommentController@accept')->middleware('checklogin');
Route::post('admin/reject_comment','CommentController@reject')->middleware('checklogin');
Route::get('admin/entry_manage','EntryController@manage')->middleware('checklogin');
Route::get('admin/comment/{id}','CommentController@display')->middleware('checklogin');
Route::get('admin/entry_add','EntryController@add')->middleware('checklogin');
Route::get('admin/login','LoginController@login');
Route::post('admin/login-process','LoginController@verify');
Route::get('crop', function() {
    return view('crop');
});
Route::get('admin/logout','LoginController@logout');
Route::post('add-comment','CommentController@add');