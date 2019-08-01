<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href={{asset("admin/css/bootstrap.min.css")}} rel="stylesheet" />
		<link rel="stylesheet" href={{asset("admin/css/font-awesome.min.css")}} />
		<!--[if IE 7]>
		  <link rel="stylesheet" href={{asset('admin/css/font-awesome-ie7.min.css')}} />
		<![endif]-->
		<link rel="stylesheet" href={{asset('admin/css/ace.min.css')}} />
		<link rel="stylesheet" href={{asset('admin/css/ace-rtl.min.css')}} />
		<link rel="stylesheet" href={{asset("admin/css/ace-skins.min.css")}} />
        <link rel="stylesheet" href={{asset("admin/css/style.css")}}/>
		<!--[if lte IE 8]>
		  <link rel="stylesheet" href={{asset('admin/css/ace-ie.min.css')}} />
		<![endif]-->
		<script src={{asset("admin/js/ace-extra.min.js")}}></script>
		<!--[if lt IE 9]>
		<script src={{asset('admin/js/html5shiv.js')}}></script>
		<script src={{asset('admin/js/respond.min.js')}}></script>
		<![endif]-->
		<script src={{asset("/js/jquery-1.9.1.min.js")}}></script>        
        <script src={{asset("admin/layer/layer.js")}} type="text/javascript"></script>
<title>登陆</title>
</head>

<body class="login-layout Reg_log_style">
<div class="logintop">    
    <span>欢迎后台管理界面平台</span>    
    <ul>
    <li><a href="#">返回首页</a></li>
    <li><a href="#">帮助</a></li>
    <li><a href="#">关于</a></li>
    </ul>    
    </div>
    <div class="loginbody">
<div class="login-container">
	<div class="center">
	     <img src={{asset("admin/images/logo1.png")}} />
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box widget-box no-border visible">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="icon-coffee green"></i>
												管理员登陆
											</h4>

											<div class="login_icon"><img src={{asset("admin/images/login.png")}} /></div>

										<form method="post" class="layui-form">
												<fieldset>
										<ul>
   <li class="frame_style form_error"><label class="user_icon"></label><input name="username" type="text"  id="username" lay-verify="required"/><i>用户名</i></li>
   <li class="frame_style form_error"><label class="password_icon"></label><input name="password" type="password"   id="userpwd" lay-verify="required"/><i>密码</i></li>
   <li class="frame_style form_error"><label class="Codes_icon"></label><input type="text" class="form-control {{$errors->has('captcha')?'parsley-error':''}}" id="Codes_text" name="captcha" placeholder=""><i>验证码</i><div class="Codes_region"><img src="{{captcha_src()}}" style="cursor: pointer" onclick="this.src='{{captcha_src()}}'+Math.random()"></div></li>
    @if($errors->has('captcha'))
        <div class="col-md-12">
            <p class="text-danger text-left"><strong>{{$errors->first('captcha')}}</strong></p>
        </div>
    @endif
  </ul>
		<div class="space"></div>

		<div class="clearfix">
			<label class="inline">
				<input type="checkbox" class="ace">
				<span class="lbl">保存密码</span>
			</label>

			<button type="submit" class="width-35 pull-right btn btn-sm btn-primary" id="login_btn" lay-submit lay-filter="login">
				<i class="icon-key"></i>
				登陆
			</button>
		</div>

		<div class="space-4"></div>
	</fieldset>
	</form>
	<script src={{asset("/js/jquery.js")}} charset="utf-8"></script>

	<div class="social-or-login center">
	<span class="bigger-110">通知</span>
	</div>

	<div class="social-login center">
	本网站系统不再对IE8以下浏览器支持，请见谅。
	</div>
	</div><!-- /widget-main -->

	<div class="toolbar clearfix">
										
				</div>
			</div><!-- /widget-body -->
		</div><!-- /login-box -->
	</div><!-- /position-relative -->
</div>
</div>
<div class="loginbm">版权所有  2016  <a href="">南京思美软件系统有限公司</a> </div><strong></strong>
</body>
</html>
<script>
	$('button').on('click',function(){
		console.log(layui);
		return false;
	})
	$('layui').extend({
                admin: '{/}/static/js/admin'
            });
            layui.use(['form','admin'], function(){
				console.log(1);
				
              var form = layui.form
				,admin = layui.admin;
				// console.log(form);die;''
              // layer.msg('玩命卖萌中', function(){
              //   //关闭后的操作
              //   });
              //监听提交
              form.on('submit(login)', function(data){
                  var data=data.field;
                  console.log(data);
                  $.ajax({
                      type: 'POST',
                      url: "/admin/login",
                      data:data,
                      success: function (data) {
                          localStorage.setItem("login",true);
                          location.href='/admin'
                      },
                      error: function (data) {
                          var error_msg=JSON.parse(data.responseText).errors;
                          layer.msg(error_msg.username[0],function(){
                              // location.href='/index.html'
                          });
                      },
                  })
                // layer.msg(JSON.stringify(data.field),function(){
                //     // location.href='/index.html'
                // });
                return false;
              });
            });   
$('#login_btn').on('click', function(){
	     var num=0;
		 var str="";
     $("input[type$='text'],input[type$='password']").each(function(n){
          if($(this).val()=="")
          {
               
			   layer.alert(str+=""+$(this).attr("name")+"不能为空！\r\n",{
                title: '提示框',				
				icon:0,								
          }); 
		    num++;
            return false;            
          } 
		 });
		  if(num>0){  return false;}	 	
          else{
			  layer.alert('登陆成功！',{
               title: '提示框',				
			   icon:1,		
			  });
	          location.href="index.html";
			   layer.close(index);	
		  }		  		     						
		
	});
  $(document).ready(function(){
	 $("input[type='text'],input[type='password']").blur(function(){
        var $el = $(this);
        var $parent = $el.parent();
        $parent.attr('class','frame_style').removeClass(' form_error');
        if($el.val()==''){
            $parent.attr('class','frame_style').addClass(' form_error');
        }
    });
	$("input[type='text'],input[type='password']").focus(function(){		
		var $el = $(this);
        var $parent = $el.parent();
        $parent.attr('class','frame_style').removeClass(' form_errors');
        if($el.val()==''){
            $parent.attr('class','frame_style').addClass(' form_errors');
        } else{
			 $parent.attr('class','frame_style').removeClass(' form_errors');
		}
		});
	  })

</script>
