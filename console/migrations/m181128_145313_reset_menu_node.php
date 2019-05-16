<?php

use yii\db\Migration;

/**
 * Class m181128_145313_reset_menu_node
 */
class m181128_145313_reset_menu_node extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->delete('node');
        $this->delete('menu');

        if (env('SITE_NAME') != 'yii-admin') {
            $this->execute("ALTER TABLE node AUTO_INCREMENT = 10000");
            $this->execute("ALTER TABLE menu AUTO_INCREMENT = 10000");
        }

        $this->execute("
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (1, 0, '后台名称', 'backend', 1, 1, 'backend', 100, 1, 1541432930, 1, 1541432930, 1);
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (2, 1, '默认控制器', 'site', 2, 1, 'backend', 100, 1, 1541432930, 1, 1541432930, 1);
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (3, 2, '首页', 'index', 3, 1, 'backend', 100, 1, 1541432930, 1, 1541432930, 1);
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (4, 2, '首页', 'home', 3, 1, 'backend', 100, 1, 1541432931, 1, 1541432931, 1);
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (5, 1, '权限模块', 'auth', 2, 1, 'backend', 100, 1, 1541435233, 1, 1541435233, 1);
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (6, 5, '菜单管理', 'menu', 3, 1, 'backend', 100, 1, 1541435233, 1, 1541435233, 1);
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (7, 6, '菜单列表页', 'index', 4, 1, 'backend', 100, 1, 1541435233, 1, 1541435233, 1);
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (8, 5, '节点管理', 'node', 3, 1, 'backend', 100, 1, 1541435233, 1, 1541435233, 1);
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (9, 8, '节点列表页', 'index', 4, 1, 'backend', 100, 1, 1541435233, 1, 1541435233, 1);
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (10, 5, '角色管理', 'role', 3, 1, 'backend', 100, 1, 1541435233, 1, 1541435233, 1);
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (11, 10, '角色列表页', 'index', 4, 1, 'backend', 100, 1, 1541435233, 1, 1541435233, 1);
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (12, 1, '用户模块', 'user', 2, 1, 'backend', 100, 1, 1541435233, 1, 1541435233, 1);
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (13, 12, '用户管理', 'user', 3, 1, 'backend', 100, 1, 1541435233, 1, 1541435233, 1);
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (14, 13, '用户列表页', 'index', 4, 1, 'backend', 100, 1, 1541435233, 1, 1541435233, 1);
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (15, 1, 'gii', 'gii', 2, 1, 'backend', 100, 1, 1541435233, 1, 1541435233, 1);
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (16, 1, 'demo', 'demo', 2, 1, 'backend', 100, 1, 1541435233, 1, 1541435233, 1);
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (17, 16, '文件上传demo', 'file-upload', 3, 1, 'backend', 100, 1, 1541435233, 1, 1541435233, 1);
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (18, 1, '通用控制器', 'common', 2, 1, 'backend', 100, 1, 1541435233, 1, 1541435233, 1);
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (19, 18, '选择图标', 'choose-icon', 3, 1, 'backend', 100, 1, 1541435233, 1, 1541435233, 1);
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (20, 1, '系统功能模块', 'system', 2, 1, 'backend', 100, 1, 1541435233, 1, 1541435233, 1);
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (21, 20, '数据字典', 'key-storage-item', 3, 1, 'backend', 100, 1, 1541435233, 1, 1541435233, 1);
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (22, 21, '数据字典列表页', 'index', 4, 1, 'backend', 100, 1, 1541435233, 1, 1541435233, 1);
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (23, 13, '获取用户列表', 'get-list', 4, 1, 'backend', 100, 1, 1542704509, 1, 1542704509, 1);
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (24, 13, '添加用户', 'add', 4, 1, 'backend', 100, 1, 1542704512, 1, 1542704512, 1);
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (25, 6, '获取菜单列表', 'get-list', 4, 1, 'backend', 100, 1, 1542705406, 1, 1542705406, 1);
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (26, 21, '获取数据字典列表', 'get-list', 4, 1, 'backend', 100, 1, 1542706892, 1, 1542706892, 1);
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (27, 8, '获取节点列表', 'get-list', 4, 1, 'backend', 100, 1, 1542706901, 1, 1542706901, 1);
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (28, 10, '获取角色列表', 'get-list', 4, 1, 'backend', 100, 1, 1542707246, 1, 1542707246, 1);
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (29, 10, '添加角色', 'add', 4, 1, 'backend', 100, 1, 1542707603, 1, 1542707603, 1);
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (30, 21, '添加数据字典', 'add', 4, 1, 'backend', 100, 1, 1542707682, 1, 1542707682, 1);
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (31, 13, '编辑用户', 'edit', 4, 1, 'backend', 100, 1, 1542708503, 1, 1542708503, 1);
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (32, 6, '编辑菜单', 'edit', 4, 1, 'backend', 100, 1, 1542708537, 1, 1542708537, 1);
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (33, 6, '添加菜单', 'add', 4, 1, 'backend', 100, 1, 1542708681, 1, 1542708681, 1);
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (34, 8, '编辑节点', 'edit', 4, 1, 'backend', 100, 1, 1542711159, 1, 1542711159, 1);
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (35, 13, '上传用户头像', 'face-upload', 4, 1, 'backend', 100, 1, 1541429998, 1, 1541429998, 1);
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (36, 13, '检查用户名', 'check-username', 4, 1, 'backend', 100, 1, 1541430046, 1, 1541430046, 1);
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (37, 8, '添加节点', 'add', 4, 1, 'backend', 100, 1, NULL, 1, NULL, 1);
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (38, 8, '删除节点', 'delete', 4, 1, 'backend', 100, 1, NULL, 1, NULL, 1);
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (39, 10, '角色授权', 'allot', 4, 1, 'backend', 100, 1, NULL, 1, NULL, 1);

        ");
        
        $this->execute("
            INSERT INTO `menu`(`menu_id`, `menu_pid`, `menu_name`, `menu_icon`, `menu_sort`, `menu_url`, `menu_level`, `menu_status`, `menu_system`, `node_id`, `menu_shortcuts`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `menu_operate`) VALUES (1, 0, 'backend 后台', '', 1, '', 1, 1, 'backend', 0, 0, 1, NULL, NULL, 1541427573, 1, 1);
            INSERT INTO `menu`(`menu_id`, `menu_pid`, `menu_name`, `menu_icon`, `menu_sort`, `menu_url`, `menu_level`, `menu_status`, `menu_system`, `node_id`, `menu_shortcuts`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `menu_operate`) VALUES (10, 41, '权限管理', 'fa fa-id-card-o', 10, '', 3, 1, 'backend', 0, 0, 1, NULL, NULL, 1541427573, 1, 1);
            INSERT INTO `menu`(`menu_id`, `menu_pid`, `menu_name`, `menu_icon`, `menu_sort`, `menu_url`, `menu_level`, `menu_status`, `menu_system`, `node_id`, `menu_shortcuts`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `menu_operate`) VALUES (11, 10, '菜单管理', 'fa fa-navicon', 11, 'auth/menu/index', 4, 1, 'backend', 7, 1, 1, NULL, NULL, 1543422479, NULL, 1);
            INSERT INTO `menu`(`menu_id`, `menu_pid`, `menu_name`, `menu_icon`, `menu_sort`, `menu_url`, `menu_level`, `menu_status`, `menu_system`, `node_id`, `menu_shortcuts`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `menu_operate`) VALUES (12, 10, '节点管理', 'fa fa-check-circle-o', 12, 'auth/node/index', 4, 1, 'backend', 9, 0, 1, NULL, NULL, 1543422479, NULL, 1);
            INSERT INTO `menu`(`menu_id`, `menu_pid`, `menu_name`, `menu_icon`, `menu_sort`, `menu_url`, `menu_level`, `menu_status`, `menu_system`, `node_id`, `menu_shortcuts`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `menu_operate`) VALUES (13, 10, '角色管理', 'fa fa-user-circle', 14, 'auth/role/index', 4, 1, 'backend', 11, 0, 1, NULL, NULL, 1543422479, NULL, 1);
            INSERT INTO `menu`(`menu_id`, `menu_pid`, `menu_name`, `menu_icon`, `menu_sort`, `menu_url`, `menu_level`, `menu_status`, `menu_system`, `node_id`, `menu_shortcuts`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `menu_operate`) VALUES (14, 41, '用户管理', 'fa fa-users', 1, 'user/user/index', 3, 1, 'backend', 14, 0, 1, NULL, NULL, 1543422479, NULL, 1);
            INSERT INTO `menu`(`menu_id`, `menu_pid`, `menu_name`, `menu_icon`, `menu_sort`, `menu_url`, `menu_level`, `menu_status`, `menu_system`, `node_id`, `menu_shortcuts`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `menu_operate`) VALUES (37, 38, 'GII', 'fa fa-gears', 16, 'gii', 4, 1, 'backend', 15, 0, 1, NULL, NULL, 1543422479, NULL, 1);
            INSERT INTO `menu`(`menu_id`, `menu_pid`, `menu_name`, `menu_icon`, `menu_sort`, `menu_url`, `menu_level`, `menu_status`, `menu_system`, `node_id`, `menu_shortcuts`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `menu_operate`) VALUES (38, 41, 'DEMO', 'fa fa-bars', 17, '', 3, 1, 'backend', 0, 0, 1, NULL, NULL, 1543075362, 1, 1);
            INSERT INTO `menu`(`menu_id`, `menu_pid`, `menu_name`, `menu_icon`, `menu_sort`, `menu_url`, `menu_level`, `menu_status`, `menu_system`, `node_id`, `menu_shortcuts`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `menu_operate`) VALUES (39, 38, '上传文件', 'fa fa-upload', 1, 'demo/file-upload', 4, 1, 'backend', 17, 0, 1, NULL, NULL, 1543422479, NULL, 1);
            INSERT INTO `menu`(`menu_id`, `menu_pid`, `menu_name`, `menu_icon`, `menu_sort`, `menu_url`, `menu_level`, `menu_status`, `menu_system`, `node_id`, `menu_shortcuts`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `menu_operate`) VALUES (40, 38, '选择图标', 'fa fa-file-photo-o', 2, 'common/choose-icon', 4, 1, 'backend', 19, 0, 1, NULL, NULL, 1543422479, NULL, 1);
            INSERT INTO `menu`(`menu_id`, `menu_pid`, `menu_name`, `menu_icon`, `menu_sort`, `menu_url`, `menu_level`, `menu_status`, `menu_system`, `node_id`, `menu_shortcuts`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `menu_operate`) VALUES (41, 1, '系统设置', 'fa fa-cog', 18, '', 2, 1, 'backend', 0, 0, 1, NULL, NULL, 1541427574, 1, 1);
            INSERT INTO `menu`(`menu_id`, `menu_pid`, `menu_name`, `menu_icon`, `menu_sort`, `menu_url`, `menu_level`, `menu_status`, `menu_system`, `node_id`, `menu_shortcuts`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `menu_operate`) VALUES (42, 41, '数据字典', 'fa fa-book', 1, 'system/key-storage-item/index', 3, 1, 'backend', 22, 4, 1, NULL, NULL, 1543422479, NULL, 1);
            INSERT INTO `menu`(`menu_id`, `menu_pid`, `menu_name`, `menu_icon`, `menu_sort`, `menu_url`, `menu_level`, `menu_status`, `menu_system`, `node_id`, `menu_shortcuts`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `menu_operate`) VALUES (43, 38, 'TEST', 'fa fa-code', 3, 'demo/test', 4, 1, 'backend', 35, 0, 1, 1538557420, 1, 1543422479, NULL, 1);
       ");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181128_145313_reset_menu_node cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181128_145313_reset_menu_node cannot be reverted.\n";

        return false;
    }
    */
}
