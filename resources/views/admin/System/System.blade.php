
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
        <link rel="stylesheet" href={{asset("admin/css/font-awesome.min.css")}} />
        	<!--[if IE 7]>
		  <link rel="stylesheet" href={{asset("admin/css/font-awesome-ie7.min.css")}} />
		<![endif]-->
        <!--[if lte IE 8]>
		  <link rel="stylesheet" href={{asset("admin/css/ace-ie.min.css")}} />
		<![endif]-->
		<script src={{asset("js/jquery-1.9.1.min.js")}}></script>
        <script src={{asset("admin/js/bootstrap.min.js")}}></script>
		<script src={{asset("admin/js/typeahead-bs2.min.js")}}></script>           	
        <script src={{asset("admin/layer/layer.js")}} type="text/javascript" ></script>          
        <script src={{asset("admin/js/jquery-ui-1.10.3.custom.min.js")}}></script>
		<script src={{asset("admin/js/jquery.ui.touch-punch.min.js")}}></script>
        <script src={{asset("admin/js/ace-elements.min.js")}}></script>
		<script src={{asset("admin/js/ace.min.js")}}></script>
<title>系统设置</title>

</head>

<body>
<div class="margin clearfix">
   <!-- 读取 提示 消息 -->
 @if (session('success'))
 <div class="mws-form-message success">
     {{ session('success') }}
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
 <div class="stystems_style">
  <div class="tabbable">
	<ul class="nav nav-tabs" id="myTab">
	  <li class="active">
		<a data-toggle="tab" href="#home"><i class="green fa fa-home bigger-110"></i>&nbsp;基本设置</a></li>
	</ul>
    <div class="tab-content">
    <form class="mws-form" action="{{route('System_Create')}}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          @foreach ($configer as $k)
		<div id="home" class="tab-pane active">
         <div class="form-group"><label class="col-sm-1 control-label no-padding-right" for="form-field-1"><i>*</i>网站名称： </label>
          <div class="col-sm-9"><input type="text" id="website-title" name="name" placeholder="控制在25个字、50个字节以内" value="{{ $k->name }}" class="col-xs-10 "></div>
          </div>
           <div class="form-group"><label class="col-sm-1 control-label no-padding-right" for="form-field-1"><i>*</i>网站icon图标： </label>
          <div class="col-sm-9"><input type="file" id="id-input-file-2" name="pic" /></div>
          </div>
          <div class="form-group"><label class="col-sm-1 control-label no-padding-right" for="form-field-1"><i>*</i>关键词： </label>
          <div class="col-sm-9"><input type="text" id="website-title" name="keyword" placeholder="5个左右,8汉字以内,用英文,隔开" value="{{ $k->keyword }}" class="col-xs-10 "></div>
          </div>
          <input type="hidden" name="id" value="{{ $k->id }}">
          <div class="form-group"><label class="col-sm-1 control-label no-padding-right" for="form-field-1"><i>*</i>描述： </label>
          <div class="col-sm-9"><input type="text" id="website-title" name="miaoshu" placeholder="空制在80个汉字，160个字符以内" value="{{ $k->miaoshu }}" class="col-xs-10"></div>
          </div>
          <div class="form-group"><label class="col-sm-1 control-label no-padding-right" for="form-field-1"><i>*</i>底部版权信息： </label>
          <div class="col-sm-9"><input type="text" id="website-title" name="banquan" placeholder="" value="{{ $k->miaoshu }}" class="col-xs-10 "></div>
          </div>
          <div class="form-group"><label class="col-sm-1 control-label no-padding-right" for="form-field-1"><i>*</i>备案号： </label>
          <div class="col-sm-9"><input type="text" id="website-title" name="beian" placeholder="" value="{{ $k->beian }}" class="col-xs-10 "></div>
          </div>
          <div class="Button_operation"> 
				<button class="btn btn-primary radius" type="submit"><i class="fa fa-save "></i>&nbsp;更改</button>
				{{-- <button  class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>             --}}
		  	</div>
      </div>
      @endforeach
      </form>
		</div>
		</div>
 </div>

</div>
</body>
</html>
<script>
$('#id-input-file-2').ace_file_input({
					no_file:'选择上传图标 ...',
					btn_choose:'选择',
					btn_change:'更改',
					droppable:false,
					onchange:null,
					thumbnail:false, //| true | large
					whitelist:'gif|png|jpg|jpeg'
					//blacklist:'exe|php'
					//onchange:''
					//
				});
</script>
