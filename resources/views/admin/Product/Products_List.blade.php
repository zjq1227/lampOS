<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" /> 
        <link href={{asset("admin/css/bootstrap.min.css")}} rel="stylesheet" />
        <link rel="stylesheet" href={{asset("admin/css/style.css")}}/>       
        <link rel="stylesheet" href={{asset("admin/css/ace.min.css")}} />
        <link rel="stylesheet" href={{asset("admin/css/font-awesome.min.css")}} />
        <link rel="stylesheet" href={{asset("Widget/zTree/css/zTreeStyle/zTreeStyle.css")}} type="text/css">
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
		<!-- page specific plugin scripts -->
		<script src={{asset("admin/js/jquery.dataTables.min.js")}}></script>
		<script src={{asset("admin/js/jquery.dataTables.bootstrap.js")}}></script>
        <script type="text/javascript" src={{asset("js/H-ui.js")}}></script> 
        <script type="text/javascript" src={{asset("js/H-ui.admin.js")}}></script> 
        <script src={{asset("admin/layer/layer.js")}} type="text/javascript" ></script>
        <script src={{asset("admin/laydate/laydate.js")}} type="text/javascript"></script>
        <script type="text/javascript" src={{asset("Widget/zTree/js/jquery.ztree.all-3.5.min.js")}}></script> 
        <script src={{asset("js/lrtk.js")}} type="text/javascript" ></script>
<title>产品列表</title>
</head>
<body>
<div class=" page-content clearfix">
 <div id="products_style">
    <div class="search_style">
     
      <ul class="search_content clearfix">
      </ul>
    </div>
     <div class="border clearfix">
       <span class="l_f">
        <a href={{route('Picture_add')}} title="添加商品" class="btn btn-warning Order_form"><i class="icon-plus"></i>添加商品</a>
        {{-- <a href="javascript:ovid()" class="btn btn-danger"><i class="icon-trash"></i>批量删除</a> --}}
       </span>
	<span class="r_f">共：<b>{{$num}}</b>件商品</span>
     </div>
     <!--产品列表展示-->
     <div class="h_products_list clearfix" id="products_list">
       <div id="scrollsidebar" class="left_Treeview">
        <div class="show_btn" id="rightArrow"><span></span></div>
        <div class="widget-box side_content" >
         <div class="side_title"><a title="隐藏" class="close_btn"><span></span></a></div>
         <div class="side_list"><div class="widget-header header-color-green2"><h4 class="lighter smaller">产品类型列表</h4></div>
         <div class="widget-body">
          <div class="widget-main padding-8"><div id="treeDemo" class="ztree"></div></div>
        </div>
       </div>
      </div>  
     </div>
         <div class="table_menu_list" id="testIframe">
       <table class="table table-striped table-bordered table-hover" id="sample-table">
		<thead>
		 <tr>
				<th width="25px"><label><span type="checkbox" class="ace"><span class="lbl"></span></label></th>
				<th width="80px">产品编号</th>
				<th width="150px">产品名称</th>
				<th width="250px">产品图片</th>
				<th width="100px">原价格</th>
				<th width="100px">现价</th>
                <th width="100px">所属地区/国家</th>				
				<th width="180px">加入时间</th>
				<th width="70px">状态</th>                
				<th width="200px">操作</th>
			</tr>
		</thead>
	<tbody>
		@foreach ($goods as $goods)
		<tr>
			<td width="25px"><label><span type="checkbox" class="ace" ><span class="lbl"></span></label></td>
			<td width="80px">{{$goods->gnum}}</td>               
			<td width="100px">{{$goods->goods}}</td>
			<td width="250px"><span style="cursor:pointer" class="text-primary"><img src="{{asset("/uploads")}}/{{$goods['picname']}}" style='width:190px;height:140px;' /></span></td>
			<td width="100px">{{$goods->original}}</td>
			<td width="100px">{{$goods->price}}</td> 
			<td width="100px">{{$goods->company}}</td>         
			<td width="180px">{{$goods->created_at}}</td>
			<td class="td-status">
				@if($goods->state==1)
					<span class="label label-success radius">已启用</span>
				@elseif($goods->state==2)
					<span class="label label-default radius">已停用</span>
				@endif
			</td>
			<td class="td-manage">
					@if($goods->state==1)
			<a onClick="member_stop(this,{{$goods->id}})"  href="javascript:;" title="停用"  class="btn btn-xs btn-success"><i class="icon-ok bigger-120"></i></a> 
					@elseif($goods->state==2)
					<a onClick="member_start(this,{{$goods->id}})"  href="javascript:;" title="启用"  class="btn btn-xs btn-default"><i class="icon-ok bigger-120"></i></a> 
					@endif
			<a title="编辑" href="{{route('Picture_Upload',$goods->id)}}"   class="btn btn-xs btn-info" ><i class="icon-edit bigger-120"></i></a>
			{{-- <a title="删除" href="javascript:;"  onclick="member_del(this,'1')" class="btn btn-xs btn-warning" ><i class="icon-trash  bigger-120"></i></a> --}}
			</td>
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
jQuery(function($) {
		var oTable1 = $('#sample-table').dataTable( {
		"aaSorting": [[ 1, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[0,2,3,4,5,8,9]}// 制定列不参与排序
		] } );
				
				
				$('table th input:checkbox').on('click' , function(){
					var that = this;
					$(this).closest('table').find('tr > td:first-child input:checkbox')
					.each(function(){
						this.checked = that.checked;
						$(this).closest('tr').toggleClass('selected');
					});
						
				});
			
			
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			});
 laydate({
    elem: '#start',
    event: 'focus' 
});
$(function() { 
	$("#products_style").fix({
		float : 'left',
		//minStatue : true,
		skin : 'green',	
		durationTime :false,
		spacingw:30,//设置隐藏时的距离
	    spacingh:260,//设置显示时间距
	});
});
</script>
<script type="text/javascript">
//初始化宽度、高度  
 $(".widget-box").height($(window).height()-215); 
