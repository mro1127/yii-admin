<?php

use yii\db\Migration;

/**
 * Class m190516_093645_del_dev_menu
 */
class m190516_093645_del_dev_menu extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        if (env('SITE_NAME') != 'yii-admin') {
            $this->execute("
                UPDATE `menu` SET `menu_status` = 0 WHERE `menu_id` in (37,38,39,40,43);
            ");
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190516_093645_del_dev_menu cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190516_093645_del_dev_menu cannot be reverted.\n";

        return false;
    }
    */
}
