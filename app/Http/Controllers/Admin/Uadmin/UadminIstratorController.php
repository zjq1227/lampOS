<?php

namespace App\Http\Controllers\Admin\Uadmin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\ViewErrorBag;
use DB;
use Hash;
class UadminIstratorController extends Controller
{
    public function index()
    {
        // dd(123);
        $users = DB::table('user')->Paginate(10);
        // dd($users);
      
        return view('admin.Uadmin.Uadmin_Istrator',['users'=>$users]);
    }

     public function Index0()
    {
         $auth0 = DB::table('user')->where('auth', 0)->get();
         return view('admin.Uadmin.Uadmin_Istrator0',['auth0'=>$auth0]);
    }

    public function Index1()
    {
         $auth1 = DB::table('user')->where('auth', 1)->get();
         return view('admin.Uadmin.Uadmin_Istrator1',['auth1'=>$auth1]);
    }
    public function Index2()
    {
         $auth2 = DB::table('user')->where('auth', 2)->get();
         return view('admin.Uadmin.Uadmin_Istrator2',['auth2'=>$auth2]);
    }

    public function uploadList(){
        return view('admin.Uadmin.Uadmin_Istrator_Upload');
    }

    public function useradd(Request $request)
    {
    	// dump($request->all());
    	$username = $request ->input('username','');
    	$userpwd = Hash::make($request -> input('userpassword',''));
    	// $userpwd2 = Hash::make($request -> input('userpwd2',''));
    	$sex = $request -> input('sex','');
    	$auth = $request -> input('auth','');
    	$email = $request -> input('email','');
    	$tel = intval($request -> input('user-tel',''));
    	// dump($sex);
    	$arr=['username'=>$username,'userpwd'=>$userpwd,'sex'=>$sex,'auth'=>$auth,'email'=>$email,'tel'=>$tel];
    	// dd($arr);
		DB::table('user')->insert($arr);
		return redirect('admin/Uadmin/UadminIstrator');
    }

    public function userdel($id)
    {
        // dd(123);
        //开启事务
      DB::beginTransaction();
      $res = DB::table('user')->where('id',$id)->delete();

      if($res){
        DB::commit();
        return redirect('admin/Uadmin/UadminIstrator')->with('success','删除成功');
      }else{
        DB::rollBack();
        return back()->with('error','删除失败');
      }
      
    }
}
