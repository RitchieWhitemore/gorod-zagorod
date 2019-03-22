<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%type_location}}`.
 */
class m190322_121956_create_type_location_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%type_location}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);

        $this->addColumn('location', 'type_location_id', $this->integer());

        $this->createIndex('idx-location-type_location_id', 'location', 'type_location_id');

        $this->addForeignKey('fk-location-type_location_id', 'location', 'type_location_id', 'type_location', 'id', 'RESTRICT', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-location-type_location_id', 'location');

        $this->dropIndex('idx-location-type_location_id', 'location');

        $this->dropColumn('location', 'type_location_id');

        $this->dropTable('{{%type_location}}');
    }
}
