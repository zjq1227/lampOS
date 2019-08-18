<?php

namespace App\Http\Controllers\home\Center\Deal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Account_xf;
use App\Models\Cart;
use App\Models\Goods;
use App\Models\Goods_type;
use App\Models\Item;
use App\Models\Orders;
use App\Models\Shipping;
use App\Models\Users;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //订单管理
        return view('home.Center.Deal.Order');
    }

    public function orderInfo(){
        //订单详情
        return view('home.Center.Deal.Orderinfo');
    }

    public function logistics(){
        // 物流跟踪
        return view('home.Center.Deal.logistics');
    }

    public function pay(request $request){
        // dd($request->post('items'));
        if(!empty($request->post('items')['0'])){
        // 商品
        $total=0;
        foreach ($request->post('items') as $key => $value) {
            // 选中的购物车商品
            $cart[$key]=Cart::find($request->post('items')[$key]);
            // 商品类型
            $goods_type[$key]=Goods_type::find($cart[$key]->tid)->get();
            // 商品
            $goods[$key]=Goods::find($cart[$key]->gid)->get();
            $cart[$key]->img=Goods_type::find($cart[$key]->tid)->get()['0']['img'];// 类型名称
            $cart[$key]->tname=Goods_type::find($cart[$key]->tid)->get()['0']['name'];// 类型名称
            $cart[$key]->price=Goods_type::find($cart[$key]->tid)->get()['0']['price'];// 类型价格
            $cart[$key]->goods=Goods::find($cart[$key]->gid)->get()['0']['goods']; //商品名称
            $cart[$key]->numprice=Goods_type::find($cart[$key]->tid)->get()['0']['price']*$cart[$key]->cnum;// 类型价格
            $total+=Goods_type::find($cart[$key]->tid)->get()['0']['price']*$cart[$key]->cnum;    
        }
        // 支付方式
        $payfunction=DB::table('payfunction')->get();
        $account=DB::table('account')->where('uid',session('home_userinfo')['id'])->get()['0'];
        // 收货地址
        $user=Users::find(session('home_userinfo')['id']);
        $shipping=Shipping::where('uid',session('home_userinfo')['id'])->orderBy('status','desc')->get();
        // dd($cart);
        // 一键支付
        return view('home.Center.Deal.Pay')->with(['cart'=>$cart,'total'=>$total,'payfunction'=>$payfunction,'account'=>$account,'shipping'=>$shipping,'users'=>$user,'id'=>json_encode($request->input('items')),]);
        }
    }

    public function success(){
        if(!empty(Input::get('status'))){
        // 支付成功
        if(!empty(Input::get('status'))){
            
                $total=0;
                foreach (Input::get('id') as $key => $value) {
                    // 选中的购物车商品
                    $cart[$key]=Cart::find(Input::get('id')[$key]);
                    // 商品类型
                    $goods_type[$key]=Goods_type::find($cart[$key]->tid)->get();
                    // 商品
                    $goods[$key]=Goods::find($cart[$key]->gid)->get();
                    $cart[$key]->numprice=Goods_type::find($cart[$key]->tid)->get()['0']['price']*$cart[$key]->cnum;// 类型价格
                    $total+=Goods_type::find($cart[$key]->tid)->get()['0']['price']*$cart[$key]->cnum;    
                }
                if(Input::get('zhifu')=='我的账户'){
                    $aid=Account::where('uid',session('home_userinfo')['id'])->where('zhstatus','1')->get()['0']['id'];
                    if(!empty(json_encode($aid)['0'])){
                    $account=Account::find($aid);
                        if($account->uyuer >= $total){
                            $account->uyuer=$account->uyuer-$total;
                            $account->save();
                        }else{
                            return 2;
                        }
                    }else{
                        return 2;
                    }
                }
                $phone=Shipping::find(Input::get('shid'))->id;
                // return Input::get('id');
                // 订单
                $orders=new Orders;
                $orders->shid=Input::get('shid');
                $orders->uid=session('home_userinfo')['id'];
                $orders->phone=$phone;
                if(Input::get('status')=='zhifu'){
                    $orders->status='0';
                }else{
                    $orders->status='4';
                }
                $orders->total=$total;
                $orders->code=session('home_userinfo')['id'].rand(50,100);
                // 如果订单添加成功
                if($orders->save()){
                    // 添加订单详情
                    foreach (Input::get('id') as $key => $value) {
                        $item=New Item;
                        $item->oid=$orders->id;
                        $item->tid=$cart[$key]->tid;
                        $item->gid=$cart[$key]->gid;
                        $item->num=$cart[$key]->cnum;
                        // 如果订单详情添加成功
                        if($item->save()){
                            $goods=Goods::find($item->gid);
                            $goods->store=($goods->store)-($item->num);
                        }
                    }
                    $aid=Account::where('uid',session('home_userinfo')['id'])->where('zhstatus','1')->get()['0']['id'];
                    // 如果支付了
                    if(Input::get('status')=='zhifu'){
                        $xf=new Account_xf;
                        $xf->did=$orders->id;
                        $xf->aid=$aid;
                        $xf->xfvalue=$total;
                        $xf->xffun=Input::get('zhifu');
                        $xf->save();
                    }
                    if($item->save() && $goods->save()){
                        foreach (Input::get('id') as $key => $value) {
                            $cart=Cart::destroy($cart[$key]->id);
                            if($cart){
                                return $orders->id;
                            }
                        }
                        // return $orders->id;
                    }
                
            }
            // return view('home.Center.Deal.Success');
        }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function addsuccess($id){
        // return  $id;
        $orders=Orders::find($id);
        $orders->name=Shipping::find($orders->shid)->name;
        $orders->phone=Shipping::find($orders->shid)->phone;
        $orders->acode=Shipping::find($orders->shid)->acode;
        // return $orders;
        return view('home.Center.Deal.Success')->with(['order'=>$orders,]);
        // 
     }
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
    }
}
