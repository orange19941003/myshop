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

Route::get('/', 'IndexController@index');

//admin模块
Route::get('admin/', 'IndexController@index');

Route::prefix('admin')->group(function() {
	//权限管理
	Route::prefix('auth')->group(function() {
		Route::get('index', 'admin\AuthController@index');
		Route::get('list', 'admin\AuthController@list');
		Route::get('add', 'admin\AuthController@add');
		Route::post('add', 'admin\AuthController@addPost');
		Route::get('del/{id}', 'admin\AuthController@del');
		Route::get('edit/{id}', 'admin\AuthController@edit');
		Route::post('edit/{id}', 'admin\AuthController@editPost');
	});
	//后台用户管理
	Route::prefix('admin')->group(function() {
		Route::get('index', 'admin\AdminController@index');
		Route::get('list', 'admin\AdminController@list');
		Route::get('add', 'admin\AdminController@add');
		Route::post('add', 'admin\AdminController@addPost');
		Route::get('del/{id}', 'admin\AdminController@del');
		Route::get('edit/{id}', 'admin\AdminController@edit');
		Route::post('edit/{id}', 'admin\AdminController@editPost');
	});
	//后台角色管理
	Route::prefix('role')->group(function() {
		Route::get('index', 'admin\RoleController@index');
		Route::get('list', 'admin\RoleController@list');
		Route::get('add', 'admin\RoleController@add');
		Route::post('add', 'admin\RoleController@addPost');
		Route::get('del/{id}', 'admin\RoleController@del');
		Route::get('edit/{id}', 'admin\RoleController@edit');
		Route::post('edit/{id}', 'admin\RoleController@editPost');
	});
});

