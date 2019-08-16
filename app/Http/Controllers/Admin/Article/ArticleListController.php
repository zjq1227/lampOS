<?php

namespace App\Http\Controllers\Admin\Article;
use DB;
use  App\Models\article_type;
use  App\Models\article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //首先查询文章类型表拿取数据
        //拿到type
        $configs = DB::table('article_type')->where('status',1)->get();
        $count = DB::table('article_type')->where('status',1)->count();
        //拿到文章列表
        $content = DB::table('article')->get();
        $counter = DB::table('article')->count();
        //数据处理
            foreach($content as $v){
                // dump($v);
                $type = DB::table('article_type')->where('id',$v->type)->get();
                // dump($type);
                $v->tname = $type[0]->tname;
                // dump($v);
            }
            $num = 1;
            // dd($counter);
            return view('admin.Article.Article_List', ['configer' => $configs],['contents' => $content])->with('num',$num)->with('counts',$count)->with('countt',$counter);
      
       
    }
    /**
     * 跳转到文章的修改的页面
     *
     * @return \Illuminate\Http\Response
     */
    public function UploadList(){
        $configs = DB::table('article_type')->where('status',1)->get();

        return view('admin.Article.Article_List_Upload',['configer' => $configs]);
    }
      /**
     * 跳转文章的添加页面
     *
     * @return \Illuminate\Http\Response
     */
    public function addList(){
        
        $configs = DB::table('article_type')->where('status',1)->get();
        return view('admin.Article.Article_Sort_Add',['configer' => $configs]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //准备接收数据进行添加操作
        // dd($request->input());getPara
        // dd($_POST);
        $name =  $request->input('name','');
        $jianjie =  $request->input('jianjie','');
        $type =  $request->input('type','');
        $status =  $request->input('status','');
        $content =  $request->input('content','');
        $created_at = date('YmdHis',time());
        $updated_at = date('YmdHis',time());
        $arr=['name'=>$name,'jianjie'=>$jianjie,'content'=>$content,'type'=>$type,'status'=>$status,'created_at'=>$created_at,'updated_at'=>$updated_at];
        // dd($arr);
        $add = DB::table('article')->insert($arr);
        if($add){
            // DB::commit();
            return redirect('admin/Article/List')->with('success', '添加成功');
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
        $update = DB::update("update article set status=? where id=?",[$status,$id]);
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
        $del = DB::table('article')->where('id',$id)->delete();
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
