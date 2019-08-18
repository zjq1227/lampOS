@yield('Htop')
{{-- <script src={{asset("Home/AmazeUI-2.4.2/assets/js/jquery.min.js")}} type="text/javascript"></script> --}}
<script src={{asset("admin/layer/layer.js")}} type="text/javascript" ></script>  
<script type="text/javascript" src={{asset("Home/js/jquery.js")}}></script>

<div class="hmtop">
    <!--顶部导航条 -->
    <div class="am-container header">
        <ul class="message-l">
            <div class="topMessage">
                <div class="menu-hd" >
					{{-- 是否登陆 --}}
					<a href="{{route('Register.index')}}" target="_top">免费注册</a>
                        @if (session('home_login'))
							<a href="javascript:void(0);" onclick="_top()" class="h">用户退出</a>
                        @endif
                        @unless (session('home_login'))
							<a href="{{route('Login.index')}}"  class="h">亲，请登录</a>
                        @endunless
				</div>
				<script>
					function _top(){
						if(confirm("确认退出吗?")){
							$.get('{{route("Login.edit",'tuichu')}}',
								{'_token':'{{csrf_token()}}',
								},function(data) //第二个参数要传token的值 再传参数要用逗号隔开
								{
									if(data==1){
										window.location.href = "{{route('Index')}}";
									}
								});
						}
					}
				</script>
            </div>
        </ul>
        <ul class="message-r">
            <div class="topMessage home">
                <div class="menu-hd"><a href="#" target="_top" class="h">商城首页</a></div>
            </div>
            <div class="topMessage my-shangcheng">
                <div class="menu-hd MyShangcheng"><a href="{{route('Center')}}" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
            </div>
            <div class="topMessage mini-cart">
                <div class="menu-hd"><a id="mc-menu-hd" href="{{route('Shopcart.show',session('home_userinfo')['id'])}}" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">0</strong></a></div>
            </div>
            <div class="topMessage favorite">
				<div class="menu-hd"><a href="{{route('Collection')}}" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
			</div>
			<div class="topMessage favorite">
					<div class="menu-hd"><a href="{{route('ShopAudit.index')}}" target="_top"><i class="am-icon-home am-icon-fw"></i><span>店铺申请</span></a></div>
			</div>
        </ul>
        </div>

        <!--悬浮搜索框-->

        <div class="nav white">
            <div class="logo"><img src={{asset("home/images/logo.png")}} /></div>
            <div class="logoBig">
                <li><img src={{asset("home/images/logobig.png")}} /></li>
            </div>

            <div class="search-bar pr">
                <a name="index_none_header_sysc" href="{{route('Search','empty')}}"></a>
                <form>
                    <input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off">
                    <input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
                </form>
            </div>
        </div>

        <div class="clear"></div>
    </div>
