<!DOCTYPE html>
<html>

	<head lang="en">
		<meta charset="UTF-8">
		<title>注册</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="renderer" content="webkit">
		<meta http-equiv="Cache-Control" content="no-siteapp" />

		<link rel="stylesheet" href={{asset("Home/AmazeUI-2.4.2/assets/css/amazeui.min.css")}} />
		<link href={{asset("Home/css/dlstyle.css")}} rel="stylesheet" type="text/css">
		<script src={{asset("Home/AmazeUI-2.4.2/assets/js/jquery.min.js")}}></script>
		<script src={{asset("Home/AmazeUI-2.4.2/assets/js/amazeui.min.js")}}></script>

	</head>

	<body>

		<div class="login-boxtitle">
			<a href="home/demo.html"><img alt="" src={{asset("Home/images/logobig.png")}} /></a>
		</div>

		<div class="res-banner">
			<div class="res-main">
				<div class="login-banner-bg"><span></span><img src={{asset("Home/images/big.jpg")}} /></div>
				<div class="login-box">

						<div class="am-tabs" id="doc-my-tabs">
							<ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify">
								<li class="am-active"><a href="">邮箱注册</a></li>
								<li><a href="">手机号注册</a></li>
							</ul>

							<div class="am-tabs-bd">
								<div class="am-tab-panel am-active">
									<form method="post">
										
							   <div class="user-email">
										<label for="email"><i class="am-icon-envelope-o"></i></label>
										<input type="email" name="Email" id="email" placeholder="请输入邮箱账号">
                 </div>										
                 <div class="user-pass">
								    <label for="password"><i class="am-icon-lock"></i></label>
								    <input type="password" name="password" id="Epassword" placeholder="设置密码">
                 </div>										
                 <div class="user-pass">
								    <label for="passwordRepeat"><i class="am-icon-lock"></i></label>
								    <input type="password" name="repassword" id="EpasswordRepeat" placeholder="确认密码">
                 </div>	
                 
                 </form>
                 
								 <div class="login-links">
										<label for="reader-me">
											<input id="reader-me" type="checkbox"> 点击表示您同意商城《服务协议》
										</label>
							  	</div>
										<div class="am-cf">
											<input type="submit" name="emailSubmit" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl">
										</div>

								</div>

								<div class="am-tab-panel">
									<form method="post">
                 <div class="user-phone">
								    <label for="phone"><i class="am-icon-mobile-phone am-icon-md"></i></label>
								    <input type="tel" name="Phone" id="phone" placeholder="请输入手机号">
                 </div>																			
										<div class="verification">
											<label for="code"><i class="am-icon-code-fork"></i></label>
											<input type="tel" name="" id="code" placeholder="请输入验证码">
											<a class="btn" href="javascript:void(0);" onClick="sendMobileCode();" id="sendMobileCode">
												<span id="dyMobileButton">获取</span></a>
										</div>
                 <div class="user-pass">
								    <label for="password"><i class="am-icon-lock"></i></label>
								    <input type="password" name="Password" id="password" placeholder="设置密码">
                 </div>										
                 <div class="user-pass">
								    <label for="passwordRepeat"><i class="am-icon-lock"></i></label>
								    <input type="password" name="Repassword" id="passwordRepeat" placeholder="确认密码">
                 </div>	
									</form>
								 <div class="login-links">
										<label for="reader-me">
											<input id="reader-me" type="checkbox"> 点击表示您同意商城《服务协议》
										</label>
							  	</div>
										<div class="am-cf">
											<input type="submit" name="phoneSubmit" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl">
										</div>
								
									<hr>
								</div>

								<script>
									$(function() {
									    $('#doc-my-tabs').tabs();
									  })
								</script>
								<script>
										$('input[type="submit"][name="emailSubmit"]').click(function(){
											if($('#email').val()==""){
												alert('请填写数据');
											}
											if($('#EpasswordRepeat').val()!=$('#Epassword').val()){
													alert('两次密码不一致');return false;
											}else if($('#EpasswordRepeat').val()=="" || $('#Epassword').val()==""){
												return false;
											}
											$.post('{{route("Register.store")}}',
											{'_token':'{{csrf_token()}}',
											'array':'email',
											'email':$("input[name='Email']").val(),
											'password':$('#Epassword').val(),
											},function(data) //第二个参数要传token的值 再传参数要用逗号隔开
											{
												console.log(data);
											});
										}) 
									}
								</script>
								{{-- <script src={{asset("Home/js/Register.js")}}> --}}
							</div>
						</div>

				</div>
			</div>
			
					@include('layouts.Hafter') @section('bottom') @endsection
	</body>

</html>