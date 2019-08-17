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
      // session()->flush();
     // 显示
        return view("admin.login");
    }

    public function dologin(Request $request)
    {

    	// dd($request->all());
    	// 信息的获取
    	$uname = $request ->input('uname');
      // $userpwd = Hash::make($request -> input('userpwd',''));
      // dump($userpwd);
    	//用户名的判断
   		$userinfo = DB::table('uadmin')->where('uname',$uname)->first();
   		// dd($userinfo);
   		if(!$userinfo){
			echo "<script>alert('用户名或者密码错误111111');location.href='/admin/login';</script>";   			
   			exit;
   		}


   		// 验证密码正确
   		if (!Hash::check($request->pass, $userinfo->pass)) {
   		    echo "<script>alert('用户名或者密码错误');location.href='/admin/login';</script>";   			
      		exit;
   		}
		  // 登录成功
  		session(['admin_login'=>true]);
  		session(['admin_userinfo'=>$userinfo]);

  		//跳转
  		return redirect('admin/index');
    }
    
}