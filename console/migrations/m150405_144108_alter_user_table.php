<?php

use yii\db\Schema;
use yii\db\Migration;

class m150405_144108_alter_user_table extends Migration
{
    public function up()
    {
        $this->renameColumn('{{%user}}', 'status', 'status_id');
        $this->alterColumn('{{%user}}', 'status_id', 'integer not null default 1');
        $this->addColumn('{{%user}}', 'role_id', 'integer not null default 1');
        $this->addColumn('{{%user}}', 'user_type_id', 'integer not null default 1');
        $this->alterColumn('{{%user}}', 'created_at', 'datetime not null');
        $this->alterColumn('{{%user}}', 'updated_at', 'datetime not null');

        $this->createIndex('username', '{{%user}}', 'username', true);
        $this->createIndex('email', '{{%user}}', 'email', true);
        $this->createIndex('role_id', '{{%user}}', 'role_id');
        $this->createIndex('status_id', '{{%user}}', 'status_id');
        $this->createIndex('user_type_id', '{{%user}}', 'user_type_id');
        $this->createIndex('created_at', '{{%user}}', 'created_at');
        $this->createIndex('updated_at', '{{%user}}', 'updated_at');

        $this->addForeignKey(
            'user_role_id', '{{%user}}',
            'role_id', '{{%role}}', 'id'
        );

        $this->addForeignKey(
            'user_status_id', '{{%user}}',
            'status_id', '{{%status}}', 'id'
        );

        $this->addForeignKey(
            'user_type_id', '{{%user}}',
            'user_type_id', '{{%user_type}}', 'id'
        );
    }

    public function down()
    {
        $this->dropForeignKey('user_role_id', '{{%user}}');
        $this->dropForeignKey('user_status_id', '{{%user}}');
        $this->dropForeignKey('user_type_id', '{{%user}}');

        $this->dropIndex('username', '{{%user}}');
        $this->dropIndex('email', '{{%user}}');
        $this->dropIndex('role_id', '{{%user}}');
        $this->dropIndex('status_id', '{{%user}}');
        $this->dropIndex('user_type_id', '{{%user}}');
        $this->dropIndex('created_at', '{{%user}}');
        $this->dropIndex('updated_at', '{{%user}}');

        $this->renameColumn('{{%user}}', 'status_id', 'status');
        $this->alterColumn('{{%user}}', 'status', 'smallint not null default 10');
        $this->dropColumn('{{%user}}', 'role_id');
        $this->dropColumn('{{%user}}', 'user_type_id');
        $this->alterColumn('{{%user}}', 'created_at', 'integer not null');
        $this->alterColumn('{{%user}}', 'updated_at', 'integer not null');
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
