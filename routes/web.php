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

Route::get('/', 'ReservationController@index');

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
