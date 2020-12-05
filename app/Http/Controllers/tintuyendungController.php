<?php

namespace App\Http\Controllers;

use App\Http\Controllers\DoanhNghiepController;

use Illuminate\Http\Request;
use DB;
use Session;

use Illuminate\Support\Facades\redirect;

session_start();

class tintuyendungController extends Controller
{
    public function luutintd(Request $Request)
    {
        session()->flush();
        if (!isset($_SESSION["id"])) {
            return Redirect::to('/');
        } else 
		
	if ($_SESSION['id_quyen'] == 0) {
            return Redirect::to('/');
        } else {
            $data['TieuDe'] = $Request->tieude;
            $data['hannophoso'] = $Request->thoihan;
            $data['mota'] = $Request->mota;
            $data['email'] = $Request->email;
            $data['id_loainganhnghe'] = $Request->loai;
            $data['id_hinhthuclamviec'] = $Request->hinhthuc;
            $data['id_chucvu'] = $Request->chucvu;
            $data['gioitinh'] = $Request->gioitinh;
            $data['id_mucluong'] = $Request->mucluong;
            $data['id_kinhnghiem'] = $Request->kinhnghiem;
            $data['id_bangcap'] = $Request->bangcap;
            $data['soluong'] = $Request->soluong;
            $data['id_tinhthanh'] = $Request->tinhthanh;
            $data['diachi'] = $Request->diachi;
            $data['id_doanhnghiep'] = $_SESSION["id"];
            $check = new DoanhNghiepController();

            if (!$check->checkNull($Request->tieude) || !$check->checkNull($Request->mota) || !$check->checkNull($Request->diachi) || !$check->checkNull($Request->email) || !$check->checkNull($Request->soluong)) {
                Session::put('message', 'Thông tin không được trống');
                return Redirect::to('/capnhat-tintuyendung/' . $Request->id_tintuyendung)->with('message', Session::get('message'));
            }

            if (!$check->checkEmail($Request->email)) {
                Session::put('message', 'Email không hợp lệ');
                return Redirect::to('/capnhat-tintuyendung/' . $Request->id_tintuyendung)->with('message', Session::get('message'));
            }
            if (!$check->isNumber($Request->soluong) || $Request->soluong<0) {
                Session::put('message', 'Số lượng không hợp lệ');
                return Redirect::to('/capnhat-tintuyendung/' . $Request->id_tintuyendung)->with('message', Session::get('message'));
            }

            if (!$check->checkAddress($Request->diachi)) {
                Session::put('message', 'Địa chỉ  không hợp lệ');
                return Redirect::to('/capnhat-tintuyendung/' . $Request->id_tintuyendung)->with('message', Session::get('message'));
            }

            if ($Request->id_tintuyendung) {
                $id =  $Request->id_tintuyendung;
                
                DB::table('tintuyendung')->where('id_tintuyendung', $id)->update($data);
                Session::put('message', 'Cap nhat tuyen dụng thành công');
                return Redirect::to('/quanly-tintuyendung')->with('success', 'Cập nhập tin tuyển dụng thành công!');;
            } else {

                $data = array();
                // echo 'them ne';
                $id =  $_SESSION["id"];
                // $data['TieuDe'] = $Request->tieude;
                // $data['hannophoso'] = $Request->thoihan;

                // $data['mota'] = $Request->mota;
                // $data['email'] = $Request->email;
                // $data['id_loainganhnghe'] = $Request->loai;
                // $data['id_hinhthuclamviec'] = $Request->hinhthuc;
                // $data['id_chucvu'] = $Request->chucvu;
                // $data['gioitinh'] = $Request->gioitinh;
                // $data['id_mucluong'] = $Request->mucluong;
                // $data['id_kinhnghiem'] = $Request->kinhnghiem;
                // $data['id_bangcap'] = $Request->bangcap;
                // $data['soluong'] = $Request->soluong;
                // $data['id_tinhthanh'] = $Request->tinhthanh;
                // $data['diachi'] = $Request->diachi;
                // $data['id_doanhnghiep'] = $id;
                DB::table('tintuyendung')->insert($data);


                Session::put('message', 'Đăng tin tuyển dụng thành công');
                return Redirect::to('/quanly-tintuyendung')->with('success', 'Thêm tin tuyển dụng thành công!');;
            }
        }
    }
    public function quanlytintd()
    {
        $loainganhnghe = DB::table('tbl:loainganhnghe')->orderby('nganhnghe_id', 'desc')->get();
        $tinhthanh = DB::table('tbl:tinhthanh')->orderby('tinhthanh_id', 'desc')->get();
        if (!isset($_SESSION["id"])) {
            return Redirect::to('/');
        } else 
		
	if ($_SESSION['id_quyen'] == 0) {
            return Redirect::to('/');
        } else {
            $id =  $_SESSION["id"];
    

            $luu_tintd = DB::table('tintuyendung')
      
                ->select(DB::raw('id_tintuyendung,mota, soluong, gioitinh, hannophoso, tieude, email, diachi,id_doanhnghiep, email ,count(tintd_id) as soluongapply '))
                -> leftjoin('tbl:nophoso', 'tbl:nophoso.tintd_id','=', 'tintuyendung.id_tintuyendung')
                ->where('id_doanhnghiep', $id)
                ->groupBy('id_tintuyendung', 'id_doanhnghiep', 'mota', 'soluong', 'gioitinh', 'hannophoso', 'tieude', 'email', 'diachi', 'email')->get();


            $user = DB::table('tbl:user')->where('tbl:user.user_id', $_SESSION["id"])->get();
        
     
            return view('nhatuyendung.quanlytintuyendung')->with('luu_tintd', $luu_tintd)->with('user', $user)->with('loainganhnghe', $loainganhnghe)->with('tinhthanh', $tinhthanh);
        }
    }
    public function chitiettintd($id_tintuyendung)
    {

        
        $id_tintuyendung = $id_tintuyendung;
        $id_doanhnghiep = DB::table('tintuyendung')->select('id_doanhnghiep')->where('id_tintuyendung', $id_tintuyendung)->get();
        $id_doanhnghiep =  $id_doanhnghiep[0]->id_doanhnghiep;
        $dn = DB::table('tbl:doanhnghiep')->select('tendoanhnghiep', 'doanhnghiep_id')->where('doanhnghiep_id', $id_doanhnghiep)->get();
        $tendoanhnghiep = $dn[0]->tendoanhnghiep;
        $hienthi_tintd = DB::table('tintuyendung')
            ->join('tbl:loainganhnghe', 'tbl:loainganhnghe.nganhnghe_id', '=', 'tintuyendung.id_loainganhnghe')
            ->join('tbl:doanhnghiep', 'tbl:doanhnghiep.doanhnghiep_id', '=', 'tintuyendung.id_doanhnghiep')
            ->join('tbl:user', 'tbl:user.user_id', '=', 'tbl:doanhnghiep.doanhnghiep_id')
            ->join('tbl:hinhthuclamviec', 'tbl:hinhthuclamviec.hinhThuc_id', '=', 'tintuyendung.id_hinhthuclamviec')
            ->inRandomOrder()
            ->limit(5)
            ->get();



        $tieude = DB::table('tintuyendung')->orderby('id_tintuyendung', 'desc')->get();
        $thoihan = DB::table('tintuyendung')->orderby('id_tintuyendung', 'desc')->get();
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
            ->join('tbl:chucvu', 'tbl:chucvu.chucvu_id', '=', 'tintuyendung.id_chucvu')
            ->join('tbl:tinhthanh', 'tbl:tinhthanh.tinhthanh_id', '=', 'tintuyendung.id_tinhthanh')
            ->join('tbl:bangcap', 'tbl:bangcap.bangcap_id', '=', 'tintuyendung.id_bangcap')
            ->where('tintuyendung.id_tintuyendung', $id_tintuyendung)->get();
     
        return view('nhatuyendung.chitiettintuyendung')->with('doanhnghiep', $doanhnghiep)->with('bangcap', $bangcap)->with('chucvu', $chucvu)->with('kinhnghiem', $kinhnghiem)->with('mucluong', $mucluong)->with('hinhthuclamviec', $hinhthuclamviec)->with('loainganhnghe', $loainganhnghe)->with('tinhthanh', $tinhthanh)->with('tieude', $tieude)->with('thoihan', $thoihan)->with('chitiet_tintd', $chitiet_tintd)->with('id_doanhnghiep', $id_doanhnghiep)->with('tendoanhnghiep', $tendoanhnghiep)->with('id_tintuyendung', $id_tintuyendung)->with('hienthi_tintd', $hienthi_tintd);
    }

