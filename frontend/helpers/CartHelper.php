<?php

namespace frontend\helpers;

use common\models\Product;
use Yii;
use frontend\models\Cart;

class CartHelper
{
    public static $statusNew = 1;

    public static function getTotal()
    {
        $cart = new Cart;
        $total = 0;
        $productsInCart = $cart->getProducts();
        if (is_array($productsInCart)) {
            $cartProducts = array_keys($cart->getProducts());
            $products = implode(',', $cartProducts);
            $product = new Product();
            $productList = $product->getCartProducts($products);
            foreach ($productList as $product) {
                if ($product->discount !== 0){
                    $total += $productsInCart[$product->id] * ($product->price - $product->price * $product->discount->value);
                }
                else{
                    $total += $productsInCart[$product->id] * $product->price;
                }
            }
        }
        return $total;
    }
}

?>