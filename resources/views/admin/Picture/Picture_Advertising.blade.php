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
        <link href={{asset("admin/css/codemirror.css")}} rel="stylesheet">
        <link rel="stylesheet" href={{asset("admin/css/ace.min.css")}} />
        <link rel="stylesheet" href={{asset("admin/font/css/font-awesome.min.css")}} />
        <!--[if lte IE 8]>
		  <link rel="stylesheet" href={{asset("admin/css/ace-ie.min.css")}} />
		<![endif]-->
		<script src={{asset("js/jquery-1.9.1.min.js")}}></script>
		<script src={{asset("admin/js/typeahead-bs2.min.js")}}></script>   
        <script src={{asset("js/lrtk.js")}} type="text/javascript" ></script>		
		<script src={{asset("admin/js/jquery.dataTables.min.js")}}></script>
		<script src={{asset("admin/js/jquery.dataTables.bootstrap.js")}}></script>
        <script src={{asset("admin/layer/layer.js")}} type="text/javascript" ></script>          
        <script type="text/javascript" src={{asset("Widget/swfupload/swfupload.js")}}></script>
        <script type="text/javascript" src={{asset("Widget/swfupload/swfupload.queue.js")}}></script>
        <script type="text/javascript" src={{asset("Widget/swfupload/swfupload.speed.js")}}></script>
        <script type="text/javascript" src={{asset("Widget/swfupload/handlers.js")}}></script>
<title>广告管理</title>
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
	{{-- {{ $configer }} --}}
<div class=" clearfix" id="advertising">
       <div id="scrollsidebar" class="left_Treeview">
    <div class="show_btn" id="rightArrow"><span></span></div>
    <div class="widget-box side_content" >
    <div class="side_title"><a title="隐藏" class="close_btn"><span></span></a></div>
     <div class="side_list">
      <div class="widget-header header-color-green2">
          <h4 class="lighter smaller">广告图分类</h4>
      </div>
      <div class="widget-body">
         <ul class="b_P_Sort_list">
             <li><i class="orange  fa fa-user-secret"></i><a href="#">全部({{ $counts }})</a></li>
			@foreach ($configer as $k)
			 <li><i class="fa fa-image pink "></i> <a href="#">{{ $k->tname }}</a></li>
			 @endforeach
         </ul>
  </div>
  </div>
  </div>  
  </div><div class="Ads_list">
   <div class="border clearfix">
       <span class="l_f">
		<a href="javascript:ovid()" id="sort_add" class="btn btn-warning"><i class="fa fa-plus"></i> 添加分类</a>
        <a href="javascript:ovid()" id="ads_add" class="btn btn-warning"><i class="fa fa-plus"></i> 添加广告</a>
		<a href="javascript:ovid()" id="sort_list" class="btn btn-warning"><i class="fa fa-plus"></i> 分类列表</a>
        <a href="javascript:location.replace(location.href);" class="btn btn-success"><i class="fa fa-plus"></i> 点击刷新</a>
		
       </span>
       <span class="r_f">共：<b>{{ $countt }}</b>条广告</span>
     </div>
     <div class="Ads_lists">
       <table class="table table-striped table-bordered table-hover" id="sample-table">
		<thead>
		 <tr>
				<th width="25"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
				<th width="80">ID</th>
                <th>排序</th>
				<th width="100">分类</th>
				<th width="220px">图片</th>
				{{-- <th width="150px">尺寸（大小）</th> --}}
				<th width="250px">链接地址</th>
				<th width="180px">加入时间</th>
				<th width="70px">状态</th>                
				<th width="250px">操作</th>
			</tr>
		</thead>
	<tbody>
	@foreach ($contents as $k)
      <tr>
       <td><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
       <td>{{  $num++ }}</td>
       <td><input name="" type="text"  style=" width:50px" placeholder="{{ $k->desc }}"/></td>
       <td>{{ $k->tname }}</td>
       <td><span class="ad_img"><img src={{asset("uploads".'/'.$k->pic)}}  width="100%" height="100%"/></span></td>
       {{-- <td>1890x1080</td> --}}
       <td><a href="#" target="_blank">{{ $k->link }}</a></td>
	   <td>{{ $k->created_at }}</td>
	   @if ( $k->astatus == 1)
       <td class="td-status"><span class="label label-success radius">显示</span></td>
      <td class="td-manage">
        <a onClick="member_stop(this,'{{ $k->id }}')"  href="javascript:;" title="停用"  class="btn btn-xs btn-success"><i class="fa fa-check  bigger-120"></i></a>   
        {{-- <a title="编辑" href="{{route('PictureAdvertising_Upload')}}"  class="btn btn-xs btn-info" ><i class="fa fa-edit bigger-120"></i></a>       --}}
        {{-- <a title="删除" href="javascript:;"  onclick="member_del(this,'1')" class="btn btn-xs btn-warning" ><i class="fa fa-trash  bigger-120"></i></a> --}}
	   </td>
	   @else
	   <td class="td-status">
			<span class="label label-default radius">关闭</span>
		</td>
		<td class="td-manage">   
		  <a style="text-decoration:none" class="btn btn-xs " onClick="member_start(this,{{ $k->id }})" href="javascript:;" title="启用"><i class="fa fa-close bigger-120"></i></a>
		  {{-- <a title="编辑" href="{{route('Article_List_Upload')}}"  class="btn btn-xs btn-info" ><i class="fa fa-edit bigger-120"></i></a>     --}}
		  {{-- <a title="删除" href="{{route('Article_Article_Del').'/'.$v->id}}"   class="btn btn-xs btn-danger" ><i class="fa fa-trash  bigger-120"></i></a> --}}
		</td>
		@endif
	  </tr>
	  @endforeach
    </tbody>
    </table>
     </div>
 </div>
