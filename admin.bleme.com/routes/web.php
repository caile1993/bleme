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
    return view('welcome');
});



Route::resource('shop_categorys','Shop_CategoryController');
Route::resource('shops','ShopController');
//审核
Route::get('shops/audit/{shop}','ShopController@audit')->name('shops.audit');
//禁用
Route::get('shops/forbidden/{shop}','ShopController@forbidden')->name('shops.forbidden');
Route::resource('admins','AdminController');

Route::resource('users','UserController');
Route::get('users/status/{user}','UserController@status')->name('users.status');

//管理员登录和注销
Route::get('login','LoginController@create')->name('login');
Route::post('login','LoginController@store')->name('login');
Route::get('logout','LoginController@destory')->name('logout');
//活动路由
Route::resource('activitys','ActivityController');

//相当于定义了以下路由
/*Route::get('/users', 'UsersController@index')->name('users.index');//用户列表
Route::get('/users/{user}', 'UsersController@show')->name('users.show');//查看单个用户信息
Route::get('/users/create', 'UsersController@create')->name('users.create');//显示添加表单
Route::post('/users', 'UsersController@store')->name('users.store');//接收添加表单数据
Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');//修改用户表单
Route::patch('/users/{user}', 'UsersController@update')->name('users.update');//更新用户信息
Route::delete('/users/{user}', 'UsersController@destroy')->name('users.destroy');//删除用户信息*/