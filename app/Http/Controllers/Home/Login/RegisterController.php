<?php

namespace App\Http\Controllers\Home\Login;

use Illuminate\Http\Request;
use Mail;
use Hash;
use App\Models\Users;
use App\Models\Account;
use App\Models\Users_info;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('home.Login.Register');
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
        $users = new users;
        $users->created_at=date('Y-m-d h:i:s',time());
        $users->updated_at=date('Y-m-d h:i:s',time());

        $users->token = str_random(30);
        $users->email = $request->input('email','');
        $users->uname = $request->input('email','');
        $users->password = Hash::make($request->input('password',''));
        // return $users;die;
        // 检查是否被注册
        $user= DB::table('users')->where('email','=' ,"$users->email")->get();
        if(empty(json_decode($user,true)[0])){
            if($users->save()){
                // 个人信息
                $users_info=new Users_info;
                $uid=$users->id;
                $users_info->uid = $uid;
                $users_info->created_at =$users->created_at;
                $users_info->updated_at=$users->updated_at;
                $account=New Account;
                $account->uid=$users->id;
                    if($users_info->save()  && $account->save()){
                        //发送邮件
                        Mail::send('home.email.email',['id'=>$users->id,'token'=>$users->token],function($m) use ($users){
                            $m->to($users->email)->subject('your reminder');
                        });
                        echo 1;
                    }else{
                        echo 2;
                    }
            }else{
                echo 2;
            }
        }else{
            echo 2;
        }
        
         
    }
/**执行邮箱注册*********************************/
    public function emailStatus(Request $request){
        $id = $request->input('id',0);
        $token = $request->input('token',0);
        $user = Users::find($id);
        if($user->token!=$token){
            echo "<script>alert('已失效');</script>";
        }
        $user->status = 1;
        $user->token = str_random(30);
        if($user->save()){
            echo "<script>alert('激活成功');window.location.href='/Login'; </script>";
        }else{
            echo '激活失败';
        }
    }

    /**执行手机号注册*********************************/
    public function  phonestore(Request $request){
        //验证手机验证码
        $phone = $request->input('phone',0);
        $code = $request->input('code',0);
        //获取发送到手机的验证码
        $k = $phone.'_code';
        $phone_code = session($k);
        if($code != $phone_code){
            echo 3;
            exit;
        }

        $users = new users;
        $users->phone = intval($request->input('phone',''));
        $users->uname = $request->input('phone','');
        $users->token = str_random(30);
        $users->created_at=date('Y-m-d h:i:s',time());
        $users->updated_at=date('Y-m-d h:i:s',time());
        $users->password = Hash::make($request->input('upass',''));
        if($users->save()){
            $users_info=new Users_info;
            $uid=$users->id;
            $users_info->uid = $uid;
            $users_info->created_at =$users->created_at;
            $users_info->updated_at=$users->updated_at;
            if($users_info->save()){
            echo 1;
            }else{
                echo 2;
            }
        }else{
            echo 2;
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

    //**手机号注册验证码*********************************/
    public function sendPhone(Request $request){
        //接收手机号
        $phone = $request->input('phone');
        // echo $phone;
        // return $phone;
        $user= DB::table('users')->where('phone','=',"$phone")->get();
        if(!empty(json_decode($user,true)[0])){
            // 手机号已被注册
            echo 2;die;
        }else{
            $code = rand(1234,4321);
            $k = $phone.'_code';
            session([$k=>$code]);
            $url = "http://v.juhe.cn/sms/send";
            $params = array(
                'key'   => 'bfd1fdd264af092ec21e797da92215e4', //您申请的APPKEY
                'mobile'    => $phone, //接受短信的用户手机号码
                'tpl_id'    => '177554', //您申请的短信模板ID，根据实际情况修改
                'tpl_value' =>'#code#='.$code, //您设置的模板变量，根据实际情况修改
                'dtype'=>'json'
            );

            $paramstring = http_build_query($params);
            $content = self::juheCurl($url, $paramstring);
            echo $content;
            // $result = json_decode($content, true);
        }

    } 

        /**
     * 请求接口返回内容
     * @param  string $url [请求的URL地址]
     * @param  string $params [请求的参数]
     * @param  int $ipost [是否采用POST形式]
     * @return  string
     */
    public static function juheCurl($url, $params = false, $ispost = 0)
    {
        $httpInfo = array();
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_USERAGENT, 'JuheData');
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        if ($ispost) {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
            curl_setopt($ch, CURLOPT_URL, $url);
        } else {
            if ($params) {
                curl_setopt($ch, CURLOPT_URL, $url.'?'.$params);
            } else {
                curl_setopt($ch, CURLOPT_URL, $url);
            }
        }
        $response = curl_exec($ch);
        if ($response === FALSE) {
            //echo "cURL Error: " . curl_error($ch);
            return false;
        }
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $httpInfo = array_merge($httpInfo, curl_getinfo($ch));
        curl_close($ch);
        return $response;
    } 
}
