<?php
namespace frontend\models;
use Yii;
class Compare{
    public static function add($id){
        $id = (int)$id;
        $productInCompare = [];
        if (isset($_SESSION['compare'])){
            $productInCompare = $_SESSION['compare'];
        }
        if (array_key_exists($id, $productInCompare)){
            $productInCompare[$id] = 1;
        }
        else{
            $productInCompare[$id] = 1;
        }
        $_SESSION['compare'] = $productInCompare;
    }

    public static function getCompare(){
        if (isset($_SESSION['compare'])){
            if (is_array($_SESSION['compare'])){
                if (count($_SESSION['compare']) > 0){
                    return $_SESSION['compare'];
                }
            }
        }
        return false;
    }

    public static function delete($id){
        $id = (int)$id;
        $productInCompare = [];
        if (isset($_SESSION['compare'])){
            $productInCompare = $_SESSION['compare'];
            if (isset($productInCompare[$id])){
                unset($productInCompare[$id]);
                $_SESSION['compare'] = $productInCompare;
            }
        }
    }

    public static function clear(){
        if (is_array($_SESSION['compare'])){
            unset($_SESSION['compare']);
        }
    }

    public static function countCompare(){
        $count = 0;
        if (isset($_SESSION['compare'])){
            if (is_array($_SESSION['compare'])){
                foreach ($_SESSION['compare'] as $item) {
                    $count += $item;
                }
            }
        }
        return $count;
    }

}