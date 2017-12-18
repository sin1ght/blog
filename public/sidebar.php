<div class="tags">
    <p class="title">标签</p>
    <div class="content">
<!--        <div class="tag">-->
<!--            <span class="triangle"></span>-->
<!--            <span class="info"></span>-->
<!--        </div>-->
    </div>
</div>

<div class="animal">
    <p class="title">萌宠<span style="font-size: 12px;color: gray">(可以点击投食哦~)</span></p>
    <div class="content">

    </div>
</div>

<div class="friend_link">
    <p class="title">友情链接</p>
    <div class="content" style="text-align: center;">
        <div>
            <i class="fa fa-link"></i>
            <a href="#">csdn</a>
        </div>
        <div>
            <i class="fa fa-link"></i>
            <a href="#">稀土掘金</a>
        </div>
        <div>
            <i class="fa fa-link"></i>
            <a href="#">SegmentFault</a>
        </div>
        <div>
            <i class="fa fa-link"></i>
            <a href="#">伯乐在线</a>
        </div>
        <div>
            <i class="fa fa-link"></i>
            <a href="#">郭林的博客</a>
        </div>
        <div>
            <i class="fa fa-link"></i>
            <a href="#">鸿洋的博客</a>
        </div>
    </div>
</div>

<!--给友情链接随机添加颜色-->
<script>
    //给友情链接随机添加颜色
    var colors=[
        'rgb(52, 152, 219)','rgb(230, 76, 59)','rgb(240, 196, 15)','rgb(255, 127, 0)','rgb(68, 157, 68)',
        '#77fffa','rgba(154, 97, 134)','rgba(226, 133, 154)','rgba(207, 133, 226)',
        'rgb(100, 173, 181)','rgba(210, 165, 99)','rgb(210, 109, 99)','#61B3E6','#D9534F','#F60','#00ABA9'
    ];
    $('#sidebar .friend_link a').each(function () {
        var i=Math.round(Math.random()*colors.length);
        $(this).css('color',colors[i]);
    });

</script>

<!--添加标签-->
<script>
    //添加标签
    var tags=['java','php','python','thinkphp','flask','android','android逆向','web安全','安全工具','html','css','js','jquery'];
    for(var i=0;i<tags.length;i++){
        var color=colors[Math.round(Math.random()*colors.length)];
        $('#sidebar .tags .content').append('<div class="tag">\n' +
            '            <span class="triangle" style="border-right:12px '+color+' solid;"></span>\n' +
            '            <span class="info" style="background:'+color+';">'+tags[i]+'</span>\n' +
            '        </div>');
    }
</script>