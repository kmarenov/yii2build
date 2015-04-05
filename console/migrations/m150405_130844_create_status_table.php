<?php

use yii\db\Schema;
use yii\db\Migration;

class m150405_130844_create_status_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%status}}', [
            'id' => Schema::TYPE_PK,
            'status_name' => Schema::TYPE_STRING . ' NOT NULL',
            'status_value' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);

        $this->createIndex('status_name', '{{%status}}', 'status_name');
        $this->createIndex('status_value', '{{%status}}', 'status_value');
    }

    public function down()
    {
        $this->dropIndex('status_name', '{{%status}}');
        $this->dropIndex('status_value', '{{%status}}');

        $this->dropTable('{{%status}}');
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