    public function suatintd($id_tintuyendung)
    {
       
        if (!isset($_SESSION["id"])) {
            return Redirect::to('/');
        }

        if ($_SESSION['id_quyen'] == 0) {
            return Redirect::to('/');
        } else {
            $id = $id_tintuyendung;
            $tieude = DB::table('tintuyendung')->orderby('id_tintuyendung', 'desc')->get();
            $thoihan = DB::table('tintuyendung')->orderby('id_tintuyendung', 'desc')->get();
            $doanhnghiep = DB::table('tbl:doanhnghiep')->orderby('doanhnghiep_id', 'desc')->get();
            $bangcap = DB::table('tbl:bangcap')->orderby('bangcap_id', 'desc')->get();
            $chucvu = DB::table('tbl:chucvu')->orderby('chucvu_id', 'desc')->get();
            $kinhnghiem = DB::table('tbl:kinhnghiem')->orderby('kinhnghiem_id', 'desc')->get();
            $mucluong = DB::table('tbl:mucluong')->orderby('mucluong_id', 'desc')->get();
            $hinhthuclamviec = DB::table('tbl:hinhthuclamviec')->orderby('hinhThuc_id', 'desc')->get();
            $loainganhnghe = DB::table('tbl:loainganhnghe')->orderby('nganhnghe_id', 'desc')->get();
            $tinhthanh = DB::table('tbl:tinhthanh')->orderby('tinhthanh_id', 'desc')->get();
            $chitiet_tintd = DB::table('tintuyendung')->select('tintuyendung.id_loainganhnghe','mota', 'soluong', 'tintuyendung.id_mucluong', 'tintuyendung.id_hinhthuclamviec', 'tintuyendung.id_kinhnghiem', 'tintuyendung.id_chucvu', 'tintuyendung.id_tinhthanh', 'tintuyendung.id_bangcap', 'id_tintuyendung', 'mota', 'soluong', 'gioitinh', 'hannophoso', 'tieude', 'email', 'tbl:doanhnghiep.diachi', 'email as user_email', 'tintuyendung.id_mucluong', 'link')
                ->join('tbl:mucluong', 'tbl:mucluong.mucluong_id', '=', 'tintuyendung.id_mucluong')
                ->join('tbl:doanhnghiep', 'tbl:doanhnghiep.doanhnghiep_id', '=', 'tintuyendung.id_doanhnghiep')
                ->join('tbl:hinhthuclamviec', 'tbl:hinhthuclamviec.hinhThuc_id', '=', 'tintuyendung.id_hinhthuclamviec')
                ->join('tbl:kinhnghiem', 'tbl:kinhnghiem.kinhnghiem_id', '=', 'tintuyendung.id_kinhnghiem')
                ->join('tbl:chucvu', 'tbl:chucvu.chucvu_id', '=', 'tintuyendung.id_chucvu')
                ->join('tbl:tinhthanh', 'tbl:tinhthanh.tinhthanh_id', '=', 'tintuyendung.id_tinhthanh')
                ->join('tbl:bangcap', 'tbl:bangcap.bangcap_id', '=', 'tintuyendung.id_bangcap')
                ->join('tbl:user', 'tbl:user.user_id', '=', 'tbl:doanhnghiep.doanhnghiep_id')
                ->where('tintuyendung.id_tintuyendung', $id_tintuyendung)->get();
            return view('nhatuyendung.capnhat')->with('id', $id)->with('doanhnghiep', $doanhnghiep)->with('bangcap', $bangcap)->with('chucvu', $chucvu)->with('kinhnghiem', $kinhnghiem)->with('mucluong', $mucluong)->with('hinhthuclamviec', $hinhthuclamviec)->with('loainganhnghe', $loainganhnghe)->with('tinhthanh', $tinhthanh)->with('tieude', $tieude)->with('thoihan', $thoihan)->with('chitiet_tintd', $chitiet_tintd);
        }

    }
    public function xoatintd($id_tintuyendung)
    {
        session()->flush();
        if (!isset($_SESSION["id"])) {
            return Redirect::to('/');
        } else 
		
	if ($_SESSION['id_quyen'] == 0) {
            return Redirect::to('/');
        } else {
            
            $chitiet_tintd = DB::table('tintuyendung')->where('id_tintuyendung', $id_tintuyendung)->delete();
            Session::put('success', 'Xóa tin tuyển dụng thanfnh công!');
            return Redirect::to('/quanly-tintuyendung');
        }
    }
}
