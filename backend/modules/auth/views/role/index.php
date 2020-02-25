<?php 
use yii\helpers\Url;
$this->registerAssetBundle('BootstrapTable');

$this->title = '角色列表';

 ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="row">
        <div class="col-xs-6">
            <h4 class="content-header-title"><b><?= $this->title ?></b></h4>
        </div>
        <div class="col-xs-6 text-right">
            <a class="btn btn-success btn-flat open-window" link="<?= Url::to(['role/add'])?>" title="添加角色" width="400px" height="500px">添加角色</a>
            <a class="btn btn-danger btn-flat batch-confirm" link="<?= Url::to(['role/delete'])?>" title="删除角色" msg="确认删除选中的角色？" callback="cbRefreshTable">删除</a>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="container-fluid content">
    <div class="row">
        <form class="search-form">
            <div class="col-xs-3 col-lg-2 mr-b-10">
                <input type="text" class="form-control" name="name" placeholder="请输入角色名称" title="角色名称">
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
            <table id="bootstrap-table"data-url="<?= Url::to(['role/get-list'])?>" data-classes="table table-hover table-condensed"
                    data-side-pagination="server" data-pagination="true" data-side-pagination="server" >
                <thead>
                <tr>
                    <th data-checkbox="true"></th>
                    <th data-align="center" data-field="id">ID</th>
                    <th data-field="name" data-align="left">名称</th>
                    <th data-align="center" data-field="status" data-formatter="int2status">状态</th>
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
            return '<label class="label bg-green">启用</label>';
        }else{
            return '<label class="label bg-red">禁用</label>';
        }
    }

    var editUrl = "<?= Url::to(['role/edit', 'id'=>'ROLE_ID']); ?>";
    var allotUrl = "<?= Url::to(['role/allot', 'id'=>'ROLE_ID']); ?>";
    var delUrl = "<?= Url::to(['role/delete', 'id'=>'ROLE_ID']); ?>";
    function getBtn(value, row, index) {
        var url1 = editUrl.replace(/ROLE_ID/, value);
        var url2 = allotUrl.replace(/ROLE_ID/, value);
        var url3 = delUrl.replace(/ROLE_ID/, value);
        var html = '<a class="btn btn-primary btn-flat btn-xs open-window" title="编辑角色 - '+row.name+'" link="'+url1+'" width="400px" height="500px">编辑</a> ';
        html += '<a class="btn btn-info btn-flat btn-xs" href="'+url2+'">角色授权</a> ';
        html += '<a class="btn btn-danger btn-flat btn-xs open-confirm" title="删除角色" msg="确认删除角色【'+row.name+'】？" link="'+url3+'" callback="cbRefreshTable">删除</a>';
        return html;
    }

</script>

<?php }); ?>

