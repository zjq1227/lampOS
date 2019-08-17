<?php

namespace App\Http\Controllers\Home\ShopAudit;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Users;
use App\Models\Users_info;
use App\Http\Controllers\Controller;
use function GuzzleHttp\json_decode;
use Illuminate\Support\Facades\Input;
use function GuzzleHttp\json_encode;
use Illuminate\Support\Facades\Storage;
use App\Models\Cates;

class ShopAuditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //店铺
        if(session('home_login')){
            $users=Users::find(session('home_userinfo')['id']);
            $users_info=Users_info::where('uid',session('home_userinfo')['id'])->get();
            $shop=Shop::where('uid',session('home_userinfo')['id'])->get();
            $cates=Cates::orderBy('path','asc')->get();
            // return $cates;
            // 如果分类为空
            if(count($cates)=='0'){
                $cates['0']=array('cname'=>null,'pid'=>null,'path'=>null,'status'=>null,'id'=>null,'created_at'=>null,'level'=>null,'type'=>'fu',);
                // return $cates;
            }
            // 如果店铺不为空
            if(!empty(json_decode($shop,true)[0])){
                $shop=json_decode($shop,true)[0];
                if($shop['cid']!='0' && $shop['audit']!='2'){
                    $cates=Cates::find($shop['cid']);
                    $shop['cid']=$cates['cname'];
                }elseif($shop['cid']==null){
                    $cates['0']=array('cname'=>null,'pid'=>null,'path'=>null,'status'=>null,'id'=>null,'created_at'=>null,'level'=>null,'type'=>'fu',);
                }
            }else{
                $shop=array('sname'=>null,'img'=>null,'cid'=>null,'type'=>null,'audit'=>null,'phone'=>null,'email'=>null,'idcard'=>null,'created_at'=>null,'intro'=>null,'reason'=>null,);
            }
            $users_info=json_decode($users_info,true)[0];

            return view('home.ShopAudit.ShopAudit')->with(['users'=>$users,'usersinfo'=>$users_info,'shop'=>$shop,'cates'=>$cates]);
        }else{
            return redirect("home/Login"); 
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //提交店铺审核
        if(session('home_login')){
            if(Input::get('id')=="null"){
                $shopshow=Shop::where('uid',session('home_userinfo')['id'])->get();
                // return session('shop-img');
                // 确认没有店铺
                if(empty(json_decode($shopshow,true)[0])){
                    $shop=new Shop;
                    $shop->cid=Input::get('cid');
                    $shop->uid=session('home_userinfo')['id'];
                    $shop->img=session('shop-img');
                    $shop->sname=Input::get('sname');
                    $shop->type=Input::get('type');
                    $shop->intro=Input::get('intro');
                    $shop->phone=intval(Input::get('phone'));
                    $shop->email=Input::get('email');
                    $shop->idcard=Input::get('idcard');
                    $shop->audit='3';
                    if($shop->save()){
                        return 1;
                    }
                }
            }else{
                $shop=Shop::find(Input::get('id'));
                $shop->cid=Input::get('cid');
                $shop->uid=session('home_userinfo')['id'];
                if(!empty(session('shop-img'))){
                    $shop->img=session('shop-img');
                }
                $shop->sname=Input::get('sname');
                $shop->type=Input::get('type');
                $shop->intro=Input::get('intro');
                $shop->phone=intval(Input::get('phone'));
                $shop->email=Input::get('email');
                $shop->idcard=Input::get('idcard');
                $shop->audit='3';
                if($shop->save()){
                    return 1;
                }
            }
        }else{
            return redirect("home/Login"); 
        }

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
        if(!$request->hasFile('pic')){
            $request->session()->flash('error_msg','文件不存在');
            return back();
        }
        $img = $request->file('pic');
        // return $img;
        // 获取后缀名
        $ext = $img->extension();
        // 新文件名
        $saveName =time().rand().".".$ext;
        // 使用 store 存储文件
        $path = $img->store(date('Ymd'));
        if(!empty($path)){
            session(['shop-img'=>$path]);
            return $path;
        }else{
            
        }
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
    }
}
