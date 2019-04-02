<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "type_advert".
 *
 * @property int $id
 * @property string $name
 * @property string $name_type_offer
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
            [['name', 'name_type_offer'], 'required'],
            [['name', 'name_type_offer'], 'string', 'max' => 255],
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
            'name_type_offer' => 'Имя предложения (выводится в плашке объявления)'
        ];
    }
}
