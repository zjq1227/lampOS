<?php

namespace App\Http\Controllers\home\Center\Aboutmy;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\coll;
use App\Models\goods;
use DB;
use Hash;
use Illuminate\Support\Facades\Storage;
class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //收藏
        $coll= DB::table('collect')
            ->leftjoin('goods', 'collect.gid', '=', 'goods.id')
            ->select('collect.*', 'goods.goods', 'goods.price','goods.picname')
            ->where('uid',16)
            ->paginate(15);
        // dd($coll);
        return view('home.Center.Aboutmy.Collection',['coll'=>$coll]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function del($id)
    {
        // dd($id);
          $res1 = coll::destroy($id);

        return redirect('home/Center/Aboutmy/Collection');  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  

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
