<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class AdminController extends Controller
{
    public function index()
    {
    	return view('login_admin');
    }
    public function show_admin()
    {
    	return view('admin.quanlyadmin');
    }
    public function dashboard(Request $Request)
    {
    	$admin_email = $Request->admin_email;
    	$admin_password = md5($Request->admin_password);

    	$result = DB:: table('tbl:admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
    	return view('admin.quanlyadmin');
    }
}

