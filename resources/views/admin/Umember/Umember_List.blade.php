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
      <link rel="stylesheet" href={{ asset("admin/css/ace-ie.min.css")}} />
    <![endif]-->
    <script src={{asset("js/jquery-1.9.1.min.js")}}></script>
        <script src={{asset("admin/js/bootstrap.min.js")}}></script>
        <script type="text/javascript" src={{asset("Widget/Validform/5.3.2/Validform.min.js")}}></script>
    <script src={{asset("admin/js/typeahead-bs2.min.js")}}></script>             
    <script src={{asset("admin/js/jquery.dataTables.min.js")}}></script>
    <script src={{asset("admin/js/jquery.dataTables.bootstrap.js")}}></script>
        <script src={{asset("admin/layer/layer.js")}} type="text/javascript" ></script>          
    <script src={{ asset("js/lrtk.js")}} type="text/javascript" ></script>
         <script src={{asset("admin/layer/layer.js")}} type="text/javascript"></script>  
        <script src={{asset("admin/laydate/laydate.js")}} type="text/javascript"></script>
     <title>用户列表</title>
        </head>
    <body>
        <div class="page-content clearfix">
    <div id="Member_Ratings">
      <div class="d_Confirm_Order_style">
    <!--用户时间搜做-->
     <div class="search_style">
     
    </div>
     <!--操作按钮-->
     <div class="border clearfix" class="inline laydate-icon" id="start">
       <span class="l_f">
        <a href="javascript:ovid()" id="administrator_add" class="btn btn-warning"><i class="fa fa-plus"></i> 添加用户</a>
       </span>
       <span class="r_f">共：<b>5</b>人</span>
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
				<th width="150">头像</th>
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
          <td>{{ $v->uname }}</td>
          <td>
              @if (($v->userinfo->sex)=="2")
              男
              @elseif (($v->userinfo->sex)=="1")
                女
              @endif
          </td>
          <td>{{ $v->pic}}</td>
          <td>{{ $v->Email }}</td>
          <td><img src="/uploads/{{ $v->userinfo->profile }}" style="width: 50px;border-radius: 8px;"</td>
          <td>普通用户</td>
          <td class="td-status">
             @if (($v->status)==1 )
               <span class="label label-success radius">已启用</span>
             @elseif (($v->status)==2)
              <span class="label label-defaunt radius">已停用</span>
              @endif
           
          </td>
        <td class="td-manage" class="inline laydate-icon" id="start">
          <a onclick="demo(this,{{$v->id}})"  class="upd btn btn-xs btn-success"><i class="fa fa-check  bigger-120"></i></a>
          <a onclick="demoint(this,{{$v->id}})"  class="administrator_upd btn btn-xs btn-info"><i class="fa fa-edit bigger-120"></i></a>
          <a title="删除"  onclick="member_del(this,'{{$v->id}}')" class="btn btn-xs btn-warning" ><i class="fa fa-trash  bigger-120"></i></a>
       </td>
    </tr>     
    <script>
        function demo(obj,id){
          layer.confirm('是否确定修改权限？', {
           btn: ['是','否'] ,//按钮
           icon:2, 
          },
          function(){
            // alert(id);
            location.href='{{Url("admin/Umember/userupd/")}}'+'/'+id;  
            },);
        };


    function demoint(obj,id){
      var action = '{{Url("admin/Umember/upd/")}}'+'/'+id;
      document.getElementById('form-admin-upd').setAttribute('action',action);
          layer.open({
          type: 1,
          title:'修改信息',
          area: ['500px',''],
          shadeClose: false,
          content: $('#add_administratorupd_style'),
          });
    };
    /*用户-删除*/
    function member_del(obj,id){
      layer.confirm('是否确定删除？', {
           btn: ['是','否'] ,//按钮
           icon:2,
      },
      function(){
            // alert(id);
            location.href='{{Url("admin/Umember/del/")}}'+'/'+id;  
            },);
        };

    </script>
    @endforeach  
    </tbody>
  	</table>
     </div>
    </div>
   </div>
