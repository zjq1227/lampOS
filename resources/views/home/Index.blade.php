<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>首页</title>

		<link href={{asset("Home/AmazeUI-2.4.2/assets/css/amazeui.css")}} rel="stylesheet" type="text/css" />
		<link href={{asset("Home/AmazeUI-2.4.2/assets/css/admin.css")}} rel="stylesheet" type="text/css" />

		<script type="text/javascript" src={{asset("Home/basic/js/jquery-1.7.min.js")}}></script>
		
		<script src={{asset("admin/layer/layer.js")}} type="text/javascript" ></script>  
		<link href={{asset("Home/css/hmstyle.css")}} rel="stylesheet" type="text/css"/>
		<link href={{asset("Home/css/skin.css")}} rel="stylesheet" type="text/css" />
		<script src={{asset("Home/AmazeUI-2.4.2/assets/js/jquery.min.js")}}></script>
		<script src={{asset("Home/AmazeUI-2.4.2/assets/js/amazeui.min.js")}}></script>
		

	</head>

	<body style="margin: 0 auto;padding:0px;">
		<header>
			@include('layouts.Hbefore') @section('Htop') @endsection
			
		</header>
			<div class="banner">
                      <!--轮播 -->
						<div class="am-slider am-slider-default scoll" data-am-flexslider id="demo-slider-0">
							<ul class="am-slides">
								<li class="banner1"><a href="{{route('Introduction','1')}}"><img src={{asset("home/images/ad1.jpg")}} /></a></li>
								<li class="banner2"><a><img src={{asset("home/images/ad2.jpg")}} /></a></li>
								<li class="banner3"><a><img src={{asset("home/images/ad3.jpg")}} /></a></li>
								<li class="banner4"><a><img src={{asset("home/images/ad4.jpg")}} /></a></li>

							</ul>
						</div>
						<div class="clear"></div>	
			</div>
			<div class="shopNav">
				<div class="slideall">
					
					   <div class="long-title" onmouseover="black(this)" onmouseout="none(this)"><span class="all-goods">全部分类</span></div>
					   <div class="nav-cont">
							<ul>
								<li class="index"><a href="#">首页</a></li>
                                {{-- <li class="qc"><a href="#">闪购</a></li>
                                <li class="qc"><a href="#">限时抢</a></li>
                                <li class="qc"><a href="#">团购</a></li>
                                <li class="qc last"><a href="#">大包装</a></li> --}}
							</ul>
						    <div class="nav-extra">
						    	<i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
						    	<i class="am-icon-angle-right" style="padding-left: 10px;"></i>
						    </div>
						</div>					
		        				
						<!--侧边导航 -->
						<div id="nav" class="navfull">
							<div class="area clearfix">
								<div class="category-content" id="guide_2">
									
									<div class="category" id="nav" style="height:430px;display:none;" onmouseover="black()"  onmouseout="none(this)">
										<script>
											function black(obj){
												$('.category').css('display','inline');
											}
											function none(obj){
												$('.category').css('display','none');
												return false;
											}
										</script>
										<ul class="category-list" id="js_climit_li">
											@foreach ($cates as $cates)
											
											<li class="appliance js_toggle relative first">
												<div class="category-info">
												<h3 class="category-name b-category-name"><i><img src={{asset("home/images/cake.png")}}></i><a href="{{route('Search',$cates->id)}}" class="ml-22" title="{{$cates->cname}}">{{$cates->cname}}</a></h3>
													<em>&gt;</em></div>
												<div class="menu-item menu-in top">
													<div class="area-in">
														<div class="area-bg">
															<div class="menu-srot">
																<div class="sort-side">
																	@foreach ($cates->level2 as $cates2)
																	<dl class="dl-sort">
																		<dt><span title="{{$cates2->cname}}"><a style="color:#db3e54;" href="{{route('Search',$cates2->id)}}">{{$cates2->cname}}</a></span></dt>
																		@foreach ($cates2->level3 as $cates3)
																		@if($cates3->count!='0')
																		<dd><a title="{{$cates3->cname}}" href="{{route('Search',$cates3->id)}}">{{$cates3->cname}}<span></span></a></dd>
																		@else
																		<dd><a title="{{$cates3->cname}}" href="#">11<span></span></a></dd>
																		@endif
																		@endforeach
																	</dl>
																	@endforeach
																</div>
																
																<div class="brand-side">
																	<dl class="dl-sort"><dt><span>实力商家</span></dt>
																		<dd><a rel="nofollow" title="呵官方旗舰店" target="_blank" href="#" rel="nofollow"><span  class="red" >呵官方旗舰店</span></a></dd>
																	</dl>
																</div>
															</div>
														</div>
													</div>
												</div>
											
												@endforeach
												<b class="arrow"></b>	
											</li>
										</ul>
									</div>
								</div>

							</div>
						</div>
						
						
						<!--轮播-->
						
						<script type="text/javascript">
							(function() {
								$('.am-slider').flexslider();
							});
							$(document).ready(function() {
								$("li").hover(function() {
									$(".category-content .category-list li.first .menu-in").css("display", "none");
									$(".category-content .category-list li.first").removeClass("hover");
									$(this).addClass("hover");
									$(this).children("div.menu-in").css("display", "block")
								}, function() {
									$(this).removeClass("hover")
									$(this).children("div.menu-in").css("display", "none")
								});
							})
						</script>



					<!--小导航 -->
					<div class="am-g am-g-fixed smallnav">
						<div class="am-u-sm-3">
							<a href="sort.html"><img src={{asset("home/images/navsmall.jpg")}} />
								<div class="title">商品分类</div>
							</a>
						</div>
						<div class="am-u-sm-3">
							<a href="#"><img src={{asset("home/images/huismall.jpg")}} />
								<div class="title">大聚惠</div>
							</a>
						</div>
						<div class="am-u-sm-3">
							<a href="#"><img src={{asset("home/images/mansmall.jpg")}} />
								<div class="title">个人中心</div>
							</a>
						</div>
						<div class="am-u-sm-3">
							<a href="#"><img src={{asset("home/images/moneysmall.jpg")}} />
								<div class="title">投资理财</div>
							</a>
						</div>
					</div>

					<!--走马灯 -->

					<div class="marqueen">
						<span class="marqueen-title">商城头条</span>
						<div class="demo">

							<ul>
								<li class="title-first"><a target="_blank" href="#">
									<img src={{asset("home/images/TJ2.jpg")}}></img>
									<span>[特惠]</span><i onmouseover="dai(this)">商城爆品1分秒</i>								
								</a></li>
								<li class="title-first"><a target="_blank" href="#">
									<span>[公告]</span><i onmouseover="dai(this)">商城与广州市签署战略合作协议</i>
								     <img src={{asset("home/images/TJ.jpg")}}></img>
								     <p>XXXXXXXXXXXXXXXXXX</p>
							    </a></li>
							    
						<div class="mod-vip">
							{{-- 登陆中状态 --}}
							@if(session('home_login'))
							<div class="m-baseinfo">
								<a href="#">
									<img src="{{asset("/uploads")}}/{{$users['profile']}}">
								</a>
								<em>
								Hi,<span class="s-name">{{$users['uname']}}</span>
									<a href="#"><p>点击更多优惠活动</p></a>									
								</em>
							</div>
							<div class="member-login" style="display: inline;">
							<a href="{{route('Order')}}" onmouseover="dai(this)"><strong>0</strong>待收货</a>
									<a href="{{route('Order')}}" onmouseover="dai(this)"><strong>0</strong>待发货</a>
									<a href="{{route('Order')}}" onmouseover="dai(this)"><strong>0</strong>待付款</a>
									<a href="{{route('Order')}}" onmouseover="dai(this)"><strong>0</strong>待评价</a>
							</div>
							<script>
								function dai(obj){
									$(obj).css('color','#F40');
									$(obj).hover(function(){
										$(obj).css('color','#F40');
									},function(){
										$(obj).css('color','black');
									})
								}
							</script>
							@endif
							{{-- 未登录 --}}
							@unless(session('home_login'))
								<<div class="m-baseinfo">
										<a href="#">
											<img src={{asset("home/images/getAvatar.do.jpg")}}>
										</a>
										<em>
											Hi,<span class="s-name">小叮当</span>
											<a href="#"><p>点击更多优惠活动</p></a>									
										</em>
									</div>
									<div class="member-logout">
										<a class="am-btn-warning btn" href="{{route('Login.index')}}">登陆</a>
										<a class="am-btn-warning btn" href="{{route('Register.index')}}">注册</a>
									</div>
							@endunless
							
							<div class="clear"></div>	
						</div>																	    
							    
								<li><a  href="#"><span>[特惠]</span><i onmouseover="dai(this)">洋河年末大促，低至两件五折</i></a></li>
								<li><a  href="#"><span>[公告]</span><i onmouseover="dai(this)">华北、华中部分地区配送延迟</i></a></li>
								<li><a 	href="#"><span>[特惠]</span><i onmouseover="dai(this)">家电狂欢千亿礼券 买1送1！</i></a></li>
								
							</ul>
                        <div class="advTip"><img src={{asset("home/images/advTip.jpg")}}/></div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<script type="text/javascript">
				function abc2(obj,id){
					
				}
				// 添加足迹
				function foots(id){
					// console.log(id);
					$.ajax({
						url:"{{route('Foot.store')}}",
						type:"POST",
						data:{
							_token : '<?php echo csrf_token()?>',
							'status':'addshopcart',
							'gid':id,
							},
						dataType:"json",
						success:function(result){
							if(result){
							}
						}
												
					});
				}
				// 添加购物车
				function addShopcart(id,num,sid){ 
					console.log(id,num,sid);
					$.ajax({
						url:"{{url('home/Shopcart/add')}}"+'/'+id,
						type:"POST",
						data:{
							_token : '<?php echo csrf_token()?>',
							'status':'clickadd',
							'gid':id,
							'num':num,
							'name':'原味',
							'sid':sid,
							},
						dataType:"json",
						success:function(result){
							if(result){
								// console.log(result);
								layer.msg('已填入购物车!',{icon:1,time:1000});
								return false;
							}
						}
												
					});
				}
				function abc(obj,id){
					$.ajax({ 
					url: "{{url('home/Index/Show')}}"+'/'+id,
					type: 'GET', 
					success: function (returndata) { 
						if(returndata){
							for (var i = 0; i < returndata.length; i++) {
								console.log(returndata[i]['id']);
								if(i>=1){
									$(obj).parents('.floodFour').children('#goodsimg1').html("<a href='Details/Introduction/"+returndata['1']['id']+"' onclick='foots("+returndata['1']['id']+")'><div class='outer-con'><div class='title'>"+returndata['1']['goods']+"</div><div class='sub-title'>"+returndata['1']['price']+" 元</div></div><img src='../uploads/"+returndata['1']['picname']+"'></a><i class='am-icon-shopping-basket am-icon-md  seprate' onclick='addShopcart("+returndata['1']['id']+",1,"+returndata['1']['sid']+")'></i>");
								}
								if(i>=0){
									$(obj).parents('.floodFour').children('#goodsimg2').html("<a href='Details/Introduction/"+returndata['0']['id']+"' onclick='foots("+returndata['0']['id']+")'><div class='outer-con'><div class='title'>"+returndata['0']['goods']+"</div><div class='sub-title'>"+returndata['0']['price']+" 元</div></div><img src='../uploads/"+returndata['0']['picname']+"'></a><i class='am-icon-shopping-basket am-icon-md  seprate' onclick='addShopcart("+returndata['0']['id']+",1,"+returndata['0']['sid']+")'></i>");
								}
								if(i>=2){
									$(obj).parents('.floodFour').children('#goodsimg3').html("<a href='Details/Introduction/"+returndata['2']['id']+"' onclick='foots("+returndata['2']['id']+")'><div class='outer-con'><div class='title'>"+returndata['2']['goods']+"</div><div class='sub-title'>"+returndata['2']['price']+" 元</div></div><img src='../uploads/"+returndata['2']['picname']+"'></a><i class='am-icon-shopping-basket am-icon-md  seprate' onclick='addShopcart("+returndata['2']['id']+",1,"+returndata['2']['sid']+")'></i>");
								}
								if(i>=3){
									$(obj).parents('.floodFour').children('#goodsimg4').html("<a href='Details/Introduction/"+returndata['3']['id']+"' onclick='foots("+returndata['3']['id']+")'><div class='outer-con'><div class='title'>"+returndata['3']['goods']+"</div><div class='sub-title'>"+returndata['3']['price']+" 元</div></div><img src='../uploads/"+returndata['3']['picname']+"'></a><i class='am-icon-shopping-basket am-icon-md  seprate' onclick='addShopcart("+returndata['3']['id']+",1,"+returndata['3']['sid']+")'></i>");
								}
								if(i>=4){
								$(obj).parents('.floodFour').children('#goodsimg5').html("<a href='Details/Introduction/"+returndata['4']['id']+"' onclick='foots("+returndata['4']['id']+")'><div class='outer-con'><div class='title'>"+returndata['4']['goods']+"</div><div class='sub-title'>"+returndata['4']['price']+" 元</div></div><img src='../uploads/"+returndata['4']['picname']+"'></a><i class='am-icon-shopping-basket am-icon-md  seprate' onclick='addShopcart("+returndata['4']['id']+",1,"+returndata['4']['id']+")'></i>");
								}
								if(i>=5){
								$(obj).parents('.floodFour').children('#goodsimg6').html("<a href='Details/Introduction/"+returndata['5']['id']+"' onclick='foots("+returndata['5']['id']+")'><div class='outer-con'><div class='title'>"+returndata['5']['goods']+"</div><div class='sub-title'>"+returndata['5']['price']+" 元</div></div><img src='../uploads/"+returndata['5']['picname']+"'></a><i class='am-icon-shopping-basket am-icon-md  seprate' onclick='addShopcart("+returndata['5']['id']+",1,"+returndata['5']['id']+")'></i>");
								}
							}
						}
					}, 
					error: function (returndata) { 
						console.log(returndata); 
					} 
					}); 
				}
					if ($(window).width() < 640) {
						function autoScroll(obj) {
							$(obj).find("ul").animate({
								marginTop: "-39px"
							}, 500, function() {
								$(this).css({
									marginTop: "0px"
								}).find("li:first").appendTo(this);
							})
						}
						$(function() {
							setInterval('autoScroll(".demo")', 3000);
						})
					}
				</script>
			</div>
			<div class="shopMainbg">
				<div class="shopMain" id="shopmain">

					<!--今日推荐 -->

					<div class="am-g am-g-fixed recommendation">
						<div class="clock am-u-sm-3" >
							<img src={{asset("home/images/2016.png")}}></img>
							<p>今日<br>推荐</p>
						</div>
						<div class="am-u-sm-4 am-u-lg-3 ">
							<div class="info ">
								<h3>真的有鱼</h3>
								<h4>开年福利篇</h4>
							</div>
							<div class="recommendationMain one">
								<a href="{{route('Introduction','1')}}"><img src={{asset("home/images/tj.png")}}></img></a>
							</div>
						</div>						
						<div class="am-u-sm-4 am-u-lg-3 ">
							<div class="info ">
								<h3>囤货过冬</h3>
								<h4>让爱早回家</h4>
							</div>
							<div class="recommendationMain two">
								<img src={{asset("home/images/tj1.png")}}></img>
							</div>
						</div>
						<div class="am-u-sm-4 am-u-lg-3 ">
							<div class="info ">
								<h3>浪漫情人节</h3>
								<h4>甜甜蜜蜜</h4>
							</div>
							<div class="recommendationMain three">
								<img src={{asset("home/images/tj2.png")}}></img>
							</div>
						</div>

					</div>
					<div class="clear "></div>
					<!--热门活动 -->

					{{-- <div class="am-container activity ">
						<div class="shopTitle ">
							<h4>活动</h4>
							<h3>每期活动 优惠享不停 </h3>
							<span class="more ">
                              <a href="# ">全部活动<i class="am-icon-angle-right" style="padding-left:10px ;" ></i></a>
                        </span>
						</div>
					  <div class="am-g am-g-fixed ">
						<div class="am-u-sm-3 ">
							<div class="icon-sale one "></div>	
								<h4>秒杀</h4>							
							<div class="activityMain ">
								<img src={{asset("home/images/activity1.jpg")}}></img>
							</div>
							<div class="info ">
								<h3>春节送礼优选</h3>
							</div>														
						</div>
						
						<div class="am-u-sm-3 ">
						  <div class="icon-sale two "></div>	
							<h4>特惠</h4>
							<div class="activityMain ">
								<img src={{asset("home/images/activity2.jpg")}}></img>
							</div>
							<div class="info ">
								<h3>春节送礼优选</h3>								
							</div>							
						</div>						
						
						<div class="am-u-sm-3 ">
							<div class="icon-sale three "></div>
							<h4>团购</h4>
							<div class="activityMain ">
								<img src={{asset("home/images/activity3.jpg")}}></img>
							</div>
							<div class="info ">
								<h3>春节送礼优选</h3>
							</div>							
						</div>						

						<div class="am-u-sm-3 last ">
							<div class="icon-sale "></div>
							<h4>超值</h4>
							<div class="activityMain ">
								<img src={{asset("home/images/activity.jpg")}}></img>
							</div>
							<div class="info ">
								<h3>春节送礼优选</h3>
							</div>													
						</div>

					  </div>
                   </div> --}}
					<div class="clear "></div>

					@foreach ($gcates as $cates)
                    <div id="f1">
					<!--甜点-->
					<div class="am-container ">
						<div class="shopTitle ">
						<h4>{{$cates->cname}}</h4>
							<h3>每一道商品都有一个故事</h3>
							<div class="today-brands ">
								@foreach ($cates->level2 as $cates2)
									<a href="{{route('Search',$cates2->id)}}" >{{$cates2->cname}}</a>
								@endforeach
							</div>
							<span class="more ">
                    <a href="# ">更多美味<i class="am-icon-angle-right" style="padding-left:10px ;" ></i></a>
                        </span>
						</div>
					</div>
					@if($cates->count != 0)
					<div class="am-g am-g-fixed floodFour">
						<div class="am-u-sm-5 am-u-md-4 text-one list ">
							<div class="word">
								@foreach ($cates->level2 as $cates2)
								<a class="outer" href="JavaScript:;" onclick="abc(this,{{$cates2->id}})" ><span class="inner"><b class="text" style="font-size:10px;">{{$cates2->cname}}</b></span></a>	
								@endforeach			
							</div>
							<a href="# ">
								<div class="outer-con ">
									<div class="title ">
									开抢啦！
									</div>
									<div class="sub-title ">
										零食大礼包
									</div>									
								</div>
                                  <img src={{asset("home/images/act1.png")}} />								
							</a>
							<div class="triangle-topright"></div>						
						</div>
						
							<div class="am-u-sm-7 am-u-md-4 text-two sug" id="goodsimg1"></div>
							<div class="am-u-sm-7 am-u-md-4 text-two" id="goodsimg2"></div>
							<div class="am-u-sm-3 am-u-md-2 text-three big" id="goodsimg3"></div>
							<div class="am-u-sm-3 am-u-md-2 text-three sug" id="goodsimg4"></div>
							<div class="am-u-sm-3 am-u-md-2 text-three" id="goodsimg5"></div>
							<div class="am-u-sm-3 am-u-md-2 text-three last big" id="goodsimg6"></div>
					</div>
					
					@else
					<div class="am-g am-g-fixed flood method3 ">
							<ul class="am-thumbnails ">
									@foreach ($cates->goods1 as $goods)
								<li>
									<div class="list" style="background:#e8e8e8;">
									<a href="{{route('Introduction',$goods->id)}}">
										<img src="../uploads/{{$goods->picname}}" />
										<div class="pro-title ">{{$goods->goods}}</div>
										<span class="e-price ">{{$goods->price}} 元</span>
										</a>
									</div>
									
								</li>
								@endforeach
							</ul>
	
						</div>
					@endif
                 <div class="clear "></div>  
				 </div>
				 @endforeach
				 
				 {{--  --}}
		
					<div class="clear "></div>
					</div>
					@include('layouts.Hafter') @section('bottom') @endsection
		</div>
		</div>
		
		<script>
			window.jQuery || document.write('<script src="basic/js/jquery.min.js "><\/script>');
		</script>
		<script type="text/javascript " src={{asset("Home/basic/js/quick_links.js ")}}></script>
	</body>

</html>