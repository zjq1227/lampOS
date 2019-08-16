<?php

namespace App\Http\Controllers\Admin\Picture;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PictureSortadsController extends Controller
{
    
    public function Index(){
        return view('admin.Picture.Picture_Sortads');
    }
    public function addList(){
        return view('admin.Picture.Picture_Ads_List');

    }
    public function uploadList(){
        return view('admin.Picture.Picture_Ads_List_Upload');

    }
    public function zuploadList(){
        return view('admin.Picture.Picture_Sortads_Upload');

    }
}
