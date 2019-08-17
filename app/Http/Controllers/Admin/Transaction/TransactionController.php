<?php

namespace App\Http\Controllers\Admin\Transaction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\orders;
use Illuminate\Support\ViewErrorBag;
use DB;
use Hash;
use Illuminate\Support\Facades\Storage;
class TransactionController extends Controller
{
    //
    public function Index(){
    	$orders4 = DB::table('orders')->where('status','4')->count();
    	$orders5 = DB::table('orders')->where('status','5')->count();
    	$orders0 = DB::table('orders')->count();
    	$orders = DB::table('orders')->where('status','4')->get();
    	if($orders){
	    	$i=0;
	    	foreach ($orders as $key => $value) {
	    		if($i==0){
	                    $counts=$value->total;
	               }else{
	                   $counts+=$value->total;
	                     }            // dump($v->nums);
	               $i++;                // dump($e->price);
	            }
	        }else{
	        	$counts='';
	    }
	    // dump($orders0);
	    // dump($orders4);
	    // dump($orders5);
	    // dd($counts);
	 
                   
        return view('admin.Transaction.Transaction',['counts'=>$counts,'orders0'=>$orders0,'orders4'=>$orders4,'orders5'=>$orders5]);
    }
}
