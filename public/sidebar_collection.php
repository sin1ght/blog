<div class="sidebar_collection">
    <div class="title">
        <span style="color:cadetblue;font-size:18px;margin-left: 20px;">我的收藏</span>
        <button class="close_collection" style="float: right;">
            <i class="fa fa-angle-left fa-2x" style="font-weight: bold;color: cadetblue;"></i>
        </button>
        <span class="add_folder" style="float: right;margin-right: 10px;cursor: pointer;">添加文件夹</span>
    </div>
    <div class="content">
        <ul>
            <!--                <li class="folder">-->
            <!--                    <i class="fa fa-caret-right" style="color:#566263"></i>-->
            <!--                    <a href="#">-->
            <!--                        <i class="fa fa-folder" style="color:gray;"></i>-->
            <!--                        thinkphp-->
            <!--                    </a>-->
            <!--                    <ul>-->
            <!--                        <li class="folder">-->
            <!--                            <i class="fa fa-caret-right" style="color:#566263"></i>-->
            <!--                            <a href="#">-->
            <!--                                <i class="fa fa-folder" style="color:gray;"></i>-->
            <!--                                thinkphp-->
            <!--                            </a>-->
            <!--                        </li>-->
            <!--                        <li class="file">-->
            <!--                            <a href="#">-->
            <!--                                <i class="fa fa-file-text-o" style="color:gray;"></i>-->
            <!--                                css的13个好用的技巧分享-->
            <!--                            </a>-->
            <!--                        </li>-->
            <!--                        <li class="file">-->
            <!--                            <a href="#">-->
            <!--                                <i class="fa fa-file-text-o" style="color:gray;"></i>-->
            <!--                                javascript的13个好用的技巧分享-->
            <!--                            </a>-->
            <!--                        </li>-->
            <!--                    </ul>-->
            <!--                </li>-->
            <!--                <li class="file">-->
            <!--                    <a href="#">-->
            <!--                        <i class="fa fa-file-text-o" style="color:gray;"></i>-->
            <!--                        css的13个好用的技巧分享-->
            <!--                    </a>-->
            <!--                </li>-->
        </ul>
    </div>
</div>

<!--点击收藏模态框-->
<div class="dialog_collection">
    <div id="dialog_collection" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel">添加我的收藏</h4>
                </div>
                <div class="modal-body">
                    <div class="input-group">
                        <span class="input-group-addon">名称</span>
                        <input name="name" type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                    </div>
                    <input name="url" type="text" style="display: none;">
                    <div class="input-group" style="margin-top: 10px;">
                        <span class="input-group-addon">文件夹</span>
                        <select style="width:100%;height:34px;border: 1px #cccccc solid;border-radius: 0 5px 5px 0;">
                            <option value ="0">无</option>
<!--                            <option value ="volvo">Volvo</option>-->
<!--                            <option value ="saab">Saab</option>-->
<!--                            <option value="opel">Opel</option>-->
<!--                            <option value="audi">Audi</option>-->
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn collection_article_btn" data-dismiss="modal" style="background:cadetblue;color: white;">保存</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!--收藏栏右键菜单-->
<div class="collection_menu collection_menu_folder">
    <ul>
        <li class="add_folder">添加文件夹</li>
        <li class="delete_folder">删除文件夹</li>
        <li class="rename_folder">重命名文件夹</li>
        <li class="add_item">添加收藏</li>
    </ul>
</div>

<div class="collection_menu collection_menu_file">
    <ul>
        <li class="delete_file">删除收藏</li>
        <li class="rename_file">重命名收藏</li>
    </ul>
</div>

<!--菜单功能模态框-->
<div id="add_folder" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">添加文件夹</h4>
            </div>
            <div class="modal-body">
                <div class="input-group">
                    <span class="input-group-addon">名称</span>
                    <input name="name" type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                    <input name="is_folder" type="number" value="1" hidden>
                    <input name="level" type="number" hidden>
                    <input name="pre_id" type="number" hidden>
                    <input name="type" value="1" type="text" hidden>
