<?php

namespace App\Http\Controllers\Home\Details;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    //搜索详情
    public function index(){
        return view('home.Details.Search');
    }
}
