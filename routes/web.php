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

Auth::routes();

Route::resource('employees', 'EmployeeController')->middleware('auth');

Route::get('/home', 'EmployeeController@index')->name('home');

Route::get('export', 'EmployeeController@export')->name('export')->middleware('auth');

Route::post('import', 'EmployeeController@import')->name('import')->middleware('auth');


