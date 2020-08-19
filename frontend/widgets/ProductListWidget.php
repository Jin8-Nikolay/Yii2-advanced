<?php

namespace frontend\widgets;
use common\models\Product;
use yii\base\Widget;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;

class ProductListWidget extends Widget
{
    public $id;
    public $dataProvider;
    public $query;

    public function run(){
            $query = Product::find()->where(['category_id' => $this->id])->andWhere(['status' => true]);
            $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 5]);

            return $this->render('list-view-productList',  ['dataProvider' => $this->dataProvider, 'pages' => $pages]);

    }

}