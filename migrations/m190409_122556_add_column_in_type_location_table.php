<?php

use yii\db\Migration;

/**
 * Class m190409_122556_add_column_in_type_location_table
 */
class m190409_122556_add_column_in_type_location_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('type_location', 'short_name', $this->string(10)->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('type_location', 'short_name');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190409_122556_add_column_in_type_location_table cannot be reverted.\n";

        return false;
    }
    */
}
