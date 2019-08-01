<?php

namespace App\Http\Controllers\Admin\Transaction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionOrderHandlingController extends Controller
{
    //
    public function Index(){
        return view('admin.Transaction.Transaction_Handling');
    }

    public function addList(){
        return view('admin.Transaction.Transaction_Detailed');
    }
}
