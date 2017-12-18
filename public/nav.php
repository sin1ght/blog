<div class="left">
    <ul>
        <li>
            <img src="static/img/logo.png" />
        </li>
        <li><a href="frontend.php">前端</a></li>
        <li><a href="#">后端</a></li>
        <li><a href="#">移动开发</a></li>
        <li class="nav_yc">
            原创<i class="fa fa-sort-down" style="color: white;margin-left: 5px;transition-duration:0.8s"></i>
        </li>
    </ul>
    <div style="clear: both"></div>
</div>
<div class="right">
    <ul>
        <?php session_start();if(isset($_SESSION['phone']) and isset($_SESSION['login'])){?>
        <li><a href="#" id="sidebar_collection_btn">我的收藏</a></li>
        <?php }else{?>
        <li><a href="login.php">注册</a></li>
        <li><a href="login.php">登录</a></li>
        <?php }?>
        <li class="search">
            <div>
                <input type="text" size="15" placeholder="搜点什么吧,客官">
                <span>
                    <img  src="static/img/search.png" style="float: right"/>
                </span>
            </div>
            <div style="clear: both"></div>
        </li>
    </ul>
    <div style="clear: both"></div>
</div>
<div style="clear: both;"></div>
<div class="yc_items">
    <ul>
        <li><a href="#">前端<span>(0)</span></a></li>
        <li><a href="yc_backend.php">后端<span>(0)</span></a></li>
        <li><a href="#">android<span>(0)</span></a></li>
        <li><a href="#">教程<span>(0)</span></a></li>
    </ul>
</div>

<!--导航栏 下拉菜单-->
<script>
    //导航栏 下拉菜单
    function dropDownW() {
        var i=0;
        function dropDown() {
            $('#nav .nav_yc').click(function () {
                i++;
                $('#nav .yc_items').slideToggle('slow');
                $('#nav .nav_yc i').css('transform','rotate('+(180*i)+'deg)');
            });
        }
        return dropDown
    }
    dropDownW()();
</script>