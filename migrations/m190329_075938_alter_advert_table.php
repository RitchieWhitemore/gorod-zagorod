<?php

use yii\db\Migration;

/**
 * Class m190329_075938_alter_advert_table
 */
class m190329_075938_alter_advert_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('advert', 'street', $this->string());
        $this->addColumn('advert', 'house', $this->string());
        $this->addColumn('advert', 'apartment', $this->string());
        $this->addColumn('advert', 'status', $this->boolean()->defaultValue(1));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('advert', 'street');
        $this->dropColumn('advert', 'house');
        $this->dropColumn('advert', 'apartment');
        $this->dropColumn('advert', 'status');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190329_075938_alter_advert_table cannot be reverted.\n";

        return false;
    }
    */
}
