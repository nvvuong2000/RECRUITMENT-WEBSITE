<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use DateTime;
use Illuminate\Support\Facades\redirect;
// use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\ServiceProvider;

if (!isset($_SESSION)) {
	session_start();
}
class DoanhNghiepController extends Controller
{
	public function thongtindoanhnghiep()
	{
		// Alert::success('Success Title', 'Success Message');
		$id =  $_SESSION["id"];
		$loainganhnghe = DB::table('tbl:loainganhnghe')->orderby('nganhnghe_id', 'desc')->get();
		$tinhthanh = DB::table('tbl:tinhthanh')->orderby('tinhthanh_id', 'desc')->get();
		if (!isset($_SESSION["id"])) {
			return view('nhatuyendung.dangnhap_ntt');
		} else if ($_SESSION['id_quyen'] == 0) {
			return Redirect::to('/');
		} else {
			$dn = DB::table('tbl:doanhnghiep')->select(
				'doanhnghiep_id',
				'doanhnghiep_kinhdo',
				'doanhnghiep_vido',
				'doanhnghiep_sdt',
				'doanhnghiep_fax',
				'doanhnghiep_website',
				'doanhnghiep_mota',
				'doanhnghiep_TinhThanhPho',
				'created_at',
				'updated_at',
				'tendoanhnghiep',
				'diachi',
				'doanhnghiep_email',
				'id_loainganhnghe'
			)->where('doanhnghiep_id', $id)->get();
			$user = DB::table('tbl:user')->where('tbl:user.user_id', $_SESSION["id"])->get();
			return view('nhatuyendung.thongtinnhatuyendung')->with('dn', $dn)->with('user', $user)->with('tinhthanh', $tinhthanh)->with('loainganhnghe', $loainganhnghe);
		}
	}
	public function RV_thongtindoanhnghiep($id)
	{
		if (!isset($_SESSION["id"])) {
			$loainganhnghe = DB::table('tbl:loainganhnghe')->orderby('nganhnghe_id', 'desc')->get();
			$tinhthanh = DB::table('tbl:tinhthanh')->orderby('tinhthanh_id', 'desc')->get();
			$dn = DB::table('tbl:doanhnghiep')->select(
				'doanhnghiep_id',
				'doanhnghiep_kinhdo',
				'doanhnghiep_vido',
				'doanhnghiep_sdt',
				'doanhnghiep_fax',
				'doanhnghiep_website',
				'doanhnghiep_mota',
				'doanhnghiep_TinhThanhPho',
				'created_at',
				'updated_at',
				'tendoanhnghiep',
				'diachi',
				'doanhnghiep_email',
				'id_loainganhnghe'
			)->where('doanhnghiep_id', $id)->get();
			return view('nhatuyendung.thongtinnhatuyendung')->with('dn', $dn)->with('tinhthanh', $tinhthanh)->with('loainganhnghe', $loainganhnghe);;
		} else {
			$loainganhnghe = DB::table('tbl:loainganhnghe')->orderby('nganhnghe_id', 'desc')->get();
			$tinhthanh = DB::table('tbl:tinhthanh')->orderby('tinhthanh_id', 'desc')->get();
			$dn = DB::table('tbl:doanhnghiep')->select(
				'doanhnghiep_id',
				'doanhnghiep_kinhdo',
				'doanhnghiep_vido',
				'doanhnghiep_sdt',
				'doanhnghiep_fax',
				'doanhnghiep_website',
				'doanhnghiep_mota',
				'doanhnghiep_TinhThanhPho',
				'created_at',
				'updated_at',
				'tendoanhnghiep',
				'diachi',
				'doanhnghiep_email',
				'id_loainganhnghe'
			)->where('doanhnghiep_id', $id)->get();
			$loainganhnghe = DB::table('tbl:loainganhnghe')->orderby('nganhnghe_id', 'desc')->get();
			$user = DB::table('tbl:user')->where('tbl:user.user_id', $id)->get();
			return view('nhatuyendung.thongtinnhatuyendung')->with('dn', $dn)->with('tinhthanh', $tinhthanh)->with('loainganhnghe', $loainganhnghe)->with('user', $user);
		}
	}
	public function capnhatthongtindoanhnghiep()
	{
		// session()->flush();
		$id =  $_SESSION["id"];
		if (!isset($_SESSION["id"])) {
			return view('nhatuyendung.dangnhap_ntt');
		} else if ($_SESSION['id_quyen'] == 0) {
			return Redirect::to('/');
		} else {
			$loainganhnghe = DB::table('tbl:loainganhnghe')->orderby('nganhnghe_id', 'desc')->get();
			$tinhthanh = DB::table('tbl:tinhthanh')->orderby('tinhthanh_id', 'desc')->get();
			$dn = DB::table('tbl:doanhnghiep')->select(
				'doanhnghiep_id',
				'doanhnghiep_kinhdo',
				'doanhnghiep_vido',
				'doanhnghiep_sdt',
				'doanhnghiep_fax',
				'doanhnghiep_website',
				'doanhnghiep_mota',
				'doanhnghiep_TinhThanhPho',
				'created_at',
				'updated_at',
				'tendoanhnghiep',
				'diachi',
				'doanhnghiep_email',
				'id_loainganhnghe'
			)->where('doanhnghiep_id', $id)->get();
			$user = DB::table('tbl:user')->where('tbl:user.user_id', $_SESSION["id"])->get();
			return view('nhatuyendung.capnhatnhatuyendung')->with('dn', $dn)->with('user', $user)->with('loainganhnghe', $loainganhnghe)->with('tinhthanh', $tinhthanh)->with('loainganhnghe', $loainganhnghe);;
		}
	}
	public function luudoanhnghiep(Request $Request)
	{
		if (!isset($_SESSION["id"])) {
			return view('nhatuyendung.dangnhap_ntt');
		} else if ($_SESSION['id_quyen'] == 0) {
			return Redirect::to('/');
		} else {
			if ($Request->id_doanhnghiep) {
				$id = $Request->id_doanhnghiep;
				$data = array();
				$data['tendoanhnghiep'] = $Request->ten;
				$data['doanhnghiep_email'] = $Request->email;
				$data['doanhnghiep_sdt'] = $Request->sdt;
				$data['doanhnghiep_website'] = $Request->web;
				$data['id_loainganhnghe'] = $Request->loai;
				$data['doanhnghiep_mota'] = $Request->mota;
				$data['doanhnghiep_TinhThanhPho'] = $Request->tinhthanh;
				$data['diachi'] = $Request->diachi;
				$check = new DoanhNghiepController();
				if (!$check->checkNull($Request->ten) || !$check->checkNull($Request->email) || !$check->checkNull($Request->sdt) || !$check->checkNull($Request->web) || !$check->checkNull($Request->diachi)) {
					Session::put('message', 'Thông tin không được trống');
					return Redirect::to('/capnhat-doanhnghiep')->with('message', Session::get('message'));
				}
				// if (!$check->checkFullName($Request->ten)) {
				// 	Session::put('message', 'Họ tên tài khoản không hợp lệ');
				// 	return Redirect::to('/capnhat-doanhnghiep')->with('message', Session::get('message'));
				// }
				if (!$check->checkTel($Request->sdt)) {
					Session::put('message', 'Số điện thoại không hợp lệ');
					return Redirect::to('/capnhat-doanhnghiep')->with('message', Session::get('message'));
				}
				DB::table('tbl:doanhnghiep')->where('doanhnghiep_id', $id)->update($data);
				return Redirect::to('/thongtin-doanhnghiep')->with('success', 'Cập nhập thông tin doanh nghiệp thành công!');
			} else {
				$data = array();
				$data['tendoanhnghiep'] = $Request->ten;
				$data['doanhnghiep_email'] = $Request->email;
				$data['doanhnghiep_sdt'] = $Request->sdt;
				$data['doanhnghiep_website'] = $Request->web;
				$data['id_loainganhnghe'] = $Request->loai;
				$data['doanhnghiep_mota'] = $Request->mota;
				$data['doanhnghiep_TinhThanhPho'] = $Request->tinhthanh;
				$data['diachi'] = $Request->diachi;
				DB::table('tbl:doanhnghiep')->insert($data);
				return Redirect::to('/thongtin-doanhnghiep')->with('success', 'Thêm thông tin  doanh nghiệp thành công!');
			}
		}
	}
	// UserController 
	//  Apply Công Việc:
	public function nopdontintd($id_doanhnghiep, $id_ungvien, $id_tintuyendung)
	{
		if (!isset($_SESSION["id"])) {
			return view('nhatuyendung.dangnhap_ntt');
		} else if ($_SESSION['id_quyen'] == 1) {
			return Redirect::to('/');
		} else {
			$hs = DB::table('tbl:nophoso')->select('ungvien_id', 'tintd_id')->where('tbl:nophoso.ungvien_id', $id_ungvien)->where('tbl:nophoso.tintd_id', $id_tintuyendung)->get();
			if (count($hs) != 0) {
				return Redirect::to('/danh-sach-nop-don/' . $id_ungvien)->with('error', 'Bạn đã apply công việc này rồi!');
			} else {
				$cv = DB::table('cv')->where('cv.ungvien_id', $id_ungvien)->where('cv.trangthai', 1)->get();
				if (count($cv) != 0) {
					$data = array();
					$data['ungvien_id'] = $id_ungvien;
					$data['nhatuyendung_id'] = $id_doanhnghiep;
					$data['tintd_id'] = $id_tintuyendung;
					$data['cv_id'] = $cv[0]->id;
					$data['link_cv'] = $cv[0]->link_cv;
					DB::table('tbl:nophoso')->insert($data);
					return Redirect::to('/danh-sach-nop-don/' . $id_ungvien)->with('success', "Nộp đơn xin việc thành công");
				} else {
					return Redirect::to('/quan-li-ho-so/')->with('error', 'Bạn chưa chọn CV mặc định hoặc chưa có CV');
				}
			}
		}
	}
	public function danhsachcty($id_ungvien)
	{
		$loainganhnghe = DB::table('tbl:loainganhnghe')->orderby('nganhnghe_id', 'desc')->get();
		$tinhthanh = DB::table('tbl:tinhthanh')->orderby('tinhthanh_id', 'desc')->get();
		if (isset($_SESSION["id"])) {
			if ($_SESSION["id_quyen"] == 0) {
				$chitiet = DB::table('tbl:nophoso')
					->join('tbl:doanhnghiep', 'tbl:doanhnghiep.doanhnghiep_id', '=', 'tbl:nophoso.nhatuyendung_id')
					->join('tbl:user', 'tbl:user.user_id', '=', 'tbl:nophoso.ungvien_id')
					->join('tintuyendung', 'tintuyendung.id_tintuyendung', '=', 'tbl:nophoso.tintd_id')
					->where('tbl:nophoso.ungvien_id', $id_ungvien)->get();
				$user = DB::table('tbl:user')->where('tbl:user.user_id', $id_ungvien)->get();

				return view('user.danhsachnopdon', ['tinhthanh' => $tinhthanh])->with('chitiet', $chitiet)->with('user', $user)->with('tinhthanh', $tinhthanh)->with('loainganhnghe', $loainganhnghe);;
			}
			if ($_SESSION["id_quyen"] == 1) {
				return Redirect::to('/');
			}
		} else {
			return Redirect::to('/');
		}
	}
	public function xoaungtuyen($id_ungvien, $id_tintuyendung)
	{
		if (!isset($_SESSION["id"])) {
			return view('nhatuyendung.dangnhap_ntt');
		} else if ($_SESSION['id_quyen'] == 1) {
			return Redirect::to('/');
		} else {
			$ungtuyen = DB::table('tbl:nophoso')->where('tintd_id', $id_tintuyendung)->where('tbl:nophoso.ungvien_id', $id_ungvien)->delete();
			return back();
		}
	}
	public function UIquanlihoso()
	{
		$loainganhnghe = DB::table('tbl:loainganhnghe')->orderby('nganhnghe_id', 'desc')->get();
		$tinhthanh = DB::table('tbl:tinhthanh')->orderby('tinhthanh_id', 'desc')->get();
		if (!isset($_SESSION["id"])) {
			return Redirect::to('/');
		} else 
		
	if ($_SESSION['id_quyen'] == 1) {
			return Redirect::to('/');
		} else {
			$cv = DB::table('cv')
				->join('tbl:user', 'tbl:user.user_id', '=', 'cv.ungvien_id')
				->where('cv.ungvien_id', $_SESSION["id"])->get();
			$user = DB::table('tbl:user')->where('tbl:user.user_id', $_SESSION["id"])->get();


			return view('user.quanlihoso')->with('cv', $cv)->with('user', $user)->with('tinhthanh', $tinhthanh)->with('loainganhnghe', $loainganhnghe);;
		}
	}
	public function editcvdefault(Request $Request)
	{
		if (!isset($_SESSION["id"])) {
			return view('nhatuyendung.dangnhap_ntt');
		} else if ($_SESSION['id_quyen'] == 1) {
			return Redirect::to('/');
		} else {
			$cv = DB::table('cv')->where('ungvien_id', $_SESSION['id'])->update(['trangthai' => 0]);
			$cv = DB::table('cv')->where('id', $Request->cv_default)->where('ungvien_id', $_SESSION['id'])->update(['trangthai' => 1]);
			$cv = DB::table('tbl:nophoso')->where('ungvien_id', $_SESSION['id'])->update(['cv_id' => 0]);
			$cv = DB::table('tbl:nophoso')->where('ungvien_id', $_SESSION['id'])->update(['cv_id' => $Request->cv_default]);
			return Redirect::to('/quan-li-ho-so')->with('success', "Cập nhật  CV mặc định thành công.");
		}
	}
	public function delcv($cv_default)
	{
		if (!isset($_SESSION["id"])) {
			return view('nhatuyendung.dangnhap_ntt');
		} else if ($_SESSION['id_quyen'] == 1) {
			return Redirect::to('/');
		} else {
			$cv = DB::table('cv')->where('id', $cv_default)->where('ungvien_id', $_SESSION['id'])->where('trangthai', 1)->get();
			if (count($cv)) {
				$cv = DB::table('cv')->where('id', $cv_default)->where('ungvien_id', $_SESSION['id'])->delete();
				$cv = DB::table('tbl:nophoso')->where('ungvien_id', $_SESSION['id'])->update(['cv_id' => 0]);
			}
			$cv = DB::table('cv')->where('id', $cv_default)->where('ungvien_id', $_SESSION['id'])->delete();
			return Redirect::to('/quan-li-ho-so')->with('success', "Xóa file  CV thành công.");
		}
	}
	public function quanlihoso()
	{
		if (!isset($_SESSION["id"])) {
			return Redirect::to('/');
		}
		if ($_SESSION['id_quyen'] == 1) {
			return Redirect::to('/');
		} else {
			if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
				return Redirect::to('/quan-li-ho-so')->with('error', 'Phải Post dữ liệu');
				die;
			}
			if (!isset($_FILES["fileupload"])) {
				return Redirect::to('/quan-li-ho-so')->with('error', 'file bị lỗi!');
				die;
			}
			if ($_FILES["fileupload"]['error'] != 0) {
				return Redirect::to('/quan-li-ho-so')->with('error', 'file bị lỗi!');
				die;
			}
			$target_dir    = "uploads/";
			$folder = "./uploads/";
			$pic = $_FILES["fileupload"]["name"];
			$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
			$path = $folder . substr(str_shuffle($permitted_chars), 0, 10) . basename($pic);
			$target_file   = $path;
			$allowUpload   = true;
			$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
			$allowtypes    = array('doc', 'docx', 'pdf');
			if (file_exists($target_file)) {
				return Redirect::to('/quan-li-ho-so')->with('error', 'file tồn tại!');
				$allowUpload = false;
			}
			if (!in_array($imageFileType, $allowtypes)) {
				return Redirect::to('/quan-li-ho-so')->with('error', "Chỉ được upload các định dạng doc, docx, pdf");
				$allowUpload = false;
			}
			if ($allowUpload) {
				if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file)) {
				} else {
					return Redirect::to('/quan-li-ho-so')->with('error', "Có lỗi xảy ra khi upload file.");
				}
			} else {
				return Redirect::to('/quan-li-ho-so')->with('error', "Không upload được file, có thể do file lớn, kiểu file không đúng ...");
			}
			$data = array();
			$data['ungvien_id'] =  $_SESSION["id"];
			$data['tencv'] =  $pic;
			$data['link_cv'] = $target_file;
			$cv = DB::table('cv')->insert($data);
			return Redirect::to('/quan-li-ho-so')->with('success', "Upload file CV thành công.");
		}
	}
	public function updateImg()
	{
		if (!isset($_SESSION["id"])) {
			return Redirect::to('/');
		} else {
			if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
				return Redirect::to('/cap-nhat-ung-vien')->with('error', 'Phải Post dữ liệu');
				die;
			}
			if (!isset($_FILES["file-7"])) {
				return Redirect::to('/cap-nhat-ung-vien')->with('error', 'file bị lỗi!');
				die;
			}
			if ($_FILES["file-7"]['error'] != 0) {
				return Redirect::to('/cap-nhat-ung-vien')->with('error', 'file bị lỗi!');
				die;
			}
			$target_dir    = "uploads/";
			$folder = "./uploads/";
			$pic = $_FILES["file-7"]["name"];
			$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
			$path = $folder . substr(str_shuffle($permitted_chars), 0, 10) . basename($pic);
			$target_file   = $path;
			$allowUpload   = true;
			$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
			$allowtypes    = array('jpg', 'png', 'gif', 'jpeg');
			if (file_exists($target_file)) {
				return Redirect::to('/cap-nhat-ung-vien')->with('error', 'file tồn tại!');
				$allowUpload = false;
			}
			if (!in_array($imageFileType, $allowtypes)) {
				return Redirect::to('/cap-nhat-ung-vien')->with('error', "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF");
				$allowUpload = false;
			}
			if ($allowUpload) {
				if (move_uploaded_file($_FILES["file-7"]["tmp_name"], $target_file)) {
				} else {
					return Redirect::to('/cap-nhat-ung-vien')->with('error', "Có lỗi xảy ra khi upload file.");
				}
			} else {
				return Redirect::to('/cap-nhat-ung-vien')->with('error', "Không upload được file, có thể do file lớn, kiểu file không đúng ...");
			}
			$data = array();
			$data['link'] = $target_file;
			$cv = DB::table('tbl:user')->where('user_id', $_SESSION["id"])->update($data);
			return Redirect::to('/cap-nhat-ung-vien')->with('success', "Cập nhật ảnh đại diện thành công");
		}
	}
	public function thongtinungvien()
	{
		$bangcap = DB::table('tbl:bangcap')->orderby('bangcap_id', 'desc')->get();
		$gioitinh = DB::table('gioitinh')->orderby('id_gioitinh', 'desc')->get();
		$kinhnghiem = DB::table('tbl:kinhnghiem')->orderby('kinhnghiem_id', 'desc')->get();
		$loainganhnghe = DB::table('tbl:loainganhnghe')->orderby('nganhnghe_id', 'desc')->get();
		$tinhthanh = DB::table('tbl:tinhthanh')->orderby('tinhthanh_id', 'desc')->get();
		if (!isset($_SESSION["id"])) {
			return Redirect::to('/');
		} else 
		
	if ($_SESSION['id_quyen'] == 1) {
			return Redirect::to('/');
		} else {
			$uv = DB::table('tbl:user')
				->join('tbl:ungvien', 'tbl:ungvien.ungvien_id', '=', 'tbl:user.user_id')
				->join('tbl:loainganhnghe', 'tbl:loainganhnghe.nganhnghe_id', '=', 'tbl:ungvien.nganhnghe_id')
				->join('tbl:hinhthuclamviec', 'tbl:hinhthuclamviec.hinhThuc_id', '=', 'tbl:ungvien.hinhthuc_id')
				->join('tbl:kinhnghiem', 'tbl:kinhnghiem.kinhnghiem_id', '=', 'tbl:ungvien.id_kinhnghiem')
				->join('tbl:tinhthanh', 'tbl:tinhthanh.tinhthanh_id', '=', 'tbl:ungvien.thanhpho_id')
				->join('tbl:bangcap', 'tbl:bangcap.bangcap_id', '=', 'tbl:ungvien.id_bangcap')->where('tbl:user.user_id', $_SESSION["id"])->get();
		}
		return view('user.thongtinungvien', ['loainganhnghe' => $loainganhnghe])->with('gioitinh', $gioitinh)->with('loainghanhnghe', $loainganhnghe)->with('uv', $uv)->with('bangcap', $bangcap)->with('kinhnghiem', $kinhnghiem)->with('tinhthanh', $tinhthanh)->with('loainghanhnghe', $loainganhnghe);
	}
	public function luuungvien(Request $Request)
	{
		// echo "abc";
		$id = $_SESSION["id"];
		if (!isset($_SESSION["id"])) {
			return view('nhatuyendung.dangnhap_ntt');
		} else if ($_SESSION['id_quyen'] == 1) {
			return Redirect::to('/');
		} else {


			$user = array();

			$user['user_hoten'] = $Request->ten;
			// $user['user_taikhoan'] = $Request->user_taikhoan;
			$user['user_ngaysinh'] = $Request->user_ngaysinh;
			// $user['user_email'] = $Request->user_email;
			$user['user_sdt'] = $Request->sdt;
			// $uv['hinhthuc_id'] = $Request->hinhthuc_id;
			$user['id_gioitinh'] = $Request->gender;
			$uv['id_bangcap'] = $Request->bangcap;
			$user['user_diachi'] = $Request->diachi;
			$uv['thanhpho_id'] = $Request->tinhthanh;
			$today = date("d-m-Y");
			$check = new DoanhNghiepController();
			// echo $Request->user_ngaysinh;
			$time = strtotime(str_replace(
				' ',
				'',
				$Request->user_ngaysinh
			));

			$newformat = date('d-m-Y', $time);
			$today_dt = new DateTime($today);
			$expire_dt = new DateTime($newformat);
			if ($today_dt < $expire_dt) {
				Session::put('message', 'Ngày tháng năm sinh không hợp lệ');
				return Redirect::to('/cap-nhat-ung-vien')->with('message', Session::get('message'));
			}
			if ($check->checkFullName($Request->ten) == false) {
				Session::put('message', 'Họ tên tài khoản không hợp lệ');
				return Redirect::to('/cap-nhat-ung-vien')->with('message', Session::get('message'));
			}
			if ($check->checkTel($Request->sdt) == false) {
				Session::put('message', 'Số điện thoại không hợp lệ');
				return Redirect::to('/cap-nhat-ung-vien')->with('message', Session::get('message'));
			}
			if ($check->checkAddress($Request->diachi) == false) {
				Session::put('message', 'Địa chỉ  không hợp lệ');
				return Redirect::to('/cap-nhat-ung-vien')->with('message', Session::get('message'));
			}
			DB::table('tbl:user')->where('user_id', $id)->update($user);
			DB::table('tbl:ungvien')->where('user_id', $id)->update($uv);
			$_SESSION["name"] = $Request->ten;
			return Redirect::to('/thongtin-ungvien')->with('success', 'Cập nhật thông tin ứng viên thành công!');
		}
	}
	public function capnhatthongtinungvien()
	{
		if (!isset($_SESSION["id"])) {
			return Redirect::to('/');
		} else 
		
	if ($_SESSION['id_quyen'] == 1) {
			return Redirect::to('/');
		} else {
			$bangcap = DB::table('tbl:bangcap')->orderby('bangcap_id', 'desc')->get();
			$gioitinh = DB::table('gioitinh')->orderby('id_gioitinh', 'desc')->get();

			$kinhnghiem = DB::table('tbl:kinhnghiem')->orderby('kinhnghiem_id', 'desc')->get();
			// $mucluong = DB::table('tbl:mucluong')->orderby('mucluong_id', 'desc')->get();
			$hinhthuclamviec = DB::table('tbl:hinhthuclamviec')->orderby('hinhThuc_id', 'desc')->get();
			$loainganhnghe = DB::table('tbl:loainganhnghe')->orderby('nganhnghe_id', 'desc')->get();
			$tinhthanh = DB::table('tbl:tinhthanh')->orderby('tinhthanh_id', 'desc')->get();
			$uv = DB::table('tbl:user')
				->join('tbl:ungvien', 'tbl:ungvien.ungvien_id', '=', 'tbl:user.user_id')
				->join('tbl:loainganhnghe', 'tbl:loainganhnghe.nganhnghe_id', '=', 'tbl:ungvien.nganhnghe_id')
				->join('tbl:hinhthuclamviec', 'tbl:hinhthuclamviec.hinhThuc_id', '=', 'tbl:ungvien.hinhthuc_id')
				->join('tbl:kinhnghiem', 'tbl:kinhnghiem.kinhnghiem_id', '=', 'tbl:ungvien.id_kinhnghiem')
				->join('tbl:tinhthanh', 'tbl:tinhthanh.tinhthanh_id', '=', 'tbl:ungvien.thanhpho_id')
				->join('tbl:bangcap', 'tbl:bangcap.bangcap_id', '=', 'tbl:ungvien.id_bangcap')->where('tbl:user.user_id', $_SESSION["id"])->get();
		}
		return view('user.capnhatungvien')->with('uv', $uv)->with('gioitinh', $gioitinh)->with('bangcap', $bangcap)->with('kinhnghiem', $kinhnghiem)->with('tinhthanh', $tinhthanh)->with('loainganhnghe', $loainganhnghe);;
	}
	public function RV_thongtinungvien($id)
	{

		$gioitinh = DB::table('gioitinh')->orderby('id_gioitinh', 'desc')->get();


		$tinhthanh = DB::table('tbl:tinhthanh')->orderby('tinhthanh_id', 'desc')->get();
		$bangcap = DB::table('tbl:bangcap')->orderby('bangcap_id', 'desc')->get();
		// $chucvu = DB::table('tbl:chucvu')->orderby('chucvu_id', 'desc')->get();
		$loainganhnghe = DB::table('tbl:loainganhnghe')->orderby('nganhnghe_id', 'desc')->get();
		$kinhnghiem = DB::table('tbl:kinhnghiem')->orderby('kinhnghiem_id', 'desc')->get();
		// $mucluong = DB::table('tbl:mucluong')->orderby('mucluong_id', 'desc')->get();


		$uv = DB::table('tbl:user')
			->join('tbl:ungvien', 'tbl:ungvien.ungvien_id', '=', 'tbl:user.user_id')
			->join('tbl:loainganhnghe', 'tbl:loainganhnghe.nganhnghe_id', '=', 'tbl:ungvien.nganhnghe_id')
			->join('tbl:hinhthuclamviec', 'tbl:hinhthuclamviec.hinhThuc_id', '=', 'tbl:ungvien.hinhthuc_id')
			->join('tbl:kinhnghiem', 'tbl:kinhnghiem.kinhnghiem_id', '=', 'tbl:ungvien.id_kinhnghiem')
			->join('tbl:tinhthanh', 'tbl:tinhthanh.tinhthanh_id', '=', 'tbl:ungvien.thanhpho_id')
			->join('tbl:bangcap', 'tbl:bangcap.bangcap_id', '=', 'tbl:ungvien.id_bangcap')->where('tbl:user.user_id', $id)->get();
		// // print_r($uv);
		return view('user.thongtinungvien')->with('uv', $uv)->with('gioitinh', $gioitinh)->with('bangcap', $bangcap)->with('kinhnghiem', $kinhnghiem)->with('tinhthanh', $tinhthanh)->with('loainganhnghe', $loainganhnghe);
	}
	public static function checkNull($str)
	{
		session()->flush();
		if ($str == "" || strlen($str) == 0) {
			return false;
		}
		return true;
	}
	public function checkFullName($str)
	{
		session()->flush();
		if (preg_match('~^(?:[\p{L}\p{Mn}\p{Pd}\'\x{2019}]+\s[\p{L}\p{Mn}\p{Pd}\'\x{2019}]+\s?)+$~u', $str) > 0) {
			return true;  // valid
		}
		return false;
	}
	public function checkTel($str)
	{
		session()->flush();
		echo $str;
		if (preg_match("/(03|07|08|09|01[2|6|8|9])+([0-9]{8})/", $str, $matches)) {
			var_dump($matches);
			return true;
		}
		return false;
	}
	public function checkFax($str)
	{
		session()->flush();
		if (preg_match("/^(\+?\d{1,}(\s?|\-?)\d*(\s?|\-?)\(?\d{2,}\)?(\s?|\-?)\d{3,}\s?\d{3,})$/", $str)) {

			return true;
		}
		return false;
	}
	public function checkEmail($str)
	{
		session()->flush();
		if (preg_match("/\S+@\S+\.\S+/", $str)) {
			return true;
		}
		return false;
	}
	public function isNumber($str)
	{
		session()->flush();
		if (is_numeric($str)) {
			return true;
		}
		return false;
	}
	public function checkAddress($str)
	{
		session()->flush();
		if (preg_match("/^\s*\S+(?:\s+\S+){2,}/", $str)) {
			return true;
		}
		return false;
	}
}
