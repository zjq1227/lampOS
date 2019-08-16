<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\ViewErrorBag;

class IndexController extends Controller
{
    public function Index(){
    	// dump($cc);
    	// dd (session('admin_userinfo'));
        if(session('admin_userinfo') == null){
        	return redirect('admin/login');
        }else{
       		return view('admin/index');
        }

    }
    public function indexout()
    {
        session()->flush('admin_userinfo');
       return redirect('admin/login');
     }
}
