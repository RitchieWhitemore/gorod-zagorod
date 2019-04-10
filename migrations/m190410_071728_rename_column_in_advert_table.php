<?php

use yii\db\Migration;

/**
 * Class m190410_071728_rename_column_in_advert_table
 */
class m190410_071728_rename_column_in_advert_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn('advert', 'coordinates', 'link_map');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->renameColumn('advert', 'link_map', 'coordinates');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190410_071728_rename_column_in_advert_table cannot be reverted.\n";

        return false;
    }
    */
}
