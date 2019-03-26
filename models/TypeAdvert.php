<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "type_advert".
 *
 * @property int $id
 * @property string $name
 */
class TypeAdvert extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'type_advert';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Тип объявления',
        ];
    }
}
