<?php

namespace App\Http\Controllers\Admin\Picture;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PictureAdvertisingController extends Controller
{
    
    public function Index(){
        //拿到type表值显示
        $configs = DB::table('advertising_type')->where('status',"1")->get();
        $count = DB::table('advertising_type')->where('status',"1")->count();
        $num = 1;
         //拿到图片列表
         $content = DB::table('advertising')->get();
         $counter = DB::table('advertising')->count();
        // dd($configs);
         //数据处理
         foreach($content as $v){
            // dump($v);
            $type = DB::table('advertising_type')->where('id',$v->type)->get();
            // dump($type);
            $v->tname = $type[0]->tname;
            // dump($v);
        }
        return view('admin.Picture.Picture_Advertising', ['configer' => $configs],['contents' => $content])->with('num',$num)->with('counts',$count)->with('countt',$counter);
    }

    public function upload(Request $request)
    {
        //获取修改数据
        // dd($request->astatus);
        $id=$request->id;
        $astatus=$request->astatus;
        $update = DB::update("update advertising set astatus=? where id=?",[$astatus,$id]);
       // echo $request;
        if($update){
            echo 1;
        }else{
            echo 0;
        }
    }
    public function listupload(Request $request)
    {
        //获取修改数据
        // dd($request->astatus);
        $id=$request->id;
        $status=$request->status;
        $update = DB::update("update advertising_type set status=? where id=?",[$status,$id]);
       // echo $request;
        if($update){
            echo 1;
        }else{
            echo 0;
        }
    }
    public function typeadd(Request $request){
       
        $tname =  $request->input('tname');
        $status =  $request->input('status','');
        $content =  $request->input('content','');
        $created_at = date('YmdHis',time());
        $updated_at = date('YmdHis',time());
        $arr=['tname'=>$tname,'content'=>$content,'status'=>$status,'created_at'=>$created_at,'updated_at'=>$updated_at];
        // dd($arr);
        $add = DB::table('advertising_type')->insert($arr);
        if($add){
            // DB::commit();
            return back()->with('success', '添加成功');
        }else{
            // DB::rollBack();
            return back()->with('error', '添加失败');
        }
    }
    public function picadd(Request $request){
        // return view('admin.Picture.Picture_Upload');
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
        // 使用 store 存储文件
        $path = $img->store(date('Ymd'));
        $desc =  $request->input('desc');
        $link =  $request->input('link','');
        $type =  $request->input('type','');
        $astatus =  $request->input('astatus','');
        $created_at = date('YmdHis',time());
        $updated_at = date('YmdHis',time());
        $arr=['desc'=>$desc,'pic'=>$path,'link'=>$link,'type'=>$type,'astatus'=>$astatus,'created_at'=>$created_at,'updated_at'=>$updated_at];
        // dd($arr);
        $add = DB::table('advertising')->insert($arr);
        if($add){
            // DB::commit();
            return back()->with('success', '添加文章成功');
        }else{
            // DB::rollBack();
            return back()->with('error', '添加文章失败');
        }
    }
}
