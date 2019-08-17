<?php

namespace App\Http\Controllers\home\Center\Deal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\orders;
use App\Models\shop;
use App\Models\shipping;
use App\Models\Users;
use App\Models\goods;
use DB;
use Hash;
use Illuminate\Support\Facades\Storage;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
 
        
        $item = DB::table('orders')->where([['orders.uid',16],['ord_stu','0']])->get();
        // $item = DB::table('orders')->where('status','0')->get();
        
        foreach ($item as $k => &$v) {
             $v->sub  = DB::table('item')->where('oid',$v->id)->get();
               foreach ($v->sub as $k2 => &$v2) {
                //查询sku商品数据插入
                $v2->sub  = DB::table('goods')->where('id',$v2->gid)->get();
            }
        }
        // dd( $item);
        //未付款
        $orders0 = DB::table('orders')->where([['orders.uid',16],['ord_stu','0'],['status','0']])->get();
            // dd($orders0);
            foreach ($orders0 as $k => &$v) {
             $v->sub  = DB::table('item')->where('oid',$v->id)->get();
               foreach ($v->sub as $k2 => &$v2) {
                //查询sku商品数据插入
                $v2->sub  = DB::table('goods')->where('id',$v2->gid)->get();
            }
        }
        //已发货
        $orders1 = DB::table('orders')->where([['orders.uid',16],['ord_stu','0'],['status','1']])->get();
            foreach ($orders1 as $k => &$v) {
             $v->sub  = DB::table('item')->where('oid',$v->id)->get();
               foreach ($v->sub as $k2 => &$v2) {
                //查询sku商品数据插入
                $v2->sub  = DB::table('goods')->where('id',$v2->gid)->get();
            }
        }
        //已收货
        $orders2 = DB::table('orders')->where([['orders.uid',16],['ord_stu','0'],['status','2']])->get();
            foreach ($orders2 as $k => &$v) {
             $v->sub  = DB::table('item')->where('oid',$v->id)->get();
               foreach ($v->sub as $k2 => &$v2) {
                //查询sku商品数据插入
                $v2->sub  = DB::table('goods')->where('id',$v2->gid)->get();
            }
        }
        //订单完成
        $orders4 = DB::table('orders')->where([['orders.uid',16],['ord_stu','0'],['status','4']])->get();
            foreach ($orders4 as $k => &$v) {
             $v->sub  = DB::table('item')->where('oid',$v->id)->get();
               foreach ($v->sub as $k2 => &$v2) {
                //查询sku商品数据插入
                $v2->sub  = DB::table('goods')->where('id',$v2->gid)->get();
            }
        }
        $i=0;
        if($item){
            foreach ($item as $key => $value) {
                foreach ($value->sub as $k => $v) {
                    
                        foreach ($v->sub as $y => $e) {
                            if($i==0){
                                 $count=$v->nums*$e->price;
                             }else{
                                $count+=$v->nums*$e->price;
                             }
                            // dump($v->nums);
                           $i++;
                                    // dump($e->price);
                        }
                    }
            }
        }else{
            echo $count='';
        }
        // dd($count);
        // $orders = DB::table('orders')->get();
        // dd($orders4);
        return view('home.Center.Deal.Order',['item'=>$item,'orders0'=>$orders0,'orders1'=>$orders1,'orders2'=>$orders2,'orders4'=>$orders4,'count'=>$count]);
    }

    public function orderInfo($id){
        //订单详情
        dump($id);
        $orders = DB::table('orders')
            ->leftjoin('shop', 'orders.sid', '=', 'shop.id')
            ->leftjoin('shipping', 'orders.shid', '=', 'shipping.id')
            ->leftjoin('users', 'orders.uid','=','users.id')
            ->select('orders.*', 'shop.sname', 'shipping.acode','users.uname')
            ->get()->where('id',$id);
            // dd($orders);
        $item = DB::table('orders')->where([['orders.id',$id],['ord_stu','0']])->get();
        foreach ($item as $k => &$v) {
             $v->sub  = DB::table('item')->where('oid',$v->id)->get();
               foreach ($v->sub as $k2 => &$v2) {
                //查询sku商品数据插入
                $v2->sub  = DB::table('goods')->where('id',$v2->gid)->get();
            }
        }
        $i=0;
        if($item){
            foreach ($item as $key => $value) {
                foreach ($value->sub as $k => $v) {
                    
                        foreach ($v->sub as $y => $e) {
                            if($i==0){
                                 $count=$v->nums*$e->price;
                             }else{
                                $count+=$v->nums*$e->price;
                             }
                            // dump($v->nums);
                           $i++;
                                    // dump($e->price);
                        }
                    }
            }
        }else{
            echo $count='';
        }
        // dd($item);
        return view('home.Center.Deal.Orderinfo',['orders'=>$orders,'item'=>$item,'count'=>$count]);
    }

    public function logistics(){
        // 物流跟踪
        return view('home.Center.Deal.logistics');
    }

    public function pay(){
        // 一键支付
        return view('home.Center.Deal.Pay');
    }

    public function success(){
        // 支付成功
        return view('home.Center.Deal.Success');
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
    public function Ordel($id)
    {
        // dd($id);
      $res = DB::table('orders')->find($id);
      $orders = orders::all();
          $res1 = DB::table('orders')
                ->where('id', $id)
                ->update(['ord_stu' => '1']);
        return redirect('home/Center/Deal/Order');  
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
