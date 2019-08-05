<?php

namespace App\Http\Controllers\Admin\Umember;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Support\ViewErrorBag;
use DB;
use Hash;


class UmemberController extends Controller
{
    public function Index(){
        //开始从数据库拿取数据
        $users = Users::all();
        $count = Count($users);
        return view('admin.Umember.Umember_List',["users"=>$users])->with("count",$count)->with("num","1");
    }

    public function addUser(Request $request){
        //向users表添加数据
        //获取用户数据
        $Uname = $request->Uname;
        $Password = Hash::make($request ->Password);
        $Email = $request->Email;
        $Sex = $request->Sex;
        $Phone = $request->Phone;
        $Adress = $request->Adress;
        $Status = $request->Status;
        // dump($Status);
        // die();
         $Addtime = date('YmdHis',time());
        // return $Password;
        //开始添加
        //  $bool=DB::insert("insert into users(Uname,Psaaword,Sex,Email,Phone,Adress,Status,Addtime) 
            //  values(?,?,?,?,?,?,?,?)",[5,'小明','出行',670]);
        $arr=['Uname'=>$Uname,'Password'=>$Password,'Email'=>$Email,'Sex'=>$Sex,'Phone'=>$Phone,'Adress'=>$Adress,'Status'=>$Status,'Addtime'=>$Addtime];
        $add=DB::table('users')->insert($arr);
        if($add == true)
        {
            return view('admin.Umember.Umember_List');
        }
        else
        {
            return false;
        };
        
        

    }
    public function quanxian(Request $request){
        $id=$request->id;
        $Status=$request->Status;
       $update = DB::update("update users set Status=? where id=?",[$Status,$id]);
        // $delete1 = DB::table('replays')->where('Pid',$request->id)->delete();
       // echo $request;
        if($update){
            echo 1;
        }else{
            echo 0;
        }
    }
}
