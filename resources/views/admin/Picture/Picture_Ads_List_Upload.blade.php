<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="csrf-token" content="{{ csrf_token() }}"> 
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="js/html5.js"></script>
<script type="text/javascript" src="js/respond.min.js"></script>
<script type="text/javascript" src="js/PIE_IE678.js"></script>
<![endif]-->
<link href={{asset("admin/css/bootstrap.min.css")}} rel="stylesheet" />
<link rel="stylesheet" href={{asset("admin/css/style.css")}}/>       
<link href={{asset("admin/css/codemirror.css")}} rel="stylesheet">
<link rel="stylesheet" href={{asset("admin/css/ace.min.css")}} />
      <link rel="stylesheet" href={{asset("Widget/zTree/css/zTreeStyle/zTreeStyle.css")}} type="text/css">
<link rel="stylesheet" href={{asset("admin/css/font-awesome.min.css")}} />
<!--[if IE 7]>
		  <link rel="stylesheet" href={{asset("admin/css/font-awesome-ie7.min.css")}} />
		<![endif]-->
<link href={{asset("Widget/icheck/icheck.css")}} rel="stylesheet" type="text/css" />
<link href={{asset("Widget/webuploader/0.1.5/webuploader.css")}} rel="stylesheet" type="text/css" />

<title>新增图片</title>
</head>
<body>

  </div>
  </div>  
  </div>
  @foreach ($goodsType as $goods)
   <div class="page_right_style">
   <div class="type_title">修改类型</div>

	<form action="" method="post" class="form form-horizontal" id="form-article-add" enctype="multipart/form-data">
		<div class="clearfix cl">
         <label class="form-label col-2"><span class="c-red">*</span>类型标题：</label>
         @if($goods->name!='原味')
    <div class="formControls col-10"><input type="text" class="input-text" value="{{$goods->name}}" placeholder="" id="" name="name"></div>
       @else
    <div class="formControls col-10"><input type="text" class="input-text" value="{{$goods->name}}" placeholder="" id="" name="name" disabled/></div>
        @endif
        </div>
		{{-- <div class=" clearfix cl">
         <label class="form-label col-2">简略标题：</label>
	     <div class="formControls col-10"><input type="text" class="input-text" value="" placeholder="" id="" name=""></div>
    </div> --}}
   
		<div class=" clearfix cl">
                <div class="Add_p_s">
                        <label class="form-label col-2">属于：</label>	
                        <div class="formControls col-2"><span class="select-box">
                           <select class="select" name="status">
                            @if($goods->status=='1')
                                <option value="1" selected>产品图片</option>
                              <option value="2">详情图片</option>
                            @elseif($goods->status=='2')
                              <option value="1" >产品图片</option>
                              <option value="2" selected>详情图片</option>
                            @endif
                           </select>
                           </span></div>
                </div>
                <div class="Add_p_s">
                    <label class="form-label col-2">排序：</label>	
                    <div class="formControls col-2"><span class="select-box">
                    <input type="number" value="{{$goods->sort}}" name="sort">
                       </span></div>
            </div>

  <div class="clearfix cl">
              <div class="Add_p_s">
                      <label class="form-label col-2">价格：</label>	
                      <div class="formControls col-2"><span class="select-box">
                      <input type="number" name="price" value="{{$goods->price}}">
                        </span></div>
              </div>
  </div>
  <div class="clearfix cl">
        <div class="Add_p_s">
                <label class="form-label col-2">原价：</label>	
                <div class="formControls col-2"><span class="select-box">
                <input type="number" name="original" value="{{$goods->original}}">
                  </span></div>
        </div>
</div>
		<div class="clearfix cl">
		</div>
		
		<div class="clearfix cl">
			<label class="form-label col-2">图片上传：</label>
			<div class="formControls col-10">
				<div class="uploader-list-container"> 
					<div class="queueList">
						<div id="dndArea" class="placeholder">
                            <div id="filePicker-2"><img src="{{asset("/uploads")}}/{{$goods->img}}" style='width:190px;height:140px;' /></div>
                            <input id="upload-input" style="position: absolute; top: 0; bottom: 0; left: 0;right: 0; opacity: 0;height:238px;width:790px;" name="pic[]" type="file" value="" accept="image/gif, image/jpg, image/png" onchange="img(this)" multiple/>
							<p class="again">请选择你要修改的图片</p>
						</div>
					</div>
				</div>
			</div>
		</div>
        {{-- <div class="clearfix cl">
         <label class="form-label col-2">允许评论：</label>
			<div class="formControls col-2 skin-minimal">
			 <div class="check-box" style=" margin-top:9px"><input type="checkbox" id="checkbox-1"><label for="checkbox-1">&nbsp;</label></div>
             </div>
        </div> --}}
		<div class="clearfix cl">
			<div class="Button_operation">
				<a href="Javascript:;" onclick="submit({{$id}});" class="btn btn-primary radius" type="submit"><i class="icon-save "></i>保存修改</a>
				<button onClick="" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
			</div>
		</div>
	</form>
    </div>
