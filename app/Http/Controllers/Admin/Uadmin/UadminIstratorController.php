<?php

namespace App\Http\Controllers\Admin\Uadmin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\ViewErrorBag;
use App\Http\Requests\AdminsStore;
use DB;
use Hash;
use Illuminate\Support\Facades\Storage;
class UadminIstratorController extends Controller
{
    public function index()
    {
        // dd(123);
        $users = DB::table('uadmin')->Paginate(10);
        // dd($users);
      
        return view('admin.Uadmin.Uadmin_Istrator',['users'=>$users]);
    }

     public function Index0()
    {
         $auth0 = DB::table('uadmin')->where('auth', 0)->get();
         return view('admin.Uadmin.Uadmin_Istrator0',['auth0'=>$auth0]);
    }

    public function Index1()
    {
         $auth1 = DB::table('uadmin')->where('auth', 1)->get();
         return view('admin.Uadmin.Uadmin_Istrator1',['auth1'=>$auth1]);
    }
    public function Index2()
    {
         $auth2 = DB::table('uadmin')->where('auth', 2)->get();
         return view('admin.Uadmin.Uadmin_Istrator2',['auth2'=>$auth2]);
    }

    public function authupd(){

    }

    public function uploadList($id){
      // dd($id);
        $admin = DB::table('uadmin')->find($id);
        // dump($admin);
        return view('admin.Uadmin.Uadmin_Istrator_Upload',['admin'=>$admin]);
    }

    public function useradd(Request $request)
    {
    	// dd($request->all());
    	$uname = $request ->input('uname','');
    	$pass = Hash::make($request -> input('pass',''));
    	// $pass2 = Hash::make($request -> input('pass2',''));
    	$sex = $request -> input('sex','');
    	$auth = $request -> input('auth','');
    	$email = $request -> input('email','');
    	$phone = intval($request -> input('phone',''));
    	// dump($sex);
    	$arr=['uname'=>$uname,'pass'=>$pass,'sex'=>$sex,'auth'=>$auth,'email'=>$email,'phone'=>$phone];
    	// dd($arr);
		  DB::table('uadmin')->insert($arr);
		  return redirect('admin/Uadmin/UadminIstrator');
    }

    public function userdel($id)
    {
        // dd(123);
        //开启事务
      DB::beginTransaction();
      $res = DB::table('uadmin')->where('id',$id)->delete();

      if($res){
        DB::commit();
        return redirect('admin/Uadmin/UadminIstrator')->with('success','删除成功');
      }else{
        DB::rollBack();
        return back()->with('error','删除失败');
      }
      
    }

    public function userupd($id)
    {
      $res = DB::table('uadmin')->find($id);

      if($res->status ==1){
          $res1 = DB::table('uadmin')
                ->where('id', $id)
                ->update(['status' => '0']);
          // dd($res1);
          return redirect('admin/Uadmin/UadminIstrator');
       }else{
         $res2 = DB::table('uadmin')
                ->where('id', $id)
                ->update(['status' => '1']);
          // dd($res2);
           return redirect('admin/Uadmin/UadminIstrator');
      }
 
    }

    public function userupdate(AdminsStore $request,$id)
    {
      // dump($id);
      $admin = DB::table('uadmin')->find($id);
      // dd($request->all());
            $email= $request->input('email','');
            $phone= $request->input('phone','');
            $sex= $request->input('sex','');
            $res1 = DB::table('uadmin')
                  ->where('id', $id)
                  ->update(['email' => $email,'sex'=>$sex,'phone'=>$phone]);               
            if($res1){
                return redirect('admin/Uadmin/UadminIstrator')->with('success','修改成功');
            }else{
                return back()->with('error','修改失败');
            }

    }
}
