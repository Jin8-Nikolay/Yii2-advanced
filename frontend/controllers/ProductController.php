<?php
namespace frontend\controllers;

use common\models\Category;
use common\models\MainCategory;
use common\models\Product;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\HttpException;

class ProductController extends Controller
{


    public function actionView($slug)
    {
        $model = $this->findModel($slug);
        return $this->render('view', (['model' => $model]));
    }

    public function findModel($slug)
    {
        if (($model = Product::findOne(['id' => $slug, 'status' => true])) !== null){
            return $model;
        }
        throw new HttpException(404,''.Yii::t('frontend', 'Товар не найден').'');
    }


}