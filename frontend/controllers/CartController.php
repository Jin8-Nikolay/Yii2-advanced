<?php

namespace frontend\controllers;

use common\models\Order;
use common\models\OrderItem;
use frontend\helpers\CartHelper;
use frontend\helpers\UserHelper;
use frontend\models\Cart;
use frontend\models\UserToOrder;

use common\models\Delivery;
use common\models\Payment;
use common\models\Product;
use common\models\User;

use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\HttpException;

class CartController extends Controller
{
    public function actionIndex()
    {
        $productList = [];
        $cart = new Cart;
        $total = CartHelper::getTotal();
        $productInCart = $cart->getProducts();
        if (is_array($productInCart)) {
            $cartProducts = array_keys($cart->getProducts());
            $products = implode(',', $cartProducts);
            $product = new Product();
            $productList = $product->getCartProducts($products);
        }
        Yii::$app->view->registerMetaTag([
            'name' => 'Cart',
        ]);
        return $this->render('index', [
            'products' => $productList,
            'productInCart' => $productInCart,
            'total' => $total
        ]);

    }

    public function actionCheckout()
    {
        $total = CartHelper::getTotal();
        $productList = [];
        $model = new Order;
        $cart = new Cart;
        $orderItem = new OrderItem;
        $userOrderModel = new UserToOrder;
        $productInCart = $cart->getProducts();
        $deliveryList = Delivery::getActive();
        $paymentList = Payment::getActive();
        if (is_array($productInCart)) {
            $cartProducts = array_keys($cart->getProducts());
            $products = implode(',', $cartProducts);
            $product = new Product();
            $productList = $product->getCartProducts($products);
        }
        if ($model->load(Yii::$app->request->post())) {
            $model->add();
            $order = $model->getOrder();
            $orderId = $order->id;
            if (!Yii::$app->user->isGuest) {
                $userOrderModel->add(Yii::$app->user->id, $orderId);
            }
            if (is_array($productInCart)) {
                $cartProducts = array_keys($cart->getProducts());
                $products = implode(',', $cartProducts);
                $product = new Product();
                $productList = $product->getCartProducts($products);
                foreach ($productList as $product) {
                    $count = $productInCart[$product->id];
                    $total = $count * $product->price;
                    $orderItem->add($product, $orderId, $count, $total);
                }
                Cart::clear();
            }
            return $this->redirect(Url::to(['/']));
        }
        Yii::$app->view->registerMetaTag([
            'name' => 'Checkout',
        ]);
        if (!Yii::$app->user->isGuest) {
            $user = $this->findUser();
            return $this->render('checkout-auth', compact('model', 'deliveryList', 'paymentList', 'user', 'productList' , 'productInCart', 'total'));
        } else {
            return $this->render('checkout', compact('model', 'deliveryList', 'paymentList', 'productList', 'productInCart' , 'total'));
        }
    }


    public function actionSuccess($id)
    {
        $model = Order::findOne($id);
        if (!$model) {
            throw  new HttpException(404, Yii::t('frontend', 'Order Not Found'));
        }
        return $this->render('success', ['model' => $model]);
    }

    public function actionAdd($id)
    {
        if (Yii::$app->request->isPost) {
            Cart::add($id);
            return $this->goBack(Yii::$app->request->referrer);
        } else {
            Cart::add($id);
            return $this->goBack(Yii::$app->request->referrer);
        }
    }

    public function actionRemove($id)
    {
        if (Yii::$app->request->isPost) {
            Cart::remove($id);
            return $this->goBack(Yii::$app->request->referrer);
        } else {
            Cart::remove($id);
            return $this->goBack(Yii::$app->request->referrer);
        }
    }

    public function actionDelete($id)
    {
        if (Yii::$app->request->isPost) {
            Cart::delete($id);
            return $this->goBack(Yii::$app->request->referrer);
        } else {
            Cart::delete($id);
            return $this->goBack(Yii::$app->request->referrer);
        }
    }

    public function actionClear()
    {
        if (Yii::$app->request->isPost) {
            Cart::clear();
            return $this->goBack(Yii::$app->request->referrer);
        } else {
            Cart::clear();
            return $this->goBack(Yii::$app->request->referrer);
        }
    }

    protected function findUser()
    {
        return User::findOne(Yii::$app->user->id);
    }
}

?>