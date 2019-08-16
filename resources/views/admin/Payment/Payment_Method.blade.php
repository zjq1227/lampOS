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
		<script src={{asset("admin/layer/layer.js")}} type="text/javascript" ></script>   
        <script src={{asset("admin/js/ace-extra.min.js")}}></script>
		<script src={{asset("admin/js/typeahead-bs2.min.js")}}></script>  
        <script src={{asset("admin/dist/echarts.js")}}></script>		 
        <script type="text/javascript" src={{asset("js/H-ui.js")}}></script>          	
              
<title>支付方式</title>
</head>

<body>
   <!-- 读取 提示 消息 -->
 @if (session('success'))
 <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong> {{ session('success') }}!</strong> 
</div>
@endif
@if (session('error'))
<div class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong> {{ session('error') }}!</strong> 
    </div>
@endif
@section('content')
@show
<div class="margin clearfix">
 <div class="defray_style">
  <div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert"><i class="fa fa-remove"></i></button>注：该支付方式启用并不能正常使用，需要开通支付功能才能使用相应的支付方式，</div>
    <div class="border clearfix">
     <span class="l_f">
        <a href="javascript:ovid()" onclick="add_payment()" class="btn btn-primary Pay_add"><i class="fa fa-credit-card"></i>&nbsp;添加支付方式</a>
       </span>
    </div>
    <!--支付列表-->
    <div class="defray_list cover_style clearfix" >
     <div class="type_title">支付方式</div>

      <div class="defray_content clearfix">
          @foreach ($pay as $k)
       <ul class="defray_info">
       <li class="defray_name">{{ $k->name }}</li>
        <li class="name_logo"><img src={{asset("uploads".'/'.$k->zfpic)}}  width="100%" height="150px;" /> </li>
        <li class="description">{{ $k->content }}</li>
        @if ( $k->status == 1)
        <li class="operating">
        <a href="javascript:ovid()" class="btn btn-success" onClick="member_start(this,{{ $k->id }})">&nbsp;已开启点击关闭</a>
        </li>
        @else
        <li class="operating">
            <a href="javascript:ovid()" class="btn btn-danger" onClick="member_stop(this,{{ $k->id }})">&nbsp;已关闭点击开启</a>
            </li>
         @endif
       </ul>
      @endforeach

      </div>
    </div>
 </div>
</div>
<!--添加支付方式-->
<div id="add_payment_style" style="display:none">
<form class="mws-form" id="payment_checkbox" action="{{route('Method_add')}}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
 <ul class="margin payment_list  clearfix">
  <li>
  <label><input name="checkbox" type="checkbox" class="ace" id="checkbox" onclick="select_payment(this,'123')"><span class="lbl">
    {{-- 确认添加 --}}
    添加支付方式
   </span></label>
  </li>
 </ul>
 <div class="add_content clearfix">
   <ul>
    <li class=" clearfix"><label class="label_name">支付方式名称</label><span><input name1="支付方式名称" name="name" type="text" /></span></li>
    <li  class=" clearfix"><label class="label_name">支持交易货币</label><span style=" margin-left:10px;">人民币</span></li>
    <li  class=" clearfix"><label class="label_name">说明</label><span><textarea name1="说明" name="content" class="form-textarea" id="form_textarea" placeholder="" onkeyup="checkLength(this);"></textarea><span style=" margin-left:10px;">剩余字数：<em id="sy" style="color:Red;">200</em>字</span></span></li>
    <li class=" clearfix"><label class="label_name">状&nbsp;&nbsp;态：</label>
      <span class="cont_style">
        &nbsp;&nbsp;<label><input name="status" value="1" type="radio" checked="checked" class="ace"><span class="lbl">显示</span></label>&nbsp;&nbsp;&nbsp;
        <label><input name="status" value="2" type="radio" class="ace"><span class="lbl">隐藏</span></label></span><div class="prompt r_f"></div>
    </li>
    <li class=" clearfix"><label class="label_name">图&nbsp;&nbsp;片</label><span class="cont_style">
        <input type="file" name="zfpic" id="form-field-1">
     </span>
    </li>
    <li  class=" clearfix"><label class="label_name"><input type="submit" value="提交" class="btn btn-primary radius" style="margin-left:100px;"></label></li>
   </ul>
 </div>
 </form>
