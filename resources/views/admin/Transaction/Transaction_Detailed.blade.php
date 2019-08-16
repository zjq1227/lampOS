<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Cache-Control" content="no-siteapp" />
 <link href={{asset("admin/css/bootstrap.min.css")}} rel="stylesheet" />
        <link rel="stylesheet" href={{asset("admin/css/style.css")}}/>       
        <link href={{asset("admin/css/codemirror.css")}} rel="stylesheet">
        <link rel="stylesheet" href={{asset("admin/css/ace.min.css")}} />
        <link rel="stylesheet" href={{asset("admin/font/css/font-awesome.min.css")}} />
        <!--[if lte IE 8]>
		  <link rel="stylesheet" href={{asset("admin/css/ace-ie.min.css")}} />
		<![endif]-->
		<script src={{asset("js/jquery-1.9.1.min.js")}}></script>
        <script src={{asset("admin/js/bootstrap.min.js")}}></script>
		<script src={{asset("admin/js/typeahead-bs2.min.js")}}></script> 
        <script type="text/javascript" src={{asset("js/H-ui.js")}}></script>      	
		<script src={{asset("admin/js/jquery.dataTables.min.js")}}></script>
		<script src={{asset("admin/js/jquery.dataTables.bootstrap.js")}}></script>
        <script src={{asset("admin/layer/layer.js")}} type="text/javascript" ></script>          
        <script src={{asset("admin/laydate/laydate.js")}} type="text/javascript"></script>
        <script src={{asset("admin/js/jquery.easy-pie-chart.min.js")}}></script>
        <script src={{asset("js/lrtk.js")}} type="text/javascript" ></script>
<title>订单详细</title>
</head>

<body>
<div class="margin clearfix">
<div class="Order_Details_style">
<div class="Numbering">订单编号:<b>NJHDXJ201509-001</b></div></div>
 <div class="detailed_style">
 <!--收件人信息-->
    <div class="Receiver_style">
    @foreach ($orders as $k=>$v)
     <div class="title_name">收件人信息 &nbsp; &nbsp; &nbsp;<a onclick="demo(this,{{$v->id}})" class="administrator_upd">修改：<i class="fa fa-edit bigger-120"></i></a></div>
     <div class="Info_style clearfix">
        <div class="col-xs-3">  
         <label class="label_name" for="form-field-2"> 收件人姓名： </label>
         <div class="o_content">{{$v->uname}}</div>
        </div>
        <div class="col-xs-3">  
         <label class="label_name" for="form-field-2"> 收件人电话： </label>
         <div class="o_content">{{$v->phone}}</div>
        </div>
         <div class="col-xs-3">  
         <label class="label_name" for="form-field-2"> 收件地邮编： </label>
         <div class="o_content">{{$v->Email}}</div>
        </div>
         <div class="col-xs-3">  
         <label class="label_name" for="form-field-2"> 收件地址： </label>
         <div class="o_content">{{$v->acode}}</div>
        </div>
        @endforeach
     </div>
    </div>
    <!--订单信息-->
    <div class="product_style">
    <div class="title_name">产品信息</div>
    @foreach ($item as $k=>$v)
    <div class="Info_style clearfix">
      <div class="product_info clearfix">
      <a href="#" class="img_link"><img src={{asset("admin/products/p_5.jpg")}} /></a>
      <span>
      <a href="#" class="name_link">{{$v->goods}}</a>
      <b>也称为姬娜果，饱满色艳，个头小</b>
      <p>规格：39.9/5kg</p>
      <p>数量：{{$v->nums}}</p>
      <p>价格：<b class="price"><i>￥</i>{{$v->price}}</b></p>  
      <p>状态：<i class="label label-success radius">
           @if (($v->state)=="1")
           新上货
           @elseif (($v->state)=='2')
           在售中
           @elseif (($v->state)=='3')
           下架
           @endif</i></p>
           &nbsp; &nbsp; &nbsp;<a onclick="demoint(this,{{$v->id}})" class="administrator_upd">修改：<i class="fa fa-edit bigger-120"></i></a>
      </span>
      </div>
      @endforeach
    </div>
    </div>
<script>
function demoint(obj,id){
      var action = '{{Url("admin/Transaction/Detaiupd/")}}'+'/'+id;
      document.getElementById('form-admin-upd').setAttribute('action',action);
          layer.open({
          type: 1,
          title:'修改订单',
          area: ['600px',''],
          shadeClose: false,
          content: $('#add_administratorupd_style'),
          });
    };
function demo(obj,id){
      var action = '{{Url("admin/Transaction/Adress/")}}'+'/'+id;
      document.getElementById('form-admin-drs').setAttribute('action',action);
          layer.open({
          type: 1,
          title:'修改订单',
          area: ['600px',''],
          shadeClose: false,
          content: $('#add_administratorupd_style01'),
          });
    };
