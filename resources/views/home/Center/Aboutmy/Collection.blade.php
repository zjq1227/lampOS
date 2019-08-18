<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>我的收藏</title>

		<link href={{asset("Home/AmazeUI-2.4.2/assets/css/admin.css")}} rel="stylesheet" type="text/css">
		<link href={{asset("Home/AmazeUI-2.4.2/assets/css/amazeui.css")}} rel="stylesheet" type="text/css">

		<link href={{asset("Home/css/personal.css")}} rel="stylesheet" type="text/css">
		<link href={{asset("Home/css/colstyle.css")}} rel="stylesheet" type="text/css">
		<script type="text/javascript" src={{asset("Home/basic/js/jquery-1.7.min.js")}}></script>
		<script src={{asset("admin/layer/layer.js")}} type="text/javascript"></script>  
        <script src={{asset("admin/laydate/laydate.js")}} type="text/javascript"></script>

	</head>

	<body>
		<!--头 -->
		<header>
			<article>
				<div class="mt-logo">
					<!--顶部导航条 -->
					@include('layouts.Hbefore')@section('Htop')@endsection
					

						<div class="clear"></div>
					</div>
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
					<div class="user-collection">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">我的收藏</strong> / <small>My&nbsp;Collection</small></div>
						</div>
						<hr/>
						
						<div class="you-like">
							<div class="s-bar">
								我的收藏
							</div>

							<div class="s-content">
							@foreach($coll as $k=>$v)
								<div class="s-item-wrap" class="container">

									<div class="s-item">
									
										<div class="s-pic">
											<a href="#" class="s-pic-link">
												<img src={{asset("Home/images/0-item_pic.jpg_220x220.jpg")}} alt="包邮s925纯银项链女吊坠短款锁骨链颈链日韩猫咪银饰简约夏配饰" title="包邮s925纯银项链女吊坠短款锁骨链颈链日韩猫咪银饰简约夏配饰" class="s-pic-img s-guess-item-img">
											</a>
											<a class="goods-delete" onclick="demo(this,{{$v->id}})" href="javascript:void(0);">删除<i class="am-icon-trash"></i></a>
										</div>
										<div class="s-info">
											<div class="s-title"><a href="#" title="包邮s925纯银项链女吊坠短款锁骨链颈链日韩猫咪银饰简约夏配饰">{{$v->goods}}</a></div>
											<div class="s-price-box">
												<span class="s-price"><em class="s-price-sign">¥</em><em class="s-value">{{$v->price}}</em></span>
												<span class="s-history-price"><em class="s-price-sign">¥</em><em class="s-value">68.00</em></span>
											</div>
										</div>
									</div>
								</div>
							@endforeach
							</div>

							<div class="s-more-btn i-load-more-item" data-screen="0"></div>
						</div>
					
					</div>				
				</div>
				<div style="float: right;">{{ $coll->links() }}</div>
				<script>
				function demo(obj,id){
			          layer.confirm('是否确定删除？', {
			           btn: ['是','否'] ,//按钮
			           icon:2, 
			          },
			          function(){
			            // alert(id);
			            location.href='{{Url("home/Center/Aboutmy/del")}}'+'/'+id;
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
							<li class="active"> <a href="{{route('Collection')}}">收藏</a></li>
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