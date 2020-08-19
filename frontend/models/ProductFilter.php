<?php
namespace frontend\models;


use common\models\Product;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class ProductFilter extends Model{
    public $price_min;
    public $price_max;

    public function rules()
    {
        return [
          [['price_min', 'price_max'], 'string'],
          ['value', 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params, $category_id){
        $query = Product::find();
        $query->innerJoin('product_to_params', 'product.id = product_to_params.product_id');
//        $query->innerJoin('product_to_params', 'product_to_params.product_params_value_id = product_params_value.id');
        $query->innerJoin('product_params_value', 'product_to_params.product_params_value_id = product_params_value.id');
        $query->innerJoin('product_params_value_translate', 'product_params_value.id = product_params_value_translate.product_params_value_id');
        $query->andFilterWhere(['product.category_id' => $category_id]);
        $query->andFilterWhere(['product.status' => true]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $this->load($params);
        if (!$this->validate()){
            return $dataProvider;
        }
        if (count($params) > 1){
            $query->andFilterWhere(['>=', 'price', $this->price_min]);
            $query->andFilterWhere(['<=', 'price', $this->price_max]);
            if (isset($params['ProductFilter']['params_value'])){
                $paramsValue = $params['ProductFilter']['params_value'];
                foreach ($paramsValue as $key => $value){
                    foreach ($value as $val) {
                        $query->andFilterWhere(['product_params_value_translate.product_params_value_id' => $val]);
                    }
                }
            }
        }
        $query->orderBy('created_at DESC');
        $query->orderBy('out_of_stock ASC');
        return $dataProvider;
    }
}

?>