<!--                    1为创建level 1文件夹 2不是-->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn collection_add_folder_btn" data-dismiss="modal" style="background:cadetblue;color: white;">保存</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            </div>
        </div>
    </div>
</div>
<div id="rename_folder" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">重命名文件夹</h4>
            </div>
            <div class="modal-body">
                <div class="input-group">
                    <span class="input-group-addon">名称</span>
                    <input name="name" type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                    <input type="text" name="id" hidden>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn collection__btn" data-dismiss="modal" style="background:cadetblue;color: white;">保存</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            </div>
        </div>
    </div>
</div>
<div id="add_item" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">添加收藏</h4>
            </div>
            <div class="modal-body">
                <div class="input-group">
                    <span class="input-group-addon">名称</span>
                    <input name="name" type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                </div>
                <div class="input-group" style="margin-top: 10px;">
                    <span class="input-group-addon">url</span>
                    <input name="url" type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                </div>
                <input name="level" type="number" hidden>
                <input name="pre_id" type="number" hidden>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn collection__btn" data-dismiss="modal" style="background:cadetblue;color: white;">保存</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            </div>
        </div>
    </div>
</div>
<div id="rename_file" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">重命名收藏</h4>
            </div>
            <div class="modal-body">
                <div class="input-group">
                    <span class="input-group-addon">名称</span>
                    <input name="name" type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                    <input type="text" name="id" hidden>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn collection__btn" data-dismiss="modal" style="background:cadetblue;color: white;">保存</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            </div>
        </div>
    </div>
</div>
<div id="delete" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel"><i class="fa fa-warning" style="color: red;margin-right: 5px;"></i>删除</h4>
            </div>
            <div class="modal-body">
                确定删除吗?(文件夹删除会将子文件全删除)
                <input type="text" name="id" hidden>
                <input type="text" name="type" hidden>
<!--                1 是文件夹 2是文件-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn collection__btn" data-dismiss="modal" style="background:cadetblue;color: white;">确定</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            </div>
        </div>
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
<!--添加文件夹-->
<script>
    $('#add_folder .collection_add_folder_btn').click(function () {
        var type=$('#add_folder .modal-dialog .modal-content .modal-body input[name=type]').val();
        var name=$('#add_folder .modal-dialog .modal-content .modal-body input[name=name]').val();
        if(parseInt(type)==1){
            var is_folder=1;
            var pre_id=0;
            var level=1;
        }else{
           //不是level 1 文件夹
            var is_folder=1;
            var pre_id=$('#add_folder .modal-body input[name=pre_id]').val();
            var level=$('#add_folder .modal-body input[name=level]').val();
        }
        var data={
            name:name,
            is_folder:is_folder,
            pre_id:pre_id,
            level:level
        };
        $.get('/index/user/add_collection',data,function(res,status){
            if(status){
                alert($.parseJSON(res).msg);
                window.location.reload();
            }
        });
    });
</script>
<!--添加文件-->
<script>
    $('#add_item .collection__btn').click(function () {
        var is_folder=0;
        var level=$('#add_item .modal-body input[name=level]').val();
        var pre_id=$('#add_item .modal-body input[name=pre_id]').val();
        var name=$('#add_item .modal-body input[name=name]').val();
        var url=$('#add_item .modal-body input[name=url]').val();
        var data={
            is_folder:is_folder,
            level:level,
            pre_id:pre_id,
            name:name,
            url:url
        };
        $.get('/index/user/add_collection',data,function(res,status){
            if(status){
                alert($.parseJSON(res).msg);
                window.location.reload();
            }
        });
    });
</script>
<!--重命名文件夹-->
<script>
    $('#rename_folder .collection__btn').click(function () {
        var id=$('#rename_folder .modal-body input[name=id]').val();
        var name=$('#rename_folder .modal-body input[name=name]').val();
        var op=1;
        var data={
            id:id,
            name:name,
            op:op
        };
        $.get("/index/user/collection_folder_action",data,function (res,status) {
            if(status){
                alert($.parseJSON(res).msg);
                window.location.reload();
            }
        });
    });
