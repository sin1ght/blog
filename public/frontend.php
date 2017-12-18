<!DOCTYPE html>
<html lang="en">
<head>
    <title>前端--小楼资讯</title>
    <?php require './header.php'?>
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
        $('#nav .left li').eq(1).addClass('active');
    </script>
    <div id="main">
        <div id="content">
            <?php require 'content.php'?>
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

    <div class="relative_path" data-path="/index/article/frontend" style="display: none"></div>

</body>
    <script src="static/js/custom.js"></script>
    <script>
        var path=$('.relative_path').data('path');
        var url=main_host+path;
        get_articles(url);
    </script>
</html>
