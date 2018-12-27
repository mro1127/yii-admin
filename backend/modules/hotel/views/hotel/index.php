<?php 
use yii\helpers\Url;
$this->registerAssetBundle('BootstrapTable');

$this->title = '酒店列表';

 ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="row">
        <div class="col-xs-6">
            <h4 class="content-header-title"><b><?= $this->title ?></b></h4>
        </div>
        <div class="col-xs-6 text-right">
            <a class="btn btn-success btn-flat" href="<?= Url::to(['hotel/add'])?>" title="添加" width="400px" height="500px">添加</a>
            <a class="btn btn-danger btn-flat batch-confirm" href="<?= Url::to(['hotel/delete'])?>" title="删除酒店" msg="确认删除选中的酒店？" callback="cbRefreshTable">删除</a>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="container-fluid content">
    <div class="row">
        <form class="search-form">
            <div class="col-xs-3 col-lg-2 mr-b-10">
                <input type="text" class="form-control" name="name" placeholder="请输入酒店名称" title="酒店名称">
            </div>
            <div class="col-xs-3 col-lg-2 mr-b-10">
                <select class="form-control" name="status" title="状态">
                    <option value="">状态</option>
                    <option value="1">启用</option>
                    <option value="0">禁用</option>
                </select>
            </div>
            <div class="col-xs-3 col-lg-2 mr-b-10 0">
                <button class="btn btn-primary btn-flat " title="">搜索</button>
            </div>
        </form>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <table id="table" data-toggle="table" data-url="<?= Url::to(['hotel/get-list'])?>" data-classes="table table-hover table-condensed"
                    data-side-pagination="server" data-pagination="true" data-side-pagination="server" >
                <thead>
                <tr>
                    <th data-checkbox="true"></th>
                    <th data-align="center" data-field="id">ID</th>
                    <th data-field="name" data-align="left">名称</th>
                    <th data-field="flag" data-align="left">分类</th>
                    <th data-field="type" data-align="left" data-formatter="int2type">平台</th>
                    <th data-align="center" data-field="hotel_status" data-formatter="int2status">状态</th>
                    <th data-align="center" data-field="sort">排序</th>
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
    function int2status(status) {
        if (status == 1) {
            return '<label class="label bg-green">抓取</label>';
        }else{
            return '<label class="label bg-red">不抓取</label>';
        }
    }
    function int2type(type) {
        return type == 1? '美团':'携程';
    }

    var editUrl = "<?= Url::to(['hotel/edit', 'id'=>'ID']); ?>";
    var delUrl = "<?= Url::to(['hotel/delete', 'id'=>'ID']); ?>";
    function getBtn(value, row, index) {
        var url1 = editUrl.replace(/ID/, value);
        var url2 = delUrl.replace(/ID/, value);
        var html = '<a class="btn btn-primary btn-flat btn-xs" title="编辑酒店 - '+row.name+'" href="'+url1+'">编辑</a> ';
        html += '<a class="btn btn-danger btn-flat btn-xs open-confirm" title="删除酒店" msg="确认删除酒店【'+row.name+'】？" link="'+url2+'" callback="cbRefreshTable">删除</a>';
        return html;
    }

</script>

<?php }); ?>

