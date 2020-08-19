<?php
namespace frontend\controllers;

use common\models\Category;
use common\models\MainCategory;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\HttpException;

class MainCategoryController extends Controller
{
    public function actionView($slug)
    {
        $model = $this->findModel($slug);

        $category =  new ActiveDataProvider([
            'query' => Category::find()->where(['main_category_id' => $model->id])->andWhere(['status' => true])->orderBy('created_at DESC'),
            'pagination' => [
                'pageSize' => 12,
            ],
        ]);
        return $this->render('view', (['category' => $category, 'model' => $model]));
    }
    public function findModel($slug)
    {
        if (($model = MainCategory::findOne(['alias' => $slug, 'status' => true])) !== null){
            return $model;
        }
        throw new HttpException(404,'Main Category Not Found');
    }
}