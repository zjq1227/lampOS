<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href={{asset("admin/css/bootstrap.min.css")}} rel="stylesheet" />
        <link rel="stylesheet" href={{asset("admin/css/style.css")}} />
        <link href={{asset("admin/css/codemirror.css")}} rel="stylesheet">
        <link rel="stylesheet" href={{asset("admin/css/ace.min.css")}} />
        <link rel="stylesheet" href={{asset("admin/css/font-awesome.min.css")}} />
        <!--[if IE 7]>
            <link rel="stylesheet" href={{asset("admin/css/font-awesome-ie7.min.css")}} />
        <![endif]-->
        <!--[if lte IE 8]>
            <link rel="stylesheet" href={{asset("admin/css/ace-ie.min.css")}} />
        <![endif]-->
        <script src={{asset("admin/js/jquery.min.js")}}></script>
        <!-- <![endif]-->
        <!--[if IE]>
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <![endif]-->
        <!--[if !IE]> -->
            <script type="text/javascript">window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>" + "<" + "/script>");</script>
            <!-- <![endif]-->
            <!--[if IE]>
                <script type="text/javascript">window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>" + "<" + "/script>");</script>
            <![endif]-->
            <script type="text/javascript">if ("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");</script>
            <script src={{asset("admin/js/bootstrap.min.js")}}></script>
            <script src={{asset("admin/js/typeahead-bs2.min.js")}}></script>
            <!-- page specific plugin scripts -->
            <script src={{asset("admin/js/jquery.dataTables.min.js")}}></script>
            <script src={{asset("admin/js/jquery.dataTables.bootstrap.js")}}></script>
            <script type="text/javascript" src={{asset("js/H-ui.js")}}></script>
            <script type="text/javascript" src={{asset("js/H-ui.admin.js")}}></script>
            <script src={{asset("admin/layer/layer.js")}} type="text/javascript"></script>
            <script src={{asset("admin/laydate/laydate.js")}} type="text/javascript"></script>
            <title>用户列表</title>
        </head>
    <body>
        <div class="page-content clearfix">
    <div id="Member_Ratings">
      <div class="d_Confirm_Order_style">
    <div class="search_style">
    <!--用户时间搜做-->
    
     <!--操作按钮-->
     <div class="border clearfix">
       <span class="l_f">
        <a href="javascript:ovid()" id="member_add" class="btn btn-warning"><i class="icon-plus"></i>添加用户</a>
        <a href="javascript:ovid()" class="btn btn-danger"><i class="icon-trash"></i>批量删除</a>
       </span>
       <span class="r_f">共：<b>{{ $count }}</b>条</span>
     </div>
     <!--操作按钮-->
     <div class="table_menu_list">
       <table class="table table-striped table-bordered table-hover" id="sample-table">
		<thead>
		 <tr>
				<th width="25"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
				<th width="80">ID</th>
				<th width="100">用户名</th>
				<th width="80">性别</th>
				<th width="120">手机</th>
				<th width="150">邮箱</th>
				<th width="">地址</th>
				<th width="180">加入时间</th>
                <th width="100">等级</th>
				<th width="70">状态</th>                
				<th width="250">操作</th>
			</tr>
		</thead>
	<tbody>
      @foreach($users as $k=>$v)
		<tr>
          <td><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
          <td>{{ $num++ }}</td>
          <td><u style="cursor:pointer" class="text-primary" onclick="member_show('张三','member-show.html','{{ $v->id }}','500','400')">{{ $v->Uname }}</u></td>
          <td>
              @if($v->Sex == "1")
              男
              @else
              女
              @endif
          </td>
          <td>{{ $v->Phone }}</td>
          <td>{{ $v->Email }}</td>
          <td class="text-l">{{ $v->Adress }}</td>
          <td>{{ $v->Addtime }}</td>
          <td>普通用户</td>
          <td class="td-status">
              @if($v->Status == "1")
              <span class="label label-success radius">已启用</span>
              @else
              <span class="label label-defaunt radius">已停用</span>
              @endif
           
          </td>
          <td class="td-manage">
              @if($v->Status == "1")
              <a onClick="member_stop(this,'{{ $v }}')"  href="javascript:;" title="停用"  class="btn btn-xs btn-success">
                  <i class="icon-ok bigger-120"></i>
                </a> 
              @else
              <a style="text-decoration:none" class="btn btn-xs " onClick="member_start(this,id)" href="javascript:;" title="启用">
                <i class="icon-ok bigger-120"></i></a>
              @endif
          
          <a title="编辑" onclick="member_edit('550')" href="javascript:;"  class="btn btn-xs btn-info" >
            <i class="icon-edit bigger-120"></i>
          </a> 
          <a title="删除" href="javascript:;"  onclick="member_del(this,'1')" class="btn btn-xs btn-warning" ><i class="icon-trash  bigger-120"></i></a>
          </td>
         
    </tr>     
   
    @endforeach  
  </tbody>
	</table>
   </div>
  </div>
 </div>
