<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加品牌</title>
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
{{-- <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" /> --}}
<meta http-equiv="Cache-Control" content="no-siteapp" />
 <link href={{asset("admin/css/bootstrap.min.css")}} rel="stylesheet" />
        <link rel="stylesheet" href={{asset("admin/css/style.css")}}/>       
        <link rel="stylesheet" href={{asset("admin/css/ace.min.css")}} />
        <link rel="stylesheet" href={{asset("admin/css/font-awesome.min.css")}} />
        <link href={{asset("Widget/icheck/icheck.css")}} rel="stylesheet" type="text/css" />
		<!--[if IE 7]>
		  <link rel="stylesheet" href={{asset("admin/css/font-awesome-ie7.min.css")}} />
		<![endif]-->
        <!--[if lte IE 8]>
		  <link rel="stylesheet" href={{asset("admin/css/ace-ie.min.css")}} />
		<![endif]-->
	    <script src={{asset("js/jquery-1.9.1.min.js")}}></script>
        <script src={{asset("admin/js/bootstrap.min.js")}}></script>
        <script src={{asset("admin/js/typeahead-bs2.min.js")}}></script>
         <script src={{asset("admin/layer/layer.js")}} type="text/javascript"></script>
        <script type="text/javascript" src={{asset("Widget/swfupload/swfupload.js")}}></script>
        <script type="text/javascript" src={{asset("Widget/swfupload/swfupload.queue.js")}}></script>
        <script type="text/javascript" src={{asset("Widget/swfupload/swfupload.speed.js")}}></script>
        <script type="text/javascript" src={{asset("Widget/swfupload/handlers.js")}}></script>
</head>

<body>
<div class=" clearfix">
 <div id="add_brand" class="clearfix">
 <div class="left_add">
   <div class="title_name">添加品牌</div>
   <form class="mws-form" action="{{route('Do_add')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
   <ul class="add_conent">
    <li class=" clearfix"><label class="label_name"><i>*</i>品牌名称：</label> <input name="bname" type="text" class="add_text"/></li>
    <li class=" clearfix"><label class="label_name"><i>*</i>品牌序号：</label> <input name="number" type="text" class="add_text" style="width:80px"/></li>
    <li class=" clearfix"><label class="label_name">品牌图片：</label>
           <div class="demo l_f">
              <input type="file" name="blogo">
           </div> <div class="prompt"><p>图片大小<b>120px*60px</b>图片大小小于5MB,</p><p>支持.jpg;.gif;.png;.jpeg格式的图片</p></div>  
    </li>
         <li class=" clearfix"><label class="label_name"><i>*</i>所属地区：</label> 
          <select class="form-control" id="form-field-select-1" value="country" name="country">
            <option value="">选择分类</option>
         
            <option value="国内">中国</option>
            <option value="国外">国外</option>
          
            </select>
        </li>
         <li class=" clearfix"><label class="label_name">品牌描述：</label> <textarea name="describe" cols="" rows="" class="textarea" onkeyup="checkLength(this);"></textarea><span class="wordage">剩余字数：<span id="sy" style="color:Red;">500</span>字</span></li>
         <li class=" clearfix"><label class="label_name"><i>*</i>显示状态：</label> 
         <label><input name="status" type="radio" class="ace" checked="checked" value="1"><span class="lbl">显示</span></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <label><input type="radio" name="status" class="ace"  value="2"><span class="lbl">不显示</span></label>
         </li>
   </ul>
   
 </div>
 </div>
  <div class="button_brand"><input name="" type="submit"  class="btn btn-warning" value="保存"/>
    <input name="" type="reset" value="取消" class="btn btn-warning"/></div>
</div>
</form>
</body>
</html>
<script type="text/javascript">
     $(document).ready(function(){
 $(".left_add").height($(window).height()-60); 
  $(".right_add").width($(window).width()-600);
   $(".right_add").height($(window).height()-60);
  $(".select").height($(window).height()-195); 
  $("#select_style").height($(window).height()-220); 
 //当文档窗口发生改变时 触发  
    $(window).resize(function(){
		  $(".right_add").width($(window).width()-600); 
		 $(".left_add").height($(window).height()-60);
		 $(".right_add").height($(window).height()-60); 
		 $(".select").height($(window).height()-195); 
		$("#select_style").height($(window).height()-220); 
	});
	 })
	function checkLength(which) {
	var maxChars = 500;
	if(which.value.length > maxChars){
	   layer.open({
	   icon:2,
	   title:'提示框',
	   content:'您出入的字数超多限制!',	
    });
		// 超过限制的字数了就将 文本框中的内容按规定的字数 截取
		which.value = which.value.substring(0,maxChars);
		return false;
	}else{
		var curr = maxChars - which.value.length; // 减去 当前输入的
		document.getElementById("sy").innerHTML = curr.toString();
		return true;
	}
}
</script>