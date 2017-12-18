<!DOCTYPE html>
<html lang="en">
<head>
    <title>文章--小楼资讯</title>
    <?php require './header.php'?>
    <script src="/su/lib/ueditor/1.4.3/ueditor.parse.js"></script>
</head>
<body>
<div id="nav">
    <?php require './nav.php'?>
</div>
<div id="main">
    <div id="content">
       <div class="article">
           <p class="title">这是一个测试标题</p>
           <div class="content" style="padding:10px;"></div>
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

</body>
<script src="static/js/custom.js"></script>

<!-- 获取文章 -->
<script>
  function GetQueryString(name)
  {
     var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
     var r = window.location.search.substr(1).match(reg);
     if(r!=null)return  unescape(r[2]); return null;
  }

  var id=GetQueryString('id');
  $.getJSON('/admin/article/get_article_with_content?id='+id,function(data,status){
    var item=$.parseJSON(data).data;
    $('#content .article .title').text(item.title);
    $('#content .article .content').html(item.content);
    uParse('#content .article .content', {
      rootPath: '/su/lib/ueditor/1.4.3/'
    });
  });

</script>
</html>
