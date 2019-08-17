<?php

namespace App\Http\Controllers\Home;
use App\Models\Users;
use App\Models\Users_info;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cates;
use App\Models\Goods;
use App\Models\Shop;
// use PHPUnit\Framework\Constraint\Count;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    //登陆状态和未登录状态
    $cates=Cates::where('status','1')->where('pid','0')->orderBy('path','asc')->get();
                // return $cates;
                $i=0;
                if(!empty(json_decode($cates)[0])){
                    foreach ($cates as $key => $value) {
                        // 一级商品
                        $cates[$key]->goods1=Goods::where('cid',$cates[$key]->id)->where('state','1')->orderBy('num','desc')->take(8)->get();
                        // 二级id
                        $cates[$key]->level2=Cates::where('pid',$cates[$key]->id)->get();
                        // 二级数量
                        $cates[$key]->count=count((json_decode(Cates::where('pid',$cates[$key]->id)->get())));
                        // 三级遍历
                        foreach ($cates[$key]->level2 as $k => $v) {
                            //    二级商品
                            $v->goods2=Goods::where('cid',$v->id)->where('state','1')->orderBy('num','desc')->take(6)->get();
                            // 三级分类
                           $v->level3=Cates::where('pid',$v->id)->get();
                        //    三级数量
                           $v->level3->count=Count((json_decode(Cates::where('pid',$v->id)->get())));
                           foreach ($v->level3 as $k3 => $v3) {
                                //    三级商品
                                $v3->goods3=Goods::where('cid',$v3->id)->where('state','1')->orderBy('num','desc')->take(6)->get();
                           }
                        }
                        $cates['0']['type']='fu';
                    }
                    // echo $cates;
                    // echo $cates['0']->goods1;
                }
        if(session('home_login')){
            $user=Users::find(session('home_userinfo')['id']);
            $userinfo=Users_info::where('uid',$user['id'])->get();
            $userinfo=json_decode($userinfo,true)[0];
                $user['uid'] = $userinfo['uid'];
                $user['profile'] = $userinfo['profile'];
                $user['sex'] = $userinfo['sex'];
                $user['jf'] = $userinfo['jf'];
                $user['browse'] = $userinfo['browse'];
                $user['buy'] = $userinfo['buy'];
            return view('home.Index')->with(['users'=>$user,'cates'=>$cates,'gcates'=>$cates,]);
        }else{
            return view('home.Index')->with(['cates'=>$cates,'gcates'=>$cates,]);;
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
        // return $id;
        if($id){
            $goods=Goods::where('cid',$id)->orderBy('num','desc')->take(6)->get();
            return $goods;
        }

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
