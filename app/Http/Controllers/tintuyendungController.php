<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

use Illuminate\Support\Facades\redirect;
session_start();

class tintuyendungController extends Controller
{
	public function luutintd(Request $Request)
	{
		$data= array();
		$data['TieuDe']=$Request->TieuDe;
		$data['hannophoso']=$Request->thoihan;
		$data['mota']=$Request->mota;
		$data['email']=$Request->email;
		$data['id_loainganhnghe']=$Request->loai;
		$data['id_hinhthuclamviec']=$Request->hinhthuc;
		$data['id_chucvu']=$Request->chucvu;
		$data['gioitinh']=$Request->gioitinh;
		$data['id_mucluong']=$Request->mucluong;
		$data['id_kinhnghiem']=$Request->kinhnghiem;
		$data['id_bangcap']=$Request->bangcap;
		$data['soluong']=$Request->soluong;
		$data['id_tinhthanh']=$Request->tinhthanh;
		$data['diachi']=$Request->diachi;
		DB::table('tintuyendung')->insert($data);
		 Session::put('message','Đăng tin tuyển dụng thành công');
         return Redirect::to('/dangtuyen-nhanvien');
	}
	public function quanlytintd()
	{
		$tieude=DB::table('tintuyendung')->orderby('id_tintuyendung','desc')->get();
        $thoihan=DB::table('tintuyendung')->orderby('id_tintuyendung','desc')->get();
        $doanhnghiep = DB::table('tbl:doanhnghiep')->orderby('doanhnghiep_id','desc')->get();
        $bangcap = DB::table('tbl:bangcap')->orderby('bangcap_id','desc')->get();
        $chucvu = DB::table('tbl:chucvu')->orderby('chucvu_id','desc')->get();
        $kinhnghiem = DB::table('tbl:kinhnghiem')->orderby('kinhnghiem_id','desc')->get();
        $mucluong = DB::table('tbl:mucluong')->orderby('mucluong_id','desc')->get();
        $hinhthuclamviec = DB::table('tbl:hinhthuclamviec')->orderby('hinhThuc_id','desc')->get();
        $loainganhnghe = DB::table('tbl:loainganhnghe')->orderby('nganhnghe_id','desc')->get();
        $tinhthanh = DB::table('tbl:tinhthanh')->orderby('tinhthanh_id','desc')->get();
        $luu_tintd= DB::table('tintuyendung')->orderby('id_tintuyendung','desc')->get();
        return view('nhatuyendung.quanlytintuyendung')->with('doanhnghiep',$doanhnghiep)->with('bangcap',$bangcap)->with('chucvu',$chucvu)->with('kinhnghiem',$kinhnghiem)->with('mucluong',$mucluong)->with('hinhthuclamviec',$hinhthuclamviec)->with('loainganhnghe',$loainganhnghe)->with('tinhthanh',$tinhthanh)->with('tieude',$tieude)->with('thoihan',$thoihan)->with('luu_tintd',$luu_tintd);
	}
	public function chitiettintd($id_tintuyendung)
	{
		
		$tieude=DB::table('tintuyendung')->orderby('id_tintuyendung','desc')->get();
        $thoihan=DB::table('tintuyendung')->orderby('id_tintuyendung','desc')->get();
        $doanhnghiep = DB::table('tbl:doanhnghiep')->orderby('doanhnghiep_id','desc')->get();
        $bangcap = DB::table('tbl:bangcap')->orderby('bangcap_id','desc')->get();
        $chucvu = DB::table('tbl:chucvu')->orderby('chucvu_id','desc')->get();
        $kinhnghiem = DB::table('tbl:kinhnghiem')->orderby('kinhnghiem_id','desc')->get();
        $mucluong = DB::table('tbl:mucluong')->orderby('mucluong_id','desc')->get();
        $hinhthuclamviec = DB::table('tbl:hinhthuclamviec')->orderby('hinhThuc_id','desc')->get();
        $loainganhnghe = DB::table('tbl:loainganhnghe')->orderby('nganhnghe_id','desc')->get();
        $tinhthanh = DB::table('tbl:tinhthanh')->orderby('tinhthanh_id','desc')->get();
        $chitiet_tintd= DB::table('tintuyendung')
        ->join('tbl:loainganhnghe','tbl:loainganhnghe.nganhnghe_id','=','tintuyendung.id_loainganhnghe')
        ->join('tbl:mucluong','tbl:mucluong.mucluong_id','=','tintuyendung.id_mucluong')
        ->join('tbl:hinhthuclamviec','tbl:hinhthuclamviec.hinhThuc_id','=','tintuyendung.id_hinhthuclamviec')
        ->join('tbl:kinhnghiem','tbl:kinhnghiem.kinhnghiem_id','=','tintuyendung.id_kinhnghiem')
        ->join('tbl:chucvu','tbl:chucvu.chucvu_id','=','tintuyendung.id_chucvu')
        ->join('tbl:tinhthanh','tbl:tinhthanh.tinhthanh_id','=','tintuyendung.id_tinhthanh')
        ->join('tbl:bangcap','tbl:bangcap.bangcap_id','=','tintuyendung.id_bangcap')
        ->where('tintuyendung.id_tintuyendung',$id_tintuyendung)->get()
        ;
        return view('nhatuyendung.chitiettintuyendung')->with('doanhnghiep',$doanhnghiep)->with('bangcap',$bangcap)->with('chucvu',$chucvu)->with('kinhnghiem',$kinhnghiem)->with('mucluong',$mucluong)->with('hinhthuclamviec',$hinhthuclamviec)->with('loainganhnghe',$loainganhnghe)->with('tinhthanh',$tinhthanh)->with('tieude',$tieude)->with('thoihan',$thoihan)->with('chitiet_tintd',$chitiet_tintd);
	}

}

