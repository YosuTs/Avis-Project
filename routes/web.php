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

// Route::get('/', function () {
//     return view('reservation.index');
// });

Route::get('/', [
  'uses' => 'ReservationController@index',
  'as' => 'reservation.index'
]);

Route::post('/categories', [
  'uses' => 'CategoryController@showAvailableCategories',
  'as' => 'categories.show'
]);

Route::post('/additionalService', [
  'uses' => 'AdditionalServiceController@showAdditionalServices',
  'as' => 'additionalServices.show'
]);

Route::post('/reservation', [
  'uses' => 'ReservationController@personal_information',
  'as' => 'personal_information.show'
]);

Route::post('/reservation/pay', [
  'uses' => 'ReservationController@show_pay',
  'as' => 'pay.show'
]);

Route::post('/reservation/detail/', [
  'uses' => 'ReservationController@show_reservation_details_post',
  'as' => 'reservation.detail'
]);

Route::get('/reservation/search', [
  'uses' => 'ReservationController@search_reservation',
  'as' => 'reservation.search'
]);

Route::post('/reservation/conekta', [
  'uses' => 'ReservationController@choose_payment',
  'as' => 'reservation.choose_payment'
]);

Route::post('/pay', [
  'uses' => 'PayController@pay',
  'as' => 'pay.pay'
]);

Route::get('/category/categories', [
  'uses' => 'CategoryController@showCategories',
  'as' => 'category.categories'
]);

Route::get('/category/returnAdd', [
  'uses' => 'CategoryController@returnAdd',
  'as' => 'category.returnAdd'
]);

Route::post('/category/add', [
  'uses' => 'CategoryController@add',
  'as' => 'category.add'
]);

Route::get('/reservation/cancel/{id}', [
  'uses' => 'ReservationController@cancel_reservation',
  'as' => 'reservation.cancel'
]);

Route::get('/category/delete/{id}', [
  'uses' => 'CategoryController@delete',
  'as' => 'category.delete'
]);
