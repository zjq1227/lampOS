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
    <script src={{asset("js/lrtk.js")}} type="text/javascript" ></script>
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
        <a href="javascript:ovid()" id="administrator_add" class="btn btn-warning"><i class="fa fa-plus"></i>友情链接</a>
       </span>
       <span class="r_f">共：<b>5</b>人</span>
     </div>
     <!--操作按钮-->
     <div class="table_menu_list">
       <table class="table table-striped table-bordered table-hover" id="sample-table">
		<thead>
		 <tr>
				<th width="120">ID</th>
				<th width="180">网站名称</th>
        <th width="180">网站地址</th>               
				<th width="210">操作</th>
			</tr>
		</thead>
	<tbody>
   @foreach($href as $k=>$v)
		<tr>
          <td>{{$v->id}}</td>
          <td>{{$v->inter}}</td>
          <td>{{$v->link}}</td>
        <td class="td-manage" class="inline laydate-icon" id="start">
      <!--   <a onClick="member_stop(this,'10001')"  href="javascript:;" title="停用"  class="btn btn-xs btn-success" class="fa fa-check  bigger-120"><i class="fa fa-check  bigger-120"></i></a>    -->

        <a onclick="demoint(this,{{$v->id}})"  class="administrator_upd btn btn-xs btn-info"><i class="fa fa-edit bigger-120"></i></a>

  

        <a title="删除"  onclick="member_del(this,{{$v->id}})" class="btn btn-xs btn-warning" ><i class="fa fa-trash  bigger-120"></i></a>
       </td>
       @endforeach
    </tr>     
    <script>

    function demoint(obj,id){
      var action = '{{Url("admin/Article/updlink/")}}'+'/'+id;
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
            location.href='{{Url("admin/Article/dellinks/")}}'+'/'+id;  
            },);
        };

    </script> 
    </tbody>
  	</table>
     </div>
    </div>
   </div>
</div>
<!--添加用户图层-->
 <div id="add_administrator_style"  class="add_menber" style="display:none">
      <form action="{{route('pen_link')}}" method="post" enctype="multipart/form-data" id="form-admin-add">
      {{ csrf_field() }}
      <div class="form-group">
        <label class="form-label"><span class="c-red">*</span>网站名称：</label>
        <div class="formControls">
          <input type="text" class="input-text" value="" placeholder="" id="inter" name="inter" datatype="*2-16" nullmsg="网站名称不能为空">
        </div>
        <div class="col-4"> <span class="Validform_checktip"></span></div>
      </div>
      <div class="form-group">
        <label class="form-label"><span class="c-red">*</span>网站链接：</label>
        <div class="formControls">
          <input type="text" class="input-text" value="" placeholder="" id="link" name="link" datatype="*2-16" nullmsg="网站链接不能为空">
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
          <label class="form-label"><span class="c-red">*</span>网站名称：</label>
          <div class="formControls">
            <input type="text" class="input-text" value="" placeholder="" id="inter" name="inter" datatype="*2-16" nullmsg="网站名称不能为空">
          </div>
          <div class="col-4"> <span class="Validform_checktip"></span></div>
        </div>
        <div class="form-group">
          <label class="form-label"><span class="c-red">*</span>网站链接：</label>
          <div class="formControls">
            <input type="text" class="input-text" value="" placeholder="" id="link" name="link" datatype="*2-16" nullmsg="网站链接不能为空">
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
      title:'友情链接',
      area: ['500px',''],
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