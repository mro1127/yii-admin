<?php

use yii\db\Migration;

/**
 * Handles the creation of table `rbac`.
 */
class m180930_031147_create_rbac_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('menu', [
            'menu_id'        => $this->primaryKey(),
            'menu_pid'       => $this->integer(11)->comment('父级ID'),
            'menu_name'      => $this->string(20)->comment('菜单名'),
            'menu_icon'      => $this->string(50)->comment('图标'),
            'menu_sort'      => $this->integer(4)->comment('排序'),
            'menu_url'       => $this->string(255)->comment('菜单链接'),
            'menu_level'     => $this->tinyInteger(1)->comment('菜单等级'),
            'menu_status'    => $this->tinyInteger(1)->comment('状态：1启用，0禁用'),
            'menu_system'    => $this->string(20)->comment('所属系统'),
            'node_id'        => $this->integer(11)->comment('关联节点'),
            'menu_shortcuts' => $this->tinyInteger(1)->comment('加入快捷操作，0否1是'),
            'status'         => $this->tinyInteger(1)->notNull()->defaultValue(1)->comment('数据状态'),
            'created_at'     => $this->integer(11)->comment('添加时间'),
            'created_by'     => $this->integer(11)->comment('添加操作人'),
            'updated_at'     => $this->integer(11)->comment('更新时间'),
            'updated_by'     => $this->integer(11)->comment('更新操作人'),
        ]);

        $this->createTable('node', [
            'node_id'     => $this->primaryKey(),
            'node_pid'    => $this->integer(11)->comment('父级ID'),
            'node_name'   => $this->string(20)->comment('节点名'),
            'node_path'   => $this->string(20)->comment('节点路径（系统名，模块名）'),
            'node_level'  => $this->tinyInteger(1)->comment('节点等级'),
            'node_status' => $this->tinyInteger(1)->comment('状态：1启用，0禁用'),
            'node_system' => $this->string(20)->comment('所属系统'),
            'node_sort'   => $this->integer(4)->comment('排序'),
            'status'      => $this->tinyInteger(1)->notNull()->defaultValue(1)->comment('数据状态'),
            'created_at'  => $this->integer(11)->comment('添加时间'),
            'created_by'  => $this->integer(11)->comment('添加操作人'),
            'updated_at'  => $this->integer(11)->comment('更新时间'),
            'updated_by'  => $this->integer(11)->comment('更新操作人'),
        ]);

        $this->createTable('role', [
            'role_id'     => $this->primaryKey(),
            'role_name'   => $this->string(20)->comment('角色名'),
            'role_status' => $this->tinyInteger(1)->comment('状态：1启用，0禁用'),
            'role_sort'   => $this->integer(4)->comment('排序'),
            'status'      => $this->tinyInteger(1)->notNull()->defaultValue(1)->comment('数据状态'),
            'created_at'  => $this->integer(11)->comment('添加时间'),
            'created_by'  => $this->integer(11)->comment('添加操作人'),
            'updated_at'  => $this->integer(11)->comment('更新时间'),
            'updated_by'  => $this->integer(11)->comment('更新操作人'),
        ]);

        $this->createTable('role_node', [
            'role_id' => $this->integer(11)->comment('角色ID'),
            'node_id' => $this->integer(11)->comment('节点ID'),
        ]);

        $this->createTable('role_user', [
            'role_id' => $this->integer(11)->comment('角色ID'),
            'user_id' => $this->integer(11)->comment('用户ID'),
        ]);
        $this->addCommentOnTable('menu', '菜单表');
        $this->addCommentOnTable('node', '节点表');
        $this->addCommentOnTable('role', '角色表');
        $this->addCommentOnTable('role_node', '角色-节点关联表');
        $this->addCommentOnTable('role_user', '角色-用户关联表');

        $this->batchInsert('menu',
            ['menu_id','menu_pid','menu_name','menu_icon','menu_sort','menu_url','menu_level','menu_status','menu_system','menu_shortcuts'],
            [
                [1,0,'backend 后台','',1,'site/home',1,1,'backend',0],
                [10,1,'权限管理','fa fa-id-card-o',10,'',2,1,'backend',0],
                [11,10,'菜单管理','fa fa-navicon',11,'auth/menu/index',3,1,'backend',1],
                [12,10,'节点管理','fa fa-check-circle-o',12,'auth/node/index',3,1,'backend',0],
                [13,10,'角色管理','fa fa-user-circle',14,'auth/role/index',3,1,'backend',0],
                [14,10,'用户管理','fa fa-users',1,'user/user/index',3,1,'backend',0],
                [37,1,'GII','fa fa-gears',16,'gii',2,1,'backend',0],
                [38,1,'DEMO','fa fa-bars',17,'',2,1,'backend',0],
                [39,38,'上传文件','fa fa-upload',1,'demo/file-upload',3,1,'backend',0],
                [40,38,'选择图标','fa fa-file-photo-o',2,'common/choose-icon',3,1,'backend',0]
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('menu');
        $this->dropTable('node');
        $this->dropTable('role');
        $this->dropTable('role_node');
        $this->dropTable('role_user');
    }
}
