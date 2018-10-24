<?php

use yii\db\Migration;

/**
 * Class m181016_155447_alter_column_change_length_in_node
 */
class m181016_155447_alter_column_change_length_in_node extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('node', 'node_name', $this->string(255)->comment('节点名'));
        $this->alterColumn('node', 'node_path', $this->string(255)->comment('节点路径（系统名，模块名）'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('node', 'node_name', $this->string(20)->comment('节点名'));
        $this->alterColumn('node', 'node_path', $this->string(20)->comment('节点路径（系统名，模块名）'));
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181016_155447_alter_column_change_length_in_node cannot be reverted.\n";

        return false;
    }
    */
}
