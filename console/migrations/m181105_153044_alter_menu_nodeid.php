<?php

use yii\db\Migration;

/**
 * Class m181105_153044_alter_menu_nodeid
 */
class m181105_153044_alter_menu_nodeid extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->update('menu', ['node_id'=>0], 'node_id IS NULL');
        $this->alterColumn('menu', 'node_id', $this->integer(11)->notNull()->defaultValue(0)->comment('节点ID'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181105_153044_alter_menu_nodeid cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181105_153044_alter_menu_nodeid cannot be reverted.\n";

        return false;
    }
    */
}
