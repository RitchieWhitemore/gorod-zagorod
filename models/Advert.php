<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "advert".
 *
 * @property int $id
 * @property int $type_advert_id
 * @property int $property_id
 * @property int $location_id
 * @property int $price
 * @property string $description
 * @property string $coordinates
 *
 * @property Location $location
 * @property TypeAdvert $typeAdvert
 * @property Property $property
 */
class Advert extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'advert';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_advert_id', 'property_id', 'location_id', 'price'], 'integer'],
            [['description'], 'string'],
            [['coordinates'], 'string', 'max' => 255],
            [['location_id'], 'exist', 'skipOnError' => true, 'targetClass' => Location::className(), 'targetAttribute' => ['location_id' => 'id']],
            [['type_advert_id'], 'exist', 'skipOnError' => true, 'targetClass' => TypeAdvert::className(), 'targetAttribute' => ['type_advert_id' => 'id']],
            [['property_id'], 'exist', 'skipOnError' => true, 'targetClass' => Property::className(), 'targetAttribute' => ['property_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'type_advert_id' => 'Тип объявления',
            'property_id' => 'Недвижимость',
            'location_id' => 'Локация',
            'price' => Yii::t('app', 'Price'),
            'description' => Yii::t('app', 'Description'),
            'coordinates' => Yii::t('app', 'Coordinates'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocation()
    {
        return $this->hasOne(Location::className(), ['id' => 'location_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTypeAdvert()
    {
        return $this->hasOne(TypeAdvert::className(), ['id' => 'type_advert_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProperty()
    {
        return $this->hasOne(Property::className(), ['id' => 'property_id']);
    }
}
