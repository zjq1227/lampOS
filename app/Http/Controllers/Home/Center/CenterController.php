<?php

namespace App\Http\Controllers\Home\Center;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\goods;
use App\Models\orders;
use DB;
use Hash;
use Illuminate\Support\Facades\Storage;
class CenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds1=DB::table('item')
            ->leftjoin('goods','item.gid','=','goods.id')
            ->leftjoin('orders','item.oid','=','orders.id')
            ->select('item.*','orders.deliv','orders.status','goods.picname','orders.uid','orders.delivnum','orders.created_at')
            ->where([['uid',16],['status','2']])->get();
            $coll= DB::table('collect')
            ->leftjoin('goods', 'collect.gid', '=', 'goods.id')
            ->select('collect.*', 'goods.goods', 'goods.price','goods.picname')
            ->where('uid',16)
            ->paginate(15);
        return view('home.Center.Center',['ds1'=>$ds1,'coll'=>$coll]);
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
