<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\ViewErrorBag;
use App\Models\Shop;

class IndexController extends Controller
{
    public function Index(){
        return view('admin.index')->with(['count'=>count(Shop::where('audit','3')->get())]);
    }
}
