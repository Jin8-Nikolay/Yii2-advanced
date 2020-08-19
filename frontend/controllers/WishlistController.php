<?php
namespace frontend\controllers;

use common\models\Product;

use frontend\models\Wishlist;

use Yii;
use yii\web\Controller;
class WishlistController extends Controller{

    public function actionIndex(){
        $wishlist = new Wishlist;
        $productInWishlist = $wishlist->getWishlist();
        if (is_array($productInWishlist)) {
            $wishlistProducts = array_keys($wishlist->getWishlist());
            $products = implode(',', $wishlistProducts);
            $product = new Product();
            $productList = $product->getCartProducts($products);
        }
        return $this->render('index', compact('productList'));
    }

    public function actionAdd($id)
    {
        if (Yii::$app->request->isPost) {
            Wishlist::add($id);
            return $this->goBack(Yii::$app->request->referrer);
        } else {
            Wishlist::add($id);
            return $this->goBack(Yii::$app->request->referrer);
        }
    }

    public function actionDelete($id)
    {
        if (Yii::$app->request->isPost) {
            Wishlist::delete($id);
            return $this->goBack(Yii::$app->request->referrer);
        } else {
            Wishlist::delete($id);
            return $this->goBack(Yii::$app->request->referrer);
        }
    }
}