</div>
<!--添加用户图层-->
<form class="mws-form" action="Admin\Umember\UmemberController@addUser" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
<div class="add_menber" id="add_menber_style" style="display:none">
  
    <ul class=" page-content">
     <li><label class="label_name">用&nbsp;&nbsp;户 &nbsp;名：</label><span class="add_name"><input value="" name="Uname" type="text" name1="用户名" class="text_add"/></span><div class="prompt r_f"></div></li>
     <li><label class="label_name">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：</label><span class="add_name"><input name="Password" type="password"  name1="密码" class="text_add"/></span><div class="prompt r_f"></div></li>
     <li><label class="label_name">性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：</label><span class="add_name">
        <label><input type="radio"  class="ace" name="Sex" value="1"><span class="lbl">男</span></label>&nbsp;&nbsp;&nbsp;
        <label><input type="radio"  class="ace" name="Sex" value="0"><span class="lbl">女</span></label>&nbsp;&nbsp;&nbsp;
     {{-- <li><label class="label_name">固定电话：</label><span class="add_name"><input name="固定电话" type="text"  class="text_add"/></span><div class="prompt r_f"></div></li> --}}
     <li><label class="label_name">移动电话：</label><span class="add_name"><input name="Phone" name1="手机号" type="text"  class="text_add"/></span><div class="prompt r_f"></div></li>
     <li><label class="label_name">电子邮箱：</label><span class="add_name"><input name="Email" type="text" name1="邮箱"  class="text_add"/></span><div class="prompt r_f"></div></li>
     <li class="adderss"><label class="label_name">家庭住址：</label><span class="add_name"><input name="Adress" type="text" name1="地址" class="text_add" style=" width:350px"/></span><div class="prompt r_f"></div></li>
     <li><label class="label_name">状&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;态：</label><span class="add_name">
     <label><input name="Status" type="radio"  value="1" class="ace"><span class="lbl">开启</span></label>&nbsp;&nbsp;&nbsp;
     <label><input name="Status" type="radio" value="0" class="ace"><span class="lbl" >关闭</span></label></span><div class="prompt r_f"></div></li>
    </ul>
   
    
 
 </div>
</form>
</body>
</html>
<script type="text/javascript">
jQuery(function($) {
				var oTable1 = $('#sample-table').dataTable( {
				"aaSorting": [[ 1, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[0,8,9]}// 制定列不参与排序
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
			})
/*用户-添加*/
 $('#member_add').on('click', function(){
    layer.open({
        type: 1,
        title: '添加用户',
		maxmin: true, 
		shadeClose: true, //点击遮罩关闭层
        area : ['800px' , ''],
        content:$('#add_menber_style'),
		btn:['提交','取消'],
		yes:function(index,layero){	
		 var num=0;
		 var str="";
     $(".add_menber input[type$='text']").each(function(n){
          if($(this).val()=="")
          {
               
			   layer.alert(str+=""+$(this).attr("name1")+"不能为空！\r\n",{
                title: '提示框',				
				icon:0,								
          }); 
		    num++;
            return false;            
          } 
		 });
		  if(num>0){  return false;}	 	
          else{
            // console.log($("input[name='sex']")['0'].checked == false);
            if($("input[name='Sex']")['0'].checked == false){
              var xingbie=$("input[name='Sex']:eq(1)").val();
            }else{
              var xingbie=$("input[name='Sex']:eq(0)").val();
            }

            if($("input[name='Status']")['0'].checked == false){
              var Status=$("input[name='Status']:eq(1)").val();
            }else{
              var Status=$("input[name='Status']:eq(0)").val();
            }
            $.post('{{route("addUser")}}',{'_token':'{{csrf_token()}}',
            'Uname':$("input[name='Uname']").val(),
            'Password':$("input[name='Password']").val(),
            'Sex':xingbie,
            'Status':Status,
            'Phone':$("input[name='Phone']").val(),
            'Email':$("input[name='Email']").val(),
            'Adress':$("input[name='Adress']").val(),},
            function(data) //第二个参数要传token的值 再传参数要用逗号隔开
            {
              console.log(data);
            });
			  layer.alert('添加成功！',{
               title: '提示框',				
			icon:1,		
			  });
			   layer.close(index);	
		  }		  		     				
		}
    });
});
/*用户-查看*/
function member_show(title,url,id,w,h){
	layer_show(title,url+'#?='+id,w,h);
}
/*用户-停用*/
function member_stop(obj,id){
	layer.confirm('确认要停用吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs " onClick="member_start(this,id)" href="javascript:;" title="启用"><i class="icon-ok bigger-120"></i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');
		$(obj).remove();
		layer.msg('已停用!',{icon: 5,time:1000});
	});
}

/*用户-启用*/
function member_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs btn-success" onClick="member_stop(this,id)" href="javascript:;" title="停用"><i class="icon-ok bigger-120"></i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
		$(obj).remove();
		layer.msg('已启用!',{icon: 6,time:1000});
	});
}
/*用户-编辑*/
function member_edit(id){
	  layer.open({
        type: 1,
        title: '修改用户信息',
		maxmin: true, 
		shadeClose:false, //点击遮罩关闭层
        area : ['800px' , ''],
        content:$('#add_menber_style'),
		btn:['提交','取消'],
		yes:function(index,layero){	
		 var num=0;
		 var str="";
     $(".add_menber input[type$='text']").each(function(n){
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
		  if(num>0){  return false;}	 	
          else{
			  layer.alert('添加成功！',{
               title: '提示框',				
			icon:1,		
			  });
			   layer.close(index);	
		  }		  		     				
		}
    });
}
/*用户-删除*/
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