</script>

    <!--总价-->
    <div class="Total_style">
     <div class="Info_style clearfix">
      <div class="col-xs-3">  
         <label class="label_name" for="form-field-2"> 支付方式： </label>
         <div class="o_content">在线支付</div>
        </div>
        <div class="col-xs-3">  
         <label class="label_name" for="form-field-2"> 支付状态： </label>
         <div class="o_content">等待付款</div>
        </div>
        <div class="col-xs-3">  
         <label class="label_name" for="form-field-2"> 订单生成日期： </label>
         <div class="o_content">2016-7-5</div>
        </div>
         <div class="col-xs-3">  
         <label class="label_name" for="form-field-2"> 快递名称： </label>
         <div class="o_content">中通快递</div>
        </div>
         <div class="col-xs-3">  
         <label class="label_name" for="form-field-2"> 发货日期： </label>
         <div class="o_content">2016-7-19</div>
        </div>
        </div>
      <div class="Total_m_style"><span class="Total">总数：<b>10</b></span><span class="Total_price">总价：<b>345</b>元</span></div>
    </div>
    
    <!--物流信息-->
    <div class="Logistics_style clearfix">
     <div class="title_name">物流信息</div>
      <!--<div class="prompt"><img src="images/meiyou.png" /><p>暂无物流信息！</p></div>-->
       <div data-mohe-type="kuaidi_new" class="g-mohe " id="mohe-kuaidi_new">
        <div id="mohe-kuaidi_new_nucom">
            <div class="mohe-wrap mh-wrap">
                <div class="mh-cont mh-list-wrap mh-unfold">
                    <div class="mh-list">
                        <ul>
                            <li class="first">
                                <p>2015-04-28 11:23:28</p>
                                <p>妥投投递并签收，签收人：他人收 他人收</p>
                                <span class="before"></span><span class="after"></span><i class="mh-icon mh-icon-new"></i></li>
                            <li>
                                <p>2015-04-28 07:38:44</p>
                                <p>深圳市南油速递营销部安排投递（投递员姓名：蔡远发<a href="tel:18718860573">18718860573</a>;联系电话：）</p>
                                <span class="before"></span><span class="after"></span></li>
                            <li>
                                <p>2015-04-28 05:08:00</p>
                                <p>到达广东省邮政速递物流有限公司深圳航空邮件处理中心处理中心（经转）</p>
                                <span class="before"></span><span class="after"></span></li>
                            <li>
                                <p>2015-04-28 00:00:00</p>
                                <p>离开中山市 发往深圳市（经转）</p>
                                <span class="before"></span><span class="after"></span></li>
                            <li>
                                <p>2015-04-27 15:00:00</p>
                                <p>到达广东省邮政速递物流有限公司中山三角邮件处理中心处理中心（经转）</p>
                                <span class="before"></span><span class="after"></span></li>
                            <li>
                                <p>2015-04-27 08:46:00</p>
                                <p>离开泉州市 发往中山市</p>
                                <span class="before"></span><span class="after"></span></li>
                            <li>
                                <p>2015-04-26 17:12:00</p>
                                <p>泉州市速递物流分公司南区电子商务业务部已收件，（揽投员姓名：王晨光;联系电话：<a href="tel:13774826403">13774826403</a>）</p>
                                <span class="before"></span><span class="after"></span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
      
 </div>
</div>
    <div id="add_administratorupd_style"   style="display:none">
        <form action="" method="post" enctype="multipart/form-data" id="form-admin-upd">
              {{ csrf_field() }}
           <div class="form-group">
                <label class="form-label"><span class="c-red">*</span>数量：</label>
                <div class="formControls">
                  <input type="text" class="input-text" value="" placeholder="" id="num" name="num" datatype="*2-16" nullmsg="数量不能为空">
                </div>
                <div class="col-4"> <span class="Validform_checktip"></span></div>
              </div>
             <div class="form-group">  
            </div>
                <div class="col-4"> <input class="btn btn-primary radius" type="submit" id="Add_Administrator" value="&nbsp;&nbsp;提交&nbsp;&nbsp;"> </div>
              </div>
              <div> 
        </form>
    </div>
    <!--地址修改-->
    <div id="add_administratorupd_style01"   style="display:none">
        <form action="" method="post" enctype="multipart/form-data" id="form-admin-drs">
              {{ csrf_field() }}
           <div class="form-group">
                <label class="form-label"><span class="c-red">*</span>收货人：</label>
                <div class="formControls">
                  <input type="text" class="input-text" value="" placeholder="" id="name" name="name" datatype="*10-26" nullmsg="请填写地址" style="width: 300px;">
                </div>
                <div class="col-4"> <span class="Validform_checktip"></span></div>
            </div>
            <div class="form-group">
                <label class="form-label"><span class="c-red">*</span>手机号：</label>
                <div class="formControls">
                  <input type="text" class="input-text" value="" placeholder="" id="phone" name="phone" datatype="*10-26" nullmsg="请填写地址" style="width: 300px;">
                </div>
                <div class="col-4"> <span class="Validform_checktip"></span></div>
            </div>
           <div class="form-group">
                <label class="form-label"><span class="c-red">*</span>地址：</label>
                <div class="formControls">
                  <input type="text" class="input-text" value="" placeholder="" id="acode" name="acode" datatype="*10-26" nullmsg="请填写地址" style="width: 300px;">
                </div>
                <div class="col-4"> <span class="Validform_checktip"></span></div>
            </div>
             <div class="form-group">  
            </div>
                <div class="col-4"> <input class="btn btn-primary radius" type="submit" id="Add_Administrator" value="&nbsp;&nbsp;提交&nbsp;&nbsp;"> </div>
              </div>
              <div> 
        </form>
    </div>
</body>
</html>