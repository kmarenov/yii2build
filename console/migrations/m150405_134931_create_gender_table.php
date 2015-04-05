<?php

use yii\db\Schema;
use yii\db\Migration;

class m150405_134931_create_gender_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%gender}}', [
            'id' => Schema::TYPE_PK,
            'gender_name' => Schema::TYPE_STRING . ' NOT NULL',
        ], $tableOptions);

        $this->createIndex('gender_name', '{{%gender}}', 'gender_name');
    }

    public function down()
    {
        $this->dropIndex('gender_name', '{{%gender}}');

        $this->dropTable('{{%gender}}');
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
