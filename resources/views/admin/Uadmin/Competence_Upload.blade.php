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
        <script src={{asset("js/dragDivResize.js")}} type="text/javascript"></script>
        <script src={{asset("js/lrtk.js")}} type="text/javascript" ></script>
<title>添加权限</title>
</head>

<body>
<div class="Competence_add_style clearfix">
   <div class="left_Competence_add">
   <div class="title_name">修改 </div>
    <div class="Competence_add">

        <div class="widget-box side_content" >
         <div class="side_title"><a title="隐藏" class="close_btn"><span></span></a></div>
         <div class="side_list"><div class="widget-header header-color-green2"><h4 class="lighter smaller">管理员分类列表</h4></div>
         <div class="widget-body">
           <ul class="b_P_Sort_list">
           <li><i class="fa fa-users green"></i> <a href="">全部管理员</a></li>
            <li><i class="fa fa-users orange"></i> <a href="{{route('Uadmin_Istrator0')}}">超级管理员</a></li>
            <li><i class="fa fa-users orange"></i> <a href="{{route('Uadmin_Istrator1')}}">普通管理员</a></li>
            <li><i class="fa fa-users orange"></i> <a href="{{route('Uadmin_Istrator2')}}">产品编辑管理员</a></li>
           </ul>
        </div>
       </div>
      </div> 

   </div>
   </div>


	<div class="Assign_style" style="margin-left: -264px;">
      <div class="title_name">修改权限</div>
      <div class="Select_Competence">
		 	<div id="add_administrator_style" class="add_menber" >
		    <form action="{{route('Competence_Update',array('id'=>$admin->id))}}" method="post" id="form-admin-add">
		    		{{ csrf_field() }}
				<div class="form-group">
					<label class="form-label"><span class="c-red">*</span>管理员：</label>
					<div class="formControls">
						<input type="text" class="input-text" value="{{$admin->uname}}" disabled  placeholder="" id="user-name" name="user-name" datatype="*2-16" nullmsg="用户名不能为空">
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
						</select>
						</span> </div>
				</div>
				<div class="form-group" style="margin-left: 30px;"> 
		        <input class="btn btn-primary radius" type="submit" id="Add_Administrator" value="&nbsp;&nbsp;提交&nbsp;&nbsp;"></div>
				</form>
		  		 </div>    
     	 </div> 

     @if (count($errors) > 0)
    <div class="alert " style="width: 300px;margin-left: 350px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif	 
  </div>
</div>
</div>
</body>
</html>
<script type="text/javascript">
//初始化宽度、高度  
 $(".left_Competence_add,.Competence_add_style").height($(window).height()).val();;
 $(".Competence_add_style").width($(window).width()-1100).height($(window).height()).val();
 $(".left_Competence_add").width($(window).width()-1100).height($(window).height()).val();
 $(".Assign_style").width($(window).width()-250).height($(window).height()).val();
 $(".Select_Competence").width($(window).width()-500).height($(window).height()-40).val();
  //当文档窗口发生改变时 触发  
    $(window).resize(function(){
	$(".left_Competence_add").width($(window).width()-1100).height($(window).height()).val();
	$(".Assign_style").width($(window).width()-250).height($(window).height()).val();
	$(".Select_Competence").width($(window).width()-1000).height($(window).height()-40).val();
	$(".left_Competence_add,.Competence_add_style").height($(window).height()).val();;
	});
/*字数限制*/
function checkLength(which) {
	var maxChars = 200; //
	if(which.value.length > maxChars){
	   layer.open({
	   icon:2,
	   title:'提示框',
	   content:'您出入的字数超多限制!',	
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
/*按钮选择*/
$(function(){
	$(".permission-list dt input:checkbox").click(function(){
		$(this).closest("dl").find("dd input:checkbox").prop("checked",$(this).prop("checked"));
	});
	$(".permission-list2 dd input:checkbox").click(function(){
		var l =$(this).parent().parent().find("input:checked").length;
		var l2=$(this).parents(".permission-list").find(".permission-list2 dd").find("input:checked").length;
		if($(this).prop("checked")){
			$(this).closest("dl").find("dt input:checkbox").prop("checked",true);
			$(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",true);
		}
		else{
			if(l==0){
				$(this).closest("dl").find("dt input:checkbox").prop("checked",false);
			}
			if(l2==0){
				$(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",false);
			}
		}
		
	});
});

	//表单验证提交
$("#form-admin-add").Validform({
		
		 tiptype:1,
	
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
