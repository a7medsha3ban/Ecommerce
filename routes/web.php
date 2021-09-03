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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('/admin')->namespace('Admin')->group(function () {
    //all admin routes will be defined here

    Route::match(['GET', 'POST'], 'login','adminController@login');
    Route::middleware('isAdmin')->group(function (){
        Route::get('dashboard', 'adminController@dashboard');
        Route::get('logout', 'adminController@logout');
        Route::get('settings', 'adminController@settings');
        Route::post('check-current-Password', 'adminController@check_currentPassword');
        Route::post('update-current-password', 'adminController@update_currentPassword');
        Route::match(['GET', 'POST'], 'details','adminController@update_adminDetails');
    });
});
