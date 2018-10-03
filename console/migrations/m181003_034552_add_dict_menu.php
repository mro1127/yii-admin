<?php

use yii\db\Migration;

/**
 * Class m181003_034552_add_dict_menu
 */
class m181003_034552_add_dict_menu extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("ALTER TABLE menu AUTO_INCREMENT = 10000");

        $this->batchInsert('menu',
            ['menu_id','menu_pid','menu_name','menu_icon','menu_sort','menu_url','menu_level','menu_status','menu_system','menu_shortcuts','status'],
            [
                [41,1, '系统设置', 'fa fa-cog', '18', '', '2', '1', 'backend', 0,1],
                [42,41, '数据字典', 'fa fa-book', '1', 'system/key-storage-item/index', '3', '1', 'backend', '4',1]
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181003_034552_add_dict_menu cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181003_034552_add_dict_menu cannot be reverted.\n";

        return false;
    }
    */
}
