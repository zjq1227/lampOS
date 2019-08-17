<?php

namespace App\Http\Controllers\Home\Details;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    //搜索详情
    public function index(Request $request){
    
        $sousuo = $request->input('keyword');
        // dd($sousuo);SearchSearch


        return view('home.Details.Search');
    }
}
