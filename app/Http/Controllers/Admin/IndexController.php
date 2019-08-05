<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\ViewErrorBag;

class IndexController extends Controller
{
    public function Index(){
    	// dd (session('admin_userinfo'));
        return view('admin.index');
    }
}
