<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "type_location".
 *
 * @property int $id
 * @property string $name
 * @property string $short_name
 *
 * @property Location[] $locations
 */
class TypeLocation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'type_location';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'short_name'], 'required'],
            [['name', 'short_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'         => 'ID',
            'name'       => 'Тип локации',
            'short_name' => 'Краткое наименование'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocations()
    {
        return $this->hasMany(Location::className(), ['type_location_id' => 'id']);
    }
}
