<?php

namespace App\Http\Controllers\Admin\Umember;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\ViewErrorBag;
use App\Models\Users;
use App\Models\Users_info;
use DB;
use Hash;
use Illuminate\Support\Facades\Storage;


class UmemberGradeController extends Controller
{
    public function Index(){
    	$users = Users::all();
        $users_info = Users_info::all();
        $jfdj1 = DB::table('users_info')->where([['jf', '>=', 0],['jf', '<=', 500]])->count();
        $jfdj2 = DB::table('users_info')->where([['jf', '>=', 500],['jf', '<=', 1000]])->count();
        $jfdj3 = DB::table('users_info')->where([['jf', '>=', 1000],['jf', '<=', 1500]])->count();
        $jfdj4 = DB::table('users_info')->where([['jf', '>=', 1500],['jf', '<=', 2000]])->count();
        $jfdj5 = DB::table('users_info')->where([['jf', '>=', 2000],['jf', '<=', 2500]])->count();
        $jfdj6 = DB::table('users_info')->where([['jf', '>=', 2500],['jf', '<=', 3000]])->count();
        $jfdj7 = DB::table('users_info')->where([['jf', '>=', 3000],['jf', '<=', 3500]])->count();
        $jfdj8 = DB::table('users_info')->where([['jf', '>=', 3500],['jf', '<=', 4000]])->count();
        $jfdj9 = DB::table('users_info')->where([['jf', '>=', 4000],['jf', '<=', 4500]])->count();
		// dd($jfdj);
        $count = Count($users);
        $arr=[$jfdj1,$jfdj2,$jfdj3,$jfdj4,$jfdj5,$jfdj6,$jfdj7,$jfdj8,$jfdj9];
        return view('admin.Umember.Umember_Grading',["users"=>$users,"users_info"=>$users_info,"arr"=>$arr])->with("count",$count)->with("num","1");
    }

    public function addList(){
        // return view('admin.Product.Picture_add');
    }
}
