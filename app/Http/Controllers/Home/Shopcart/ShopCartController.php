<?php

namespace App\Http\Controllers\Home\Shopcart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Goods;
use App\Models\Goods_type;
use App\Models\Shop;
use Illuminate\Support\Facades\DB;

class ShopCartController extends Controller
{
    public function index(){
        //购物车页面
        if(session('home_login')){
        return view('home.Shopcart.Shopcart');
    }else{
        return redirect("home/Login"); 
    }
    }
    public function create(request $request,$id){
       
    }
    
    public function show($id){
        // return $id;
        if(session('home_login')){
            $cart = DB::table('cart')
            ->where('uid',$id)
            ->leftjoin('goods', 'goods.id', '=', 'Cart.gid')
            ->select('Cart.*','goods.*','Cart.id')
            ->orderBy('Cart.sid','asc')
            ->get();
            // dd($cart);
            foreach ($cart as $key => $value) {
                $cart[$key]->type=Goods_type::where('gid',$cart[$key]->gid)->where('status','1')->get();
                $cart[$key]->tprice=Goods_type::where('id',$cart[$key]->tid)->get()['0']['price'];
                $cart[$key]->tname=Goods_type::where('id',$cart[$key]->tid)->get()['0']['name'];
            }
            // dd($cart);
            return view('home.Shopcart.Shopcart')->with(['cart'=>$cart,]);
        }else{
            return redirect("home/Login"); 
        }
    }

    public function add(request $request,$id){
        // return $request;
        if(session('home_login')){
            if($request->input('status')=='addshopcart'){
            //    查询购物车是否已用该商品
                $cartSelect=Cart::where('uid',session('home_userinfo')['id'])->where('tid',$request->input('tid'))->where('gid',$id)->where('sid',$request->input('sid'))->get();
                // dd (!empty(json_decode($cartSelect,true)['0']));
                if(!empty(json_decode($cartSelect,true)['0'])){
                    $cart=Cart::find($cartSelect['0']->id);
                    $cart->cnum=$cartSelect['0']->cnum+$request->input('num');
                    if($cart->save()){
                        return 1;
                    }
                }else{
               
                    // 添加
                    $cart=new Cart;
                    $cart->uid=session('home_userinfo')['id'];
                    $cart->cnum=$request->input('num');
                    $cart->tid=$request->input('tid');
                    $cart->sid=$request->input('sid');                
                    $cart->gid=$id;
                    $cart->cprice=Goods_type::find($request->input('tid'))->get()['0']->price;
                    // return $cart;
                    if($cart->save()){
                        return 1;
                    }
                }
            }else if($request->input('status')=='clickadd'){
                //    查询购物车是否已用该商品
                $goods_type=Goods_type::where('name','原味')->where('gid',$id)->get();
                if(!empty(json_decode($goods_type,true)['0'])){
                    $cartSelect=Cart::where('uid',session('home_userinfo')['id'])->where('tid',$goods_type['0']->id)->where('gid',$id)->where('sid',$request->input('sid'))->get();
                    if(!empty(json_decode($cartSelect,true)['0'])){
                        $cart=Cart::find($cartSelect['0']->id);
                        $cart->cnum=$cartSelect['0']->cnum+$request->input('num');
                        if($cart->save()){
                            return 1;
                        }
                    }else{
                        // 添加
                        $cart=new Cart;
                        $cart->uid=session('home_userinfo')['id'];
                        $cart->cnum=$request->input('num');
                        $cart->sid=$request->input('sid');                        
                        $cart->tid=$goods_type['0']->id;
                        $cart->gid=$id;                
                        $cart->cprice=Goods_type::find($goods_type['0']->id)->get()['0']->price;
                        // return $cart;
                        if($cart->save()){
                            return 1;
                        }

                    }
                }
            }
        }
    }
    

    public function update(request $request,$id){
        // return $request;
        $cart=Cart::find($id);
        // return $cart;
        $tprice=Goods_type::where('id',$cart->tid)->get()['0']['price'];
        // $cart
        $cart->cnum=$request->input('num');
        if($cart->save()){
            $cart->tprice=$tprice*$cart->cnum;
            $cart->price=Goods_type::where('id',$cart->tid)->get()['0']['price'];
            return $cart;
        }
    }
    public function store(){

    }

    public function edit(){

    }
    public function destroy($id){
        // return $id;
        if($id){
            $cart=Cart::destroy($id);
            if($cart){
                return 1;
            }
        }
    }
}
