<?php

namespace App\Http\Controllers\Admin\Transaction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\ViewErrorBag;
use App\Models\orders;
use App\Models\shop;
use App\Models\shipping;
use App\Models\Users;
use App\Models\goods;
use DB;
use Hash;
use Illuminate\Support\Facades\Storage;
class TransactionOrderHandlingController extends Controller
{
    //
    public function Index(){
    	 // $orders = orders::all();
    	$orders = DB::table('orders')
    		->where('ord_stu','0')
            ->leftjoin('shop', 'orders.sid', '=', 'shop.id')
            ->leftjoin('shipping', 'orders.shid', '=', 'shipping.id')
            ->leftjoin('users', 'orders.uid','=','users.id')
            ->select('orders.*', 'shop.sname', 'shipping.acode','users.uname')
            ->get();
        // $orders = DB::table('orders')->get();
    	// dd($orders);
        return view('admin.Transaction.Transaction_Handling',['orders'=>$orders]);
    }
    public function Index0(){
    	$status0 = DB::table('orders')->where([['status', '0'],['ord_stu','0']])->get();
    	// dd($status0);
        return view('admin.Transaction.Transaction_Handling0',['status0'=>$status0]);
    }
    public function Index1(){
    	$status1 = DB::table('orders')->where([['status', '1'],['ord_stu','0']])->get();
    	// dd($orders);
        return view('admin.Transaction.Transaction_Handling1',['status1'=>$status1]);
    }
    public function Index2(){
    	$status2 = DB::table('orders')->where([['status', '2'],['ord_stu','0']])->get();
    	// dd($orders);
        return view('admin.Transaction.Transaction_Handling2',['status2'=>$status2]);
    }
    public function Index4(){
    	$status4 = DB::table('orders')->where([['status', '4'],['ord_stu','0']])->get();
    	// dd($orders);
        return view('admin.Transaction.Transaction_Handling4',['status4'=>$status4]);
    }

    public function addList($id){
      // dump($id);
            $item = DB::table('item')
                ->where('oid',$id)
                ->leftjoin('goods', 'item.gid', '=', 'goods.id')
                ->select('item.*', 'goods.goods' ,'goods.price','goods.state')
                ->get();
            $orders = DB::table('orders')
                ->leftjoin('shipping', 'orders.shid', '=', 'shipping.id')
                ->leftjoin('users', 'orders.uid','=','users.id')
                ->select('orders.*',  'shipping.acode','shipping.phone','users.uname','users.Email')
                ->get()->where('id', $id);
            // dd($item->all());
        // $shipping = shipping::all();
        return view('admin.Transaction.Transaction_Detailed',['item'=>$item,'orders'=>$orders]);
    }
    public function Listupd(Request $request,$id){
        // dd($id);
        $nums = $request -> input('num','');
        $res = DB::table('item')->find($id);
        $res1 = DB::table('item')
              ->where('id', $id)
              ->update(['nums' => $nums]);
        return redirect('admin/Transaction/Order_handling');
    }
    public function adress(Request $request,$id){
        // dd($id);
        $phone = $request -> input('phone','');
        $name = $request -> input('name','');
        $acode = $request -> input('acode','');
        $res = DB::table('shipping')->find($id);
        $res1 = DB::table('shipping')
              ->where('id', $id)
              ->update(['phone' => $phone]);
        $res2 = DB::table('shipping')
              ->where('id', $id)
              ->update(['acode' => $acode]);
        $res3 = DB::table('shipping')
              ->where('id', $id)
              ->update(['name' => $name]);
        return redirect('admin/Transaction/Order_handling');
    }

    public function deal(Request $request,$id){
    	// dump($id);
    	// dd($request->all());
    	$deliv = $request ->input('deliv','');
    	$delivnum = $request -> input('delivnum','');
    	$res = DB::table('orders')->find($id);
        $res1 = DB::table('orders')
              ->where('id', $id)
              ->update(['status' => '2']);
        $res2 = DB::table('orders')
              ->where('id', $id)
              ->update(['deliv' => $deliv]);
        $res3 = DB::table('orders')
              ->where('id', $id)
              ->update(['delivnum' => $delivnum]);
        return redirect('admin/Transaction/Order_handling');
    }

    public function ordstu($id){
    	// dd($id);
  	  $res = DB::table('orders')->find($id);
      $orders = orders::all();
      if($res->ord_stu == '1'){
          $res1 = DB::table('orders')
                ->where('id', $id)
                ->update(['ord_stu' => '0']);
        return redirect('admin/Transaction/Order_handling');
       }else{
         $res2 = DB::table('orders')
                ->where('id', $id)
                ->update(['ord_stu' => '1']);
          // dd($res2);
         return redirect('admin/Transaction/Orderform');
      }
    }
}
