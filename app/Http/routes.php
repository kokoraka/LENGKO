<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/* authentication */
//Route::auth();
// Admin login
Route::get('/dashboard/login', 'Auth\AuthController@showLoginForm')->name('auth.login.get');
Route::post('/dashboard/login', 'Auth\AuthController@login')->name('auth.login.post');


Route::group(['middleware' => 'auth'], function() {
  /* Dashboard */

  Route::get('/dashboard/logout', 'LoginController@logout');

  Route::post('/dashboard/create/device', 'DeviceController@create');
  Route::post('/dashboard/search/device', 'DeviceController@search');
  Route::get('/dashboard/retrieve/device', 'DeviceController@retrieve');

  Route::post('/dashboard/create/employee', 'EmployeeController@create');
  Route::post('/dashboard/search/employee', 'EmployeeController@search');
  Route::get('/dashboard/retrieve/employee', 'EmployeeController@retrieve');

  Route::post('/dashboard/create/request', 'PengadaanController@createrequest');
  Route::post('/dashboard/search/materialrequest', 'PengadaanController@searchrequest');

  Route::post('/dashboard/create/materialrequest', 'PengadaanController@acceptrequest');
  Route::post('/dashboard/decline/material', 'PengadaanController@declinerequest');

  Route::post('/dashboard/create/material', 'MaterialController@create');
  Route::post('/dashboard/search/material', 'MaterialController@search');

  Route::post('/dashboard/create/menu', 'MenuController@create');
  Route::post('/dashboard/search/menu', 'MenuController@search');
  Route::post('/dashboard/search/materialmenu', 'MenuController@searchmaterial');

  Route::post('/dashboard/confirm/order', 'OrderController@confirm');
  Route::post('/dashboard/search/order', 'OrderController@search');

  Route::get('/dashboard/update/order/{id}', 'OrderController@marked');
  Route::get('/dashboard/update/ordermenu/{id}', 'OrderController@checked');
  Route::get('/dashboard/update/transaction/{id}/{cash}', 'TransactionController@marked');
  Route::post('/dashboard/search/transaction', 'TransactionController@search');
  Route::post('/dashboard/search/transactionhistory', 'TransactionController@searchhistory');

  Route::get('/dashboard/retrieve/income', 'ReportController@income');
  Route::post('/dashboard/retrieve/report', 'ReportController@report');

  Route::post('/dashboard/create/review', 'ReviewController@create');
  Route::get('/dashboard/retrieve/review', 'ReviewController@retrieve');
  Route::post('/dashboard/search/review', 'ReviewController@search');

  Route::put('/dashboard/update/{param}/', 'DashboardController@update');
  Route::delete('/dashboard/delete/{param}/{id}', 'DashboardController@delete');

  Route::get('/dashboard/', 'DashboardController@index');
  Route::get('/dashboard/{param}/', 'DashboardController@view');

  Route::get('/ajax/object/{param}', 'HomeController@ajax_handler');
});


  /* Customer */
  Route::get('/', 'HomeController@index');
  Route::get('/{param}/', 'HomeController@view');

  Route::post('/customer/search/menu', 'HomeController@searchmenu');
