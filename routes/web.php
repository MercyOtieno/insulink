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

Auth::routes(['verify' => true]);
Route::get('/customers/dashboard', 'HomeController@index')->name('customer.dashboard');
Route::get('/customers/quotations', 'HomeController@customerQuotations')->name('customer.quotations.view');
Route::get('customers/profile/{id}', 'HomeController@profile')->name('customer.profile');
Route::put('customers/profile/{id}', 'HomeController@updatepersonal')->name('customer.profile.update');
Route::post('customers/profile/change-password', 'HomeController@updatePassword')->name('customer.change.password');