</div>
<!--添加用户图层-->
 <div id="add_administrator_style"  class="add_menber" style="display:none">
      <form action="{{route('addUser')}}" method="post" enctype="multipart/form-data" id="form-admin-add">
      {{ csrf_field() }}
      <div class="form-group">
        <label class="form-label"><span class="c-red">*</span>用户名：</label>
        <div class="formControls">
          <input type="text" class="input-text" value="" placeholder="" id="user-name" name="uname" datatype="*2-16" nullmsg="用户名不能为空">
        </div>
        <div class="col-4"> <span class="Validform_checktip"></span></div>
      </div>
      <div class="form-group">
        <label class="form-label"><span class="c-red">*</span>初始密码：</label>
        <div class="formControls">
        <input type="password" placeholder="密码" name="userpassword" autocomplete="off" value="" class="input-text" datatype="*6-20" nullmsg="密码不能为空">
        </div>
        <div class="col-4"> <span class="Validform_checktip"></span></div>
      </div>
      <div class="form-group">
        <label class="form-label "><span class="c-red">*</span>确认密码：</label>
        <div class="formControls ">
      <input type="password" placeholder="确认新密码" autocomplete="off" class="input-text Validform_error" errormsg="您两次输入的新密码不一致！" datatype="*" nullmsg="请再输入一次新密码！" recheck="userpassword" id="newpassword2" name="newpassword2">
        </div>
        <div class="col-4"> <span class="Validform_checktip"></span></div>
      </div>
         <div class="form-group">
        <label class="form-label "><span class="c-red">*</span>支付密码：</label>
        <div class="formControls ">
            <input type="password" placeholder="支付密码"  name="zpwd" autocomplete="off"  value="" class="input-text"  datatype="*6-6" nullmsg="密码不能为空"></div>
            <div class="col-4"> <span class="Validform_checktip"></span></div>
        </div>
      <div class="form-group">
        <label class="form-label "><span class="c-red">*</span>性别：</label>
        <div class="formControls  skin-minimal">
              <label><input name="sex" type="radio"  value="2" class="ace"><span class="lbl">男</span></label>&nbsp;&nbsp;
              <label><input name="sex" type="radio" value="1"  class="ace"><span class="lbl">女</span></label>
        </div>
        <div class="col-4"> <span class="Validform_checktip"></span></div>
      </div>
      <div class="form-group">
        <label class="form-label "><span class="c-red">*</span>手机：</label>
        <div class="formControls ">
          <input type="text" class="input-text" value="" placeholder="" id="user-tel" name="phone" datatype="m" nullmsg="手机不能为空">
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
       <label class="form-label "><span class="c-red">*</span>头像：</label>
        <div class="formControls ">
          <input type="file" class="input-file" value=""  id="photo" name="profile" >
        </div>
        <div class="col-4"> <span class="Validform_checktip"></span></div>
      </div>
      <div class="form-group">
       
        </div>
        <div class="col-4"> <input class="btn btn-primary radius" type="submit" id="Add_Administrator" value="&nbsp;&nbsp;提交&nbsp;&nbsp;"> </div>
      </div>
      <div> 
    </form>
   </div>


   <!--修改-->
    <div id="add_administratorupd_style"  class="add_menber" style="display:none">
      <form action="" method="post" enctype="multipart/form-data" id="form-admin-upd">
      {{ csrf_field() }}
      <div class="form-group">
        <label class="form-label"><span class="c-red">*</span>用户名：</label>
        <div class="formControls">
          <input type="text" class="input-text" value=""  disabled  id="user-name" name="uname" datatype="*2-16" nullmsg="用户名不能为空">
        </div>
        <div class="col-4"> <span class="Validform_checktip"></span></div>
      </div>
         <div class="form-group">
        <label class="form-label "><span class="c-red">*</span>支付密码：</label>
        <div class="formControls ">
            <input type="password" placeholder="支付密码"  name="zpwd" autocomplete="off"  value="" class="input-text"  datatype="*6-6" nullmsg="密码不能为空"></div>
            <div class="col-4"> <span class="Validform_checktip"></span></div>
        </div>
      <div class="form-group">
        <label class="form-label "><span class="c-red">*</span>性别：</label>
        <div class="formControls  skin-minimal">
              <label><input name="sex" type="radio"  value="2" class="ace"><span class="lbl">男</span></label>&nbsp;&nbsp;
              <label><input name="sex" type="radio" value="1"  class="ace"><span class="lbl">女</span></label>
        </div>
        <div class="col-4"> <span class="Validform_checktip"></span></div>
      </div>
      <div class="form-group">
        <label class="form-label "><span class="c-red">*</span>手机：</label>
        <div class="formControls ">
          <input type="text" class="input-text" value="" placeholder="" id="user-tel" name="phone" datatype="m" nullmsg="手机不能为空">
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
       <label class="form-label "><span class="c-red">*</span>头像：</label>
        <div class="formControls ">
          <input type="file" class="input-file" value=""  id="photo" name="profile" >
        </div>
        <div class="col-4"> <span class="Validform_checktip"></span></div>
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
<script type="text/javascript">
// console.log('{{route("useradmupd",array("id"=>$v->id))}}');

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
    $(function() { 
      $(".administrator").fix({
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
    $(".table_menu_list").width($(window).width()-60);
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
    /*用户-查看*/
    function member_show(title,url,id,w,h){
    	layer_show(title,url+'#?='+id,w,h);
    }


    $('#administrator_add').on('click', function(){
      layer.open({
        type: 1,
      title:'添加会员',
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