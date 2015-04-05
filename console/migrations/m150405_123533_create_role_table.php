<?php

use yii\db\Schema;
use yii\db\Migration;

class m150405_123533_create_role_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%role}}', [
            'id' => Schema::TYPE_PK,
            'role_name' => Schema::TYPE_STRING . ' NOT NULL',
            'role_value' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);

        $this->createIndex('role_name', '{{%role}}', 'role_name');
        $this->createIndex('role_value', '{{%role}}', 'role_value');
    }

    public function down()
    {
        $this->dropIndex('role_name', '{{%role}}');
        $this->dropIndex('role_value', '{{%role}}');

        $this->dropTable('{{%role}}');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
