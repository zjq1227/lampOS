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
        <script type="text/javascript" src={{asset("js/H-ui.js")}}></script>     
		<script src={{asset("admin/js/typeahead-bs2.min.js")}}></script>           	
		<script src={{asset("admin/js/jquery.dataTables.min.js")}}></script>
		<script src={{asset("admin/js/jquery.dataTables.bootstrap.js")}}></script>
        <script src={{asset("admin/layer/layer.js")}} type="text/javascript" ></script>          
        <script src={{asset("admin/laydate/laydate.js")}} type="text/javascript"></script>
        <script src={{asset("admin/js/jquery.easy-pie-chart.min.js")}}></script>
        <script src={{asset("js/lrtk.js")}} type="text/javascript" ></script>
<title>订单管理</title>
</head>

<body>
 <div class="cover_style" id="cover_style">
    <!--内容-->
   <div class="centent_style" id="centent_style">
     <div id="covar_list" class="order_list">
       <div id="scrollsidebar" class="left_Treeview">
        <div class="show_btn" id="rightArrow"><span></span></div>
     </div>
     <!--左侧样式-->
     <div class="list_right_style" style="height: 223px; width: 1300px;">
         <div class="search_style">
         
              <ul class="search_content clearfix">
               <li><label class="l_f">订单编号</label><input name="" type="text" class="text_add" placeholder="订单订单编号" style=" width:250px"></li>
               <li><label class="l_f">时间</label><input class="inline laydate-icon" id="start" style=" margin-left:10px;"></li>
               <li style="width:90px;"><button type="button" class="btn_search"><i class="fa fa-search"></i>查询</button></li>
              </ul>
            </div>
            <!--订单列表展示-->
             <table class="table table-striped table-bordered table-hover" id="sample-table">
        		<thead>
        		 <tr>
        				<th width="25px"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
                <th width="50px">会员</th>
                <th width="120px">订单编号</th>
                <th width="50px">商家</th>        
                <th width="100px">收货地址</th>       
                <th width="180px">电话</th>
                <th width="80px">数量</th>
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
             @elseif (($v->status)=='5')
             退款
             @endif
              </span></td>
              <td></td>
             <td>
             <a title="恢复" onclick="demo(this,{{$v->id}})" class="administrator_upd btn btn-xs btn-info" ><i class="fa fa-edit bigger-120"></i></a>
             <a title="删除"   onclick="Order_form_del(this,{{$v->id}})" class="btn btn-xs btn-warning" ><i class="fa fa-trash  bigger-120"></i></a>    
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
function demo(obj,id){
          layer.confirm('是否恢复订单？', {
           btn: ['是','否'] ,//按钮
           icon:2, 
          },
          function(){
            // alert(id);
            location.href='{{Url("admin/Transaction/ordstu/")}}'+'/'+id;  
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
            location.href='{{Url("admin/Transaction/Orderdel/")}}'+'/'+id;  
            },);
    };
//左侧显示隐藏

//时间选择
 laydate({
    elem: '#start',
    event: 'focus' 
});
/**发货**/
function Delivery_stop(obj,id){
	layer.open({
        type: 1,
        title: '发货',
		maxmin: true, 
		shadeClose:false,
        area : ['500px' , ''],
        content:$('#Delivery_stop'),
		btn:['确定','取消'],
		yes: function(index, layero){		
		if($('#form-field-1').val()==""){
			layer.alert('快递号不能为空！',{
               title: '提示框',				
			  icon:0,		
			  }) 
			
			}else{			
			 layer.confirm('提交成功！',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style=" display:none" class="btn btn-xs btn-success" onClick="member_stop(this,id)" href="javascript:;" title="已发货"><i class="fa fa-cubes bigger-120"></i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发货</span>');
		$(obj).remove();
		layer.msg('已发货!',{icon: 6,time:1000});
			});  
			layer.close(index);    		  
		  }
		
		}
	})
};
//面包屑返回值
var index = parent.layer.getFrameIndex(window.name);
parent.layer.iframeAuto(index);
$('.Order_form,.order_detailed').on('click', function(){
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

//初始化宽度、高度  
  var heights=$(".top_style").outerHeight()+47; 
 $(".centent_style").height($(window).height()-heights); 
 $(".page_right_style").width($(window).width()+10);
 $(".left_Treeview,.list_right_style").height($(window).height()-heights-1); 
 $(".list_right_style").width($(window).width()-10);
  //当文档窗口发生改变时 触发  
    $(window).resize(function(){
	$(".centent_style").height($(window).height()-heights); 
	 $(".page_right_style").width($(window).width());
	 $(".left_Treeview,.list_right_style").height($(window).height()-heights-2);  
	 $(".list_right_style").width($(window).width());
	}) 
//比例
var oldie = /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase());
			$('.easy-pie-chart.percentage').each(function(){
				$(this).easyPieChart({
					barColor: $(this).data('color'),
					trackColor: '#EEEEEE',
					scaleColor: false,
					lineCap: 'butt',
					lineWidth: 10,
					animate: oldie ? false : 1000,
					size:103
				}).css('color', $(this).data('color'));
			});
		
			$('[data-rel=tooltip]').tooltip();
			$('[data-rel=popover]').popover({html:true});
</script>
<script>
//订单列表
jQuery(function($) {
		var oTable1 = $('#sample-table').dataTable( {
		"aaSorting": [[ 1, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[0,1,2,3,4,5,6,7,8,9]}// 制定列不参与排序
		] } );
				
				
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