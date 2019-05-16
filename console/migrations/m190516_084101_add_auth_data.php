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
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (47, 21, '删除字典', 'delete', 4, 1, 'backend', 100, 1, 1557998291, 1, 1557998291, 1);
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (46, 21, '编辑字典', 'edit', 4, 1, 'backend', 100, 1, 1557998286, 1, 1557998286, 1);
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (45, 21, '检查字典key', 'check-key', 4, 1, 'backend', 100, 1, 1557998279, 1, 1557998279, 1);
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (44, 10, '删除角色', 'delete', 4, 1, 'backend', 100, 1, 1557998222, 1, 1557998222, 1);
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (43, 10, '编辑角色', 'edit', 4, 1, 'backend', 100, 1, 1557998217, 1, 1557998217, 1);
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (41, 6, '删除菜单', 'delete', 4, 1, 'backend', 100, 1, 1557998032, 1, 1557998032, 1);
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
