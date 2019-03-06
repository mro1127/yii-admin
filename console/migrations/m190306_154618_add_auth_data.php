<?php

use yii\db\Migration;

/**
 * Class m190306_154618_add_auth_data
 */
class m190306_154618_add_auth_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
            INSERT INTO `node`(`node_id`, `node_pid`, `node_name`, `node_path`, `node_level`, `node_status`, `node_system`, `node_sort`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (40, 13, '删除用户', 'delete', 4, 1, 'backend', 100, 1, 1551886804, 1, 1551886804, 1);
       ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190306_154618_add_auth_data cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190306_154618_add_auth_data cannot be reverted.\n";

        return false;
    }
    */
}
