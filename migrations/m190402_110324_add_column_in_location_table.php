<?php

use yii\db\Migration;

/**
 * Class m190402_110324_add_column_in_location_table
 */
class m190402_110324_add_column_in_location_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('location', 'name_where', $this->string()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('location', 'name_where');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190402_110324_add_column_in_location_table cannot be reverted.\n";

        return false;
    }
    */
}
