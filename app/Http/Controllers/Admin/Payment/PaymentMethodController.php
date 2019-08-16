<?php

namespace App\Http\Controllers\Admin\Payment;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //查询数据
        $zf = DB::table('payfunction')->get();
        return view('admin.Payment.Payment_Method',['pay'=>$zf]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //接受添加数据
        // 检查文件上传
        if(!$request->hasFile('zfpic')){
            $request->session()->flash('error_msg','文件不存在');
            return back();
        }
        $img = $request->file('zfpic');
        // 获取后缀名
        $ext = $img->extension();
        // 新文件名
        $saveName =time().rand().".".$ext;
        // 使用 store 存储文件
        $path = $img->store(date('Ymd'));
        $name = $request ->input('name');
        $content = $request ->input('content');
        $status = $request->input('status');
        $created_at = date('YmdHis',time());
        $updated_at = date('YmdHis',time());
        $arr=['name'=>$name,'content'=>$content,'zfpic'=>$path,'status'=>$status,'created_at'=>$created_at,'updated_at'=>$updated_at];
        // dd($arr);
        $add = DB::table('payfunction')->insert($arr);
        if($add){
            // DB::commit();
            return redirect('admin/Payment/Method')->with('success', '添加成功');
        }else{
            // DB::rollBack();
            return back()->with('error', '添加失败');
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
    public function update(Request $request)
    {
        //接受数据进行修改
        $id=$request->id;
        $status=$request->status;
        
        $update = DB::update("update payfunction set status=? where id=?",[$status,$id]);
        if($update){
            echo 1;
        }else{
            echo 0;
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
