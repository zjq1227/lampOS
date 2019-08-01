<?php

namespace App\Http\Controllers\Admin\Uadmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\ViewErrorBag;

class UadminCompetenceController extends Controller
{
    public function Index(){
        return view('admin.Uadmin.Uadmin_Competence');
    }

    public function addList(){
        return view('admin.Uadmin.Competence');
    }

    public function uploadList(){
        return view('admin.Uadmin.Competence_Upload');
    }
}
