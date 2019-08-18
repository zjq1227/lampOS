<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>订单管理</title>

		<link href={{asset("Home/AmazeUI-2.4.2/assets/css/admin.css")}} rel="stylesheet" type="text/css">
		<link href={{asset("Home/AmazeUI-2.4.2/assets/css/amazeui.css")}} rel="stylesheet" type="text/css">
	<script src={{asset("js/jquery-1.9.1.min.js")}}></script>
		<link href={{asset("Home/css/personal.css")}} rel="stylesheet" type="text/css">
		<link href={{asset("Home/css/orstyle.css")}} rel="stylesheet" type="text/css">
		<script src={{asset("admin/layer/layer.js")}} type="text/javascript" ></script>  
		<script src={{asset("Home/AmazeUI-2.4.2/assets/js/jquery.min.js")}}></script>
		<script src={{asset("Home/AmazeUI-2.4.2/assets/js/amazeui.js")}}></script>

	</head>

	<body>
		<!--头 -->
		<header>
			<article>
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

					<div class="user-order">

						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">订单管理</strong> / <small>Order</small></div>
						</div>
						<hr/>

						<div class="am-tabs am-tabs-d2 am-margin" data-am-tabs>

							<ul class="am-avg-sm-5 am-tabs-nav am-nav am-nav-tabs">
								<li class="am-active"><a href="#tab1">所有订单</a></li>
								<li><a href="#tab2">待付款</a></li>
								<li><a href="#tab3">待发货</a></li>
								<li><a href="#tab4">待收货</a></li>
								<li><a href="#tab5">待评价</a></li>
							</ul>

							<div class="am-tabs-bd">
								<div class="am-tab-panel am-fade am-in am-active" id="tab1">
								
									<div class="order-top">
										<div class="th th-item">
											<td class="td-inner">商品</td>
										</div>
										<div class="th th-price">
											<td class="td-inner">单价</td>
										</div>
										<div class="th th-number">
											<td class="td-inner">数量</td>
										</div>
										<div class="th th-operation">
											<td class="td-inner">总价
											</td>
										</div>
										<div class="th th-amount">
											<td class="td-inner">合计</td>
										</div>
										<div class="th th-status">
											<td class="td-inner">交易状态</td>
										</div>
										<div class="th th-change">
											<td class="td-inner">交易操作</td>
										</div>
									</div>

									<div class="order-main">
										<div class="order-list">	
											<!--交易成功-->
									@foreach($item as $key=>$value)	
										<div class="order-status5">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;">{{$value->code}}</a></div>
													<span>成交时间：{{$value->created_at}}</span>
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
																					<br/> </p>
																			</a>
																		</div>
																	</div>
																</li>
																<li class="td td-price">
																	<div class="item-price">
																		{{$d->price}}
																	</div>
																</li>
											@endforeach
																<li class="td td-number">
																	<div class="item-number">
																		<span>×</span>{{$sub->nums}}
																	</div>
																</li>
																<li class="td td-operation">
																	<div class="item-operation">
																	{{$sub->nums * $d->price}}
																	</div>
																</li>
														</ul>
													</div>
										@endforeach
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：{{$count}}
															</div>
														</li>
														@if(($value->status)=='3')
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">交易失败</p>
																</div>
															</li>
															<li class="td td-change">
																<div class="am-btn am-btn-danger anniu">
																	删除订单</div>
															</li>
														</div>
														@elseif(($value->status)=='0')
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">未付款</p>
																	<p class="order-info"><a href='{{route("Orderinfo",$value->id)}}'>订单详情</a></p>

																</div>
															</li>
															<li class="td td-change">
																<div class="am-btn am-btn-danger anniu">
																	<a title="收货" onclick="Order_form_desc(this,{{$value->id}})" >删除订单</a></div>
											
															</li>
														</div>
														@elseif(($value->status)=='1')
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">待发货</p>
																	<p class="order-info"><a href='{{route("Orderinfo",$value->id)}}'>订单详情</a></p>									
																	
																	<a title="退款" onclick="Order_form_del(this,{{$value->id}})" >退款</a>
																</div>
															</li>
														</div>
														@elseif(($value->status)=='2')
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">待收货</p>
																	<p class="order-info"><a href='{{route("Orderinfo",$value->id)}}'>订单详情</a></p>

																</div>
															</li>
															<li class="td td-change">
																<div class="am-btn am-btn-danger anniu">
																	<a title="收货" onclick="Order_form_sel(this,{{$value->id}})" >确认收货</a></div>
															</li>
														</div>
														@elseif(($value->status)=='4')
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">订单完成</p>
																	<p class="order-info"><a href='{{route("Orderinfo",$value->id)}}'>订单详情</a></p>
																</div>
															</li>
															<li class="td td-change">
																<div class="am-btn am-btn-danger anniu">
																	<a title="收货" onclick="Order_form_desc(this,{{$value->id}})" >删除订单</a></div>
															</li>
														</div>
														@elseif(($value->status)=='5')
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">退款</p>
																</div>

															</li>
															<li class="td td-change">
																<div class="am-btn am-btn-danger anniu">
																	删除订单</div>
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

								<div class="am-tab-panel am-fade" id="tab2">

									<div class="order-top">
										<div class="th th-item">
											<td class="td-inner">商品</td>
										</div>
										<div class="th th-price">
											<td class="td-inner">单价</td>
										</div>
										<div class="th th-number">
											<td class="td-inner">数量</td>
										</div>
										<div class="th th-operation">
											<td class="td-inner">商品操作</td>
										</div>
										<div class="th th-amount">
											<td class="td-inner">合计</td>
										</div>
										<div class="th th-status">
											<td class="td-inner">交易状态</td>
										</div>
										<div class="th th-change">
											<td class="td-inner">交易操作</td>
										</div>
									</div>

									<div class="order-main">
										<div class="order-list">	
											<!--交易成功-->
									@foreach($orders0 as $key=>$value)	
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
																		{{$d->price}}
																	</div>
																</li>
											@endforeach
																<li class="td td-number">
																	<div class="item-number">
																		<span>×</span>{{$sub->nums}}
																	</div>
																</li>
																<li class="td td-operation">
																	<div class="item-operation">
																	@if(($value->status) == '0')
																	退款
																	@else
																	@endif
																	</div>
																</li>
														</ul>
													</div>
										@endforeach
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：{{$count}}
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">未付款</p>
																</div>
															</li>
															<li class="td td-change">
																<div class="am-btn am-btn-danger anniu">
																	删除订单</div>
															</li>
														</div>
													</div>
												</div>
											</div>
									@endforeach
										</div>									
									</div>	
								</div>

								<div class="am-tab-panel am-fade" id="tab3">

									<div class="order-top">
										<div class="th th-item">
											<td class="td-inner">商品</td>
										</div>
										<div class="th th-price">
											<td class="td-inner">单价</td>
										</div>
										<div class="th th-number">
											<td class="td-inner">数量</td>
										</div>
										<div class="th th-operation">
											<td class="td-inner">商品操作</td>
										</div>
										<div class="th th-amount">
											<td class="td-inner">合计</td>
										</div>
										<div class="th th-status">
											<td class="td-inner">交易状态</td>
										</div>
										<div class="th th-change">
											<td class="td-inner">交易操作</td>
										</div>
									</div>

									<div class="order-main">
										<div class="order-list">	
											<!--交易成功-->
									@foreach($orders1 as $key=>$value)	
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
																		{{$d->price}}
																	</div>
																</li>
											@endforeach
																<li class="td td-number">
																	<div class="item-number">
																		<span>×</span>{{$sub->nums}}
																	</div>
																</li>
																<li class="td td-operation">
																	<div class="item-operation">
																	@if(($value->status) == '0')
																	退款
																	@else
																	@endif
																	</div>
																</li>
														</ul>
													</div>
										@endforeach
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：{{$count}}}
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">待发货</p>
																</div>
															</li>
														</div>
													</div>
												</div>
											</div>
									@endforeach
										</div>									
									</div>	
								</div>

								<div class="am-tab-panel am-fade" id="tab4">

									<div class="order-top">
										<div class="th th-item">
											<td class="td-inner">商品</td>
										</div>
										<div class="th th-price">
											<td class="td-inner">单价</td>
										</div>
										<div class="th th-number">
											<td class="td-inner">数量</td>
										</div>
										<div class="th th-operation">
											<td class="td-inner">商品操作</td>
										</div>
										<div class="th th-amount">
											<td class="td-inner">合计</td>
										</div>
										<div class="th th-status">
											<td class="td-inner">交易状态</td>
										</div>
										<div class="th th-change">
											<td class="td-inner">交易操作</td>
										</div>
									</div>

									<div class="order-main">
										<div class="order-list">	
											<!--交易成功-->
									@foreach($orders2 as $key=>$value)	
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
																		{{$d->price}}
																	</div>
																</li>
											@endforeach
																<li class="td td-number">
																	<div class="item-number">
																		<span>×</span>{{$sub->nums}}
																	</div>
																</li>
																<li class="td td-operation">
																	<div class="item-operation">
																	@if(($value->status) == '0')
																	退款
																	@else
																	@endif
																	</div>
																</li>
														</ul>
													</div>
										@endforeach
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																{{$count}}
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">待收货</p>
																</div>
															</li>
															<li class="td td-change">
																<div class="am-btn am-btn-danger anniu">
																	<a title="收货" onclick="Order_form_sel(this,{{$value->id}})" >确认收货</a></div>
															</li>
														</div>
													</div>
												</div>
											</div>
									@endforeach
										</div>									
									</div>	
								</div>

								<div class="am-tab-panel am-fade" id="tab5">

									<div class="order-top">
										<div class="th th-item">
											<td class="td-inner">商品</td>
										</div>
										<div class="th th-price">
											<td class="td-inner">单价</td>
										</div>
										<div class="th th-number">
											<td class="td-inner">数量</td>
										</div>
										<div class="th th-operation">
											<td class="td-inner">商品操作</td>
										</div>
										<div class="th th-amount">
											<td class="td-inner">合计</td>
										</div>
										<div class="th th-status">
											<td class="td-inner">交易状态</td>
										</div>
										<div class="th th-change">
											<td class="td-inner">交易操作</td>
										</div>
									</div>

									<div class="order-main">
										<div class="order-list">	
											<!--交易成功-->
									@foreach($orders4 as $key=>$value)	
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
																		{{$d->price}}
																	</div>
																</li>
											@endforeach
																<li class="td td-number">
																	<div class="item-number">
																		<span>×</span>{{$sub->nums}}
																	</div>
																</li>
																<li class="td td-operation">
																	<div class="item-operation">
																	@if(($value->status) == '5')
																	退款
																	@else
																	@endif
																	</div>
																</li>
														</ul>
													</div>
										@endforeach
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：{{$count}}
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">交易成功</p>
																</div>
															</li>
															<li class="td td-change">
																<div class="am-btn am-btn-danger anniu">
																	<a title="收货" onclick="Order_form_desc(this,{{$value->id}})" >删除订单</a></div
															</li>
														</div>
													</div>
												</div>
											</div>
									@endforeach
										</div>							
									</div>	
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
<script>
function Order_form_del(obj,id){
          layer.confirm('是否退款？', {
           btn: ['是','否'] ,//按钮
           icon:2, 
          }, 
          function(){
            // alert(id);
            location.href='{{Url("home/Center/Deal/Chdit/")}}'+'/'+id;  
            },);
        };
function Order_form_desc(obj,id){
          layer.confirm('是否删除？', {
           btn: ['是','否'] ,//按钮
           icon:2, 
          }, 
          function(){
            // alert(id);
            location.href='{{Url("home/Center/Deal/Ordel/")}}'+'/'+id;  
            },);
        };
 function Order_form_sel(obj,id){
          layer.confirm('确认收货？', {
           btn: ['是','否'] ,//按钮
           icon:2, 
          }, 
          function(){
            // alert(id);
            location.href='{{Url("home/Center/Deal/Ordsuc/")}}'+'/'+id;  
            },);
        };
</script>