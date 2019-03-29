<?php

namespace app\models;

use app\components\behaviors\UploadImageMultipleBehavior;
use Yii;

/**
 * This is the model class for table "image".
 *
 * @property int $id
 * @property string $file_name
 * @property int $advert_id
 * @property int $main
 *
 * @property Advert $advert
 */
class Image extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'image';
    }

    public function behaviors()
    {
        return [
            [
                'class'         => UploadImageMultipleBehavior::className(),
                'fileNameField' => 'file_name',
                'catalog'       => 'adverts',
            ],
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['advert_id'], 'required'],
            [['advert_id', 'main'], 'integer'],
            [['file_name'], 'string', 'max' => 255],
            [['advert_id'], 'exist', 'skipOnError' => true, 'targetClass' => Advert::className(), 'targetAttribute' => ['advert_id' => 'id']],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'file_name' => 'Имя файла',
            'advert_id' => 'Номер объявления',
            'main' => 'Главная',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdvert()
    {
        return $this->hasOne(Advert::className(), ['id' => 'advert_id']);
    }
}
