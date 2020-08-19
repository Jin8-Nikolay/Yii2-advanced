<?php
namespace frontend\controllers;

use common\models\Category;
use common\models\MainCategory;
use common\models\Product;
use common\models\ProductParams;
use frontend\models\ProductFilter;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\HttpException;

class CategoryController extends Controller
{
    public function actionView($slug)
    {
        $model = $this->findModel($slug);
        $modelFilter = new ProductFilter();
        $dataProvider = $modelFilter->search(Yii::$app->request->queryParams, $model->id);
        $minPrice = Product::minPrice($model->id);
        $maxPrice = Product::maxPrice($model->id);
        $params = ProductParams::findActiveByCategory($model->id);
        return $this->render('view', compact('model', 'modelFilter', 'dataProvider', 'maxPrice', 'minPrice', 'params'));
    }

    public function findModel($slug)
    {
        if (($model = Category::findOne(['alias' => $slug, 'status' => true])) !== null){
            return $model;
        }
        throw new HttpException(404,'Category Not Found');
    }
}