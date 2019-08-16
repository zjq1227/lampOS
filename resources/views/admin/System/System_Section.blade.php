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
<title>配置栏目</title>
</head>

<body>
<div class="Columns_style margin">
    <!-- 读取 提示 消息 -->
 @if (session('success'))
 <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>修改成功!</strong> 
</div>
@endif
@if (session('error'))
<div class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>修改失败!</strong> 
    </div>
    
@endif
@section('content')
@show
  <table class="table table-striped table-bordered table-hover" id="sample-table">
       <thead>
		 <tr>
            <th width="80px">ID</th>
            <th width="80px">名字</th>
            <th width="120px">配置图片</th>
            <th width="120px">配置关键词</th>
            <th width="">配置描述</th>
            <th width="">配置备案号</th>
            <th width="">配置版权</th>
            <th width="150px">添加时间</th>
            {{-- <th width="100px">状态</th>  --}}
            <th width="250px">操作</th>
			</tr>
		</thead>
        <tbody>
         @foreach ($configer as $k)
        <tr>
         <td>{{ $num }}</td>
         <td>{{ $k->name }}</td>
         <td><img src="{{asset("uploads".'/'.$k->pic)}}" style="height:200px;weight:200px;"/></td>
         <td>{{ $k->keyword }}</td>
         <td class="displayPart" displayLength="80">{{ $k->miaoshu }}</td>
         <td class="displayPart" displayLength="80">{{ $k->beian }}</td>
         <td class="displayPart" displayLength="80">{{ $k->banquan }}</td>
         <td>{{ $k->created_at }}</td>
          {{-- <td class="td-status"><span class="label label-success radius">已启用</span></td> --}}
           <td class="td-manage">
        {{-- <a onclick="member_stop(this,'10001')" href="javascript:;" title="启用" class="btn btn-xs btn-success"><i class="fa fa-check  bigger-120"></i></a> --}}
        <a title="编辑"  href="{{ route('System') }}"  class="btn btn-xs btn-info" ><i class="fa fa-edit bigger-120"></i></a> 
        {{-- <a title="删除" href="javascript:;"  onclick="member_del(this,'1')" class="btn btn-xs btn-warning" ><i class="fa fa-trash  bigger-120"></i></a> --}}
       </td>
        </tr>
        @endforeach
        </tbody>
        </table>

</div>
</body>
</html>
<script>
$(function() {
		var oTable1 = $('#sample-table').dataTable( {
		"aaSorting": [],//默认第几个排序
		"bStateSave": false,//状态保存
		//"dom": 't',
		"bFilter":false,
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[0,1,2,3,4,5,6,7]}// 制定列不参与排序
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
/*栏目-停用*/
function member_stop(obj,id){
	layer.confirm('确认要停用该栏目吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs " onClick="member_start(this,id)" href="javascript:;" title="启用"><i class="fa fa-close bigger-120"></i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">停用</span>');
		$(obj).remove();
		layer.msg('停用!',{icon: 5,time:1000});
	});
}

/*栏目-启用*/
function member_start(obj,id){
	layer.confirm('确认要启用该栏目吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs btn-success" onClick="member_stop(this,id)" href="javascript:;" title="停用"><i class="fa fa-check bigger-120"></i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">启用</span>');
		$(obj).remove();
		layer.msg('启用!',{icon: 6,time:1000});
	});
}
/*店铺-删除*/
function member_del(obj,id){
	layer.confirm('确认要删除吗？',{icon:0,},function(index){
		$(obj).parents("tr").remove();
		layer.msg('已删除!',{icon:1,time:1000});
	});
}
</script>
