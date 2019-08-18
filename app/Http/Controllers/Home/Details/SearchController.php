<?php

namespace App\Http\Controllers\Home\Details;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\orders;
use App\Models\shop;
use App\Models\shipping;
use App\Models\Users;
use App\Models\goods;
use DB;
use Hash;
use Illuminate\Support\Facades\Storage;
class SearchController extends Controller
{
    //搜索详情
    public function index(Request $request){
    	// dd($request->all());
    	$sysc = $request->sysc;
    	// dd($sysc);
    	$goods = DB::table('goods')
    	        
                ->where('goods','like', '%'.$sysc.'%',)
                ->paginate(12);
        $pp = DB::table('brand')->get();
        // dd($goods);
        return view('home.Details.Search',['pp'=>$pp,'goods'=>$goods,'name'=>null,]);
    }
    public function  brand($name){
    	// dd($brand['沙琪玛']);
    	$pp = DB::table('brand')->get();
    	$goods = DB::table('brand')
                ->where('bname','like', '%'.$name.'%',)
                ->leftjoin('goods','brand.id','=','goods.bid')
                ->select('brand.*','goods.goods','goods.price','goods.num')
                ->paginate(12);

        return view('home.Details.Search',['pp'=>$pp,'goods'=>$goods,'name'=>$name,]);
    }
}
