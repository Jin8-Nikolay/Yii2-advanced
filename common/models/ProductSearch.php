<?php

namespace common\models;

use common\models\Product;
use yii\base\Model;
use yii\data\ActiveDataProvider;



class ProductSearch extends Product
{
    public $header;
    public $short_content;

    public function rules()
    {
        return [
            [['id', 'category_id', 'created_at', 'updated_at', 'status'], 'integer'],
            [['price'], 'number'],
            [['image'], 'safe'],
            [['header', 'short_content'], 'string']
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Product::find();
        $query->groupBy('id');
        $query->joinWith('translations');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['header'] = [
            'asc' => [ProductTranslate::tableName() . '.header' => SORT_ASC],
            'desc' => [ProductTranslate::tableName() . '.header' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['short_content'] = [
            'asc' => [ProductTranslate::tableName() . '.short_content' => SORT_ASC],
            'desc' => [ProductTranslate::tableName() . '.short_content' => SORT_DESC],
        ];




        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions


        $query->andFilterWhere([
            'id' => $this->id,
            'category_id' => $this->category_id,
            'price' => $this->price,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'image', $this->image]);

        $query->andFilterWhere(['like', ProductTranslate::tableName() . '.header', $this->header]);

        $query->andFilterWhere(['like', ProductTranslate::tableName() . '.short_content', $this->short_content]);

        return $dataProvider;
    }
}
