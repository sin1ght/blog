<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="小楼资讯，登录">
    <meta name="description" content="小楼资讯登录页面">
    <title>重置密码--小楼资讯</title>
    <script src="static/js/jquery.js"></script>
    <script type="application/javascript" src="./static/js/config.js"></script>
    <link type="text/css" rel="stylesheet" href="static/css/reset_pwd.css"/>
    <link type="text/css" rel="stylesheet" href="static/css/bootstrap.min.css">
</head>
<body>
    <div class="nav_t">
        <ul>
            <li class="active">
                <div>
                    <i>1</i>
                    <p>填写帐号</p>
                </div>
                <i></i>
            </li>
            <li>
                <div>
                    <i>2</i>
                    <p>身份验证</p>
                </div>
                <i></i>
            </li>
            <li>
                <div>
                    <i>3</i>
                    <p>设置新密码</p>
                </div>
                <i></i>
            </li>
            <li>
                <div>
                    <i>4</i>
                    <p>完成</p>
                </div>
            </li>
        </ul>
        <div style="clear: both;"></div>
    </div>
    <div class="content">
        <div class="container">
            <form action="#" class="step1" style="display: block;">
                <div class="form-group">
                    <label for="account">账号</label>
                    <input type="text" class="form-control"  placeholder="账号" name="account" id="account">
                </div>
                <div class="form-group">
                    <input type="text" name="code" class="form-control" placeholder="验证码" style="width:123px;float: left;margin-right: 35px;">
                    <img src="http://www.sjfqtour.com/Web/Account/Captcha" style="float: left;">
                </div>
                <div style="clear: both;"></div>
                <button class="btn btn-default" style="background: cadetblue;color:white;margin-top: 10px;">确认</button>
            </form>
            <form action="#" class="step2" style="display: none;">
                <div class="form-group">
                    <p>请输入您绑定的手机号:</p>
                    <p class="hided_phone" style="color:#a5a5a5;font-size: 18px;">177********</p>
                    <input type="text" class="form-control"  placeholder="完整号码" name="phone_num">
                </div>
                <button class="btn btn-default" style="background: cadetblue;color:white;">确认</button>
            </form>

            <form action="#"  class="step3" style="display: none;">
                <div class="form-group">
                    <label for="pwd">请设置新密码: </label>
                    <input type="password" class="form-control"  name="pwd" id="pwd">
                </div>
                <div class="form-group">
                    <label for="new_pwd">再次输入新密码：</label>
                    <input type="text" class="form-control"   name="new_pwd" id="new_pwd">
                </div>
                <button class="btn btn-default" style="background: cadetblue;color:white;">确认</button>
            </form>

            <div class="step4" style="display: none;">
                <div class="completed_pic">
                </div>
                <p class="completed_text">重置密码成功</p>
            </div>
            </div>
        </div>
    </div>

</body>
</html>