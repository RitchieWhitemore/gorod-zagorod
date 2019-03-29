<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Advert;

/**
 * AdvertSearch represents the model behind the search form of `app\models\Advert`.
 */
class AdvertSearch extends Advert
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'type_advert_id', 'property_id', 'location_id', 'price', 'status'], 'integer'],
            [['description', 'coordinates'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Advert::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id'             => $this->id,
            'type_advert_id' => $this->typeAdvert,
            'property_id'    => $this->property_id,
            'location_id'    => $this->location_id,
            'price'          => $this->price,
            'status'         => $this->status,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'coordinates', $this->coordinates]);

        return $dataProvider;
    }
}
