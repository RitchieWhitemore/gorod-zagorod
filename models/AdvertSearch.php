<?php


namespace app\models;


use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * AdvertSearch represents the model behind the search form of `app\models\Advert`.
 */
class AdvertSearch extends Advert
{
    public $location;
    public $minArea;
    public $maxArea;
    public $minPrice;
    public $maxPrice;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'type_advert_id', 'property_id', 'price', 'status', 'minArea', 'maxArea', 'minPrice', 'maxPrice'], 'integer'],
            [['location'], 'string'],
            [['description', 'location_id'], 'safe'],
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
        $query = Advert::find()->joinWith(['location', 'characteristicValues char' => function($query) {
            $query->onCondition(['char.characteristic_id' => 1]);
        }]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query->active(),
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
            'type_advert_id' => $this->type_advert_id,
            'property_id'    => $this->property_id,
            'location.name'  => $this->location,
            'status'         => $this->status,
        ]);

        $query->andFilterWhere(['>=', 'char.value', $this->minArea]);
        $query->andFilterWhere(['<=', 'char.value', $this->maxArea]);

        $query->andFilterWhere(['>=', 'price', $this->minPrice]);
        $query->andFilterWhere(['<=', 'price', $this->maxPrice]);

        $query->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
