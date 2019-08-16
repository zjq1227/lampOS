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
         <script src={{asset("admin/dist/echarts.js")}}></script>
         <script src={{asset("js/lrtk.js")}} type="text/javascript"></script>
<title>品牌管理</title>
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
<div class="page-content clearfix">
  <div id="brand_style">
    
     <div class="border clearfix">
       <span class="l_f">
        <a href="{{route('Brand_add')}}"  title="添加品牌" class="btn btn-warning Order_form"><i class="icon-plus"></i>添加品牌</a>
        {{-- <a href="javascript:ovid()" class="btn btn-danger"><i class="icon-trash"></i>批量删除</a> --}}
        {{-- <a href="javascript:ovid()" class="btn btn-info">国内品牌</a> --}}
        {{-- <a href="javascript:ovid()" class="btn btn-success">国外品牌</a> --}}
       </span>
       <span class="r_f">共：<b>{{ $count }}</b>个品牌</span>
     </div>
    <!--品牌展示-->
     <div class="brand_list clearfix" id="category">
     <div class="show_btn" id="rightArrow"><span></span></div>
     <div class="chart_style side_content">
     <div class="side_title"><a title="隐藏" class="close_btn"><span></span></a></div>
         <div id="main" style="height:300px;" class="side_list"></div>
     </div>
     <!--品牌列表-->
      <div class="table_menu_list">
       <table class="table table-striped table-bordered table-hover" id="sample-table">
		<thead>
		 <tr>
				<th width="25px"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
				<th width="80px">ID</th>
				<th width="50px">排序</th>
				<th width="120px">品牌LOGO</th>
				<th width="120px">品牌名称</th>
				<th width="130px">所属地区/国家</th>
				<th width="350px">描述</th>
				<th width="180px">加入时间</th>
				<th width="70px">状态</th>                
				<th width="200px">操作</th>
			</tr>
		</thead>
	<tbody>
    @foreach ($brand as $k)
		<tr>
          <td width="25px"><label><input type="checkbox" class="ace" ><span class="lbl"></span></label></td>
          <td width="80px">{{ $num }}</td>
          <td width="50px"><input type="text" class="input-text text-c" value="{{ $k->number }}" style="width:60px"></td>
          <td><img src={{asset("uploads".'/'.$k->blogo)}}  width="130"/></td>
          <td><a href="javascript:ovid()" name="Brand_detailed.html" style="cursor:pointer" class="text-primary brond_name" onclick="generateOrders('561');" title="">{{ $k->bname }}</a></td>
          <td>{{ $k->country }}</td>
          <td class="text-l">{{ $k->describe }}</td>
          <td>{{ $k->created_at }}</td>
          @if ( $k->status == 1)
          <td class="td-status"><span class="label label-success radius">已启用</span></td>
          <td class="td-manage">
          <a onClick="member_stop(this,'{{ $k->id }}')"  href="javascript:;" title="停用"  class="btn btn-xs btn-success"><i class="icon-ok bigger-120"></i></a> 
          <a title="编辑"  href="{{route('Brand_upload',$k->id)}}"  class="btn btn-xs btn-info" ><i class="icon-edit bigger-120"></i></a> 
          </td>
          @else
          <td class="td-status"><span class="label label-defaunt radius">已停用</span></td>
          <td class="td-manage">
            <a  class="btn btn-xs " onClick="member_start(this,{{ $k->id }})" href="javascript:;" title="启用"><i class="icon-ok bigger-120"></i></a>
          <a title="编辑"  href="{{route('Brand_upload',$k->id)}}"  class="btn btn-xs btn-info" ><i class="icon-edit bigger-120"></i></a> 
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
	
