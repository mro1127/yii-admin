if (typeof jQuery === "undefined") {
    throw new Error("TAB requires jQuery");
}
function getIndex() {
    var index = -1,
    code = Math.random();
    $("body").attr("code", code);
    $(window.parent.document).find("iframe").each(function(i){
        var frameCode=$(this.contentWindow.document).find("body").attr("code");
        if (frameCode == code) {
            index = i;
            return false;
        }
    });
    if (index == -1) return false;
    return index;
}

function initTab() {
    var options = {
        horizontal: 1,
        itemNav: 'basic',
        speed: 50,
        // mouseDragging: 1,
        // touchDragging: 1,
        smart: 1,
        elasticBounds   : true,
        prevPage: $('.backward'),
        nextPage: $('.forward')

    };

    var slyTab = new Sly('.sly-frame', options).init();
    $(window).resize(function() {   
        slyTab.reload();
        resetSlyW();
    });

    //sly会用round取一个接近的width，但是小于0.5px的宽度被舍弃之后，会出现ul宽度小于全部li总和，导致最后一个li不显示
    function resetSlyW() {
        var w = 0;
        $('.sly-frame').find('li').each(function() {
            w += $(this).width();
        });
        $('.sly-frame').find('ul').width(Math.ceil(w));
    }

    $.TAB = {
        // 配置
        param:{
            tabs: new Array(),
        },
        index: 0,
        template : $('<li><a><span><i class="fa-lg tab-icon"></i></span><i class="fa fa-times-circle tab-close"></i></a></li>'),
        add : function(url, name, icon, bind){
            var $this = this,
                index = this.index;
            // tab的html
            var tab = this.template.clone();
            $(tab).find('span').append(name);
            $(tab).find('.tab-icon').addClass(icon).attr('icon',icon);
            $(tab).attr({ index: index, url: url, bind: bind });

            // tab的绑定事件
            $(tab).click(function() {
                $this.change(index);
            });
            if (bind === 1) {
                $(tab).find('.tab-close').remove();
            }else{
                $(tab).find('.tab-close').click(function() {
                    $this.close(index);
                });
            }
            slyTab.add($(tab));
            slyTab.toEnd();
            resetSlyW();

            // iframe
            var iframe = $('<iframe></iframe>')
            $(iframe).attr({ src: url, link: url, index: index, id: 'iframe_'+index });
            $('.content-iframe').append($(iframe));
            this.change(index);
            this.loading(index);

            this.index ++;
        },
        // 打开一个标签，有则显示无则添加
        open : function(url, name, icon, bind){
            var index = $('.sly-frame').find("li[url='"+url+"']").attr('index');
            if (index) {
                this.change(index);
            }else{
                this.add(url, name, icon, bind);
            }
        },
        // 关闭一个标签
        close : function(index) {
            var $li = $('.sly-frame').find("li[index="+index+"]");
            if($li.attr('bind') == '1')
                return false;
            if ($li.hasClass('active')){
                var prev = $('.sly-frame').find("li[index="+index+"]").prev('li').attr('index');
                this.change(prev);
            }
            $li.remove();
            $('.content-iframe').find("iframe[index="+index+"]").remove();
            slyTab.reload();
            resetSlyW();
        },
        // 切换到某个标签
        change :function(index) {
            $('.sly-frame').find('.active').removeClass('active');
            $('.sly-frame').find("li[index="+index+"]").addClass('active').removeClass('tab-warn');
            $('.content-iframe').find("iframe").hide();
            $('.content-iframe').find("iframe[index="+index+"]").show();
        },
        // 关闭全部可关闭的标签
        closeAll : function() {
            var $this = this;
            $('.sly-frame').find("li").each(function() {
                if ($(this).attr('bind') != '1') {
                    var index = $(this).attr('index');
                    $this.close(index);
                }
            });
        },
        // 关闭其他标签
        closeOther : function() {
            var $this = this,
                choose = $('.sly-frame').find("li.active").attr('index');
            $('.sly-frame').find("li").each(function() {
                if ($(this).attr('bind') != '1' && $(this).attr('index') != choose) {
                    var index = $(this).attr('index');
                    $this.close(index);
                }
            });
        },
        // 刷新tab
        refresh : function(index) {
            var i = $('.content-iframe').find("iframe[index="+index+"]");
            i.attr('src', i.contents()[0].URL);
            this.loading(index);
        },

        // 提醒高亮tab
        warn : function(index, url) {
            $('.sly-frame').find("li[index="+index+"]").addClass('tab-warn');
        },

        // iframe加载时，图标loading
        loading : function(index){
            var icon = $('.sly-frame').find("li[index="+index+"]").find('.tab-icon'),
                icon_class= icon.attr('icon');
            icon.attr('class', 'tab-icon fa fa-spinner fa-spin');
            $('.content-iframe').find("iframe[index="+index+"]").one("load",function(){
                icon.attr('class', icon_class).addClass('tab-icon');
                resetSlyW();
            });
        },

    }

    // 打开tab，有则显示无则添加
    $('.open-tab').click(function() {
        var icon = $(this).attr('icon'),
            bind = $(this).attr('bind'),
            link = $(this).attr('link'),
            title= $(this).attr('title');
        $.TAB.open(link, title, icon, bind);
        return false;
    })

    // 打开tab，一定为新增页面
    $('.add-tab').click(function() {
        var icon = $(this).attr('icon'),
            bind = $(this).attr('bind'),
            link = $(this).attr('link'),
            title= $(this).attr('title');
        $.TAB.add(link, title, icon, bind);
        return false;
    })

    // 关闭所有tab
    $('.close-all-tab').click(function() {
        $.TAB.closeAll();
        return false;
    })
    // 关闭没选中的tab
    $('.close-other-tab').click(function() {
        $.TAB.closeOther();
        return false;
    })


    // 回到菜单原始页面
    $('.tab-back-all').click(function() {
        var choose = $('.sly-frame').find("li.active").attr('index');
        var i = $('.content-iframe').find("iframe[index="+choose+"]");
        i.attr('src', i.attr('link'));
    })

    // 指定iframe前进后退功能无法实现，以下实现效果与浏览器前进后退功能一样
    // 后退
    $('.tab-back').click(function() {
        var choose = $('.sly-frame').find("li.active").attr('index');
        $('.content-iframe').find("iframe[index="+choose+"]")[0].contentWindow.history.back();
    })
    // 前进
    $('.tab-forward').click(function() {
        var choose = $('.sly-frame').find("li.active").attr('index');
        $('.content-iframe').find("iframe[index="+choose+"]")[0].contentWindow.history.forward();
    })

    // 刷新
    $('.tab-refresh').click(function() {
        $('.sly-frame').find("li.active").dblclick();
    })

    // 信息
    $('.tab-info').click(function() {
        var li = $('.sly-frame').find("li.active"),
            index = li.attr('index'),
            title = li.find('span').html(),
            url = li.attr('url'),
            src = $('.content-iframe').find("iframe[index="+index+"]").contents()[0].URL;
        var html = '<table class="table table-bordered mr-b-0"><tr><th width="75">标题</th><td>'+title+'</td></tr><tr><th>原始地址</th><td>'+url+'</td></tr><tr><th>当前地址</th><td>'+src+'</td></tr></table>';
        layer.open({
            title: '页面信息',
            type: 1,
            shadeClose: 1,
            skin: 'layui-layer-rim', //加上边框
            area: ['420px', '220px'], //宽高
            content: html
        });
    })

    // 新增窗口
    $('.tab-new').click(function() {
        layer.prompt({title: '请输入打开的页面链接', formType: 2}, function(url, index){
            $.TAB.add(url, '新增页面', 'fa fa-plus', 0);
            layer.close(index);
        });
    })

    // 刷新一个tab
    $(document).on('dblclick','.sly-frame > ul > li',function() {
        var index = $(this).attr('index');
        $.TAB.refresh(index);
    })

    // 以窗口模式打开tab
    $('.open-with-window').click(function() {
        var li = $('.sly-frame').find("li.active"),
            index = li.attr('index'),
            src = $('.content-iframe').find("iframe[index="+index+"]").contents()[0].URL,
            title = $('.content-iframe').find("iframe[index="+index+"]").contents()[0].title;

        layer.open({
            shade: 0.5,
            type: 2,
            title: title,
            shadeClose: 0,
            maxmin: 1,
            area: ["80%", "80%"],
            content: src,
            zIndex: layer.zIndex,
            success: function(layero){
                layer.setTop(layero);
            }
        });
        console.log(title)
    })

    $('.open-with-window-infinite').click(function() {
        var li = $('.sly-frame').find("li.active"),
            index = li.attr('index'),
            src = $('.content-iframe').find("iframe[index="+index+"]").contents()[0].URL,
            title = $('.content-iframe').find("iframe[index="+index+"]").contents()[0].title;

        layer.open({
            shade: 0,
            type: 2,
            title: title,
            maxmin: 1,
            area: ["60%", "60%"],
            content: src,
            zIndex: layer.zIndex,
            success: function(layero){
                layer.setTop(layero);
            }
        });
    })

}

