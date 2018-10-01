<?php 
use yii\helpers\Url;
$this->registerAssetBundle('BootstrapTable');

$this->title = '用户列表';

 ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="row">
        <div class="col-xs-6">
            <h4 class="content-header-title"><b><?= $this->title ?></b></h4>
        </div>
        <div class="col-xs-6 text-right">
            <a class="btn btn-success btn-flat" href="<?= Url::to(['user/add'])?>" title="添加用户">添加用户</a>
            <a class="btn btn-danger btn-flat batch-confirm" link="<?= Url::to(['user/delete'])?>" title="删除用户" msg="确认删除选中的用户？" callback="cbRefreshTable">删除</a>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="container-fluid content">
    <div class="row">
        <form class="search-form">
            <div class="col-xs-3 col-lg-2 mr-b-10">
                <input type="text" class="form-control" name="name" placeholder="请输入姓名" title="姓名">
            </div>
            <div class="col-xs-3 col-lg-2 mr-b-10">
                <input type="text" class="form-control" name="username" placeholder="请输入账号" title="账号">
            </div>
            <div class="col-xs-3 col-lg-2 mr-b-10">
                <input type="text" class="form-control" name="tel" placeholder="请输入联系电话" title="联系电话">
            </div>
            <div class="col-xs-3 col-lg-2 mr-b-10">
                <select class="form-control" name="status" title="状态">
                    <option value="">状态</option>
                    <option value="1">启用</option>
                    <option value="0">禁用</option>
                </select>
            </div>
            <div class="col-xs-3 col-lg-2 mr-b-10">
                <select class="form-control" name="sex" title="性别">
                    <option value="">性别</option>
                    <option value="男">男</option>
                    <option value="女">女</option>
                </select>
            </div>
            <div class="col-xs-3 col-lg-2 mr-b-10">
                <button class="btn btn-primary btn-flat" title="">搜索</button>
            </div>
        </form>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <table id="table" data-toggle="table" data-url="<?= Url::to(['user/get-list'])?>" data-classes="table table-hover table-condensed"
                    data-side-pagination="server" data-pagination="true" data-side-pagination="server" >
                <thead>
                <tr>
                    <th data-checkbox="true"></th>
                    <th data-align="center" data-field="id">ID</th>
                    <th data-field="name">姓名</th>
                    <th data-field="username">账号</th>
                    <th data-field="email">邮箱</th>
                    <th data-field="tel">联系电话</th>
                    <th data-align="center" data-field="sex">性别</th>
                    <th data-align="center" data-field="birthday">生日</th>
                    <th data-align="center" data-field="user_status" data-formatter="int2status">状态</th>
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

    var editUrl = "<?= Url::to(['user/edit', 'id'=>'DATA_ID']); ?>";
    var delUrl = "<?= Url::to(['user/delete', 'id'=>'DATA_ID']); ?>";
    function getBtn(value, row, index) {
        var url1 = editUrl.replace(/DATA_ID/, value);
        var url3 = delUrl.replace(/DATA_ID/, value);
        var html = '<a class="btn btn-primary btn-flat btn-xs" title="编辑用户 - '+row.name+'" href="'+url1+'">编辑</a> ';
        html += '<a class="btn btn-danger btn-flat btn-xs open-confirm" title="删除用户" msg="确认删除用户【'+row.name+'】？" link="'+url3+'" callback="cbRefreshTable">删除</a>';
        return html;
    }


    $(function() {

    })

</script>

<?php }); ?>

