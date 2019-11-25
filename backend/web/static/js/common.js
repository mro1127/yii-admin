
/**
 * 初始化ajax提交方法
 * @param  {string}   btn      提交按钮的jq选择器，默认 .common-ajax-submit ， 按钮必须放在form内
 * @param  {function} callback 回调方法，不传则一秒后跳转到data.url，data.url也没有则不处理
 * @param  {function} validate 自定义验证方法，返回fasle则中断提交
 */
function initSubmit(btn, callback, validate, getData) {
    if (!btn || btn == '')
        btn = '.ajax-submit';
    $(btn).click(function () {
        $this = $(this);
        $form = $(this).parents('form');
        if (validate) {
            var pass = validate($form);
            if (!pass) return false;
        }
        if (!$form.valid()) return false;   // 默认 JQueryValidation  

        loading($this);
        if (getData) {
            var data = getData();
        }else{
            var data = {};
        }
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
                    stopLoading($this);
                } else if (data.url) {
                    setTimeout(function () {
                       window.location.href = data.url;
                    }, 1000)
                }else{
                    stopLoading($this);
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
    if (data.status)
        $('table').bootstrapTable('refresh', {silent: true});
}
function cbRefreshWin(data) {
    if (data.status)
        window.location.reload();
}

function openConfirm(btn, param) {
    $(document).on('click', btn, function() {
        var param_elm = {
            title : $(this).attr('title'),
            msg : $(this).attr('msg'),
            link : $(this).attr('link'),
            callback : $(this).attr('callback'),
        }
        param = $.extend(param, param_elm);
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

function batchConfirm(btn, param, get_post_data) {
    $(document).on('click', btn, function() {
        if (get_post_data){
            var post_data = get_post_data();
            if (post_data === false) return false;
        }else{
            // 默认获取 bootstrap-table的checkbox数据
            var post_data = {},
                selections = $('table').bootstrapTable('getSelections');
            post_data.id = $.map(selections, function(item, index) {
                return item.id;
            });
            if (post_data.id.length == 0) {
                layer.msg('请选择数据！');    
                return false;
            }
        }

        var token = $('meta[name="csrf-token"]').attr('content');
        if (token) {
            var token_name = $('meta[name="csrf-param"]').attr('content');
            post_data[token_name] = token;
        }

        var param_elm = {
            title : $(this).attr('title'),
            msg : $(this).attr('msg'),
            link : $(this).attr('link'),
            callback : $(this).attr('callback'),
        }
        param = $.extend(param, param_elm);

        layer.confirm(param.msg, {icon: 3, title: param.title}, function(index){
            $.post(param.link, post_data, function(data) {
                if (data.status) {
                    layer.msg(data.info, {icon: 1});
                } else {
                    layer.msg(data.info, {icon: 2});    
                }
                if (param.callback)
                    window[param.callback](data);
            }, "JSON");
        });
        return false;
    })
}

function batchPrompt(btn, param, get_post_data) {
    $(document).on('click', btn, function() {
        if (get_post_data){
            var post_data = get_post_data();
            if (post_data === false) return false;
        }else{
            // 默认获取 bootstrap-table的checkbox数据
            var post_data = {},
                selections = $('table').bootstrapTable('getSelections');
            post_data.id = $.map(selections, function(item, index) {
                return item.id;
            });
            if (post_data.id.length == 0) {
                layer.msg('请选择数据！');    
                return false;
            }
        }

        var token = $('meta[name="csrf-token"]').attr('content');
        if (token) {
            var token_name = $('meta[name="csrf-param"]').attr('content');
            post_data[token_name] = token;
        }

        var param_default = {
            formType : 0,
            name : 'value',
        }
        var param_elm = {
            title : $(this).attr('title'),
            value : $(this).attr('value'),
            formType : $(this).attr('form-type'),
            link : $(this).attr('link'),
            callback : $(this).attr('callback'),
            name : $(this).attr('name'),
        }
        param = $.extend(param_default, param, param_elm);
        layer.prompt(param, function(value, index, elem){
            post_data[param.name] = value;
            $.post(param.link, post_data, function(data) {
                if (data.status) {
                    layer.msg(data.info, {icon: 1});
                    setTimeout(function () {
                        layer.close(index)
                    }, 1000)
                } else {
                    layer.msg(data.info, {icon: 2});    
                }
                if (param.callback){
                    window[param.callback](data);
                }
            }, "JSON");
        });
        return false;
    })
}

function batchJump(btn, param, get_id) {
    var param_default = {
        type:       1,
        title:      '新增页面',
        link:       '/',
        icon:       'fa fa-file-o',
        bind:       0,
        width:      '50%',
        height:     '75%',
        resize:     0,
        shadeClose: 0,
        maxmin:     0,
        shade:      0.5
    }
    $(document).on('click', btn, function() {
        
        if (get_id){
            var id = get_id();
            if (id === false) return false;
        }else{
            // 默认获取 bootstrap-table的checkbox数据
            var selections = $('table').bootstrapTable('getSelections'),
                id = $.map(selections, function(item, index) {
                return item.id;
            });
            if (id.length == 0) {
                layer.msg('请选择数据！');    
                return false;
            }
        }
        var param_elm = {
            type:       $(this).attr('type'),
            title:      $(this).attr('title'),
            link:       $(this).attr('link'),
            icon:       $(this).attr('icon'),
            bind:       $(this).attr('bind'),
            width:      $(this).attr('width'),
            height:     $(this).attr('height'),
            resize:     $(this).attr('resize'),
            shadeClose: $(this).attr('shadeClose'),
            maxmin:     $(this).attr('maxmin'),
            shade:      $(this).attr('shade'),
        }
        param = $.extend(param_default, param , param_elm);
        var link = param.link.replace(/ID/, id.join('_'));
        if (param.type==1) {
            if (param.shade == '0') param.shade = false;
            layer.open({
                shade: param.shade,
                type: 2,
                resize: param.resize,
                title: param.title,
                shadeClose: param.shadeClose,
                maxmin: param.maxmin,
                area: [param.width, param.height],
                content: link, //iframe的url，no代表不显示滚动条
            });
        }else{
            parent.$.TAB.add(link, param.title, param.icon, param.bind);
        }
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
        shade       : 0.5
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
            shade       : $(this).attr('shade'),
        }
        param = $.extend(param_default, param , param_elm);
        if (param.shade == '0') param.shade = false;
        layer.open({
            shade: param.shade,
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
                if (window.innerWidth < 768) {
                    layer.msg(this.errorMap[name]);
                }else if (tip[name]) {
                    if ($('#layui-layer'+tip[name]).find('.layui-layer-content').text() != this.errorMap[name]) {
                        layer.close(tip[name])
                        tip[name] = layer.tips(this.errorMap[name], $(element), {tipsMore:true, time:0, tips: [2, '#DD4B39'], id:name});
                    }
                }else{
                    var type = $(element).attr('type');
                    if (type == 'checkbox' || type == 'radio') {
                        var name = $(element).attr('name'), type = $(element).attr('type');
                        var elm = $("input[name="+name+"][type="+type+"]:last").parents('label');
                    }else if($(element).hasClass('select2-hidden-accessible')){
                        var elm = $(element).next('.select2-container');
                    }else{
                        var elm = $(element);
                    }
                    tip[name] = layer.tips(this.errorMap[name], elm, {tipsMore:true, time:0, tips: [2, '#DD4B39'], id:name});
                }
            }
        },
        success: function ( label, element ) {
            var name = $(element).attr('name');
            if (tip[name]) {
                layer.close(tip[name]);
                delete tip[name];
            }
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".form-group" ).addClass( "has-error" );
        },
        unhighlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".form-group" ).removeClass( "has-error" );
        }
    }, options));
}


