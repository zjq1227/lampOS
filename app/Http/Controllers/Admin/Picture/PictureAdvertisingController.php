<?php

namespace App\Http\Controllers\Admin\Picture;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PictureAdvertisingController extends Controller
{
    //
    public function Index(){
        return view('admin.Picture.Picture_Advertising');
    }

    public function uploadList(){
        return view('admin.Picture.Picture_Upload');
    }
}
