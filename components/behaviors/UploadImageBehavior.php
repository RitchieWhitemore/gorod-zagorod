<?php

namespace app\components\behaviors;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\FileHelper;
use yii\validators\Validator;
use yii\web\UploadedFile;

/**
 * Class UploadImageBehavior
 * @package app\components\behaviors
 *
 */
class UploadImageBehavior extends \yii\base\Behavior
{
    const IMG_PATH = 'images';
    /**
     * @var UploadedFile
     */
    public $imageFile;
    public $fileNameField;
    public $ownerIdField = 'advert_id';
    public $catalog;

    protected $_ownerId;
    protected $_path;
    protected $_serverPath;
    protected $_oldFileName;

    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_VALIDATE => 'beforeValidate',
            ActiveRecord::EVENT_AFTER_INSERT    => 'afterInsert',
            ActiveRecord::EVENT_BEFORE_UPDATE   => 'beforeUpdate',
            ActiveRecord::EVENT_AFTER_UPDATE    => 'afterUpdate',
            ActiveRecord::EVENT_BEFORE_DELETE   => 'beforeDelete',
        ];
    }

    public function init()
    {
        parent::init();

        $this->_path = '/' . self::IMG_PATH . '/' . $this->catalog;
        $this->_serverPath = Yii::getAlias('@app/web');
    }

    public function attach($owner)
    {
        parent::attach($owner);

        $validator = Validator::createValidator('file', $owner, ['imageFile'], ['skipOnEmpty' => true, 'extensions' => 'png, jpg']);
        $owner->validators[] = $validator;
    }

    public function beforeValidate()
    {
        $this->imageFile = UploadedFile::getInstance($this->owner, 'imageFile');
    }

    public function afterInsert()
    {
        if ($this->imageFile != null) {
            if ($this->upload()) {
                $this->owner->save(false);
            }
        }
    }

    public function beforeUpdate()
    {
        $this->_oldFileName = $this->owner->getOldAttribute($this->fileNameField);
    }

    public function afterUpdate()
    {
        if ($this->imageFile != null) {
            $this->removeOldImage();
            if ($this->upload()) {
                $this->owner->save(false);
            };
        }
    }

    public function beforeDelete()
    {
        return $this->removeOldImage();
    }

    protected function createFileName()
    {
        $id = $this->owner->id;

        $fileName = mb_strtolower($this->catalog . '_' . $id . '_' . time());

        $this->owner->{$this->fileNameField} = $fileName . '.' . $this->imageFile->extension;

        return $this->owner->{$this->fileNameField};
    }

    protected function createPathImg()
    {
        $pathBeforeImage = $this->_serverPath . $this->getPathImg();

        FileHelper::createDirectory($pathBeforeImage);

        return $pathBeforeImage;
    }

    public function getPathImg()
    {
        return $this->_path . '/';
    }

    public function getUrl()
    {
        return $this->getPathImg() . $this->owner->{$this->fileNameField};
    }

    public function upload()
    {
        return $this->imageFile->saveAs($this->createPathImg() . $this->createFileName());
    }

    public function removeOldImage()
    {
        if ($this->_oldFileName === null) {
            return true;
        }

        if (file_exists($this->_serverPath . $this->getPathImg() . $this->_oldFileName)) {
            return unlink($this->_serverPath . $this->getPathImg() . $this->_oldFileName);
        }

        return false;
    }

    public function getMainImageUrl()
    {
        if ($this->owner->{$this->fileNameField}) {
            return $this->_path . '/' . $this->owner->{$this->fileNameField};
        }
    }

}