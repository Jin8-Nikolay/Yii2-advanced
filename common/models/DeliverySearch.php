<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Delivery;

/**
 * DeliverySearch represents the model behind the search form of `common\models\Delivery`.
 */
class DeliverySearch extends Delivery
{

    public function rules()
    {
        return [
            [['id', 'status', 'pos'], 'integer'],
        ];
    }


    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }


    public function search($params)
    {
        $query = Delivery::find();

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
            'id' => $this->id,
            'status' => $this->status,
            'pos' => $this->pos,
        ]);

        return $dataProvider;
    }
}
