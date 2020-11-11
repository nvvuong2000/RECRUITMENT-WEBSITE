<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class UserController extends Controller
{
    public function index()
    {
    	return view('layouts.login_user');
    }
    public function show_user()
    {
    	return view('user.profile_user');
    }
    public function dashboard(Request $Request)
    {
    	$user_email = $Request->admin_email;
    	$user_password = md5($Request->user_password);

    	$result = DB:: table('tbl:user')->where('user_email',$user_email)->where('user_password',$user_password)->first();
    	return view('user.quanlyadmin');
    }

    public function dangky()
    {
    	return view('layouts.register_user');
    }
}

