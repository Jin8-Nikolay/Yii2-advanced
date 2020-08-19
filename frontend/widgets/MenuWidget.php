<?php

namespace frontend\widgets;
use common\models\Category;
use common\models\MainCategory;
use common\models\Product;
use yii\base\Widget;
use yii\data\ActiveDataProvider;

class MenuWidget extends Widget
{
    public $id;

    public function run(){
        $category =  new ActiveDataProvider([
            'query' => Category::find()->where(['main_category_id' => $this->id])->andWhere(['status' => true])->orderBy('created_at DESC'),
            'pagination' => false,
        ]);

        return $this->render('list-view-menu', ['category' => $category]);
    }

}