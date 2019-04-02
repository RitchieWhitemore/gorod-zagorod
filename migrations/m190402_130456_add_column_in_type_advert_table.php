<?php

use yii\db\Migration;

/**
 * Class m190402_130456_add_column_in_type_advert_table
 */
class m190402_130456_add_column_in_type_advert_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('type_advert', 'name_type_offer', $this->string()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('type_advert', 'name_type_offer');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190402_130456_add_column_in_type_advert_table cannot be reverted.\n";

        return false;
    }
    */
}
