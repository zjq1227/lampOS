<?php

namespace App\Http\Controllers\Admin\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Cates;
use App\Models\Details;
use App\Models\Goods;
use App\Models\Goods_type;
use App\Models\Shop;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ViewErrorBag;

class ProductController extends Controller
{
    // 产品类表
    public function Index($name){
        // if(session('admin_userinfo') != null){
            if($name=='empty'){
                $goods=Goods::get();
                // return $goods;
                if($goods){
                    foreach ($goods as $key => $value) {
                        $goods[$key]['company']=Details::where('gid',$goods[$key]->id)->get()['0']->company;
                    }
                }
            }else{
                $id=Cates::where('cname',$name)->get()['0']['id'];
                $cates=Cates::where('path','like','%'.'0,'.$id.'%')->get();
                if(!empty(json_decode($cates)[0])){
                    foreach ($cates as $key => $value) {
                        $goodSearch=Goods::where('cid',$cates[$key]['id'])->where('state','1')->get();
                        if(!empty($goodSearch['0'])){
                                foreach ($goodSearch as $key => $value) {                                                                                                                                                              
                                    $good1[]=$goodSearch[$key];
                            }
                        }
                        
                    }
                    // 如果有数据
                    if(!empty($good1)){
                        $goods=$good1;
                    }else{
                        $goods=[];
                    };
                  
                }
            }
            return view('admin.Product.Products_List')->with(['goods'=>$goods,'num'=>count($goods),]);
         // }else{
        //     echo "<script>window.location.href='../Login'; </script>";
        // }
         
    }
    // 添加商品页面
    public function addList(){
         // if(session('admin_userinfo') != null){
        // 店铺
        $shop = Shop::where('audit','!=','1')->get();
        if($shop){
            
        }else{
            $shop=array('sname'=>null,'img'=>null,'cid'=>null,'type'=>null,'audit'=>null,'phone'=>null,'email'=>null,'idcard'=>null,'created_at'=>null,'intro'=>null,'reason'=>null,);
        }
        // 分类
        $cates=Cates::orderBy('path','asc')->get();
        if(!empty(json_decode($cates)[0])){
            foreach ($cates as $key => $value) {
                $cates[$key]['count']=count(Shop::where('cid',$cates[$key]['id'])->get());
                $cates[$key]['level']=substr_count($cates[$key]['path'],',');
                $cates['0']['type']='zi';
            }
        }else{
            $cates['0']=array('cname'=>null,'pid'=>null,'path'=>null,'status'=>null,'id'=>null,'created_at'=>null,'level'=>null,'type'=>'fu',);
        }
        // 品牌
        $brand=Brand::where('status','1')->get();
        return view('admin.Product.Picture_add')->with(['cates'=>$cates,'shop'=>$shop,'brand'=>$brand]);
         // }else{
        //     echo "<script>window.location.href='../Login'; </script>";
        // }
    }
    // 修改商品
    public function uploadList($id){
          // if(session('admin_userinfo') != null){
            $goods = DB::table('details')
            ->where('gid',$id)
            ->leftjoin('goods', 'details.gid', '=', 'goods.id')
            ->select('goods.*', 'details.*')
            ->get();
        // 店铺
        $shop = Shop::where('audit','!=','1')->get();
        if($shop){
            
        }else{
            $shop=array('sname'=>null,'img'=>null,'cid'=>null,'type'=>null,'audit'=>null,'phone'=>null,'email'=>null,'idcard'=>null,'created_at'=>null,'intro'=>null,'reason'=>null,);
        }
        // 分类
        $cates=Cates::orderBy('path','asc')->get();
        if(!empty(json_decode($cates)[0])){
            foreach ($cates as $key => $value) {
                $cates[$key]['count']=count(Shop::where('cid',$cates[$key]['id'])->get());
                $cates[$key]['level']=substr_count($cates[$key]['path'],',');
                $cates['0']['type']='zi';
            }
        }else{
            $cates['0']=array('cname'=>null,'pid'=>null,'path'=>null,'status'=>null,'id'=>null,'created_at'=>null,'level'=>null,'type'=>'fu',);
        }
        // 品牌
        $brand=Brand::where('status','1')->get();
        return view('admin.Product.Products_Upload')->with(['cates'=>$cates,'shop'=>$shop,'brand'=>$brand,'goods'=>$goods[0],]);
         // }else{
        //     echo "<script>window.location.href='../Login'; </script>";
        // }
        }

