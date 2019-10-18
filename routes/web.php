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

Route::get('/', 'Auth\LoginController@showLoginForm');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/deposit', 'HomeController@deposit')->name('deposit');
Route::post('/deposit/store', 'HomeController@depositStore')->name('deposit.store');
Route::get('/transfer', 'HomeController@transfer')->name('transfer');
Route::post('/transfer', 'HomeController@confirmTransfer')->name('confirm.transfer');
Route::post('/transfer/store', 'HomeController@transferStore')->name('transfer.store');
Route::get('/history', 'HomeController@history')->name('history');
