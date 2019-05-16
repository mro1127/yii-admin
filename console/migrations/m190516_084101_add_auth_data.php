<?php

use yii\db\Migration;

/**
 * Class m190516_084101_add_auth_data
 */
class m190516_084101_add_auth_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (47, 10, '删除角色', 'delete', 4, 1, 'backend', 100, 1, 1557995399, 1, 1557995399, 1);
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (46, 10, '角色授权', 'allot', 4, 1, 'backend', 100, 1, 1557995394, 1, 1557995394, 1);
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (45, 10, '编辑角色', 'edit', 4, 1, 'backend', 100, 1, 1557995390, 1, 1557995390, 1);
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (44, 8, '删除节点', 'delete', 4, 1, 'backend', 100, 1, 1557995339, 1, 1557995339, 1);
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (43, 8, '添加节点', 'add', 4, 1, 'backend', 100, 1, 1557995319, 1, 1557995319, 1);
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (42, 21, '删除字典', 'delete', 4, 1, 'backend', 100, 1, 1557995306, 1, 1557995306, 1);
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (41, 21, '编辑字典', 'edit', 4, 1, 'backend', 100, 1, 1557995300, 1, 1557995300, 1);
       ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190516_084101_add_auth_data cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190516_084101_add_auth_data cannot be reverted.\n";

        return false;
    }
    */
}
