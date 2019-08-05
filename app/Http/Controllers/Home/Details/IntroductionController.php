<?php

namespace App\Http\Controllers\Home\Details;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IntroductionController extends Controller
{
    //商品详情
    public function index(){
        return view('home.Details.Introduction');
    }
}
