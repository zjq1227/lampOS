<?php

namespace App\Http\Controllers\Admin\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\ViewErrorBag;

class ProductCategoryController extends Controller
{
    public function Index(){
        return view('admin.Product.Category_Manage');
    }

    public function addList(){
        return view('admin.Product.Category_add');
    }
}
