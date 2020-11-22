<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;    
use Illuminate\Support\Facades\redirect;
session_start();

class UserController extends Controller
{
    //     public function dangnhapntd()
    // {   

    //     return view('nhatuyendung.dangnhap_ntt');

    // }
        public function search()
        {
    
            // session::put('user_hoten',$result->user_hoten);
            	return view('timkiem');

        }
        // else
        // {   
        //     Session::put('message','Sai thông tin đăng nhập,hãy nhập lại');
        //     return Redirect::to('/dang-nhap');
        // }
}


    // public function dangxuat()
    // {
        
    //     return redirect::to('/dang-nhap');
    // }

// }


