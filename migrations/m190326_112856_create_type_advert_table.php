<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%type_advert}}`.
 */
class m190326_112856_create_type_advert_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%type_advert}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);

        $this->renameColumn('advert', 'type_id', 'type_advert_id');

        $this->createIndex('idx-type_advert-type_advert_id', 'advert', 'type_advert_id');

        $this->addForeignKey('fk-type_advert-type_advert_id', 'advert', 'type_advert_id', 'type_advert', 'id', 'RESTRICT', 'RESTRICT');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-type_advert-type_advert_id', 'advert');

        $this->dropIndex('idx-type_advert-type_advert_id', 'advert');

        $this->dropTable('{{%type_advert}}');
    }
}
