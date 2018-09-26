/*
 * jQuery File Upload User Interface Plugin
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * https://opensource.org/licenses/MIT
 */

/* jshint nomen:false */
/* global define, require, window */

;(function (factory) {
    'use strict';
    factory(
        window.jQuery
    );
}(function ($) {
    'use strict';
    $.blueimp.fileupload.prototype._specialOptions.push(
        'elm',
        'filesContainer',
        'files',
    );

    // The UI version extends the file upload widget
    // and adds complete user interface interaction:
    $.widget('blueimp.fileupload', $.blueimp.fileupload, {

        options: {
            // By default, files added to the widget are uploaded as soon
            // as the user clicks on the start buttons. To enable automatic
            // uploads, set the following option to true:
            autoUpload: false,
            paramName: 'files',
            originalFile: [],
            singleFileUploads : true,   // 当前只支持每次单个文件上传，后续再支持多个
            
            elm: {},
            formData: {},
            // The container for the list of files. If undefined, it is set to
            // an element with class "files" inside of the widget element:
            filesContainer: undefined,
            // By default, files are appended to the files container.
            // Set the following option to true, to prepend files instead:
            prependFiles: false,
            // The expected data type of the upload response, sets the dataType
            // option of the $.ajax upload requests:
            dataType: 'json',

            // Error and info messages:
            messages: {
                maxNumberOfFiles: '超出文件的最大数量',
                acceptFileTypes: '不支持该文件类型',
                maxFileSize: '文件过大',
                minFileSize: '文件过小',
                unknownError: '未知错误'
            },

            previewMaxHeight: 120,
            previewMaxWidth: 120,

            // Function returning the current number of files,
            // used by the maxNumberOfFiles validation:
            getNumberOfFiles: function () {
                return this.filesContainer.children()
                    .not('.processing').length;
            },

            // Callback to retrieve the list of files from the server response:
            getFilesFromResponse: function (data) {
                if (data.result && $.isArray(data.result.files)) {
                    return data.result.files;
                }
                return [];
            },

            // The add callback is invoked as soon as files are added to the fileupload
            // widget (via file input selection, drag & drop or add API call).
            // See the basic file upload widget for more information:
            add: function (e, data) {
                if (e.isDefaultPrevented()) {
                    return false;
                }

                var $this = $(this),
                    that = $this.data('blueimp-fileupload') ||
                        $this.data('fileupload'),
                    options = that.options,
                    elm = options.elm;
                if (elm.fileListFill) 
                    elm.fileListFill.remove();    
                data.context = that._renderUpload(data.files)
                    .data('data', data)
                    .addClass('processing');
                options.filesContainer[
                    options.prependFiles ? 'prepend' : 'append'
                ](data.context);
                data.process(function () {
                    return $this.fileupload('process', data);
                }).always(function () {
                    data.context.removeClass('processing');
                    if (that.options.getNumberOfFiles() == that.options.maxNumberOfFiles) {
                        that._disableFileInputButton();
                    }
                    that._renderPreviews(data);
                }).done(function () {
                    data.context.find('.item-upload-btn').prop('disabled', false);
                    
                    if ((that._trigger('added', e, data) !== false) &&
                            (options.autoUpload || data.autoUpload) &&
                            data.autoUpload !== false) {
                        data.submit();
                    }
                }).fail(function () {
                    if (data.files.error) {
                        data.context.find('.item-upload-btn').remove();
                        var error = elm.errorFlag.clone(true);
                        error.find('span').text(data.files[0].error + '【3秒后自动删除】');
                        data.context.find('.file-content').append(error);
                        setTimeout(function(){
                            data.context.remove();
                        }, 3000);
                    }
                });
            },
            // Callback for the start of each file upload request:
            send: function (e, data) {
                if (e.isDefaultPrevented()) {
                    return false;
                }
                var that = $(this).data('blueimp-fileupload') ||
                        $(this).data('fileupload');
                
                that._renderSend(data);
                return that._trigger('sent', e, data);
            },
            // Callback for successful uploads:
            done: function (e, data) {
                if (e.isDefaultPrevented()) {
                    return false;
                }
                var that = $(this).data('blueimp-fileupload') ||
                        $(this).data('fileupload');

                var node = $(this);
                $(this).find('selector')
                that._renderDone(data);
                that._trigger('completed', e, data);
                that._trigger('finished', e, data);
             
            },
            // Callback for failed (abort or error) uploads:
            fail: function (e, data) {
                if (e.isDefaultPrevented()) {
                    return false;
                }
                var that = $(this).data('blueimp-fileupload') ||
                        $(this).data('fileupload');

                var error = that.options.elm.errorFlag.clone(true);
                error.find('span').text('上传失败！');
                data.context.find('.file-content').append(error);
                data.context.find('.item-upload-btn').prop('disabled', false);
                that._trigger('failed', e, data);
                that._trigger('finished', e, data);
            },
            // Callback for upload progress events:
            progress: function (e, data) {
                if (e.isDefaultPrevented()) {
                    return false;
                }
                var progress = Math.floor(data.loaded / data.total * 100);
                if (data.context) {
                    data.context.each(function () {
                        $(this).find('.progress')
                            .attr('aria-valuenow', progress)
                            .children().first().css(
                                'width',
                                progress + '%'
                            );
                    });
                }
            },
            // Callback for global upload progress events:
            progressall: function (e, data) {
                if (e.isDefaultPrevented()) {
                    return false;
                }
                var $this = $(this),
                    progress = Math.floor(data.loaded / data.total * 100),
                    globalProgressNode = $this.find('.fileupload-progress'),
                    extendedProgressNode = globalProgressNode
                        .find('.progress-extended');
                if (extendedProgressNode.length) {
                    extendedProgressNode.html(
                        ($this.data('blueimp-fileupload') || $this.data('fileupload'))
                            ._renderExtendedProgress(data)
                    );
                }
                globalProgressNode
                    .find('.progress')
                    .attr('aria-valuenow', progress)
                    .children().first().css(
                        'width',
                        progress + '%'
                    );
            },
            // Callback for uploads start, equivalent to the global ajaxStart event:
            start: function (e) {
                if (e.isDefaultPrevented()) {
                    return false;
                }
                var that = $(this).data('blueimp-fileupload') ||
                        $(this).data('fileupload');
                that._trigger('started', e);
            },
            processstart: function (e) {
                if (e.isDefaultPrevented()) {
                    return false;
                }
                $(this).addClass('fileupload-processing');
            },
            processstop: function (e) {
                if (e.isDefaultPrevented()) {
                    return false;
                }
                $(this).removeClass('fileupload-processing');
            },
           
        },

        _resetFinishedDeferreds: function () {
            this._finishedUploads = [];
        },

        _addFinishedDeferreds: function (deferred) {
            if (!deferred) {
                deferred = $.Deferred();
            }
            this._finishedUploads.push(deferred);
            return deferred;
        },

        _getFinishedDeferreds: function () {
            return this._finishedUploads;
        },

        _formatFileSize: function (bytes) {
            if (typeof bytes !== 'number') {
                return '';
            }
            if (bytes >= 1000000000) {
                return (bytes / 1000000000).toFixed(2) + ' GB';
            }
            if (bytes >= 1000000) {
                return (bytes / 1000000).toFixed(2) + ' MB';
            }
            return (bytes / 1000).toFixed(2) + ' KB';
        },

        _formatBitrate: function (bits) {
            if (typeof bits !== 'number') {
                return '';
            }
            if (bits >= 1000000000) {
                return (bits / 1000000000).toFixed(2) + ' Gbit/s';
            }
            if (bits >= 1000000) {
                return (bits / 1000000).toFixed(2) + ' Mbit/s';
            }
            if (bits >= 1000) {
                return (bits / 1000).toFixed(2) + ' kbit/s';
            }
            return bits.toFixed(2) + ' bit/s';
        },

        _formatTime: function (seconds) {
            var date = new Date(seconds * 1000),
                days = Math.floor(seconds / 86400);
            days = days ? days + 'd ' : '';
            return days +
                ('0' + date.getUTCHours()).slice(-2) + ':' +
                ('0' + date.getUTCMinutes()).slice(-2) + ':' +
                ('0' + date.getUTCSeconds()).slice(-2);
        },

        _formatPercentage: function (floatValue) {
            return (floatValue * 100).toFixed(2) + ' %';
        },

        _renderExtendedProgress: function (data) {
            return this._formatBitrate(data.bitrate) + ' | ' +
                this._formatTime(
                    (data.total - data.loaded) * 8 / data.bitrate
                ) + ' | ' +
                this._formatPercentage(
                    data.loaded / data.total
                ) + ' | ' +
                this._formatFileSize(data.loaded) + ' / ' +
                this._formatFileSize(data.total);
        },

        _renderPreviews: function (data) {
            if (data.files[0].preview) {
                $(data.files[0].preview).addClass('preview')
                data.context.find('.file-content').append(data.files[0].preview);
                if (data.files[0].preview.nodeName == 'AUDIO' || data.files[0].preview.nodeName == 'VIDEO') 
                    data.context.find('.file-content').css('min-height', data.context.find(data.files[0].preview).height());
                    data.context.find('.file-content').width(data.context.find(data.files[0].preview).width());
            }else{
                var preview = $('<div/>').addClass('preview');
                preview.append('<span class="fa fa-file-o"></span>')
                data.context.find('.file-content').append(preview);
            }
        },

        _renderSend: function (data) {
            data.context.find('.file-content-error').remove();
            data.context.find('.file-content').append(this.options.elm.progress.clone(true));
        },

        _renderUpload: function (files) {
            var elm = this.options.elm;
            var item = $('<div/>').addClass('file-item');
            var bar = $('<div/>').addClass('file-content-bar')
                        .append(elm.itemUploadButton.clone(true))
                        .append(elm.itemDeleteButton.clone(true)),
                node = $('<div/>').addClass('file-content')
                        .attr("title", files[0].name + "["+this._formatFileSize(files[0].size)+"]")
                        .append(bar);
            item.append(node);
            return item;
        },

        // 服务器返回后的处理
        _renderDone: function (data) {
            var getFilesFromResponse = data.getFilesFromResponse || this.options.getFilesFromResponse,
                files = getFilesFromResponse(data);
            data.context.find('.file-content-progress').remove();
            data.context.find('.item-upload-btn').remove();
            if (files[0]) {
                var link = $('<a>')
                        .attr('target', '_blank')
                        .prop('href', files[0].url);
                data.context.find('canvas.preview').wrap(link);
                data.context.find('.file-content').append(this.options.elm.successFlag.clone(true));
                var input = this.options.elm.input.clone(true),
                    input_base_url = this.options.elm.input_base_url.clone(true);

                input.attr('value', files[0].path);
                data.context.find('.file-content').append(input);
                input_base_url.attr('value', files[0].base_url);
                data.context.find('.file-content').append(input_base_url);

            }else if(data.result.error){
                var error = this.options.elm.errorFlag.clone(true);
                error.find('span').text(data.result.error);
                data.context.find('.file-content').append(error);
            }
        },

        // 开始上传
        _startHandler: function (e) {
            e.preventDefault();
            var button = $(e.currentTarget),
                item = button.parents('.file-item'),
                data = item.data('data');
            button.prop('disabled', true);
            if (data && data.submit) {
                data.submit();
            }
        },

        // 取消上传
        _deleteHandler: function (e) {
            e.preventDefault();
            var button = $(e.currentTarget),
                item = button.parents('.file-item');
            item.remove();
            
            if (this.options.getNumberOfFiles() < this.options.maxNumberOfFiles) 
                this._enableFileInputButton();
        },

        _forceReflow: function (node) {
            return $.support.transition && node.length &&
                node[0].offsetWidth;
        },

        // 初始化工具栏的按钮
        _initButtonBarEventHandlers: function () {
            var elm = this.options.elm;
            this._on(elm.fileUploadButton, {
                click: function (e) {
                    e.preventDefault();
                    elm.filesContainer.find('.item-upload-btn').click();
                }
            });
           
        },

        _destroyButtonBarEventHandlers: function () {
            this._off(
                this.element.find('.fileupload-buttonbar')
                    .find('.start, .cancel, .delete'),
                'click'
            );
            this._off(
                this.element.find('.fileupload-buttonbar .toggle'),
                'change.'
            );
        },

        // 初始化各个图片的按钮
        _initEventHandlers: function () {
            this._super();
            this._on(this.options.filesContainer, {
                'click .item-upload-btn': this._startHandler,
                'click .item-delete-btn': this._deleteHandler,
            });
            if (this.options.maxNumberOfFiles != 1) 
                this._initButtonBarEventHandlers();
        },

        _destroyEventHandlers: function () {
            this._destroyButtonBarEventHandlers();
            this._off(this.options.filesContainer, 'click');
            this._super();
        },

        _enableFileInputButton: function () {
            if (this.options.maxNumberOfFiles == 1) {
                this.options.elm.fileInputButtonWrap.show();
            }else{
                this.options.fileInput
                    .prop('disabled', false)
                    .parent().removeClass('disabled');
            }

        },

        _disableFileInputButton: function () {
            if (this.options.maxNumberOfFiles == 1) {
                this.options.elm.fileInputButtonWrap.hide();
            }else{
                this.options.fileInput
                    .prop('disabled', true)
                    .parent().addClass('disabled');
            }
        },

        _initTemplates: function () {
            var elm = this.options.elm;
            elm.itemUploadButton = $('<span/>').addClass('fa fa-upload item-upload-btn'),
            elm.itemDeleteButton = $('<span/>').addClass('fa fa-times item-delete-btn'),
            elm.progress = $('<div/>').addClass('progress progress-striped active file-content-progress')
                .append('<div class="progress-bar progress-bar-primary"></div>'),
            elm.successFlag = $('<div/>').addClass('file-content-success')
                .append('<span class="fa fa-check"></span>'),
            elm.errorFlag = $('<div/>').addClass('file-content-error').append('<span/>'),
            elm.input = $('<input/>').attr('hidden', true),
            elm.input_base_url = $('<input/>').attr('hidden', true);
            if (this.options.maxNumberOfFiles == 1) {
                elm.input.attr('name', this.options.paramName);
                elm.input_base_url.attr('name', this.options.paramName + '_base_url');
            }else{
                elm.input.attr('name', this.options.paramName + '[]');
                elm.input_base_url.attr('name', this.options.paramName + '_base_url[]');
            }
        },

        _initFilesContainer: function () {
            var options = this.options,
                elm = this.options.elm;

            if (options.filesContainer === undefined) 
                options.filesContainer = '.file-list';

            // options.filesContainer = elm.filesContainer;
            if (options.maxNumberOfFiles == 1) {
                options.autoUpload = true;
                // 单文件上传
                if (!this.element.hasClass('uploader-container-single')) 
                    this.element.addClass('uploader-container-single');

                elm.filesContainer = $('<div/>').addClass('file-list');
                elm.fileInputButtonWrap = $('<div class="file-input-button-single-wrap"><span class="fa fa-plus-circle"></span></div>');
                elm.fileInputButton = $('<input type="file">');
                elm.fileInputButtonWrap.append(elm.fileInputButton)
                this.element.append(elm.filesContainer)
                this.element.append(elm.fileInputButtonWrap)
                options.dropZone = elm.fileInputButtonWrap;
            }else{
                // 多文件上传
                if (!this.element.hasClass('uploader-container')) 
                    this.element.addClass('uploader-container');

                elm.panel = $('<div/>').addClass('panel panel-default');
                elm.panelBody = $('<div/>').addClass('panel-body');
                elm.panelFooter = $('<div/>').addClass('panel-footer');

                elm.fileListFill = $('<div>拖拽文件到此区域可直接上传</div>').addClass('file-list-fill');
                elm.filesContainer = $('<div/>').addClass('file-list');
                elm.filesContainer.append(elm.fileListFill);
                elm.panelBody.append(elm.filesContainer);

                elm.fileInputButton = $('<input type="file" multiple>');
                elm.fileInputButtonWrap = $('<span class="btn btn-success file-input-button-wrap"><i class="fa fa-plus"></i> <span>添加文件</span></span>');
                elm.fileUploadButton = $('<button class="btn btn-warning file-upload-button"><i class="fa fa-upload"></i> 开始上传</button>');
                elm.fileInputButtonWrap.append(elm.fileInputButton);
                elm.panelFooter.append(elm.fileInputButtonWrap).append(elm.fileUploadButton)

                elm.panel.append(elm.panelBody).append(elm.panelFooter);
                this.element.append(elm.panel);
                options.dropZone = elm.fileListFill;
            }
            options.filesContainer = elm.filesContainer;
            options.fileInput = elm.fileInputButton;
        },

        _initOriginalFile: function () {
            var elm = this.options.elm;
            if (this.options.originalFile.length>0 && elm.fileListFill) 
                elm.fileListFill.remove();
            
            $.each(this.options.originalFile, function(index, val) {
                if (val.path == '') return ;
                if (/\.(png|jpe?g|gif|svg)(\?.*)?$/.test(val.path)) {
                    var preview = $('<img/>').addClass('preview').attr('src', val.base_url +'/'+ val.path);
                }else{
                    var preview = $('<div/>').addClass('preview').append('<span class="fa fa-file-o"></span>');
                }
                var item = $('<div/>').addClass('file-item').clone(true),
                    bar = $('<div/>').addClass('file-content-bar').append(elm.itemDeleteButton.clone(true)),
                    node = $('<div/>').addClass('file-content').append(bar),
                    // img = $('<img/>').attr('src', val.base_url +'/'+ val.path),
                    link = $('<a>').attr('target', '_blank').prop('href', val.base_url +'/'+ val.path),
                    input = elm.input.clone(true),
                    input_base_url = elm.input_base_url.clone(true),
                    successFlag = elm.successFlag.clone(true);

                link.append(preview)
                input.attr('value', val.path);
                input_base_url.attr('value', val.base_url);
                node.append(bar).append(link).append(successFlag).append(input).append(input_base_url)
                item.append(node)
                elm.filesContainer.append(item)

            });

            if (! this.options.maxNumberOfFiles > this.options.originalFile.length) {
                this._disableFileInputButton()
            }
        },

        _initSpecialOptions: function () {
            this._super();
            var options = this.options;
            var token = $('meta[name="csrf-token"]').attr('content');
            if (token) {
                var token_name = $('meta[name="csrf-param"]').attr('content');
                options.formData[token_name] = token;
            }
            this._initFilesContainer();
            this._initTemplates();
            this._initOriginalFile();

        },

        _create: function () {
            this._super();
            this._resetFinishedDeferreds();
            if (!$.support.fileInput) {
                this._disableFileInputButton();
            }
        },

    });

}));
