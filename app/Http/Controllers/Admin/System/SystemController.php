<?php

namespace App\Http\Controllers\Admin\System;
use DB;
use  App\Models\config;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //查询数据进行更改
        $configs = DB::table('config')->get();
        // return view('user.i', ['users' => $users]);
        return view('admin.System.System', ['configer' => $configs]);
        // return view('admin.System.System');
    }

    /**
     * Show the form for creating a new resource.
     *
     * 
     */
    public function create(Request $request){
       // 检查文件上传
         if(!$request->hasFile('pic')){
            $request->session()->flash('error_msg','文件不存在');
            return back();
        }
        $img = $request->file('pic');
        // 获取后缀名
        $ext = $img->extension();
        // 新文件名
        $saveName =time().rand().".".$ext;
        // 存储文件 已经不使用 move 这种方式
        // $img->move('./uploads/'.date('Ymd'),$saveName);
        // 使用 store 存储文件
        $path = $img->store(date('Ymd'));
        // dump($path);die;
        // $a = new config;
        $id = $request->input('id');
        $name = $request->input('name');
        $keyword = $request->input('keyword');
        $miaoshu = $request->input('miaoshu');
        $banquan = $request->input('banquan');
        $beian =    $request->input('beian');
        // 修改信息
        $config = Config::find($id);
        // dd($nodes);
        $config->name = $name;
        $config->keyword = $keyword;
        $config->miaoshu = $miaoshu;
        $config->banquan = $banquan;
        $config->beian = $beian;
        $config->pic = $path;
        // dd($nodes->aname);
        $update = $config->save();

        if($update){
            // DB::commit();
            return redirect('admin/System/Section')->with('success', '修改成功');
        }else{
            // DB::rollBack();
            return back()->with('error', '修改失败');
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
