<?php 
use yii\helpers\Url;
$this->registerAssetBundle('FileUpload');

 ?>

<section class="content">
    <div class="row">
        <div class="col-md-12">

            <div class="upload"></div>
            <div class="upload1"></div>
            <div class="upload-single"></div>
        </div>
    </div>

    <!-- The container for the uploaded files -->
    <div class="row">
        <div class="col-md-12 uploader-container ">

            <br><br>
                <hr>

                <div class="file-item">
                    <div class="file-content">
                        <img src="http://v.test/jQuery-File-Upload-9.21.0/server/php/files/1.jpg" title="1.jpg" alt="">
                        <div class="file-content-bar">
                            <span class="fa fa-times delete-btn"></span>
                        </div>
                        <div class="progress progress-striped active file-content-progress">
                            <div class="progress-bar progress-bar-primary" style="width: 85%"></div>
                        </div>
                    </div>
                </div>

                <div class="file-item">
                    <div class="file-content">
                        <div class="file-content-bar">
                            <span class="fa fa-times"></span>
                        </div>
                        <img src="http://v.test/jQuery-File-Upload-9.21.0/server/php/files/1.jpg" alt="">
                        <div class="file-content-success">
                            <span class="fa fa-check"></span>
                        </div>
                    </div>
                </div>

                <div class="file-item">
                    <div class="file-content">
                        <div class="file-content-bar">
                            <span class="fa fa-upload"></span>
                            <span class="fa fa-times"></span>
                        </div>
                        <img src="http://v.test/jQuery-File-Upload-9.21.0/server/php/files/1.jpg" alt="">
                        <div class="file-content-error">
                            <span>上传失败</span>
                        </div>
                    </div>
                </div>
           <!--      <div class="file-list-single">
                    <div class="file-list-single-fill">
                        <span class="fa fa-plus-square"></span>
                    </div>
                </div>
                <div class="file-list-single">
                    <div class="file-list-single-fill">
                        <span class="fa fa-plus-square-o"></span>
                    </div>
                </div> -->
                <div class="file-list-single">
                    <div class="file-list-single-fill file-input-button-wrap">
                        <span class="fa fa-plus-circle"></span>
                        <input type="file">
                    </div>
                </div>
              <!--   <div class="file-list-single">
                    <div class="file-list-single-fill">
                        <span class="fa fa-plus"></span>
                    </div>
                </div> -->
        </div>
    </div>
