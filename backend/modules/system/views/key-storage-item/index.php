<?php 
use yii\helpers\Url;
$this->registerAssetBundle('BootstrapTable');

$this->title = '数据字典';

 ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="row">
        <div class="col-xs-6">
            <h4 class="content-header-title"><b><?= $this->title ?></b></h4>
        </div>
        <div class="col-xs-6 text-right">
            <a class="btn btn-success btn-flat" href="<?= Url::to(['add'])?>" title="添加数据字典">添加数据字典</a>
            <a class="btn btn-danger btn-flat batch-confirm" link="<?= Url::to(['delete'])?>" title="删除字典" msg="确认删除选中的字典？" callback="cbRefreshTable">删除</a>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="container-fluid content">
    <div class="row">
        <form class="search-form">
            <div class="col-xs-3 col-lg-2 mr-b-10">
                <input type="text" class="form-control" name="key" placeholder="请输入KEY" title="KEY">
            </div>
            <div class="col-xs-3 col-lg-2 mr-b-10">
                <input type="text" class="form-control" name="type" placeholder="请输入类型" title="类型">
            </div>
            <div class="col-xs-3 col-lg-2 mr-b-10">
                <input type="text" class="form-control" name="application" placeholder="请输入所属应用" title="所属应用">
            </div>
            <div class="col-xs-3 col-lg-2 mr-b-10">
                <select class="form-control" name="is_system" title="是否系统使用">
                    <option value="">是否系统使用</option>
                    <option value="1">是</option>
                    <option value="0">否</option>
                </select>
            </div>
            <div class="col-xs-3 col-lg-2 mr-b-10">
                <button class="btn btn-primary btn-flat" title="">搜索</button>
            </div>
        </form>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <table id="table" data-toggle="table" data-url="<?= Url::to(['get-list'])?>" data-classes="table table-hover table-condensed"
                    data-side-pagination="server" data-pagination="true" data-side-pagination="server" >
                <thead>
                <tr>
                    <th data-checkbox="true"></th>
                    <th data-align="center" data-field="key">KEY</th>
                    <th data-field="option" data-width="50%" data-formatter="formatOption">可选项</th>
                    <th data-field="type">类型</th>
                    <th data-field="application">应用</th>
                    <th data-align="center" data-field="is_system" data-formatter="int2str">是否系统使用</th>
                    <th data-align="center" data-field="id" data-formatter="getBtn">操作</th>
                </tr>
                </thead>
            </table>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->


<?php $this->on($this::EVENT_END_PAGE, function () {    ?>

<script>
    // bootstrap-table function
    function int2str(status) {
        if (status == 1) {
            return '<label class="label bg-red">是</label>';
        }else{
            return '<label class="label bg-green">否</label>';
        }
    }
    function formatOption(option) {
        option = $.parseJSON(option)
        var html = '';
        if (Array.isArray(option)) {
            $.each(option, function(index, val) {
                html += '<label class="label label-default">'+val+'</label> ';
            });
        }else{
            $.each(option, function(index, val) {
                html += '<label class="label label-info">'+index+ ': ' +val+'</label> ';
            });
        }
        return html;
    }
    var editUrl = "<?= Url::to(['edit', 'id'=>'DATA_ID']); ?>";
    var delUrl = "<?= Url::to(['delete', 'id'=>'DATA_ID']); ?>";
    function getBtn(value, row, index) {
        var url1 = editUrl.replace(/DATA_ID/, value);
        var url3 = delUrl.replace(/DATA_ID/, value);
        var html = '<a class="btn btn-primary btn-flat btn-xs" title="编辑字典 - '+row.id+'" href="'+url1+'">编辑</a> ';
        if (row.is_system==0) {
            html += '<a class="btn btn-danger btn-flat btn-xs open-confirm" title="删除字典" msg="确认删除字典【'+row.id+'】？" link="'+url3+'" callback="cbRefreshTable">删除</a>';
        }
        return html;
    }

    $(function() {

    })

</script>

<?php }); ?>

