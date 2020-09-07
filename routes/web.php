<?php

use Illuminate\Support\Facades\Route;   
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

Route::view('/', 'welcome')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::middleware(['staff'])->group(function () {
    Route::get('/staff', 'StaffController@index')->name('staff.index');
    Route::get('/staff/leave-request', 'LeaveController@create')->name('staff.request_leave');
    Route::post('/staff/leave-request', 'LeaveController@store')->name('staff.store_leave');
});
