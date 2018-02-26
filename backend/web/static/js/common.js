
/**
 * 初始化ajax提交方法
 * @param  {string}   btn      提交按钮的jq选择器，默认 .common-ajax-submit ， 按钮必须放在form内
 * @param  {function} callback 回调方法，不传则一秒后跳转到data.url，data.url也没有则不处理
 * @param  {function} validate 自定义验证方法，返回fasle则中断提交
 */
function initSubmit(btn, callback, validate) {
    $(btn).click(function () {
        $this = $(this);
        $form = $(this).parents('form');
        if (validate) {
            var pass = validate();
            if (!pass) return false;
        }else{
            if (!$form.valid()) return false;   // 默认 JQueryValidation  
        }

        loading($this);
        var data = {};
        var token = $('meta[name="csrf-token"]').attr('content');
        if (token) {
            var token_name = $('meta[name="csrf-param"]').attr('content');
            data[token_name] = token;
        }

        $form.ajaxSubmit({
            dataType: 'json',
            data: data,
            success: function (data, textStatus, errorThrown, form) {
                if (data.status == 1) {
                        layer.msg(data.info, {icon: 1});
                } else {
                    layer.msg(data.info, {icon: 2});    
                    stopLoading($this);
                }
                if (callback) {
                    callback(data);
                } else if (data.url) {
                    setTimeout(function () {
                       window.location.href = data.url;
                    }, 1000)
                }
            },
            error: function (data, textStatus, errorThrown, form) {
                layer.msg("系统错误：" + errorThrown, {icon: 2});
                    stopLoading($this);
                
            }
        })
        return false;
    })
}

/**
 * 初始化ajax提交方法，适用于弹窗，成功提示之后，会关闭弹窗，并刷新父页面的boostrap-table
 * @param  {string} btn 提交按钮的jq选择器，默认 .common-ajax-submit ， 按钮必须放在form内
 */
function initSubmitWinTable(btn) {
    if (!btn || btn == '')
        btn = '.ajax-submit';
    initSubmit(btn, function (data) {
        if (data.status == 1) {
            setTimeout(function () {
                parent.$('table').bootstrapTable('refresh', {silent: true});
                closeWin();
            }, 1000)
        }
    });
}

/**
 * 初始化ajax提交方法，适用于tab，成功提示之后，会关闭tab
 * @param  {string} btn 提交按钮的jq选择器，默认 .common-ajax-submit ， 按钮必须放在form内
 */
function initSubmitTab(btn) {
    if (!btn || btn == '')
        btn = '.ajax-submit';
    initSubmit(btn, function (data) {
        if (data.status == 1) {
            setTimeout(function () {
                var index = getIndex();
                parent.$.TAB.warn(parent.$('.sly-frame').find("li").eq(index).attr('index'));
            }, 1000)
        }
    });
}

// 关闭当前弹窗口
function closeWin() {
    var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
    parent.layer.close(index);
}

// loading一个按钮
function loading(btn) {
    var text = btn.text();
    btn.text("").attr('text', text).attr('disabled','disabled');
    btn.append('<i class="fa fa-spinner fa-spin"></i>');
}
// 停止loading一个按钮
function stopLoading(btn) {
    btn.find('i').remove();
    var text = btn.attr('text');
    btn.text(text).removeAttr('disabled');
}


// 询问窗回调方法：刷新table，刷新窗口
function cbRefreshTable(data) {
    console.log(1)
    if (data.status)
        $('table').bootstrapTable('refresh', {silent: true});
}
function cbRefreshWin(data) {
    if (data.status)
        window.location.reload();
}

function openConfirm(btn, param) {
    if (!btn || btn == '') 
        btn = '.open-confirm';
    $(document).on('click', btn, function() {
        var param_elm = {
            title : $(this).attr('title'),
            msg : $(this).attr('msg'),
            link : $(this).attr('link'),
            callback : $(this).attr('callback'),
        }
        param = $.extend(param_elm, param);
        if (!param.callback || param.callback == '') param.callback = 'cbRefreshWin';

        layer.confirm(param.msg, {icon: 3, title: param.title}, function(index){
            $.get(param.link, function (data) {
                if (data.status) {
                    layer.msg(data.info, {icon: 1});
                } else {
                    layer.msg(data.info, {icon: 2});    
                }
                if (param.callback)
                    window[param.callback](data);
            });
            layer.close(index);
        });
        return false;
    })
}

function openWindow(btn, param) {
    var param_default = {
        title       : '窗口',
        link        : '/',
        width       : '50%',
        height      : '75%',
        resize      : 0,
        shadeClose  : 0,
        maxmin      : 0,
    }
    $(document).on('click', btn, function() {
        var param_elm = {
            title       : $(this).attr('title'),
            link        : $(this).attr('link'),
            width       : $(this).attr('width'),
            height      : $(this).attr('height'),
            resize      : $(this).attr('resize'),
            shadeClose  : $(this).attr('shadeClose'),
            maxmin      : $(this).attr('maxmin'),
        }
        param = $.extend(param_default, param_elm , param);
        
        layer.open({
            shade: 0.5,
            type: 2,
            resize: param.resize,
            title: param.title,
            shadeClose: param.shadeClose,
            maxmin: param.maxmin,
            area: [param.width, param.height],
            content: param.link, //iframe的url，no代表不显示滚动条
        });
        return false;
    })
}

/**
 * 初始化 Validate，
 * @Author   Armo
 * @DateTime 2018-01-05
 * @param    {object}   options option.elm 为需要验证的表单， 其他为validate的参数，一般传rules跟messages即可
 */
function initValidate(options) {
    if (!options.elm || options.elm == '') 
        options.elm = 'form';
    var tip = {};
    $(options.elm).validate($.extend({
        errorPlacement: function ( error, element ) {
            var name = $(element).attr('name');
            if (this.errorMap[name]) {
                if (!tip[name]) 
                    tip[name] = layer.tips(this.errorMap[name], $(element), {tipsMore:true, time:0, tips: [2, '#DD4B39'], id:name});
            }
        },
        success: function ( label, element ) {
            var name = $(element).attr('name');
            layer.close(tip[name]);
            delete tip[name];
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".form-group" ).addClass( "has-error" ).removeClass( "has-success" );
        },
        unhighlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".form-group" ).addClass( "has-success" ).removeClass( "has-error" );
        }
    }, options));
}



/**
 * 一些默认的绑定
 * @Author   Armo
 * @DateTime 2018-02-12
 */
$(function () {
    // 默认绑定 common-ajax-submit
    if ($('.common-ajax-submit').length > 0) {
        initSubmit('.common-ajax-submit');
    }

    openConfirm('.open-confirm');
    openWindow('.open-window');

    if ($('.select2').length > 0) {
        $('.select2').select2();
    }

    // 初始化minimal类的checkbox跟radio
    if ($('input[type="checkbox"].icheck-minimal, input[type="radio"].icheck-minimal').length > 0) {
        $('input[type="checkbox"].icheck-minimal, input[type="radio"].icheck-minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
    }
    // 初始化minimal-c下面的checkbox跟radio
    if ($('.icheck-minimal-c input[type="checkbox"], .icheck-minimal-c input[type="radio"]').length > 0) {
        $('.icheck-minimal-c input[type="checkbox"], .icheck-minimal-c input[type="radio"]').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
    }
})  