<?php 
use yii\helpers\Url;

$this->registerAssetBundle('iCheck');
$this->registerAssetBundle('Vue');
$this->title = Yii::$app->controller->action->id == 'add'? '添加酒店':'编辑酒店';
 ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="row">
        <div class="col-xs-6">
            <h4 class="content-header-title"><b><?= $this->title ?></b></h4>
        </div>
    </div>
</section>


<!-- Main content -->
<section class="content">
    <form class="form-horizontal" method="post" action="<?= Url::to(); ?>">
        <div class="form-body">
            <div class="form-group">
                <label class="col-sm-2 control-label"><i class="fa fa-asterisk text-red"></i> 名称 </label>
                <div class="col-sm-6">
                    <input type="text" name="name" value="<?= $info->name ?>" class="form-control" placeholder="请输入酒店名称">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label"><i class="fa fa-asterisk text-red"></i> 分类 </label>
                <div class="col-sm-6">
                    <input type="text" name="flag" value="<?= $info->flag ?>" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">排序</label>
                <div class="col-sm-6">
                    <input type="number" name="sort" value="<?= $info->sort?>" class="form-control" placeholder="请输入酒店排序，越小越靠前">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">状态</label>
                <div class="col-sm-6">
                     <?=yii\helpers\Html::radioList('hotel_status',isset($info->hotel_status)? $info->hotel_status:1,['1'=>'抓取','0'=>'不抓取'],['class'=>'icheck-minimal-c mr-t-6']);?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">平台</label>
                <div class="col-sm-6">
                     <?=yii\helpers\Html::radioList('type',isset($info->type)? $info->type:1,['1'=>'美团','2'=>'携程'],['class'=>'icheck-minimal-c mr-t-6']);?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">美团平台ID</label>
                <div class="col-sm-6">
                    <input type="text" name="meituan_code" value="<?= $info->meituan_code?>" class="form-control code" placeholder="链接上的ID">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">携程平台ID</label>
                <div class="col-sm-6">
                    <input type="text" name="ctrip_code" value="<?= $info->ctrip_code?>" class="form-control code" placeholder="链接上的ID">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">抓取天数</label>
                <div class="col-sm-6">
                    <input type="number" name="day" value="<?= $info->day?>" class="form-control" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">星期</label>
                <div class="col-sm-10  mr-t-6">
                    <label><input type="checkbox" class="icheck-minimal-red check-week-all"> 全部</label>
                     <?=yii\helpers\Html::checkboxList('week',[],['1'=>'一','2'=>'二','3'=>'三','4'=>'四','5'=>'五','6'=>'六','0'=>'日'],['class'=>'icheck-minimal-c mr-t-6']);?>

                </div>
            </div>

            <div class="form-group" id="parents">
                <label class="col-sm-2 control-label">母产品 </label>
                <div class="col-sm-10">
                    <a class="btn btn-success btn-flat" title="添加母产品" @click="addItem()">添加</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr class="info">
                                <th>母产品ID</th>
                                <th>第一房型</th>
                                <th>第二房型</th>
                                <th>采购价</th>
                                <th>早餐</th>
                                <th>代理</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- ID 第一房型 第二房型 采购价 早餐 代理 -->
                            <tr v-for="(item, index) in items">
                                <td><input type="number" class="form-control" :name="`parents[${index}][id]`" v-model="item.id"></td>
                                <td><input type="text" class="form-control" :name="`parents[${index}][type]`" v-model="item.type"></td>
                                <td><input type="text" class="form-control" :name="`parents[${index}][up_type]`" v-model="item.up_type"></td>
                                <td>
                                    <label>
                                        <input type="radio" value="1" :name="`parents[${index}][purchase]`" v-model="item.purchase" class="icheck-minimal">有
                                    </label>
                                    <label>
                                        <input type="radio" value="0" :name="`parents[${index}][purchase]`" v-model="item.purchase" class="icheck-minimal">无
                                    </label>
                                </td>
                                <td>
                                    <label>
                                        <input type="radio" value="1" :name="`parents[${index}][breakfast]`" v-model="item.breakfast" class="icheck-minimal">必须
                                    </label>
                                    <label>
                                        <input type="radio" value="0" :name="`parents[${index}][breakfast]`" v-model="item.breakfast" class="icheck-minimal">可无
                                    </label>
                                </td>
                                <td>
                                    <label>
                                        <input type="radio" value="1" :name="`parents[${index}][agent]`" v-model="item.agent" class="icheck-minimal">可接受
                                    </label>
                                    <label>
                                        <input type="radio" value="0" :name="`parents[${index}][agent]`" v-model="item.agent" class="icheck-minimal">不接受
                                    </label>
                                </td>
                                <td><a class="btn btn-danger btn-sm btn-flat delete" @click="items.splice(index,1)">删除</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="form-footer">
            <button type="submit" class="btn btn-primary btn-flat common-ajax-submit">提交</button>
            <?php if (Yii::$app->controller->action->id == 'add') { ?>
            <button type="submit" class="btn btn-success btn-flat ajax-submit">继续添加</button>
            <?php } ?>
        </div>
    </form>
</section>
<!-- /.content -->

<?php \Yii::$app->view->on($this::EVENT_END_PAGE, function ($event) { ?>
<script type="text/javascript">

var vm = new Vue({
    el: '#parents',
    delimiters: ['${', '}'],
    data: {
        items: <?php echo empty($event->data)? "[]":$event->data ?>
    },
    methods: {
        addItem: function () {
            this.items.push({id: "", purchase:1, breakfast:0, agent:1})
        },
    }
})

$(function() {
    $('.code').change(function(event) {
        var index = $(this).index('.code');
        $('input[name=type]').eq(index).iCheck('check');
    });
    // 星期， 全选
    $('.check-week-all').on('ifChecked', function(event){
        $("input[name='week[]']").iCheck('check');
    });
    // 星期， 全不选
    $('.check-week-all').on('ifUnchecked', function(event){
        $("input[name='week[]']").iCheck('uncheck');
    });
    $(".check-week-all").iCheck('check');

    if ($('.ajax-submit').length > 0) {
        initSubmit('.ajax-submit',function(data) {
            if (data.status == 1) {
                $("input[name=name],input[name=meituan_code],input[name=ctrip_code]").val('');
                var sort = parseInt($("input[name=sort]").val()) + 1;
                $("input[name=sort]").val(sort);
                vm.items = []
            }
        });
    }
})
</script>
<?php }, $parents); ?>
