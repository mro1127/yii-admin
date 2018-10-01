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
            'is_system'   => $this->tinyInteger(1)->notNull()->defaultValue(0)->comment('是否系统使用，是则无法删除'),
            'status'      => $this->tinyInteger(1)->notNull()->defaultValue(1)->comment('数据状态'),
            'created_at'  => $this->integer(11)->comment('添加时间'),
            'created_by'  => $this->integer(11)->comment('添加操作人'),
            'updated_at'  => $this->integer(11)->comment('更新时间'),
            'updated_by'  => $this->integer(11)->comment('更新操作人'),
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
