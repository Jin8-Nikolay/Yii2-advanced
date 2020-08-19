<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Order;

/**
 * OrderSearch represents the model behind the search form of `common\models\Order`.
 */
class OrderSearch extends Order
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'count', 'status', 'delivery_id', 'payment_id'], 'integer'],
            [['name', 'surname', 'patronymic', 'phone', 'email', 'content', 'ip', 'system_info', 'hash'], 'safe'],
            [['total'], 'number'],
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
        $query = Order::find();

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
            'user_id' => $this->user_id,
            'total' => $this->total,
            'count' => $this->count,
            'status' => $this->status,
            'delivery_id' => $this->delivery_id,
            'payment_id' => $this->payment_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'patronymic', $this->patronymic])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'ip', $this->ip])
            ->andFilterWhere(['like', 'system_info', $this->system_info])
            ->andFilterWhere(['like', 'hash', $this->hash]);

        return $dataProvider;
    }
}
