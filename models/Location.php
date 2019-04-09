<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "location".
 *
 * @property int $id
 * @property int $type_location_id
 * @property string $name
 * @property string $name_where
 *
 * @property Advert[] $adverts
 * @property TypeLocation[] $typeLocation
 */
class Location extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'location';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'type_location_id', 'name_where'], 'required'],
            [['name', 'name_where'], 'string', 'max' => 255],
            [['type_location_id'], 'exist', 'skipOnError' => true, 'targetClass' => TypeLocation::className(), 'targetAttribute' => ['type_location_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => 'Локация',
            'name_where' => 'Склонение в форме "где"',
            'type_location_id' => 'Тип локации',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdverts()
    {
        return $this->hasMany(Advert::className(), ['location_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTypeLocation()
    {
        return $this->hasOne(TypeLocation::className(), ['id' => 'type_location_id']);
    }
}
