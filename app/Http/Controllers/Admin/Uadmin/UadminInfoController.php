<?php

namespace App\Http\Controllers\Admin\Uadmin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UadminInfoController extends Controller
{
    //
    public function Index(){
        return view('admin.Uadmin.Uadmin_Info');
    }
}
