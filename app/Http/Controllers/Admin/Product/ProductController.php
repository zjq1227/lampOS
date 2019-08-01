<?php

namespace App\Http\Controllers\Admin\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\ViewErrorBag;

class ProductController extends Controller
{
    public function Index(){
        return view('admin.Product.Products_List');
    }

    public function addList(){
        return view('admin.Product.Picture_add');
    }
    public function uploadList(){
        return view('admin.Product.Products_Upload');
    }
}
