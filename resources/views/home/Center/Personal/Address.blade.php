<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>地址管理</title>

		<link href={{asset("Home/AmazeUI-2.4.2/assets/css/admin.css")}} rel="stylesheet" type="text/css">
		<link href={{asset("Home/AmazeUI-2.4.2/assets/css/amazeui.css")}} rel="stylesheet" type="text/css">

		<link href={{asset("Home/css/personal.css")}} rel="stylesheet" type="text/css">
		<link href={{asset("Home/css/addstyle.css")}} rel="stylesheet" type="text/css">
		<script src={{asset("Home/AmazeUI-2.4.2/assets/js/jquery.min.js")}} type="text/javascript"></script>
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

					<div class="user-address">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">地址管理</strong> / <small>Address&nbsp;list</small></div>
						</div>
						<hr/>
						<ul class="am-avg-sm-1 am-avg-md-3 am-thumbnails">
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
										<span class="province">湖北</span>省
										<span class="city">武汉</span>市
										<span class="dist">洪山</span>区
										<span class="street">{{$item->acode}}</span></p>
								</div>
								<div class="new-addr-btn">
									<a href="{{route('Address.show',$item->id)}}"><i class="am-icon-edit"></i>编辑</a>
									<span class="new-addr-bar">|</span>
									<a href="javascript:void(0);" onClick="delClick($item->id);"><i class="am-icon-trash"></i>删除</a>
								</div>
							</li>
							@elseif($item->status==0)
								<li class="user-addresslist">
									<span class="new-option-r" onclick="status({{$item->id}})"><i class="am-icon-check-circle"></i>设为默认</span>
									<p class="new-tit new-p-re">
									<span class="new-txt">{{$item->name}}</span>
										<span class="new-txt-rd2">{{$item->phone}}</span>
									</p>
									<div class="new-mu_l2a new-p-re">
										<p class="new-mu_l2cw">
											<span class="title">地址：</span>
											<span class="province">湖北</span>省
											<span class="city">武汉</span>市
											<span class="dist">洪山</span>区
											<span class="street">{{$item->acode}}</span></p>
									</div>
									<div class="new-addr-btn">
									<a href="{{route('Address.show',$item->id)}}"><i class="am-icon-edit"></i>编辑</a>
										<span class="new-addr-bar">|</span>
										<a href="javascript:void(0);" onclick="delClick({{$item->id}});"><i class="am-icon-trash"></i>删除</a>
									</div>
								</li>
							@endif
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
														layer.msg('已删除!',{icon:5,time:1000});
														setTimeout(function(){
															location.reload();
														},1000);
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
														layer.msg('已修改!',{icon:1,time:1000});
														setTimeout(function(){
															location.reload();
														},1000);
													}
												}
																		
										})
									} 
								</script>
							@endforeach
						</ul>
						<div class="clear"></div>
						<a class="new-abtn-type" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0}">添加新地址</a>
						<!--例子-->
						<div class="am-modal am-modal-no-btn" id="doc-modal-1">

							<div class="add-dress">

								<!--标题 -->
								<div class="am-cf am-padding">
									<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">新增地址</strong> / <small>Add&nbsp;address</small></div>
								</div>
								<hr/>

								<div class="am-u-md-12 am-u-lg-8" style="margin-top: 20px;">
								<form class="am-form am-form-horizontal">
										<div class="am-form-group">
											<label for="user-name" class="am-form-label">收货人</label>
											<div class="am-form-content">
												<input type="text" id="user-name"  placeholder="收货人">
											</div>
										</div>

										<div class="am-form-group">
											<label for="user-phone" class="am-form-label">手机号码</label>
											<div class="am-form-content">
												<input id="user-phone" placeholder="手机号必填" type="text">
											</div>
										</div>
										{{-- <div class="am-form-group">
											<label for="user-address" class="am-form-label">所在地</label>
											<div class="am-form-content address">
												<select data-am-selected>
													<option value="a">浙江省</option>
													<option value="b" selected>湖北省</option>
												</select>
												<select data-am-selected>
													<option value="a">温州市</option>
													<option value="b" selected>武汉市</option>
												</select>
												<select data-am-selected>
													<option value="a">瑞安区</option>
													<option value="b" selected>洪山区</option>
												</select>
											</div>
										</div> --}}

										<div class="am-form-group">
											<label for="user-intro" class="am-form-label">详细地址</label>
											<div class="am-form-content">
												<textarea class="" rows="3" id="user-intro" placeholder="输入详细地址"></textarea>
												<small>100字以内写出你的详细地址...</small>
											</div>
										</div>

										<div class="am-form-group">
											<div class="am-u-sm-9 am-u-sm-push-3">
												<input type="submit" class="am-btn am-btn-danger" value="保存">
												<a href="javascript: void(0)" class="am-close am-btn am-btn-danger" data-am-modal-close>取消</a>
											</div>
										</div>
									</form>
								</div>

							</div>

						</div>

					</div>
					<script>
						$('input[type="submit"]').click(function(){
							$.get('{{route("Address.create")}}',
									{'_token':'{{csrf_token()}}',
									'name':$("#user-name").val(),
									'acode':$('#user-intro').val(),
									'phone':$('#user-phone').val(),
									},function(data) //第二个参数要传token的值 再传参数要用逗号隔开
									{
										// console.log(data);
										if(data==1){
											layer.msg('已添加!',{icon:1,time:1000});
											window.location.href = "{{route('Address.index')}}";
										}
								});
								return false;
						});
					</script>
					<script type="text/javascript">
						$(document).ready(function() {							
							$(".new-option-r").click(function() {
								$(this).parent('.user-addresslist').addClass("defaultAddr").siblings().removeClass("defaultAddr");
							});
							
							var $ww = $(window).width();
							if($ww>640) {
								$("#doc-modal-1").removeClass("am-modal am-modal-no-btn")
							}
							
						})
					</script>

					<div class="clear"></div>

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
							<li> <a href="{{route('Information.index')}}">个人信息</a></li>
							<li> <a href="{{route('Safety.index')}}">安全设置</a></li>
							<li class="active"> <a href="{{route('Address.index')}}">收货地址</a></li>
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