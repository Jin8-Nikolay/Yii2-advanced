<?php
namespace frontend\models;
use Yii;
class Cart{

    public static function add($id){
        $id = (int)$id;
        $productInCart = [];
        if (isset($_SESSION['products'])){
            $productInCart = $_SESSION['products'];
        }
        if (array_key_exists($id, $productInCart)){
            $productInCart[$id]++;
        }
        else{
            $productInCart[$id] = 1;
        }
        $_SESSION['products'] = $productInCart;
    }

    public static function remove($id){
        $id = (int)$id;
        $productInCart = [];
        if (isset($_SESSION['products'])){
            $productInCart = $_SESSION['products'];
        }
        if (array_key_exists($id, $productInCart)){
            if ($productInCart[$id] > 1){
                $productInCart[$id]--;
            }
            else{
                unset($productInCart[$id]);
            }
        }
        $_SESSION['products'] = $productInCart;
    }

    public static function getProducts(){
        if (isset($_SESSION['products'])){
            if (is_array($_SESSION['products'])){
                if (count($_SESSION['products']) > 0){
                    return $_SESSION['products'];
                }
            }
        }
        return false;
    }

    public static function clear(){
        if (is_array($_SESSION['products'])){
            unset($_SESSION['products']);
        }
    }

    public static function countProducts(){
        $count = 0;
        if (isset($_SESSION['products'])){
            if (is_array($_SESSION['products'])){
                foreach ($_SESSION['products'] as $item) {
                    $count+=$item;
                }
            }
        }
        return $count;
    }

    public static function delete($id){
        $id = (int)$id;
        $productInCart = [];
        if (isset($_SESSION['products'])){
            $productInCart = $_SESSION['products'];
            if (isset($productInCart[$id])){
                unset($productInCart[$id]);
                $_SESSION['products'] = $productInCart;
            }
        }
    }
}