<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m180929_173226_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id'                   => $this->primaryKey(),
            'username'             => $this->string(50)->notNull()->comment('账号'),
            'auth_key'             => $this->string(32)->notNull(),
            'password_hash'        => $this->string(255)->notNull(),
            'password_reset_token' => $this->string(255)->comment('重置密码token'),
            'email'                => $this->string(255)->comment('邮箱'),
            'tel'                  => $this->string(50)->comment('联系电话'),
            'sex'                  => $this->string(1)->comment('性别'),
            'birthday'             => $this->date()->comment('生日'),
            'name'                 => $this->string(50)->comment('姓名'),
            'face_base_url'        => $this->string(1024)->comment('头像'),
            'face'                 => $this->string(1024)->comment('头像基础路劲'),
            'user_status'          => $this->tinyInteger(1)->notNull()->defaultValue(1)->comment('用户状态，0禁用1正常'),
            'status'               => $this->tinyInteger(1)->notNull()->defaultValue(1)->comment('数据状态'),
            'created_at'           => $this->integer(11)->comment('添加时间'),
            'created_by'           => $this->integer(11)->comment('添加操作人'),
            'updated_at'           => $this->integer(11)->comment('更新时间'),
            'updated_by'           => $this->integer(11)->comment('更新操作人'),
        ]);
        $this->addCommentOnTable('user', '用户表');

        $this->insert('user', [
            'id'                   => 1,
            'username'             => 'admin',
            'auth_key'             => 'DQO5RgixU6dFkkHim7JJ4SPqvrSheXnF',
            'password_hash'        => '$2y$13$zVf.hmfUSTujlEh.RuRfvuN28cflRJUxjmg2A5E/lNd4OVGMpdzXO',
            'sex'                  => '男',
            'birthday'             => date('Y-m-d'),
            'name'                 => '超级管理员',
            'face_base_url'        => 'http://storage.yii2admin.test/source',
            'face'                 => '1/GKnRvJQQJg-E81JKbfPumqiZSxR8HoFz.jpg',
            'created_at'           => time(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');
    }
}
