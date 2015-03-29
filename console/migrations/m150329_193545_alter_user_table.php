<?php

use yii\db\Schema;
use yii\db\Migration;

class m150329_193545_alter_user_table extends Migration
{
    public function up()
    {
        $this->renameColumn('user', 'status', 'status_id');
        $this->alterColumn('user', 'status_id', 'integer not null default 1');
        $this->addColumn('user', 'role_id', 'integer not null default 1');
        $this->addColumn('user', 'user_type_id', 'integer not null default 1');
        $this->alterColumn('user', 'created_at', 'datetime not null');
        $this->alterColumn('user', 'updated_at', 'datetime not null');
    }

    public function down()
    {
        $this->renameColumn('user', 'status_id', 'status');
        $this->alterColumn('user', 'status', 'smallint not null default 10');
        $this->dropColumn('user', 'role_id');
        $this->dropColumn('user', 'user_type_id');
        $this->alterColumn('user', 'created_at', 'integer not null');
        $this->alterColumn('user', 'updated_at', 'integer not null');
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