</div>
<!--添加广告样式-->
<div id="add_ads_style"  style="display:none">
 <div class="add_adverts">
<form class="mws-form" action="{{route('PictureAdvertising_Pic_Add')}}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
 <ul>
  <li>
  <label class="label_name">所属分类</label>
  <span class="cont_style">
  <select class="form-control" id="form-field-select-1" value="type" name="type">
    <option value="">选择分类</option>
	@foreach ($configer as $k)
	<option value="{{ $k->id }}">{{ $k->tname }}</option>
	@endforeach
  </select></span>
  </li>
  <li><label class="label_name">显示排序</label><span class="cont_style"><input name1="排序" name="desc" type="text" id="form-field-1" placeholder="0" class="col-xs-10 col-sm-5" style="width:50px"></span></li>
  <li><label class="label_name">链接地址</label><span class="cont_style"><input name1="地址" name="link" type="text" id="form-field-1" placeholder="地址" class="col-xs-10 col-sm-5" style="width:450px"></span></li>
   <li><label class="label_name">状&nbsp;&nbsp;态：</label>
   <span class="cont_style">
     &nbsp;&nbsp;<label><input name="astatus" value="1" type="radio" checked="checked" class="ace"><span class="lbl">显示</span></label>&nbsp;&nbsp;&nbsp;
     <label><input name="astatus" value="2" type="radio" class="ace"><span class="lbl">隐藏</span></label></span><div class="prompt r_f"></div>
     </li>
     <li><label class="label_name">图&nbsp;&nbsp;片</label><span class="cont_style">
			<input type="file" name="pic" id="form-field-1">
   </span>
  </li> 
  <li class="clearfix"><span class="formControls w_txt"><label class="label_name">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
	<input class="btn btn-primary radius" type="submit" id="Add_Administrator" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
	</span>
  </li>
 </ul>
</form>
 </div>
