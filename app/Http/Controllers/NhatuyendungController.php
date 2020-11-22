<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;    
use Illuminate\Support\Facades\redirect;
use Illuminate\Support\Facades\Auth;
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
        $this->$id = DB:: table('tbl:admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->get();
        
        // echo $id;
     


    	return view('nhatuyendung.nhatuyendung_layout');
    }
   
     public function dsungtuyen($id_doanhnghiep)
    {
        $chitiet = DB::table('tbl:nophoso')
        ->join('tbl:user', 'tbl:user.user_id', '=', 'tbl:nophoso.ungvien_id')
        ->join('tintuyendung', 'tintuyendung.id_tintuyendung', '=', 'tbl:nophoso.tintd_id')
        ->where('tbl:nophoso.nhatuyendung_id', $id_doanhnghiep)->get();
        // print_r($chitiet);
        return view('nhatuyendung.danhsachungvien')->with('chitiet',$chitiet);
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
     public function updateComment(Request $Request)
    {
       echo $Request->loinhan, $Request->id,$Request->luachon, $Request->tintd_id;
        // $id = $Request->id_doanhnghiep;
        $data = array();
        $data['ungvien_id'] = $Request->id;
        $data['tintd_id'] = $Request->tintd_id;
        // $data['nhatuyendung_id'] = $Request->sdt;
        $data['trangthai'] = $Request->luachon;
        $data['loinhan'] = $Request->loinhan;
        DB::table('tbl:nophoso')->where('tintd_id', $Request->tintd_id)->where('ungvien_id', $Request->id)->update($data);
        // Session::put('message', 'Cap nhat tuyen dụng thành công');
        // alert('cap nhat thanh cong');
        return Redirect::to('/');

    }

    
}

