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
        <link rel="stylesheet" href={{asset("Widget/zTree/css/zTreeStyle/zTreeStyle.css")}} type="text/css">
        <link rel="stylesheet" href={{asset("admin/css/ace.min.css")}} />
        <link rel="stylesheet" href={{asset("admin/font/css/font-awesome.min.css")}} />
        <!--[if lte IE 8]>
		  <link rel="stylesheet" href={{asset("admin/css/ace-ie.min.css")}} />
		<![endif]-->
		<script src={{asset("js/jquery-1.9.1.min.js")}}></script>
        <script src={{asset("admin/js/bootstrap.min.js")}}></script>
		<script src={{asset("admin/js/typeahead-bs2.min.js")}}></script>  
        <script src={{asset("js/lrtk.js")}} type="text/javascript" ></script>	         	
		<script src={{asset("admin/js/jquery.dataTables.min.js")}}></script>
		<script src={{asset("admin/js/jquery.dataTables.bootstrap.js")}}></script>
        <script src={{asset("admin/layer/layer.js")}} type="text/javascript" ></script>          
        <script src={{asset("admin/laydate/laydate.js")}} type="text/javascript"></script>
        <script src={{asset("js/H-ui.js")}} type="text/javascript"></script>
        <script src={{asset("js/displayPart.js")}} type="text/javascript"></script>
        <script src={{asset("admin/js/ace-elements.min.js")}}></script>
		<script src={{asset("admin/js/ace.min.js")}}></script>
        <script src={{asset("admin/js/bootstrap.min.js")}}></script>
        <script type="text/javascript" src={{asset("Widget/zTree/js/jquery.ztree.all-3.5.min.js")}}></script> 
        <script src={{asset("js/lrtk.js")}} type="text/javascript" ></script>
<title>文章管理</title>
</head>

