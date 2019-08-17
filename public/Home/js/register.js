	// 邮箱注册
    $('input[type="submit"][name="emailSubmit"]').click(function(){
        if($('#email').val()==""){
            alert('请填写数据');
        }
        if($('#EpasswordRepeat').val()!=$('#Epassword').val()){
                alert('两次密码不一致');return false;
        }else if($('#EpasswordRepeat').val()=="" || $('#Epassword').val()==""){
            return false;
        }
        $.post('{{route("Register.store")}}',
        {'_token':'{{csrf_token()}}',
        'array':'email',
        'email':$("input[name='Email']").val(),
        'password':$('#Epassword').val(),
        },function(data) //第二个参数要传token的值 再传参数要用逗号隔开
        {
            console.log(data);
        });
    }) 
    function sendMobileCode(obj){

//获取用户验证码
let phone = $('#phone').val();
//验证格式
let phone_preg = /^1{1}[3-9]{1}[\d]{9}$/;
if(!phone_preg.test(phone)){
    alert('手机号格式不正确');
    return false;
}


$('#sendMobileCode').attr('disabled',true);
$('#sendMobileCode').css('color','#ccc');
$('#sendMobileCode').css('cursor','no-drop');
$("#dyMobileButton").css('color','#ccc');
let time = null;
if($("#dyMobileButton").html()=='获取'){
let i = 5;
time = setInterval(function(){
    i--;
    $("#dyMobileButton").html('('+i+')s');
    if(i < 1){
        $('#sendMobileCode').attr('disabled',false);
        $('#sendMobileCode').css('color','#333');
        $('#sendMobileCode').css('cursor','pointer');
        $("#dyMobileButton").css('color','#333');
        $("#dyMobileButton").html('获取');
        clearInterval(time);
    }
},1000);

//发送验证码
$.get('{{route("sendPhone")}}',{phone},function(res){
    console.log(res);
    if(res.error_code == 0){
        alert('发送成功，验证码十分钟有效');
    }else{
        alert('发送失败');
    }
    },'json');
    }else{

    }
}
// 手机注册
$('input[type="submit"][name="phoneSubmit"]').click(function(){
        if($('#tel').val()==""){
            alert('请填写数据');
        }
        if($('#PpasswordRepeat').val()!=$('#Ppassword').val()){
                alert('两次密码不一致');return false;
        }else if($('#PpasswordRepeat').val()=="" || $('#Ppassword').val()==""){
            return false;
        }
        $.post('{{route("phonestore")}}',
        {'_token':'{{csrf_token()}}',
        'code':$("#code").val(),
        'array':'phone',
        'phone':$("input[name='Phone']").val(),
        'password':$('#Ppassword').val(),
        },function(data) //第二个参数要传token的值 再传参数要用逗号隔开
        {
            console.log(data);
        });
})