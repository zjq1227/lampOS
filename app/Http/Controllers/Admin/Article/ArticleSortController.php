<?php

namespace App\Http\Controllers\Admin\Article;
use DB;
use  App\Models\article_type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleSortController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //从表中拿取数据
        $configs = DB::table('article_type')->get();
        $count = DB::table('article_type')->count();
        // dd($count);
        $num = 1;
        return view('admin.Article.Article_Sort', ['configer' => $configs])->with('num',$num)->with('counts',$count);
        
    }

   
    public function uploadList(){
        return view('admin.Article.Article_Sort_Upload');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request  $request)
    {
        //接受数据准备添加
        // dd($request->input());
        $tname = $request->input('tname');
        $jianjie = $request->input('jianjie');
        $status = $request->input('status');
        $created_at = date('YmdHis',time());
        $updated_at = date('YmdHis',time());
        $arr=['tname'=>$tname,'jianjie'=>$jianjie,'status'=>$status,'created_at'=>$created_at,'updated_at'=>$updated_at];

    	// dd($arr);
		$add = DB::table('article_type')->insert($arr);
        // return redirect('Admin/Article/Sort');
        if($add){
            // DB::commit();
            return redirect('admin/Article/Sort')->with('success', '添加成功');
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
        //获取修改数据
        $id=$request->id;
        $status=$request->status;
        $update = DB::update("update article_type set status=? where id=?",[$status,$id]);
        // $delete1 = DB::table('replays')->where('Pid',$request->id)->delete();
       // echo $request;
        if($update){
            echo 1;
        }else{
            echo 0;
        }
    }
    public function store($id)
    {
        //获取删除的id
        // dump($id);
        $del = DB::table('article_type')->where('id',$id)->delete();
        $del2 = DB::table('article')->where('type',$id)->delete();
        // dd($del);
        if($del){
            // DB::commit();
            return back()->with('success', '删除成功');
        }else{
            // DB::rollBack();
            return back()->with('error', '删除失败');
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
