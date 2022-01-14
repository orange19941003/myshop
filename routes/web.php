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
Route::post('sendCode', 'IndexController@sendCode')->middleware(['throttle:10,60']);
Route::get('register', 'RegisterController@get');
Route::post('register', 'RegisterController@post')->middleware(['throttle:10,60']);
Route::get('login', 'LoginController@get');
Route::post('login', 'LoginController@post')->middleware(['throttle:10,60']);;
Route::get('forgetPwd', 'ForgetPwdController@get');
Route::post('forgetPwd', 'ForgetPwdController@post')->middleware(['throttle:10,60']);
Route::post('upload/uploadImg', 'UploadController@uploadImg');

Route::group(['middleware'=>'check.login.index'], function() {
	Route::get('cart', 'CartController@index');
});

//admin模块

Route::group(['namespace'=>'admin', 'prefix'=>'admin', 'middleware'=>'checkLogin'], function() {
	Route::get('/', 'IndexController@index');
	Route::get('index', 'IndexController@index');
	//权限管理
	Route::prefix('auth')->group(function() {
		Route::get('index', 'AuthController@index');
		Route::get('list', 'AuthController@list');
		Route::get('add', 'AuthController@add');
		Route::post('add', 'AuthController@addPost');
		Route::get('del/{id}', 'AuthController@del');
		Route::get('edit/{id}', 'AuthController@edit');
		Route::post('edit/{id}', 'AuthController@editPost');
	});
	//后台用户管理
	Route::prefix('admin')->group(function() {
		Route::get('index', 'AdminController@index');
		Route::get('list', 'AdminController@list');
		Route::get('add', 'AdminController@add');
		Route::post('add', 'AdminController@addPost');
		Route::get('del/{id}', 'AdminController@del');
		Route::get('edit/{id}', 'AdminController@edit');
		Route::post('edit/{id}', 'AdminController@editPost');
	});
	//后台角色管理
	Route::prefix('role')->group(function() {
		Route::get('index', 'RoleController@index');
		Route::get('list', 'RoleController@list');
		Route::get('add', 'RoleController@add');
		Route::post('add', 'RoleController@addPost');
		Route::get('del/{id}', 'RoleController@del');
		Route::get('edit/{id}', 'RoleController@edit');
		Route::post('edit/{id}', 'RoleController@editPost');
	});
	//商品分类管理
	Route::prefix('cate')->group(function() {
		Route::get('index', 'CateController@index');
		Route::get('list', 'CateController@list');
		Route::get('add', 'CateController@add');
		Route::post('add', 'CateController@addPost');
		Route::get('del/{id}', 'CateController@del');
		Route::get('edit/{id}', 'CateController@edit');
		Route::post('edit/{id}', 'CateController@editPost');
	});
	//商品管理
	Route::prefix('product')->group(function() {
		Route::get('index', 'ProductController@index');
		Route::get('list', 'ProductController@list');
		Route::get('add', 'ProductController@add');
		Route::post('add', 'ProductController@addPost');
		Route::get('del/{id}', 'ProductController@del');
		Route::get('edit/{id}', 'ProductController@edit');
		Route::post('edit/{id}', 'ProductController@editPost');
		Route::get('changeStatus/{id}', 'ProductController@changeStatus');
	});
	//商品sku管理
	Route::prefix('sku')->group(function() {
		Route::get('index', 'SkuController@index');
		Route::get('list', 'SkuController@list');
		Route::get('add', 'SkuController@add');
		Route::post('add', 'SkuController@addPost');
		Route::get('del/{id}', 'SkuController@del');
		Route::get('edit/{id}', 'SkuController@edit');
		Route::post('edit/{id}', 'SkuController@editPost');
		Route::get('changeStatus/{id}', 'SkuController@changeStatus');
	});
	//商品图片管理
	Route::prefix('productImg')->group(function() {
		Route::get('index', 'ProductImgController@index');
		Route::get('list', 'ProductImgController@list');
		Route::get('add/{product_id}', 'ProductImgController@add');
		Route::post('add/{product_id}', 'ProductImgController@addPost');
		Route::get('del/{id}', 'ProductImgController@del');
		Route::get('edit/{id}', 'ProductImgController@edit');
		Route::post('edit/{id}', 'ProductImgController@editPost');
	});
	Route::get('login', 'LoginController@get');
	Route::post('login', 'LoginController@post');
	Route::get('out', 'LoginController@out');
});