<?php

use App\Mail\SampleMail;
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::delete('/phone/delete/{id}', 'PhoneDirectoryController@delete')->name('delete.phone.record');
Route::get('phone/create', 'PhoneDirectoryController@create')->name('create.phone.record');
Route::post('phone/save', 'PhoneDirectoryController@save')->name('save.phone.record');
Route::get('phone/edit/{id}', 'PhoneDirectoryController@edit')->name('edit.phone.record');
Route::post('phone/update', 'PhoneDirectoryController@update')->name('update.phone.record');







