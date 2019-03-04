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


//商家列表
Route::get('/api/business_list','Api\ApiController@BusinessList');
Route::get('/api/business','Api\ApiController@Business');

//会员注册登录
Route::post('/api/regist','Api\ApiController@regist');
Route::post('/api/loginCheck','Api\ApiController@loginCheck');
//发送短信
Route::get('/api/sms','Api\ApiController@sms');
//用户地址列表接口
Route::get('/api/AddressList','Api\ApiController@AddressList');
//用户指定地址接口
Route::get('/api/Address','Api\ApiController@Address');
//新增地址接口
Route::post('/api/addAddress','Api\ApiController@addAddress');
//保存修改地址接口
Route::post('/api/editAddress','Api\ApiController@editAddress');

//购物车接口
Route::get('/api/Cart','Api\ApiController@Cart');
Route::post('/api/AddCart','Api\ApiController@AddCart');

//添加订单接口
Route::post('/api/addOrder','Api\ApiController@addOrder');
Route::get('/api/orderList','Api\ApiController@orderList');
Route::get('/api/order','Api\ApiController@order');
//密码接口
Route::post('/api/changePassword','Api\ApiController@changePassword');
Route::post('/api/forgetPassword','Api\ApiController@forgetPassword');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
