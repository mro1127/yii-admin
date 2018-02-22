<?php 
use yii\helpers\Url;
$this->registerAssetBundle('BootstrapTable');

$this->title = '节点列表';

 ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?= $this->title ?></h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row mr-b-10 pull-right">
        <div class="col-xs-12">
            <a class="btn btn-success btn-flat" href="<?= Url::to(['node/add'])?>">添加节点</a>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <table id="table" data-toggle="table" data-url="<?= Url::to(['node/get-list'])?>" data-classes="table table-hover table-condensed">
                <thead>
                <tr>
                    <th data-align="center" data-field="id">ID</th>
                    <th data-field="title" data-align="left" data-class="switch">名称</th>
                    <th data-field="path" data-align="left">路径</th>
                    <th data-align="center" data-field="pid">父节点</th>
                    <th data-align="center" data-field="level">层级</th>
                    <th data-align="center" data-field="system">系统</th>
                    <th data-align="center" data-field="status" data-formatter="int2status">状态</th>
                    <th data-align="center" data-field="sort">排序</th>
                    <th data-align="center" data-field="id" data-formatter="get_btn">操作</th>
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

    var editUrl = "<?= Url::to(['node/edit', 'id'=>'NODE_ID']); ?>";
    var addUrl = "<?= Url::to(['node/add', 'pid'=>'NODE_ID']); ?>";
    var delUrl = "<?= Url::to(['node/delete', 'id'=>'NODE_ID']); ?>";
    function get_btn(value, row, index) {
        var url1 = editUrl.replace(/NODE_ID/, value);
        var url2 = addUrl.replace(/NODE_ID/, value);
        var url3 = delUrl.replace(/NODE_ID/, value);
        var html = '<a class="btn btn-primary btn-flat btn-xs " title="编辑节点 - '+row.name+'" href="'+url1+'">编辑</a> ';
        html += '<a class="btn btn-success btn-flat btn-xs " title="添加子节点 - '+row.name+'" href="'+url2+'">添加子节点</a> ';
        html += '<a class="btn btn-danger btn-flat btn-xs open-confirm" title="删除节点" msg="确认删除节点【'+row.name+'】及其所有子节点？" link="'+url3+'" callback="cbRefreshTable">删除</a>';
        return html;
    }


    $(function() {

        $(document).on('click', '.switch', function() {
            var $this = $(this).parent('tr');
            var child = $this.attr('child'),
                level = $this.find('td').eq(4).text();
            if (!child || child=='') child = "show";

            if (child == 'show') {
                $this.attr('child', 'hide');
            }else{
                $this.attr('child', 'show');
            }
            $this.nextAll().each(function(index, el) {
                if (level < $(this).find('td').eq(4).text()) {
                    if (child == 'show') {
                        $(this).attr('child', 'hide');
                        $(this).hide();
                    }else{
                        $(this).attr('child', 'show');
                        $(this).show();
                    }
                }else{
                    return false;
                }
            });
        })
    })

</script>

<?php }); ?>