/* 
* 带有search-form类的form提交时会触发，获取表单参数
* 重新赋值boostrap-table的queryParams参数
*/ 
function initSearch(form, table) {
    $(form).submit(function() {
        $(table).bootstrapTable('removeAll');
        var keyword = $(form).serializeArray();

        var query_params = function(params) {
            var get_params = getParam();
            for(i in get_params)
                params[i] = get_params[i];

            for(i in keyword){
                if (keyword[i].name.substr(-2) == '[]') {
                    k = keyword[i].name.slice(0,-2);
                    if (!params[k]) params[k] = [];
                    params[k].push(keyword[i].value);
                }else{
                    params[keyword[i].name] = keyword[i].value;
                }
            }
            return params;
        }
        $(table).bootstrapTable('refreshOptions', {queryParams: query_params, pageNumber:1});
        $(form).find('button').prop('disabled',true);
        $(table).on('load-success.bs.table',function(data){
            $(form).find('button').prop('disabled',false);
        });
        return false;
    });
}

/**
 * 执行post提交
 */
function doPost(url, data, btn, callback, alert) {
    if (btn) loading(btn);
    var token = $('meta[name="csrf-token"]').attr('content');
    if (token) {
        var token_name = $('meta[name="csrf-param"]').attr('content');
        data[token_name] = token;
    }

    $.ajax({
        type: 'POST',
        dataType: 'json',
        data: data,
        url: url,
        success: function (data, textStatus, errorThrown, form) {
            if (btn) stopLoading(btn);
            if (alert != 0) {
                if (data.status == 1) {
                    layer.msg(data.info, {icon: 1});
                } else {
                    layer.msg(data.info, {icon: 2});    
                }
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
                if (btn) stopLoading(btn);
            
        }
    })
    return false;
}

function getParam(variable)
{
    var query  = window.location.search.substring(1);
    var vars   = query.split("&");
    var param  = {};
    for (var i = 0;i<vars.length;i++) {
        var pair = vars[i].split("=");
        if(variable && pair[0] == variable){return pair[1];}
        param[pair[0]] = pair[1];
    }
    if (!variable) return param;
    return '';
}

function queryParams(params) {
    var get_params = getParam();
    for(i in get_params)
        params[i] = get_params[i];
    return params;
}

function overlay(elm, image=false) {
    option = {
        background: "rgba(255, 255, 255, 0.5)",
        zIndex:     1000
    };
    if (!image) option.image = image;
    elm.LoadingOverlay("show", option);
}
function hideOverlay(elm) {
    elm.LoadingOverlay("hide");
}

// 初始化日期选择
function initDateInput(elm, config, default_value) {
    var default_config = {
        language: 'zh-CN',
        format: 'yyyy-mm-dd',
        autoclose: true,
    };
    config = $.extend(default_config, config);
    elm.datepicker(config)
    if (default_value) elm.val(default_value);
    elm.inputmask('yyyy-mm-dd')
}

// 初始化日期区间选择
function initDateRangePicker(elm, config) {
    var default_config = {
        autoApply: true,
        linkedCalendars: false,
        autoUpdateInput: false,
        locale: {
            format: 'YYYY-MM-DD'
        }
    };
    config = $.extend(default_config, config);
    elm.daterangepicker(config, function(start, end, label) {
        elm.val(start.format('YYYY-MM-DD') + '~' + end.format('YYYY-MM-DD'));
    });
}

function date(integer, format='YYYY-MM-DD') {
    if (integer=='' || integer==null) return '';
    return moment.unix(integer).format(format);
}
/**
 * 一些默认的绑定
 * @Author   Armo
 * @DateTime 2018-02-12
 */
$(function () {
    // 默认绑定 common-ajax-submit
    if ($('.common-ajax-submit').length > 0) 
        initSubmit('.common-ajax-submit');

    if ($('.search-form').length > 0) 
        initSearch('.search-form', 'table');

    batchJump('.batch-jump');
    openWindow('.open-window');
    openConfirm('.open-confirm');
    batchConfirm('.batch-confirm');
    batchPrompt('.batch-prompt'); 
    batchPrompt('.open-prompt',{},function() {
        return {};
    }); 


    if ($('.select2').length > 0) 
        $('.select2').select2();

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

    // 初始化minimal类的checkbox跟radio
    if ($('input[type="checkbox"].icheck-minimal-red, input[type="radio"].icheck-minimal-red').length > 0) {
        $('input[type="checkbox"].icheck-minimal-red, input[type="radio"].icheck-minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        });
    }
    // 初始化minimal-c下面的checkbox跟radio
    if ($('.icheck-minimal-c-red input[type="checkbox"], .icheck-minimal-c-red input[type="radio"]').length > 0) {
        $('.icheck-minimal-c-red input[type="checkbox"], .icheck-minimal-c-red input[type="radio"]').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        });
    }

    // 初始化minimal类的checkbox跟radio
    if ($('input[type="checkbox"].icheck-minimal-green, input[type="radio"].icheck-minimal-green').length > 0) {
        $('input[type="checkbox"].icheck-minimal-green, input[type="radio"].icheck-minimal-green').iCheck({
            checkboxClass: 'icheckbox_minimal-green',
            radioClass: 'iradio_minimal-green'
        });
    }
    // 初始化minimal-c下面的checkbox跟radio
    if ($('.icheck-minimal-c-green input[type="checkbox"], .icheck-minimal-c-green input[type="radio"]').length > 0) {
        $('.icheck-minimal-c-green input[type="checkbox"], .icheck-minimal-c-green input[type="radio"]').iCheck({
            checkboxClass: 'icheckbox_minimal-green',
            radioClass: 'iradio_minimal-green'
        });
    }


    if ($('.common-export').length > 0) {
        $(".common-export").click(function(event) {
            var link = $(this).attr('link'),
                params = {},
                keyword = $(".search-form").serializeArray();
            link += "?";
            for(i in keyword)
                link += keyword[i].name +"="+ encodeURIComponent(keyword[i].value) +"&";
            location.href = link;
        });
    }
})  