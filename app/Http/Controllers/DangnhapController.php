<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Controllers\DoanhNghiepController;
use Illuminate\Support\Facades\redirect;
use SweetAlert;
use DateTime;


if (!isset($_SESSION)) {
    session_start();
}

class DangnhapController extends Controller
{

    public function dangnhapntd()
    {
        return view('nhatuyendung.dangnhap');
    }
    public function dangxuat()
    {
        session_destroy();
        return Redirect::to('/');
    }
    public function UIdangkiuv()
    {
        $bangcap = DB::table('tbl:bangcap')->orderby('bangcap_id', 'desc')->get();
        $kinhnghiem = DB::table('tbl:kinhnghiem')->orderby('kinhnghiem_id', 'desc')->get();
        $hinhthuclamviec = DB::table('tbl:hinhthuclamviec')->orderby('hinhThuc_id', 'desc')->get();
        $loainganhnghe = DB::table('tbl:loainganhnghe')->orderby('nganhnghe_id', 'desc')->get();
        $tinhthanh = DB::table('tbl:tinhthanh')->orderby('tinhthanh_id', 'desc')->get();

        return view('nhatuyendung.dangki_ungvien')->with('kinhnghiem', $kinhnghiem)->with('hinhthuclamviec', $hinhthuclamviec)->with('loainganhnghe', $loainganhnghe)->with('tinhthanh', $tinhthanh)->with('bangcap', $bangcap);
    }
    public function dangkiuv(Request $Request)
    {
        $user = array();
        $user['user_hoten'] = $Request->user_hoten;
        $user['user_taikhoan'] = $Request->user_taikhoan;
        $user['user_ngaysinh'] = $Request->user_ngaysinh;
        $user['user_email'] = $Request->user_email;
        $user['user_sdt'] = $Request->user_sdt;
        $uv['hinhthuc_id'] = $Request->hinhthuc_id;
        $user['id_gioitinh'] = $Request->gender;
        $mk = $Request->user_mk;
        $re_mk = $Request->user_re_mk;
        $uv['id_kinhnghiem'] = $Request->id_kinhnghiem;
        $uv['id_bangcap'] = $Request->id_bangcap;
        $user['user_diachi'] = $Request->user_diachi;
        $uv['thanhpho_id'] = $Request->thanhpho_id;
        $uv['nganhnghe_id'] = $Request->nganhnghe_id;
        $result = DB::table('tbl:user')->where('user_taikhoan', '=', $user['user_taikhoan'])->get();
        $result1 = DB::table('tbl:user')->where('user_sdt', '=', $user['user_sdt'])->get();
        $result2 = DB::table('tbl:user')->where('user_email', '=', $user['user_email'])->get();
        $today = date("d-m-Y");
        $check = new DoanhNghiepController();
        $time = strtotime(str_replace(
            ' ',
            '',
            $Request->user_ngaysinh
        ));
        echo strtotime($time);
        $newformat = date('d-m-Y', $time);
        $today_dt = new DateTime($today);
        $expire_dt = new DateTime($newformat);
        if (!$check->checkNull($user['user_hoten']) || !$check->checkNull($user['user_taikhoan']) || !$check->checkNull($user['user_email']) || !$check->checkNull($user['user_diachi']) || !$check->checkNull($Request->user_re_mk) || !$check->checkNull($Request->user_mk) || !$check->checkNull($Request->user_diachi)) {
            Session::put('message', 'Thông tin không được trống');
            return Redirect::to('/dang-ki-uv')->with('message', Session::get('message'));
        }
        if ($today_dt < $expire_dt) {
            Session::put('message', 'Ngày tháng năm sinh không hợp lệ');
            return Redirect::to('/dang-ki-uv')->with('message', Session::get('message'));
        }
        if (!$check->checkFullName($Request->user_hoten)) {
            Session::put('message', 'Họ tên tài khoản không hợp lệ');
            return Redirect::to('/dang-ki-uv')->with('message', Session::get('message'));
        }
        if ($check->checkTel($Request->user_sdt) == false) {
            Session::put('message', 'Số điện thoại không hợp lệ');
            return Redirect::to('/dang-ki-uv')->with('message', Session::get('message'));
        }

        if ($check->checkAddress($Request->user_diachi) == false || !$check->checkAddress($Request->diachi) == false) {
            Session::put('message', 'Địa chỉ  không hợp lệ');
            return Redirect::to('/dang-ki-uv')->with('message', Session::get('message'));
        }
        $result = DB::table('tbl:user')->where('user_taikhoan', '=', $user['user_taikhoan'])->get();
        $result1 = DB::table('tbl:user')->where('user_sdt', '=', $user['user_sdt'])->get();
        $result2 = DB::table('tbl:user')->where('user_email', '=', $user['user_email'])->get();

        if (count($result) != 0) {
            // echo count($result);
            Session::put('message', 'Username đã tồn tại');
            return Redirect::to('/dang-ki-uv')->with('message', Session::get('message'));
        } 
        // else if (count($result1) != 0) {
        //     Session::put('message', 'Số điện thoại  đã tồn tại');
        //     return Redirect::to('/dang-ki-uv')->with('message', Session::get('message'));
        // } 
        else if (count($result2) != 0) {
            Session::put('message', 'Email đã tồn tại');
            return Redirect::to('/dang-ki-uv')->with('message', Session::get('message'));
        } else if ($mk !== $re_mk) {
            Session::put('message', 'Xác nhận mật khẩu không khớp');
            return Redirect::to('/dang-ki-uv')->with('message', Session::get('message'));
        } else {
            $user['user_matkhau'] = password_hash($re_mk, PASSWORD_DEFAULT);
            $user['user_quyen'] = 0;
            DB::table('tbl:user')->insert($user);

            $result = DB::table('tbl:user')->where('user_taikhoan', '=', $user['user_taikhoan'])->get();
            $id = $result[0]->user_id;
            $uv['ungvien_id'] = $id;
            $uv['user_id'] = $id;
            DB::table('tbl:ungvien')->insert($uv);
            // echo "insert thanh cong";
            Session::put('success', 'Đăng kí thành công! Vui lòng đăng nhập lại');
            return Redirect::to('/dang-nhap');
        }

    
    }
    public function UIdangkintd()
    {
        $kinhnghiem = DB::table('tbl:kinhnghiem')->orderby('kinhnghiem_id', 'desc')->get();
        $hinhthuclamviec = DB::table('tbl:hinhthuclamviec')->orderby('hinhThuc_id', 'desc')->get();
        $loainganhnghe = DB::table('tbl:loainganhnghe')->orderby('nganhnghe_id', 'desc')->get();
        $tinhthanh = DB::table('tbl:tinhthanh')->orderby('tinhthanh_id', 'desc')->get();
        return view('nhatuyendung.dangki_ntt')->with('kinhnghiem', $kinhnghiem)->with('hinhthuclamviec', $hinhthuclamviec)->with('loainganhnghe', $loainganhnghe)->with('tinhthanh', $tinhthanh);
    }
    public function dangkintd(Request $Request)
    {
        $check =  new DoanhNghiepController();
        $user = array();
        $dn = array();
        $ntd = array();
        $user['id_gioitinh'] = $Request->gender;
        $mk = $Request->user_mk;
        $re_mk = $Request->user_re_mk;
        $user['user_hoten'] = $Request->user_hoten;
        $user['user_taikhoan'] = $Request->user_taikhoan;
        $user['user_ngaysinh'] = $Request->user_ngaysinh;
        $user['user_email'] = $Request->user_email;
        $user['user_sdt'] = $Request->user_sdt;
        $user['user_diachi'] = $Request->user_diachi;
        $dn['doanhnghiep_sdt'] = $Request->doanhnghiep_sdt;
        $dn['doanhnghiep_fax'] = $Request->doanhnghiep_fax;
        $dn['doanhnghiep_website'] = $Request->doanhnghiep_website;
        $dn['doanhnghiep_mota'] = $Request->doanhnghiep_mota;
        $dn['doanhnghiep_email'] = $Request->doanhnghiep_email;
        $dn['doanhnghiep_TinhThanhPho'] = $Request->doanhnghiep_TinhThanhPho;
        $dn['tendoanhnghiep'] = $Request->tendoanhnghiep;
        $dn['diachi'] = $Request->diachi;
        $dn['id_loainganhnghe'] = $Request->id_loainganhnghe;
        $today = date("d-m-Y");
        // echo $Request->user_ngaysinh;
        $time = strtotime(str_replace(' ', '', $Request->user_ngaysinh));
        $newformat = date('d-m-Y', $time);
        $today_dt = new DateTime($today);
        $expire_dt = new DateTime($newformat);
        if ($today_dt < $expire_dt) {
            Session::put('message', 'Ngày tháng năm sinh không hợp lệ');
            return Redirect::to('/dang-ki-ntd')->with('message', Session::get('message'));
        }
        if (!$check->checkNull($user['user_hoten']) || !$check->checkNull($user['user_taikhoan']) || !$check->checkNull($user['user_email']) || !$check->checkNull($user['user_diachi']) || !$check->checkNull($Request->user_re_mk) || !$check->checkNull($Request->user_mk) || !$check->checkNull($Request->doanhnghiep_sdt)  || !$check->checkNull($Request->doanhnghiep_website) || !$check->checkNull($Request->doanhnghiep_email) || !$check->checkNull($Request->tendoanhnghiep) || !$check->checkNull($Request->diachi)) {
            Session::put('message', 'Thông tin không được trống');
            return Redirect::to('/dang-ki-ntd')->with('message', Session::get('message'));
        }
        if (!$check->checkFullName($Request->user_hoten)) {
            Session::put('message', 'Họ tên tài khoản không hợp lệ');
            return Redirect::to('/dang-ki-ntd')->with('message', Session::get('message'));
        }
        if (!$check->checkTel($Request->user_sdt )|| !$check->checkTel($Request->doanhnghiep_sdt)) {
            Session::put('message', 'Số điện thoại không hợp lệ');
            return Redirect::to('/dang-ki-ntd')->with('message', Session::get('message'));
        }
        // if (!$check->checkFax($Request->doanhnghiep_fax)) {
        //     Session::put('message', 'Số Fax  không hợp lệ');
        //     return Redirect::to('/dang-ki-ntd')->with('message', Session::get('message'));
        // }
        // if (!$check->checkAddress($Request->user_diachi) || !$check->checkAddress($Request->diachi)) {
        //     Session::put('message', 'Địa chỉ  không hợp lệ');
        //     return Redirect::to('/dang-ki-ntd')->with('message', Session::get('message'));
        // }
        $result = DB::table('tbl:user')->where('user_taikhoan', '=', $user['user_taikhoan'])->get();
        // $result1 = DB::table('tbl:user')->where('user_sdt', '=', $user['user_sdt'])->get();
        $result2 = DB::table('tbl:user')->where('user_email', '=', $user['user_email'])->get();

        if (count($result) != 0) {
            // echo count($result);
            Session::put('message', 'Username đã tồn tại');
            return Redirect::to('/dang-ki-ntd')->with('message', Session::get('message'));
        } else if (count($result2) != 0) {
            Session::put('message', 'Email đã tồn tại');
            return Redirect::to('/dang-ki-ntd')->with('message', Session::get('message'));
        } else if ($mk !== $re_mk) {
            Session::put('message', 'Xác nhận mật khẩu không khớp');
            return Redirect::to('/dang-ki-ntd')->with('message', Session::get('message'));
        } else {
            $user['user_matkhau'] = password_hash($re_mk, PASSWORD_DEFAULT);
            $user['user_quyen'] = 1;
            DB::table('tbl:user')->insert($user);
            $result = DB::table('tbl:user')->where('user_taikhoan', '=', $user['user_taikhoan'])->get();
            $id = $result[0]->user_id;
            //  Doanh nghiệp:
            $dn['doanhnghiep_id'] = $id;
            // Nhà tuyển dụng:
            $ntd['nhatuyendung_id'] = $id;
            $ntd['user_id'] = $id;
            $ntd['doanhnghiep_id'] = $id;
            // Insert Doanh nghiệp:
            DB::table('tbl:doanhnghiep')->insert($dn);
            //  Insert Nhà tuyển dụng:
            DB::table('tbl:nhatuyendung')->insert($ntd);
            Session::put('success', 'Đăng kí thành công! Vui lòng đăng nhập lại');
            return Redirect::to('/dang-nhap');
        }
    }
    public function permission(Request $request)
    {
        $user_email = $request->user_email;
        $user_matkhau = $request->user_matkhau;
        $mk  = DB::table('tbl:user')->select('user_matkhau')->where('user_email', $user_email)->get('user_matkhau');
        if (count($mk) !== 0) {
            $mk = $mk[0]->user_matkhau;
            if (password_verify($user_matkhau, $mk)) {
                $id  = DB::table('tbl:user')->select('user_id', 'user_quyen', 'user_hoten')->where('user_email', $user_email)->get();
                $_SESSION["id"] = $id[0]->user_id;
                $_SESSION["id_quyen"] = $id[0]->user_quyen;
                $_SESSION["name"] = $id[0]->user_hoten;
                if ($id[0]->user_quyen == 0) {
                    return Redirect::to('/thongtin-ungvien')->with('success', 'Đăng nhập thành công!');
                }
                if ($id[0]->user_quyen == 1) {
                    return Redirect::to('/thongtin-doanhnghiep')->with('success', 'Đăng nhập thành công!');
                }
            } else {
                return Redirect::to('/dang-nhap')->with('error', 'Sai thông tin đăng nhập!');
            }
        } else {
            return Redirect::to('/dang-nhap')->with('error', 'Sai thông tin đăng nhập!');
        }
    }
}
