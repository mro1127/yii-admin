<?php

use yii\db\Migration;

/**
 * Handles the creation of table `file_storage_item`.
 */
class m180930_040350_create_file_storage_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('file_storage_item', [
            'id'         => $this->primaryKey(),
            'component'  => $this->string(255)->notNull(),
            'base_url'   => $this->string(1024)->comment('基础路径')->notNull(),
            'path'       => $this->string(1024)->comment('路径')->notNull(),
            'type'       => $this->string(255)->comment('类型'),
            'size'       => $this->integer(11)->comment('大小'),
            'name'       => $this->string(255)->comment('文件名'),
            'upload_ip'  => $this->string(15)->comment('上传IP'),
            'created_at' => $this->integer(11)->comment('添加时间')->notNull(),
        ]);
        $this->addCommentOnTable('file_storage_item', '上传附件表');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('file_storage_item');
    }
}
