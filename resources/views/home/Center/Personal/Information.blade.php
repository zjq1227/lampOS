<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>个人资料</title>

		<link href={{asset("Home/AmazeUI-2.4.2/assets/css/admin.css")}} rel="stylesheet" type="text/css">
		<link href={{asset("Home/AmazeUI-2.4.2/assets/css/amazeui.css")}} rel="stylesheet" type="text/css">

		<link href={{asset("Home/css/personal.css")}} rel="stylesheet" type="text/css">
		<link href={{asset("Home/css/infstyle.css")}} rel="stylesheet" type="text/css">
		<script src={{asset("Home/AmazeUI-2.4.2/assets/js/jquery.min.js")}} type="text/javascript"></script>
		<script src={{asset("Home/AmazeUI-2.4.2/assets/js/amazeui.js")}} type="text/javascript"></script>
			
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

					<div class="user-info">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">个人资料</strong> / <small>Personal&nbsp;information</small></div>
						</div>
						<hr/>

						<!--头像 -->
						<div class="user-infoPic">

							<div class="filePic">
							<a href="{{route('Information.show',$users->uid)}}"  class="inputPic"></a>
							<img class="am-circle am-img-thumbnail" src="{{asset("/uploads")}}/{{$users['profile']}}" alt="" />
							</div>

							<p class="am-form-help">头像</p>

							<div class="info-m">
								<div><b>用户名：<i>{{$users->uname}}</i></b></div>
								<div class="u-level">
									<span class="rank r2">
							             <s class="vip1"></s><a class="classes" href="#">铜牌会员</a>
						            </span>
								</div>
								<div class="u-safety">
									<a href="safety.html">
									 账户安全
									<span class="u-profile"><i class="bc_ee0000" style="width: 60px;" width="0">{{$users->jf}}分</i></span>
									</a>
								</div>
							</div>
						</div>

						<!--个人信息 -->
						<div class="info-main">
							<form class="am-form am-form-horizontal" action="{{route('Information.update',$users->id)}}" method="POST" enctype="multipart/form-data">
									{!! csrf_field() !!}
									{{ method_field('PATCH') }}
								<div class="am-form-group">
									<label for="user-name2" class="am-form-label">昵称</label>
									<div class="am-form-content">
										<input type="text" id="username" name="uname" value="{{$users->uname}}">

									</div>
								</div>


								<div class="am-form-group">
									<label class="am-form-label">性别</label>
									@if($users->sex==0)
									<div class="am-form-content sex">
										<label class="am-radio-inline">
											<input type="radio" name="radio10" value="2" data-am-ucheck> 男
										</label>
										<label class="am-radio-inline">
											<input type="radio" name="radio10" value="1" data-am-ucheck> 女
										</label>
										<label class="am-radio-inline">
											<input type="radio" name="radio10" value="0" data-am-ucheck checked> 保密
										</label>
									</div>
									@elseif($users->sex==1)
									<div class="am-form-content sex">
											<label class="am-radio-inline">
												<input type="radio" name="radio10" value="2" data-am-ucheck> 男
											</label>
											<label class="am-radio-inline">
												<input type="radio" name="radio10" value="1" data-am-ucheck checked> 女
											</label>
											<label class="am-radio-inline">
												<input type="radio" name="radio10" value="0" data-am-ucheck> 保密
											</label>
										</div>
									@elseif($users->sex==2)
									<div class="am-form-content sex">
											<label class="am-radio-inline">
												<input type="radio" name="radio10" value="2" data-am-ucheck checked> 男
											</label>
											<label class="am-radio-inline">
												<input type="radio" name="radio10" value="1" data-am-ucheck> 女
											</label>
											<label class="am-radio-inline">
												<input type="radio" name="radio10" value="0" data-am-ucheck checked> 保密
											</label>
										</div>
									@endif
								</div>
								<div class="am-form-group">
									<label for="user-phone" class="am-form-label">电话</label>
									<div class="am-form-content">
										<input id="user-phone" name="phone" value="{{$users->phone}}" type="tel">

									</div>
								</div>
								<div class="am-form-group">
									<label for="user-email" class="am-form-label">电子邮件</label>
									<div class="am-form-content">
										<input id="user-email" name="email" value="{{$users->email}}" type="email">

									</div>
								</div>
								<div class="info-btn">
									<button type="submit" class="am-btn am-btn-danger">保存修改</button>
								</div>
							</form>
						</div>

					</div>

				</div>
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
							<li class="active"> <a href="{{route('Information.index')}}">个人信息</a></li>
							<li> <a href="{{route('Safety.index')}}">安全设置</a></li>
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