$(".table_menu_list").width($(window).width()-260);
 $(".table_menu_list").height($(window).height()-215);
  //当文档窗口发生改变时 触发  
    $(window).resize(function(){
	$(".widget-box").height($(window).height()-215);
	 $(".table_menu_list").width($(window).width()-260);
	  $(".table_menu_list").height($(window).height()-215);
	})
 
/*******树状图*******/
var setting = {
	view: {
		dblClickExpand: false,
		showLine: false,
		selectedMulti: false
	},
	data: {
		simpleData: {
			enable:true,
			idKey: "id",
			pIdKey: "pId",
			rootPId: ""
		}
	}
};

$.get('{{route("Category")}}',
        {'_token':'{{csrf_token()}}',
        'status':'all',
        },function(data) //第二个参数要传token的值 再传参数要用逗号隔开
        {
            var zNodes = data;
            for (var i = 0; i < data.length; i++) {
                const element = data[i]['gcount'];
                data[i]['name']=data[i]['name']+' ('+data[i]['gcount']+')';
            }
            var t = $("#treeDemo");
            t = $.fn.zTree.init(t, setting, zNodes);
            demoIframe = $("#testIframe");
            var zTree = $.fn.zTree.getZTreeObj("tree");
            $('a[class=level0]').click(function(){
                var name=$(this).text();
                name=name.substring(0,name.indexOf("("));
                window.location.href = "{{url('admin/Product/P')}}"+"/"+name;
                
            });
        });
		
var code;
		
function showCode(str) {
	if (!code) code = $("#code");
	code.empty();
	code.append("<li>"+str+"</li>");
}
		
$(document).ready(function(){
	var t = $("#treeDemo");
	t = $.fn.zTree.init(t, setting, zNodes);
	demoIframe = $("#testIframe");
	demoIframe.bind("load", loadReady);
	var zTree = $.fn.zTree.getZTreeObj("tree");
	zTree.selectNode(zTree.getNodeByParam("id",'11'));
});	
/*产品-停用*/
function member_stop(obj,id){
	layer.confirm('确认要停用吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs " onClick="member_start(this,id)" href="javascript:;" title="启用"><i class="icon-ok bigger-120"></i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');
		$(obj).remove();
		$.ajax({
			url:"{{url('admin/Product/Product_state')}}"+'/'+id,
			type:"POST",
			data:{
				_token : '<?php echo csrf_token()?>',
				'status':'2',
				},
			dataType:"json",
			success:function(result){
				if(result){
					layer.msg('已停用',{icon:5,time:1000});
					// layer.close(index); 
						setTimeout(function(){
						window.location.href = "../P/empty";
					},1000);
				}
			}
									
		})
	});
}

/*产品-启用*/
function member_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs btn-success" onClick="member_stop(this,id)" href="javascript:;" title="停用"><i class="icon-ok bigger-120"></i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
		$(obj).remove();
		$.ajax({
			url:"{{url('admin/Product/Product_state')}}"+'/'+id,
			type:"POST",
			data:{
				_token : '<?php echo csrf_token()?>',
				'status':'1',
				},
			dataType:"json",
			success:function(result){
				if(result){
					layer.msg('已启用',{icon:6,time:1000});
					setTimeout(function(){
						window.location.href = "../P/empty";
					},1000);
				}
			}
									
		})
	});
}
/*产品-编辑*/
function member_edit(title,url,id){
	
}

/*产品-删除*/
function member_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$(obj).parents("tr").remove();
		layer.msg('已删除!',{icon:1,time:1000});
	});
}
//面包屑返回值
var index = parent.layer.getFrameIndex(window.name);
parent.layer.iframeAuto(index);
$('.Order_form').on('click', function(){
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
</script>
