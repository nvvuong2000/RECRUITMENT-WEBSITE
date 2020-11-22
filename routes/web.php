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


Route::get('/trangchu', 'HomeController@trangchu');



//user 
Route::get('/tim-kiem', 'HomeController@search');
Route::get('/thaydoimatkhau', 'HomeController@index');
Route::post('/thaydoimatkhau', 'HomeController@changePassword');
Route::get('/loai/{id_loaituyendung}', 'HomeController@filter');

//nhatuyendung
Route::get('/admin', 'NhatuyendungController@index');
Route::get('/admin-layout', 'NhatuyendungController@show_admin');
Route::post('/admin-layout', 'NhatuyendungController@dashboard');
Route::get('/thongtin-doanhnghiep', 'DoanhNghiepController@thongtindoanhnghiep');
Route::get('/thongtin-ungvien', 'DoanhNghiepController@thongtinungvien');
Route::get('/danh-sach-ung-tuyen/{id}','NhatuyendungController@dsungtuyen');
Route::get('/dangtuyen-nhanvien','NhatuyendungController@dangtuyen');
Route::post('/dangtuyen-nhanvien','NhatuyendungController@dangtuyen');
Route::get('/dang-nhap','DangnhapController@dangnhapntd');
Route::get('/dang-ki-uv','DangnhapController@UIdangkiuv');
Route::post('/dang-ki-uv','DangnhapController@dangkiuv');
Route::get('/dang-ki-ntd','DangnhapController@UIdangkintd');
Route::post('/dang-ki-ntd','DangnhapController@dangkintd');
route::get('/quanly-tintuyendung','tintuyendungController@quanlytintd');
route::post('/comment', 'NhatuyendungController@updateComment');
//dang nhap
Route::post('/permission','DangnhapController@permission');
//dang xuat
Route::get('/dang-xuat','DangnhapController@dangxuat');
//tin-tuyen-dung
Route::post('/luu-tintuyendung','tintuyendungController@luutintd');
Route::get('/chitiet-tintuyendung/{id_tintuyendung}','tintuyendungController@chitiettintd');
Route::get('/capnhat-tintuyendung/{id_tintuyendung}', 'tintuyendungController@suatintd');
Route::get('/xoa-tintuyendung/{id_tintuyendung}', 'tintuyendungController@xoatintd');
//nguoi-tim-viec
Route::get('/nguoi-tim-viec','HomeController@nguoitimviec');
Route::get('/danh-sach-nop-don/{id}', 'DoanhNghiepController@danhsachcty');
Route::get('/xoa-don/{id_ungvien}/{id_tintuyendung}',[ 'uses'=>'DoanhNghiepController@xoaungtuyen','as'=>'xoa don']);
Route::get('/nopdon/{id_doanhnghiep}/{id_ungvien}/{id_tintuyendung}', [
    'uses' =>'DoanhNghiepController@nopdontintd',
    'as'   => 'nopdon']);
//nguoi-tuyen-dung
Route::get('/nguoi-tuyen-dung','HomeController@nguoituyendung');
//thong-tin-doanh-nghiep
// Route::post('/thongtin-doanhnghiep','DoanhnghiepController@thongtindoanhnghiep');
Route::post('/luu-doanhnghiep','doanhnghiepController@luudoanhnghiep');