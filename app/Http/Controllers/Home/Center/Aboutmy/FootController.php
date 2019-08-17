<?php

namespace App\Http\Controllers\home\Center\Aboutmy;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Footprint;
use App\Models\Goods;

class FootController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //足迹
        return view('home.Center.Aboutmy.Foot');
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
        if(session('home_login')){
                if($request){
                    $footSelect=Footprint::where('gid',$request->input('gid'))->where('uid',session('home_userinfo')['id'])->get();
                    if(empty(json_decode($footSelect)['0'])){
                        $foot=new Footprint;
                        $foot->uid=session('home_userinfo')['id'];
                        $foot->gid=$request->input('gid');
                        $foot->save();
                    }
                    $goods=Goods::find($request->input('gid'));
                    $goods->clicknum=$goods->clikcknum+1;
                    $goods->save();
                }
        }else{
            return redirect("home/Login"); 
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
