<?php

namespace App\Http\Controllers\Admin\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cates;
use App\Models\Shop;
use App\Models\Users_info;
use App\Models\Users;

class ShopAuditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // if(session('admin_userinfo') != null){
            $shop = Shop::where('audit','3')->orderBy('created_at','desc')->get();
            if(count($shop)!='0'){
                foreach ($shop as $key => $value) {
                    $shop[$key]['cname']=Cates::find($shop[$key]['cid'])['cname'];
                    
                }
            }
            // return $shop;
            return view('admin.Shop.Shop_Audit')->with(['shop'=>$shop,'count'=>count($shop)]);
        // }else{
            // echo "<script>window.location.href='../Login'; </script>";
        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        // if(session('admin_userinfo') != null){
            $shop = Shop::where('id',$id)->get();
            foreach ($shop as $key => $value) {
                $shop[$key]['cname']=Cates::find($shop[$key]['cid'])['cname'];
                $shop[$key]['uPhone']=Users::find($shop[$key]['uid'])['phone'];
                $shop[$key]['name']=json_decode(Users_info::where('uid',$shop[$key]['uid'])->get(),true)['0']['name'];
            }
            $shop=json_decode($shop,true)['0'];
            return view('admin.Shop.Shop_Audit_detail')->with('shop',$shop);
         // }else{
            // echo "<script>window.location.href='../Login'; </script>";
        // }
    }


    public function edit($id)
    {
        //
        // return $id;
        if(!empty($id)){
            $shop=Shop::find($id);
            $shop->audit='1';
            if($shop->save()){  
                echo "<script>window.location.href='../Audit_detail/".$id."'; </script>";
            }
        }
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
    public function destroy(request $request,$id)
    {
        //
        if(!empty($id)){
            $shop=Shop::find($id);
            $shop->reason=$request->input('reason');
            $shop->audit='2';
            if($shop->save()){  
                return $id;
            }
        }
    }
}
