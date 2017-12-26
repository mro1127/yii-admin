
/**
 * 初始化ajax提交方法
 * @param  {string}   btn      提交按钮的jq选择器，默认 .common-ajax-submit ， 按钮必须放在form内
 * @param  {function} callback 回调方法，不传则一秒后跳转到data.url，data.url也没有则不处理
 * @param  int        notice   是否弹窗提示， 1是0否，默认是
 * @param  {function} validate 提交之前处理方法，返回fasle则中断提交
 * 
 */
function init_submit(btn, callback, notice, validate) {
    if (!notice || notice == '')
        notice = 1;

    $(btn).click(function () {
        $this = $(this);
        if (validate) {
            var pass = validate();
            if (!pass) return false;
        }

        loading($this);
        var data = {};
        var token = $('meta[name="csrf-token"]').attr('content');
        if (token) {
            var token_name = $('meta[name="csrf-param"]').attr('content');
            data[token_name] = token;
        }

        $this.parents('form').ajaxSubmit({
            dataType: 'json',
            data: data,
            success: function (data, textStatus, errorThrown, form) {
                console.log(data);
                if (data.status == 1) {
                    if (notice !=0) 
                        layer.msg(data.info, {icon: 1});
                } else {
                    layer.msg(data.info, {icon: 2});    
                    stop_loading($this);
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
                    stop_loading($this);
                
            }
        })
        return false;
    })
}
// 默认绑定 common-ajax-submit
init_submit('.common-ajax-submit');

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

function stop_loading(btn) {
    btn.removeAttr('disabled');
    btn.find('.spinner').remove();
    var text = btn.attr('text');
    btn.text(text);
}