<?php

use yii\db\Migration;

/**
 * Class m190613_135353_create_table_auth
 */
class m190613_135353_create_table_auth extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('auth', [
            'id' => $this->primaryKey()->unsigned(),
            'user_id' => $this->integer()->notNull()->unsigned(),
            'source' => $this->string()->notNull(),
            'source_id' => $this->string()->notNull(),
        ]);

        $this->addForeignKey('fk-auth-user_id-user-id', 'auth', 'user_id', 'user', 'id', 'restrict', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        {
        $this->dropForeignKey('fk-auth-user_id-user-id','auth');
        $this->dropTable('auth');
    }

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190613_135353_create_table_auth cannot be reverted.\n";

        return false;
    }
    */
}
