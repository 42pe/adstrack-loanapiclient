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


Route::get('/', 'LoanApiClient@index');
Route::post('/', 'LoanApiClient@post');

Route::match(['get', 'post'],'/about', function(){
  return view('LoanApiClient/about');
});
Route::match(['get', 'post'],'/terms', function(){
  return view('LoanApiClient/terms');
});
Route::match(['get', 'post'],'/econsent', function(){
  return view('LoanApiClient/econsent');
});