</div>
</div>
@endforeach
<script src={{asset("js/jquery-1.9.1.min.js")}}></script>   
<script src={{asset("admin/js/bootstrap.min.js")}}></script>
<script src={{asset("admin/js/typeahead-bs2.min.js")}}></script>
<script src={{asset("admin/layer/layer.js")}} type="text/javascript" ></script>
<script src={{asset("admin/laydate/laydate.js")}} type="text/javascript"></script>
<script type="text/javascript" src={{asset("Widget/My97DatePicker/WdatePicker.js")}}></script> 
<script type="text/javascript" src={{asset("Widget/icheck/jquery.icheck.min.js")}}></script> 
<script type="text/javascript" src={{asset("Widget/zTree/js/jquery.ztree.all-3.5.min.js")}}></script> 
<script type="text/javascript" src={{asset("Widget/Validform/5.3.2/Validform.min.js")}}></script> 
<script type="text/javascript" src={{asset("Widget/webuploader/0.1.5/webuploader.min.js")}}></script>
<script type="text/javascript" src={{asset("Widget/ueditor/1.4.3/ueditor.config.js")}}></script>
<script type="text/javascript" src={{asset("Widget/ueditor/1.4.3/ueditor.all.min.js")}}> </script>
<script type="text/javascript" src={{asset("Widget/ueditor/1.4.3/lang/zh-cn/zh-cn.js")}}></script> 
<script src={{asset("js/lrtk.js")}} type="text/javascript" ></script>
<script type="text/javascript" src={{asset("js/H-ui.js")}}></script> 
<script type="text/javascript" src={{asset("js/H-ui.admin.js")}}></script> 
<script>
    
$(function() { 
	$("#add_picture").fix({
		float : 'left',
		skin : 'green',	
		durationTime :false,
		stylewidth:'220',
		spacingw:0,
		spacingh:260,
	});
});
$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
    function submit(id){
        // return false;
        for (let i = 0; i < $('input').length; i++) {
            if($('input').eq(i).val()==''){
                // alert('不能输入为空');return false;
            }
            
        }
        var formData = new FormData($('#form-article-add')[0]);
        $.ajax({ 
        url: "{{url('admin/Picture/Picture_Sortads_Update')}}"+'/'+id,
        type: 'POST', 
        data: formData, 
        contentType: false, 
        processData: false,
        success: function (returndata) { 
          if(returndata){
             alert('提交成功');
              window.location.href = "{{url('admin/Picture/Picture_Sortads_Upload')}}"+"/"+id;
          }
        }, 
        error: function (returndata) { 
            console.log(returndata); 
        } 
        });
    }
    function img(obj){
        // alert(1);
        var formData = new FormData($('#form-article-add')[0]);
        formData.append('file',$(obj)[0].files);
        $.ajax({ 
        url: "{{route('Picture_add_img')}}",
        type: 'POST', 
        data: formData, 
        contentType: false, 
        processData: false, 
        success: function (returndata) { 
            $('#filePicker-2').html(' ');
            returndata.forEach(element => {
                var img="<img src=../../../uploads/"+element+" style='width:190px;height:140px;' />";
                $('#filePicker-2').append(img);
            });
            $('.again').html('<a href="javascript:;" onclick="cleard()">清除图片</a>');
        }, 
        error: function (returndata) { 
            console.log(returndata); 
        } 
        });                         
    }
function cleard(){
    $('#filePicker-2').html(' ');
    $('input[name=file]').val(' ');
}
$( document).ready(function(){
//初始化宽度、高度
  
   $(".widget-box").height($(window).height()); 
   $(".page_right_style").height($(window).height()); 
   $(".page_right_style").width($(window).width()-220); 
  //当文档窗口发生改变时 触发  
    $(window).resize(function(){

	 $(".widget-box").height($(window).height()); 
	 $(".page_right_style").height($(window).height()); 
	 $(".page_right_style").width($(window).width()-220); 
	});	
});
$(function(){
	var ue = UE.getEditor('editor');
});

function showCode(str) {
	if (!code) code = $("#code");
	code.empty();
	code.append("<li>"+str+"</li>");
}
		
</script>
<script>

</script>
</body>
</html>