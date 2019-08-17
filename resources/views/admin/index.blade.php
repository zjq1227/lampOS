<html>
    <head></head>
    <body>
	@include('layouts.Abefore') @section('content') @endsection
        <div class="main-container" id="main-container">
            <script type="text/javascript">try {
                    ace.settings.check('main-container', 'fixed')
                } catch(e) {}</script>
            <div class="main-container-inner">
                <a class="menu-toggler" id="menu-toggler" href="#">
                    <span class="menu-text"></span>
                </a>
                <div class="sidebar" id="sidebar">
                    <script type="text/javascript">try {
                            ace.settings.check('sidebar', 'fixed')
                        } catch(e) {}</script>
                    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
                        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                            <a class="btn btn-success">
                                <i class="icon-signal"></i>
                            </a>
                            <a class="btn btn-info">
                                <i class="icon-pencil"></i>
                            </a>
                            <a class="btn btn-warning">
                                <i class="icon-group"></i>
                            </a>
                            <a class="btn btn-danger">
                                <i class="icon-cogs"></i>
                            </a>
                        </div>
                        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                            <span class="btn btn-success"></span>
                            <span class="btn btn-info"></span>
                            <span class="btn btn-warning"></span>
                            <span class="btn btn-danger"></span>
                        </div>
                    </div>
                    <!-- #sidebar-shortcuts -->
                    <div id="menu_style" class="menu_style">
                        <ul class="nav nav-list" id="nav_list">
                            <li class="home">
                                <a href="javascript:void(0)" name="{{ route('home')}}" class="iframeurl" title="">
                                    <i class="icon-home"></i>
                                    <span class="menu-text">系统首页</span></a>
                            </li>
                            <li>
                                <a href="#" class="dropdown-toggle">
                                    <i class="icon-user"></i>
                                    <span class="menu-text">会员管理</span>
                                    <b class="arrow icon-angle-down"></b>
                                </a>
                                <ul class="submenu">
                                    <li class="home">
                                        <a href="javascript:void(0)" name="{{route('Umember')}}" title="会员列表" class="iframeurl">
                                            <i class="icon-double-angle-right"></i>会员列表</a>
                                    </li>
                                    <li class="home">
                                        <a href="javascript:void(0)" name="{{route('Umember_Grading')}}" title="等级管理" class="iframeurl">
                                            <i class="icon-double-angle-right"></i>等级管理</a>
                                    </li>
                                    <li class="home">
                                        <a href="javascript:void(0)" name="{{route('Umember_Record')}}" title="会员记录管理" class="iframeurl">
                                            <i class="icon-double-angle-right"></i>会员记录管理</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="dropdown-toggle">
                                    <i class="icon-group"></i>
                                    <span class="menu-text">管理员管理</span>
                                    <b class="arrow icon-angle-down"></b>
                                </a>
                                <ul class="submenu">
                                    <li class="home">
                                        <a href="javascript:void(0)" name="{{route('Uadmin_Competence')}}" title="权限管理" class="iframeurl">
                                            <i class="icon-double-angle-right"></i>权限管理</a>
                                    </li>
                                    <li class="home">
                                        <a href="javascript:void(0)" name="{{route('Uadmin_Istrator')}}" title="管理员列表" class="iframeurl">
                                            <i class="icon-double-angle-right"></i>管理员列表</a>
                                    </li>
                                    <li class="home">
                                        <a href="javascript:void(0)" name="{{route('Uadmin_Info')}}" title="个人信息" class="iframeurl">
                                            <i class="icon-double-angle-right"></i>个人信息</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="dropdown-toggle">
                                    <i class="icon-desktop"></i>
                                    <span class="menu-text">产品管理</span>
                                    <b class="arrow icon-angle-down"></b>
                                </a>
                                <ul class="submenu">
                                    <li class="home">
                                        <a href="javascript:void(0)" name="{{route('Product','empty')}}" title="产品类表" class="iframeurl">
                                            <i class="icon-double-angle-right"></i>产品类表</a>
                                    </li>
                                    <li class="home">
                                        <a href="javascript:void(0)" name="{{route('Brand')}}" title="品牌管理" class="iframeurl">
                                            <i class="icon-double-angle-right"></i>品牌管理</a>
                                    </li>
                                    <li class="home">
                                        <a href="javascript:void(0)" name="{{route('Category')}}" title="分类管理" class="iframeurl">
                                            <i class="icon-double-angle-right"></i>分类管理</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="dropdown-toggle">
                                    <i class="icon-picture "></i>
                                    <span class="menu-text">图片管理</span>
                                    <b class="arrow icon-angle-down"></b>
                                </a>
                                <ul class="submenu">
                                    <li class="home">
                                        <a href="javascript:void(0)" name="{{route('PictureAdvertising')}}" title="广告管理" class="iframeurl">
                                            <i class="icon-double-angle-right"></i>广告管理</a>
                                    </li>
                                    <li class="home">
                                        <a href="javascript:void(0)" name="{{route('Picture_Sortads')}}" title="分类管理" class="iframeurl">
                                            <i class="icon-double-angle-right"></i>分类管理</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="dropdown-toggle">
                                    <i class="icon-list"></i>
                                    <span class="menu-text">交易管理</span>
                                    <b class="arrow icon-angle-down"></b>
                                </a>
                                <ul class="submenu">
                                    <li class="home">
                                        <a href="javascript:void(0)" name="{{route('Transaction')}}" title="交易信息" class="iframeurl">
                                            <i class="icon-double-angle-right"></i>交易信息</a>
                                    </li>
                                    <li class="home">
                                        <a href="javascript:void(0)" name="{{route('Order_Chart')}}" title="交易订单（图）" class="iframeurl">
                                            <i class="icon-double-angle-right"></i>交易订单(图)</a>
                                    </li>
                                    <li class="home">
                                        <a href="javascript:void(0)" name="{{route('Orderform')}}" title="订单管理" class="iframeurl">
                                            <i class="icon-double-angle-right"></i>订单管理</a>
                                    </li>
                                    <li class="home">
                                        <a href="javascript:void(0)" name="{{route('Order_Amounts')}}" title="交易金额" class="iframeurl">
                                            <i class="icon-double-angle-right"></i>交易金额</a>
                                    </li>
                                    <li class="home">
                                        <a href="javascript:void(0)" name="{{route('Order_Handling')}}" title="订单处理" class="iframeurl">
                                            <i class="icon-double-angle-right"></i>订单处理</a>
                                    </li>
                                    <li class="home">
                                        <a href="javascript:void(0)" name="{{route('Refund')}}" title="退款管理" class="iframeurl">
                                            <i class="icon-double-angle-right"></i>退款管理</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="dropdown-toggle">
                                    <i class="icon-credit-card"></i>
                                    <span class="menu-text">支付管理</span>
                                    <b class="arrow icon-angle-down"></b>
                                </a>
                                <ul class="submenu">
                                    <li class="home">
                                        <a href="javascript:void(0)" name="{{route('Management')}}" title="账户管理" class="iframeurl">
                                            <i class="icon-double-angle-right"></i>账户管理</a>
                                    </li>
                                    <li class="home">
                                        <a href="javascript:void(0)" name="{{route('Method')}}" title="支付方式" class="iframeurl">
                                            <i class="icon-double-angle-right"></i>支付方式</a>
                                    </li>
                                    <li class="home">
                                        <a href="javascript:void(0)" name="{{route('Configure')}}" title="支付配置" class="iframeurl">
                                            <i class="icon-double-angle-right"></i>支付配置</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="dropdown-toggle">
                                    <i class="icon-laptop"></i>
                                    <span class="menu-text">店铺管理</span>
                                    <b class="arrow icon-angle-down"></b>
                                </a>
                                <ul class="submenu">
                                    <li class="home">
                                        <a href="javascript:void(0)" name="{{route('Shop_List','empty')}}" title="店铺列表" class="iframeurl">
                                            <i class="icon-double-angle-right"></i>店铺列表</a>
                                    </li>
                                    <li class="home">
                                        <a href="javascript:void(0)" name="{{route('Shop_Audit')}}" title="店铺审核" class="iframeurl">
                                            <i class="icon-double-angle-right"></i>店铺审核
                                        <span class="badge badge-danger">{{$count}}</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="dropdown-toggle">
                                    <i class="icon-comments-alt"></i>
                                    <span class="menu-text">消息管理</span>
                                    <b class="arrow icon-angle-down"></b>
                                </a>
                                <ul class="submenu">
                                    <li class="home">
                                        <a href="javascript:void(0)" name="{{route('Message_Guestbook')}}" title="留言列表" class="iframeurl">
                                            <i class="icon-double-angle-right"></i>留言列表</a>
                                    </li>
                                    <li class="home">
                                        <a href="javascript:void(0)" name="{{route('Message_Feedback')}}" title="意见反馈" class="iframeurl">
                                            <i class="icon-double-angle-right"></i>意见反馈</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="dropdown-toggle">
                                    <i class="icon-bookmark"></i>
                                    <span class="menu-text">文章管理</span>
                                    <b class="arrow icon-angle-down"></b>
                                </a>
                                <ul class="submenu">
                                    <li class="home">
                                        <a href="javascript:void(0)" name="{{route('Article_List')}}" title="文章列表" class="iframeurl">
                                            <i class="icon-double-angle-right"></i>文章列表</a>
                                    </li>
                                    <li class="home">
                                        <a href="javascript:void(0)" name="{{route('Article_Sort')}}" title="分类管理" class="iframeurl">
                                            <i class="icon-double-angle-right"></i>分类管理</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="dropdown-toggle">
                                    <i class="icon-cogs"></i>
                                    <span class="menu-text">系统管理</span>
                                    <b class="arrow icon-angle-down"></b>
                                </a>
                                <ul class="submenu">
                                    <li class="home">
                                        <a href="javascript:void(0)" name="{{route('System')}}" title="系统设置" class="iframeurl">
                                            <i class="icon-double-angle-right"></i>系统设置</a>
                                    </li>
                                    <li class="home">
                                        <a href="javascript:void(0)" name="{{route('System_Section')}}" title="系统栏目管理" class="iframeurl">
                                            <i class="icon-double-angle-right"></i>系统栏目管理</a>
                                    </li>
                                    <li class="home">
                                        <a href="javascript:void(0)" name="{{route('System_Logs')}}" title="系统日志" class="iframeurl">
                                            <i class="icon-double-angle-right"></i>系统日志</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <script type="text/javascript">$("#menu_style").niceScroll({
                            cursorcolor: "#888888",
                            cursoropacitymax: 1,
                            touchbehavior: false,
                            cursorwidth: "5px",
                            cursorborder: "0",
                            cursorborderradius: "5px"
                        });</script>
                    <div class="sidebar-collapse" id="sidebar-collapse">
                        <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
                    </div>
                    <script type="text/javascript">try {
                            ace.settings.check('sidebar', 'collapsed')
                        } catch(e) {}</script>
                </div>
                <div class="main-content">
                    <script type="text/javascript">try {
                            ace.settings.check('breadcrumbs', 'fixed')
                        } catch(e) {}</script>
                    <div class="breadcrumbs" id="breadcrumbs">
                        <ul class="breadcrumb">
                            <li>
                                <i class="icon-home home-icon"></i>
                                <a href="index.html">首页</a></li>
                            <li class="active">
                                <span class="Current_page iframeurl"></span>
                            </li>
                            <li class="active" id="parentIframe">
                                <span class="parentIframe iframeurl"></span>
                            </li>
                            <li class="active" id="parentIfour">
                                <span class="parentIfour iframeurl"></span>
                            </li>
                        </ul>
                    </div>
                    <iframe id="iframe" style="border:0; width:100%; background-color:#FFF;" name="iframe" frameborder="0" src="{{ route('home')}}"></iframe>
                    <!-- /.page-content --></div>
                <!-- /.main-content -->
                <div class="ace-settings-container" id="ace-settings-container">
                    <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
                        <i class="icon-cog bigger-150"></i>
                    </div>
                    <div class="ace-settings-box" id="ace-settings-box">
                        <div>
                            <div class="pull-left">
                                <select id="skin-colorpicker" class="hide">
                                    <option data-skin="default" value="#438EB9">#438EB9</option>
                                    <option data-skin="skin-1" value="#222A2D">#222A2D</option>
                                    <option data-skin="skin-2" value="#C6487E">#C6487E</option>
                                    <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option></select>
                            </div>
                            <span>&nbsp; 选择皮肤</span></div>
                        <div>
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
                            <label class="lbl" for="ace-settings-sidebar">固定滑动条</label></div>
                        <div>
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
                            <label class="lbl" for="ace-settings-rtl">切换到左边</label></div>
                        <div>
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
                            <label class="lbl" for="ace-settings-add-container">切换窄屏
                                <b></b>
                            </label>
                        </div>
                    </div>
                </div>
                <!-- /#ace-settings-container --></div>
            <!-- /.main-container-inner --></div>
        <!--底部样式-->
        <div class="footer_style" id="footerstyle">
            <script type="text/javascript">try {
                    ace.settings.check('footerstyle', 'fixed')
                } catch(e) {}</script>
            <p class="l_f">版权所有：NumberOne专业开发</p>
            <p class="r_f">qq：775747758</p></div>
        <!--修改密码样式-->
        <div class="change_Pass_style" id="change_Pass">
            <ul class="xg_style">
                <li>
                    <label class="label_name">原&nbsp;&nbsp;密&nbsp;码</label>
                    <input name="原密码" type="password" class="" id="password" /></li>
                <li>
                    <label class="label_name">新&nbsp;&nbsp;密&nbsp;码</label>
                    <input name="新密码" type="password" class="" id="Nes_pas" /></li>
                <li>
                    <label class="label_name">确认密码</label>
                    <input name="再次确认密码" type="password" class="" id="c_mew_pas" /></li>
            </ul>
        </div>
        <!-- /.main-container -->
        <!-- basic scripts -->
		</body>

</html>