<?php


namespace app\models\query;


use app\models\Advert;
use yii\db\ActiveQuery;

class AdvertQuery extends ActiveQuery
{
    public function active()
    {
        return $this->andWhere(['status' => Advert::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     * @return \app\models\Advert[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }
    /**
     * @inheritdoc
     * @return \app\models\Advert|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}