<body>
        <div class=" clearfix">
                <div id="category">
                   <div id="scrollsidebar" class="left_Treeview">
                   <div class="show_btn" id="rightArrow"><span></span></div>
                   <div class="widget-box side_content" >
                   <div class="side_title"><a title="隐藏" class="close_btn"><span></span></a></div>
                    <div class="side_list">
                     <div class="widget-header header-color-green2">
                         <h4 class="lighter smaller">产品类型列表</h4>
                     </div>
                     <div class="widget-body">
                         <div class="widget-main padding-8">
                             <div  id="treeDemo" class="ztree" ></div>
                         </div>
                 </div>
                 </div>
  </div>  
                 </div>
                 </div>  
               <!---->
 <script type="text/javascript"> 
    $(function() { 
        $("#category").fix({
            float : 'left',
            //minStatue : true,
            skin : 'green',	
            durationTime :false
        });
    });
    </script>
    
    <script type="text/javascript">
    //初始化宽度、高度  
     $(".widget-box").height($(window).height()); 
     $(".page_right_style").width($(window).width()-220);
      //当文档窗口发生改变时 触发  
        $(window).resize(function(){
        $(".widget-box").height($(window).height());
         $(".page_right_style").width($(window).width()-220);
        })
     
    /**************/
    var setting = {
        view: {
            dblClickExpand: false,
            showLine: false,
            selectedMulti: false
        },
        data: {
            simpleData: {
                enable:true,
                idKey: "id",
                pIdKey: "pId",
                rootPId: "Path"
            }
        },
    };
    
        $.get('{{route("Category")}}',
        {'_token':'{{csrf_token()}}',
        'status':'all',
        },function(data) //第二个参数要传token的值 再传参数要用逗号隔开
        {
            var zNodes = data;
            for (var i = 0; i < data.length; i++) {
                const element = data[i]['count'];
                data[i]['name']=data[i]['name']+' ('+data[i]['count']+')';
            }
            var t = $("#treeDemo");
            t = $.fn.zTree.init(t, setting, zNodes);
            demoIframe = $("#testIframe");
            // demoIframe.bind("load", loadReady);
            var zTree = $.fn.zTree.getZTreeObj("tree");
            // zTree.selectNode(zTree.getNodeByParam("id",'1'));
            $('a[class=level0]').click(function(){
                var name=$(this).text();
                name=name.substring(0,name.indexOf("("));
                window.location.href = "{{url('admin/Shop/List')}}"+"/"+name;
                
            });
        });
    
            
    var code;
            
    function showCode(str) {
        if (!code) code = $("#code");
        code.empty();
        code.append("<li>"+str+"</li>");
    }
    </script>
 <div class="Ads_list">
                <span><label class="l_f" id="start"></span>
    <div class="clearfix"></span>
    <span class="r_f">共：<b>{{$count}}</b>家</span>
     </div>
     <div class="article_list">
       <table class="table table-striped table-bordered table-hover" id="sample-table">
       <thead>
		 <tr>
				<th width="25"><label><span type="checkbox" class="ace"><span class="lbl"></span></label></th>
                <th width="80px">排序</th>
				<th width="180">店铺名称</th>
				<th width="120px">所属分类</th>
                <th width="120px">店铺类型</th>
				<th width="">简介</th>
				<th width="150px">添加时间</th>
                <th width="100px">审核状态</th>                
				<th width="150px">操作</th>
            </tr>
		</thead>
        <tbody class="tbody">
            @foreach ($shop as $shop)
         <tr>
          <td><label><span type="checkbox" class="ace"><span class="lbl"></span></label></td>
            <td>{{$num++}}</td>
            <td>{{$shop['sname']}}</td>
            <td>{{$shop['cname']}}</td>
            @if($shop['type']=='1')
            <td>个人店铺</td>
            @elseif($shop['type']==2)
            <td>企业店铺</td>
            @endif
            <td class="displayPart" displayLength="60">{{$shop['intro']}}</td>
            <td>{{$shop['created_at']}}</td>
            @if($shop['audit']=='1')
                <td>通过</td>
            @elseif($shop['audit']=='2')
                <td>已拒绝</td>
            @elseif($shop['audit']=='3')
                <td>待审核</td>
            @elseif($shop['audit']=='')
                <td>未申请</td>
            @endif
          <td class="td-manage">        
           <a title="删除" href="javascript:;"  onclick="member_del(this,{{$shop['id']}})" class="btn btn-xs btn-danger" ><i class="fa fa-trash  bigger-120"></i></a>
          </td>
         </tr>
         @endforeach
        </tbody>
       </table>    
     </div>
 </div>
 </div>
</div>
</body>
</html>
<script>
$(function () {  
        $(".displayPart").displayPart();  
   });
   laydate({
    elem: '#start',
    event: 'focus' 
});
 
$(function() {
		var oTable1 = $('#sample-table').dataTable( {
		"aaSorting": [[ 1, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[0,2,3,4,5,7,8]}// 制定列不参与排序
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

 $(function() { 
	$("#article_style").fix({
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
//初始化宽度、高度  
 $(".widget-box").height($(window).height()); 
 $(".Ads_list").width($(window).width()-220);
  //当文档窗口发生改变时 触发  
    $(window).resize(function(){
	$(".widget-box").height($(window).height());
	 $(".Ads_list").width($(window).width()-220);
});

/*文章-删除*/
function member_del(obj,id){
	layer.confirm('确认要删除吗？',{icon:0,},function(index){
		$.ajax({
            url:"{{url('admin/Shop/List/del')}}"+'/'+id,
            type:"POST",
            data:{
                  _token : '<?php echo csrf_token()?>',
                },
            dataType:"json",
            success:function(result){
                if(result){
                    layer.msg('提交成功!',{icon:1,time:1000});
                    // layer.close(index);
                    setTimeout(function(){
                        window.location.href = "{{url('admin/Shop/List/empty')}}";
                    },1000);
                }
            }
                                    
        })
	});
}

</script>
