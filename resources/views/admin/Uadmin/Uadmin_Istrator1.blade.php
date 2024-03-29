<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Cache-Control" content="no-siteapp" />
         <link href={{ asset("admin/css/bootstrap.min.css")}} rel="stylesheet" />
        <link rel="stylesheet" href={{ asset("admin/css/style.css")}}/>       
        <link href={{ asset("admin/css/codemirror.css")}} rel="stylesheet">
        <link rel="stylesheet" href={{ asset("admin/css/ace.min.css")}} />
        <link rel="stylesheet" href={{ asset("admin/font/css/font-awesome.min.css")}} />
        <!--[if lte IE 8]>
		  <link rel="stylesheet" href={{ asset("admin/css/ace-ie.min.css")}} />
		<![endif]-->
		<script src={{ asset("js/jquery-1.9.1.min.js")}}></script>
        <script src={{ asset("admin/js/bootstrap.min.js")}}></script>
        <script type="text/javascript" src={{ asset("Widget/Validform/5.3.2/Validform.min.js")}}></script>
		<script src={{ asset("admin/js/typeahead-bs2.min.js")}}></script>           	
		<script src={{ asset("admin/js/jquery.dataTables.min.js")}}></script>
		<script src={{ asset("admin/js/jquery.dataTables.bootstrap.js")}}></script>
        <script src={{ asset("admin/layer/layer.js")}} type="text/javascript" ></script>          
		<script src={{ asset("js/lrtk.js")}} type="text/javascript" ></script>
         <script src={{ asset("admin/layer/layer.js")}} type="text/javascript"></script>	
        <script src={{ asset("admin/laydate/laydate.js")}} type="text/javascript"></script>
<title>管理员</title>
</head>

<body>
<div class="page-content clearfix">
  <div class="administrator">
       <div class="d_Confirm_Order_style">
    <div class="search_style">
    </div>
    <!--操作-->
     <div class="border clearfix">
       <span class="l_f" class="inline laydate-icon" id="start">
        <a href="javascript:ovid()" id="administrator_add" class="btn btn-warning"><i class="fa fa-plus"></i> 添加管理员</a>
       </span>
       <span class="r_f">共：<b>5</b>人</span>
     </div>
     <!--管理员列表-->
     <div class="clearfix administrator_style" id="administrator">
      <div class="left_style">
      <div id="scrollsidebar" class="left_Treeview">
        <div class="show_btn" id="rightArrow"><span></span></div>
        <div class="widget-box side_content" >
         <div class="side_title"><a title="隐藏" class="close_btn"><span></span></a></div>
         <div class="side_list"><div class="widget-header header-color-green2"><h4 class="lighter smaller">管理员分类列表</h4></div>
         <div class="widget-body">
           <ul class="b_P_Sort_list">
           <li><i class="fa fa-users green"></i> <a href="{{route('Uadmin_Istrator')}}">全部管理员</a></li>
            <li><i class="fa fa-users orange"></i> <a href="{{route('Uadmin_Istrator0')}}">超级管理员</a></li>
            <li><i class="fa fa-users orange"></i> <a href="#">普通管理员</a></li>
            <li><i class="fa fa-users orange"></i> <a href="{{route('Uadmin_Istrator2')}}">产品编辑管理员</a></li>
           </ul>
        </div>
       </div>
      </div>  
      </div>
      </div>
      <div class="table_menu_list"  id="testIframe">
           <table class="table table-striped table-bordered table-hover" id="sample_table">
		<thead>
		 <tr>
				<th width="25px"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
				<th width="80px">编号</th>
				<th width="250px">登录名</th>
				<th width="100px">手机</th>
				<th width="100px">邮箱</th>
                <th width="100px">性别</th>				
				<th width="180px">角色</th>
				<th width="70px">状态</th>                
				<th width="200px">操作</th>
			</tr>
		</thead>
	<tbody>
      @foreach ($auth1 as $k=>$v)
      <tr>
      <td><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
      <td>{{ $v->id -1}}</td>
      <td>{{ $v->uname }}</td>
      <td>{{  $v->phone }}</td>
      <td>{{ $v->email }}</td>
      <td>
      @if (($v->sex)==1 )
		男
	  @elseif (($v->sex)==0)
	    女
	  @endif
      </td>
	  <td>
	  @if (($v->auth)==0 )
		超级管理员
	  @elseif (($v->auth)==1)
	    普通管理员
	  @elseif (($v->auth)==2)
	  	编辑管理员
	  @endif
	  </td>
     <td class="td-status"><span class="label label-success radius">
       @if (($v->status)==1 )
		已启用
	  @elseif (($v->status)==0)
	    停用
	  @endif</span></td>
       < <td class="td-manage">
         <form action="{{route('Uadmin_useradmupd',array('id'=>$v->id))}}"  method="post" style="display: inline;">
        {{ csrf_field() }}
        
        <input type="submit" value="√" class="btn btn-xs btn-warning" />
        </a>
       </form> 
        <a title="编辑" href="{{route('Uadmin_Istrator_Upload',array('id'=>$v->id))}}"  class="btn btn-xs btn-info" ><i class="fa fa-edit bigger-120"></i></a>        
        <form action="{{route('Uadmin_userdel',array('id'=>$v->id))}}"  method="post" style="display: inline;">
        {{ csrf_field() }}
        
        <input type="submit" value="X" class="btn btn-xs btn-warning" />
        </a>
       </td>
       </form>
     </tr> 
     @endforeach 
    </tbody>
    </table>
      </div>
     </div>
  </div>
