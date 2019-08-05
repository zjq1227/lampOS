$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var uflag=false;
var pflag=false;
var rpflag=false;
var eflag=false;
var sflag=false;
// var yflag=false;
var pattern = /^[a-z0-9_-][A-Za-z0-9_]{6,16}$/;
        $('input[type=text][name=Name]').val('');
        $('input[type=Email][name=Email]').val('');
        $('input[type=text][name=Phone]').val('');
        // console.log($('input[type=submit]'));
        // console.log(pattern.exec($('input[type=text][name=Name]').val()));
        // console.log(flag);
        // console.log($('input[name=Repassword]').next().html());
        /*用户名验证*/
        $('input[type=text][name=Name]').keyup(function(){
            if( (pattern.exec($('input[type=text][name=Name]').val())) == null){
                // console.log(1);
                uflag=false;
                $('input[type=text][name=Name]').next().html('输入格式不正确').css('color','red');
            }else{
                uflag=true;
                $('input[type=text][name=Name]').next().html('输入格式正确').css('color','green');
            }
            /*判断是否存在用户*/
            $.post("/Home/register/store",{action:'select',Name:$('input[name="Name"]').val()},function(data){
                // console.log(data);
                    if(data == 1){
                        uflag=false;
                        $('input[type=text][name=Name]').next().html('用户名已存在').css('color','red');
                    };
            }); 
        });

        /*用户名失去焦点验证*/
        $('input[type=text][name=Name]').blur(function(){
            if( (pattern.exec($('input[type=text][name=Name]').val())) == null){ 
                // console.log(1);
                uflag=false;
                $('input[type=text][name=Name]').next().html('输入格式不正确').css('color','red');
            }else{
                uflag=true;
                $('input[type=text][name=Name]').next().html('输入格式正确').css('color','green');
            };
            /*判断是否存在用户*/
            $.post("/Home/register/store",{action:'select',Name:$('input[name="Name"]').val()},function(data){
                // console.log(data);
                    if(data == 1){
                        uflag=false;
                        $('input[type=text][name=Name]').next().html('用户名已存在').css('color','red');
                    };
            });
        });

        /*密码验证*/
        var pwdz = /^[a-z0-9_-]{6,16}$/;
        $('input[name=Password]').keyup(function(){
            // console.log(pwdz.exec($('input[type=Password][name=Password]').val()));

            // 正则密码
            if((pwdz.exec($('input[name=Password]').val())) == null || $('input[name=Password]').val() == ''){
                // console.log(1);
                pflag=false;
                $('input[name=Password]').next().html('输入格式不正确').css('color','red');
            }else{
                pflag=true;
                $('input[name=Password]').next().html('输入格式正确').css('color','green');
            }
            // 判断第二次密码
            if($('input[type=Password][name=Password]').val() != $('input[type=Password][name=Repassword]').val() || $('input[type=Password][name=Repassword]').val() ==''){
                rpflag=false;
                        $('input[name=Repassword]').next().html('输入密码不一致').css('color','red');
                    }else{
                        rpflag=true;
                        $('input[name=Repassword]').next().html('输入密码一致').css('color','green');
            }
        });
        $('input[name=Password]').blur(function(){
            // console.log(pwdz.exec($('input[type=Password][name=Password]').val()));

            // 正则密码
            if((pwdz.exec($('input[name=Password]').val())) == null || $('input[name=Password]').val() == ''){
                // console.log(1);
                pflag=false;
                $('input[name=Password]').next().html('输入格式不正确').css('color','red');
            }else{
                pflag=true;
                $('input[name=Password]').next().html('输入格式正确').css('color','green');
            }
            // 判断第二次密码
            if($('input[type=Password][name=Password]').val() != $('input[type=Password][name=Repassword]').val() || $('input[type=Password][name=Repassword]').val() == ''){
                rpflag=false;
                        $('input[name=Repassword]').next().html('输入密码不一致').css('color','red');
                    }else{
                        rpflag=true;
                        $('input[name=Repassword]').next().html('输入密码一致').css('color','green');
            }
        });
        /*验证第二次密码*/
            $('input[name=Repassword]').keyup(function(){
                
                    if($('input[type=Password][name=Password]').val() != $('input[type=Password][name=Repassword]').val() || $('input[type=Password][name=Repassword]').val() == ''){
                        rpflag=false;
                        $('input[name=Repassword]').next().html('输入密码不一致').css('color','red');
                    }else{
                        rpflag=true;
                        $('input[name=Repassword]').next().html('输入密码一致').css('color','green    ');
                    }

            });


        /*二次密码失去焦点*/
            $('input[name=Repassword]').blur(function(){
                
                    if($('input[type=Password][name=Password]').val() != $('input[type=Password][name=Repassword]').val() || $('input[type=Password][name=Repassword]').val() ==''){
                        rpflag=false;
                        $('input[name=Repassword]').next().html('输入密码不一致').css('color','red');
                    }else{
                        rpflag=true;
                        $('input[name=Repassword]').next().html('输入密码一致').css('color','green');
                    }

            });
        /*验证邮箱*/
            var Emailz =/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
                $('input[name=Email]').keyup(function(){
                    if(Emailz.exec($('input[name=Email]').val()) == null){
                        eflag=false;
                        $('input[name=Email]').next().html('邮箱格式不正确').css('color','red');
                    }else{
                        eflag=true;
                        $('input[name=Email]').next().html('邮箱格式正确').css('color','green');
                    }
                    /*判断是否存在已注册邮箱*/
                    $.post("/Home/register/store",{action:'Email',Email:$('input[name="Email"]').val()},function(data){
                        // console.log(data);
                            if(data == 1){
                                eflag=false;
                                $('input[name=Email]').next().html('该邮箱已被注册').css('color','red');
                            };
                    });
                });
        /*邮箱失去焦点*/
                $('input[name=Email]').blur(function(){
                    if(Emailz.exec($('input[name=Email]').val()) == null){
                        eflag=false;
                        $('input[name=Email]').next().html('邮箱格式不正确').css('color','red');
                    }else{
                        eflag=true;
                        $('input[name=Email]').next().html('邮箱格式正确').css('color','green');
                    }
                    /*判断是否存在已注册邮箱*/
                    $.post("/Home/register/store",{action:'Email',Email:$('input[name="Email"]').val()},function(data){
                        // console.log(data);
                            if(data == 1){
                                eflag=false;
                                $('input[name=Email]').next().html('该邮箱已被注册').css('color','red');
                            };
                    });
                });
        /*匹配电话*/
                var Phonez=/^[0-9_-]{11,11}$/;
                $('input[name=Phone]').keyup(function(){
                    if(Phonez.exec($('input[name=Phone]').val()) == null  || $('input[name=Phone]').val() == ''){
                        sflag=false;
                        $('input[name=Phone]').next().html('手机格式不正确').css('color','red');
                    }else{
                        sflag=true;
                        $('input[name=Phone]').next().html('手机格式正确').css('color','green');
                    }
                });
        /*电话失去焦点*/
                $('input[name=Phone]').blur(function(){
                    sflag=false;
                    if(Phonez.exec($('input[name=Phone]').val()) == null  || $('input[name=Phone]').val() == ''){
                        $('input[name=Phone]').next().html('手机格式不正确').css('color','red');
                    }else{
                        sflag=true;
                        $('input[name=Phone]').next().html('手机格式正确').css('color','green');
                    }
                });
        
            $('button').click(function(){
                
                // console.log(1);
                /*验证码*/
                if($('input[name=verify]').val() == ''){
                    $('input[name=verify]').next().html('不能为空').css('color','red');
                    $('input[name=verify]').css('border','1px solid red');
                    yflag=false;
                }else{
                    $('input[name=verify]').css('border','1px solid green');
                    yflag=true;
                };  
                if(uflag != false && pflag != false && rpflag != false && sflag != false && eflag != false ){
                    // alert('跳转成功');
                }else{
                    if(Phonez.exec($('input[name=Phone]').val()) == null  || $('input[name=Phone]').val() == ''){
                        $('input[name=Phone]').next().html('手机格式不正确').css('color','red');
                    };
                    if(Emailz.exec($('input[name=Email]').val()) == null){
                        eflag=false;
                        $('input[name=Email]').next().html('邮箱格式不正确').css('color','red');
                    };
                    if($('input[type=Password][name=Password]').val() != $('input[type=Password][name=Repassword]').val() || $('input[type=Password][name=Repassword]').val() ==''){
                        rpflag=false;
                        $('input[name=Repassword]').next().html('输入密码不一致').css('color','red');
                    };
                    if((pwdz.exec($('input[name=Password]').val())) == null || $('input[name=Password]').val() == ''){
                        // console.log(1);
                        pflag=false;
                        $('input[name=Password]').next().html('输入格式不正确').css('color','red');
                    };
                    if( (pattern.exec($('input[type=text][name=Name]').val())) == null){ 
                        // console.log(1);
                        uflag=false;
                        $('input[type=text][name=Name]').next().html('输入格式不正确').css('color','red');
                    };
                    alert('你输入格式有错请修改');
                    return false; 
                };

                // return false;
            
            });