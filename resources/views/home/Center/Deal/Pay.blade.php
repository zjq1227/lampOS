<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0 ,minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>结算页面</title>

		<link href={{asset("Home/AmazeUI-2.4.2/assets/css/amazeui.css")}} rel="stylesheet" type="text/css" />
		<link href={{asset("Home/AmazeUI-2.4.2/assets/css/admin.css")}} rel="stylesheet" type="text/css">
		<link href={{asset("Home/css/addstyle.css")}} rel="stylesheet" type="text/css">
		<link href={{asset("Home/basic/css/demo.css")}} rel="stylesheet" type="text/css" />
		<link href={{asset("Home/css/cartstyle.css")}} rel="stylesheet" type="text/css" />

		<link href={{asset("Home/css/jsstyle.css")}} rel="stylesheet" type="text/css" />

		<script type="text/javascript" src={{asset("Home/js/address.js")}}></script>

	</head>

	<body>

		<!--顶部导航条 -->
		@include('layouts.Hbefore') @section('Htop') @endsection

			<div class="clear"></div>
			<div class="concent">
				<!--地址 -->
				<div class="paycont">
					<div class="address">
						<h3>确认收货地址 </h3>
						<div class="control">
							<div class="tc-btn createAddr theme-login am-btn am-btn-danger">使用新地址</div>
						</div>
						<div class="clear"></div>
						<ul>
							<div class="per-border"></div>
							@foreach ($shipping as $item)
							@if($item->status==1)
							<li class="user-addresslist defaultAddr">
								<span class="new-option-r" onclick="status({{$item->id}})"><i class="am-icon-check-circle"></i>默认地址</span>
								<p class="new-tit new-p-re">
									<span class="new-txt">{{$item->name}}</span>
									<span class="new-txt-rd2">{{$item->phone}}</span>
								</p>
								<div class="new-mu_l2a new-p-re">
									<p class="new-mu_l2cw">
										<span class="title">地址：</span>
										<span class="street">{{$item->acode}}</span></p>
								</div>
								<div class="new-addr-btn">
									<a href="{{route('Address.show',$item->id)}}"><i class="am-icon-edit"></i>编辑</a>
									<span class="new-addr-bar">|</span>
									<a href="javascript:void(0);" onClick="delClick($item->id);"><i class="am-icon-trash"></i>删除</a>
								</div>
							</li>
							@elseif($item->status==0)
								<li class="user-addresslist" onclick="status({{$item->id}})">
									<span class="new-option-r" ><i class="am-icon-check-circle"></i>设为默认</span>
									<p class="new-tit new-p-re">
									<span class="new-txt">{{$item->name}}</span>
										<span class="new-txt-rd2">{{$item->phone}}</span>
									</p>
									<div class="new-mu_l2a new-p-re">
										<p class="new-mu_l2cw">
											<span class="title">地址：</span>
											<span class="street">{{$item->acode}}</span></p>
									</div>
									<div class="new-addr-btn">
									<a href="{{route('Address.show',$item->id)}}"><i class="am-icon-edit"></i>编辑</a>
										<span class="new-addr-bar">|</span>
										<a href="javascript:void(0);" onclick="delClick({{$item->id}});"><i class="am-icon-trash"></i>删除</a>
									</div>
								</li>
							@endif
							@endforeach
							<div class="per-border"></div>
						</ul>
						<script>
								// 删除
									function delClick(id){
											// console.log($id);
											$.ajax({
												url:"{{url('home/Center/Personal/Address')}}"+"/"+id,
												type:"POST",
												data:{_method:"DELETE", _token : '<?php echo csrf_token()?>'},
												dataType:"json",
												success:function(result){
													if(result){
														alert("删除成功");
														location.reload();
													}
												}
																		
											})
									}
									//	修改权限
									function status(id){
										$.ajax({
												url:"{{url('home/Center/Personal/Address')}}"+"/"+id,
												type:"POST",
												data:{_method:"PATCH",
												 _token : '<?php echo csrf_token()?>',
												'status':'status'},
												dataType:"json",
												success:function(result){
													if(result){
														// console.log(result);
														location.reload();
													}
												}
																		
										})
									} 
						</script>
						<div class="clear"></div>
					</div>
					<!--物流 -->
					{{-- <div class="logistics">
						<h3>选择物流方式</h3>
						<ul class="op_express_delivery_hot">
							<li data-value="yuantong" class="OP_LOG_BTN  "><i class="c-gap-right" style="background-position:0px -468px"></i>圆通<span></span></li>
							<li data-value="shentong" class="OP_LOG_BTN  "><i class="c-gap-right" style="background-position:0px -1008px"></i>申通<span></span></li>
							<li data-value="yunda" class="OP_LOG_BTN  "><i class="c-gap-right" style="background-position:0px -576px"></i>韵达<span></span></li>
							<li data-value="zhongtong" class="OP_LOG_BTN op_express_delivery_hot_last "><i class="c-gap-right" style="background-position:0px -324px"></i>中通<span></span></li>
							<li data-value="shunfeng" class="OP_LOG_BTN  op_express_delivery_hot_bottom"><i class="c-gap-right" style="background-position:0px -180px"></i>顺丰<span></span></li>
						</ul>
					</div> --}}
					<div class="clear"></div>

					<!--支付方式-->
					<div class="logistics">
						<h3>选择支付方式</h3>
						<ul class="pay-list">
							@foreach ($payfunction as $payfunction)
						<li class="pay card"><img src='{{asset("/uploads")}}/{{$payfunction->zfpic}}'  style="max-width:100%"/>{{$payfunction->name}}<span></span></li>
							@endforeach
							@if($total < $account->uyuer)
							<li class="pay taobao"><img src={{asset("Home/images/wallet.png")}}  style="max-width:100%"/>我的账户<span></span></li>
							@else
							<br/><span style="color:red;">(您的账户余额不足，无法使用账户支付这笔订单)</span>
							@endif
						</ul>
					</div>
					<div class="clear"></div>
					<!--订单 -->
					<div class="concent">
						<div id="payTable">
							<h3>确认订单信息</h3>
							<div class="cart-table-th">
								<div class="wp">

									<div class="th th-item">
										<div class="td-inner">商品信息</div>
									</div>
									<div class="th th-price">
										<div class="td-inner">单价</div>
									</div>
									<div class="th th-amount">
										<div class="td-inner">数量</div>
									</div>
									<div class="th th-sum">
										<div class="td-inner">金额</div>
									</div>
								</div>
							</div>
							<div class="clear"></div>
							@foreach ($cart as $cart)
							<tr class="item-list">
								<div class="bundle  bundle-last">

									<div class="bundle-main">
										<ul class="item-content clearfix">
											<div class="pay-phone">
												<li class="td td-item">
													<div class="item-pic">
														<a href="#" class="J_MakePoint">
															<img src='{{asset("/uploads")}}/{{$cart->img}}' style="max-width:100%" class="itempic J_ItemImg"></a>
													</div>
													<div class="item-info">
														<div class="item-basic-info">
														<a href="#" class="item-title J_MakePoint" data-point="tbcart.8.11">{{$cart->goods}}</a>
														</div>
													</div>
												</li>
												<li class="td td-info">
													<div class="item-props">
													<span class="sku-line">类型：{{$cart->tname}}</span>
														<span class="sku-line"></span>
													</div>
												</li>
												<li class="td td-price">
													<div class="item-price price-promo-promo">
														<div class="price-content">
														￥<em class="J_Price price-now">{{$cart->price}}</em>
														</div>
													</div>
												</li>
											</div>
											<li class="td td-amount">
												<div class="amount-wrapper ">
													<div class="item-amount ">
														<span class="phone-title">购买数量</span>
														<div class="sl">
														<input class="text_box" name="" type="text" value="{{$cart->cnum}}" style="width:30px;" disabled/>
														</div>
													</div>
												</div>
											</li>
											<li class="td td-sum">
												<div class="td-inner">
													￥<em tabindex="0" class="J_ItemSum number">{{$cart->numprice}}</em>
												</div>
											</li>
										</ul>
										<div class="clear"></div>

									</div>
							</tr>
							@endforeach
							<div class="clear"></div>
							</div>

							
							<div class="pay-total">
						<!--留言-->
							<div class="order-extra">
							</div>
							<!--优惠券 -->
							<div class="buy-agio">
								{{-- <li class="td td-coupon">

									<span class="coupon-title">优惠券</span>
									<select data-am-selected>
										<option value="a">
											<div class="c-price">
												<strong>￥8</strong>
											</div>
											<div class="c-limit">
												【消费满95元可用】
											</div>
										</option>
										<option value="b" selected>
											<div class="c-price">
												<strong>￥3</strong>
											</div>
											<div class="c-limit">
												【无使用门槛】
											</div>
										</option>
									</select>
								</li> --}}

								{{-- <li class="td td-bonus">

									<span class="bonus-title">红包</span>
									<select data-am-selected>
										<option value="a">
											<div class="item-info">
												¥50.00<span>元</span>
											</div>
											<div class="item-remainderprice">
												<span>还剩</span>10.40<span>元</span>
											</div>
										</option>
										<option value="b" selected>
											<div class="item-info">
												¥50.00<span>元</span>
											</div>
											<div class="item-remainderprice">
												<span>还剩</span>50.00<span>元</span>
											</div>
										</option>
									</select>

								</li> --}}

							</div>
							<div class="clear"></div>
							</div>
							<!--含运费小计 -->
							<div class="buy-point-discharge ">
								<p class="price g_price ">
								合计（免运费） <span>¥</span><em class="pay-sum">10</em>
								</p>
							</div>

							<!--信息 -->
							<div class="order-go clearfix">
								<div class="pay-confirm clearfix">
									<div class="box">
										<div tabindex="0" id="holyshit267" class="realPay"><em class="t">实付款：</em>
											<span class="price g_price ">
                                    <span>¥</span> <em class="style-large-bold-red " id="J_ActualFee">{{$total}}</em>
											</span>
										</div>
										@foreach ($shipping as $shipping)
										@if($shipping->status==1)
										<div id="holyshit268" class="pay-address">
											<p class="buy-footer-address">
												<span class="buy-line-title buy-line-title-type">寄送至：</span>
												<span class="buy--address-detail">
												{{$shipping->acode}}
												</span>
											</p>
											<p class="buy-footer-address">
											<span class="buy-line-title">收货人: </span>
												<span class="buy-address-detail">   
										 <span class="buy-user">{{$shipping->name}} </span>
										 <span class="buy-user">电话: </span>										 
												<span class="buy-phone">{{$shipping->phone}}</span>
												</span>
											</p>
										</div>
										
									</div>

									<div id="holyshit269" class="submitOrder">
										<div class="go-btn-wrap">
											<a id="J_Go" href="JavaScript:;" class="btn-go" tabindex="0" title="点击此按钮，提交订单" onclick="Submit({{$id}},{{$shipping->id}})">提交订单</a>
										@endif
										@endforeach
										</div>
									</div>
									<div class="clear"></div>
								</div>
							</div>
						</div>

						<div class="clear"></div>
					</div>
				</div>
				@include('layouts.Hafter') @section('Htop') @endsection
			</div>
			<script>
				function Submit(id,sid){
					if($('.selected').text()==''){
						layer.msg('请选择支付方式!',{icon:5,time:1000});
						return false;
					}else{
						layer.confirm('确认要支付吗？',function(index){
							$.ajax({
								url:"{{route('Success')}}",
								type:"GET",
								data:{
									_token : 'Yf6RFaM8re5fHXfBNgkUBwsz58fY1UvZXefo55AX',
									'status':'zhifu',
									'shid':sid,
									'id':id,
									'zhifu':$('.selected').text(),
									},
								dataType:"json",
								success:function(result){
									if(result){
										layer.msg('订单已提交',{icon:1,time:1000});
										// layer.close(index); 
											setTimeout(function(){
												window.location.href="{{url('home/Center/Deal/Success')}}"+'/'+result;
										},1000);
									}
								}
														
							})
						},function(){
							$.ajax({
								url:"{{route('Success')}}",
								type:"GET",
								data:{
									_token : 'Yf6RFaM8re5fHXfBNgkUBwsz58fY1UvZXefo55AX',
									'status':'weizhifu',
									'shid':sid,
									'id':id,
									'zhifu':$('.selected').text(),
									},
								dataType:"json",
								success:function(result){
									if(result){
										layer.msg('订单已提交',{icon:1,time:1000});
										// layer.close(index); 
											setTimeout(function(){
												window.location.href="{{url('home/Center/Deal/Success')}}"+'/'+result;
										},1000);
									}
								}
														
							})
						});
					}
					// return false;
				}
			</script>
			<div class="theme-popover-mask"></div>
			<div class="theme-popover">

				<!--标题 -->
				<div class="am-cf am-padding">
					<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">新增地址</strong> / <small>Add address</small></div>
				</div>
				<hr/>

				<div class="am-u-md-12">
					<form class="am-form am-form-horizontal">
						<div class="am-form-group">
							<label for="user-name" class="am-form-label">收货人</label>
							<div class="am-form-content">
								<input type="text" id="user-name" placeholder="收货人">
							</div>
						</div>

						<div class="am-form-group">
							<label for="user-phone" class="am-form-label">手机号码</label>
							<div class="am-form-content">
								<input id="user-phone" placeholder="手机号必填" type="email">
							</div>
						</div>
						<div class="am-form-group">
							<label for="user-intro" class="am-form-label">详细地址</label>
							<div class="am-form-content">
								<textarea class="" rows="3" id="user-intro" placeholder="输入详细地址"></textarea>
								<small>100字以内写出你的详细地址...</small>
							</div>
						</div>

						<div class="am-form-group theme-poptit">
							<div class="am-u-sm-9 am-u-sm-push-3">
								<div class="am-btn am-btn-danger" onclick="submit('11')">保存</div>
								<div class="am-btn am-btn-danger close">取消</div>
							</div>
						</div>
					</form>
				</div>
<script>
	function submit(id){
			$.get('{{route("Address.create")}}',
					{'_token':'{{csrf_token()}}',
					'name':$("#user-name").val(),
					'acode':$('#user-intro').val(),
					'phone':$('#user-phone').val(),
					},function(data) //第二个参数要传token的值 再传参数要用逗号隔开
					{
						// console.log(data);
						layer.msg('已修改!',{icon:1,time:1000});
						setTimeout(function(){
							location.reload();
						},1000);
				});
				return false;
	};
</script>
			</div>

			<div class="clear"></div>
	</body>

</html>