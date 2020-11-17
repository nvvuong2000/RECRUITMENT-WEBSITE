<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;    
use Illuminate\Support\Facades\redirect;
session_start();

class DoanhNghiepController extends Controller
{
   public function thongtindoanhnghiep()
   {
	$doanhnghiep = DB::table('tbl:doanhnghiep')->orderby('doanhnghiep_id','desc')->get();
	$tinhthanh = DB::table('tbl:tinhthanh')->orderby('tinhthanh_id','desc')->get();
	$loainganhnghe = DB::table('tbl:loainganhnghe')->orderby('nganhnghe_id','desc')->get();
	return view('nhatuyendung.thongtinnhatuyendung')->with('doanhnghiep',$doanhnghiep)
	->with('tinhthanh',$tinhthanh)->with('tinhthanh',$tinhthanh)->with('loainganhnghe',$loainganhnghe);

   }
   public function luudoanhnghiep(Request $Request)
	{
		$data= array();
		$data['tendoanhnghiep']=$Request->ten;
		$data['doanhnghiep_email']=$Request->email;
		$data['doanhnghiep_sdt']=$Request->sdt;
		$data['doanhnghiep_website']=$Request->web;
		$data['id_loainganhnghe']=$Request->loai;
		$data['doanhnghiep_mota']=$Request->mota;
		$data['doanhnghiep_TinhThanhPho']=$Request->tinhthanh;
		$data['diachi']=$Request->diachi;
		
		DB::table('tbl:doanhnghiep')->insert($data);
		 Session::put('message','Lưu thông tin doanh nghiệp thành công');
         return Redirect::to('/thongtin-doanhnghiep');
	}
}
