<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta name="csrf-token" content="{{ csrf_token() }}"> 
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Cache-Control" content="no-siteapp" />
 <link href={{asset("admin/css/bootstrap.min.css")}} rel="stylesheet" />
        <link rel="stylesheet" href={{asset("admin/css/style.css")}}/> 
        <link href={{asset("Home/AmazeUI-2.4.2/assets/css/amazeui.css")}} rel="stylesheet" type="text/css">
        <link href={{asset("Home/AmazeUI-2.4.2/assets/css/admin.css")}} rel="stylesheet" type="text/css">
		<link href={{asset("Home/AmazeUI-2.4.2/assets/css/amazeui.css")}} rel="stylesheet" type="text/css">
		<link href={{asset("Home/css/personal.css")}} rel="stylesheet" type="text/css">
		<link href={{asset("Home/css/infstyle.css")}} rel="stylesheet" type="text/css">      
        {{-- <link href={{asset("admin/css/codemirror.css")}} rel="stylesheet"> --}}
        {{-- <link rel="stylesheet" href={{asset("admin/css/ace.min.css")}} /> --}}
        {{-- <link rel="stylesheet" href={{asset("admin/font/css/font-awesome.min.css")}} /> --}}
        <!--[if lte IE 8]>
		  <link rel="stylesheet" href={{asset("admin/css/ace-ie.min.css")}} />
		<![endif]-->
		<script src={{asset("js/jquery-1.9.1.min.js")}}></script>
        <script src={{asset("admin/js/bootstrap.min.js")}}></script>
		<script src={{asset("admin/js/typeahead-bs2.min.js")}}></script>           	
        <script src={{asset("admin/layer/layer.js")}} type="text/javascript" ></script>          
        <script src={{asset("admin/laydate/laydate.js")}} type="text/javascript"></script>
        
<title>交易金额</title>
</head>

