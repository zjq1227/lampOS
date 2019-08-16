<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Cache-Control" content="no-siteapp" />
 <link href={{asset("admin//css/bootstrap.min.css")}} rel="stylesheet" />
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
        <script src={{asset("js/H-ui.js")}} type="text/javascript"></script>
        <script src={{asset("js/displayPart.js")}} type="text/javascript"></script>
<title>文章分类</title>
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
<div class="margin clearfix">
 <div class="sort_style">
  <div class="border clearfix">
       <span class="l_f">
        <a href="javascript:ovid()"id="add_page" class="btn btn-warning" onclick="add_article_sort()"><i class="fa fa-plus"></i> 添加分类</a>
        <a href="javascript:location.replace(location.href);" class="btn btn-success"><i class="fa fa-plus"></i> 点击刷新</a>
        {{-- <a class=""  href="javascript:location.replace(location.href);" title="刷新" > --}}
       </span>
       <span class="r_f">共：<b>{{ $counts }}</b>分类</span>
     </div>
     <!--分类类表-->
     <div class="article_sort_list">
         <table class="table table-striped table-bordered table-hover" id="sample-table">
       <thead>
		 <tr>
				<th width="25"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
				<th width="80px">ID</th>
                <th width="80px">分类名</th>
				<th width="150px">分类简介</th>
				{{-- <th width="">简介</th> --}}
				<th width="150px">添加时间</th>
                <th width="80px">状态</th>                
				<th width="150px">操作</th>
			</tr>
		</thead>
        <tbody>
            @foreach ($configer as $k)
         <tr>
          <td><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
          <td>{{ $num++ }}</td>
          <td>{{ $k->tname }}</td>
          <td>{{ $k->jianjie }}</td>
          {{-- <td class="displayPart" displayLength="60">帮助中心帮助中心帮助中心帮助中心帮助中心帮助中心帮助中心帮助中心帮助中心帮助中心</td> --}}
          <td>{{ $k->created_at }}</td>
          
            @if ( $k->status == 1)
            <td class="td-status">
                <span class="label label-success radius">已启用</span>
            </td>    
            <td class="td-manage">   
                <a style="text-decoration:none" class="btn btn-xs btn-success" onClick="member_stop(this,{{ $k->id }})" href="javascript:;" title="停用"><i class="fa fa-check bigger-120"></i></a>
                {{-- <a title="删除" href="{{route('Article_Del').'/'.$k->id}}"   class="btn btn-xs btn-danger" ><i class="fa fa-trash  bigger-120"></i></a> --}}
            </td>
            @else
            <td class="td-status">
                <span class="label label-default radius">已关闭</span>
            </td>
            <td class="td-manage">   
              <a style="text-decoration:none" class="btn btn-xs " onClick="member_start(this,{{ $k->id }})" href="javascript:;" title="启用"><i class="fa fa-close bigger-120"></i></a>
              {{-- <a title="删除" href="{{route('Article_Del').'/'.$k->id}}"   class="btn btn-xs btn-danger" ><i class="fa fa-trash  bigger-120"></i></a> --}}
            </td>
            @endif
         </tr>   
         @endforeach
        </tbody>
        </table>
     </div>
 </div>
</div>
<!--添加文章分类图层-->
<div id="addsort_style" style="display:none" class="article_style">
    <form class="mws-form" action="{{route('Article_Create')}}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
 <div class="add_content" id="form-article-add">
    <ul>
     <li class="clearfix Mandatory"><label class="label_name"><i>*</i>分类名称</label>
     <span class="formControls w_txt"><input name1="分类名称" name="tname" type="text" id="form-field-1" class="col-xs-7 col-sm-5 "></span>
     </li>
     <li class="clearfix"><label class="label_name">分类简介</label>
     <span class="formControls w_txt">
       <input name1="简介" name="jianjie" type="text" id="form-field-1" value="" class="col-xs-7 col-sm-5 ">
      </span>
     </li>
     <li class="clearfix"><label class="label_name">状态</label><span class="add_name"> <span class="formControls w_txt">
        <label><input name="status" type="radio"  value="1" class="ace"><span class="lbl">开启</span></label>&nbsp;&nbsp;&nbsp;
        <label><input name="status" type="radio" value="2" class="ace"><span class="lbl" >关闭</span></label></span><div class="prompt r_f"></div>
      </li>
      <li class="clearfix"><span class="formControls w_txt">
        <input class="btn btn-primary radius" type="submit" id="Add_Administrator" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
        </span>
      </li>
       </ul>
    </ul>
 </div>
    </form>
</div>
</body>
</html>
<script>
$(function() {
  var oTable1 = $('#sample-table').dataTable( {
  "aaSorting": [[ 1, "desc" ]],//默认第几个排序
  "bStateSave": true,//状态保存
  "aoColumnDefs": [
	//{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
	{"orderable":false,"aTargets":[0,2,3,4,6,7,]}// 制定列不参与排序
  ]});
		  $('table th input:checkbox').on('click' , function(){
			  var that = this;
			  $(this).closest('table').find('tr > td:first-child input:checkbox')
			  .each(function(){
				 this.checked = that.checked;
				 $(this).closest('tr').toggleClass('selected');
	 });						
  });
})
/**添加分类**/
 function add_article_sort(index){	 
	 layer.open({
        type: 1,
        title: '添加文章分类',
		maxmin: true, 
		shadeClose: true, //点击遮罩关闭层
        area : ['600px' , ''],
        content:$('#addsort_style'),
		// btn:['提交','取消'],
		yes:function(index,layero){
			 var num=0;
		 var str="";
     $(".Mandatory input[type$='text']").each(function(n){
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
	 })	 	 
}
/*栏目-停用*/
function member_stop(obj,id){
	layer.confirm('确认要停用该栏目吗？',function(index){
    $.ajax({
				type:'GET',
				url:"{{route('Article_Update')}}",
				data:{'id':id,'status':2},
				dataType:'json',
				success: function(data){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs " onClick="member_start(this,{{ $k->id }})" href="javascript:;" title="启用"><i class="fa fa-close bigger-120"></i></a>');
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
/*栏目-启用*/
function member_start(obj,id){
	layer.confirm('确认要启用该栏目吗？',function(index){
    $.ajax({
				type:'GET',
				url:"{{route('Article_Update')}}",
				data:{'id':id,'status':1},
				dataType:'json',
				success: function(data){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs btn-success" onClick="member_stop(this,{{ $k->id }})" href="javascript:;" title="停用"><i class="fa fa-check bigger-120"></i></a>');
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
/*文章-删除*/
// function member_del(obj,id){
// 	layer.confirm('确认要删除吗？',{icon:0,},function(index){
// 		$(obj).parents("tr").remove();
// 		layer.msg('已删除!',{icon:1,time:1000});
// 	});
// }
</script>
