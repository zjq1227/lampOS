<!DOCTYPE html>
<html>

	<head lang="en">
		<meta charset="UTF-8">
		<title>登录</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="renderer" content="webkit">
		<meta http-equiv="Cache-Control" content="no-siteapp" />

		<link rel="stylesheet" href={{asset("Home/AmazeUI-2.4.2/assets/css/amazeui.css")}} />
		<script src={{asset("Home/AmazeUI-2.4.2/assets/js/jquery.min.js")}}></script>
		<link href={{asset("Home/css/dlstyle.css")}} rel="stylesheet" type="text/css">
	</head>

	<body>

		<div class="login-boxtitle">
			<a href="home.html"><img alt="logo" src="images/logobig.png" /></a>
		</div>

		<div class="login-banner">
			<div class="login-main">
				<div class="login-banner-bg"><span></span><img src="images/big.jpg" /></div>
				<div class="login-box">

							<h3 class="title">登录商城</h3>

							<div class="clear"></div>
						
						<div class="login-form">
						  <form>
							   <div class="user-name">
								    <label for="user"><i class="am-icon-user"></i></label>
								    <input type="text" name="" id="username" placeholder="邮箱/手机/用户名">
                 </div>
                 <div class="user-pass">
								    <label for="password"><i class="am-icon-lock"></i></label>
								    <input type="password" name="" id="password" placeholder="请输入密码">
                 </div>
              </form>
           </div>
            
            <div class="login-links">
                <label for="remember-me"><input id="remember-me" type="checkbox">记住密码</label>
								<a href="#" class="am-fr">忘记密码</a>
								<a href="{{route('Register.index')}}" class="zcnext am-fr am-btn-default">注册</a>
								<br />
            </div>
								<div class="am-cf">
									<input type="submit" name="" value="登 录" class="am-btn am-btn-primary am-btn-sm">
								</div>
						<div class="partner">		
								<h3>合作账号</h3>
							<div class="am-btn-group">
								<li><a href="#"><i class="am-icon-qq am-icon-sm"></i><span>QQ登录</span></a></li>
								<li><a href="#"><i class="am-icon-weibo am-icon-sm"></i><span>微博登录</span> </a></li>
								<li><a href="#"><i class="am-icon-weixin am-icon-sm"></i><span>微信登录</span> </a></li>
							</div>
						</div>	

				</div>
			</div>
		</div>
		<script>
		$('input[type="submit"]').click(function() {
                  if ($('#uesrname').val() == "") {
                    alert('请填写数据');
                  }
                  if ($('#password').val() == "") {
                    return false;
                  }
                  $.post('{{route("Login.store")}}', {
                    '_token': '{{csrf_token()}}',
                    'uname': $("#username").val(),
                    'password': $('#password').val(),
                  },
                  function(data) //第二个参数要传token的值 再传参数要用逗号隔开
                  {
										// console.log(data!=1);
										// return false;
                   if(data!=1){
							alert('登陆成功');
							window.location.href = "{{route('Index')}}";
						}else{
							alert("账号或密码输入有误");	
						}
                  });
		})
		</script>
					@include('layouts.Hafter') @section('bottom') @endsection
	</body>

</html>