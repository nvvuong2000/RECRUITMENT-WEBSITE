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

        $result = DB::table('tbl:admin')->where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();
        $this->$id = DB::table('tbl:admin')->where('admin_email', $admin_email)->where('admin_password', $admin_password)->get();
        return view('nhatuyendung.nhatuyendung_layout');
    }

    public function dsungtuyen(Request $Request)
    {
        $loainganhnghe = DB::table('tbl:loainganhnghe')->orderby('nganhnghe_id', 'desc')->get();
        $tinhthanh = DB::table('tbl:tinhthanh')->orderby('tinhthanh_id', 'desc')->get();
        if (!isset($_SESSION["id"])) {
            return Redirect::to('/');
        } else 
		
	if ($_SESSION['id_quyen'] == 0) {
            return Redirect::to('/');
        } else {
        $id = $Request->id;
        $loai = $Request->loai;
        $chitiet = DB::table('tbl:nophoso')
            ->join('tbl:user', 'tbl:user.user_id', '=', 'tbl:nophoso.ungvien_id')
            ->join('tintuyendung', 'tintuyendung.id_tintuyendung', '=', 'tbl:nophoso.tintd_id')
            ->where('tbl:nophoso.nhatuyendung_id', $id)
            ->where('tbl:nophoso.trangthai', $loai)->get();
        $user = DB::table('tbl:user')->where('tbl:user.user_id', $_SESSION["id"])->get();
        return view('nhatuyendung.danhsachungvien')->with('chitiet', $chitiet)->with('user',$user)->with('loai',$loai)->with('tinhthanh', $tinhthanh)->with('loainganhnghe', $loainganhnghe);;
        }
    }
    public function dangtuyen()
    {
        $loainganhnghe = DB::table('tbl:loainganhnghe')->get();
        $tinhthanh = DB::table('tbl:tinhthanh')->get();
        if (!isset($_SESSION["id"])) {
            return Redirect::to('/');
        }
		
	if ($_SESSION['id_quyen'] == 0) {
            return Redirect::to('/');
        } else {
        $doanhnghiep = DB::table('tbl:doanhnghiep')->orderby('doanhnghiep_id', 'desc')->get();
        $bangcap = DB::table('tbl:bangcap')->orderby('bangcap_id', 'desc')->get();
        $chucvu = DB::table('tbl:chucvu')->orderby('chucvu_id', 'desc')->get();
        $kinhnghiem = DB::table('tbl:kinhnghiem')->orderby('kinhnghiem_id', 'desc')->get();
        $mucluong = DB::table('tbl:mucluong')->orderby('mucluong_id', 'desc')->get();
        $hinhthuclamviec = DB::table('tbl:hinhthuclamviec')->orderby('hinhThuc_id', 'desc')->get();
        $diachi = DB::table('tintuyendung')->orderby('id_tintuyendung', 'desc')->get();
 
        $user = DB::table('tbl:user')->where('tbl:user.user_id', $_SESSION["id"])->get();
        return view('nhatuyendung.dangtuyennhanvien')->with('doanhnghiep', $doanhnghiep)->with('bangcap', $bangcap)->with('chucvu', $chucvu)->with('kinhnghiem', $kinhnghiem)->with('mucluong', $mucluong)->with('hinhthuclamviec', $hinhthuclamviec)->with('tinhthanh', $tinhthanh)->with('loainganhnghe', $loainganhnghe)->with('diachi', $diachi)->with('user',$user);
        }
    }
    public function updateComment(Request $Request)
    {
        if (!isset($_SESSION["id"])) {
            return Redirect::to('/');
        } else 
		
	if ($_SESSION['id_quyen'] == 0) {
            return Redirect::to('/');
        } else {
        $data = array();
        $data['ungvien_id'] = $Request->id;
        $data['tintd_id'] = $Request->tintd_id;
        $data['trangthai'] = $Request->luachon;
        $data['loinhan'] = $Request->loinhan;
        DB::table('tbl:nophoso')->where('tintd_id', $Request->tintd_id)->where('ungvien_id', $Request->id)->update($data);
        return Redirect::to('/danh-sach-ung-tuyen');
        }
    }
}
