<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%characteristic}}`.
 */
class m190329_124416_create_characteristic_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%characteristic}}', [
            'id'   => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);

        $this->createTable('{{%characteristic_value}}', [
            'advert_id'         => $this->integer()->notNull(),
            'characteristic_id' => $this->integer()->notNull(),
            'value'             => $this->string()->notNull()
        ]);

        $this->addPrimaryKey('pk_value', 'characteristic_value', ['advert_id', 'characteristic_id']);

        $this->createIndex('idx-characteristic_value-advert_id', 'characteristic_value', 'advert_id');
        $this->createIndex('idx-characteristic_value-characteristic_id', 'characteristic_value', 'characteristic_id');

        $this->addForeignKey('fk-characteristic_value-advert_id', 'characteristic_value', 'advert_id', 'advert', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk-characteristic_value-characteristic_id', 'characteristic_value', 'characteristic_id', 'characteristic', 'id', 'CASCADE', 'RESTRICT');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%characteristic_value}}');
        $this->dropTable('{{%characteristic}}');
    }
}
