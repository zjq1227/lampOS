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
        <script src={{asset("admin/layer/layer.js")}} type="text/javascript" ></script>          
        <script src={{asset("admin/laydate/laydate.js")}} type="text/javascript"></script>
<title>交易金额</title>
</head>

<body>
<div class="margin clearfix">
 <div class="detailed_style clearfix">
 <em class="type"></em>
  <div class="shop_logo"><img src='{{asset("/uploads")}}/{{$shop['img']}}' style="width:190px;height:140px;"/></div>
   <ul class="shop_content clearfix">
   <li class="shop_name"><label class="label_name">店铺名称：</label><span class="info">{{$shop['sname']}}</span> 
    <div class="Authenticate"><i class="icon-yxrz"></i><i class="icon-yhk"></i><i class="icon-sjrz"></i><i class="icon-grxx"></i></div></li>
    <li><label class="label_name">店铺类型：</label><span class="info">个人店铺</span></li>
    <li><label class="label_name">店铺分类：</label><span class="info">{{$shop['cname']}}</span></li>
    <li><label class="label_name">申请时间：</label><span class="info">{{$shop['created_at']}}</span></li>
	<li><label class="label_name">状&nbsp;&nbsp;&nbsp;&nbsp;态：</label>
		@if($shop['audit']=='1')
			<span class="info">通过</span>
		@elseif($shop['audit']=='2')
			<span class="info">已拒绝</span>
		@elseif($shop['audit']=='3')
			<span class="info">待审核</span>
		@elseif($shop['audit']=='')
			<span class="info">未申请</span>
		@endif
	</li>
    <li><label class="label_name">申请人姓名：</label><span class="info">{{$shop['name']}}</span></li>
    <li><label class="label_name">移动电话：</label><span class="info">{{$shop['phone']}}</span></li>
    <li><label class="label_name">电子邮箱：</label><span class="info">{{$shop['email']}}</span></li>
    <li><label class="label_name">固定电话：</label><span class="info">{{$shop['uPhone']}}</span></li>
    <li><label class="label_name">身份证号：</label><span class="info">{{$shop['idcard']}}</span></li>
   </ul>
 </div>
 <div class="Store_Introduction">
  <div class="title_name">店铺介绍</div>
   <div class="info">
	{{$shop['intro']}}
   </div>
 </div>
 {{-- <div class="Store_Introduction">
  <div class="title_name">其他认证</div>
  <div class="info">
   
  </div>
 </div> --}}
 <div class="At_button">
				<button onclick="through_save('this',{{$shop['id']}});" class="btn btn-primary radius" type="submit">通  过</button>
				<button onclick="cancel_save({{$shop['id']}});" class="btn btn-danger  btn-warning" type="button">拒  绝</button>
				<button onclick="return_close();" class="btn btn-default radius" type="button">返回上一步</button>
 </div>
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
		location.href="../Audit_detail_updated/"+id;
		parent.$('#parentIframe').css("display","none");
		parent.$('.Current_page').css({"color":"#333333"});
	});
	 
	 
	 }
	 
	 //返回操作
function return_close(){
	location.href="../Audit";
	parent.$('#parentIframe').css("display","none");
	parent.$('.Current_page').css({"color":"#333333"});
	
	}
	 //拒绝
function cancel_save(id){	
	var index = layer.open({
        type: 1,
        title: '内容',
		maxmin: true, 
		shadeClose:false,
        area : ['600px' , ''],
        content:('<div class="shop_reason"><span class="content">请说明拒绝该申请人申请店铺的理由，以便下次在申请时做好准备。</span><textarea name="请填写拒绝理由" class="form-control" id="form_textarea" placeholder="请填写拒绝理由" onkeyup="checkLength(this);"></textarea><span class="wordage">剩余字数：<span id="sy" style="color:Red;">500</span>字</span></div>'),
		btn:['确定','取消'],
		yes: function(index, layero){
		if($('.form-control').val()==""){
				layer.alert('回复内容不能为空！',{
               title: '提示框',				
			  icon:0,		
			  }) 
			 }else{
				$.ajax({
					url:"{{url('admin/Shop/Audit_detail_del')}}"+'/'+id,
					type:"POST",
					data:{
						_token : '<?php echo csrf_token()?>',
						'reason':$('.form-control').val(),
						},
					dataType:"json",
					success:function(result){
						if(result){
							layer.msg('提交成功!',{icon:1,time:1000});
				 			// layer.close(index); 
							 setTimeout(function(){
								window.location.href = "../Audit_detail/"+result+"";
							},1000);
						}
					}
											
				})
				 
				 }
		}
	})
	
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
	}else{
		var curr = maxChars - which.value.length; //减去当前输入的
		document.getElementById("sy").innerHTML = curr.toString();
		return true;
	}
};
</script>
