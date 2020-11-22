<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\redirect;

session_start();
class DangnhapController extends Controller
{

    public function dangnhapntd()
    {
        return view('nhatuyendung.dangnhap_ntt');
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
        // Session::put('message', 'Sai thông tin đăng nhập,hãy nhập lại');
        $message = array();
        $user = array();
        $ntd = array();
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
        echo count($result);
        echo $result1;
        echo $result2;
        if (count($result) !== 0) {
            echo 'Username đã tồn tại';
            array_push($message, 'Username đã tồn tại');
        } else if (count($result1)) {
            echo ' SDT da ton tai';
            array_push($message, 'SĐT đã tồn tại');
        } else if (count($result2)) {
            echo 'Email đã tồn tại';
            array_push($message, 'Email đã tồn tại');
        } else if ($mk !== $re_mk) {
            echo 'K lhopws';
            array_push($message, 'Xác nhận mật khẩu không khớp');
        } else {
            $user['user_matkhau'] = password_hash($re_mk, PASSWORD_DEFAULT);
            $user['user_quyen'] = 0;
            // echo 'aaaaaaaa',$user;
            DB::table('tbl:user')->insert($user);

            $result = DB::table('tbl:user')->where('user_taikhoan', '=', $user['user_taikhoan'])->get();
            $id = $result[0]->user_id;
            $uv['ungvien_id'] = $id;
            $uv['user_id'] = $id;

            // array_push($message, 'DK user thành công');
            // session::put('message', $message);
            DB::table('tbl:ungvien')->insert($uv);
            echo "insert thanh cong";
            return Redirect::to('/dang-nhap');
        }
        session::put('message', $message);

        // return view('nhatuyendung.dangki_ungvien')->with('kinhnghiem', $kinhnghiem)->with('hinhthuclamviec', $hinhthuclamviec)->with('loainganhnghe', $loainganhnghe)->with('tinhthanh', $tinhthanh);
    }
    public function UIdangkintd()
    {
        $bangcap = DB::table('tbl:bangcap')->orderby('bangcap_id', 'desc')->get();
        $kinhnghiem = DB::table('tbl:kinhnghiem')->orderby('kinhnghiem_id', 'desc')->get();
        $hinhthuclamviec = DB::table('tbl:hinhthuclamviec')->orderby('hinhThuc_id', 'desc')->get();
        $loainganhnghe = DB::table('tbl:loainganhnghe')->orderby('nganhnghe_id', 'desc')->get();
        $tinhthanh = DB::table('tbl:tinhthanh')->orderby('tinhthanh_id', 'desc')->get();
        return view('nhatuyendung.dangki_ntt')->with('kinhnghiem', $kinhnghiem)->with('hinhthuclamviec', $hinhthuclamviec)->with('loainganhnghe', $loainganhnghe)->with('tinhthanh', $tinhthanh);
    }
    public function dangkintd(Request $Request)
    {
        // $message = array();
        $user = array();
        $dn = array();
        $ntd = array();
        $message = array();
        $user['id_gioitinh'] = $Request->gender;
        $mk = $Request->user_mk;
        $re_mk = $Request->user_re_mk;
        $user['user_hoten'] = $Request->user_hoten;
        $user['user_taikhoan'] = $Request->user_taikhoan;
        $user['user_ngaysinh'] = $Request->user_ngaysinh;
        $user['user_email'] = $Request->user_email;
        $user['user_sdt'] = $Request->user_sdt;
        $user['user_diachi'] = $Request->user_diachi;
        $user['user_quyen'] = 1;
        // $dn['thanhpho_id'] = $Request->thanhpho_id;
        $dn['doanhnghiep_sdt'] = $Request->doanhnghiep_sdt;
        $dn['doanhnghiep_fax'] = $Request->doanhnghiep_fax;
        $dn['doanhnghiep_website'] = $Request->doanhnghiep_website;
        $dn['doanhnghiep_mota'] = $Request->doanhnghiep_mota;
        $dn['doanhnghiep_email'] = $Request->doanhnghiep_email;
        $dn['doanhnghiep_TinhThanhPho'] = $Request->doanhnghiep_TinhThanhPho;
        $dn['tendoanhnghiep'] = $Request->tendoanhnghiep;
        $dn['diachi'] = $Request->diachi;
        $dn['id_loainganhnghe'] = $Request->id_loainganhnghe;
        $result = DB::table('tbl:user')->where('user_taikhoan', '=', $user['user_taikhoan'])->get();
        $result1 = DB::table('tbl:user')->where('user_sdt', '=', $user['user_sdt'])->get();
        $result2 = DB::table('tbl:user')->where('user_email', '=', $user['user_email'])->get();
        echo count($result);
        echo $result1;
        echo $result2;
        if (count($result) !== 0) {
            echo 'Username đã tồn tại';
            array_push($message, 'Username đã tồn tại');
        } else if (count($result1)) {
            echo ' SDT da ton tai';
            array_push($message, 'SĐT đã tồn tại');
        } else if (count($result2)) {
            echo 'Email đã tồn tại';
            array_push($message, 'Email đã tồn tại');
        } else if ($mk !== $re_mk) {
            echo 'K lhopws';
            array_push($message, 'Xác nhận mật khẩu không khớp');
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

            echo "insert thanh cong";
            return Redirect::to('/dang-nhap');
        }
        session::put('message', $message);
    }
    public function permission(Request $request)
    {

        $user_email = $request->user_email;
        $user_matkhau = $request->user_matkhau;
        $mk  = DB::table('tbl:user')->select('user_matkhau')->where('user_email', $user_email)->get('user_matkhau');
        if (count($mk) !== 0) {
            $mk = $mk[0]->user_matkhau;
            if (password_verify($user_matkhau, $mk)) {
                $id  = DB::table('tbl:user')->select('user_id', 'user_quyen','user_hoten')->where('user_email', $user_email)->get();
                     $_SESSION["id"] = $id[0]->user_id;
                     $_SESSION["id_quyen"] = $id[0]->user_quyen;
                     $_SESSION["name"] = $id[0]->user_hoten;
                     if($id[0]->user_quyen==0){
                             return Redirect::to('/thongtin-doanhnghiep');
                     }
                     if($id[0]->user_quyen==1){
                      
                            //  return Redirect::to('/dang-ki-ntd');
                            return Redirect::to('/thongtin-ungvien');
                     }
            } else {
                // Session::put('message', 'co loi');
                echo 'Sai';
            }
        } else {
            echo 'Sai toàn khoản';
        }
    }
    
}
