<?php

namespace app\components\behaviors;

use app\models\Image;
use Yii;
use yii\base\Behavior;
use yii\base\Exception;
use yii\db\ActiveRecord;
use yii\helpers\FileHelper;
use yii\validators\Validator;
use yii\web\UploadedFile;

/**
 * Class UploadImageBehavior
 * @package app\components\behaviors
 *
 * @property Image $owner
 *
 */
class UploadImageMultipleBehavior extends Behavior
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public $uploadCatalog;

    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_VALIDATE => 'beforeValidate',
            ActiveRecord::EVENT_BEFORE_INSERT   => 'beforeInsert',
            ActiveRecord::EVENT_BEFORE_DELETE   => 'beforeDelete',
        ];
    }

    public function attach($owner)
    {
        /**
         * @var $owner ActiveRecord
         */

        parent::attach($owner);

        $validator = Validator::createValidator('file', $owner, ['imageFile'], ['skipOnEmpty' => true, 'extensions' => 'png, jpg']);
        $owner->validators[] = $validator;
    }

    public function beforeValidate()
    {
        $this->imageFile = UploadedFile::getInstance($this->owner, 'imageFile');
    }

    public function beforeInsert()
    {
        if ($this->imageFile) {
            $this->upload();
        }
    }

    public function beforeDelete()
    {
        return $this->removeOldImage();
    }

    public function upload()
    {
        $fileName = $this->generateFileName();

        $this->owner->file_name = $fileName . '.' . $this->imageFile->extension;

        $file = $this->createPathImg() . $this->owner->file_name;

        return $this->imageFile->saveAs($file);
    }

    protected function getPathImg()
    {
        $path = '/images/adverts/' . $this->owner->advert_id . '/';

        return $path;
    }

    protected function removeOldImage()
    {
        $filename = Yii::getAlias('@app/web') . $this->getPathImg() . $this->owner->file_name;

        if (file_exists($filename)) {
            return unlink($filename);
        }

        return false;
    }

    protected function createPathImg()
    {
        $pathBeforeImage = Yii::getAlias('@app/web'). $this->getPathImg();

        try {
            FileHelper::createDirectory($pathBeforeImage);
        } catch (Exception $e) {
        }

        return $pathBeforeImage;
    }

    protected function generateFileName()
    {

        $randomNumber = time()+rand(0,1000);

        $fileName = mb_strtolower($this->uploadCatalog . '_' . $this->owner->advert_id . '_' . $randomNumber);

        return $fileName;
    }

}