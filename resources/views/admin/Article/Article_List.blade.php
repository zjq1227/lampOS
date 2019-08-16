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
        <script src={{asset("js/lrtk.js")}} type="text/javascript" ></script>	         	
		<script src={{asset("admin/js/jquery.dataTables.min.js")}}></script>
		<script src={{asset("admin/js/jquery.dataTables.bootstrap.js")}}></script>
        <script src={{asset("admin/layer/layer.js")}} type="text/javascript" ></script>          
        <script src={{asset("admin/laydate/laydate.js")}} type="text/javascript"></script>
        <script src={{asset("js/H-ui.js")}} type="text/javascript"></script>
        <script src={{asset("js/displayPart.js")}} type="text/javascript"></script>
<title>文章管理</title>
</head>

<body>

<div class="clearfix">
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
 <div class="article_style" id="article_style">
          <div id="scrollsidebar" class="left_Treeview">
    <div class="show_btn" id="rightArrow"><span></span></div>
    <div class="widget-box side_content" >
    <div class="side_title"><a title="隐藏" class="close_btn"><span></span></a></div>
     <div class="side_list">
      <div class="widget-header header-color-green2">
          <h4 class="lighter smaller">所属文章类</h4>
      </div>
      <div class="widget-body">
         <ul class="b_P_Sort_list">
            <li><i class="orange  fa fa-list "></i>全部({{ $counts }})</li>
             @foreach ($configer as $k)
             <li><i class="fa fa-newspaper-o pink "></i> {{ $k->tname }}</li>
             @endforeach
         </ul>
  </div>
  </div>
  </div>  
  </div>
 <!--文章列表-->
 <div class="Ads_list">
    <div class="border clearfix">
       <span class="l_f">
        <a href="{{route('Article_List_Add')}}"  title="添加文章" id="add_page" class="btn btn-warning"><i class="fa fa-plus"></i> 添加文章</a>
        {{-- <a href="javascript:ovid()" class="btn btn-danger"><i class="fa fa-trash"></i> 批量删除</a> --}}
       </span>
       <span class="r_f">共：<b>{{ $countt }}</b>条文章</span>
     </div>
     <div class="article_list">
       <table class="table table-striped table-bordered table-hover" id="sample-table">
       <thead>
		 <tr>
				<th width="25"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
				<th width="80px">ID</th>
                {{-- <th  width="80px">排序</th> --}}
				<th width="100">所属分类</th>
				<th width="220px">标题</th>
				<th width="">简介</th>
				<th width="150px">添加时间</th>
                <th width="80px">状态</th>                
				<th width="150px">操作</th>
			</tr>
		</thead>
        <tbody>
         
        
          @foreach ($contents as $v)
         <tr>
          <td><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
          <td>{{ $num++ }}</td>
          {{-- <td>1</td> --}}
          <td>
               {{ $v->tname }}
        </td>
          <td> {{ $v->name }}</td>
          <td class="displayPart" displayLength="60">{{ $v->jianjie }}</td>
          <td>{{ $v->created_at }}</td>
          @if ( $v->status == 1)
          <td class="td-status">
              <span class="label label-success radius">启用</span>
          </td>    
          <td class="td-manage">   
              <a style="text-decoration:none" class="btn btn-xs btn-success" onClick="member_stop(this,{{ $v->id }})" href="javascript:;" title="停用"><i class="fa fa-check bigger-120"></i></a>
              
          </td>
          @else
          <td class="td-status">
              <span class="label label-default radius">关闭</span>
          </td>
          <td class="td-manage">   
            <a style="text-decoration:none" class="btn btn-xs " onClick="member_start(this,{{ $v->id }})" href="javascript:;" title="启用"><i class="fa fa-close bigger-120"></i></a>
          
          </td>
          @endif
         </tr>
         @endforeach
        </tbody>
       </table>    
     </div>
 </div>
 </div>
</div>
</body>
</html>
<script>
$(function () {  
        $(".displayPart").displayPart();  
   });
 //面包屑返回值
var index = parent.layer.getFrameIndex(window.name);
parent.layer.iframeAuto(index);
$('#add_page').on('click', function(){
	var cname = $(this).attr("title");
	var chref = $(this).attr("href");
	var cnames = parent.$('.Current_page').html();
	var herf = parent.$("#iframe").attr("src");
    parent.$('#parentIframe').html(cname);
    parent.$('#iframe').attr("src",chref).ready();;
	parent.$('#parentIframe').css("display","inline-block");
	parent.$('.Current_page').attr({"name":herf,"href":"javascript:void(0)"}).css({"color":"#4c8fbd","cursor":"pointer"});
	//parent.$('.Current_page').html("<a href='javascript:void(0)' name="+herf+" class='iframeurl'>" + cnames + "</a>");
    parent.layer.close(index);
	
}); 
$(function() {
		var oTable1 = $('#sample-table').dataTable( {
		"aaSorting": [[ 1, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[0,2,3,4,5,7,]}// 制定列不参与排序
		] } );
				$('table th input:checkbox').on('click' , function(){
					var that = this;
					$(this).closest('table').find('tr > td:first-child input:checkbox')
					.each(function(){
						this.checked = that.checked;
						$(this).closest('tr').toggleClass('selected');
					});
						
				});
})

 $(function() { 
	$("#article_style").fix({
		float : 'left',
		//minStatue : true,
		skin : 'green',	
		durationTime :false,
		stylewidth:'220',
		spacingw:30,//设置隐藏时的距离
	    spacingh:250,//设置显示时间距
		set_scrollsidebar:'.Ads_style',
		table_menu:'.Ads_list'
	});
});
//初始化宽度、高度  
 $(".widget-box").height($(window).height()); 
 $(".Ads_list").width($(window).width()-220);
  //当文档窗口发生改变时 触发  
    $(window).resize(function(){
	$(".widget-box").height($(window).height());
	 $(".Ads_list").width($(window).width()-220);
});
/*栏目-停用*/
function member_stop(obj,id){
	layer.confirm('确认要停用该栏目吗？',function(index){
    $.ajax({
		type:'GET',
		url:"{{route('Article_Article_update')}}",
		data:{'id':id,'status':2},
		dataType:'json',
		success: function(data){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs " onClick="member_start(this,{{ $v->id }} )" href="javascript:;" title="启用"><i class="fa fa-close bigger-120"></i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">停用</span>');
		$(obj).remove();
		layer.msg('停用!',{icon: 5,time:1000});
  },
		error:function(data) {
			console.log(data.msg);
		}
	});		
	});
}
/*栏目-启用*/
function member_start(obj,id){
	layer.confirm('确认要启用该栏目吗？',function(index){
    $.ajax({
		type:'GET',
		url:"{{route('Article_Article_update')}}",
		data:{'id':id,'status':1},
		dataType:'json',
		success: function(data){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs btn-success" onClick="member_stop(this,$v->id)" href="javascript:;" title="停用"><i class="fa fa-check bigger-120"></i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">启用</span>');
		$(obj).remove();
		layer.msg('启用!',{icon: 6,time:1000});
  },
	error:function(data) {
		console.log(data.msg);
		}
	});		
	});
}
/*文章-删除*/
function member_del(obj,id){
	layer.confirm('确认要删除吗？',{icon:0,},function(index){
		$(obj).parents("tr").remove();
		layer.msg('已删除!',{icon:1,time:1000});
	});
}

</script>
