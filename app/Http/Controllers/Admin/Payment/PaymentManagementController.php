<?php

namespace App\Http\Controllers\Admin\Payment;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //进行查询数据
        $count = DB::table('account')->count();
        $zf = DB::table('account')
        ->leftjoin('users', 'account.uid', '=', 'users.id')
        ->select('account.*', 'users.uname')
        ->get();
        return view('admin.Payment.Payment_Management',['account'=>$zf],['counts'=>$count]);
    }

    public function addList($id)
    {
        $uid = $_GET['uid'];
        $zf = DB::table('account_ads')
        ->where('aid',$id)
        ->leftjoin('account', 'account.id', '=', 'account_ads.aid')
        ->leftjoin('payfunction', 'payfunction.id', '=', 'account_ads.czfun')
        ->select('account_ads.*', 'account.kttime','account.uid','account.zhstatus','payfunction.name')
        ->get();
        $zhmessage = DB::table('account')
        ->where('uid',$uid)
        ->leftjoin('users', 'account.uid', '=', 'users.id')
        ->select('account.uyuer', 'users.uname','users.created_at')
        ->get();
        $xf = DB::table('account_xf')
        ->where('aid',$id)
        ->leftjoin('orders', 'orders.id', '=', 'account_xf.did')
        // ->leftjoin('payfunction', 'payfunction.id', '=', 'account_ads.czfun')
        ->select('account_xf.*', 'orders.code','orders.total')
        ->get();
        // dd($xf);
        return view('admin.Payment.Payment_Details',['czlist'=>$zf],['zhxinxi'=>$zhmessage])->with('xfjl',$xf);

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
    public function update(Request $request)
    {
        //接受数据进行修改
        $id=$request->id;
        $zhstatus=$request->zhstatus;
        
        $update = DB::update("update account set zhstatus=? where id=?",[$zhstatus,$id]);
        if($update){
            echo 1;
        }else{
            echo 0;
        }
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
