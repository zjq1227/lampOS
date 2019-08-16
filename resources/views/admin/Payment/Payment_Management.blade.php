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
		<script src={{asset("admin/js/jquery.dataTables.min.js")}}></script>
		<script src={{asset("admin/js/jquery.dataTables.bootstrap.js")}}></script> 
        <script src={{asset("admin/layer/layer.js")}} type="text/javascript" ></script>          
        <script src={{asset("admin/laydate/laydate.js")}} type="text/javascript"></script>     
        <script src={{asset("js/lrtk.js")}} type="text/javascript" ></script>	
<title>个人账户</title>
</head>

<body>
<div class="margin clearfix">
 <div class="cover_style" id="cover_style">
 
    <!--操作--> 
     <div class="border clearfix">
       <span class="r_f">共：<b>{{ $counts }}</b>个账户</span>
     </div>
     <!--账户管理-->
      <div class="">
       <table class="table table-striped table-bordered table-hover" id="sample-table">
      <thead>
		 <tr>
          <th width=""><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
          <th width="">ID</th>
          <th width="">用户名</th>
          <th width="">账户余额</th>  
          <th width="">账户状态</th>                
          <th width="">操作</th>
          </tr>
      </thead>
	<tbody>
      @foreach ($account as $k)
		<tr>
          <td> <label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
          <td>{{ $k->id }}</td>
          <td><u style="cursor:pointer"  class="text-primary" >{{ $k->uname  }}</u></td>
          <td>{{ $k->uyuer }}</td>          
  
          @if ( $k->zhstatus == 1)
          <td class="td-status">
              <span class="label label-success radius">启用</span>
          </td>    
          <td class="td-manage">   
              <a style="text-decoration:none" class="btn btn-xs btn-success" onClick="member_stop(this,{{ $k->id }})" href="javascript:;" title="停用">
                <i class="fa fa-check bigger-120"></i>
              </a>    
              <a href="{{route('Details',array('id'=>$k->id,'uid'=>$k->uid))}}"  class="btn btn-xs  btn-warning Account_Details" onclick="generateOrders('511');" title="{{ $k->uname }}账户详细" >
                  <i class="fa fa-list-ul bigger-120"></i></a>      
               
          </td>
          @else
          <td class="td-status">
              <span class="label label-default radius">关闭</span>
          </td>
          <td class="td-manage">   
            <a style="text-decoration:none" class="btn btn-xs " onClick="member_start(this,{{ $k->id }})" href="javascript:;" title="启用">
              <i class="fa fa-close bigger-120"></i>
            </a>
            <a href="{{route('Details',array('id'=>$k->id,'uid'=>$k->uid))}}" class="btn btn-xs  btn-warning Account_Details"  title="{{ $k->uname }}账户详细" >
                <i class="fa fa-list-ul bigger-120"></i></a>     
          </td>
          @endif
        </tr>
        @endforeach
        </tbody>
      </table>
      </div>
     
</div>
</div>
</body>
</html>
<script type="text/javascript">
/*用户-停用*/
function member_stop(obj,id){
	layer.confirm('确认要停用该账户吗？',function(index){
		$.ajax({
		type:'GET',
		url:"{{route('Management_update')}}",
		data:{'id':id,'zhstatus':2},
		dataType:'json',
		success: function(data){
		$(obj).parents("tr").find(".td-manage").prepend('<a  class="btn btn-xs " onClick="member_start(this,{{$k->id}} )" href="javascript:;" title="启用"><i class="fa fa-close bigger-120"></i></a>');
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
	layer.confirm('确认要启用该账户吗？',function(index){
    $.ajax({
		type:'GET',
		url:"{{route('Management_update')}}",
		data:{'id':id,'zhstatus':1},
		dataType:'json',
		success: function(data){
		$(obj).parents("tr").find(".td-manage").prepend('<a  class="btn btn-xs btn-success" onClick="member_stop(this,{{$k->id}})" href="javascript:;" title="停用"> <i class="fa fa-check bigger-120"></i></a>');
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
jQuery(function($) {
		var oTable1 = $('#sample-table').dataTable( {
		"aaSorting": [[ 1, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"bAutoWidth":true,
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[0,2,3,4,6,7,8,9]}// 制定列不参与排序
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

var index = parent.layer.getFrameIndex(window.name);
parent.layer.iframeAuto(index);
$('.Order_form ,.Account_Details').on('click', function(){
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

	window.location.href = "{{route('Details',$k->id)}}";

};
</script>