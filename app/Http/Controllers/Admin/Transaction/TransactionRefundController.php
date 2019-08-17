<?php

namespace App\Http\Controllers\Admin\Transaction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionRefundController extends Controller
{
    //
    public function Index(){
        return view('admin.Transaction.Transaction_Refund');
    }

    public function addList(){
        return view('admin.Transaction.Transaction_Refund_Detailed');

    }
}
