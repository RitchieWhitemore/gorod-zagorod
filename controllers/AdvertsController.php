<?php

namespace app\controllers;

use app\models\Advert;
use app\models\Location;
use app\models\Property;
use app\models\TypeAdvert;
use app\models\AdvertSearch;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;

class AdvertsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $request = Yii::$app->request;

        $searchModel = new AdvertSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $requestString = $this->getRequestString();

        if ($request->get('page-size')) {
            $dataProvider->pagination->pageSize = $request->get('page-size');
        } else {
            $dataProvider->pagination->pageSize = 15;
        }

        $dataProvider->sort->defaultOrder['id'] = SORT_DESC;
        if ($request->get('sort')) {
            $sortParam = $request->get('sort');
            if ($sortParam == 'asc') {
                $dataProvider->sort->defaultOrder['id'] = SORT_ASC;
            }
        }

        return $this->render('index', ['model' => $dataProvider, 'requestString' => $requestString]);
    }

    public function actionView($id)
    {
        $model = Advert::find()->where(['id' => $id])->active()->one();

        if (!$model) {
            throw new NotFoundHttpException();
        }

        return $this->render('view', compact('model'));
    }

    private function getRequestString()
    {

        $requestString = '';

        $queryParams = Yii::$app->request->queryParams;


        $typeAdvert = TypeAdvert::findOne(ArrayHelper::getValue($queryParams, 'AdvertSearch.type_advert_id'));

        if ($typeAdvert) {
            $requestString .= $typeAdvert->name;
        } else {
            $requestString .= 'Купить';
        }

        $property = Property::findOne(ArrayHelper::getValue($queryParams, 'AdvertSearch.property_id'));

        if ($property) {
            $requestString .= ' ' . $property->name;
        }

        $location = Location::findOne(['name' => ArrayHelper::getValue($queryParams, 'AdvertSearch.location')]);

        if ($location) {
            $requestString .= ' в ' . $location->name_where;
        }


        return $requestString;
    }

}