</div>
 <!--添加管理员-->
 <div id="add_administrator_style" class="add_menber" style="display:none">
    <form action="{{route('Uadmin_Istrator_add')}}" method="post" id="form-admin-add">
    	{{csrf_field()}}
		<div class="form-group">
			<label class="form-label"><span class="c-red">*</span>管理员：</label>
			<div class="formControls">
				<input type="text" class="input-text" value="" placeholder="" id="user-name" name="uname" datatype="*2-16" nullmsg="用户名不能为空">
			</div>
			<div class="col-4"> <span class="Validform_checktip"></span></div>
		</div>
		<div class="form-group">
			<label class="form-label"><span class="c-red">*</span>初始密码：</label>
			<div class="formControls">
			<input type="password" placeholder="密码" name="pass" autocomplete="off" value="" class="input-text" datatype="*6-20" nullmsg="密码不能为空">
			</div>
			<div class="col-4"> <span class="Validform_checktip"></span></div>
		</div>
		<div class="form-group">
			<label class="form-label "><span class="c-red">*</span>确认密码：</label>
			<div class="formControls ">
		<input type="password" placeholder="确认新密码" autocomplete="off" class="input-text Validform_error" errormsg="您两次输入的新密码不一致！" datatype="*" nullmsg="请再输入一次新密码！" recheck="pass" id="newpassword2" name="newpassword2">
			</div>

			<div class="col-4"> <span class="Validform_checktip"></span></div>
		</div>
		<div class="form-group">
			<label class="form-label "><span class="c-red">*</span>性别：</label>
			<div class="formControls  skin-minimal">
		      <label><input name="sex" type="radio" class="ace" checked="checked" value="1"><span class="lbl">保密</span></label>&nbsp;&nbsp;
            <label><input name="sex" type="radio" class="ace"  value="1"><span class="lbl">男</span></label>&nbsp;&nbsp;
            <label><input name="sex" type="radio" class="ace"  value="0"><span class="lbl">女</span></label>
			</div>
			<div class="col-4"> <span class="Validform_checktip"></span></div>
		</div>
		<div class="form-group">
			<label class="form-label "><span class="c-red">*</span>手机：</label>
			<div class="formControls ">
				<input type="text" class="input-text" value="" placeholder="" id="phone" name="phone" datatype="m" nullmsg="手机不能为空">
			</div>
			<div class="col-4"> <span class="Validform_checktip"></span></div>
		</div>
		<div class="form-group">
			<label class="form-label"><span class="c-red">*</span>邮箱：</label>
			<div class="formControls ">
				<input type="text" class="input-text" placeholder="@" name="email" id="email" datatype="e" nullmsg="请输入邮箱！">
			</div>
			<div class="col-4"> <span class="Validform_checktip"></span></div>
		</div>
		<div class="form-group">
			<label class="form-label">角色：</label>
			<div class="formControls "> <span class="select-box" style="width:150px;">
				<select class="select" name="auth" size="1">
					<option value="0">超级管理员</option>
					<option value="1">管理员</option>
					<option value="2">栏目主辑</option>
					<option value="3">栏目编辑</option>
				</select>
				</span> </div>
		</div>
		<div class="form-group">
		</div>
		<div> 
        <input class="btn btn-primary radius" type="submit" id="Add_Administrator" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
	</form>
   </div>
 </div>
</body>
</html>
<script type="text/javascript">
jQuery(function($) {
		var oTable1 = $('#sample_table').dataTable( {
		"aaSorting": [[ 1, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[0,2,3,4,5,7,8,]}// 制定列不参与排序
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

</script>
<script type="text/javascript">
$(function() { 
	$("#administrator").fix({
		float : 'left',
		//minStatue : true,
		skin : 'green',	
		durationTime :false,
		spacingw:50,//设置隐藏时的距离
	    spacingh:270,//设置显示时间距
	});
});
//字数限制
function checkLength(which) {
	var maxChars = 100; //
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
 laydate({
    elem: '#start',
    event: 'focus' 
});

/*用户-停用*/
function member_stop(obj,id){
	layer.confirm('确认要停用吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs " onClick="member_start(this,id)" href="javascript:;" title="启用"><i class="fa fa-close bigger-120"></i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');
		$(obj).remove();
		layer.msg('已停用!',{icon: 5,time:1000});
	});
}
/*用户-启用*/
function member_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs btn-success" onClick="member_stop(this,id)" href="javascript:;" title="停用"><i class="fa fa-check  bigger-120"></i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
		$(obj).remove();
		layer.msg('已启用!',{icon: 6,time:1000});
	});
}
/*产品-编辑*/
function member_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}

/*产品-删除*/
function member_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$(obj).parents("tr").remove();
		layer.msg('已删除!',{icon:1,time:1000});
	});
}
/*添加管理员*/
$('#administrator_add').on('click', function(){
	layer.open({
    type: 1,
	title:'添加管理员',
	area: ['700px',''],
	shadeClose: false,
	content: $('#add_administrator_style'),
	
	});
})
	//表单验证提交
$("#form-admin-add").Validform({
		
		 tiptype:2,
	
		callback:function(data){
		//form[0].submit();
		if(data.status==1){ 
                layer.msg(data.info, {icon: data.status,time: 1000}, function(){ 
                    location.reload();//刷新页面 
                    });   
            } 
            else{ 
                layer.msg(data.info, {icon: data.status,time: 3000}); 
            } 		  
			var index =parent.$("#iframe").attr("src");
			parent.layer.close(index);
			//
		}
		
		
	});	
</script>

