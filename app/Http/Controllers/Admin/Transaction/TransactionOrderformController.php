<?php

namespace App\Http\Controllers\Admin\Transaction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\orders;
use Illuminate\Support\ViewErrorBag;
use DB;
use Hash;
use Illuminate\Support\Facades\Storage;
class TransactionOrderformController extends Controller
{
    //
    public function Index(){
    $orders = DB::table('orders')
            ->where('ord_stu','1')
            ->leftjoin('shop', 'orders.sid', '=', 'shop.id')
            ->leftjoin('shipping', 'orders.shid', '=', 'shipping.id')
            ->leftjoin('users', 'orders.uid','=','users.id')
            ->select('orders.*', 'shop.sname', 'shipping.acode','users.uname')
            ->get();
        return view('admin.Transaction.Transaction_Order_form',['orders'=>$orders]);
    }

    public function delete($id){
        // dd($id);
        // 开启事务
        DB::beginTransaction();

        // 删除主用户
        $res1 = orders::destroy($id);

        if($res1){
            // 提交事务
            DB::commit();
            return redirect('admin/Transaction/Orderform')->with('success', '删除成功');
        }else{
            // 回滚事务
            DB::rollBack();
            return back()->with('error', '删除失败');
        }
        
    }
}
