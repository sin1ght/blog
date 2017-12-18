<?php
require './config/config.php';

$url=file_get_contents($host.'/index/index/getLogInPic');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="小楼资讯，登录">
    <meta name="description" content="小楼资讯登录页面">
    <title>登录--小楼资讯</title>
    <script src="static/js/jquery.js"></script>
    <script src="static/js/bootstrap.min.js"></script>
	<script type="application/javascript" src="./static/js/config.js"></script>
    <link type="text/css" rel="stylesheet" href="static/css/login.css"/>
    <link type="text/css" rel="stylesheet" href="static/css/bootstrap.min.css"/>
</head>
<body>
    <script>
        //将百分比高度换算成具体数值
        $('html,body').css('height',document.body.clientHeight+'px');
        $('html,body').css('width',document.body.clientWidth+'px');
//        $('html,body').css('width',window.screen.availWidth+'px');
//        $('html,body').css('height',window.screen.availHeight+'px');
    </script>
    <img class="banner" src=<?php echo $url?> />
    <div class="content">
        <div class="title">
            <div id="login" class="active">登录</div>
            <div id="register">注册</div>
        </div>
        <div style="clear: both"></div>
        <div class="login">
            <form method="post" action="#" onsubmit="return false">
                <input id="account" type="text" name="account" placeholder="手机号" ><br>
                <input type="password"  name="password" placeholder="密码" ><br>
                <input type="submit" name="submit" value="登录" id="login_submit">
            </form>
            <div>
                <p style="color: #566263;">快速登录</p>
                <p class="login_logo">
                    <a id="qq" href="#"></a>
                    <a id="wechat" href="#"></a>
                    <a id="weibo" href="#"></a>
                </p>
                <a style="position:absolute;right:0;bottom: 0;padding: 5px;" href="./reset_pwd.php">忘记密码?</a>
            </div>
        </div>
        <div class="register" style="display: none">
            <form method="post" action="#" style="margin-right: 80px;" onsubmit="return false">
                <input type="text"  name="nick_name" placeholder="昵称"><br>
                <div class="nick_name_error error_tips" style="display: none;">昵称不能为空</div>
                <div style="position: relative" class="password">
                    <input type="password" name="password" placeholder="密码" maxlength="16">