<link href={{asset("Home/basic/css/demo.css")}} rel="stylesheet" type="text/css" />
    <!--引导 -->
		<div class="navCir">
			<li class="active"><a href="home.html"><i class="am-icon-home "></i>首页</a></li>
			<li><a href="sort.html"><i class="am-icon-list"></i>分类</a></li>
			<li><a href="shopcart.html"><i class="am-icon-shopping-basket"></i>购物车</a></li>	
			<li><a href="person/index.html"><i class="am-icon-user"></i>我的</a></li>					
		</div>


		<!--菜单 -->
		@if (session('home_login'))
		<div class=tip>
			<div id="sidebar">
				<div id="wrap">
					<div id="prof" class="item ">
						<a href="# ">
							<span class="setting "></span>
						</a>
						<div class="ibar_login_box status_login ">
							<div class="avatar_box ">
								<p class="avatar_imgbox "><img src= /></p>
								<ul class="user_info ">
									<li>{{session('home_userinfo')['uname']}}</li>
									<li>级&nbsp;别普通会员</li>
								</ul>
							</div>
							<div class="login_btnbox ">
								<a href="# " class="login_order ">我的订单</a>
								<a href="# " class="login_favorite ">我的收藏</a>
							</div>
							<i class="icon_arrow_white "></i>
						</div>

					</div>
					<div id="shopCart " class="item ">
						<a href="# ">
							<span class="message "></span>
						</a>
						<p>
							购物车
						</p>
						<p class="cart_num ">0</p>
					</div>
					<div id="asset " class="item ">
						<a href="# ">
							<span class="view "></span>
						</a>
						<div class="mp_tooltip ">
							我的资产
							<i class="icon_arrow_right_black "></i>
						</div>
					</div>

					<div id="foot " class="item ">
						<a href="# ">
							<span class="zuji "></span>
						</a>
						<div class="mp_tooltip ">
							我的足迹
							<i class="icon_arrow_right_black "></i>
						</div>
					</div>

					<div id="brand " class="item ">
						<a href="#">
							<span class="wdsc "><img src={{asset("home/images/wdsc.png")}} /></span>
						</a>
						<div class="mp_tooltip ">
							我的收藏
							<i class="icon_arrow_right_black "></i>
						</div>
					</div>

					<div id="broadcast " class="item ">
						<a href="# ">
							<span class="chongzhi "><img src={{asset("home/images/chongzhi.png")}} /></span>
						</a>
						<div class="mp_tooltip ">
							我要充值
							<i class="icon_arrow_right_black "></i>
						</div>
					</div>

					<div class="quick_toggle ">
						<li class="qtitem ">
							<a href="# "><span class="kfzx "></span></a>
							<div class="mp_tooltip ">客服中心<i class="icon_arrow_right_black "></i></div>
						</li>
						<!--二维码 -->
						<li class="qtitem ">
							<a href="#none "><span class="mpbtn_qrcode "></span></a>
							<div class="mp_qrcode " style="display:none; "><img src={{asset("home/images/weixin_code_145.png")}} /><i class="icon_arrow_white "></i></div>
						</li>
						<li class="qtitem ">
							<a href="#top " class="return_top "><span class="top "></span></a>
						</li>
					</div>

					<!--回到顶部 -->
					<div id="quick_links_pop " class="quick_links_pop hide "></div>

				</div>

			</div>
			<div id="prof-content " class="nav-content ">
				<div class="nav-con-close ">
					<i class="am-icon-angle-right am-icon-fw "></i>
				</div>
				<div>
					我
				</div>
			</div>
			<div id="shopCart-content " class="nav-content ">
				<div class="nav-con-close ">
					<i class="am-icon-angle-right am-icon-fw "></i>
				</div>
				<div>
					购物车
				</div>
			</div>
			<div id="asset-content " class="nav-content ">
				<div class="nav-con-close ">
					<i class="am-icon-angle-right am-icon-fw "></i>
				</div>
				<div>
					资产
				</div>

				<div class="ia-head-list ">
					<a href="# " target="_blank " class="pl ">
						<div class="num ">0</div>
						<div class="text ">优惠券</div>
					</a>
					<a href="# " target="_blank " class="pl ">
						<div class="num ">0</div>
						<div class="text ">红包</div>
					</a>
					<a href="# " target="_blank " class="pl money ">
						<div class="num ">￥0</div>
						<div class="text ">余额</div>
					</a>
				</div>

			</div>
			<div id="foot-content " class="nav-content ">
				<div class="nav-con-close ">
					<i class="am-icon-angle-right am-icon-fw "></i>
				</div>
				<div>
					足迹
				</div>
			</div>
			<div id="brand-content " class="nav-content ">
				<div class="nav-con-close ">
					<i class="am-icon-angle-right am-icon-fw "></i>
				</div>
				<div>
					收藏
				</div>
			</div>
			<div id="broadcast-content " class="nav-content ">
				<div class="nav-con-close ">
					<i class="am-icon-angle-right am-icon-fw "></i>
				</div>
				<div>
					充值
				</div>
			</div>
		</div>
		<script type="text/javascript">
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
		<script type="text/javascript " src={{asset("Home/basic/js/quick_links.js ")}}></script>
		@endif