jQuery(function($) {
		var oTable1 = $('#sample-table').dataTable( {
		"aaSorting": [[ 1, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[0,1,3,4,5,6,8,9]}// 制定列不参与排序
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


//初始化宽度、高度  
 $(".chart_style").height($(window).height()-215);
  $(".table_menu_list").height($(window).height()-215);
  $(".table_menu_list ").width($(window).width()-440);
  //当文档窗口发生改变时 触发  
    $(window).resize(function(){
	 $(".chart_style").height($(window).height()-215);
	 $(".table_menu_list").height($(window).height()-215);
	 $(".table_menu_list").width($(window).width()-440);
	});	
	//图层隐藏限时参数		 
$(function() { 
	$("#category").fix({
		float : 'left',
		//minStatue : true,
		skin : 'green',	
		durationTime :false,
		stylewidth:'400',
		spacingw:30,//设置隐藏时的距离
	    spacingh:440,//设置显示时间距
	});
});
//面包屑返回值
var index = parent.layer.getFrameIndex(window.name);
parent.layer.iframeAuto(index);
$('.Order_form ,.brond_name').on('click', function(){
	var cname = $(this).attr("title");
	var cnames = parent.$('.Current_page').html();
	var herf = parent.$("#iframe").attr("src");
    parent.$('#parentIframe span').html(cname);
	parent.$('#parentIframe').css("display","inline-block");
    parent.$('.Current_page').attr("name",herf).css({"color":"#4c8fbd","cursor":"pointer"});
	//parent.$('.Current_page').html("<a href='javascript:void(0)' name="+herf+">" + cnames + "</a>");
    parent.layer.close(index);
	
});
function generateOrders(id){
	window.location.href = "Brand_detailed.html?="+id;
};
/*品牌-查看*/
function member_show(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*品牌-停用*/
function member_stop(obj,id){
	layer.confirm('确认要停用吗？',function(index){
		$.ajax({
		type:'GET',
		url:"{{route('Brand_status_update')}}",
		data:{'id':id,'status':2},
		dataType:'json',
		success: function(data){
		$(obj).parents("tr").find(".td-manage").prepend('<a  class="btn btn-xs " onClick="member_start(this,{{ $k->id }} )" href="javascript:;" title="启用"><i class="icon-ok bigger-120"></i></a>');
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

/*用户-启用*/
function member_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
        $.ajax({
		type:'GET',
		url:"{{route('Brand_status_update')}}",
		data:{'id':id,'status':1},
		dataType:'json',
		success: function(data){
		$(obj).parents("tr").find(".td-manage").prepend('<a  class="btn btn-xs btn-success" onClick="member_stop(this,$k->id)" href="javascript:;" title="停用"><i class="icon-ok bigger-120"></i></a>');
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
/*品牌-编辑*/
function member_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}

/*品牌-删除*/
function member_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$(obj).parents("tr").remove();
		layer.msg('已删除!',{icon:1,time:1000});
	});
}
laydate({
    elem: '#start',
    event: 'focus' 
});


</script>
 <script type="text/javascript">
        require.config({
            paths: {
                echarts: '../dist'
            }
        });
        require(
            [
                'echarts',
                'echarts/chart/pie',   // 按需加载所需图表，如需动态类型切换功能，别忘了同时加载相应图表
                'echarts/chart/funnel'
            ],
            function (ec) {
                var myChart = ec.init(document.getElementById('main'));
			
			option = {
    title : {
        text: '国内国外品牌比例',
        subtext: '',
        x:'center'
    },
    tooltip : {
        trigger: 'item',
        formatter: "{a} <br/>{b} : {c} ({d}%)"
    },
    legend: {
        orient : 'vertical',
        x : 'left',
        data:['国内品牌','国外品牌']
    },
    toolbox: {
        show : false,
        feature : {
            mark : {show: false},
            dataView : {show: false, readOnly: false},
            magicType : {
                show: true, 
                type: ['pie', 'funnel'],
                option: {
                    funnel: {
                        x: '25%',
                        width: '50%',
                        funnelAlign: 'left',
                        max: 545
                    }
                }
            },
            restore : {show: true},
            saveAsImage : {show: true}
        }
    },
    calculable : true,
    series : [
        {
            name:'品牌数量',
            type:'pie',
            radius : '55%',
            center: ['50%', '60%'],
            data:[
                {value:{{ $guonei }}, name:'国内品牌'},
                {value:{{ $guowai }}, name:'国外品牌'},

            ]
        }
    ]
};
   myChart.setOption(option);
			}
);
</script>