<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function uploadCompanyImg(Request $request){

        $file = $request->file('picture');
        header('Content-type: application/json');
        // 文件是否上传成功
        if ($file->isValid()) {
            // 获取文件相关信息
            $originalName = $file->getClientOriginalName(); //文件原名
            $ext = $file->getClientOriginalExtension();     // 扩展名

            $realPath = $file->getRealPath();   //临时文件的绝对路径

            $type = $file->getClientMimeType();     // image/jpeg
            $size =$file->getSize();
            $this->_result['code']=101;
            if($size > 2*1024*1024){
                $this->_result['message']='文件大小超过2M';
                echo json_encode($this->_result);
                exit();
            }
            $extArr = array('jpg','jpeg','png','gif');
            if(!in_array($ext,$extArr)){
                $this->_result['message']='文件格式不正确';
                echo json_encode($this->_result);
                exit();
            }

            // 拼接文件名称
            $filename = date('YmdHis') . uniqid() . '.' . $ext;
            // 使用我们新建的upload_company_img本地存储空间（目录）
            //这里的upload_company_img是配置文件的名称
            $bool = Storage::disk('upload_company_img')->put($filename, file_get_contents($realPath));

            if($bool){
                $this->_result['code']=200;
                $this->_result['message']='成功';
                $url='https://api.bxbedu.com/static/study/images/company/'.date('Ym',time()).'/'.$filename;
                $path='/static/study/images/company/'.date('Ym',time()).'/'.$filename;
                $this->_result['data']=array('url'=>$url,'path'=>$path);
                echo json_encode($this->_result);
            }else{
                $this->_result['message']='上传失败';
                echo json_encode($this->_result);
            }

        }else{
            $this->_result['message']='上传失败';
            echo json_encode($this->_result);
        }

    }
}
