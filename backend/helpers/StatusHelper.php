<?php
namespace backend\helpers;
use phpDocumentor\Reflection\Types\Self_;
use Yii;
class StatusHelper{
    public static $active = 1;
    public static $draft = 0;
    public static $admin = 10;
    public static $manager = 5;
    public static $user = 1;
    public static function statusList(){
        return [
            self::$active => Yii::t('admin', 'Активный'),
            self::$draft => Yii::t('admin', 'Черновой вариант'),
        ];
    }
    public static function roleUser(){
        return [
            self::$user =>Yii::t('admin', 'Пользователь'),
            self::$manager =>Yii::t('admin', 'Менеджер'),
            self::$admin =>Yii::t('admin', 'Админ'),
        ];
    }
}