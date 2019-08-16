<?php

namespace App\Http\Controllers\Admin\Uadmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\ViewErrorBag;
use App\Http\Requests\AdminsStore;
use DB;
use Hash;
use Illuminate\Support\Facades\Storage;

class UadminCompetenceController extends Controller
{
    public function Index(){
    	$admin = DB::table('uadmin')->Paginate(10);
    	// dd($admin);
        return view('admin.Uadmin.Uadmin_Competence',['admin'=>$admin]);
    }


    public function uploadList($id){
    	$admin = DB::table('uadmin')->find($id);
        // dump($admin);
        // dd($id);
        return view('admin.Uadmin.Competence_Upload',['admin'=>$admin]);
    }

     public function update(Request $request,$id)
    {
      // dump($id);
      $admin = DB::table('uadmin')->find($id);
      // dd($request->all());
            $auth = $request->input('auth','');
            // dd($auth);
            $res1 = DB::table('uadmin')
                  ->where('id', $id)
                  ->update(['auth'=> $auth]);               
            if($res1){
                return redirect('admin/Uadmin/UadminCompetence');
            }else{
                return back()->with('error','修改失败');
            }

    }
}