<body>
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
@if($users['uname']!='' && $users['email']!='' && $users['phone']!='' && $usersinfo['name']!='' && $usersinfo['idcard']!='')
<div>
    <div class="margin clearfix">
    <div class="detailed_style clearfix">
        {{-- 企业显示 --}}
    @if($shop['type']==1)
        <em class="type" style="background-image:url(../Admin/images/ban1.png)"></em>
    @elseif($shop['type']==2)
        <em class="type" style="background-image:url(../Admin/images/ban2.png)"></em>
    @elseif($shop['type']=='')
        <em class="type"></em>
    @endif
    {{-- 头像 --}}
    @if($shop['audit']!='2')
        @if($shop['img']=='')
        <div class="shop_logo" id="type"><img src={{asset("admin/images/detailnoimg.png")}} id="shop-img" style="width:190px;height:140px;"/></div>
        <form id="imgform" enctype="multipart/form-data">
        {{ csrf_field() }}
        <ul class="shop_content clearfix">
            <input id="upload-input" style="position: absolute; top: 0; bottom: 0; left: 0;right: 0; opacity: 0;height:140px;width:190px;" name="pic" type="file" accept="image/gif, image/jpg, image/png" onchange="img(this)"/>
        </form>
        @elseif($shop['img']!='')
            <div class="shop_logo"><img src="{{asset("/uploads")}}/{{$shop['img']}}" id="shop-img" style="width:190px;height:140px;"/></div>
            <ul class="shop_content clearfix">
        @endif
    @else
    <div class="shop_logo" id="type"><img src="{{asset("/uploads")}}/{{$shop['img']}}" id="shop-img" style="width:190px;height:140px;"/></div>
    <form id="imgform" enctype="multipart/form-data">
    {{ csrf_field() }}
    <ul class="shop_content clearfix">
        <input id="upload-input" style="position: absolute; top: 0; bottom: 0; left: 0;right: 0; opacity: 0;height:140px;width:190px;" name="pic" type="file" accept="image/gif, image/jpg, image/png" onchange="img(this)"/>      
    </form>
    @endif
        {{-- 店铺名称 --}}
        <li class="shop_name"><label class="label_name">店铺名称：</label>
        @if($shop['audit']!='2')
            @if($shop['sname']=='')
                <input type="text" name="shop-name" style="border:1px solid white;" class="info" placeholder="请输入您要申请的店铺名">
            @elseif($shop['sname']!='')
                <span class="info">{{$shop['sname']}}</span>
            @endif
        @else
            <input type="text" name="shop-name" style="border:1px solid white;" class="info" value="{{$shop['sname']}}" placeholder="请输入您要申请的店铺名">
        @endif
        <div class="Authenticate"><i class="icon-yxrz"></i><i class="icon-yhk"></i><i class="icon-sjrz"></i><i class="icon-grxx"></i></div></li>
        
        <li><label class="label_name">店铺类型：</label>
        <span class="info">
            {{-- 类型 --}}
            @if($shop['audit']!='2')
                @if($shop['type']=='')
                <select style="border:1px solid white;" name="shop-type" onchange="select(this)">
                    <option value="1">个人店铺</option>
                    <option value="2">企业店铺</option>
                </select>
                @elseif($shop['type']==1)
                    <span class="info">个人店铺</span>
                @elseif($shop['type']==2)
                    <span class="info">企业店铺</span>
                @endif
            @else
                <select style="border:1px solid white;" name="shop-type" onchange="select(this)">
                    @if($shop['type']==1)
                        <option value="1" selected>个人店铺</option>
                        <option value="2">企业店铺</option>
                    @elseif($shop['type']==2)
                        <option value="1">个人店铺</option>
                        <option value="2" selected>企业店铺</option>
                    @endif
                </select>
            @endif
        </span></li>
        <script>
            function select(obj){
                if($(obj).val()!=1){
                    $('.type').css('background-image','url(../Admin/images/ban2.png)');
                }else{
                    $('.type').css('background-image','url(../Admin/images/ban1.png)');
                }
            }
        </script>
        <li><label class="label_name">店铺分类：</label><span class="info">
            {{-- 分类 --}}
            {{-- 如果被拒绝 --}}
            @if($shop['audit']!='2')
                {{-- 如果为空  --}}
                @if($shop['cid']=='')
                    <select style="border:1px solid white;" name="shop-c">
                        {{-- 遍历分类 --}}
                    @if($cates['0']['id']!='')
                    @foreach ($cates as $cates)
                        <option value="{{$cates['id']}}" >{{$cates['cname']}}</option>
                    @endforeach
                    @endif
                    </select>
                    {{-- 如果不为控 --}}
                @elseif($shop['cid']!='')
                    <span class="info">{{$shop['cid']}}</span>   
                @elseif($shop['cid']==0)
                    <span class="info">暂无选择分类</span>
                @endif
            @else
                <select style="border:1px solid white;" name="shop-c">
                    @foreach ($cates as $cates)
                        @if($cates['id'] == $shop['cid'])
                            <option value="{{$cates['id']}}" selected>{{$cates['cname']}}</option>
                        @else
                            <option value="{{$cates['id']}}" >{{$cates['cname']}}</option>
                        @endif
                    @endforeach
                </select>
            @endif
        </span></li>
        {{-- 审核时间 --}}
        <li><label class="label_name">申请时间：</label>
            @if($shop['created_at']=='')
                <span class="info">2016-4-3</span>
            @elseif($shop['created_at']!='' || $shop['audit'])
                <span class="info">{{$shop['created_at']}}</span>
            @endif
        </li>
        {{-- 审核状态 --}}
        <li><label class="label_name">状&nbsp;&nbsp;&nbsp;&nbsp;态：</label>
            @if($shop['audit']=='1')
                <span class="info">通过</span>
            @elseif($shop['audit']=='2')
                <span class="info">拒绝</span>
            @elseif($shop['audit']=='3')
                <span class="info">待审核</span>
            @elseif($shop['audit']=='')
                <span class="info">未申请</span>
            @endif
        </li>
    <li><label class="label_name">申请人姓名：</label><span class="info" name="shop-name">{{$usersinfo['name']}}</span></li>
        <li><label class="label_name">移动电话：</label>
            {{-- 手机号 --}}
            {{-- 如果被拒绝 --}}
            @if($shop['audit']!='2')
                {{-- 如果为空 --}}
                @if($shop['phone']=='')
                    <span class="info"><input style="border:1px solid white;width:90px;" type="text" name="shop-phone" placeholder="请填写手机号" value="{{$users->phone}}"></span></li>
                {{-- 如果不为空 --}}
                @elseif($shop['phone']!='')
                    <span class="info">{{$shop['phone']}}</span>
                @endif
             @else
             <span class="info"><input style="border:1px solid white;width:90px;" type="text" name="shop-phone" placeholder="请填写手机号" value="{{$shop['phone']}}"></span></li>
            @endif
            <li><label class="label_name">电子邮箱：</label>
            {{-- 邮箱 --}}
            {{-- 如果被拒绝 --}}
            @if($shop['audit']!='2')
                {{-- 如果为空 --}}
                @if($shop['email']=='')
                    <span class="info"><input  style="border:1px solid white;width:100px;"type="email" name="shop-email" id="" placeholder="请填写邮箱" value="{{$users->email}}"></span></li>
                    {{-- 如果不为空 --}}
                    @elseif($shop['email']!='')
                    <span class="info">{{$shop['email']}}</span>
                @endif
            @else
                <span class="info"><input  style="border:1px solid white;width:100px;"type="email" name="shop-email" id="" placeholder="请填写邮箱" value="{{$shop['email']}}"></span></li>
            @endif
            <li><label class="label_name">固定电话：</label><span class="info">{{$users->phone}}</span></li>
            {{-- 身份证号 --}}
        <li><label class="label_name">身份证号：</label><span class="info" name="shop-idcard">{{$usersinfo['idcard']}}</span></li>
    </ul>
    </div>
    @if($shop['audit']==2)
    <div class="Store_Introduction">
        <br>
            您的店铺申请已被拒绝
            以下是拒绝您的理由:<div class="title_name">拒绝理由</div>
            <div class="info  text-danger">
                {{$shop['reason']}}
            </div>
    </div>
    @endif
    <div class="Store_Introduction">
    <div class="title_name">店铺介绍</div>
    <br>
    <div class="info">
        @if($shop['audit']!=2)
            @if($shop['intro']=='')
                <textarea   cols="100" rows="5" id="shop-intro" placeholder="请填写店铺介绍"></textarea>
            @else
                <textarea   cols="100" rows="5" id="shop-intro" placeholder="请填写店铺介绍" disabled>{{$shop['intro']}}</textarea>
            @endif
        @else
                <textarea   cols="100" rows="5" id="shop-intro" placeholder="请填写店铺介绍" >{{$shop['intro']}}</textarea>
        @endif
    </div>
    <small>
    <div class="info">
    淘宝店铺介绍怎么写，只写上一句话或一段话，再加上淘宝平台默认名片式的基本信息，和联系方式。简单明了。例如：
    <p>1、欢迎光临本店，本店新开张，诚信经营，只赚信誉不赚钱，谢谢。</p>
    <p>2、本店商品均属正品，假一罚十信誉保证。欢迎广大顾客前来放心选购，我们将竭诚为您服务!</p>
    <p>3、本店专门营销什么什么商品，假一罚十信誉保证。本店的服务宗旨是用心服务，以诚待人!</p>
    二、消息型的淘宝店铺介绍书写方式：
    淘宝店铺介绍怎么写，就是将店铺最新的优惠活动发布在淘宝店铺介绍里，这种类型不但能吸引喜欢优惠活动的新买家，如果是时间段优惠更能促使买家下定决心，尽快购买。
    <br />
    四、详细型的淘宝店铺介绍书写方式：
    淘宝店铺介绍怎么写，你不可能知道每个买家到你的淘宝店铺介绍页面里想了解什么，可以考虑把所有的都写进去。另外，还有购物流程、联系方式、物流方式、售后服务、温馨提示等等都统统写上去。但是一定要花时间好好排版。内容多，字体不能太大，正常就可以了，然后一段内容的标题要加粗或者加上颜色，比如给售后服务加粗，然后售后服务的内容则用正常字体，这样每段内容配上一个加粗标题，买家一点进淘宝店铺介绍，第一眼明显看到的都是几个加粗标题，能很快找到自己想了解的就有耐心看下去。就像本篇文章一样，没有一些加粗的字体，读者不从头读起，就找不到各段内容的主要针对点。
    </div>
    </small>
    </div>
    </div>
  
