<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>验证邮箱</title>

		<link href={{asset("Home/AmazeUI-2.4.2/assets/css/admin.css")}} rel="stylesheet" type="text/css">
		<link href={{asset("Home/AmazeUI-2.4.2/assets/css/amazeui.css")}} rel="stylesheet" type="text/css">

		<link href={{asset("Home/css/personal.css")}} rel="stylesheet" type="text/css">
		<link href={{asset("Home/css/stepstyle.css")}} rel="stylesheet" type="text/css">

		<script type="text/javascript" src={{asset("Home/js/jquery-1.7.2.min.js")}}></script>
		<script src={{asset("Home/AmazeUI-2.4.2/assets/js/amazeui.js")}}></script>

	</head>

	<body>
		<!--头 -->
		<header>
				@include('layouts.Hbefore') @section('Htop') @endsection
		</header>
            <div class="nav-table">
					   <div class="long-title"><span class="all-goods">全部分类</span></div>
					   <div class="nav-cont">
							<ul>
								<li class="index"><a href="#">首页</a></li>
                                <li class="qc"><a href="#">闪购</a></li>
                                <li class="qc"><a href="#">限时抢</a></li>
                                <li class="qc"><a href="#">团购</a></li>
                                <li class="qc last"><a href="#">大包装</a></li>
							</ul>
						    <div class="nav-extra">
						    	<i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
						    	<i class="am-icon-angle-right" style="padding-left: 10px;"></i>
						    </div>
						</div>
			</div>
			<b class="line"></b>
		<div class="center">
			<div class="col-main">
				<div class="main-wrap">

					<div class="am-cf am-padding">
						<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">绑定邮箱</strong> / <small>Email</small></div>
					</div>
					<hr/>
					<!--进度条-->
					<div class="m-progress">
						<div class="m-progress-list">
							<span class="step-1 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">1<em class="bg"></em></i>
                                <p class="stage-name">验证邮箱</p>
                            </span>
							<span class="step-2 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">2<em class="bg"></em></i>
                                <p class="stage-name">完成</p>
                            </span>
							<span class="u-progress-placeholder"></span>
						</div>
						<div class="u-progress-bar total-steps-2">
							<div class="u-progress-bar-inner"></div>
						</div>
					</div>
					<form class="am-form am-form-horizontal">
						<div class="am-form-group">
							<label for="user-email" class="am-form-label">验证邮箱</label>
							<div class="am-form-content">
							<input type="email" id="user-email" value={{$users->email}}>
							</div>
						</div>
						<div class="am-form-group code">
							<label for="user-code" class="am-form-label">验证码</label>
							<div class="am-form-content">
								<input type="tel" id="user-code" placeholder="验证码">
							</div>
							<a class="btn" href="javascript:void(0);" onClick="sendMobileCode(this);" id="sendMobileCode">
								<div class="am-btn am-btn-danger" id="dyMobileButton">验证码</div>
							</a>
						</div>
						<div class="info-btn">
							<input type="submit" name="emailSubmit" value="保存修改" class="am-btn am-btn-danger">
						</div>

					</form>

				</div>
				<script>
					
						function sendMobileCode(obj){
							//获取用户验证码
							let phone = $('#user-email').val();
							// console.log(phone);
							//验证格式
						// 	let phone_preg = /^1{1}[3-9]{1}[\d]{9}$/;
						// 	if(!phone_preg.test(phone)){
						// 		alert('手机号格式不正确');
						// 		return false;
						// }


						$('#sendMobileCode').attr('disabled',true);
						$('#sendMobileCode').css('color','#ccc');
						$('#sendMobileCode').css('cursor','no-drop');
						$("#dyMobileButton").css('color','#ccc');
						let time = null;
						if($("#dyMobileButton").html()=='验证码'){
						let i = 5;
						time = setInterval(function(){
							i--;
							$("#dyMobileButton").html('('+i+')s');
							if(i < 1){
								$('#sendMobileCode').attr('disabled',false);
								$('#sendMobileCode').css('color','#333');
								$('#sendMobileCode').css('cursor','pointer');
								$("#dyMobileButton").css('color','#333');
								$("#dyMobileButton").html('验证码');
								clearInterval(time);
							}
						},1000);

						//发送验证码
						$.post('{{route("Setpay.emailstore")}}',{'_token':'{{csrf_token()}}','email':$("#user-email").val()},function(res){
							console.log(res);
							if(res.error_code == 0){
								alert('发送成功，验证码十分钟有效');
							}else{
								alert('发送失败');
							}
							},'json');
							}else{

							}
						}
						// 邮箱
						$('input[type="submit"][name="emailSubmit"]').click(function(){
							// if($('#email').val()==""){
							// 	alert('请填写数据');
							// }
							// if($('#EpasswordRepeat').val()!=$('#Epassword').val()){
							// 		alert('两次密码不一致');return false;
							// }else if($('#EpasswordRepeat').val()=="" || $('#Epassword').val()==""){
							// 	return false;
							// }
							$.post('{{route("Setpay.emailStatus")}}',
							{'_token':'{{csrf_token()}}',
							'array':'email',
							'email':$("#user-email").val(),
							'code':$('#user-code').val(),
							},function(data) //第二个参数要传token的值 再传参数要用逗号隔开
							{
								if(data!=1){
									
								}else{
									alert('请到邮箱确激活');
								}
							});
						
								return false;
						})
				</script>
				<!--底部-->
				@include('layouts.Hafter') @section('bottom') @endsection
			</div>

			<aside class="menu">
				<ul>
					<li class="person">
						<a href="{{route('Center')}}">个人中心</a>
					</li>
					<li class="person">
						<a href="#">个人资料</a>
						<ul>
							<li> <a href="{{route('Information.index')}}">个人信息</a></li>
							<li class="active"> <a href="{{route('Safety.index')}}">安全设置</a></li>
							<li> <a href="{{route('Address.index')}}">收货地址</a></li>
						</ul>
					</li>
					<li class="person">
						<a href="#">我的交易</a>
						<ul>
							<li><a href="{{route('Order')}}">订单管理</a></li>
							<li> <a href="{{route('Change')}}">退款售后</a></li>
						</ul>
					</li>
					<li class="person">
						<a href="#">我的资产</a>
						<ul>
							<li> <a href="{{route('Coupon')}}">优惠券 </a></li>
							<li> <a href="{{route('Bonus')}}">红包</a></li>
							<li> <a href="{{route('Bill')}}">账单明细</a></li>
						</ul>
					</li>

					<li class="person">
						<a href="#">我的小窝</a>
						<ul>
							<li> <a href="{{route('Collection')}}">收藏</a></li>
							<li> <a href="{{route('Foot')}}">足迹</a></li>
							<li> <a href="{{route('Comment')}}">评价</a></li>
							<li> <a href="{{route('News')}}">消息</a></li>
						</ul>
					</li>

				</ul>

			</aside>
		</div>

	</body>

</html>