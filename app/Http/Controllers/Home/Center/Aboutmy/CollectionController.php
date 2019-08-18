<?php

namespace App\Http\Controllers\home\Center\Aboutmy;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Collect;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //收藏
        return view('home.Center.Aboutmy.Collection');
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
                if($request->input('status')!='array'){
                    $collectSelect=Collect::where('gid',$request->input('gid'))->where('uid',session('home_userinfo')['id'])->get();
                    if(empty(json_decode($collectSelect)['0'])){
                        $collect=new Collect;
                        $collect->uid=session('home_userinfo')['id'];
                        $collect->gid=$request->input('gid');
                        if($collect->save()){
                            $cart=Cart::destroy($request->input('id'));
                            if($cart){
                                return 1;
                            }
                        };
                    };
                }else{
                    // return 1;
                    for ($i=0; $i < count($request->input('items')); $i++) { 
                        $gid=Cart::find($request->input('items')[$i])->gid;
                        // echo $gid;
                        $collectSelect=Collect::where('gid',$gid)->where('uid',session('home_userinfo')['id'])->get();
                        if(empty(json_decode($collectSelect)['0'])){
                            $collect=new Collect;
                            $collect->uid=session('home_userinfo')['id'];
                            $collect->gid=$gid;
                        };
                                $cart=Cart::destroy($request->input('items')[$i]);
                    }
                    if($cart){
                        return 1;
                    }
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