</div>
<!--添加分类-->
<div class="sort_style_add margin" id="sort_style_add" style="display:none">
	<form class="mws-form" action="{{route('PictureAdvertising_Type_Add')}}" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
	<div class="">
	   <ul>
		<li><label class="label_name">分类名称</label><div class="col-sm-9"><input name1="分类名称" name="tname" type="text" id="form-field-1" placeholder="" class="col-xs-10 col-sm-5"></div></li>
		<li><label class="label_name">分类说明</label><div class="col-sm-9"><textarea name1="分类说明" name="content" class="form-control" id="form-field-8" placeholder="" ></textarea><span class="wordage">剩余字数：<span id="sy" style="color:Red;">200</span>字</span></div></li>
		<li><label class="label_name">分类状态</label>
		<span class="add_content"> &nbsp;&nbsp;<label><input name1="form-field-radio1" name="status" value="1" type="radio" checked="checked" class="ace"><span class="lbl">显示</span></label>&nbsp;&nbsp;&nbsp;
	   <label><input name1="form-field-radio1" type="radio" class="ace" name="status" value="2"><span class="lbl">隐藏</span></label></span>
	   </li>
	   <li class="clearfix"><span class="formControls w_txt"><label class="label_name">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <input class="btn btn-primary radius" type="submit" id="Add_Administrator" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
        </span>
      </li>
	   </ul>
	</div>
	</form>
</div>
<!-----------显示类型列表--------------->
<div class="Ads_lists" id="Sort_lists" style="display:none">
	{{-- {{ $num=1 }} --}}
	<table class="table table-striped table-bordered table-hover" id="sample-table">
	 <thead>
	  <tr>
			 <th width="25"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
			 <th width="80">ID</th>
			 {{-- <th>排序</th> --}}
			 <th width="100">分类名</th>
			 <th width="250px">分类介绍</th>
			 <th width="180px">加入时间</th>
			 <th width="70px">状态</th>                
			 <th width="250px">操作</th>
		 </tr>
	 </thead>
 <tbody>
	@foreach ($configer as $k)
   <tr>
	<td><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
	<td>{{ $num++ }}</td>
	{{-- <td><input name="" type="text"  style=" width:50px" placeholder="1"/></td> --}}
	<td>{{ $k->tname }}</td>
	<td>{{ $k->content }}</td>
	<td>{{ $k->created_at }}</td>
	@if ( $k->status == 1)
	<td class="td-status"><span class="label label-success radius">显示</span></td>
   <td class="td-manage">
	 <a onClick="list_stop(this,'{{ $k->id }}')"  href="javascript:;" title="停用"  class="btn btn-xs btn-success"><i class="fa fa-check  bigger-120"></i></a>   
	 {{-- <a title="编辑" href="{{route('PictureAdvertising_Upload')}}"  class="btn btn-xs btn-info" ><i class="fa fa-edit bigger-120"></i></a>       --}}
	 {{-- <a title="删除" href="javascript:;"  onclick="member_del(this,'1')" class="btn btn-xs btn-warning" ><i class="fa fa-trash  bigger-120"></i></a> --}}
	</td>
	@else
	<td class="td-status">
		 <span class="label label-default radius">关闭</span>
	 </td>
	 <td class="td-manage">   
	   <a style="text-decoration:none" class="btn btn-xs " onClick="list_start(this,{{ $k->id }})" href="javascript:;" title="启用"><i class="fa fa-close bigger-120"></i></a>
	   {{-- <a title="编辑" href="{{route('Article_List_Upload')}}"  class="btn btn-xs btn-info" ><i class="fa fa-edit bigger-120"></i></a>     --}}
	   {{-- <a title="删除" href="{{route('Article_Article_Del').'/'.$v->id}}"   class="btn btn-xs btn-danger" ><i class="fa fa-trash  bigger-120"></i></a> --}}
	 </td>
	 @endif
   </tr>
   @endforeach
 </tbody>
 </table>
  </div>
