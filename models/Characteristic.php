<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "characteristic".
 *
 * @property int $id
 * @property string $name
 *
 * @property CharacteristicValue[] $characteristicValues
 * @property Advert[] $adverts
 */
class Characteristic extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'characteristic';
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
            'name' => 'Характеристика',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCharacteristicValues()
    {
        return $this->hasMany(CharacteristicValue::className(), ['characteristic_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdverts()
    {
        return $this->hasMany(Advert::className(), ['id' => 'advert_id'])->viaTable('characteristic_value', ['characteristic_id' => 'id']);
    }
}
