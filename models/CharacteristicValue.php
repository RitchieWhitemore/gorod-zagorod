<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "characteristic_value".
 *
 * @property int $advert_id
 * @property int $characteristic_id
 * @property string $value
 *
 * @property Advert $advert
 * @property Characteristic $characteristic
 */
class CharacteristicValue extends \yii\db\ActiveRecord
{
    const SCENARIO_TABULAR = 'tabular';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'characteristic_value';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['advert_id', 'characteristic_id'], 'required'],
            [['value'], 'required', 'except' => self::SCENARIO_TABULAR],
            [['advert_id', 'characteristic_id'], 'integer'],
            [['value'], 'string', 'max' => 255],
            [['advert_id', 'characteristic_id'], 'unique', 'targetAttribute' => ['advert_id', 'characteristic_id']],
            [['advert_id'], 'exist', 'skipOnError' => true, 'targetClass' => Advert::className(), 'targetAttribute' => ['advert_id' => 'id']],
            [['characteristic_id'], 'exist', 'skipOnError' => true, 'targetClass' => Characteristic::className(), 'targetAttribute' => ['characteristic_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'advert_id' => 'Объявление',
            'characteristic_id' => 'Характеристика',
            'value' => 'Значение',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdvert()
    {
        return $this->hasOne(Advert::className(), ['id' => 'advert_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCharacteristic()
    {
        return $this->hasOne(Characteristic::className(), ['id' => 'characteristic_id']);
    }

    public function __toString()
    {
        return $this->value;
    }
}
