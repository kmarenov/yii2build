<?php

use yii\db\Schema;
use yii\db\Migration;

class m150405_190954_insert_status_table extends Migration
{
    public function up()
    {
        $this->insert('{{%status}}', [
            'status_name' => 'Active',
            'status_value' => '10',
        ]);

        $this->insert('{{%status}}', [
            'status_name' => 'Pending',
            'status_value' => '5',
        ]);
    }

    public function down()
    {
        $this->delete('{{%status}}', ['status_value' => '10']);
        $this->delete('{{%status}}', ['status_value' => '5']);
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
