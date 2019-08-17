<?php

namespace App\Http\Controllers\Admin\Picture;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\Goods_type;

class PictureSortadsController extends Controller
{
    //
    public function Index(){
        $goods=Goods::get();
        if(!empty($goods['0'])){
            foreach ($goods as $key => $value) {
                $goods[$key]->num=count(Goods_type::where('gid',$goods[$key]->id)->get());
            }
        }
        return view('admin.Picture.Picture_Sortads')->with(['goods'=>$goods,]);
    }
    public function addList($id){
        // return $id;
        if($id){
            $goods_type=Goods_type::where('gid',$id)->orderBy('sort','asc')->get();
            $number=count(Goods_type::where('gid',$id)->get());
        }
            // dd(($goods_type));
            $num=1;
            return view('admin.Picture.Picture_Ads_List')->with(['goodsType'=>$goods_type,'id'=>$id,'num'=>$num,'number'=>$number,]);
    }

    
    // 添加功能
    public function insert(request $request,$id){
        // return $request;
        
        if($request){
            $name=Goods_type::where('gid',$id)->where('name',$request->input('name'))->where('status','!=','2')->get();
            if($request->input('status')!=2){
                if(!empty($name['0'])){
                    return 2;
                }
            }
            $goodsType=new Goods_type;
            $goodsType->gid=$id;
            $goodsType->name=$request->input('name');
            $goodsType->price=$request->input('price');
            $goodsType->original=$request->input('original');
            $goodsType->sort=$request->input('sort');
            $goodsType->status=$request->input('status');
            $goodsType->img=session('goods-img');
            if($goodsType->save()){
                return 1;
            }
        }
    }
    // 添加列表页面
    public function uploadList($id){
        return view('admin.Picture.Picture_Sortads_Add')->with('id',$id);

    }
    // 修改列表页面
    public function zuploadList($id){
        $goodsType=Goods_type::where('id',$id)->get();
        $num=1;
        // return $goodsType;
        return view('admin.Picture.Picture_Ads_List_Upload')->with(['goodsType'=>$goodsType,'id'=>$id,'num'=>$num,]);

    }
    // 修改功能
    public function update(request $request,$id){
        if($request){
            $goodsType=Goods_type::find($id);
            if(!empty($request->input('name'))){
                $goodsType->name=$request->input('name');
            }else{
                $goodsType->name='原味';
            }
            $goodsType->price=$request->input('price');
            $goodsType->original=$request->input('original');
            $goodsType->sort=$request->input('sort');
            $goodsType->status=$request->input('status');
            if($request->file('pic')){
                $goodsType->img=session('goods-img');
            };
            // dd(empty($request->input('name')));
            if($goodsType->save()){
                
                if($goodsType->name=='原味'){
                    $goods=Goods::find($goodsType->gid);
                    $goods->price=$goodsType->price;
                    $goods->original=$goodsType->original;
                    $goods->save();
                }
                return $goodsType->id;
            }
        }
    }

    // 修改状态
    public function status(request $request,$id){
        // return $id;
        if($id){
            if($request->input('status')=='del'){
                $goods_type=Goods_type::destroy($id);
                if($goods_type){
                    return 1;
                }
            }else{
                $goods=Goods_type::find($id);
                $goods->status=$request->input('status');
                if($goods->save()){
                    return 1;
                }
            }
        }
    }
}
