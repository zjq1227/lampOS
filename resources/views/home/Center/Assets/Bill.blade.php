<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>个人账单</title>

		<link href={{asset("Home/AmazeUI-2.4.2/assets/css/admin.css")}} rel="stylesheet" type="text/css">
		<link href={{asset("Home/AmazeUI-2.4.2/assets/css/amazeui.css")}} rel="stylesheet" type="text/css">

		<link href={{asset("Home/css/personal.css")}} rel="stylesheet" type="text/css">
		<link href={{asset("Home/css/blstyle.css")}} rel="stylesheet" type="text/css">
		<script src={{asset("Home/AmazeUI-2.4.2/assets/js/jquery.min.js")}}></script>
	</head>

	<body>
		<!--头 -->
		<header>
			<article>
				<div class="mt-logo">
					<!--顶部导航条 -->
					@include('layouts.Hbefore')@section('Htop')@endsection

				</div>
			</article>
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

					<div class="user-bill">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">账单</strong> / <small>Electronic&nbsp;bill</small></div>
						</div>
						<hr/>

						<div class="ebill-section">
							<div class="ebill-title-section">
								<h2 class="trade-title section-title">
                                                                                                                                     交易
                            <span class="desc">（金额单位：元）</span>
                        </h2>
							</div>

							<div class="module-income ng-scope">
								<div class="income-slider ">
									<div class="block-income block  fn-left">
										<h3 class="income-title block-title">
                                      支出
                                      <span class="num ng-binding">
                                            {{$nums}} 元  
                                       </span>
                                             </h3>

									</div>

									<!--收入-->                             
								</div>

								<!--消费走势-->

					<table width="100%">

						<thead>
							<tr>
								<th class="memo"></th>
								<th class="time">创建时间</th>
								<th class="name">名称</th>
								<th class="amount">金额</th>
							</tr>
						</thead>

						<tbody>
						@foreach($dec as $k=>$v)
							<tr>
								<td class="img">
									<i><img src="/uploads/{{ $v->picname}}" style="width: 80px;height: 80px;border-radius: 10px;"></i>
								</td>
								<td class="time">
									<p class="text-muted"> {{$v->created_at}}
									</p>
								</td>
								<td class="title name">
									<p class="content">
										{{$v->goods}}
									</p>
								</td>

								<td class="amount">
									<span class="amount-pay">-{{$v->price}}</span>
								</td>
							</tr>
							@endforeach
						</tbody>

					</table>
								<!--银行卡使用情况-->



								<script>
									$(document).ready(function (ev) {
								
									    $('.cards-carousel .details').on('click', function (ev) {
								             $('.cards-details').css("display","block");
								             $('.cards-carousel').css("display","none");								 
									    });									   									    
								
									    $('.cards-details .close').on('click', function (ev) {
								             $('.cards-details').css("display","none");
								             $('.cards-carousel').css("display","block");								 
									    });									    
									    									   								    
									});
								</script>

							</div>

						</div>

					</div>
				</div>
				<!--底部-->
					@include('layouts.Hafter')@section('Htop')@endsection
				

			</div>

			<aside class="menu">
				<ul>
					<li class="person">
						<a href="{{route('Center')}}">个人中心</a>
					</li>
					<li class="person">
						<a href="#">个人资料</a>
						<ul>
							<li> <a href="{{route('Information')}}">个人信息</a></li>
							<li> <a href="{{route('Safety')}}">安全设置</a></li>
							<li> <a href="{{route('Address')}}">收货地址</a></li>
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
							<li class="active"> <a href="{{route('Bill')}}">账单明细</a></li>
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