<?php

use yii\db\Schema;
use yii\db\Migration;

class m150405_202236_insert_gender_table extends Migration
{
    public function up()
    {
        $this->insert('{{%gender}}', [
            'gender_name' => 'male',
        ]);

        $this->insert('{{%gender}}', [
            'gender_name' => 'female',
        ]);
    }

    public function down()
    {
        $this->delete('{{%gender}}', ['gender_name' => 'male']);
        $this->delete('{{%gender}}', ['gender_name' => 'female']);
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
