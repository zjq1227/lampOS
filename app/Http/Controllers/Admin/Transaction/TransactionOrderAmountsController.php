<?php

namespace App\Http\Controllers\Admin\Transaction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionOrderAmountsController extends Controller
{
    //
    public function Index(){
        return view('admin.Transaction.Transaction_Order_Amounts');
    }
}
