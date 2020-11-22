<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\redirect;
session_start();
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function trangchu()
    {
        $loainganhnghe = DB::table('tbl:loainganhnghe')->orderby('nganhnghe_id', 'desc')->get();
        return view('home')->with('loainganhnghe', $loainganhnghe);
    }
    public function nguoitimviec()
    {
        $tieude = DB::table('tintuyendung')->orderby('id_tintuyendung', 'desc')->get();
       
        $thoihan = DB::table('tintuyendung')->orderby('id_tintuyendung', 'desc')->get();
        $doanhnghiep = DB::table('tbl:doanhnghiep')->orderby('doanhnghiep_id', 'desc')->get();
        $bangcap = DB::table('tbl:bangcap')->orderby('bangcap_id', 'desc')->get();
        $chucvu = DB::table('tbl:chucvu')->orderby('chucvu_id', 'desc')->get();
        $kinhnghiem = DB::table('tbl:kinhnghiem')->orderby('kinhnghiem_id', 'desc')->get();
        $mucluong = DB::table('tbl:mucluong')->orderby('mucluong_id', 'desc')->get();
        $hinhthuclamviec = DB::table('tbl:hinhthuclamviec')->orderby('hinhThuc_id', 'desc')->get();
        $diachi = DB::table('tintuyendung')->orderby('id_tintuyendung', 'desc')->get();
        $loainganhnghe = DB::table('tbl:loainganhnghe')->orderby('nganhnghe_id', 'desc')->get();
        $tinhthanh = DB::table('tbl:tinhthanh')->orderby('tinhthanh_id', 'desc')->get();
        $hienthi_tintd = DB::table('tintuyendung')->orderby('id_tintuyendung', 'desc')->get();
        return view('nguoitimviec')->with('doanhnghiep', $doanhnghiep)->with('bangcap', $bangcap)->with('chucvu', $chucvu)->with('kinhnghiem', $kinhnghiem)->with('mucluong', $mucluong)->with('hinhthuclamviec', $hinhthuclamviec)->with('loainganhnghe', $loainganhnghe)->with('tinhthanh', $tinhthanh)->with('tieude', $tieude)->with('thoihan', $thoihan)->with('diachi', $diachi)->with('hienthi_tintd', $hienthi_tintd);
    }
    public function nguoituyendung()
    {
        return view('nguoituyendung');
    }
    public function search(Request $request)
    {
        $keyword = $request->keyword;
        // echo $keyword;
        $tieude = DB::table('tintuyendung')->where('tieude', 'like', '%' . $keyword . '%')->get();
        // session::put('user_hoten',$result->user_hoten);
        return view('timkiem')->with('tieude', $tieude);
    }
    public function filter($id)
    {
        echo $id;
        $tieude = DB::table('tintuyendung')->where('id_loainganhnghe', $id)->get();
        return view('timkiem')->with('tieude', $tieude);
    }
    public function changePassword(Request $request)
    {
        $id = $request->id_user;
        echo $id;
        $old =  $request->oldPassword;
        $new =  $request->newPassword;
        $confirm =  $request->confirmPassword;
        if ($new !== $confirm) {
            Session::put('message', 'Xac nhan mat khau trung hop');
        }
        $mk  = DB::table('tbl:user')->select('user_matkhau')->where('user_id', $id)->get('user_matkhau');
        $mk = $mk[0]->user_matkhau;
        if (password_verify($old, $mk)) {
            DB::table('tbl:user')
                ->where('user_id', $id)
                ->update(['user_matkhau' => password_hash($confirm, PASSWORD_DEFAULT)]);
            Session::put('message', 'Doi mat khau thanh cong');
        } else {
            Session::put('message', 'co loi');
        }
    }

    public function index()
    {
        return view('thaydoimatkhau');
    }



}
