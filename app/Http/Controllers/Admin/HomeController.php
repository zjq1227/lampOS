<?php

namespace App\Http\Controllers\Admin;
use App\Models\orders;
use App\Models\item;
use App\Models\Users;
use App\Models\goods;
use DB;
use Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    
    public function index()
    {
    	$users = Users::all()->count();
        $item = item::all()->sum('nums');
        $orders = orders::all()->count();
        $money = orders::all()->sum('total');
        $stu1= orders::all()->where('status','1')->count();
        $stu2= orders::all()->where('status','2')->count();
        $stu4= orders::all()->where('status','4')->count();
        $stu0= orders::all()->where('status','0')->count();
        $stu5= orders::all()->where('status','5')->count();
        // dd($stu1);
        return view('admin.home',['users'=>$users,'money'=>$money,'item'=>$item,'orders'=>$orders,'stu0'=>$stu0,'stu1'=>$stu1,'stu2'=>$stu2,'stu4'=>$stu4,'stu5'=>$stu5]);
    }
}
