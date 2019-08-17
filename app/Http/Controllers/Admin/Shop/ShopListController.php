<?php

namespace App\Http\Controllers\Admin\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cates;
use App\Models\Shop;
use Illuminate\Support\Facades\Input;

class ShopListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 店铺列表
    public function index($name)
    {
        //
        // if(session('admin_userinfo') != null){
        // 如果没有分类那就是全部
        if($name!='empty'){
            // 根据名称查出名称
            $id=Cates::where('cname',$name)->get()['0']['id'];
            // 根据id查询是否有子类
            $cates=Cates::where('path','like','%'.$id.'%')->get();
            if(!empty($cates)){
                // 遍历查询店铺
                foreach ($cates as $key => $value) {
                    $shopSearch=Shop::where('audit','!=','3')->where('cid',$cates[$key]['id'])->get();
                    if(!empty($shopSearch['0'])){
                            foreach ($shopSearch as $key => $value) {                                                                                                                                                              
                                $shop1[]=$shopSearch[$key];
                        }
                    }
                }
                // 如果有数据
                if(!empty($shop1)){
                    $shop=$shop1;
                }else{
                    $shop=[];
                };
            }else{
                $shop=[];
            }
        }else if($name=='empty'){
            $shop=Shop::where('audit','!=','3')->orderBy('created_at','desc')->get();
        }else{
            $shop=[];
        }
        if(count($shop)!='0'){
            foreach ($shop as $key => $value) {
                $shop[$key]['cname']=Cates::where('id',$shop[$key]['cid'])->get()['0']['cname'];
            }
        }
        return view('admin.Shop.Shop_List')->with(['shop'=>$shop,'num'=>1,'count'=>count($shop)]);
        // }else{
        //     echo "<script>window.location.href='../Login'; </script>";
        // }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // return $id;
        if($id){
            $shop=Shop::destroy($id);
            if($shop){
                return 1;
            }
        }
    }
}