</div>
{{-- 提交 --}}
<script>
$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
    function img(obj){
        var formData = new FormData($("#imgform")[0]);
        formData.append('file',$(obj)[0].files[0]);
        $.ajax({ 
        url: "{{route('ShopAudit.store')}}",
        type: 'POST', 
        data: formData, 
        contentType: false, 
        processData: false, 
        success: function (returndata) { 
            $('#shop-img').attr('src','../uploads'+'/'+returndata);
        }, 
        error: function (returndata) { 
            console.log(returndata); 
        } 
        }); 
                                    
      
    }
    function submit(obj,id){
        // console.log(id);return false;
        if(id==undefined){
            if($('#upload-input').val()==''){
                alert('请添加头像');
                return false;
            }
            var id="null";
        }else{
            var id=id;
        }
        $.ajax({
            url:"{{url('home/ShopAudit/create')}}",
            type:"GET",
            data:{
                id,
                 _token : '<?php echo csrf_token()?>',
                 'cid':$('select[name=shop-c]').val(),
                 'sname':$('span[name=shop-name]').text(),
                 'idcard':$('span[name=shop-idcard]').text(),
                 'type':$('select[name=shop-type]').val(),
                 'phone':$('input[name=shop-phone]').val(),
                 'email':$('input[name=shop-email]').val(),
                 'intro':$('#shop-intro').val(),
                 },
            dataType:"json",
            success:function(result){
                console.log(1);
                if(result){
                    alert("提交成功");
                    window.location.href = "{{route('ShopAudit.index')}}";
                }
            }
                                    
        })
    }
