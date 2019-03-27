<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%image}}`.
 */
class m190327_121627_create_image_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%image}}', [
            'id' => $this->primaryKey(),
            'file_name' => $this->string()->notNull(),
            'advert_id' => $this->integer()->notNull(),
            'main' => $this->boolean(),
        ]);

        $this->createIndex('idx-image-advert_id', 'image', 'advert_id');

        $this->addForeignKey('fk-image-advert_id', 'image', 'advert_id', 'advert', 'id', 'CASCADE', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-image-advert_id', 'image');

        $this->dropIndex('idx-image-advert_id', 'image');

        $this->dropTable('{{%image}}');
    }
}
