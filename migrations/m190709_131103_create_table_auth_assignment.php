<?php

use yii\db\Migration;

class m190709_131103_create_table_auth_assignment extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%auth_assignment}}', [
            'item_name' => $this->string()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'created_at' => $this->integer(),
        ], $tableOptions);

        $this->addPrimaryKey('PRIMARYKEY', '{{%auth_assignment}}', ['item_name', 'user_id']);
        $this->createIndex('user_id', '{{%auth_assignment}}', 'user_id');
        $this->addForeignKey('auth_assignment_ibfk_1', '{{%auth_assignment}}', 'item_name', '{{%auth_item}}', 'name', 'CASCADE', 'CASCADE');
        $this->addForeignKey('auth_assignment_ibfk_2', '{{%auth_assignment}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%auth_assignment}}');
    }
}