</div>
</body>
</html>
<script>
function select_payment(ojb,id){
	if($('input[name="checkbox"]').prop("checked")){
		 $('.add_content').css('display','block');
		/*  var num=0;
		var str="";
		  $(".add_content input[type$='text']").each(function(n){
          if($(this).val()=="")
          { 
			layer.alert(str+=""+$(this).attr("name")+"不能为空！\r\n",{
            title: '提示框',				
		    icon:0,								
          }); 
		    num++;
            return false;            
          } 
		 });
		  if(num>0){  return false;}	*/
		}
	else{
		
		 $('.add_content').css('display','none');
		}
}
/*字数限制*/
function checkLength(which) {
	var maxChars = 200; //
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
		var curr = maxChars - which.value.length; //250 减去 当前输入的
		document.getElementById("sy").innerHTML = curr.toString();
		return true;
	}
};
/**添加支付方式0**/
function add_payment(index ){
        layer.open({
        type: 1,
        title: '添加支付方式',
		maxmin: true, 
		shadeClose:false,
        area : ['830px' , ''],
        content:$('#add_payment_style'),
		// btn:['确定','取消'],
		yes: function(index){
			var checkbox=$('input[name="checkbox"]');		    			
			if(checkbox.length){
			 var b = false;				
			 for(var i=0; i<checkbox.length; i++){
				if(checkbox[i].checked){
					b = true;
					layer.alert('添加成功！',{
               title: '提示框',				
			  icon:0,		
			  })  
			  layer.close(index);
			   break;	
				}
 		
			 }
			 if(!b){
				   layer.alert('请选择所需要的支付方式！',{
               title: '提示框',				
			icon:0,		
			  }); 

			 }
		  }
			else{
							
			}
			
		}
	})
	
	}
/**面包屑**/
var index = parent.layer.getFrameIndex(window.name);
parent.layer.iframeAuto(index);
$('.details_btn').on('click', function(){
	var cname = $(this).attr("title");
	var cnames = parent.$('.Current_page').html();
	var herf = parent.$("#iframe").attr("src");
    parent.$('#parentIframe span').html(cname);
	parent.$('#parentIframe').css("display","inline-block");
    parent.$('.Current_page').attr("name",herf).css({"color":"#4c8fbd","cursor":"pointer"});
	//parent.$('.Current_page').html("<a href='javascript:void(0)' name="+herf+">" + cnames + "</a>");
    parent.layer.close(index);
	
});
function Paymentdetails(id){
	window.location.href = "Payment_details.html?="+id;
};
function member_stop(obj,id){
	layer.confirm('确认要开启吗？',{icon:0,},function(index){
		$.ajax({
		type:'GET',
		url:"{{route('Method_update')}}",
		data:{'id':id,'status':1},
		dataType:'json',
		success: function(data){
		$(obj).parents("ul").find(".operating").prepend('<a href="javascript:ovid()" class="btn btn-success" onClick="member_start(this,{{ $k->id }})">&nbsp;已开启点击关闭</a>');
		$(obj).remove();
		layer.msg('开启!',{icon: 5,time:1000});
  },
		error:function(data) {
			console.log(data.msg);
		}
	});		
	});
}
/*广告图片-启用*/
function member_start(obj,id){
	layer.confirm('确认要关闭吗？',{icon:0,},function(index){
		$.ajax({
		type:'GET',
		url:"{{route('Method_update')}}",
		data:{'id':id,'status':2},
		dataType:'json',
		success: function(data){
		$(obj).parents("ul").find(".operating").prepend('<a style="text-decoration:none" href="javascript:ovid()" class="btn btn-danger" onClick="member_stop(this,{{ $k->id }})">&nbsp;已关闭点击开启</a>');
		$(obj).remove();
		layer.msg('关闭!',{icon: 6,time:1000});
  },
	error:function(data) {
		console.log(data.msg);
		}
	});		
	});
}

</script>