</script>
 {{-- <div class="Store_Introduction">
  <div class="title_name">其他认证</div>
  <div class="info">
   
  </div>
 </div> --}}
 <div class="At_button">
     @if($shop['audit']!='2' || $shop['id']=='')
        @if($shop['audit']=='')
            <button class="btn btn-primary radius" type="submit" onclick="submit(this)">提 交 申 请</button>
        @elseif($shop['audit']=='1')
            <button class="btn btn-primary radius" type="submit" onclick="window.location.href = '{{route('login')}}'">登陆管理页面</button>
        @endif
    @else
            <button class="btn btn-primary radius" type="submit" onclick="submit(this,{{$shop['id']}})">重 新 申 请</button>
    @endif
 </div>
</div>
@elseif($users['phone']=='' || $users['email']=='' || $usersinfo['name']=='' || $usersinfo['idcard']=='')
<div class="margin clearfix">
        <div class="detailed_style clearfix">
        <ul class="shop_content clearfix" style="height:100px">
            <li class="shop_name"><b style="font-size:22px;">我要开店铺~~</b>
            </li>
        </ul>
        </div>
</div>
<div style="text-align:center;line-height:center;">
<img src="{{asset('Home/images/XwDBOjCNTXDsJfm.png')}}" alt="">
        您的身份信息不够完善
</div>
@endif
<div style="text-align:center;line-height:center;margin-top:1%;">
@if($users['phone']=='')
    <a href="{{route('Bindphone')}}" class="btn btn-danger radius">手机号尚未绑定</a>
    
@endif
@if($users['zpwd']=='')
        <a href="{{route('Setpay')}}"  class="btn btn-danger radius">尚未启动支付密码</a>
@endif
@if($users['email']=='')
        <a href="{{route('Email')}}"  class="btn btn-danger radius">邮箱尚未绑定</a>
@endif
@if($usersinfo['name']=='' || $usersinfo['idcard']=='')
        <a href="{{route('Idcard')}}"  class="btn btn-danger radius">尚未实名认证</a>
@endif
</div>
</body>
</html>
<script>
//通过
var index = parent.layer.getFrameIndex(window.name);
parent.layer.iframeAuto(index);
 function through_save(obj,id){
	 layer.confirm('确认要开通该店铺吗？',function(index){
		layer.msg('已开通!',{icon:1,time:1000});
		location.href="Shops_Audit.html";
		parent.$('#parentIframe').css("display","none");
		parent.$('.Current_page').css({"color":"#333333"});
	});
	 
	 
	 }
	 
	 //返回操作
function return_close(){
	location.href="Shop_Audit.blade.php";
	parent.$('#parentIframe').css("display","none");
	parent.$('.Current_page').css({"color":"#333333"});
	
	}

		/*字数限制*/
function checkLength(which) {
	var maxChars = 500; //
	if(which.value.length > maxChars){
	   layer.open({
	   icon:2,
	   title:'提示框',
	   content:'您输入的字数超过限制!',	
    });
		// 超过限制的字数了就将 文本框中的内容按规定的字数 截取
		which.value = which.value.substring(0,maxChars);
		return false;
	}
};
</script>
