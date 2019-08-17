<?php

namespace App\Http\Controllers\home\Center\Personal;
use Hash;
use Mail;
use App\Models\Users;
use App\Models\Users_info;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SafetyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //安全设置
        if(session('home_login')){
            $user=Users::find(session('home_userinfo')['id']);
            $userinfo=Users_info::where('uid',$user['id'])->get();
            $userinfo=json_decode($userinfo,true)[0];
            $user['uid'] = $userinfo['uid'];
            $user['profile'] = $userinfo['profile'];
            $user['sex'] = $userinfo['sex'];
            $user['jf'] = $userinfo['jf'];
            $user['browse'] = $userinfo['browse'];
            $user['buy'] = $userinfo['buy'];
            if(!empty($user)){
                 return view('home.Center.Personal.Safety')->with('users',$user);
            }
        }else{
            return redirect("home/Login");
        }
    }

    public function Password(){
        // 登陆密码修改
        if(session('home_login')){
            $user=Users::find(session('home_userinfo')['id']);
                return view('home.Center.Personal.Password')->with('users',$user);
        }else{
            return redirect("home/Login");
        }     
    }

    public function Setpay(){
        // 支付密码修改
        if(session('home_login')){
            $user=Users::find(session('home_userinfo')['id']);
            $userinfo=Users_info::where('uid',$user['id'])->get();
            $userinfo=json_decode($userinfo,true)[0];
            $user['uid'] = $userinfo['uid'];
            $user['phone'] = $user['phone'];
            $user['zphone'] = substr($user['phone'],0,3)."XXXXX". substr($user['phone'],-4);
             return view('home.Center.Personal.Setpay')->with('users',$user);
        }else{
            return redirect("home/Login");
        } 
    }

     /**执行手机号注册*********************************/
     public function  phonestore(Request $request){
        //验证手机验证码
        // return $request->input('phone',0);
        if(!empty($request->input('phone',0))){
            $phone = $request->input('phone',0);
            $code = $request->input('code',0);
            //获取发送到手机的验证码
            $k = $phone.'_code';
            $phone_code = session($k);
            if(intval($code) != $phone_code){
                echo 3;
                exit;
            }
        }
        if(!empty($request->input('phone2',0))){
            $phone2 = $request->input('phone2',0);
            $code2 = $request->input('code2',0);
            $k = $phone2.'_code';
            $phone_code2 = session($k);
            if(intval($code2) != $phone_code2){
                echo 4;
                exit;
            }
        }
        // return $code.$k.$phone_code;
        // return $request;
        $status=$request->status;
        switch ($status) {
            case 'zhifu':
                $user=Users::find(session('home_userinfo')['id']);
                $user->zpwd = Hash::make($request->input('zpwd',''));
                if($user->save()){
                     echo 1;
                }else{
                    echo 2;
                }
            break;

            case 'HPhone':
                $user=Users::find(session('home_userinfo')['id']);
                $user->phone = $request->input('phone2','');
                if($user->save()){
                    echo 1;
                }else{
                    echo 2;
                }
            break;

            default:
                # code...
            break;
        }
            

    }


    public function BindPhone(){
        // 手机验证换棒
        if(session('home_login')){
            $user=Users::find(session('home_userinfo')['id']);
            return view('home.Center.Personal.Bindphone')->with('users',$user);
        }else{
            return redirect("home/Login");
        }          
        
    }

    public function Email(){
        // 邮箱验证换绑
        if(session('home_login')){
            $user=Users::find(session('home_userinfo')['id']);
            return view('home.Center.Personal.Email')->with('users',$user);
        }else{
            return redirect("home/Login");
        }
    }

    public function Idcard(){
        // 实名认证
        if(session('home_login')){
            $user=Users::find(session('home_userinfo')['id']);
            $userinfo=Users_info::where('uid',$user->id)->get();
            $userinfo=json_decode($userinfo,true)[0];
            return view('home.Center.Personal.Idcard')->with(['users'=>$user,'usersinfo'=>$userinfo]);
        }else{
            return redirect("home/Login");
        }
    }

    public function Question( ){
        // 安全问题认证
        return view('home.Center.Personal.Question');
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
    public function emailstore(Request $request)
    {

        // 个人信息
        $user=Users::find(session('home_userinfo')['id']);
        $user->email = $request->email;
        if(!empty($user)){
                //发送邮件
                Mail::send('home.Center.Personal.email_yzm',['id'=>$user->id,'token'=>$user->token],function($m) use ($user){
                    // $m->from('akoa123@qq.com','hi');
                    $m->to($user->email)->subject('验证邮箱');
                });
                return 1;
        }else{
            return 0;
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
        // return $request;
        $status = $request->status;
        switch ($status) {
            case 'password':
                // return $request;
                $user=Users::find($id);
                // return $user;
                $pwd=$user->password;
                if(!Hash::check($request->oldpassowrd,$pwd)){
                    echo "<script>alert('原密码输入错误');window.location.href='/Laravel/public/home/Center/Personal/Safety';</script>";
                }else{
                    $user->password = Hash::make($request->newpassword);
                        if($user->save()){
                            echo "<script>alert('修改成功,请重新登陆');window.location.href='http://localhost/Laravel/public/home/Login'; </script>";
                        }else{
                            echo "<script>alert('原密码输入错误');window.location.href='http://localhost/Laravel/public/home/Center/Personal/Safety';</script>";

                        }
                }  
                break;
            case 'update':
                // return $id;
                $userinfo=Users_info::find($id);
                $userinfo->name=$request->name;
                $userinfo->idcard=$request->idcard;
                if($userinfo->save()){
                    return 1;
                }else{
                    return false;
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
    }

    /**执行邮箱注册*********************************/
    public function emailStatus(Request $request){
        $user=Users::find(session('home_userinfo')['id']);
        $user->email=$request->input('email');
        $user->save();
        
       

    }

    //**手机号注册验证码*********************************/
    public function sendPhone(Request $request){
        //接收手机号
        $phone = $request->input('phone');
        // return $phone;
        // echo $phone;
        // return $phone;
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
            echo session($k);
            // $result = json_decode($content, true);

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
    protected function validateLogin(Request $request){
        $this->validate($request, [
            $this->loginUsername() => 'required',
            'captcha' => 'required|captcha',
        ],[
            'captcha.required' => trans('验证码不能'),
            'captcha.captcha' => trans('请输入正确的验证码'),
        ]);
        
    }
}