$(function() {

    if (parent.$.TAB) {
        // 子页面打开tab，有则显示无则添加
        $(document).on('click','.open-tab-c',function() {
            var icon = $(this).attr('icon'),
                bind = $(this).attr('bind'),
                link = $(this).attr('link'),
                title= $(this).attr('title');
            parent.$.TAB.open(link, title, icon, bind);
            return false;
        });

        // 子页面打开tab，一定为新增页面
        $(document).on('click','.add-tab-c',function() {
            var icon = $(this).attr('icon'),
                bind = $(this).attr('bind'),
                link = $(this).attr('link'),
                title= $(this).attr('title');
            parent.$.TAB.add(link, title, icon, bind);
            return false;
        });

        // 关闭当前tab
        $(document).on('click','.close-self-tab',function() {
            var index = getIndex();
            parent.$.TAB.close(parent.$('.sly-frame').find("li").eq(index).attr('index'));
        });
        // 
        $(document).on('click','.warn-self-tab',function() {
            var index = getIndex();
            parent.$.TAB.warn(parent.$('.sly-frame').find("li").eq(index).attr('index'));
        });
    }

    $(document).on('click', '.yii-debug-toolbar__title', function() {
        var icon = 'fa fa-bug',
            bind = 0,
            link = $(this).find('a').attr('href'),
            title= 'Yii-debug';
        if ($.TAB) {
            $.TAB.open(link, title, icon, bind);
            return false;
        }else if(parent.$.TAB){
            parent.$.TAB.open(link, title, icon, bind);
            return false;
        }
            return false;
    });

})