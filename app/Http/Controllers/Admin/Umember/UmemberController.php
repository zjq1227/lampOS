<?php

namespace App\Http\Controllers\Admin\Umember;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\Users_info;
use Illuminate\Support\ViewErrorBag;
use DB;
use Hash;
use Illuminate\Support\Facades\Storage;

class UmemberController extends Controller
{
    public function Index(){
        //开始从数据库拿取数据
        $users = Users::all();
        $users_info = Users_info::all();
        $count = Count($users);
        return view('admin.Umember.Umember_List',["users"=>$users,"users_info"=>$users_info])->with("count",$count)->with("num","1");
    }

    public function addUser(Request $request){
        //向users表添加数据
        //获取用户数据
        if ($request->hasFile('profile')) {
            // 获取头像
            $path = $request->file('profile')->store(date('Ymd'));

            // dd($path);
        }else{
            return back();
        }

        // 开启事务
        DB::beginTransaction();

        // 实例化模型
        $user = new Users;
        $user->uname = $request->input('uname','');
        $user->password = Hash::make($request->input('userpassword',''));
        $user->email = $request->input('email','');
        $user->pic = $request->input('phone','');
        $user->zpwd = $request->input('zpwd','');

        $res1 = $user->save();
        $Users_info = new Users_info;
        $Users_info->uid = $user->id;
        $Users_info->sex = $request->input('sex','');
        $Users_info->profile = $path;
        $res2 = $Users_info->save();
        
        if($res1 && $res2){
            DB::commit();
            return redirect('admin/Umember/U');
        }else{
            DB::rollBack();
            return back()->with('error', '添加失败');
        }
        
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



     public function userupd($id)
    {
        // dd($id);
      $res = DB::table('users')->find($id);
        $users = Users::all();
        $users_info = Users_info::all();
        $count = Count($users);
      if($res->status ==1){
          $res1 = DB::table('users')
                ->where('id', $id)
                ->update(['status' => '2']);
          // dd($res1);
        return redirect('admin/Umember/U');
       }else{
         $res2 = DB::table('users')
                ->where('id', $id)
                ->update(['status' => '1']);
          // dd($res2);
         return redirect('admin/Umember/U');
      }
 
    }


    public function update(Request $request, $id)
    {
        // dd($id);
        // 检查用户是否有文件上传
        $Users_info = new Users_info;
        $Users_info = Users_info::all();
        if(!$request->hasFile('profile')){
            $user = Users::find($id);
            $user->email = $request->input('email','');
            $user->pic = $request->input('phone','');
            $user->zpwd = $request->input('zpwd','');
            if($user->save()){
                return redirect('admin/Umember/U')->with('success','修改成功');
            }else{
                return back()->with('error','修改失败');
            }

        }else{
            // 开启事务
            DB::beginTransaction();
            
            // 接收文件上传
            $path  = $request->file('profile')->store(date('Ymd'));

            $Users_info = Users_info::where('uid',$id)->first();
            // 删除图片
            Storage::delete([$Users_info->profile]);
            
            // 给用户设置新的图片
            $Users_info->profile = $path;
            // 执行修改
            $res1 = $Users_info->save();

            // 修改用户的主信息
            $user = Users::find($id);
            $user->email = $request->input('email','');
            $user->pic = $request->input('phone','');
            $user->zpwd = $request->input('zpwd','');
            $res2 = $user->save();

            if($res1 && $res2){
                DB::commit();
                return redirect('admin/Umember/U')->with('success','修改成功');
            }else{
                DB::rollBack();
                return back()->with('error','修改失败');
            }

        }   
    }

    public function delete($id)
    {
        // dd($id);
        // 开启事务
        DB::beginTransaction();

        // 删除主用户
        $res1 = Users::destroy($id);

        // 获取用户头像
        $users_info = Users_info::where('uid',$id)->first();
        $path = $users_info->profile;

        // 删除用户详情
        $res2 = Users_info::where('uid',$id)->delete();

        // 判断
        if($res1 && $res2){
            // 删除图片
            Storage::delete([$path]);

            // 提交事务
            DB::commit();
            return redirect('admin/Umember/U')->with('success', '删除成功');
        }else{
            // 回滚事务
            DB::rollBack();
            return back()->with('error', '删除失败');
        }
        
    }


}
