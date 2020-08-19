<?php

namespace frontend\widgets;
use common\models\AdditionalInformation;
use common\models\Category;
use common\models\MainCategory;
use common\models\Product;
use yii\base\Widget;
use yii\data\ActiveDataProvider;

class AdditionalInformationWidget extends Widget
{
    public $id;

    public function run(){
        $addIn =  new ActiveDataProvider([
            'query' => AdditionalInformation::find()->where(['product_id' => $this->id])->andWhere(['status' => true]),
            'pagination' => false,
        ]);

        return $this->render('list-view-AdditionalInformation', ['addIn' => $addIn]);
    }

}