</script>
<!--删除文件夹/文件-->
<script>
    $('#delete .collection__btn').click(function () {
        var id=$('#delete .modal-body input[name=id]').val();
        var op=2;
        var data={
            id:id,
            op:op
        };
        var type=$('#delete .modal-body input[name=type]').val();
        if(type==1){
            //文件夹
            $.get("/index/user/collection_folder_action",data,function (res,status) {
                if(status){
                    alert($.parseJSON(res).msg);
                    window.location.reload();
                }
            });
        }else{
            $.get("/index/user/collection_file_action",data,function (res,status) {
                if(status){
                    alert($.parseJSON(res).msg);
                    window.location.reload();
                }
            });
        }
    });
</script>
<!--重命名文件-->
<script>
    $('#rename_file .collection__btn').click(function () {
        var id=$('#rename_file .modal-body input[name=id]').val();
        var name=$('#rename_file .modal-body input[name=name]').val();
        var op=1;
        var data={
            id:id,
            name:name,
            op:op
        };
        $.get("/index/user/collection_file_action",data,function (res,status) {
            if(status){
                alert($.parseJSON(res).msg);
                window.location.reload();
            }
        });
    });
</script>


<!--星星收藏文章-->
<script>
    $('#dialog_collection .collection_article_btn').click(function(){
        var name=$('#dialog_collection .modal-dialog .modal-content .modal-body input[name=name]').val();
        var url=$('#dialog_collection .modal-dialog .modal-content .modal-body input[name=url]').val();
        var is_folder=0;
        var folder=$('#dialog_collection select').val();
        var pre_id=null;
        var level=null;
        if(folder==0){
            pre_id=0;
            level=1;
        }else{
            pre_id=folder.split('#')[0];
            level=parseInt(folder.split('#')[1])+1;
        }
        var data={
            name:name,
            is_folder:is_folder,
            pre_id:pre_id,
            level:level,
            url:url
        };

        $.get('/index/user/add_collection',data,function(res,status){
            if(status){
                alert($.parseJSON(res).msg);
                window.location.reload();
            }
        });
    });
</script>
<!--获取收藏列表-->
<script>
    var items;
    $.get('/index/user/get_collection',function (data,status) {
        items=$.parseJSON(data).data;
        //点击星星收藏可选文件夹
        for(var i=0;i<items.length;i++){
            if(items[i].is_folder){
                $('#dialog_collection select').append('<option value="'+items[i].id+'#'+items[i].level+'">'+items[i].name+'</option>');
            }
        }
        var resulthmlt='';
        for(var j=0;j<items.length;j++){
            if(items[j].is_folder&&(items[j].level==1)){
                resulthmlt+='<li class="folder" data-id="'+items[j].id+'" data-count="0" data-has-children="'+items[j].has_children+'">\n' +
                    '                    <i class="fa fa-caret-right" style="color:#566263"></i>\n' +
                    '                    <a href="#" data-self="'+items[j].id+'#'+items[j].level+'">\n' +
                    '                        <i class="fa fa-folder" style="color:gray;"></i>\n' +
                    '                        '+items[j].name+'\n' +
                    '                    </a>' +
                    '</li>';
            }
        }
        for(var k=0;k<items.length;k++){
            if((!items[k].is_folder)&&(items[k].level==1)){
                resulthmlt+='<li class="file" data-id="'+items[k].id+'" data-count="0" data-has-children="'+items[k].has_children+'">\n' +
                    '                    <a href="'+items[k].url+'" data-self="'+items[k].id+'#'+items[k].level+'">\n' +
                    '                        <i class="fa fa-file-text-o" style="color:gray;"></i>\n' +
                    '                        '+items[k].name+'\n' +
                    '                    </a>\n' +
                    '                </li>';
            }
        }

        $('.sidebar_collection .content >ul').append(resulthmlt);
        $('.sidebar_collection .content .folder>a').click(folder_click_listener);

        $('.sidebar_collection .content .folder>a').bind('mousedown',folder_mousedown_listener);
        $('.sidebar_collection .content .file>a').bind('mousedown',file_mousedown_listener);
    });
