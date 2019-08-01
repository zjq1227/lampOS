<?php

namespace App\Http\Controllers\Admin\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\ViewErrorBag;

class ProductBrandController extends Controller
{
    public function Index(){
        return view('admin.Product.Brand_Manage');
    }

    public function addList(){
        return view('admin.Product.Brand_add');
    }

    public function uploadList(){
        return view('admin.Product.Brand_upload');
    }
}
