<?php

namespace App\Http\Controllers\Admin\Article;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Href;
use Illuminate\Support\ViewErrorBag;
use DB;
use Hash;
use Illuminate\Support\Facades\Storage;
class ArticlePencontroller extends Controller
{
     public function Index(){
        //开始从数据库拿取数据
        $href = Href::all();
        return view('admin.Article.Pen_list',['href'=>$href]);
    }

    public function addlink(Request $request){
    		// dd($request);
    	DB::beginTransaction();
        // 实例化模型
        $href= new Href;
        $href->inter = $request->input('inter','');
        $href->link =$request->input('link','');
        // dd($request->input('link',''));
        $res1 = $href->save();
        // dd($res1);
        if($res1){
            DB::commit();
            return redirect('admin/Article/Sort_pen');
        }else{
            DB::rollBack();
            return back()->with('error', '添加失败');
        }
        
    }

    public function upd(Request $request, $id)
    {
    	// dd($id);
    	$Href = new Href;
        $Href = Href::all();
        $Href = Href::find($id);
        $Href->inter = $request->input('inter','');
        $Href->link= $request->input('link','');
        if($Href->save()){
                return redirect('admin/Article/Sort_pen')->with('success','修改成功');
        }else{
                return back()->with('error','修改失败');
        }
    }


    public function del($id)
    {
        // dd($id);
        // 开启事务
        DB::beginTransaction();

        // 删除主用户
        $res1 = Href::destroy($id);
        // 判断
        if($res1){
            DB::commit();
            return redirect('admin/Article/Sort_pen')->with('success', '删除成功');
        }else{
            // 回滚事务
            DB::rollBack();
            return back()->with('error', '删除失败');
        }
        
    }
}
