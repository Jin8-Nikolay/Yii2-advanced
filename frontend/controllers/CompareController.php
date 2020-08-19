<?php
namespace frontend\controllers;

use common\models\Product;

use frontend\models\Compare;

use Yii;
use yii\web\Controller;
class CompareController extends Controller{

    public function actionIndex(){
        $compare = new Compare;
        $productInCompare = $compare->getCompare();
        if (is_array($productInCompare)) {
            $compareProducts = array_keys($compare->getCompare());
            $products = implode(',', $compareProducts);
            $product = new Product();
            $productList = $product->getCartProducts($products);
        }
        Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => 'Description of the page...'
        ]);
        return $this->render('index', compact('productList'));
    }

    public function actionAdd($id)
    {
        if (Yii::$app->request->isPost) {
            Compare::add($id);
            return $this->goBack(Yii::$app->request->referrer);
        } else {
            Compare::add($id);
            return $this->goBack(Yii::$app->request->referrer);
        }
    }

    public function actionDelete($id)
    {
        if (Yii::$app->request->isPost) {
            Compare::delete($id);
            return $this->goBack(Yii::$app->request->referrer);
        } else {
            Compare::delete($id);
            return $this->goBack(Yii::$app->request->referrer);
        }
    }
}