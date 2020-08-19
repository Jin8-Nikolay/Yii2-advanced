<?php

namespace frontend\widgets;
use common\models\HomeBanner;
use common\models\Product;
use yii\base\Widget;
use yii\data\ActiveDataProvider;

class BannerWidget extends Widget
{
    public function run(){
        $banners =  new ActiveDataProvider([
            'query' => HomeBanner::find()->where(['status' => true])->orderBy('pos ASC'),
            'pagination' => false,
        ]);

        return $this->render('list-view-banner', ['banners' => $banners]);
    }

}