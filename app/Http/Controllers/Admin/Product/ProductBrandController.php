<?php

namespace App\Http\Controllers\Admin\Product;
use DB;
use  App\Models\brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\ViewErrorBag;

class ProductBrandController extends Controller
{
    public function Index(){
        $brands = DB::table('brand')->get();
        $counter = DB::table('brand')->count();
        $guonei = DB::table('brand')->where('country','国内')->count();
        $guowai = DB::table('brand')->where('country','国外')->count();
        $num = 1;
        return view('admin.Product.Brand_Manage',['brand'=>$brands],['count'=>$counter])->with('num',$num)->with('guonei',$guonei)->with('guowai',$guowai);
    }

    public function addList(){
        return view('admin.Product.Brand_add');
    }
    public function doadd(Request $request){
        // 检查文件上传
          if(!$request->hasFile('blogo')){
            $request->session()->flash('error_msg','文件不存在');
            return back();
        }
        $img = $request->file('blogo');
        // 获取后缀名
        $ext = $img->extension();
        // 新文件名
        $saveName =time().rand().".".$ext;
        // 使用 store 存储文件
        $path = $img->store(date('Ymd'));
        $bname =  $request->input('bname');
        $number =  $request->input('number','');
        $country =  $request->input('country','');
        $describe = $request->input('describe','');
        $status = $request->input('status');
        $created_at = date('YmdHis',time());
        $updated_at = date('YmdHis',time());
        $arr=['bname'=>$bname,'number'=>$number,'blogo'=>$path,'country'=>$country,'describe'=>$describe,'status'=>$status,'created_at'=>$created_at,'updated_at'=>$updated_at];
        $add = DB::table('brand')->insert($arr);
        if($add){
            // DB::commit();
            return redirect('admin/Product/Brand')->with('success', '添加成功');
        }else{
            // DB::rollBack();
            return back()->with('error', '添加失败');
        }
    }

    public function uploadList($id){
        $brands = DB::table('brand')->where('id',$id)->get();

        return view('admin.Product.Brand_upload',['brand'=>$brands]);
    }
    public function doupdate(Request $request){
        // 检查文件上传
        if(!$request->hasFile('blogo')){
            $request->session()->flash('error_msg','文件不存在');
            return back();
        }
        $img = $request->file('blogo');
        // 获取后缀名
        $ext = $img->extension();
        // 新文件名
        $saveName =time().rand().".".$ext;
        // 使用 store 存储文件
        $path = $img->store(date('Ymd'));
        $id = $request->input('id');
        $brands = Brand::find($id);
        // dd($brands);
        $brands->bname = $request->input('bname','');
        $brands->number = $request->input('number','');
        $brands->blogo = $path;
        $brands->country = $request->input('country','');
        $brands->status = $request->input('status','');
        $res = $brands->save();
        if($res){
            // DB::commit();
            return redirect('admin/Product/Brand')->with('success', '修改成功');
        }else{
            // DB::rollBack();
            return back()->with('error', '修改失败');
        }
    }
    public function statusupdate(Request $request)
    {
        //获取修改数据
        $id=$request->id;
        $status=$request->status;
        $update = DB::update("update brand set status=? where id=?",[$status,$id]);
        // $delete1 = DB::table('replays')->where('Pid',$request->id)->delete();
       // echo $request;
        if($update){
            echo 1;
        }else{
            echo 0;
        }
    }
}
