<?php

namespace App\Http\Controllers\Admin\Umember;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\ViewErrorBag;

class UmemberGradeController extends Controller
{
    public function Index(){
        return view('admin.Umember.Umember_Grading');
    }

    public function addList(){
        // return view('admin.Product.Picture_add');
    }
}
