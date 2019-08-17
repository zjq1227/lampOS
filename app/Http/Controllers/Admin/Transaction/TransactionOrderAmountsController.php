<?php

namespace App\Http\Controllers\Admin\Transaction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\orders;
use Illuminate\Support\ViewErrorBag;
use DB;
use Hash;
use Illuminate\Support\Facades\Storage;
class TransactionOrderAmountsController extends Controller
{
    //
    public function Index(){

    	$orders = DB::table('orders')->where('status','4')->get();
    	//起始时间
	    $five = strtotime(date("Y-m-d",time())." 00:00:00");
	    //终止时间
	    $seven = strtotime(date("Y-m-d",time())." 19:00:00"); 
    	if($orders){
	    	$i=0;
	    	foreach ($orders as $key => $value) {
	    		if($i==0){
	                    $counts=$value->total;;
	               }else{
	                   $counts+=$value->total;;
	                     }            // dump($v->nums);
	               $i++;                // dump($e->price);
	            }
	            $cdi =DB::table('orders')->where('status','4')->count();
	        }else{
	        	$counts='';
	        	$cdi='';
	    }

            // dd($cdi);
    	// dump($counts);
        return view('admin.Transaction.Transaction_Order_Amounts',['orders'=>$orders,'counts'=>$counts,'cdi'=>$cdi]);
    }


}