<!--                    <div class="eye" style="display: none"></div>-->
                </div>
                <div class="password_tips" style="display: none;">
                    <div class="info">不能包括空格</div>
                    <div class="info">长度为8-16个字符</div>
                    <div class="info">必须包含字母、数字、符号中至少2种</div>
                </div>
                <div class="password_error error_tips" style="display: none;">密码不能为空</div>
                <input type="tel" name="phone" placeholder="手机号/可凭此找回密码"><br>
                <div class="phone_error error_tips" style="display: none;">手机号不能为空</div>
                <input type="text" name="code" placeholder="验证码" style="float: left"><input type="button" id="msg_code_btn" value="发送短信验证码" style="float: left">
                <div style="clear: both"></div>
                <div class="code_error  error_tips" style="width:271px;display: none;">验证码不能为空</div>
                <input name="submit" type="submit" value="立即注册" id="register_submit">
            </form>
        </div>
    </div>
    <!--消息提示模状态框-->
    <div id="tips" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel">小楼资讯提示您</h4>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal" style="background:cadetblue;color: white;">确定</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#login').click(function () {
            $('.content .title div').each(function () {
               if($(this).hasClass('active'))
                   $(this).removeClass('active');
            });
            $(this).addClass('active');
            $('.content .register').hide();
            $('.content .login').show();
        });
        $('#register').click(function () {
            $('.content .title div').each(function () {
                if($(this).hasClass('active'))
                    $(this).removeClass('active');
            });
            $(this).addClass('active');
            $('.content .register').show();
            $('.content .login').hide();
        });

        $('.login input').focus(function () {
           $(this).css('border','1px cadetblue solid');
        });
        $('.login input').blur(function () {
           $(this).css('border','1px #b5b0b0c9 solid');
        });

        //注册 填写检测
        //昵称
        $('.register input[name=nick_name]').focus(function () {
            $(this).css('border','1px cadetblue solid');
            $('.nick_name_error').hide();
        });

        $('.register input[name=nick_name]').blur(function () {
            $(this).css('border','1px #b5b0b0c9 solid');
            var value=$(this).val().trim();
            if(value.length==0){
                $('.nick_name_error').text('昵称不能为空').show();
                $(this).css('border','1px rgb(204, 12, 21) solid');
            }else if((!/[a-zA-Z]+/.test(value))&&(!/[\u4e00-\u9fa5]+/.test(value))){
                $('.nick_name_error').text('昵称必须包含汉字或字母').show();
                $(this).css('border','1px rgb(204, 12, 21) solid');
            }
        });

        //密码
        $('.register input[name=password]').focus(function () {
            $(this).css('border','1px cadetblue solid');
            $('.password_error').hide();
            $('.password_tips').show();
        });

        $('.register input[name=password]').blur(function () {
            $('.password_tips').hide();
            $(this).css('border','1px #b5b0b0c9 solid');
            var value=$(this).val();
            if(value.length==0){
                $('.password_error').text('密码不能为空').show();
                $(this).css('border','1px rgb(204, 12, 21) solid');
            }else if(/\s+/.test(value)){
                $('.password_error').text('密码不能包含空格').show();
                $(this).css('border','1px rgb(204, 12, 21) solid');
            }else if(!/^.{8,16}$/.test(value)){
                $('.password_error').text('长度为8-16个字符').show();
                $(this).css('border','1px rgb(204, 12, 21) solid');
            }else if(/^[a-zA-Z]+$/.test(value)||/^\d+$/.test(value)||/^[/*+.\-~!@#$%^&?<>()]+$/.test(value)){
                $('.password_error').text('必须包含字母、数字、符号中至少2种').show();
                $(this).css('border','1px rgb(204, 12, 21) solid');
            }
        });


        //电话号码
        $('.register input[name=phone]').focus(function () {
            $(this).css('border','1px cadetblue solid');
            $('.phone_error').hide();
        });

        $('.register input[name=phone]').blur(function () {
            $(this).css('border','1px #b5b0b0c9 solid');
            var value=$(this).val().trim();
            if(value.length==0){
                $('.phone_error').text('电话号码不能为空').show();
                $(this).css('border','1px rgb(204, 12, 21) solid');
            }else if(!/^1[3578]\d{9}$/g.test(value)){
                $('.phone_error').text('电话号码不合法').show();
                $(this).css('border','1px rgb(204, 12, 21) solid');
            }
        });

        //验证码
        $('.register input[name=code]').focus(function () {
            $(this).css('border','1px cadetblue solid');
            $('.code_error').hide();
        });

        $('.register input[name=code]').blur(function () {
            $(this).css('border','1px #b5b0b0c9 solid');
            if($(this).val().trim().length==0){
                $('.code_error').text('验证码不能为空').show();
                $(this).css('border','1px rgb(204, 12, 21) solid');
            }
        });

    </script>
    <script>
        //提交时检测
        function nick_check(select_str) {
            var re=true;
            var value=$(select_str).val().trim();
            if(value.length==0){
                $('.nick_name_error').text('昵称不能为空').show();
                $(select_str).css('border','1px rgb(204, 12, 21) solid');
                re=false;
            }else if((!/[a-zA-Z]+/.test(value))&&(!/[\u4e00-\u9fa5]+/.test(value))){
                $('.nick_name_error').text('昵称必须包含汉字或字母').show();
                $(select_str).css('border','1px rgb(204, 12, 21) solid');
                re=false;
            }
            return re;
        }
        function phone_check(select_str) {
            var re=true;
            var value=$(select_str).val().trim();
            if(value.length==0){
                $('.phone_error').text('电话号码不能为空').show();
                $(select_str).css('border','1px rgb(204, 12, 21) solid');
                re=false;
            }else if(!/^1[3578]\d{9}$/g.test(value)){
                $('.phone_error').text('电话号码不合法').show();
                $(select_str).css('border','1px rgb(204, 12, 21) solid');
                re=false;
            }
            return re;
        }
        function pwd_check(select_str) {
            var re=true;
            var value=$(select_str).val();
            if(value.length==0){
                $('.password_error').text('密码不能为空').show();
                $(select_str).css('border','1px rgb(204, 12, 21) solid');
                re=false;
            }else if(/\s+/.test(value)){
                $('.password_error').text('密码不能包含空格').show();
                $(select_str).css('border','1px rgb(204, 12, 21) solid');
                re=false;
            }else if(!/^.{8,16}$/.test(value)){
                $('.password_error').text('长度为8-16个字符').show();
                $(select_str).css('border','1px rgb(204, 12, 21) solid');
                re=false;
            }else if(/^[a-zA-Z]+$/.test(value)||/^\d+$/.test(value)||/^[/*+.\-~!@#$%^&?<>()]+$/.test(value)){
                $('.password_error').text('必须包含字母、数字、符号中至少2种').show();
                $(select_str).css('border','1px rgb(204, 12, 21) solid');
                re=false;
            }
            return re;
        }
        function code_check(select_str) {
            if($(select_str).val().trim().length==0){
                $('.code_error').text('验证码不能为空').show();
                $(select_str).css('border','1px rgb(204, 12, 21) solid');
                return false;
            }
            return true;
        }
        function register_check() {
            if(nick_check('.content .register input[name=nick_name]')&&phone_check('.content .register input[name=phone]')&&pwd_check('.content .register input[name=password]')&&code_check('.content .register input[name=code]')){
                return true;
            }else{
                return false;
            }
        }
    </script>
    <script>
        //登录
        $('#login_submit').click(function () {
            var phone=$('.login input[name=account]').val();
            var pwd=$('.login input[name=password]').val();
            $.get('/index/user/login?phone='+phone+'&pwd='+pwd,function (data,status) {
                var data=$.parseJSON(data);
                if(data.code==12){
                    $('#tips .modal-body').text(data.msg);
                    $('#tips').modal('toggle');
                }else{
                    location.href='/';
                }
            });
        });

        //获取短信验证码
        $('#msg_code_btn').click(function () {
            var phone=$('.content .register input[name=phone]').val();
            $.get('/index/user/get_msg_code?phone='+phone,function (data,status) {
                if(status){
                    $('#tips .modal-body').text(data);
                    $('#tips').modal('toggle');
                }
            });
        });

        //注册
        $('#register_submit').click(function () {
            if(!register_check()){
                return;
            }
            var nick_name=$('.content .register input[name=nick_name]').val();
            var phone=$('.content .register input[name=phone]').val();
            var password=$('.content .register input[name=password]').val();
            var code=$('.content .register input[name=code]').val();
            var data={
                nick_name:nick_name,
                phone:phone,
                password:password,
                code:code
            };
            $.post(main_host+'/index/user/register',data,function (data,status) {
               if(status){
                  var msg=$.parseJSON(data).msg;
                   $('#tips .modal-body').text(msg);
                   $('#tips').modal('toggle');
               } else {
                   $('#tips .modal-body').text('发生了未知错误');
                   $('#tips').modal('toggle');
               }
            });
        });
    </script>
</body>
</html>