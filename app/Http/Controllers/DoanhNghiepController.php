<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\redirect;
session_start();
class DoanhNghiepController extends Controller
{
	public function thongtindoanhnghiep()
	{
		$id =  $_SESSION["id"];
		if (!$id) {
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
				'id_loainganhnghe',
			)->where('doanhnghiep_id', $id)->get();
			return view('nhatuyendung.thongtinnhatuyendung')->with('dn', $dn);
		}
	}
	public function luudoanhnghiep(Request $Request)
	{
		if ($Request->id_doanhnghiep) {
			// echo 'cap ne';
			// echo 'cap nhat';
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
			DB::table('tbl:doanhnghiep')->where('doanhnghiep_id', $id)->update($data);
			Session::put('message', 'Cap nhat tuyen dụng thành công');
			return Redirect::to('/dangtuyen-nhanvien');
		} else {
			echo 'them';
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
			Session::put('message', 'Lưu thông tin doanh nghiệp thành công');
			return Redirect::to('/thongtin-doanhnghiep');
		}
	}
	// UserController 
	//  Apply Công Việc:
	public function nopdontintd($id_doanhnghiep, $id_ungvien, $id_tintuyendung)
	{
		$hs = DB::table('tbl:nophoso')->select('ungvien_id', 'tintd_id')->where('tbl:nophoso.ungvien_id', $id_ungvien)->where('tbl:nophoso.tintd_id', $id_tintuyendung)->get();
		if (count($hs) != 0) {
			echo 'CÓ rồi';
		} else {
			$data = array();
			$data['ungvien_id'] = $id_ungvien;
			$data['nhatuyendung_id'] = $id_doanhnghiep;
			$data['tintd_id'] = $id_tintuyendung;
			echo $id_doanhnghiep, $id_ungvien, $id_tintuyendung;
			DB::table('tbl:nophoso')->insert($data);
			return Redirect::to('/danh-sach-nop-don/' . $id_ungvien);
		}
	}
	public function danhsachcty($id_ungvien)
	{
		$chitiet = DB::table('tbl:nophoso')
			->join('tbl:doanhnghiep', 'tbl:doanhnghiep.doanhnghiep_id', '=', 'tbl:nophoso.nhatuyendung_id')
			->join('tintuyendung', 'tintuyendung.id_tintuyendung', '=', 'tbl:nophoso.tintd_id')
			->where('tbl:nophoso.ungvien_id', $id_ungvien)->get();
		return view('user.danhsachnopdon')->with('chitiet', $chitiet);
	}
	public function xoaungtuyen($id,$id_ungvien)
	{
		$ungtuyen = DB::table('tbl:nophoso')->where('tintd_id', $id)->where('tbl:nophoso.ungvien_id', $id_ungvien)->delete();
		return back();
	}
	public function thongtinungvien()
	{
		$id =  $_SESSION["id"];
		if (!$id) {
			return view('nhatuyendung.dangnhap_ntt');
		} else if ($_SESSION['id_quyen'] == 1) {
			return Redirect::to('/');
		} else {
			$bangcap = DB::table('tbl:bangcap')->orderby('bangcap_id', 'desc')->get();
			// $chucvu = DB::table('tbl:chucvu')->orderby('chucvu_id', 'desc')->get();
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
				->join('tbl:bangcap', 'tbl:bangcap.bangcap_id', '=', 'tbl:ungvien.id_bangcap')->where('tbl:user.user_id', $id)->get();
			
		}
		// print_r($uv);
		return view('ungvien.thongtinungvien')->with('uv', $uv)->with('bangcap',$bangcap)->with('kinhnghiem',$kinhnghiem)->with('loainghanhnghe',$loainganhnghe)->with('tinhthanh',$tinhthanh);
	}
}
