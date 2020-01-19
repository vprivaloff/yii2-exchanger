<?php

use yii\db\Schema;
use yii\db\Migration;

class m200119_015439_exchanger extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        //Опции для mysql
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        //Создание таблицы IP пользователей
        $this->createTable('{{%exchanger}}', [
            'id' => $this->primaryKey(),
            'key' => Schema::TYPE_INTEGER . ' NOT NULL',
            'currency' => Schema::TYPE_STRING . ' NOT NULL',
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('{{%tests}}');
    }
}
