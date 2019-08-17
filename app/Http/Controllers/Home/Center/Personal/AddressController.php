<?php

namespace App\Http\Controllers\home\Center\Personal;
use Hash;
use Mail;
use App\Models\Users;
use App\Models\shipping;
use App\Models\Users_info;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //收货地址
        if(session('home_login')){
            $user=Users::find(session('home_userinfo')['id']);
            $shipping=shipping::orderBy('status','desc')->paginate(5);
            return view('home.Center.Personal.Address')->with(['users'=>$user,'shipping'=>$shipping]);
        }else{
            return redirect("home/Login");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        // return $request;
        if(!empty($request->input())){
            $shipping=new shipping;
            $shipping->uid = session('home_userinfo')['id'];
            $shipping->name=$request->input('name');
            $shipping->phone=$request->input('phone');
            $shipping->acode=$request->input('acode');
            if($shipping->save()){
                return 1;
            }else{
                return 2;
            }

        }
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
        //修改收货地址
        if(session('home_login')){
            $user=Users::find(session('home_userinfo')['id']);
            $shipping=shipping::find($id);
            return view('home.Center.Personal.Address_add')->with(['users'=>$user,'shipping'=>$shipping]);
        }else{
            return redirect("home/Login");
        }

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
        switch ($request->input('status')) {
            case 'status':
                if(session('home_login') && !empty($id)){
                    $shipping=shipping::where('status','1')->get();
                //    dd(json_decode($shipping,true));
                    if(!empty(json_decode($shipping,true))){
                        foreach (json_decode($shipping,true) as $key => $value) {
                        //    echo $key;
                           $shippingupdate=shipping::find(json_decode($shipping,true)[$key]['id']);
                           $shippingupdate->status=0;
                           $shippingupdate->save();
                        }
                    }
                    $shippingupdate=shipping::find($id);
                    $shippingupdate->status=1;
                    if($shippingupdate->save()){
                        return 1;
                    }else{
                        return 2;
                    };
                }
                break;
            case 'update':
                // return $id;
                if(session('home_login') && !empty($id)){
                    $shippingupdate=shipping::find($id);
                    $shippingupdate->name=$request->input('name');
                    $shippingupdate->phone=$request->input('phone');
                    $shippingupdate->acode=$request->input('acode');
                    if($shippingupdate->save()){
                        return $shippingupdate->id;
                    }else{
                        return 2;
                    };
                }
            break;
            default:
                # code...
                break;
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
        // return $id;
        $shipping= shipping::where('id',$id)->delete();
        if($shipping){
            echo 1;
        }else{
            echo 2;
        }
    }
}
