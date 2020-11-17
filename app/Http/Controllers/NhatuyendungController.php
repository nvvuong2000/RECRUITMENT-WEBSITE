<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;    
use Illuminate\Support\Facades\redirect;
session_start();

class NhatuyendungController extends Controller
{
    public function index()
    {
    	return view('login_admin');
    }
    public function show_admin()
    {
    	return view('nhatuyendung.nhatuyendung_layout');
    }
    public function dashboard(Request $Request)
    {
    	$admin_email = $Request->admin_email;
    	$admin_password = md5($Request->admin_password);

    	$result = DB:: table('tbl:admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
    	return view('nhatuyendung.nhatuyendung_layout');
    }
   
     public function dsungtuyen()
    {
        return view('nhatuyendung.danhsachungtuyen');
    }
     public function dangtuyen()
    {
        $doanhnghiep = DB::table('tbl:doanhnghiep')->orderby('doanhnghiep_id','desc')->get();
        $bangcap = DB::table('tbl:bangcap')->orderby('bangcap_id','desc')->get();
        $chucvu = DB::table('tbl:chucvu')->orderby('chucvu_id','desc')->get();
        $kinhnghiem = DB::table('tbl:kinhnghiem')->orderby('kinhnghiem_id','desc')->get();
        $mucluong = DB::table('tbl:mucluong')->orderby('mucluong_id','desc')->get();
        $hinhthuclamviec = DB::table('tbl:hinhthuclamviec')->orderby('hinhThuc_id','desc')->get();
        $diachi = DB::table('tintuyendung')->orderby('id_tintuyendung','desc')->get();

        $loainganhnghe = DB::table('tbl:loainganhnghe')->orderby('nganhnghe_id','desc')->get();
        $tinhthanh = DB::table('tbl:tinhthanh')->orderby('tinhthanh_id','desc')->get();
        return view('nhatuyendung.dangtuyennhanvien')->with('doanhnghiep',$doanhnghiep)->with('bangcap',$bangcap)->with('chucvu',$chucvu)->with('kinhnghiem',$kinhnghiem)->with('mucluong',$mucluong)->with('hinhthuclamviec',$hinhthuclamviec)->with('loainganhnghe',$loainganhnghe)->with('tinhthanh',$tinhthanh)->with('diachi',$diachi);

    }

    
}

