<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //后台首页
    Public function index()
    {
    	//显示后台模板
    	return view('admin.index.index');
    }
}
