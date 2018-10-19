//将百分比高度换算成具体数值
$('html,body').css('height',document.body.clientHeight+'px');
// var nav_height=Math.floor(0.09*document.body.clientHeight);
// $('#nav').css('height',nav_height+'px');
// var footer_height=Math.floor(0.1*document.body.clientHeight);
// $('#footer').css('height',footer_height+'px');


//设置中间区域最小高度
var mianMinHeight=Math.floor(document.body.clientHeight*0.81);
$('#main').css('minHeight',mianMinHeight+'px');



//收藏栏的打开与关闭
$('#sidebar_collection_btn').click(function () {
    //打开
    $('html').css({
        'animation':'open_html 0.5s 1 forwards',
        '-webkit-animation':'open_html 0.5s 1 forwards',
        '-moz-animation':'open_html 0.5s 1 forwards'
    });
    $('.sidebar_collection').css({
        'animation':'open_collection 0.5s 1 forwards',
        '-webkit-animation':'open_collection 0.5s 1 forwards',
        '-moz-animation':'open_collection 0.5s 1 forwards'
    });
});

$('.sidebar_collection .title button.close_collection').click(function () {
    //关闭
    $('html').css({
        'animation':'close_html 0.5s 1 forwards',
        '-webkit-animation':'close_html 0.5s 1 forwards',
        '-moz-animation':'close_html 0.5s 1 forwards'
    });
    $('.sidebar_collection').css({
        'animation':'close_collection 0.5s 1 forwards',
        '-webkit-animation':'close_collection 0.5s 1 forwards',
        '-moz-animation':'close_collection 0.5s 1 forwards'
    });
});


//图片获取不到，获取默认图片
function get_default_pic(e) {
    var src=main_host+'/static/img/default_avatar.png';
    $(e).attr('src',src);
}

//加载文章
//显示loading
function show_loading() {
    $('#content .article .loading').show();
}

function hide_loading() {
    $('#content .article .loading').hide();
}

//点击星星收藏
function star_click_listener() {
    var name=$(this).parent().parent().find('.article_info .title a').text();
    var url=$(this).parent().parent().find('.article_info .title a').attr('href');
    $('#dialog_collection .modal-dialog .modal-content .modal-body input[name=name]').val(name);
    $('#dialog_collection .modal-dialog .modal-content .modal-body input[name=url]').val(url);
    $('#dialog_collection').modal('toggle');
}


//获取文章列表
function get_articles(url) {
    show_loading();
    $.get(url,function (data,status) {
        hide_loading();
        if(status){
            var articles=$.parseJSON(data).data;
            var ids=$.parseJSON(data).id;
            var resultHtml='';
            if(articles.length>0){
                for(var i=0;i<articles.length;i++){
                    var item=articles[i];
                    resultHtml+='<div class="article_item" data-id="'+ids[i]+'">\n' +
                        '        <div class="user_info">\n' +
                        '            <a href="'+item.author_url+'">\n' +
                        '                <img src="'+item.avatar_url+'" onerror="get_default_pic(this)"/>\n' +
                        '            </a>\n' +
                        '        </div>\n' +
                        '        <div class="article_info">\n' +
                        '            <p class="title">\n' +
                        '                <a href="'+item.link+'">'+item.title+'</a>\n' +
                        '            </p>\n' +
                        '            <p class="time"><span>时间:</span>&nbsp;&nbsp;'+item.time+'</p>\n' +
                        '        </div>\n' +
                        '        <div class="collection">\n' +
                        '            <i class="fa fa-star fa-2x"></i>\n' +
                        '        </div>\n' +
                        '    </div>';
                }
                $('#content .article .loading').before(resultHtml);
                $(window).bind('scroll',get_more);
            }else{
                $('#content .article .no_more').show();
                setTimeout(function () {
                    $('#content .article .no_more').hide();
                },10*1000);
                setTimeout(function () {
                    $(window).bind('scroll',get_more);
                },1000*60);
            }
            //点击星星收藏
            $('#content .article .article_item .collection i').unbind('click',star_click_listener);
            $('#content .article .article_item .collection i').bind('click',star_click_listener);
        }else{
            alert('服务器发什么了不知名错误~');
        }
    });
}

//滑倒底部，加载更多
function  get_more(){
    var scrolltop=Math.max(document.body.scrollTop,document.documentElement.scrollTop);
    if(scrolltop==document.body.scrollHeight-document.body.clientHeight){
        $(window).unbind('scroll',get_more);
        var id=$('#content .article .article_item').last().data('id');
        var url=main_host+$('.relative_path').data('path')+'?from='+id;
        get_articles(url);
    }
}


//添加宠物挂件  耗时放在最后
/*$('#sidebar .animal .content').append('<object type="application/x-shockwave-flash" style="outline:none;" data="http://cdn.abowman.com/widgets/hamster/hamster.swf?" width="100%" height="100%">\n' +
    '            <param name="movie" value="http://cdn.abowman.com/widgets/hamster/hamster.swf?"/>\n' +
    '            <param name="AllowScriptAccess" value="always"/>\n' +
    '            <param name="wmode" value="opaque"/>\n' +
    '        </object>');*/
