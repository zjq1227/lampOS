<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>我的足迹</title>

		<link href={{asset("Home/AmazeUI-2.4.2/assets/css/admin.css")}} rel="stylesheet" type="text/css">
		<link href={{asset("Home/AmazeUI-2.4.2/assets/css/amazeui.css")}} rel="stylesheet" type="text/css">

		<link href={{asset("Home/css/personal.css")}} rel="stylesheet" type="text/css">
		<link href={{asset("Home/css/footstyle.css")}} rel="stylesheet" type="text/css">
		<script type="text/javascript" src={{asset("Home/basic/js/jquery-1.7.min.js")}}></script>
		<script src={{asset("admin/layer/layer.js")}} type="text/javascript"></script>  
        <script src={{asset("admin/laydate/laydate.js")}} type="text/javascript"></script>


	</head>

	<body>
		<!--头 -->
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

					<div class="user-foot">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">我的足迹</strong> / <small>Browser&nbsp;History</small></div>
						</div>
						<hr/>

						<!--足迹列表 -->
						<hr>
						@foreach($foot as $k=>$v )
						<div class="goods" class="container">
							<div class="goods-box first-box">
								<div class="goods-pic">
									<div class="goods-pic-box">
										<a class="goods-pic-link" target="_blank" href="#" title="意大利费列罗进口食品巧克力零食24粒  进口巧克力食品">
											<img src={{asset("Home/images/TB1_pic.jpg_200x200.jpg")}} class="goods-img"></a>
									</div>
									<a class="goods-delete" onclick="demo(this,{{$v->id}})" href="javascript:void(0);"><i class="am-icon-trash"></i></a>
									<div class="goods-status goods-status-show"><span class="desc">宝贝热卖中</span></div>
								</div>
								<div class="goods-attr">
									<div class="good-title">
										<a class="title" href="#" target="_blank">{{$v->goods}}</a>
									</div>
									<div class="goods-price">
										<span class="g_price">                                    
                                        <span>¥</span><strong>{{$v->price}}</strong>
										</span>
										<span class="g_price g_price-original">                                    
                                        <span>¥</span><strong>142</strong>
										</span>
									</div>
									<div class="clear"></div>
									<div class="goods-num">
									</div>
								</div>
							</div>
						</div>
						@endforeach
						
					</div>	
				</div>
				<div style="float: right;">{{ $foot->links() }}</div>
				<script>
				function demo(obj,id){
			          layer.confirm('是否确定删除？', {
			           btn: ['是','否'] ,//按钮
			           icon:2, 
			          },
			          function(){
			            // alert(id);
			            location.href='{{Url("home/Center/Aboutmy/Footdel")}}'+'/'+id;
			            },);
			        };
					$('.pagination').each(function(){
						for (var i = $('.pagination').children('li').length - 1; i >= 0; i--) {
							$('.pagination').children('li').eq(i).css('display','inline');
							$('.pagination').children('li').children('a').eq(i).css('font-size','20px');
							$('.pagination').children('li').children('span').eq(i).css('font-size','20px');
						}
					})
				</script>
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
							<li> <a href="{{route('Bill')}}">账单明细</a></li>
						</ul>
					</li>

					<li class="person">
						<a href="#">我的小窝</a>
						<ul>
							<li> <a href="{{route('Collection')}}">收藏</a></li>
							<li class="active"> <a href="{{route('Foot')}}">足迹</a></li>
							<li> <a href="{{route('Comment')}}">评价</a></li>
							<li> <a href="{{route('News')}}">消息</a></li>
						</ul>
					</li>

				</ul>

			</aside>

		</div>

	</body>

</html>