    public function data(){
        
    }
    // 添加商品功能
    public function create(request $request){
        //    添加商品
        if($request){
            $goods=new Goods;
            $goods->bid=$request->input('bid');$goods->cid=$request->input('cid');$goods->sid=$request->input('sid');$goods->gnum=$request->input('sid').$request->input('gum');$goods->unit=$request->input('unit');$goods->price=$request->input('price');$goods->goods=$request->input('goods');$goods->store=$request->input('store');$goods->picname=session('goods-img');$goods->weight=intval($request->input('detail-weight')); $goods->antishop=$request->input('antishop');$goods->original=$request->input('original');$goods->price=$request->input('price');
            if($goods->save()){
                $goods_type=new Goods_type;
                $goods_type->gid=$goods->id;$goods_type->name='原味';$goods_type->img=session('goods-img');$goods_type->original=$request->input('original');$goods_type->price=$request->input('price');$goods_type->sort='1';$goods_type->status='1';
                $detail=new Details;
                $detail->gid=$goods->id;$detail->photoname=session('goods-img');$detail->descr=$request->input('detail-descr');$detail->weight=$request->input('detail-weight');$detail->company=$request->input('detail-company');$detail->specification=$request->input('detail-specification');
                if($detail->save() && $goods_type->save()){
                    return 1;
                }
            }
        }
    }
    // 修改功能
    public function update(request $request,$id){
        // return $id;
        if($id){
            $goods=Goods::find($id);
            // 如果修改了图片
            if($request->file('pic')){
                $goods->picname=session('goods-img');
            };
            $goods->bid=$request->input('bid');$goods->cid=$request->input('cid');$goods->sid=$request->input('sid');$goods->gnum=$request->input('sid').$request->input('gum');$goods->unit=$request->input('unit');$goods->price=$request->input('price');$goods->goods=$request->input('goods');$goods->store=$request->input('store');$goods->weight=$request->input('detail-weight');$goods->antishop=$request->input('antishop');$goods->original=$request->input('original');$goods->price=$request->input('price');
            $a=$goods->save();
            if($a){
                // 修改成功后
                // 修改详情表
                $tid=Goods_type::where('name','原味')->where('gid',$goods->id)->where('status','1')->get()['0']->id;
                $gid=Details::where('gid',$goods->id)->get()['0']->id;
                $detail=Details::find($gid);
                $detail->gid=$goods->id;$detail->photoname=$goods->picname;$detail->descr=$request->input('detail-descr');$detail->weight=$request->input('detail-weight');$detail->company=$request->input('detail-company');$detail->specification=$request->input('detail-specification');
                $goods_type=goods_type::find($tid);
                $goods_type->price=$goods->price;
                $goods_type->original=$goods->original;
                $b=$detail->save();
                $c=$goods_type->save();
                if($b && $c){
                    return 1;
                }
            };
        }
    }

    // 修改状态
    public function state(request $request,$id){
        // return $id;
        if($id){
            $goods=Goods::find($id);
            $goods->state=$request->input('status');
            if($goods->save()){
                return 1;
            }
        }
    }

    // 添加图片功能
    public function img(request $request){
        // 添加图片
        if(!empty($request->file('pic')['0'])){
            foreach ($request->file('pic') as $key => $value) {
                $img = $request->file('pic')[$key];
                // return $img;
                // 获取后缀名
                $ext = $img->extension();
                // 新文件名
                $saveName =time().rand().".".$ext;
                // 使用 store 存储文件
                $path[$key] = $img->store(date('Ymd'));
            }
            if(!empty($path)){
                foreach ($path as $key => $value) {
                    if($key==0){
                        $img=$path[$key];
                    }else{
                        $img=$img.'/'.$path[$key];
                    }
                }
                if(!empty($img)){
                 session(['goods-img'=>$img]);
                }
                return $path;
            }
        }
    }
}
