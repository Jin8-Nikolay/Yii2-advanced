<?php
namespace frontend\models;
use Yii;
class Wishlist{
    public static function add($id){
        $id = (int)$id;
        $productInWishlist = [];
        if (isset($_SESSION['wishlist'])){
            $productInWishlist = $_SESSION['wishlist'];
        }
        if (array_key_exists($id, $productInWishlist)){
            $productInWishlist[$id] = 1;
        }
        else{
            $productInWishlist[$id] = 1;
        }
        $_SESSION['wishlist'] = $productInWishlist;
    }

    public static function getWishlist(){
        if (isset($_SESSION['wishlist'])){
            if (is_array($_SESSION['wishlist'])){
                if (count($_SESSION['wishlist']) > 0){
                    return $_SESSION['wishlist'];
                }
            }
        }
        return false;
    }

    public static function delete($id){
        $id = (int)$id;
        $productInWishlist = [];
        if (isset($_SESSION['wishlist'])){
            $productInWishlist = $_SESSION['wishlist'];
            if (isset($productInWishlist[$id])){
                unset($productInWishlist[$id]);
                $_SESSION['wishlist'] = $productInWishlist;
            }
        }
    }

    public static function clear(){
        if (is_array($_SESSION['wishlist'])){
            unset($_SESSION['wishlist']);
        }
    }

    public static function countWishlist(){
        $count = 0;
        if (isset($_SESSION['wishlist'])){
            if (is_array($_SESSION['wishlist'])){
                foreach ($_SESSION['wishlist'] as $item) {
                    $count += $item;
                }
            }
        }
        return $count;
    }

}