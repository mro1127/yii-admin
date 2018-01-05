
/**
 * 初始化ajax提交方法
 * @param  {string}   btn      提交按钮的jq选择器，默认 .common-ajax-submit ， 按钮必须放在form内
 * @param  {function} callback 回调方法，不传则一秒后跳转到data.url，data.url也没有则不处理
 * @param  int        notice   是否弹窗提示， 1是0否，默认是
 * @param  {function} validate 自定义验证方法，返回fasle则中断提交
 * 
 */
function initSubmit(btn, callback, notice, validate) {
    if (!notice || notice == '')
        notice = 1;

    $(btn).click(function () {
        $this = $(this);
        $form = $(this).parents('form');
        if (validate) {
            var pass = validate();
            if (!pass) return false;
        }else{
            if (!$form.valid()) return false;   // 默认 JQueryValidation 验证，不需要则不初始化JQueryValidation
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
                    if (notice !=0) 
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
// 默认绑定 common-ajax-submit
initSubmit('.common-ajax-submit');

function loading(btn) {
    btn.attr('disabled','disabled');
    var text = btn.text();
    btn.text("").attr('text', text);
    var $loading = $('<div class="spinner">'+
                        '<div class="spinner-container container1">'+
                        '<div class="circle1"></div><div class="circle2"></div><div class="circle3"></div><div class="circle4"></div>'+
                        '</div>'+
                        '<div class="spinner-container container2">'+
                        '<div class="circle1"></div><div class="circle2"></div><div class="circle3"></div><div class="circle4"></div>'+
                        '</div>'+
                    '</div>');
    btn.append($loading);
}

function stopLoading(btn) {
    btn.removeAttr('disabled');
    btn.find('.spinner').remove();
    var text = btn.attr('text');
    btn.text(text);
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
            }else{
                layer.close(tip[name]);
                delete tip[name];
            }
        },
        success: function ( label, element ) {},
        highlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".form-group" ).addClass( "has-error" ).removeClass( "has-success" );
        },
        unhighlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".form-group" ).addClass( "has-success" ).removeClass( "has-error" );
        }
    }, options));
}