</script>
<!--测试收藏数据-->
<script>
    //测试收藏
    /*var items=[
        {
            is_folder:true,
            name:'thinkphp',
            level:1,
            id:1,
            pre_id:0,
            has_children:1//1为有 0为无
        },
        {
            is_folder:false,
            name:'css的13个好用的技巧分享',
            level:1,
            id:2,
            pre_id:0,
            has_children:0//1为有 0为无
        },
        {
            is_folder:true,
            name:'java',
            level:1,
            id:3,
            pre_id:0,
            has_children:0//1为有 0为无
        },
        {
            is_folder:false,
            name:'html的13个好用的技巧分享',
            level:2,
            id:4,
            pre_id:1,
            has_children:0//1为有 0为无
        },
        {
            is_folder:false,
            name:'js的13个好用的技巧分享',
            level:2,
            id:5,
            pre_id:1,
            has_children:0//1为有 0为无
        },
        {
            is_folder:true,
            name:'python',
            level:2,
            id:6,
            pre_id:1,
            has_children:1//1为有 0为无
        },
        {
            is_folder:false,
            name:'python的13个好用的技巧分享',
            level:3,
            id:7,
            pre_id:6,
            has_children:0//1为有 0为无
        }
    ];*/
</script>

<!--文件夹点击事件-->
<script>
    //文件夹点击事件
    function folder_click_listener() {
        var i=$(this).parent().data('count');
        var has_children=$(this).parent().data('has-children');
        if(has_children){
            i++;
            $(this).parent().data('count',i);
            var id=$(this).parent().data('id');
            if(i==1){
                var resulthmlt='<ul>';
                for(var j=0;j<items.length;j++){
                    if(items[j].is_folder&&(items[j].pre_id==id)){
                        resulthmlt+='<li class="folder" data-id="'+items[j].id+'" data-count="0" data-has-children="'+items[j].has_children+'">\n' +
                            '                    <i class="fa fa-caret-right" style="color:#566263"></i>\n' +
                            '                    <a href="#" data-self="'+items[j].id+'#'+items[j].level+'">\n' +
                            '                        <i class="fa fa-folder" style="color:gray;"></i>\n' +
                            '                        '+items[j].name+'\n' +
                            '                    </a>' +
                            '</li>';
                    }
                }
                for(var k=0;k<items.length;k++){
                    if((!items[k].is_folder)&&(items[k].pre_id==id)){
                        resulthmlt+='<li class="file" data-id="'+items[k].id+'" data-count="0" data-has-children="'+items[k].has_children+'">\n' +
                            '                    <a href="'+items[k].url+'" data-self="'+items[k].id+'#'+items[k].level+'">\n' +
                            '                        <i class="fa fa-file-text-o" style="color:gray;"></i>\n' +
                            '                        '+items[k].name+'\n' +
                            '                    </a>\n' +
                            '                </li>';
                    }
                }
                $(this).parent().append(resulthmlt+'</ul>');
                $(this).parent().children('ul').find('.folder>a').click(folder_click_listener);
                $('.sidebar_collection .content .folder>a').unbind('mousedown',folder_mousedown_listener);
                $('.sidebar_collection .content .folder>a').bind('mousedown',folder_mousedown_listener);
                $('.sidebar_collection .content .file>a').unbind('mousedown',file_mousedown_listener);
                $('.sidebar_collection .content .file>a').bind('mousedown',file_mousedown_listener);
                $(this).parent().children('i').removeClass('fa-caret-right');
                $(this).parent().children('i').addClass('fa-caret-down');
            }else if(i%2==1){
                //打开
                $(this).parent().children('ul').show();
                $(this).parent().children('i').removeClass('fa-caret-right');
                $(this).parent().children('i').addClass('fa-caret-down');
            }else if(i%2==0){
                //关闭
                $(this).parent().children('ul').hide();
                $(this).parent().children('i').removeClass('fa-caret-down');
                $(this).parent().children('i').addClass('fa-caret-right');
            }
        }
    }
