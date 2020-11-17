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
        public function thongtinntt(Request $request)
        {
            $user_email = $request->user_email;
            $user_matkhau = $request->user_matkhau;
            $result = DB::table('tbl:user')->where('user_email',$user_email)->
            where('user_matkhau',$user_matkhau)->first();
        if($result)
        {
            session::put('user_hoten',$result->user_hoten);
            return Redirect::to('/thongtin-doanhnghiep');

        }
        else
        {   
            Session::put('message','Sai thông tin đăng nhập,hãy nhập lại');
            return Redirect::to('/dang-nhap');
        }
}


    public function dangxuat()
    {
        
        return redirect::to('/dang-nhap');
    }

}


