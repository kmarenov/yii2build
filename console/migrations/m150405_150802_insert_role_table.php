<?php

use yii\db\Schema;
use yii\db\Migration;

class m150405_150802_insert_role_table extends Migration
{
    public function up()
    {
        $this->insert('{{%role}}', [
            'role_name' => 'User',
            'role_value' => '10',
        ]);

        $this->insert('{{%role}}', [
            'role_name' => 'Admin',
            'role_value' => '20',
        ]);
    }

    public function down()
    {
        $this->delete('{{%role}}', ['role_value' => '10']);
        $this->delete('{{%role}}', ['role_value' => '20']);
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
