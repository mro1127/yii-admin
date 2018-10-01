<?php

use yii\db\Migration;

/**
 * Handles the creation of table `key_storage_item`.
 */
class m181001_024801_create_key_storage_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('key_storage_item', [
            'key'         => $this->string(128)->notNull(),
            'value'       => $this->string(100)->comment('值'),
            'option'      => $this->text()->comment('可选值,json'),
            'type'        => $this->string(20)->comment('类型: config,dict'),
            'application' => $this->string(20)->comment('所属应用（backend，frontend...）'),
        ]);

        $this->addPrimaryKey('pk_key_storage_item_key', 'key_storage_item', 'key');
        $this->addCommentOnTable('key_storage_item', '数据字典');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('key_storage_item');
    }
}
