<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="csrf-token" content="{{ csrf_token() }}"> 
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
				<form  class="checkzhi" action="{{route("Pay")}}" method="POST" enctype="multipart/form-data">
					{{csrf_field()}}
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
									@if($cart->type!=4)
								<ul class="item-content clearfix">
									@else
									<ul class="item-content clearfix" style="background:DarkGray;">
										@endif
										
									<li class="td td-chk">
										<div class="cart-checkbox ">
											@if($cart->type!=4)
										<input class="check"  name="items[]" value="{{$cart->id}}"  type="checkbox" onclick="pricetotal(this,{{$cart->id}})">
											<label for="J_CheckBox_170037950254"></label>
											@else
											<input class="check"  name="items[]" value="已失效" type="test" style="width:100px;" onclick="pricetotal(this,{{$cart->id}})" disabled/>
											<label for="J_CheckBox_170037950254"></label>
											@endif
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
											@if($cart->type!=4)
										<div class="amount-wrapper ">
											<div class="item-amount ">
												<div class="sl">
													<input class="min am-btn" name="" type="button" value="-" onclick="reduce(this,{{$cart->store}},{{$cart->id}});change(this,{{$cart->store}},{{$cart->id}})"/>
												<input class="text_box" name=""   type="text" value="{{$cart->cnum}}" style="width:30px;" onkeyup="change(this,{{$cart->store}},{{$cart->id}});update(this,{{$cart->store}},{{$cart->id}})" onchange="change(this,{{$cart->store}},{{$cart->id}})"/>
													<input class="add am-btn" name="" type="button" value="+" onclick="plus(this,{{$cart->store}},{{$cart->id}});change(this,{{$cart->store}},{{$cart->id}})"/>
												</div>
											</div>
										</div>
										@endif
									</li>
									@if($cart->type==4)
									<li class="td td-sum2" style="text-align:center;width:10%;line-height:55px;">
									@else
									<li class="td td-sum">
									@endif
										<div class="td-inner">
											@if($cart->type!=4)
												<em tabindex="0" class="J_ItemSum number">{{$cart->tprice*$cart->cnum}}</em>
											@else
													<div class="price-line">
													<em tabindex="0">{{$cart->tprice}}</em>
													</div>
											@endif
										</div>
									</li>
									
									<li class="td td-op">
										<div class="td-inner">
										<a title="移入收藏夹" class="btn-fav" href="javascript:;" onclick="collect({{$cart->gid}},{{$cart->id}})">
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
$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
						for (let i = 0; i < $('.text_box').length; i++) {
							if($('.text_box').val() <=1){
								$('.text_box').eq(i).prev().attr('disabled',true);
							}
							
						}
						// 每个商品的总价
						for (let i = 0; i < $('.J_Price').length; i++) {
							// console.log($('.J_Price').eq(i).text());
							$('.td-sum').eq(i).text(Number($('.J_Price').eq(i).text())*Number($('.text_box').eq(i).val()));
						}
						// allcheck
						function Allelection(obj){
							setTimeout(function(){
							if($(obj).attr('class')=='check-all check'){
								for (var i = 0; i < $('input[type=checkbox]').length; i++) {
										if($(obj).attr('checked')=='checked'){
											$(obj).attr('class','check-all check 2');
											$('input[type=checkbox]').eq(i).attr('checked','checked');
										}
								}
								$('#J_SelectedItemsCount').text(i-1);
							}else{
								for (var i = 0; i < $('input[type=checkbox]').length; i++) {
									$(obj).attr('class','check-all check');
									$('input[type=checkbox]').eq(i).attr('checked',false);
								}
								$('#J_SelectedItemsCount').text(0);
							}
							var formData=new FormData($('.checkzhi')['0']);
									formData.append('status','all');
										$.ajax({ 
										url: "{{route('Shopcart.store')}}",
										type: 'POST', 
										data: formData, 
										contentType: false, 
										processData: false, 
										success: function (returndata) { 
											if(returndata!=''){
												$('#J_Total').text(returndata);
											}else{
												$('#J_Total').text(0);
											}
										}, 
										error: function (returndata) { 
											console.log(returndata); 
										} 
							});
							},10);
						}
						// check
						function pricetotal(obj,id){
							
								$.ajax({
									url:"{{url('home/Shopcart')}}",
									type:"POST",
									data:{
										_token : '<?php echo csrf_token()?>',
										'id':id,
										},
									dataType:"json",
									success:function(result){
										if(result){
											if($(obj).attr('checked')=='checked'){
												$('#J_Total').text(Number($('#J_Total').text())+Number(result));
													var num=Number($('#J_SelectedItemsCount').text())+Number(1);
												$('#J_SelectedItemsCount').text(num);
											}else if($(obj).attr('checked')==undefined){
												$('#J_SelectedItemsCount').text(Number($('#J_SelectedItemsCount').text())-Number(1));
												$('#J_Total').text(Number($('#J_Total').text())-Number(result));
											}
											
										}
									}	
								})
							
							
						}
						// +
						function plus(obj,num,id){
							var znum=num;
							var num=$(obj).parent().children('.text_box').val();
							if(Number(num)-1 >= 0){
								$(obj).parent().children('.min').attr('disabled',false);
							}
							if(num!=0){
								num =Number(num)+Number(1);
							}
							if(num>=znum){
								var num=znum;
								$(obj).prev().val(znum-1);
								$(obj).parent().children('.add').attr('disabled',true);
								return false;
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
										// console.log(result['tprice']);
										if($(obj).parent().parent().parent().parent().siblings('.td-chk').find('input[type=checkbox]').attr('checked')=='checked'){
										$('#J_Total').text(Number($('#J_Total').text())+Number(result['price']));
										}
										$(obj).parents().prev().eq('0').text(result['price']);
										$(obj).parents().next().eq('0').text(result['tprice']);
									}
								}	
							})
						}
						// -
						function reduce(obj,num,id){
							var znum=num;
							// console.log(znum);
							var num=$(obj).parent().children('.text_box').val();
							if(num>=znum){
								var num=znum;
							}
							if(Number(num)-1 == 1){
								$(obj).attr('disabled',true);
								return false;
							}
							if(num!=0){
							num =Number(num)-Number(1);
							}
							setTimeout(function(){								
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
										if($(obj).parent().parent().parent().parent().siblings('.td-chk').find('input[type=checkbox]').attr('checked')=='checked'){
											$('#J_Total').text(Number($('#J_Total').text())-Number(result['price']));
										}
										$(obj).parents().prev().eq('0').text(result['price']);
										$(obj).parents().next().eq('0').text(result['tprice']);
									}
								}	
							})
							},10);
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
							if($(obj).parent().children('.text_box').val()>=num){
								$(obj).parent().children('.text_box').val(num);
								$(obj).parent().children('.add').attr('disabled',true);
								return false;
							}
							if($(obj).parent().children('.text_box').val() <num){
								$(obj).parent().children('.add').attr('disabled',false);
								return false;
							}
						}
						// 删除
						function del(id){
							// console.log(id);
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
											// console.log(result);
											layer.msg('已删除!',{icon:1,time:1000});
											setTimeout(function(){
												location.reload();
											},1000);
										}
									}	
								})
							}
						}
						// 删除all
						function alldel(){
							var formData=new FormData($('.checkzhi')['0']);
							// console.log($('input[type=checkbox]'));
									formData.append('status','all');
										$.ajax({ 
										url: "{{route('Shopcart.alldel')}}",
										type: 'POST', 
										data: formData, 
										contentType: false, 
										processData: false, 
										success: function (returndata) { 
											if(returndata!=''){
												layer.msg('已删除!',{icon:1,time:1000});
												setTimeout(function(){
													location.reload();
												},1000);
												}
										}, 
										error: function (returndata) { 
											layer.msg('你还没有商品选中',{icon:5,time:1000});
										} 
							});
						}
						// 移入收藏
						function collect(gid,id){
							// console.log(gid,id);
							if(gid!=undefined && id!=undefined){
								$.ajax({
									url:"{{route('Collect.store')}}",
									type:"POST",
									data:{
										_token : '<?php echo csrf_token()?>',
										'status':'addshopcart',
										'gid':gid,
										'id':id,
										},
									dataType:"json",
									success:function(result){
											layer.msg('已移入收藏夹',{icon:1,time:1000});
												setTimeout(function(){
													// location.reload();
											},1000);
									}, 
										error: function (returndata) { 
											layer.msg('你还没有商品选中',{icon:1,time:1000});
									} 
															
								});
							}else{
								var formData=new FormData($('.checkzhi')['0']);
								formData.append('status','array');
								$.ajax({
									url:"{{route('Collect.store')}}",
									type:"POST",
									data:formData,
									contentType: false, 
									processData: false, 
									dataType:"json",
									success:function(result){
											layer.msg('已移入收藏夹',{icon:1,time:1000});
												setTimeout(function(){
													// location.reload();
											},1000);
									}, 
										error: function (returndata) { 
											layer.msg('你还没有商品选中',{icon:1,time:1000});
										} 
															
								});
							}
						}
						// 提交购物车
						// function Submit(){
						// 	var formData=new FormData($('.checkzhi')['0']);
						// 		formData.append('status','array');
						// 		window.location.href="home/Center/Deal/Pay/"+formData;
						// }
					</script>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>

				<div class="float-bar-wrapper">
					<div id="J_SelectAll2" class="select-all J_SelectAll">
						<div class="cart-checkbox">
							<input class="check-all check" id="J_SelectAllCbx2" name="select-all" value="true" type="checkbox" onclick="Allelection(this)">
							<label for="J_SelectAllCbx2"></label>
						</div>
						<span>全选</span>
					</div>
					<div class="operations">
						<a href="JavaScript:;" hidefocus="true" onclick="alldel()" class="deleteAll">删除</a>
						<a href="JavaScript:;" hidefocus="true" class="J_BatchFav" onclick="collect()">移入收藏夹</a>
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
							{{-- <a href="Javascript:;" onclick="Submit()" id="J_Go" class="submit-btn submit-btn-disabled" aria-label="请注意如果没有选择宝贝，将无法结算"> --}}
								<button type="submit"  id="J_Go" class="submit-btn submit-btn-disabled" aria-label="请注意如果没有选择宝贝，将无法结算" style="width:100%;border:2px solid #F40;background:#F40;"><span>结&nbsp;算</span></button>
						</div>
					</div>

				</div>
			</form>
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