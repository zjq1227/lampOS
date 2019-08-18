<?php

namespace App\Http\Controllers\home\Center\Assets;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\goods;
use App\Models\orders;
use App\Models\item;
use DB;
use Hash;
use Illuminate\Support\Facades\Storage;
class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //账单明细
        $dec = DB::table('item')
                ->leftjoin('goods', 'item.gid', '=', 'goods.id')
                ->leftjoin('orders', 'item.oid', '=', 'orders.id')
                ->select('item.*', 'goods.goods' ,'goods.price','orders.status','orders.uid','goods.picname')
                ->where([['uid',16],['status','4']])
                ->get();
                // dd($dec);
             $nums= DB::table('orders')->where('uid',16)->sum('total');
                // dd($nums);
        return view('home.Center.Assets.Bill',['dec'=>$dec,'nums'=>$nums]);
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
    }
}
