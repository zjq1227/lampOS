<?php

namespace App\Http\Controllers\home\Center\Aboutmy;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\orders;
use App\Models\foot;
use App\Models\shipping;
use App\Models\Users;
use App\Models\goods;
use DB;
use Hash;
use Illuminate\Support\Facades\Storage;
class FootController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //足迹
        $foot= DB::table('footprint')
            ->leftjoin('goods', 'footprint.gid', '=', 'goods.id')
            ->select('footprint.*', 'goods.goods', 'goods.price','goods.picname')
            ->where('uid',16)
            ->paginate(15);
            // dd($foot);
        return view('home.Center.Aboutmy.Foot',['foot'=>$foot]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destory($id)
    {
          $res1 = foot::destroy($id);

        return redirect('home/Center/Aboutmy/Foot');  
    }
}
