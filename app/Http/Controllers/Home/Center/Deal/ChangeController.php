<?php

namespace App\Http\Controllers\home\Center\Deal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\orders;
use DB;
use Hash;
use Illuminate\Support\Facades\Storage;
class ChangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //退款售后
       $item = DB::table('orders')->where([['orders.uid',16],['ord_stu','2']])->get();
        // $item = DB::table('orders')->where('status','0')->get();
        
        foreach ($item as $k => &$v) {
             $v->sub  = DB::table('item')->where('oid',$v->id)->get();
               foreach ($v->sub as $k2 => &$v2) {
                //查询sku商品数据插入
                $v2->sub  = DB::table('goods')->where('id',$v2->gid)->get();
            }
        }

        
    // dd($count);
        return view('home.Center.Deal.Change',['item'=>$item]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        // dd($id);
        $item = DB::table('orders')->where([['orders.uid',16],['ord_stu','2']])->get();
        // $item = DB::table('orders')->where('status','0')->get();
        
        foreach ($item as $k => &$v) {
             $v->sub  = DB::table('item')->where('oid',$v->id)->get();
               foreach ($v->sub as $k2 => &$v2) {
                //查询sku商品数据插入
                $v2->sub  = DB::table('goods')->where('id',$v2->gid)->get();
            }
        }
        //钱款去向
        return view('home.Center.Deal.Record',['item'=>$item]);
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
        // dd($id);
        $res = DB::table('orders')->find($id);
         $orders = orders::all();
          $res1 = DB::table('orders')
                ->where('id', $id)
                ->update(['ord_stu' => '2']);
          $res2 = DB::table('orders')
                ->where('id', $id)
                ->update(['status' => '5']);
        return redirect('home/Center/Deal/Change'); 
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
