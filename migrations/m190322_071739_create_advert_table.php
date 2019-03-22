<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%advert}}`.
 */
class m190322_071739_create_advert_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%advert}}', [
            'id' => $this->primaryKey(),
            'type_id' => $this->integer(1)->notNull()->defaultValue(0),
            'property_id' => $this->integer(2)->notNull()->defaultValue(0),
            'location_id' => $this->integer(),
            'price' => $this->integer(),
            'description' => $this->text(),
            'coordinates' => $this->string(),
        ]);

        $this->createIndex('idx-location-location_id', 'advert', 'location_id');
        $this->addForeignKey('fk-location-location_id', 'advert', 'location_id', 'location', 'id', 'SET NULL', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-location-location_id', 'advert');
        $this->dropIndex('idx-location-location_id', 'advert');
        $this->dropTable('{{%advert}}');
    }
}
