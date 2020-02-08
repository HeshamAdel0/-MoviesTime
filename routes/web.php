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

//Route::get('/', function () {
    //return view('welcome');
//});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', ['middleware' => ['role:owner|superadmin|admin|user'], 'uses' => 'dashboard\DashboardController@index'])->name('dashboard.index');

Route::group(['prefix' => 'admin', 'middleware' => ['role:owner|superadmin|admin|user']], function() {

	//Route User

	Route::get('/admins', 'UserController@index')->name('admins');
	Route::get('/admin/create', 'UserController@create')->name('admin.create');
	Route::get('/admin/edit/{id}', 'UserController@edit')->name('admin.edit');
	Route::get('/admin/delete/{id}', 'UserController@destroy')->name('admin.delete');
	Route::post('/admin/update/{id}', 'UserController@update')->name('admin.update');
	Route::post('/admin/store', 'UserController@store')->name('admin.store');
	Route::get('/admin/status/{id}', 'UserController@status')->name('admin.status');

	//Route Profile

	Route::get('/profile/{id}/{name}', 'ProfileController@index')->name('profile');
	Route::get('/profile/edit/{id}/{name}', 'ProfileController@edit')->name('profile.edit');
	Route::post('/profile/update/{id}', 'ProfileController@update')->name('profile.update');
	Route::post('/profile/store', 'ProfileController@store')->name('profile.store');


	// Route Categories

	Route::get('/categories', 'CategoryController@index')->name('categories');
	Route::get('/category/create', 'CategoryController@create')->name('category.create');
	Route::get('/category/edit/{id}', 'CategoryController@edit')->name('category.edit');
	Route::get('/category/delete/{id}', 'CategoryController@destroy')->name('category.delete');
	Route::post('/category/update/{id}', 'CategoryController@update')->name('category.update');
	Route::post('/category/store', 'CategoryController@store')->name('category.store');


	// Route Posts

	Route::get('/posts', 'PostController@index')->name('posts');
	Route::get('/post/create', 'PostController@create')->name('post.create');
	Route::get('/post/edit/{id}', 'PostController@edit')->name('post.edit');
	Route::post('/post/update/{id}', 'PostController@update')->name('post.update');
	Route::post('/post/store', 'PostController@store')->name('post.store');
	Route::get('/post/trash', 'PostController@trash')->name('post.trash');
	Route::get('/post/trash/{id}', 'PostController@destroy')->name('post.trashed');
	Route::get('/post/delete/{id}', 'PostController@harddelete')->name('post.harddelete');
	Route::get('/post/restore/{id}', 'PostController@restore')->name('post.restore');
	Route::get('/post/status/{id}', 'PostController@status')->name('post.status');


	// Route Tags

	Route::get('/tags', 'TagController@index')->name('tags');
	Route::get('/tag/create', 'TagController@create')->name('tag.create');
	Route::get('/tag/edit/{id}', 'TagController@edit')->name('tag.edit');
	Route::get('/tag/delete/{id}', 'TagController@destroy')->name('tag.delete');
	Route::post('/tag/update/{id}', 'TagController@update')->name('tag.update');
	Route::post('/tag/store', 'TagController@store')->name('tag.store');


	//Route Setting
	
	Route::get('/settings', 'SettingController@index')->name('settings');
	Route::get('/setting/edit/{id}', 'SettingController@edit')->name('setting.edit');
	Route::post('/setting/update/{id}', 'SettingController@update')->name('setting.update');

});

//Route Front-End
Route::get('/', 'frontend\FrontEndController@index')->name('home');

Route::get('/post/{id}/{slug}', 'frontend\FrontEndController@singlePage')->name('single.page');

Route::post('/comment/store', 'CommentController@store')->name('comment.add');
Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');

Route::get('/search', 'frontend\FrontEndController@search')->name('search');