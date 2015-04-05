<?php

use yii\db\Schema;
use yii\db\Migration;

class m150405_140457_create_profile_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%profile}}', [
            'id' => Schema::TYPE_PK,
            'user_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'first_name' => Schema::TYPE_STRING,
            'last_name' => Schema::TYPE_STRING,
            'birthdate' => Schema::TYPE_DATE,
            'gender_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_at' => Schema::TYPE_DATETIME,
            'updated_at' => Schema::TYPE_DATETIME,
        ], $tableOptions);

        $this->createIndex('user_id', '{{%profile}}', 'user_id');
        $this->createIndex('first_name', '{{%profile}}', 'first_name');
        $this->createIndex('last_name', '{{%profile}}', 'last_name');
        $this->createIndex('birthdate', '{{%profile}}', 'birthdate');
        $this->createIndex('gender_id', '{{%profile}}', 'gender_id');
        $this->createIndex('created_at', '{{%profile}}', 'created_at');
        $this->createIndex('updated_at', '{{%profile}}', 'updated_at');

        $this->addForeignKey(
            'profile_user_id', "{{%profile}}",
            'user_id', '{{%user}}', 'id'
        );

        $this->addForeignKey(
            'profile_gender_id', "{{%profile}}",
            'gender_id', '{{%gender}}', 'id'
        );

    }

    public function down()
    {
        $this->dropForeignKey("profile_user_id", "{{%profile}}");
        $this->dropForeignKey("profile_gender_id", "{{%profile}}");

        $this->dropIndex('user_id', '{{%profile}}');
        $this->dropIndex('first_name', '{{%profile}}');
        $this->dropIndex('last_name', '{{%profile}}');
        $this->dropIndex('birthdate', '{{%profile}}');
        $this->dropIndex('gender_id', '{{%profile}}');
        $this->dropIndex('created_at', '{{%profile}}');
        $this->dropIndex('updated_at', '{{%profile}}');

        $this->dropTable('{{%profile}}');
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
