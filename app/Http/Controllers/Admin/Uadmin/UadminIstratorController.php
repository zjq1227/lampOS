<?php

namespace App\Http\Controllers\Admin\Uadmin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\ViewErrorBag;

class UadminIstratorController extends Controller
{
    public function Index(){
        return view('admin.Uadmin.Uadmin_Istrator');
    }

    public function uploadList(){
        return view('admin.Uadmin.Uadmin_Istrator_Upload');
    }
}
