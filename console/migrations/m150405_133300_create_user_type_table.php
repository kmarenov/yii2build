<?php

use yii\db\Schema;
use yii\db\Migration;

class m150405_133300_create_user_type_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user_type}}', [
            'id' => Schema::TYPE_PK,
            'user_type_name' => Schema::TYPE_STRING . ' NOT NULL',
            'user_type_value' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);

        $this->createIndex('user_type_name', '{{%user_type}}', 'user_type_name');
        $this->createIndex('user_type_value', '{{%user_type}}', 'user_type_value');
    }

    public function down()
    {
        $this->dropIndex('user_type_name', '{{%user_type}}');
        $this->dropIndex('user_type_value', '{{%user_type}}');

        $this->dropTable('{{%user_type}}');
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
