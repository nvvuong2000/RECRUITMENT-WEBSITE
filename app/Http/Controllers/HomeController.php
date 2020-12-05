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
        session()->flush();
        $tinhthanh = DB::table('tbl:tinhthanh')->orderby('tinhthanh_id', 'desc')->get();
        $loainganhnghe = DB::table('tbl:loainganhnghe')->orderby('nganhnghe_id', 'desc')->get();
        $filter = DB::table('tintuyendung')


            ->select(DB::raw('id_loainganhnghe,nganhnghe_name,class,count(id_loainganhnghe) as count'))
            ->join('tbl:loainganhnghe', 'tbl:loainganhnghe.nganhnghe_id', '=', 'tintuyendung.id_loainganhnghe')
            ->groupBy('id_loainganhnghe', 'class', 'nganhnghe_name',)
            ->get();
        return view('home')->with('loainganhnghe', $loainganhnghe)->with('tinhthanh', $tinhthanh)->with('filter', $filter);
    }

    public function nguoitimviec()
    {

        $dsnghe = DB::table('tintuyendung')

            ->select(DB::raw('id_loainganhnghe,nganhnghe_name,class,count(id_loainganhnghe) as count'))
            ->join('tbl:loainganhnghe', 'tbl:loainganhnghe.nganhnghe_id', '=', 'tintuyendung.id_loainganhnghe')
            // ->where('status', '<>', 1)
            ->groupBy('id_loainganhnghe', 'class', 'nganhnghe_name',)
            ->get();


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
        $hienthi_tintd = DB::table('tintuyendung')
            ->join('tbl:doanhnghiep', 'tbl:doanhnghiep.doanhnghiep_id', '=', 'tintuyendung.id_doanhnghiep')
            ->join('tbl:user', 'tbl:user.user_id', '=', 'tbl:doanhnghiep.doanhnghiep_id')
            ->orderby('id_tintuyendung', 'desc')->get();
        return view('nguoitimviec')->with('doanhnghiep', $doanhnghiep)->with('bangcap', $bangcap)->with('chucvu', $chucvu)->with('kinhnghiem', $kinhnghiem)->with('mucluong', $mucluong)->with('hinhthuclamviec', $hinhthuclamviec)->with('loainganhnghe', $loainganhnghe)->with('tinhthanh', $tinhthanh)->with('tieude', $tieude)->with('thoihan', $thoihan)->with('diachi', $diachi)->with('hienthi_tintd', $hienthi_tintd)->with('dsnghe', $dsnghe);
    }
    public function nguoituyendung()
    {
        $loainganhnghe = DB::table('tbl:loainganhnghe')->orderby('nganhnghe_id', 'desc')->get();
        $tinhthanh = DB::table('tbl:tinhthanh')->orderby('tinhthanh_id', 'desc')->get();
        return view('nguoituyendung')->with('tinhthanh', $tinhthanh)->with('loainganhnghe', $loainganhnghe);;
    }
    public function search(Request $request)

    {
        $keyword = $request->keyword;
        $doanhnghiep = DB::table('tbl:doanhnghiep')->orderby('doanhnghiep_id', 'desc')->get();

        $hinhthuclamviec = DB::table('tbl:hinhthuclamviec')->orderby('hinhThuc_id', 'desc')->get();
        $loainganhnghe = DB::table('tbl:loainganhnghe')->orderby('nganhnghe_id', 'desc')->get();
        $tinhthanh = DB::table('tbl:tinhthanh')->orderby('tinhthanh_id', 'desc')->get();
        $chitiet_tintd = DB::table('tintuyendung')
            ->join('tbl:loainganhnghe', 'tbl:loainganhnghe.nganhnghe_id', '=', 'tintuyendung.id_loainganhnghe')
            ->join('tbl:doanhnghiep', 'tbl:doanhnghiep.doanhnghiep_id', '=', 'tintuyendung.id_doanhnghiep')
            ->join('tbl:user', 'tbl:user.user_id', '=', 'tbl:doanhnghiep.doanhnghiep_id')
            ->join('tbl:hinhthuclamviec', 'tbl:hinhthuclamviec.hinhThuc_id', '=', 'tintuyendung.id_hinhthuclamviec')
            ->join(
                'tbl:chucvu',
                'tbl:chucvu.chucvu_id',
                '=',
                'tintuyendung.id_chucvu'
            )
            ->join('tbl:tinhthanh', 'tbl:tinhthanh.tinhthanh_id', '=', 'tintuyendung.id_tinhthanh')
            ->join(
                'tbl:bangcap',
                'tbl:bangcap.bangcap_id',
                '=',
                'tintuyendung.id_bangcap'
            );

            if($keyword !=''){
                 $chitiet_tintd = $chitiet_tintd
            ->where('tieude', 'like', '%' . $keyword . '%')->get();
            }
        elseif ($request->tinh != 0 && $request->nganh != 0 && $keyword != '') {
            $chitiet_tintd = $chitiet_tintd
                ->where('id_tinhthanh', '=',  $request->tinh)
                ->where('tintuyendung.id_loainganhnghe', '=', $request->nganh)->get();
          
        } elseif ($request->nganh == 0) {
            $chitiet_tintd = $chitiet_tintd
                ->where('id_tinhthanh', '=',  $request->tinh)->get();
               
        } elseif ($request->tinh == 0) {
            $chitiet_tintd = $chitiet_tintd
                ->where('tintuyendung.id_loainganhnghe', '=', $request->nganh)->get();
               
        
        }
        $total = count(get_object_vars($chitiet_tintd));



        return view('timkiem')->with('chitiet_tintd', $chitiet_tintd)->with('tinhthanh', $tinhthanh)->with('loainganhnghe', $loainganhnghe)->with('total',$total);
    }
    public function filter($id)
    {
        $doanhnghiep = DB::table('tbl:doanhnghiep')->orderby('doanhnghiep_id', 'desc')->get();
        $bangcap = DB::table('tbl:bangcap')->orderby('bangcap_id', 'desc')->get();
        $chucvu = DB::table('tbl:chucvu')->orderby('chucvu_id', 'desc')->get();
        $kinhnghiem = DB::table('tbl:kinhnghiem')->orderby('kinhnghiem_id', 'desc')->get();
        $mucluong = DB::table('tbl:mucluong')->orderby('mucluong_id', 'desc')->get();
        $hinhthuclamviec = DB::table('tbl:hinhthuclamviec')->orderby('hinhThuc_id', 'desc')->get();
        $loainganhnghe = DB::table('tbl:loainganhnghe')->orderby('nganhnghe_id', 'desc')->get();
        $tinhthanh = DB::table('tbl:tinhthanh')->orderby('tinhthanh_id', 'desc')->get();
        $chitiet_tintd = DB::table('tintuyendung')
            ->join('tbl:loainganhnghe', 'tbl:loainganhnghe.nganhnghe_id', '=', 'tintuyendung.id_loainganhnghe')
            ->join('tbl:doanhnghiep', 'tbl:doanhnghiep.doanhnghiep_id', '=', 'tintuyendung.id_doanhnghiep')
            ->join('tbl:user', 'tbl:user.user_id', '=', 'tbl:doanhnghiep.doanhnghiep_id')
            ->join('tbl:mucluong', 'tbl:mucluong.mucluong_id', '=', 'tintuyendung.id_mucluong')
            ->join('tbl:hinhthuclamviec', 'tbl:hinhthuclamviec.hinhThuc_id', '=', 'tintuyendung.id_hinhthuclamviec')
            ->join('tbl:kinhnghiem', 'tbl:kinhnghiem.kinhnghiem_id', '=', 'tintuyendung.id_kinhnghiem')
            ->join(
                'tbl:chucvu',
                'tbl:chucvu.chucvu_id',
                '=',
                'tintuyendung.id_chucvu'
            )
            ->join('tbl:tinhthanh', 'tbl:tinhthanh.tinhthanh_id', '=', 'tintuyendung.id_tinhthanh')
            ->join(
                'tbl:bangcap',
                'tbl:bangcap.bangcap_id',
                '=',
                'tintuyendung.id_bangcap'
            )
            ->where('tintuyendung.id_loainganhnghe', $id)->get();
        return view('timkiem')->with('chitiet_tintd', $chitiet_tintd)->with('tinhthanh', $tinhthanh)->with('loainganhnghe', $loainganhnghe);
    }
    public function changePassword(Request $request)
    {
        if (!isset($_SESSION["id"])) {
            return Redirect::to('/');
        } else {

            $id = $request->id_user;
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
                return Redirect::to('/dang-xuat');
           
            } else {

            }
        }
    }

    public function index()
    {
        $loainganhnghe = DB::table('tbl:loainganhnghe')->orderby('nganhnghe_id', 'desc')->get();
        $tinhthanh = DB::table('tbl:tinhthanh')->orderby('tinhthanh_id', 'desc')->get();
        $mk  = DB::table('tbl:user')->where('user_id', $_SESSION['id'])->get();
        return view('thaydoimatkhau')->with('mk', $mk)->with('tinhthanh', $tinhthanh)->with('loainganhnghe', $loainganhnghe);;
    }
}