</body>
</html>
<script>
//初始化宽度、高度  
 $(".widget-box").height($(window).height()); 
 $(".Ads_list").width($(window).width()-220);
  //当文档窗口发生改变时 触发  
    $(window).resize(function(){
	$(".widget-box").height($(window).height());
	 $(".Ads_list").width($(window).width()-220);
	});
	$(function() { 
	$("#advertising").fix({
		float : 'left',
		//minStatue : true,
		skin : 'green',	
		durationTime :false,
		stylewidth:'220',
		spacingw:30,//设置隐藏时的距离
	    spacingh:250,//设置显示时间距
		set_scrollsidebar:'.Ads_style',
		table_menu:'.Ads_list'
	});
});
/*广告图片-停用*/
function member_stop(obj,id){
	layer.confirm('确认要关闭吗？',{icon:0,},function(index){
		$.ajax({
		type:'GET',
		url:"{{route('PictureAdvertising_Upload')}}",
		data:{'id':id,'astatus':2},
		dataType:'json',
		success: function(data){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs " onClick="member_start(this,{{ $k->id }} )" href="javascript:;" title="启用"><i class="fa fa-close bigger-120"></i></a>');
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
/*广告图片-启用*/
function member_start(obj,id){
	layer.confirm('确认要显示吗？',{icon:0,},function(index){
		$.ajax({
		type:'GET',
		url:"{{route('PictureAdvertising_Upload')}}",
		data:{'id':id,'astatus':1},
		dataType:'json',
		success: function(data){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs btn-success" onClick="member_stop(this,$k->id)" href="javascript:;" title="停用"><i class="fa fa-check bigger-120"></i></a>');
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
/*广告类型-停用*/
function list_stop(obj,id){
	layer.confirm('确认要关闭吗？',{icon:0,},function(index){
		$.ajax({
		type:'GET',
		url:"{{route('PictureAdvertising_type_Upload')}}",
		data:{'id':id,'status':2},
		dataType:'json',
		success: function(data){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs " onClick="member_start(this,{{ $k->id }} )" href="javascript:;" title="启用"><i class="fa fa-close bigger-120"></i></a>');
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
/*广告类型-启用*/
function list_start(obj,id){
	layer.confirm('确认要显示吗？',{icon:0,},function(index){
		$.ajax({
		type:'GET',
		url:"{{route('PictureAdvertising_type_Upload')}}",
		data:{'id':id,'status':1},
		dataType:'json',
		success: function(data){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs btn-success" onClick="member_stop(this,$k->id)" href="javascript:;" title="停用"><i class="fa fa-check bigger-120"></i></a>');
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
/*广告图片-删除*/
function member_del(obj,id){
	layer.confirm('确认要删除吗？',{icon:0,},function(index){
		$(obj).parents("tr").remove();
		layer.msg('已删除!',{icon:1,time:1000});
	});
}
/*******添加广告*********/
 $('#ads_add').on('click', function(){
	  layer.open({
        type: 1,
        title: '添加广告',
		maxmin: true, 
		shadeClose: false, //点击遮罩关闭层
        area : ['800px' , ''],
        content:$('#add_ads_style'),
		// btn:['提交','取消'],
		yes:function(index,layero){	
		 var num=0;
		 var str="";
     $(".add_adverts input[type$='text']").each(function(n){
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
			  layer.alert('添加成功！',{
               title: '提示框',				
			icon:1,		
			  });
			   layer.close(index);	
		  }		  		     				
		}
    });
})
/*******添加类型*********/
$('#sort_add').on('click', function(){
	  layer.open({
        type: 1,
        title: '添加分类',
		maxmin: true, 
		shadeClose: false, //点击遮罩关闭层
        area : ['750px' , ''],
        content:$('#sort_style_add'),
		// btn:['提交','取消'],
		yes:function(index,layero){	
		 var num=0;
		 var str="";
     $(".sort_style_add input[type$='text']").each(function(n){
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
})
/*******显示类型列表*********/
$('#sort_list').on('click', function(){
	  layer.open({
        type: 1,
        title: '添加分类',
		maxmin: true, 
		shadeClose: false, //点击遮罩关闭层
        area : ['750px' , ''],
        content:$('#Sort_lists'),
		// btn:['提交','取消'],
		yes:function(index,layero){	
		 var num=0;
		 var str="";
     $(".sort_style_add input[type$='text']").each(function(n){
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
})
</script>

<script>
jQuery(function($) {
				var oTable1 = $('#sample-table').dataTable( {
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
			})
</script>
