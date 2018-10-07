<?php 
use yii\helpers\Url;

$this->registerAssetBundle('Select2');
$this->registerAssetBundle('iCheck');

$this->title = Yii::$app->controller->action->id == 'add'? '添加菜单':'编辑菜单';
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
                    <input type="text" name="name" value="<?= $info->menu_name ?>" class="form-control" placeholder="请输入菜单名称">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">链接</label>
                <div class="col-sm-6">
                    <input type="text" name="url" value="<?= $info->menu_url ?>" class="form-control" placeholder="请输入菜单路径，小写">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">图标</label>
                <div class="col-sm-6">
                    <div class="mr-t-6">
                        <?php if (empty($info->menu_icon)) { ?>
                            <i class="fa fa-files-o fa-lg" id="icon"></i>
                            <a class="btn btn-xs btn-primary open-window" link="<?= Url::to(["/common/choose-icon"])?>" title="选择图标"  maxmin="1">修改</a>
                            <input type="hidden" name="icon" value="fa fa-files-o">
                        <?php }else{ ?>
                            <i class="<?= $info->menu_icon ?> fa-lg" id="icon"></i>
                            <a class="btn btn-xs btn-primary open-window" link="<?= Url::to(["/common/choose-icon"])?>" title="选择图标"  maxmin="1">修改</a>
                            <input type="hidden" name="icon" value="<?= $info->menu_icon ?>">
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">父菜单</label>
                <div class="col-sm-6">
                    <select name="pid" value="<?= $info->menu_pid?>" class="form-control select2">
                        <option value="0">系统</option>
                        <?php 
                            foreach ($menu as $k => $v) { 
                                if ($v['id'] == $info->menu_pid || $v['id'] == $pid) {
                        ?>
                            <option value="<?= $v['id'] ?>" selected><?= $v['title'] ?></option>
                        <?php }elseif ($v['id'] == $info->menu_id || $v['pid'] == $info->menu_id){ ?>
                            <option value="<?= $v['id'] ?>" disabled><?= $v['title'] ?></option>
                        <?php }else{ ?>
                            <option value="<?= $v['id'] ?>" ><?= $v['title'] ?></option>
                        <?php } } ?>
                    </select>
                </div>
            </div>
            <div class="form-group" id="system">
                <label class="col-sm-2 control-label"><i class="fa fa-asterisk text-red"></i> 系统 </label>
                <div class="col-sm-6">
                    <input type="text" name="system" value="<?= $info->menu_system ?>" class="form-control" placeholder="请输入系统名称，小写英文">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">排序</label>
                <div class="col-sm-6">
                    <input type="number" name="sort" value="<?= $info->menu_sort?>" class="form-control" placeholder="请输入菜单排序，越小越靠前">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">状态</label>
                <div class="col-sm-6">
                     <?=yii\helpers\Html::radioList('status',isset($info->menu_status)? $info->menu_status:1,[1=>'正常',0=>'禁用'],['class'=>'icheck-minimal-c mr-t-6']);?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">快捷操作</label>
                <div class="col-sm-6">
                     <?=yii\helpers\Html::radioList('shortcuts',isset($info->menu_shortcuts)? $info->menu_shortcuts:0,[1=>'是',0=>'否'],['class'=>'icheck-minimal-c mr-t-6']);?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">打开方式</label>
                <div class="col-sm-6">
                     <?=yii\helpers\Html::radioList('operate',isset($info->menu_status)? $info->menu_status:1,[1=>'打开tab',2=>'新增tab',3=>'打开窗口'],['class'=>'icheck-minimal-c mr-t-6']);?>
                </div>
            </div>
        </div>

        <div class="form-footer">
            <button type="submit" class="btn btn-primary btn-flat ajax-submit">提交</button>
        </div>
    </form>
</section>
<!-- /.content -->

<?php \Yii::$app->view->on($this::EVENT_END_PAGE, function () { ?>
<script type="text/javascript">
$(function() {
    initValidate({
        rules: {
            name: {
                required: true,
                maxlength: 20,
            },
            path: {
                maxlength: 255,
            },
        },
        messages: {
            name: {
                required: "请输入菜单名称",
                maxlength: "菜单名称不能超过20个字符",
            },
            path: {
                maxlength: "菜单路径不能超过255个字符",
            },
        },
    });

    initSubmit('.ajax-submit', null, function() {
        if ($('select[name=pid]').val()==0 && $('input[name=system]').val()=='') {
            layer.tips('系统级菜单必须输入系统', $('input[name=system]'), {tipsMore:true, time:2000, tips: [2, '#DD4B39']});
            return false;
        }
        if (!$('.ajax-submit').parents('form').valid()) return false;
        return true;
    })

    $('select[name=pid]').change(function() {
        if($(this).val() == 0){
            $('#system').show();
        }else{
            $('#system').hide();
        }
    }).change();
})


function setIcon(icon) {
    $('#icon').attr('class', icon+' fa-lg');
    $('input[name=icon]').val(icon);
}
</script>
<?php }); ?>