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
        <link rel="stylesheet" href={{asset("admin/css/colorbox.css")}}> 
         <!--图片相册-->   
        <link rel="stylesheet" href={{asset("admin/css/ace.min.css")}} />
      
        <link rel="stylesheet" href={{asset("admin/font/css/font-awesome.min.css")}} />        
        <!--[if lte IE 8]>
		  <link rel="stylesheet" href={{asset("admin/css/ace-ie.min.css")}} />
		<![endif]-->
        
		<script src={{asset("js/jquery-1.9.1.min.js")}}></script>  
        <script src={{asset("admin/js/jquery.colorbox-min.js")}}></script>
		<script src={{asset("admin/js/typeahead-bs2.min.js")}}></script>        	
		<script src={{asset("admin/js/jquery.dataTables.min.js")}}></script>
		<script src={{asset("admin/js/jquery.dataTables.bootstrap.js")}}></script>
        <script src={{asset("admin/layer/layer.js")}} type="text/javascript" ></script>  
        <script type="text/javascript" src={{asset("Widget/swfupload/swfupload.js")}}></script>
        <script type="text/javascript" src={{asset("Widget/swfupload/swfupload.queue.js")}}></script>
        <script type="text/javascript" src={{asset("Widget/swfupload/swfupload.speed.js")}}></script>
        <script type="text/javascript" src={{asset("Widget/swfupload/handlers.js")}}></script>  
     
        
<title>列表</title>
</head>

<body>
<div class="page-content clearfix">
 <div class="sort_adsadd_style">
  <div class="border clearfix">
       <span class="l_f">
	   <a href="{{route('Picture_Sortads_Add',$id)}}"  id="ads_add" title="添加品牌" class="btn btn-warning Order_form"><i class="fa fa-plus"></i> 添加类型</a>
        <a href="javascript:ovid()" onClick="javascript :history.back(-1);" class="btn btn-info"><i class="fa fa-reply"></i> 返回上一步</a>
       </span>
       <span class="r_f">共：<b>{{$number}}</b>个品牌</span>
     </div>
 <!--列表样式-->
    <div class="sort_Ads_list">
       <table class="table table-striped table-bordered table-hover" id="sample-table">
		<thead>
		 <tr>
				<th width="25"><label><input type="hidden" class="ace"><span class="lbl"></span></label></th>
				<th width="80px">ID</th>               
				<th width="100">类名</th>
                <th  width="80px">排序</th>
				<th width="150px">图片</th>
				<th width="150px">价格</th>
				{{-- <th width="250px">链接地址</th> --}}
				<th width="180">加入时间</th>
				<th width="70">状态</th>                
				<th width="250">操作</th>
			</tr>
		</thead>
	<tbody>
		@foreach ($goodsType as $goods)
		<tr>
		<td><label><input type="hidden" class="ace"><span class="lbl"></span></label></td>
		<td>{{$goods->id}}</td>
		<td>{{$goods->name}}</td>
		<td>{{$num++}}</td>
		<td><span class="ad_img"><a href="products/ad.jpg" data-rel="colorbox" data-title="广告图"><img src="{{asset("/uploads")}}/{{$goods->img}}"  width="100%" height="100%"/></a></span></td>      
		<td>{{$goods->price}} 元</td>
		<td>{{$goods->created_at}}</td>
		@if ($goods->status!=3)
		<td class="td-status"><span class="label label-success radius">显示</span></td>
		@else
		<td class="td-status"><span class="label label-default radius">已停用</span></td>
		@endif
		
		<td class="td-manage">
			@if ($goods->status!=3)
			<a onClick="member_stop(this,'{{$goods->id}}')"  href="javascript:;" title="停用"  class="btn btn-xs btn-success"><i class="fa fa-check  bigger-120"></i></a>   
			@else
			<a onClick="member_start(this,{{$goods->id}})"  href="javascript:;" title="启用"  class="btn btn-xs btn-default"><i class="fa fa-check  bigger-120"></i></a>   
			@endif
			@if ($goods->status!=3)
			<a title="编辑" href="{{route('Picture_Sortads_Upload',$goods->id)}}"  class="btn btn-xs btn-info" ><i class="fa fa-edit bigger-120"></i></a>      
			@else
			<a title="编辑" href="JavaScript:;" onclick="alert('该类停用中');return false;"class="btn btn-xs btn-info" ><i class="fa fa-edit bigger-120"></i></a>      
			@endif
			<a title="删除" href="javascript:;"  onclick="member_del(this,{{$goods->id}})" class="btn btn-xs btn-warning" ><i class="fa fa-trash  bigger-120"></i></a>
		</td>
		</tr>
	  @endforeach
    </tbody>
    </table>
     </div>
 <script>
 /*产品-停用*/
function member_stop(obj,id){
	layer.confirm('确认要停用吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs " onClick="member_start(this,id)" href="javascript:;" title="启用"><i class="icon-ok bigger-120"></i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');
		$(obj).remove();
		$.ajax({
			url:"{{url('admin/Picture/Picture_Sortads_Status')}}"+'/'+id,
			type:"POST",
			data:{
				_token : '<?php echo csrf_token()?>',
				'status':'3',
				},
			dataType:"json",
			success:function(result){
				if(result){
					layer.msg('已停用',{icon:5,time:1000});
					// layer.close(index); 
						setTimeout(function(){
							location.reload();
					},1000);
				}
			}
									
		})
	});
}

