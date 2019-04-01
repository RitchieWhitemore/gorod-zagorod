<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "advert".
 *
 * @property int $id
 * @property int $type_advert_id
 * @property int $property_id
 * @property int $location_id
 * @property int $price
 * @property int $status
 * @property string $description
 * @property string $coordinates
 * @property string $address
 *
 * @property Location $location
 * @property TypeAdvert $typeAdvert
 * @property Property $property
 * @property Image $images
 * @property CharacteristicValue $area
 */
class Advert extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

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
            [['type_advert_id', 'property_id', 'location_id', 'price', 'status'], 'integer'],
            [['description', 'street', 'house', 'apartment'], 'string'],
            [['coordinates'], 'string', 'max' => 255],
            [
                ['location_id'],
                'exist',
                'skipOnError'     => true,
                'targetClass'     => Location::className(),
                'targetAttribute' => ['location_id' => 'id']
            ],
            [
                ['type_advert_id'],
                'exist',
                'skipOnError'     => true,
                'targetClass'     => TypeAdvert::className(),
                'targetAttribute' => ['type_advert_id' => 'id']
            ],
            [
                ['property_id'],
                'exist',
                'skipOnError'     => true,
                'targetClass'     => Property::className(),
                'targetAttribute' => ['property_id' => 'id']
            ],

            ['status', 'integer'],
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => array_keys(self::getStatusesArray())],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'             => Yii::t('app', 'ID'),
            'type_advert_id' => 'Тип объявления',
            'property_id'    => 'Недвижимость',
            'location_id'    => 'Локация',
            'price'          => Yii::t('app', 'Price'),
            'description'    => Yii::t('app', 'Description'),
            'coordinates'    => Yii::t('app', 'Coordinates'),
            'street'         => 'Улица',
            'house'          => 'Дом',
            'apartment'      => 'Квартира',
            'status'         => 'Статус',
            'address'        => 'Адрес',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Image::className(), ['advert_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCharacteristicValues()
    {
        return $this->hasMany(CharacteristicValue::className(), ['advert_id' => 'id']);
    }

    public function getCharacteristics()
    {
        return $this->hasMany(Characteristic::className(), ['id' => 'characteristic_id'])->viaTable('characteristic_value', ['advert_id' => 'id']);
    }

    public function getStatusName()
    {
        return ArrayHelper::getValue(self::getStatusesArray(), $this->status);
    }

    public function getAddress()
    {
        $address = '';

        if (!empty($this->street)) {
            $address .= "ул. {$this->street}";
        }

        if (!empty($this->house)) {
            if ($address != '') $address .= ', ';

            $address .= "д. {$this->house}";
        }

        if (!empty($this->apartment)) {
            if ($address != '') $address .= ', ';

            $address .= "кв. {$this->apartment}";
        }


        return $address;
    }

    public function getArea()
    {
        return $this->getCharacteristicValues()->where(['characteristic_id' => 1])->one();
    }

    public function getMainImageUrl()
    {
        $main = $this->getImages()->where(['main' => 1])->limit(1)->one();

        if ($main == null) {
            $main = $this->getImages()->limit(1)->one();
        }

        return '/images/adverts/' . $this->id . '/' . $main;

    }

    public static function getStatusesArray()
    {
        return [
            self::STATUS_ACTIVE   => 'Активен',
            self::STATUS_INACTIVE => 'Не активен',
        ];
    }
}
