<?php

namespace App\Http\Controllers\Admin\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\orders;
use Illuminate\Support\ViewErrorBag;
use DB;
use Hash;
use Illuminate\Support\Facades\Storage;
class TransactionRefundController extends Controller
{
    //
    public function Index(){
    	$orders = DB::table('item')
            ->leftjoin('orders', 'item.oid', '=', 'orders.id')
            ->leftjoin('goods', 'item.gid', '=', 'goods.id')
            ->select('item.*', 'orders.ord_stu', 'orders.outdor','orders.code','goods.goods','goods.price')
            ->get()->where('ord_stu','2');
            // dd($orders);
        return view('admin.Transaction.Transaction_Refund',['orders'=>$orders]);
    }

    public function dres($id){
    	// dd($id);
      $res = DB::table('orders')->find($id);
      $orders = orders::all();               
       
      if($res->outdor == '0'){
          $res1 = DB::table('orders')
                 ->where('id', $id)
                ->update(['outdor' => '1']);
        return redirect('admin/Transaction/Refund');
       }elseif($res->outdor == '1'){
         $res2 = DB::table('orders')
                ->where('id', $id)
                ->update(['outdor' => '2']);
          // dd($res2);
          return redirect('admin/Transaction/Refund');
      }
     }
    public function addList(){
        return view('admin.Transaction.Transaction_Refund_Detailed');

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
            return redirect('admin/Transaction/Refund')->with('success', '删除成功');
        }else{
            // 回滚事务
            DB::rollBack();
            return back()->with('error', '删除失败');
        }
        
    }
}
