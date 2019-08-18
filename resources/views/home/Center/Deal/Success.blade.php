<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>付款成功页面</title>
<link rel="stylesheet"  type="text/css" href={{asset("Home/AmazeUI-2.4.2/assets/css/amazeui.css")}}/>
<link href={{asset("Home/AmazeUI-2.4.2/assets/css/admin.css")}} rel="stylesheet" type="text/css">
<link href={{asset("Home/basic/css/demo.css")}} rel="stylesheet" type="text/css" />

<link href={{asset("Home/css/sustyle.css")}} rel="stylesheet" type="text/css" />
<script type="text/javascript" src={{asset("Home/basic/js/jquery-1.7.min.js")}}></script>

</head>

<body>


<!--顶部导航条 -->
@include('layouts.Hbefore') @section('Htop') @endsection
<div class="clear"></div>
<div class="take-delivery">
 <div class="status">
@if($order->status=='0')
   <h2>您已成功付款</h2>
   <div class="successInfo">
     <ul>
     <li>付款金额<em>¥{{$order->total}}</em></li>
@else
  <h2>您已成功提交订单</h2>
  <div class="successInfo">
    <ul>
@endif
       <div class="user-info">
         <p>收货人：{{$order->name}}</p>
       <p>联系电话：{{$order->phone}}</p>
         <p>收货地址：{{$order->acode}}</p>
       </div>
             请认真核对您的收货信息，如有错误请联系客服            
     </ul>
     <div class="option">
       <span class="info">您可以</span>
        <a href="{{route('Order')}}" class="J_MakePoint">查看<span>已买到的宝贝</span></a>
        <a href="{{route('Orderinfo')}}" class="J_MakePoint">查看<span>交易详情</span></a>
     </div>
    </div>
  </div>
</div>
<div class="footer" >
 <div class="footer-hd">
 <p>
 <a href="#">恒望科技</a>
 <b>|</b>
 <a href="#">商城首页</a>
 <b>|</b>
 <a href="#">支付宝</a>
 <b>|</b>
 <a href="#">物流</a>
 </p>
 </div>
 <div class="footer-bd">
 <p>
 <a href="#">关于恒望</a>
 <a href="#">合作伙伴</a>
 <a href="#">联系我们</a>
 <a href="#">网站地图</a>
 <em>© 2015-2025 Hengwang.com 版权所有</em>
 </p>
 </div>
</div>


</body>
</html>
