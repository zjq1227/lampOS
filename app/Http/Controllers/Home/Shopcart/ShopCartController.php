<?php

namespace App\Http\Controllers\Home\Shopcart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopCartController extends Controller
{
    public function index(){
        //购物车页面
        return view('home.Shopcart.Shopcart');
    }
}
