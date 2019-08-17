<?php

namespace App\Http\Controllers\Home\Center\Personal;
use App\Models\Users;
use App\Models\Users_info;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(session('home_login')){
            $user=Users::find(session('home_userinfo')['id']);
            $userinfo=Users_info::where('uid',$user['id'])->get();
            $userinfo=json_decode($userinfo,true)[0];
            $user['uid'] = $userinfo['id'];
            $user['profile'] = $userinfo['profile'];
            $user['sex'] = $userinfo['sex'];
            $user['jf'] = $userinfo['jf'];
            $user['browse'] = $userinfo['browse'];
            $user['buy'] = $userinfo['buy'];
            if(!empty($user)){
                return view('home.Center.Personal.Information')->with('users',$user);
            };
        }else{
            return redirect("home/Login");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $usersinfo=Users_info::find($id);
        return view('home.Center.Personal.Information_Img')->with('usersinfo',$usersinfo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //个人信息修改
        if(!empty($request->uname)){
            // 修改用户表
            $user=users::find($id);
            $user->uname=$request->uname;
            $user->phone=$request->phone;
            $user->email=$request->email;
            // 修改用户信息表
            $userinfo=users_info::where('uid',$id)->get();
            $userinfo=json_decode($userinfo,true)[0];
            $userinfo=users_info::find($userinfo['id']);
            $userinfo->sex=$request->radio10;
            if($user->save() && $userinfo->save()){
                $user['uid'] = $userinfo['id'];
                $user['profile'] = $userinfo['profile'];
                $user['sex'] = $userinfo['sex'];
                $user['jf'] = $userinfo['jf'];
                $user['browse'] = $userinfo['browse'];
                $user['buy'] = $userinfo['buy'];
               return view('home.Center.Personal.Information')->with('users',$user);
            } 
        }else{
            if(!$request->hasFile('pic')){
                $request->session()->flash('error_msg','文件不存在');
                return back();
            }
            $img = $request->file('pic');
            // return $img;
            // 获取后缀名
            $ext = $img->extension();
            // 新文件名
            $saveName =time().rand().".".$ext;
            // 使用 store 存储文件
            $path = $img->store(date('Ymd'));
            $userinfo = users_info::find($id);
            // return $userinfo;
            $userinfo->profile=$path;
            // $usersinfo->updated_at=date('Y-m-d h:i:s',time());
            if($userinfo->save()){
                $userinfo=json_decode($userinfo,true);
                $user=Users::find($userinfo['uid']);
                $user['uid'] = $userinfo['id'];
                $user['profile'] = $path;
                $user['sex'] = $userinfo['sex'];
                $user['jf'] = $userinfo['jf'];
                $user['browse'] = $userinfo['browse'];
                $user['buy'] = $userinfo['buy'];
               return view('home.Center.Personal.Information')->with('users',$user);
            };
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
