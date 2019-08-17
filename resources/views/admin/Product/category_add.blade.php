<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta name="csrf-token" content="{{ csrf_token() }}"> 
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
 <link href={{asset("admin/css/bootstrap.min.css")}} rel="stylesheet" />
        <link rel="stylesheet" href={{asset("admin/css/style.css")}}/>       
        <link rel="stylesheet" href={{asset("admin/css/ace.min.css")}} />
        <link rel="stylesheet" href={{asset("admin/css/font-awesome.min.css")}} />
        <link href={{asset("Widget/icheck/icheck.css")}} rel="stylesheet" type="text/css" />
		<!--[if IE 7]>
		  <link rel="stylesheet" href={{asset("admin/css/font-awesome-ie7.min.css")}} />
		<![endif]-->
        <!--[if lte IE 8]>
		  <link rel="stylesheet" href={{asset("admin/css/ace-ie.min.css")}} />
		<![endif]-->
	    <script src={{asset("js/jquery-1.9.1.min.js")}}></script>
        <script src={{asset("admin/js/bootstrap.min.js")}}></script>
<title>添加产品分类</title>
</head>
<body>
<div class="type_style">
 <div class="type_title">产品类型信息</div>
  <div class="type_content">
  <div class="Operate_btn">
    @if($cates['0']['type']=='fu')
      <a href="javascript:;" class="btn  btn-warning" onclick="add(this)"><i class="icon-edit align-top bigger-125"></i>新增子类型</a>
      <a href="javascript:;" class="btn  btn-danger" onclick="add(this)"><i class="icon-trash   align-top bigger-125"></i>删除该类型</a>
      <a href="javascript:;" onclick="parent.location.reload();" class="btn btn-success"><i class="fa fa-plus"></i> 点击刷新</a>
  @elseif($cates['0']['type']=='zi')
      <a href="javascript:;" class="btn  btn-warning" onclick="add(this)"><i class="icon-edit align-top bigger-125"></i>新增父类型</a>
      <a href="javascript:;" class="btn  btn-danger" onclick="del(this)"><i class="icon-trash   align-top bigger-125"></i>删除该类型</a>
      <a href="javascript:;" onclick="parent.location.reload();" class="btn btn-success"><i class="fa fa-plus"></i> 点击刷新</a>
  @endif
  <script>
    // 添加
    function add(obj){
      if($(obj).text()=='新增子类型'){
        var id=$('select[name=id]').val();
        if(id==undefined){
          // alert('您还没有创建分类');
          window.location.href='../../../admin/Product/Category_add'+'/'+'all'; 
          window.location.reload;
        }
        console.log($('option[value='+$('select[name=id]').val()+']').attr('level'));
      }else if($(obj).text()=='新增父类型'){
          window.location.href='../../../admin/Product/Category_add'+'/'+'empty'; 
          window.location.reload;
      }else{
        var id=$('select[name=id]').val();
        if(id==undefined){
          window.location.href='../../../admin/Product/Category_add'+'/'+'all'; 
          window.location.reload;
        }
      }
    }
    // 修改
    function del(obj){
      if($('select[name=id]').val()!=undefined){
          var formData=new FormData($('#form-user-add')['0']);
          formData.append('id',$('select[name=id]').val());
          formData.append('level',$('option[value='+$('select[name=id]').val()+']').attr('level'));
          if(formData.get('level')!=''){
        // 发送请求
            $.ajax({ 
              url: "{{route('Category.del')}}",
              type: 'POST', 
              data: formData, 
              contentType: false, 
              processData: false, 
              success: function (returndata) {
                  console.log(returndata)
                  if(returndata==1){
                    alert('分类已删除');
                    window.location.href = "{{route('Category_add','empty')}}";
                  }else if(returndata==2){
                    alert('请先删除子类');
                  }
              }, 
              error: function (returndata) {
                  console.log(returndata); 
              } 
            });  
          }   
      }
    }
  </script>
  </div>
  <form action="" method="post" class="form form-horizontal" id="form-user-add">
    <div class="Operate_cont clearfix">
      <label class="form-label"><span class="c-red">*</span>分类名称：</label>
      <div class="formControls ">
        @if($cates['0']['id']=='')
          <input type="text" class="input-text" value="" placeholder="请填写分类名称" id="user-name" name="product-category-name">
          @else
          <select name="id" id="">
            @foreach ($cates as $cates)
              @if ($cates->level==1 && $cates->status==1)
                <option value="{{$cates->id}}" level="{{$cates->level}}">{{$cates->cname}} <span value="{{$cates->level}}">|-</span></option>
              @elseif($cates->level==2 && $cates->status==1)
                <option value="{{$cates->id}}" level="{{$cates->level}}">{{$cates->cname}} <span value="{{$cates->level}}">|--</span></option>
              @elseif($cates->level==3 && $cates->status==1)
                <option value="{{$cates->id}}" level="{{$cates->level}}">{{$cates->cname}} <span value="{{$cates->level}}">|---</span></option>
              @endif
            @endforeach
        </select>
      </div>
    </div>
        <div class="Operate_cont clearfix">
     <label class="form-label"><span class="c-red">*</span>添加名称：</label>
      <div class="formControls ">
        <input type="text" class="input-text" value="" placeholder="请填入您要添加的名称" id="user-add-name" name="product-category-add-name">
      </div>
    </div>
    @endif
    <div class="">
     <div class="" style=" text-align:center">
      <div class="btn btn-primary radius" type="submit" onclick="submit(this)">提交
      </div>
    </div>
  </form>
  <script>
    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
      function submit(obj){
        var formData=new FormData($('#form-user-add')['0']);
        // 如果不存在子类型添加
        if($('select[name=id]').val()==undefined){
          if($('#user-name').val()==''){
            alert('请填写名称');return false;
          }else{
            formData.append('level','1');
          }
        // 否则
        }else{
          if($('#user-add-name').val()==''){
            alert('请填写名称');return false;
          }else{
            formData.append('id',$('select[name=id]').val());
            formData.append('level',$('option[value='+$('select[name=id]').val()+']').attr('level'));
          }
        }
        if(formData.get('level')!=''){
        // 发送请求
            $.ajax({ 
              url: "{{route('Category.add')}}",
              type: 'POST', 
              data: formData, 
              contentType: false, 
              processData: false, 
              success: function (returndata) {
                  console.log(returndata)
                  if(returndata==1){
                    alert('分类已添加,请刷新数据');
                  }else if(returndata==3){
                    alert('该分类已存在');
                  }
              }, 
              error: function (returndata) {
                  console.log(returndata); 
              } 
            });  
        }       
      }
  </script>
  </div>
</div> 
</div>
<script type="text/javascript" src={{asset("Widget/icheck/jquery.icheck.min.js")}}></script> 
<script type="text/javascript" src={{asset("Widget/Validform/5.3.2/Validform.min.js")}}></script>
<script type="text/javascript" src={{asset("admin/layer/layer.js")}}></script>
<script type="text/javascript" src={{asset("js/H-ui.js")}}></script> 
<script type="text/javascript" src={{asset("js/H-ui.admin.js")}}></script>
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$("#form-user-add").Validform({
		tiptype:2,
		callback:function(form){
			form[0].submit();
			var index = parent.layer.getFrameIndex(window.name);
			parent.$('.btn-refresh').click();
			parent.layer.close(index);
		}
	});
});
</script>
</body>
</html>