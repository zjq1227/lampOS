<?php

namespace App\Http\Controllers\home\Center\Personal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SafetyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //安全设置
        return view('home.Center.Personal.Safety');
    }

    public function Password(){
        // 登陆密码修改
        return view('home.Center.Personal.Password');        
    }

    public function Setpay(){
        // 支付密码修改
        return view('home.Center.Personal.Setpay');        
    }

    public function BindPhone(){
        // 手机验证换棒
        return view('home.Center.Personal.Bindphone');        
        
    }

    public function Email(){
        // 邮箱验证换绑
        return view('home.Center.Personal.Email');
    }

    public function Idcard(){
        // 实名认证
        return view('home.Center.Personal.Idcard');
    }

    public function Question( ){
        // 安全问题认证
        return view('home.Center.Personal.Question');
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
