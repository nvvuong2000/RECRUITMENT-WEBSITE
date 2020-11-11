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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
//nguoidung
Route::get('/home', 'HomeController@index')->name('home');








//admin
Route::get('/admin', 'adminController@index');
Route::get('/admin-layout', 'adminController@show_admin');
Route::post('/admin-layout', 'adminController@dashboard');
//user
Route::get('/user', 'UserController@index');
Route::get('/user-layout', 'UserController@show_User');
Route::post('/user-layout', 'UserController@dashboard');
Route::get('/user-dangky', 'UserController@dangky');