<!DOCTYPE html>
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
		<script src={{asset("admin/js/jquery.dataTables.min.js")}}></script>
		<script src={{asset("admin/js/jquery.dataTables.bootstrap.js")}}></script>
        <script src={{asset("admin/layer/layer.js")}} type="text/javascript" ></script>          
        <script src={{asset("admin/laydate/laydate.js")}} type="text/javascript"></script>
        <script src={{asset("js/lrtk.js")}} type="text/javascript" ></script>
<title>订单处理</title>
</head>

<body>
<div class="clearfix">
 <div class="handling_style" id="order_hand">
      <div id="scrollsidebar" class="left_Treeview">
        <div class="show_btn" id="rightArrow"><span></span></div>
        <div class="widget-box side_content" >
         <div class="side_title"><a title="隐藏" class="close_btn"><span></span></a></div>
         <div class="side_list"><div class="widget-header header-color-green2"><h4 class="lighter smaller">订单操作</h4></div>
         <div class="widget-body">
          <ul class="b_P_Sort_list">
             <li><i class="orange  fa fa-reorder"></i><a href="#">全部订单</a></li>
             <li><i class="fa fa-sticky-note pink "></i> <a href="{{route('Order_Handling4')}}">已完成</a></li>
             <li><i class="fa fa-sticky-note pink "></i> <a href="{{route('Order_Handling0')}}">代付款</a> </li>
             <li><i class="fa fa-sticky-note pink "></i> <a href="{{route('Order_Handling1')}}">代发货</a></li>
             <li><i class="fa fa-sticky-note pink "></i> <a href="{{route('Order_Handling2')}}">代收货</a></li>
            </ul>
        </div>
       </div>
      </div>  
     </div>
 <div class="order_list_style" id="order_list_style">
  <div class="search_style" class="inline laydate-icon" id="start" style=" margin-left:10px;">
    </div>
    <!--交易订单列表-->
    <div class="Orderform_list">
       <table class="table table-striped table-bordered table-hover" id="sample-table">
		 <thead>
		   <tr>
				<th width="25px"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
				<th width="50px">会员</th>
				<th width="120px">订单编号</th>
				<th width="50px">商家</th>				
        <th width="100px">收货地址</th>				
				<th width="180px">电话</th>
        <th width="80px">价格</th>
				<th width="70px">状态</th>
        <th width="100px">说明</th>                
				<th width="200px">操作</th>
			 </tr>
		   </thead>  
    	<tbody>
       @foreach($orders as $k=>$v)
       <tr>
         <td><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
         <td>{{$v->uname}}</td>
         <td>{{$v->code}}</td>     
         <td>{{$v->sname}}</td>
         <td>{{$v->acode}}</td>
         <td>{{$v->phone}}</td>
         <td>{{$v->total}}</td>
          <td class="td-status"><span class="label label-success radius">
           @if (($v->status)=="0")
           待付款
           @elseif (($v->status)=='1')
           待发货
           @elseif (($v->status)=='3')
           订单失效
           @elseif (($v->status)=='2')
           待收货
           @elseif (($v->status)=='4')
           订单完成
           @endif
          </span></td>
          <td></td>
          <td>
          @if (($v->status)=='1')
         <a onclick="demoint(this,{{$v->id}})" title="发货"  class="btn btn-xs btn-success"><i class="fa fa-cubes bigger-120"></i></a>
         @else
         @endif
         <a title="订单详细"  href="{{route('Order_Detailed',$v->id)}}"  class="btn btn-xs btn-info order_detailed" ><i class="fa fa-list bigger-120"></i></a> 
          @if (($v->status)=="0")
          <a title="删除" onclick="Order_form_del(this,{{$v->id}})" class="btn btn-xs btn-warning" ><i class="fa fa-trash  bigger-120"></i></a>
          @else
          @endif
         </td>
         </tr>
          @endforeach
        </tbody>
        </table>
<script>
function Order_form_del(obj,id){
          layer.confirm('是否放入回收站？', {
           btn: ['是','否'] ,//按钮
           icon:2, 
          },
          function(){
            // alert(id);
            location.href='{{Url("admin/Transaction/ordstu/")}}'+'/'+id;  
            },);
        };
function demoint(obj,id){
      var action = '{{Url("admin/Transaction/handdeal/")}}'+'/'+id;
      document.getElementById('form-admin-upd').setAttribute('action',action);
          layer.open({
          type: 1,
          title:'快递发货',
          area: ['500px',''],
          shadeClose: false,
          content: $('#add_administratorupd_style'),
          });
    };
</script>
    </div>
 </div>
 </div>
</div>

<!--发货-->
 <div id="add_administratorupd_style"  class="add_menber" style="display:none">
      <form action="" method="post" enctype="multipart/form-data" id="form-admin-upd">
      {{ csrf_field() }}
        <div class="form-group">
          <label class="form-label">快递公司：</label>
          <div class="formControls "> <span class="c-red">&nbsp;&nbsp;</span><span class="select-box" style="width:150px;">
            <select class="select" name="deliv" size="1">
              <option value="0">顺丰快递</option>
              <option value="1">圆通快递</option>
              <option value="2">中通快递</option>
              <option value="3">天天快递</option>
              <option value="4">申通快递</option>
              <option value="5">邮政EMS</option>
              <option value="6">邮政小包</option>
              <option value="7">韵达快递</option>
            </select>
            </span> </div>
        </div>
        <div class="form-group">
          <label class="form-label">快递编号：</label>
          <div class="formControls">
            <input type="text" class="input-text" value="" placeholder="" id="delivnum" name="delivnum" datatype="m" nullmsg="手机不能为空" nullmsg="快递编号不能为空">
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
<script>
$(function() { 
	$("#order_hand").fix({
		float : 'left',
		//minStatue : true,
		skin : 'green',	
		durationTime :false,
		spacingw:30,//设置隐藏时的距离
	    spacingh:250,//设置显示时间距
		table_menu:'.order_list_style',
	});
});


//时间
 laydate({
    elem: '#start',
    event: 'focus' 
});
//初始化宽度、高度  
 $(".widget-box").height($(window).height()); 
$(".order_list_style").width($(window).width()-220);
 $(".order_list_style").height($(window).height()-30);
  //当文档窗口发生改变时 触发  
    $(window).resize(function(){
	$(".widget-box").height($(window).height());
	 $(".order_list_style").width($(window).width()-234);
	  $(".order_list_style").height($(window).height()-30);
});

//订单列表
jQuery(function($) {
		var oTable1 = $('#sample-table').dataTable( {
		"aaSorting": [[ 1, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[0,2,3,4,5,6,8,9]}// 制定列不参与排序
		] } );
                 //全选操作
				$('table th input:checkbox').on('click' , function(){
					var that = this;
					$(this).closest('table').find('tr > td:first-child input:checkbox')
					.each(function(){
						this.checked = that.checked;
						$(this).closest('tr').toggleClass('selected');
					});
						
				});
			});
</script>
