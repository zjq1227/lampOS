<?php

namespace App\Http\Controllers\Admin\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\ViewErrorBag;
use App\Models\Cates;
use App\Models\Goods;
use App\Models\Shop;
use Illuminate\Support\Facades\Input;
use function GuzzleHttp\json_encode;
class ProductCategoryController extends Controller
{
    
    public function Index(){
        // 分类主页
        // if(session('admin_userinfo') != null){
            if(Input::get('status')=='all'){
                $cates=Cates::where('status','1')->orderBy('path','asc')->get();
                // return $cates;
                if(!empty(json_decode($cates)[0])){
                    foreach ($cates as $key => $value) {
                        $cates[$key]['count']=count(Shop::where('cid',$cates[$key]['id'])->get());
                        $cates[$key]['gcount']=count(Goods::where('cid',$cates[$key]['id'])->get());
                        $cates[$key]['level']=substr_count($cates[$key]['path'],',');
                        $cates[$key]['id']=$cates[$key]['id'];
                        $cates[$key]['pId']=$cates[$key]['pid'];
                        $cates[$key]['name']=$cates[$key]['cname'];
                        $cates['0']['type']='fu';
                    }
                    return $cates;  
                }
            }else{
                return view('admin.Product.Category_Manage');
            }
        // }else{
        //     echo "<script>window.location.href='../Login'; </script>";
        // }
    }

    public function addList($name){
        // 父类
        // if(session('admin_userinfo') != null){
        if($name=='empty'){
            // $cates=Cates::orderBy('path','asc')->get();
            $cates['0']=array('cname'=>null,'pid'=>null,'path'=>null,'status'=>null,'id'=>null,'created_at'=>null,'level'=>null,'type'=>'fu',);
            return view('admin.Product.Category_add')->with('cates',$cates);
        // 所有子类
        }else if($name=='all'){
            $cate=Cates::where('cname',$name)->get();
            $cates=Cates::where('status','1')->orderBy('path','asc')->get();
            if(!empty(json_decode($cates)[0])){
                foreach ($cates as $key => $value) {
                    $cates[$key]['count']=count(Shop::where('cid',$cates[$key]['id'])->get());
                    $cates[$key]['level']=substr_count($cates[$key]['path'],',');
                    $cates[$key]['id']=$cates[$key]['id'];
                    $cates[$key]['pId']=$cates[$key]['pid'];
                    $cates[$key]['name']=$cates[$key]['cname'];
                    $cates['0']['type']='zi';
                }
            }else{
                $cates['0']=array('cname'=>null,'pid'=>null,'path'=>null,'status'=>null,'id'=>null,'created_at'=>null,'level'=>null,'type'=>'fu',);
            }
            return view('admin.Product.Category_add')->with('cates',$cates);
        // 当前父类的子类
        }else{
            $cate=Cates::where('cname',$name)->get();
            $cates=Cates::where('path','like','%'.'0,'.$cate['0']->id.'%')->orderBy('path','asc')->get();
            if(!empty(json_decode($cates)[0])){
                foreach ($cates as $key => $value) {
                    $cates[$key]['count']=count(Shop::where('cid',$cates[$key]['id'])->get());
                    $cates[$key]['level']=substr_count($cates[$key]['path'],',');
                    $cates[$key]['id']=$cates[$key]['id'];
                    $cates[$key]['pId']=$cates[$key]['pid'];
                    $cates[$key]['name']=$cates[$key]['cname'];
                    $cates['0']['type']='zi';
                }
            }else{
                $cates['0']=array('cname'=>null,'pid'=>null,'path'=>null,'status'=>null,'id'=>null,'created_at'=>null,'level'=>null,'type'=>'fu',);
            }
            return view('admin.Product.Category_add')->with('cates',$cates);
        }
        // }else{
        //     echo "<script>window.location.href='../Login'; </script>";
        // }
    }

    public function insert(request $request){
        // return $request->input('product-category-name');
        $cates=new Cates;
        if(empty($request->input('id'))){
            $catesfind=cates::where('cname',$request->input('product-category-name'))->get();
            if(!empty(json_decode($catesfind)[0])){
                return 3;
            }
            $cates->cname=$request->input('product-category-name');
            $cates->pid=0;
            $cates->path='0,';
            $cates->status='1';
            if($cates->save()){
                $catesupdate=Cates::find($cates->id);
                $catesupdate->path=$cates->path.$cates->id;
                $catesupdate->save();
                return 1;
            }
        }else{
            $catesSelect=Cates::find($request->input('id'));
            $catesfind=cates::where('cname',$request->input('product-category-add-name'))->get();
            if(!empty(json_decode($catesfind)[0])){
                return 3;
            }
            if(!empty($catesSelect)){
                $cates->cname=$request->input('product-category-add-name');
                $cates->pid=$request->input('id');
                $cates->path=$catesSelect['path'];
                $cates->status='1';
                if($cates->save()){
                    $catesupdate=Cates::find($cates->id);
                    $catesupdate->path=$cates->path.','.$cates->id;
                    $catesupdate->save();
                    return 1;
                }
            }
        }
    }
    public function del(request $request){
        // return $request;
            if(!empty($request->input('level'))){
                if($request->input('level')!=''){
                    $cates=Cates::where('pid',$request->input('id'))->orderBy('path','asc')->get();
                   if(!empty($cates['0'])){
                       return 2;
                   }else{
                       Cates::destroy($request->input('id'));
                       return 1;
                   }
                }
            }
    }
}
