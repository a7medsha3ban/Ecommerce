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

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('/admin')->namespace('Admin')->group(function () {
    //all admin routes will be defined here

    Route::match(['GET', 'POST'], 'login','adminController@login');
    Route::middleware('isAdmin')->group(function (){
        Route::get('dashboard', 'adminController@dashboard');
        Route::get('logout', 'adminController@logout');

    });
});
