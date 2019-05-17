<?php

use yii\db\Migration;

/**
 * Class m190517_072612_add_auth_data
 */
class m190517_072612_add_auth_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
            INSERT INTO `role`(`role_id`, `role_name`, `role_status`, `role_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (1, '基础登录权限', 1, 0, 1, 1558077804, 1, 1558077804, 1);
            INSERT INTO `role_node`(`role_id`, `node_id`) VALUES (1, 1);
            INSERT INTO `role_node`(`role_id`, `node_id`) VALUES (1, 2);
            INSERT INTO `role_node`(`role_id`, `node_id`) VALUES (1, 3);
            INSERT INTO `role_node`(`role_id`, `node_id`) VALUES (1, 4);
        ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190517_072612_add_auth_data cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190517_072612_add_auth_data cannot be reverted.\n";

        return false;
    }
    */
}
