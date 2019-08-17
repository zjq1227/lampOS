<?php

namespace App\Http\Controllers\Home\Details;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Cates;
use App\Models\Details;
use App\Models\Goods;
use App\Models\Goods_type;
use App\Models\Shop;
use Illuminate\Support\Facades\DB;

class IntroductionController extends Controller
{
    //商品详情
    public function index($id){
        if($id){
            $goods=Details::where('gid',$id)->leftjoin('goods','goods.id','=','details.gid')->where('state','1')->select('details.*','goods.*')->get();
            if(!empty(json_decode($goods)['0'])){
                $time=substr($goods['0']->created_at,0,4);
                $goods['0']->time=$time;
                // echo substr($goods['0']->created_at,0,4);
                $goods['0']->type=Goods_type::where('gid',$goods['0']->gid)->where('status','!=','4')->where('status','!=','2')->get();
                $goods['0']->detailsimg=Goods_type::where('gid',$goods['0']->gid)->where('status','=','2')->orderBy('sort','desc')->get();
                $goods['0']->goodsimg=Goods_type::where('gid',$goods['0']->gid)->where('status','=','1')->orderBy('sort','desc')->get();
                $goods['0']->cname=Cates::where('id',$goods['0']->cid)->get()['0']['cname'];
                $goods['0']->bname=Brand::where('id',$goods['0']->bid)->get()['0']['bname'];
                $goods['0']->sname=Shop::where('id',$goods['0']->sid)->get()['0']['sname'];
            }
            
            
            // return $goods;
        }
        return view('home.Details.Introduction')->with(['goods'=>$goods,]);
    }
}
