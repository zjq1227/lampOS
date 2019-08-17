<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>购物车页面</title>

		<link href={{asset("Home/AmazeUI-2.4.2/assets/css/amazeui.css")}} rel="stylesheet" type="text/css" />
		<link href={{asset("Home/basic/css/demo.css")}} rel="stylesheet" type="text/css" />
		<link href={{asset("Home/css/cartstyle.css")}} rel="stylesheet" type="text/css" />
		<link href={{asset("Home/css/optstyle.css")}} rel="stylesheet" type="text/css" />

		<script type="text/javascript" src={{asset("Home/js/jquery.js")}}></script>

	</head>

	<body>

		<!--顶部导航条 -->
		<div class="am-container header">
				@include('layouts.Hbefore') @section('Htop') @endsection
			<div class="clear"></div>

			<!--购物车 -->
			<div class="concent">
				<div id="cartTable">
					<div class="cart-table-th">
						<div class="wp">
							<div class="th th-chk">
								<div id="J_SelectAll1" class="select-all J_SelectAll">

								</div>
							</div>
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
							<div class="th th-op">
								<div class="td-inner">操作</div>
							</div>
						</div>
					</div>
					<div class="clear"></div>
					@foreach ($cart as $cart)
						
					
					<tr class="item-list">
						<div class="bundle  bundle-last ">
							{{-- <div class="bundle-hd">
								<div class="bd-promos">
									<div class="bd-has-promo">已享优惠:<span class="bd-has-promo-content">省￥19.50</span>&nbsp;&nbsp;</div>
									<div class="act-promo">
										<a href="#" target="_blank">第二支半价，第三支免费<span class="gt">&gt;&gt;</span></a>
									</div>
									<span class="list-change theme-login">编辑</span>
								</div>
							</div> --}}
							<div class="clear"></div>
							<div class="bundle-main">
								<ul class="item-content clearfix">
									<li class="td td-chk">
										<div class="cart-checkbox ">
										<input class="check" id="{{$cart->id}}" name="items[]" value="{{$cart->id}}" type="checkbox" onclick="total({{$cart->id}})">
											<label for="J_CheckBox_170037950254"></label>
										</div>
									</li>
									<li class="td td-item">
										<div class="item-pic">
										<a href="#" target="_blank" data-title="{{$cart->goods}}" class="J_MakePoint" data-point="tbcart.8.12">
												<img src="{{asset("uploads")}}/{{$cart->picname}}" style="max-width:100%;max-height:100%;" class="itempic J_ItemImg"></a>
										</div>
										<div class="item-info">
											<div class="item-basic-info">
												<a href="#" target="_blank" title="{{$cart->goods}}" class="item-title J_MakePoint" data-point="tbcart.8.11">{{$cart->goods}}</a>
											</div>
										</div>
									</li>
									<li class="td td-info">
										<div class="item-props">
										<span class="sku-line">口味：{{$cart->tname}}</span>
											{{-- <span tabindex="0" class="btn-edit-sku theme-login">修改</span> --}}
											<i class="theme-login am-icon-sort-desc"></i>
										</div>
									</li>
									<li class="td td-price">
										<div class="item-price price-promo-promo">
											<div class="price-content">
												<div class="price-line">
													{{-- <em class="price-original"></em> --}}
												</div>
												<div class="price-line">
												<em class="J_Price price-now" tabindex="0">{{$cart->tprice}}</em>
												</div>
											</div>
										</div>
									</li>
									<li class="td td-amount">
										<div class="amount-wrapper ">
											<div class="item-amount ">
												<div class="sl">
													<input class="min am-btn" name="" type="button" value="-" onclick="reduce(this,{{$cart->store}},{{$cart->id}});change(this,{{$cart->store}},{{$cart->id}})"/>
												<input class="text_box" name=""   type="text" value="{{$cart->cnum}}" style="width:30px;" onkeyup="change(this,{{$cart->store}},{{$cart->id}});update(this,{{$cart->store}},{{$cart->id}})" onchange="change(this,{{$cart->store}},{{$cart->id}})"/>
													<input class="add am-btn" name="" type="button" value="+" onclick="plus(this,{{$cart->store}},{{$cart->id}})"/>
												</div>
											</div>
										</div>
									</li>
									<li class="td td-sum">
										<div class="td-inner">
											<em tabindex="0" class="J_ItemSum number">117.00</em>
										</div>
									</li>
									<li class="td td-op">
										<div class="td-inner">
										<a title="移入收藏夹" class="btn-fav" href="#">
                  移入收藏夹</a>
											<a href="javascript:;" onclick="del({{$cart->id}})" data-point-url="#" class="delete">
                  删除</a>
										</div>
									</li>
								</ul>
								
							</div>
						</div>
					</tr>

					@endforeach
					<script>
						// 每个商品的总价
						for (let i = 0; i < $('.J_Price').length; i++) {
							console.log($('.J_Price').eq(i).text());
							$('.td-sum').eq(i).text(Number($('.J_Price').eq(i).text())*Number($('.text_box').eq(i).val()));
						}
						// check
						function total(id){
							
						}
						// +
						function plus(obj,num,id){
							var num=$(obj).parent().children('.text_box').val();
							if(Number(num)-1 >= 0){
								$(obj).parent().children('.min').attr('disabled',false);
							}
							if(num!=0){
								num =Number(num)+Number(1);
							}
							$.ajax({
								url:"{{url('home/Shopcart')}}"+'/'+id,
								type:"PUT",
								data:{
									_token : '<?php echo csrf_token()?>',
									'num':num,
									},
								dataType:"json",
								success:function(result){
									if(result){
										console.log(result['tprice']);
										$(obj).parents().prev().eq('0').text(result['price']);
										$(obj).parents().next().eq('0').text(result['tprice']);
									}
								}	
							})
						}
						// -
						function reduce(obj,num,id){
							var num=$(obj).parent().children('.text_box').val();
							if(Number(num)-1 == 1){
								$(obj).attr('disabled',true);
							}
							if(num!=0){
							num =Number(num)-Number(1);
							}
							$.ajax({
								url:"{{url('home/Shopcart')}}"+'/'+id,
								type:"PUT",
								data:{
									_token : '<?php echo csrf_token()?>',
									'num':num,
									},
								dataType:"json",
								success:function(result){
									if(result){
										$(obj).parents().prev().eq('0').text(result['price']);
										$(obj).parents().next().eq('0').text(result['tprice']);
									}
								}	
							})
						}
						// 修改
						function update(obj,num,id){
							var num = $(obj).val();
							$.ajax({
								url:"{{url('home/Shopcart')}}"+'/'+id,
								type:"PUT",
								data:{
									_token : '<?php echo csrf_token()?>',
									'num':num,
									},
								dataType:"json",
								success:function(result){
									if(result){
										$(obj).parents().prev().eq('0').text(result['price']);
										$(obj).parents().next().eq('0').text(result['tprice']);
									}
								}	
							})
						}
						function change(obj,num,id){
							if($(obj).parent().children('.text_box').val()<='0'){
								$(obj).parent().children('.text_box').val('1');
							}
							if($(obj).parent().children('.text_box').val()>num){
								$(obj).parent().children('.text_box').val(num)
							}
						}
						function del(id){
							console.log(id);
							if(id){
								$.ajax({
									url:"{{url('home/Shopcart/')}}"+'/'+id,
									type:"DELETE",
									data:{
										_token : '<?php echo csrf_token()?>',
										},
									dataType:"json",
									success:function(result){
										if(result){
											console.log(result);
											layer.msg('已删除!',{icon:1,time:1000});
											setTimeout(function(){
												location.reload();
											},1000);
										}
									}	
								})
							}
						}
					</script>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>

				<div class="float-bar-wrapper">
					<div id="J_SelectAll2" class="select-all J_SelectAll">
						<div class="cart-checkbox">
							<input class="check-all check" id="J_SelectAllCbx2" name="select-all" value="true" type="checkbox">
							<label for="J_SelectAllCbx2"></label>
						</div>
						<span>全选</span>
					</div>
					<div class="operations">
						<a href="" hidefocus="true" class="deleteAll">删除</a>
						<a href="#" hidefocus="true" class="J_BatchFav">移入收藏夹</a>
					</div>
					<div class="float-bar-right">
						<div class="amount-sum">
							<span class="txt">已选商品</span>
							<em id="J_SelectedItemsCount">0</em><span class="txt">件</span>
							<div class="arrow-box">
								<span class="selected-items-arrow"></span>
								<span class="arrow"></span>
							</div>
						</div>
						<div class="price-sum">
							<span class="txt">合计:</span>
							<strong class="price">¥<em id="J_Total">0.00</em></strong>
						</div>
						<div class="btn-area">
							<a href="{{route('Pay')}}" id="J_Go" class="submit-btn submit-btn-disabled" aria-label="请注意如果没有选择宝贝，将无法结算">
								<span>结&nbsp;算</span></a>
						</div>
					</div>

				</div>

				@include('layouts.Hafter') @section('bottom') @endsection

			</div>

			<!--操作页面-->

			<div class="theme-popover-mask"></div>

			
		<!--引导 -->
		<div class="navCir">
			<li><a href="home.html"><i class="am-icon-home "></i>首页</a></li>
			<li><a href="sort.html"><i class="am-icon-list"></i>分类</a></li>
			<li class="active"><a href="shopcart.html"><i class="am-icon-shopping-basket"></i>购物车</a></li>	
			<li><a href="person/index.html"><i class="am-icon-user"></i>我的</a></li>					
		</div>
	</body>

</html>