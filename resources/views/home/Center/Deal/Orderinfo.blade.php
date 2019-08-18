<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>订单详情</title>

		<link href={{asset("Home/AmazeUI-2.4.2/assets/css/admin.css")}} rel="stylesheet" type="text/css">
		<link href={{asset("Home/AmazeUI-2.4.2/assets/css/amazeui.css")}} rel="stylesheet" type="text/css">

		<link href={{asset("Home/css/personal.css")}} rel="stylesheet" type="text/css">
		<link href={{asset("Home/css/orstyle.css")}} rel="stylesheet" type="text/css">

		<script src={{asset("Home/AmazeUI-2.4.2/assets/js/jquery.min.js")}}></script>
		<script src={{asset("Home/AmazeUI-2.4.2/assets/js/amazeui.js")}}></script>


	</head>

	<body>
		<!--头 -->
		<header>
			<article>
					<!--顶部导航条 -->
					@include('layouts.Hbefore')@section('Htop')@endsection
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

					<div class="user-orderinfo">

						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">订单详情</strong> / <small>Order&nbsp;details</small></div>
						</div>
						<hr/>
						<!--进度条-->
						@foreach($orders as $k=>$v)
						
						<div class="order-infoaside">
							<div class="order-logistics">
								<a href="{{route('Logistics')}}">
									<div class="icon-log">
										<i><img src={{asset("Home/images/receive.png")}}></i>
									</div>
									@if(($v->status)=='0')
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;快递已经打包好了赶紧付款吧
									@elseif(($v->status)=='1')
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;快递已经在路上了
									@else
									<div class="latest-logistics">
										<p class="text">已签收,签收人是<d>{{$v->uname}}</d> 签收，感谢使用
										<d>@if(($v->deliv) == '0')顺丰快递
											@elseif(($v->deliv) == '4')申通快递
											@elseif(($v->deliv) == '3')天天快递
											@elseif(($v->deliv) == '2')中通快递
											@elseif(($v->deliv) == '1')圆通快递
											@elseif(($v->deliv) == '5')邮政快递
											@elseif(($v->deliv) == '6')邮政EMS
											@elseif(($v->deliv) == '7')韵达快递
											@endif
										</d>，期待再次为您服务</p>
										<div class="time-list">
											<span class="date">2015-12-19</span><span class="week">周六</span><span class="time">15:35:42</span>
										</div>
										<div class="inquire">
										  	<!--  <option value="0">顺丰快递</option>
								              <option value="1">圆通快递</option>
								              <option value="2">中通快递</option>
								              <option value="3">天天快递</option>
								              <option value="4">申通快递</option>
								              <option value="5">邮政EMS</option>
								              <option value="6">邮政小包</option>
								              <option value="7">韵达快递</option> -->
											<span class="package-detail">物流：
											@if(($v->deliv) == '0')顺丰快递
											@elseif(($v->deliv) == '4')申通快递
											@elseif(($v->deliv) == '3')天天快递
											@elseif(($v->deliv) == '2')中通快递
											@elseif(($v->deliv) == '1')圆通快递
											@elseif(($v->deliv) == '5')邮政快递
											@elseif(($v->deliv) == '6')邮政EMS
											@elseif(($v->deliv) == '7')韵达快递
											@endif
											</span>
											<span class="package-detail">快递单号: </span>
											<span class="package-number">{{$v->delivnum}}</span>
											<a href="{{route('Logistics')}}">查看</a>
										</div>
									</div>
									@endif
									<span class="am-icon-angle-right icon"></span>
								</a>
								<div class="clear"></div>
							</div>
							<div class="order-addresslist">
								<div class="order-address">
									<div class="icon-add">
									</div>
									<p class="new-tit new-p-re">
										<span class="new-txt">{{$v->uname}}</span>
										<span class="new-txt-rd2">{{$v->phone}}</span>
									</p>
									<div class="new-mu_l2a new-p-re">
										<p class="new-mu_l2cw">
											<span class="title">收货地址：</span>
											
											<span class="street">{{$v->acode}}</span></p>
									</div>
								</div>
							</div>
						</div>
						@endforeach
						<div class="order-infomain">

							<div class="order-top">
								<div class="th th-item">
									<td class="td-inner">&nbsp;&nbsp;&nbsp;&nbsp;商品</td>
								</div>
								<div class="th th-price">
									<td class="td-inner">&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									</td>
								</div>
								<div class="th th-number">
									<td class="td-inner">单价</td>
								</div>
								<div class="th th-operation">
									<td class="td-inner">数量</td>
								</div>
								<div class="th th-amount">
									<td class="td-inner">合计</td>
								</div>
								<div class="th th-status">
									<td class="td-inner">交易状态</td>
								</div>
							</div>

									<div class="order-main">
										<div class="order-list">	
											<!--交易成功-->
									@foreach($item as $key=>$value)	
										<div class="order-status5">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;">{{$value->code}}</a></div>
													<span>成交时间：2015-12-20</span>
													<!--    <em>店铺：小桔灯</em>-->
												</div>
												<div class="order-content">				
										@foreach($value->sub as $sub)
											@foreach($sub->sub as $d)
													<div class="order-left">
														<ul class="item-list">
																<li class="td td-item">
																	<div class="item-pic">
																		<a href="#" class="J_MakePoint">
																			<img src={{asset("Home/images/kouhong.jpg_80x80.jpg")}} class="itempic J_ItemImg">
																		</a>
																	</div>
																	<div class="item-info">
																		<div class="item-basic-info">
																			<a href="#">
																				<p>{{$d->goods}}</p>
																				<p class="info-little">类型：{{$d->name}}
																					<br/>包装：裸装 </p>
																			</a>
																		</div>
																	</div>
																</li>
																<li class="td td-price">
																	<div class="item-price">
																		
																	</div>
																</li>
											@endforeach
																<li class="td td-number">
																	<div class="item-number">
																	{{$d->price}}
																	</div>
																</li>
																<li class="td td-operation">
																	<div class="item-operation">
																	<span>×</span>{{$sub->nums}}
																	</div>
																</li>
														</ul>
													</div>
										@endforeach
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：{{$count}}
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														@if(($value->status)=='3')
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">交易失败</p>
																</div>
															</li>
														</div>
														@elseif(($value->status)=='0')
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">未付款</p>
																</div>
															</li>
														</div>
														@elseif(($value->status)=='1')
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">待发货</p>
																</div>
															</li>
														</div>
														@elseif(($value->status)=='2')
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">待收货</p>
																</div>
															</li>
														</div>
														@elseif(($value->status)=='4')
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">订单完成</p>
																</div>
															</li>
														</div>
														@elseif(($value->status)=='5')
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">退款</p>
																</div>

															</li>
														</div>
														@endif
													</div>
												</div>
											</div>
									@endforeach
										</div>									
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
							<li class="active"><a href="{{route('Order')}}">订单管理</a></li>
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