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
        <script src={{asset("admin/layer/layer.js")}} type="text/javascript" ></script>          
        <script src={{asset("admin/laydate/laydate.js")}} type="text/javascript"></script>
        <script src={{asset("js/H-ui.js")}} type="text/javascript"></script>
<title>添加文章</title>
</head>

<body>
<div class="margin clearfix">
 <div class="article_style">
    <div class="add_content" id="form-article-add">
     <ul>
      <li class="clearfix Mandatory">
      <label class="label_name"><i>*</i>文章标题</label><span class="formControls col-10"><input name1="文章标题" name="name" type="text" id="form-field-1" class="col-xs-10 col-sm-5 "></span>
      </li>
      <li class="clearfix Mandatory"><label class="label_name"><i>*</i>文章简介</label>
      <span class="formControls col-10"><input name1="文章简介" name="jianjie" type="text" id="form-field-1" class="col-xs-10 col-sm-6 "></span>
      </li>
      {{-- <li class="clearfix"><label class="label_name">排序</label><span class="formControls col-10"><input type="text" id="form-field-1" class="col-xs-10 col-sm-1"></span></li> --}}
      <li class="clearfix"><label class="label_name"><i>*</i>所属分类</label>
       <span class="formControls col-4"><select class="form-control" id="form-field-select-1">
          <option value="">--选择所属分类--</option>
          @foreach ($configer as $k)
          <option value="{{ $k->id }}">{{ $k->tname }}</option>
            {{-- <input type="hidden" name="type" value="{{ $k->id }}"> --}}
          @endforeach
       </select>
       </span>
      </li>
      <li class="clearfix"><label class="label_name">显示状态</label>
        <span class="formControls col-10">
        <span class="add_date l_f">
       <label><input name="status" value="1" type="radio" class="ace" ><span class="lbl">显示</span></label>&nbsp;
       <label><input name="status" value="2" type="radio" class="ace" ><span class="lbl">不显示</span></label></span>
       </span>
      </li>
      <li class="clearfix"><label class="label_name">文章内容</label>
        <span ><input type="text" name="content" style="width:90%;height:400px; margin-left:10px;" /></span>
      </li>
     </ul>
    <div class="Button_operation">
				<button onclick="article_save_submit()" class="btn btn-primary radius" type="submit">保存并提交</button>
				<button  class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
			</div>
    </div>
 </div>
</div>
</body>
</html>
<script type="text/javascript" src={{asset("Widget/ueditor/1.4.3/ueditor.config.js")}}></script>
<script type="text/javascript" src={{asset("Widget/ueditor/1.4.3/ueditor.all.min.js")}}> </script>
<script type="text/javascript" src={{asset("Widget/ueditor/1.4.3/lang/zh-cn/zh-cn.js")}}></script> 
<script type="text/javascript">
/**提交操作**/
function article_save_submit(){
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
		  // if(num>0){  return false;}	 	
      //     else{
			//   layer.alert('添加成功！',{
      //          title: '提示框',				
			// icon:1,		
			//   });
			//    layer.close();	
		  // }		  		     					
	}
// $(function(){
// 	var ue = UE.getEditor('editor');
// });
/*radio激发事件*/
// function Enable(){ $('.date_Select').css('display','block');}
// function closes(){$('.date_Select').css('display','none')}
// /**日期选择**/
// var start = {
//     elem: '#start',
//     format: 'YYYY/MM/DD',
//     min: laydate.now(), //设定最小日期为当前日期
//     max: '2099-06-16', //最大日期
//     istime: true,
//     istoday: false,
//     choose: function(datas){
//          end.min = datas; //开始日选好后，重置结束日的最小日期
//          end.start = datas //将结束日的初始值设定为开始日
//     }
// };
// var end = {
//     elem: '#end',
//     format: 'YYYY/MM/DD',
//     min: laydate.now(),
//     max: '2099-06-16 ',
//     istime: true,
//     istoday: false,
//     choose: function(datas){
//         start.max = datas; //结束日选好后，重置开始日的最大日期
//     }
// };
// laydate(start);
// laydate(end);
</script>