</script>
<!--右键菜单-->
<script>
    var default_right_menu=document.oncontextmenu;
    //文件夹/文件右键菜单
    function folder_mousedown_listener(e){
        document.oncontextmenu=prevent_right_menu;
        if(e.button==2){
            $('.collection_menu_file').hide();
            $('.collection_menu_folder').css({
                'top':e.clientY+'px',
                'left':e.clientX+'px'
            });
            $('.collection_menu_folder').show();
            //将信息传递到功能模态框
            var data_self=$(this).attr('data-self');
            var id=data_self.split('#')[0];
            var level=parseInt(data_self.split('#')[1])+1;
            $('#add_folder .modal-body input[name=type]').val('2');
            $('#add_folder .modal-body input[name=level]').val(level);
            $('#add_folder .modal-body input[name=pre_id]').val(id);
            $('#rename_folder .modal-body input[name=id]').val(id);
            $('#add_item .modal-body input[name=level]').val(level);
            $('#add_item .modal-body input[name=pre_id]').val(id);
            $('#rename_file .modal-body input[name=id]').val(id);
            $('#delete .modal-body input[name=id]').val(id);
            $('#delete .modal-body input[name=type]').val('1');
        }
    }

    function file_mousedown_listener(e) {
        document.oncontextmenu=prevent_right_menu;
        if(e.button==2){
            $('.collection_menu_folder').hide();
            $('.collection_menu_file').css({
                'top':e.clientY+'px',
                'left':e.clientX+'px'
            });
            $('.collection_menu_file').show();
            //将信息传递到功能模态框
            var data_self=$(this).attr('data-self');
            var id=data_self.split('#')[0];
            var level=parseInt(data_self.split('#')[1])+1;
            $('#add_folder .modal-body input[name=level]').val(level);
            $('#add_folder .modal-body input[name=pre_id]').val(id);
            $('#rename_folder .modal-body input[name=id]').val(id);
            $('#add_item .modal-body input[name=level]').val(level);
            $('#add_item .modal-body input[name=pre_id]').val(id);
            $('#rename_file .modal-body input[name=id]').val(id);
            $('#delete .modal-body input[name=id]').val(id);
            $('#delete .modal-body input[name=type]').val('2');
        }
    }
    //禁止浏览器默认右键菜单
    function prevent_right_menu(event) {
        // event.cancelBubble = true;
        event.returnValue = false;
        return false;
    }


    //左键取消菜单
    $('.sidebar_collection').mousedown(function (e) {
        if(e.button==0) {//鼠标左键
            $('.collection_menu_folder').hide();
            $('.collection_menu_file').hide();
            document.oncontextmenu = default_right_menu;
        }
    });
</script>
<!--菜单功能模态框弹出-->
<script>
    $('.sidebar_collection .title .add_folder').click(function () {
        $('#add_folder').modal('show');
    });

    $('.collection_menu_folder .add_folder').click(function () {
        $('.collection_menu_folder').hide();
        document.oncontextmenu=default_right_menu;
        $('#add_folder').modal('show');
    });

    $('.collection_menu_folder .delete_folder').click(function () {
        $('.collection_menu_folder').hide();
        document.oncontextmenu=default_right_menu;
        $('#delete').modal('show');
    });

    $('.collection_menu_folder .rename_folder').click(function () {
        $('.collection_menu_folder').hide();
        document.oncontextmenu=default_right_menu;
        $('#rename_folder').modal('show');
    });

    $('.collection_menu_folder .add_item').click(function () {
        $('.collection_menu_folder').hide();
        document.oncontextmenu=default_right_menu;
        $('#add_item').modal('show');
    });

    $('.collection_menu_file .rename_file').click(function () {
        $('.collection_menu_file').hide();
        document.oncontextmenu=default_right_menu;
        $('#rename_file').modal('show');
    });

    $('.collection_menu_file .delete_file').click(function () {
        $('.collection_menu_file').hide();
        document.oncontextmenu=default_right_menu;
        $('#delete').modal('show');
    });
</script>
