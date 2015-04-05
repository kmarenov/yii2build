<?php

use yii\db\Schema;
use yii\db\Migration;

class m150405_201039_insert_user_type_table extends Migration
{
    public function up()
    {
        $this->insert('{{%user_type}}', [
            'user_type_name' => 'Free',
            'user_type_value' => '10',
        ]);

        $this->insert('{{%user_type}}', [
            'user_type_name' => 'Paid',
            'user_type_value' => '30',
        ]);
    }

    public function down()
    {
        $this->delete('{{%user_type}}', ['user_type_value' => '10']);
        $this->delete('{{%user_type}}', ['user_type_value' => '30']);
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
