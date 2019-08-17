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
   <div class="page_right_style">
   <div class="type_title">添加商品</div>
	<form action="" method="post" class="form form-horizontal" id="form-article-add" enctype="multipart/form-data">
		<div class="clearfix cl">
         <label class="form-label col-2"><span class="c-red">*</span>商品标题：</label>
		 <div class="formControls col-10"><input type="text" class="input-text" value="" placeholder="" id="" name="goods"></div>
		</div>
		{{-- <div class=" clearfix cl">
         <label class="form-label col-2">简略标题：</label>
	     <div class="formControls col-10"><input type="text" class="input-text" value="" placeholder="" id="" name=""></div>
		</div> --}}
		<div class=" clearfix cl">
			
			
            
            <div class="Add_p_s">
             <label class="form-label col-2">品&nbsp;&nbsp;&nbsp;&nbsp;牌：</label>	
			 <div class="formControls col-2">
                 <select name="bid" id="">
                    @foreach ($brand as $brand)
                        <option value="{{$brand['id']}}">{{$brand['bname']}}</option>
                    @endforeach
                </select></div>
            </div>
            <div class="Add_p_s">
                <label class="form-label col-2">分&nbsp;&nbsp;&nbsp;&nbsp;类：</label>	
                <div class="formControls col-2">
                    <select name="cid" id="">
                        @foreach ($cates as $cates)
                            <option value="{{$cates['id']}}">{{$cates['cname']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="Add_p_s">
                    <label class="form-label col-2">店&nbsp;&nbsp;&nbsp;&nbsp;铺：</label>	
                    <div class="formControls col-2">
                        <select name="sid" id="">
                            @foreach ($shop as $shop)
                                <option value="{{$shop['id']}}">{{$shop['sname']}}</option>
                            @endforeach
                    </select>
                </div>
                </div>
                <div class="Add_p_s">
                        <label class="form-label col-2">单位：</label>	
                        <div class="formControls col-2"><span class="select-box">
                           <select class="select" name="unit">
                               <option>请选择</option>
                               <option value="1">件</option>
                               <option value="2">斤</option>
                               <option value="3">KG</option>
                               <option value="4">吨</option>
                               <option value="5">套</option>
                           </select>
                           </span></div>
                </div>
                <div class="Add_p_s">
                        <label class="form-label col-2">规&nbsp;&nbsp;&nbsp;&nbsp;格：</label>	
                        <div class="formControls col-2"><input type="text" class="input-text" value="" placeholder="请输入规格" id="" name="detail-specification"></div>
                       </div>
                <div class="Add_p_s">
                        <label class="form-label col-2">产品编号：</label>
                        <div class="formControls col-2"><input type="text" class="input-text" value="" placeholder="请输入编号" id="" name="gnum"></div>
                        </div>
                        <div class="Add_p_s">
                         <label class="form-label col-2">产&nbsp;&nbsp;&nbsp;&nbsp;地：</label>	
                         <div class="formControls col-2"><input type="text" class="input-text" value="" placeholder="请输入产地" id="" name="detail-company"></div>
                        </div>
             <div class="Add_p_s">
             <label class="form-label col-2">产品重量：</label>	
			 <div class="formControls col-2"><input type="text" class="input-text" value="" placeholder="请输入重量" id="" name="detail-weight" ></div>
			</div>
            
            <div class="Add_p_s">
             <label class="form-label col-2">展示价格：</label>	
			 <div class="formControls col-2"><input type="text" class="input-text" value="" placeholder="请输入展示价格" id="" name="price" >元</div>
			</div>
            <div class="Add_p_s">
             <label class="form-label col-2">市场价格：</label>	
			 <div class="formControls col-2"><input type="text" class="input-text" value="" placeholder="请输入原价" id="" name="original" >元</div>
			</div>
            <div class="Add_p_s">
                    <label class="form-label col-2">产品数量：</label>	
                    <div class="formControls col-2"><input type="text" class="input-text" value="" placeholder="请输入原价" id="" name="store" ></div>
            </div>
			
		</div>
		
		<div class="clearfix cl">
			<label class="form-label col-2">关键词：</label>
			<div class="formControls col-10">
				<input type="text" class="input-text" value="" placeholder="请输入商品关键词" id="" name="antishop">
			</div>
		</div>
		<div class="clearfix cl">
			<label class="form-label col-2">内容简介：</label>
			<div class="formControls col-10">
				<textarea name="detail-descr" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" onKeyUp="textarealength(this,200)"></textarea>
				<p class="textarea-numberbar"><em class="textarea-length">0</em>/200</p>
			</div>
		</div>
		
		<div class="clearfix cl">
			<label class="form-label col-2">图片上传：</label>
			<div class="formControls col-10">
				<div class="uploader-list-container"> 
					<div class="queueList">
						<div id="dndArea" class="placeholder">
                            <div id="filePicker-2"></div>
                            <input id="upload-input" style="position: absolute; top: 0; bottom: 0; left: 0;right: 0; opacity: 0;height:238px;width:790px;" name="pic[]" type="file" accept="image/gif, image/jpg, image/png" onchange="img(this)" />
							<p class="again">或将照片拖到这里，单次最多可选300张</p>
						</div>
					</div>
				</div>
			</div>
		</div>
         <div class="clearfix cl">
         <label class="form-label col-2">详细内容：</label>
			<div class="formControls col-10">
				<script id="editor" type="text/plain" style="width:100%;height:400px;" name="detail-descr"></script> 
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
				<a href="Javascript:;" onclick="submit();" class="btn btn-primary radius" type="submit"><i class="icon-save "></i>保存添加</a>
				<button onClick="" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
			</div>
		</div>
	</form>
    </div>
</div>
</div>
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
    function submit(){
        if($('input[type=file]').val()==''){
            alert('请添加图片');
        }
        for (let i = 0; i < $('input').length; i++) {
            if($('input').eq(i).val()==''){
                alert('不能输入为空');return false;
            }
            
        }
        // return false;
        var formData = new FormData($('#form-article-add')[0]);
        // formData.append('imgname',imgname);
        // console.log(imgname);
        $.ajax({ 
        url: "{{route('Picture_create')}}",
        type: 'POST', 
        data: formData, 
        contentType: false, 
        processData: false, 
        success: function (returndata) { 
           alert('添加成功');
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
                var img="<img src=../../uploads/"+element+" style='width:190px;height:140px;' />";
                $('#filePicker-2').html(img);
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