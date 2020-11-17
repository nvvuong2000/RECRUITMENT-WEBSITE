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
//home
Route::get('/','HomeController@trangchu');

Auth::routes();

Route::get('/trangchu', 'HomeController@trangchu');
//dang-nhap
//Route::get('/dang-nhap', 'LoginController@dangnhap');






//nhatuyendung
Route::get('/admin', 'NhatuyendungController@index');
Route::get('/admin-layout', 'NhatuyendungController@show_admin');
Route::post('/admin-layout', 'NhatuyendungController@dashboard');
//Route::get('/thongtin-nhatuyendung','NhatuyendungController@thongtinntt');
Route::get('/danhsach-ungtuyen','NhatuyendungController@dsungtuyen');
Route::get('/dangtuyen-nhanvien','NhatuyendungController@dangtuyen');
Route::post('/dangtuyen-nhanvien','NhatuyendungController@dangtuyen');
Route::get('/dang-nhap','DangnhapController@dangnhapntd');
route::get('/quanly-tintuyendung','tintuyendungController@quanlytintd');
//dang nhap
Route::post('/thongtin-doanhnghiep','DangnhapController@thongtinntt');
//dang xuat
Route::get('/dangxuat','DangnhapController@dangxuat');
//tin-tuyen-dung
Route::post('/luu-tintuyendung','tintuyendungController@luutintd');
Route::get('/chitiet-tintuyendung/{id_tintuyendung}','tintuyendungController@chitiettintd');
//nguoi-tim-viec
Route::get('/nguoi-tim-viec','HomeController@nguoitimviec');
//nguoi-tuyen-dung
Route::get('/nguoi-tuyen-dung','HomeController@nguoituyendung');
//thong-tin-doanh-nghiep
Route::get('/thongtin-doanhnghiep','DoanhnghiepController@thongtindoanhnghiep');
Route::post('/luu-doanhnghiep','doanhnghiepController@luudoanhnghiep');