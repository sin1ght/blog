<!DOCTYPE html>
<html lang="en">
<head>
    <title>原创后端--小楼资讯</title>
    <?php require './header.php'?>
    <link rel="stylesheet" type="text/css" href="static/css/yc.css">
</head>
<body>
<div id="nav">
    <?php require './nav.php'?>
</div>
<script>
    $('#nav .left li').each(function () {
       $(this).hasClass('active');
       $(this).removeClass('active');
    });
    $('#nav .left li').eq(4).addClass('active');
</script>
<div id="main">
    <div id="content">
        <div class="article">
            <p>站长君的原创文章</p>
            <!-- <div class="item">
                <div class="left">
                    <img src="static/img/test.jpg">
                </div>
                <div class="right">
                    <div class="title">
                        <a>这是一个测试标题这是一个测试标题这是一个测试标题这是一个测试标题这是一个测试标题这是一个测试标题</a>
                    </div>
                    <div class="intro">
                        这是测试简介这是测试简介这是测试简介这是测试简介这是测试简介
                        这是测试简介这是测试简介这是测试简介这是测试简介这是测试简介这是测试简介
                        这是测试简介这是测试简介这是测试简介这是测试简介
                        这是测试简介这是测试简介这是测试简介这是测试简介这是测试简介
                    </div>
                    <div class="other_info">
                        <div class="time"><i class="fa fa-clock-o" style="margin-right: 5px;"></i>2017-12-18</div>
                        <div class="collection">
                            <i class="fa fa-eye"></i>
                            <span>1258</span>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <div id="sidebar">
        <?php require 'sidebar.php'?>
    </div>
    <div style="clear: both"></div>
</div>
<div id="footer">
    <?php require 'footer.php'?>
</div>
<!--    收藏栏-->
<?php
    //session_start();
    if(isset($_SESSION['phone']) and isset($_SESSION['login'])){
        require 'sidebar_collection.php';
    }
?>


<div class="relative_path" data-path="xxxx" style="display: none"></div>
</body>
<script src="static/js/custom.js"></script>

<!-- 获取文章列表 -->
<script>
    $.getJSON('/admin/article/get_article_with_intro?type=1',function(data,status){
      var items=$.parseJSON(data).data;
      for(var i=0;i<items.length;i++){
        var item=items[i];
        $('#content .article').append('<div class="item"><div class="left"><img src="'+item.thumbnail+'"></div><div class="right"><div class="title"><a href="./article.php?id='+item.id+'">'+item.title+'</a></div><div class="intro">'+item.intro+'</div><div class="other_info"><div class="time"><i class="fa fa-clock-o" style="margin-right: 5px;"></i>'+item.time+'</div><div class="collection"><i class="fa fa-eye" style="margin-right:10px;"></i><span>'+item.visit_count+'</span></div></div></div></div>');
      }
    });
</script>
</html>
