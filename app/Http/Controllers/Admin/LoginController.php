<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use DB;

class LoginController extends Controller
{
    //class LoginController extends Controller
    public function index()
    {
        if(\Auth::check()) {
           
        }
        // 显示
        return view("admin.login");
    }

    public function dologin(Request $request)
    {

    	// dump($request->all());
    	// 信息的获取
    	$username = $request ->input('username','');
    	$userpwd = $request -> input('userpwd','');
    	//用户名的判断


   		$userinfo = DB::table('user')->where('username',$username)->first();
   		// dump($userinfo);
   		if(!$userinfo){
			echo "<script>alert('用户名或者密码错误');location.href='/admin/login';</script>";   			
   			exit;
   		}


   		// 验证密码正确
   		if (!Hash::check($userpwd, $userinfo->userpwd)) {
   		    echo "<script>alert('用户名或者密码错误');location.href='/admin/login';</script>";   			
      			exit;
   		}
		//登录成功
		session(['admin_login'=>true]);
		session(['admin_userinfo'=>$userinfo]);

		//跳转
		return redirect('admin/index');
    }
}
