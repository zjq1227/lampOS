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
		<script src={{asset("js/H-ui.js")}} type="text/javascript"></script>  
        <script src={{asset("admin/js/bootstrap.min.js")}}></script>
		<script src={{asset("admin/js/typeahead-bs2.min.js")}}></script>           	
		<script src={{asset("admin/js/jquery.dataTables.min.js")}}></script>
		<script src={{asset("admin/js/jquery.dataTables.bootstrap.js")}}></script>
        <script src={{asset("admin/layer/layer.js")}} type="text/javascript" ></script>          
        <script src={{asset("admin/laydate/laydate.js")}} type="text/javascript"></script>
          
        <script src={{asset("js/lrtk.js")}} type="text/javascript" ></script>
<title>退款管理</title>
</head>

<body>
<div class="margin clearfix">
 <div id="refund_style">
     <!--退款列表-->
     <div class="refund_list">
        <table class="table table-striped table-bordered table-hover" id="sample-table">
		<thead>
		 <tr>
				<th width="25px"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
				<th width="120px">订单编号</th>
				<th width="250px">产品名称</th>
				<th width="100px">交易金额</th>							
				<th width="100px">退款金额</th>
                <th width="80px">退款数量</th>
                <th width="150px">状态</th>                         
				<th width="200px">操作</th>
			</tr>
		</thead>
        <tbody>
        @foreach($orders as $k=>$v)
             <tr>
             <td><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
             <td>{{$v->code}}</td>
             <td>{{$v->goods}}</td>     
             <td>{{$v->price}}</td>
             <td>{{$v->price}}</td>
             <td>{{$v->nums}}</td>
             <td>
             @if (($v->outdor)=="0")
             <span class="label label-success radius">退款申请
             </span></td>
             <td>
             <a title="申请" onclick="demo(this,{{$v->id}})" class="administrator_upd btn btn-xs btn-info" ><i class="fa fa-edit bigger-120"></i></a>  
             </td>
             </tr>
             @elseif (($v->outdor)=="1")
             <span class="label label-success radius">退款中
             </span></td>
             <td>
             <a title="退款" onclick="demo(this,{{$v->id}})" class="administrator_upd btn btn-xs btn-info" ><i class="fa fa-edit bigger-120"></i></a>
             </td>
             </tr>
             @elseif (($v->outdor)=="2")
             <span class="label label-defaunt radius">已退款
              </span></td>
             <td>
             <a title="删除"   onclick="Order_form_del(this,{{$v->id}})" class="btn btn-xs btn-warning" ><i class="fa fa-trash  bigger-120"></i></a>    
             </td>
             </tr>
             @endif
             @endforeach
        </tbody>
    </table> 
     
     </div>
 </div>
</div>
</body>
</html>
<script>
function demo(obj,id){
          layer.confirm('是否退款？', {
           btn: ['是','否'] ,//按钮
           icon:2, 
          },
          function(){
            // alert(id);
            location.href='{{Url("admin/Transaction/Redres/")}}'+'/'+id;  
            },);
        };
    /*订单-删除*/
function Order_form_del(obj,id){
      layer.confirm('是否确定删除？', {
           btn: ['是','否'] ,//按钮
           icon:2,
      },
  function(){
            // alert(id);
            location.href='{{Url("admin/Transaction/delete/")}}'+'/'+id;  
            },);
    };
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
function Delivery_Refund(obj,id){
			
			 layer.confirm('是否退款当前商品价格！',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style=" display:none" class="btn btn-xs btn-success" onClick="member_stop(this,id)" href="javascript:;" title="已退款">退款</a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt  radius">已退款</span>');
		$(obj).remove();
		layer.msg('已退款!',{icon: 6,time:1000});
			});  
			  
		  
};
//面包屑返回值
var index = parent.layer.getFrameIndex(window.name);
parent.layer.iframeAuto(index);
$('.Refund_detailed').on('click', function(){
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