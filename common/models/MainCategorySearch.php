<?php

namespace common\models;

use common\models\MainCategory;
use yii\base\Model;
use yii\data\ActiveDataProvider;


class MainCategorySearch extends MainCategory
{

    public function rules()
    {
        return [
            [['id', 'status', 'index'], 'integer'],
        ];
    }


    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }


    public function search($params)
    {
        $query = MainCategory::find();

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
            'index' => $this->index,
        ]);

        return $dataProvider;
    }
}