/*产品-启用*/
function member_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs btn-success" onClick="member_stop(this,id)" href="javascript:;" title="停用"><i class="icon-ok bigger-120"></i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
		$(obj).remove();
		$.ajax({
			url:"{{url('admin/Picture/Picture_Sortads_Status')}}"+'/'+id,
			type:"POST",
			data:{
				_token : '<?php echo csrf_token()?>',
				'status':'4',
				},
			dataType:"json",
			success:function(result){
				if(result){
					layer.msg('已启用',{icon:6,time:1000});
					setTimeout(function(){
						location.reload();
					},1000);
				}
			}
									
		})
	});
}

/*产品-删除*/
function member_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$(obj).parents("tr").remove();
		$.ajax({
			url:"{{url('admin/Picture/Picture_Sortads_Status')}}"+'/'+id,
			type:"POST",
			data:{
				_token : '<?php echo csrf_token()?>',
				'status':'del',
				},
			dataType:"json",
			success:function(result){
				if(result){
					layer.msg('已删除!',{icon:1,time:1000});
					setTimeout(function(){
						// location.reload();
					},1000);
				}
			}
									
		})
	});
}
 </script>
 </div>
</div>
<!--添加广告样式-->
<div id="add_ads_style"  style="display:none">
 <div class="add_adverts">
 <ul>
  <li>
  <label class="label_name">所属分类</label>
  <span class="cont_style">
  <select class="form-control" id="form-field-select-1">
    <option value="">选择分类</option>
    <option value="AL">首页大幻灯片</option>
    <option value="AK">首页小幻灯片</option>
    <option value="AZ">单广告图</option>
    <option value="AR">其他广告</option>
    <option value="CA">板块栏目广告</option>
  </select></span>
  </li>
  <li><label class="label_name">图片尺寸</label><span class="cont_style">
  <input name="长" type="text" id="form-field-1" placeholder="0" class="col-xs-10 col-sm-5" style="width:80px">
  <span class="l_f" style="margin-left:10px;">x</span><input name="宽" type="text" id="form-field-1" placeholder="0" class="col-xs-10 col-sm-5" style="width:80px"></span></li>
  <li><label class="label_name">显示排序</label><span class="cont_style"><input name="排序" type="text" id="form-field-1" placeholder="0" class="col-xs-10 col-sm-5" style="width:50px"></span></li>
  <li><label class="label_name">链接地址</label><span class="cont_style"><input name="地址" type="text" id="form-field-1" placeholder="地址" class="col-xs-10 col-sm-5" style="width:450px"></span></li>
   <li><label class="label_name">状&nbsp;&nbsp;态：</label>
   <span class="cont_style">
     &nbsp;&nbsp;<label><input name="form-field-radio1" type="radio" checked="checked" class="ace"><span class="lbl">显示</span></label>&nbsp;&nbsp;&nbsp;
     <label><input name="form-field-radio1" type="radio" class="ace"><span class="lbl">隐藏</span></label></span><div class="prompt r_f"></div>
     </li>
     <li><label class="label_name">图片</label><span class="cont_style">
 <div class="demo">
	           <div class="logobox"><div class="resizebox"><img src="images/image.png" width="100px" alt="" height="100px"/></div></div>	
               <div class="logoupload">
                  <div class="btnbox"><a id="uploadBtnHolder" class="uploadbtn" href="javascript:;">上传替换</a></div>
                  <div style="clear:both;height:0;overflow:hidden;"></div>
                  <div class="progress-box" style="display:none;">
                    <div class="progress-num">上传进度：<b>0%</b></div>
                    <div class="progress-bar"><div style="width:0%;" class="bar-line"></div></div>
                  </div>  <div class="prompt"><p>图片大小小于5MB,支持.jpg;.gif;.png;.jpeg格式的图片</p></div>  
              </div>                                
           </div>           
   </span>
  </li>
 
  
 </ul>
 </div>
</div>
</body>
</html>
<script type="text/javascript">
 jQuery(function($) {
	 var colorbox_params = {
		reposition:true,
		scalePhotos:true,
		scrolling:false,
		previous:'<i class="fa fa-chevron-left"></i>',
		next:'<i class="fa fa-chevron-right"></i>',
		close:'&times;',
		current:'{current} of {total}',
		maxWidth:'100%',
		maxHeight:'100%',
		onOpen:function(){
			document.body.style.overflow = 'hidden';
		},
		onClosed:function(){
			document.body.style.overflow = 'auto';
		},
		onComplete:function(){
			$.colorbox.resize();
		}
	};

	$('.table-striped [data-rel="colorbox"]').colorbox(colorbox_params);
	$("#cboxLoadingGraphic").append("<i class='icon-spinner orange'></i>");

})
		</script>
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
</script>