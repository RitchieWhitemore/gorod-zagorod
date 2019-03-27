<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%property}}`.
 */
class m190327_085437_create_property_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%property}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);

        $this->createIndex('idx-advert-property_id', 'advert', 'property_id');

        $this->addForeignKey('fk-advert-property_id', 'advert', 'property_id', 'property', 'id', 'RESTRICT', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-advert-property_id', 'advert');

        $this->dropIndex('idx-advert-property_id', 'advert');

        $this->dropTable('{{%property}}');
    }
}
