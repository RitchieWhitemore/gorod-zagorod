<?php

namespace app\controllers;

use app\models\Advert;
use app\models\Location;
use app\models\Property;
use app\models\TypeAdvert;
use Yii;
use yii\data\ActiveDataProvider;

class AdvertsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $request = Yii::$app->request;

        $params = $request->queryParams;

        $requestString = '';

        $query =  Advert::find()->joinWith('location');

        if ($request->get('type-advert')) {
            $query->andWhere(['type_advert_id' => $request->get('type-advert')]);

            $typeAdvert = TypeAdvert::findOne($request->get('type-advert'));

            if ($typeAdvert) {
                $requestString .= $typeAdvert->name;
            }
        }

        if ($request->get('property')) {
            $query->andWhere(['property_id' => $request->get('property')]);

            $property = Property::findOne($request->get('property'));

            if ($property) {
                $requestString .= ' ' . $property->name;
            }
        }

        if ($request->get('location')) {
            $query->andWhere(['like', 'location.name', $request->get('location')]);

            $location = Location::findOne(['name' => $request->get('location')]);

            if ($location) {
                $requestString .= ' в ' . $location->name_where;
            }
        }

        if ($request->get('size-page')) {
            $pageSize = $request->get('size-page');
        } else {
            $pageSize = 1;
        }

        $model = new ActiveDataProvider([
           'query' => $query,
           'pagination' => ['pageSize' => $pageSize],
           'sort' => [
               'defaultOrder' => [
                   'id' => SORT_DESC,
               ]
           ]
        ]);
        return $this->render('index', ['model' => $model, 'requestString' => $requestString]);
    }

    public function actionView($id)
    {
        return $this->render('view');
    }

}
