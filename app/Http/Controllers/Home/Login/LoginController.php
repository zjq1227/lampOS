<?php

namespace App\Http\Controllers\Home\Login;
use Models\Users;
use Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('home.Login.Login');
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
        // return $request->input('uname','');
        //前台接的值
            $name=$request->input('uname','');
            $user= DB::table('users')->where('uname','=',"$name")->orwhere('email','=' ,"$name")->orwhere('phone','=',"$name")->get();
            if(!empty(json_decode($user,true)[0])){
                $user=json_decode($user,true)[0];
                $uid = $user['id'];
                $userinfo= DB::table('users_info')->where('uid','=',"$uid")->get();
                if(!empty(json_decode($userinfo,true)[0])){
                    $userinfo=json_decode($userinfo,true)[0];
                    $user['uid'] = $userinfo['uid'];
                    if(!Hash::check($request->input('password',''),$user['password'])){
                        echo 1;
                    }else{
                        session(['home_login'=>true]);
                        session(['home_userinfo'=>$user]);
                        echo 2;
                    };
                }else{
                    echo 1;
                }
            }else{
                echo 1;
            }
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
        // return $id;
        if($id=='tuichu'){
            session(['home_login'=>false]);
            session()->forget('home_userinfo');
            echo 1;
        }
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
        //
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
