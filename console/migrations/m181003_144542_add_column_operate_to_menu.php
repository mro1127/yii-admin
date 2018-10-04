<?php

use yii\db\Migration;

/**
 * Class m181003_144542_add_column_operate_to_menu
 */
class m181003_144542_add_column_operate_to_menu extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('menu', 'menu_operate', $this->tinyInteger(1)->notNull()->defaultValue(1)->comment('操作方式：1打开tab, 2新增tab，3窗口模式'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('menu', 'menu_operate');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181003_144542_add_column_operate_to_menu cannot be reverted.\n";

        return false;
    }
    */
}
