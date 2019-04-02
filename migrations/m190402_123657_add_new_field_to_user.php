<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m190402_123657_add_new_field_to_user
 */
class m190402_123657_add_new_field_to_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190402_123657_add_new_field_to_user cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $this->addColumn('{{%user}}', 'sponser_id', Schema::TYPE_STRING);
    }

    public function down()
    {
        $this->dropColumn('{{%user}}', 'sponser_id');
    }
    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190402_123657_add_new_field_to_user cannot be reverted.\n";

        return false;
    }
    */
}