</section>
<!-- ./wrapper -->
<?php $this->on($this::EVENT_END_PAGE, function () {    ?>


<script>


$(function () {
    'use strict';

    var Uploader = (function(window) {
        var Uploader = function(config) {
            return new Uploader.fn.init(config);
        }

        Uploader.fn = Uploader.prototype = {
            constructor: Uploader,
            config : {
                container : ".upload-container",    // 插件容器
                url : "",
                num : 1,
                name: "file",
            },
            options : {},   // 插件的
            elm : {},       // DOM元素
            // 设置Uploader的配置
            init: function(config) {
                this.setConfig(config);
            },
            // 设置配置
            setConfig: function(config) {
                config = config || {};
                this.config = $.extend({}, this.config, config);
            },

            // 建立DOM
            buildDom: function() {
                if ($(this.config.container).length==0) {
                    console.error('上传插件Uploader找不到容器');
                    return false;
                }
                var elm = {}
                elm.container = $(this.config.container)
                if (this.config.num != 1) {
                    // 多图上传
                    elm.container.addClass('uploader-container');
                    elm.panel = $('<div/>').addClass('panel panel-default');
                    elm.panelBody = $('<div/>').addClass('panel-body');
                    elm.fileList = $('<div/>').addClass('file-list');
                    elm.fileListFill = $('<div>拖拽文件到此区域可直接上传</div>').addClass('file-list-fill');
                    elm.panelFooter = $('<div/>').addClass('panel-footer');
                    elm.fileInputButton = $('<input type="file" multiple>');
                    elm.fileInputButtonWrap = $('<span class="btn btn-success file-input-button-wrap"><i class="fa fa-plus"></i> <span>添加文件</span></span>').append(elm.fileInputButton);
                    elm.fileUploadButton = $('<button class="btn btn-warning file-upload-button"><i class="fa fa-upload"></i> 开始上传</button>');
                    elm.fileList.append(elm.fileListFill)
                    elm.panelBody.append(elm.fileList)
                    elm.panelFooter.append(elm.fileInputButtonWrap).append(elm.fileUploadButton)
                    elm.panel.append(elm.panelBody).append(elm.panelFooter)
                    elm.container.append(elm.panel)
                }else{

                    // 单图上传
                    elm.container.addClass('uploader-container-single');
                    elm.fileList = $('<div/>').addClass('file-list');
                    elm.fileInputButtonWrap = $('<div class="file-input-button-single-wrap"><span class="fa fa-plus-circle"></span></div>');
                    elm.fileInputButton = $('<input type="file">');
                    elm.fileInputButtonWrap.append(elm.fileInputButton)
                    elm.container.append(elm.fileList)
                    elm.container.append(elm.fileInputButtonWrap)
                }
                elm.itemUploadButton = $('<span/>')
                    .addClass('fa fa-upload item-upload-btn')
                    .on('click', function () {
                        var $this = $(this),
                            data = $this.data();
                        data.submit();
                        $this.hide();
                    }),
                elm.itemDeleteButton = $('<span/>')
                    .addClass('fa fa-times up-delete-btn')
                    .on('click', function (event) {
                        event.stopPropagation();
                        $(this).parents('.file-item').remove();
                        if(elm.fileList.children().length == 0)
                            elm.fileList.append(elm.fileListFill)

                    }),
                elm.progress = $('<div/>').addClass('progress progress-striped active file-content-progress')
                    .append('<div class="progress-bar progress-bar-primary"></div>'),
                elm.successFlag = $('<div/>').addClass('file-content-success')
                    .append('<span class="fa fa-check"></span>'),
                elm.errorFlag = $('<div/>').addClass('file-content-error').append('<span/>');
                this.elm = elm;
            },
            // 初始化插件
            initFileupload: function(options){
                var elm = this.elm;
                $(elm.fileUploadButton).click(function() {
                    elm.container.find('.item-upload-btn:visible').each(function(index, el) {
                        var data = $(this).data();
                        data.submit();
                        $(this).hide();
                    });
                });
                var defaultOptions = {
                    url: this.config.url,
                    dataType: 'json',
                    autoUpload: false,
                    acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
                    maxFileSize: 600000,
                    previewMaxHeight: 120,
                    previewMaxWidth: 120,
                    previewMinWidth: 120,
                    previewMinWidth: 120,
                    previewCrop: true,
                    formData: {},
                    dropZone: elm.fileListFill,
                    maxNumberOfFiles:this.config.num,

                    // Error and info messages:
                    messages: {
                        maxNumberOfFiles: '超过文件的最大数量',
                        acceptFileTypes: '不支持该文件类型',
                        maxFileSize: '文件过大',
                        minFileSize: '文件过小'
                    },
                    getNumberOfFiles: function () {
                        return elm.fileList.children()
                            .not('.processing').length;
                    },
                }

                if (this.config.num == 1){
                    defaultOptions.autoUpload = true;
                    defaultOptions.dropZone = elm.fileInputButtonWrap
                }
                var token = $('meta[name="csrf-token"]').attr('content');
                if (token) {
                    var token_name = $('meta[name="csrf-param"]').attr('content');
                    defaultOptions.formData[token_name] = token;
                }
                options = $.extend({}, defaultOptions, this.options, options);
                var elm = this.elm;
                // 初始化插件
                
                elm.fileInputButton.fileupload(options)
                .on('fileuploadadd', function (e, data) {
                    if (elm.fileListFill) 
                        elm.fileListFill.remove();
                    data.context = $('<div/>').addClass('file-item processing').appendTo(elm.fileList);
                    var bar = $('<div/>').addClass('file-content-bar')
                                .append(elm.itemUploadButton.clone(true).data(data))
                                .append(elm.itemDeleteButton.clone(true)),
                        node = $('<div/>').addClass('file-content')
                                .append(bar)
                                .append(elm.progress.clone(true));
                    node.appendTo(data.context);
                }).on('fileuploadprocessalways', function (e, data) {
                    var index = data.index,
                        file = data.files[index],
                        node = $(data.context.find('.file-content'));
                    data.context.removeClass('processing')
                    if (file.preview) {
                        node.prepend(file.preview);
                    }
                    if (file.error) {
                        var error = elm.errorFlag.clone(true);
                        error.find('span').text(file.error);
                        node.append(error);
                    }
                    if (index + 1 === data.files.length) {
                        data.context.find('button')
                            .text('Upload')
                            .prop('disabled', !!data.files.error);
                    }

                }).on('fileuploadsubmit', function (e, data) {
                    var index = data.index,
                        file = data.files[index],
                        node = $(data.context.children()[0]);
                    node.find('.file-content-error').remove();

                }).on('fileuploadprogress', function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    var index = data.index,
                        file = data.files[index],
                        node = $(data.context.children()[0]);
                    node.find('.file-content-progress .progress-bar').css('width', progress + '%');

                }).on('fileuploaddone', function (e, data) {
                    $.each(data.result.files, function (index, file) {
                        if (file.url) {
                            var link = $('<a>')
                                .attr('target', '_blank')
                                .prop('href', file.url),
                                success = elm.successFlag.clone(true),
                                node = $(data.context.children()[index]);
                            node.wrap(link);
                            node.find('.item-upload-btn').remove();
                            node.find('.file-content-progress').remove();
                            node.append(success);

                        } else if (file.error) {
                            var error = elm.errorFlag.clone(true),
                                node = $(data.context.children()[0]);
                            error.find('span').text(file.error);
                            node.find('.item-upload-btn').show();
                            node.find('.file-content-progress .progress-bar').css('width', '0%');
                            node.append(error);
                        }
                    });
                }).on('fileuploadfail', function (e, data) {
            // console.log('fileuploaddone')
                    $.each(data.files, function (index) {
                        var error = elm.errorFlag.clone(true),
                            node = $(data.context.children()[0]);

                        error.find('span').text('上传失败');
                        node.find('.item-upload-btn').show();
                        node.find('.file-content-progress .progress-bar').css('width', '0%');
                        node.append(error);
                    });
                }).prop('disabled', !$.support.fileInput)
                    .addClass($.support.fileInput ? undefined : 'disabled');
            },
            // 构建上传图片
            uploadImage: function(options){
                this.buildDom();
                this.initFileupload();
                return this;

            },

            // 构建上传文件
            uploadFile: function(options){
                return this;

            }
        }
        Uploader.fn.init.prototype = Uploader.fn;

        return Uploader;
    })();


var a = Uploader({
    container : ".upload",
    url : "http://v.test/jQuery-File-Upload-9.21.0/server/php/index.php",
    num : 2
}).uploadImage();

var a1 = Uploader({
    container : ".upload1",
    url : "http://v.test/jQuery-File-Upload-9.21.0/server/php/index.php",
    num : 3
}).uploadImage();



var b = Uploader({
    container : ".upload-single",
    url : "http://v.test/jQuery-File-Upload-9.21.0/server/php/index.php",
    num : 1
}).uploadImage();
// console.log(a)
// console.log(a.elm)
// a.elm.fileInputButton.remove()

})

</script>
<?php }); ?>
