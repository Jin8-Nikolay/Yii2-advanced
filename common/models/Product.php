<?php

namespace common\models;

use creocoder\translateable\TranslateableBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;


class Product extends \yii\db\ActiveRecord
{
    public static $statusActive = 1;

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            'translate' => [
                'class' => TranslateableBehavior::className(),
                'translationAttributes' => ['meta_title', 'meta_description', 'header', 'content', 'short_content',]
            ]
        ];
    }

    public static function tableName()
    {
        return 'product';
    }


    public function rules()
    {
        return [
            [['category_id', 'price', 'status'], 'required'],
            [['category_id', 'status', 'is_recommend', 'is_new', 'discount_id', 'bestseller', 'out_of_stock'], 'integer'],
            [['price'], 'number'],
            [['image', 'header', 'short_content'], 'string'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'category_id' => Yii::t('backend', 'ID Категории'),
            'price' => Yii::t('backend', 'Цена'),
            'created_at' => Yii::t('backend', 'Создано'),
            'updated_at' => Yii::t('backend', 'Обновлен'),
            'status' => Yii::t('backend', 'Положение'),
            'image' => Yii::t('backend', 'Фото'),
            'is_recommend' => Yii::t('backend', 'Рекомендуемый'),
            'is_new' => Yii::t('backend', 'Новый'),
            'discount_id' => Yii::t('backend', 'Скидка'),
            'bestseller' => Yii::t('backend', 'Бестселлер'),
            'out_of_stock' => Yii::t('backend', 'Распродано'),
        ];
    }

    public function getCartProducts($ids){
        if ($ids) {
            return self::find()->where('id IN(' . $ids . ')')->all();
        }
    }

//    public function getCartProduct($id){
//        if ($id) {
//            return self::find()->where(['id' => $id])->one();
//        }
//    }

    public static function findActive()
    {
        return self::find()->where(['status' => self::$statusActive])->all();
    }

    public static function findCategory($id){
        return self::find()->where(['category_id' => $id]);
    }

    public function getTranslations()
    {
        return $this->hasMany(ProductTranslate::className(), ['product_id' => 'id']);
    }

    public function getCategory(){
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function getDiscount(){
        return $this->hasOne(Discount::className(), ['id' => 'discount_id']);
    }

    public function getImage($image)
    {
        return ($image) ? '/upload/' . $image : '/no-image.png';
    }

    public function getImages($images){
        $image = explode(" ", $images);
        return $image;
    }

    public static function minPrice($category_id){
        return self::find()->where(['status'=> true])
            ->andWhere(['category_id' => $category_id])->min('price');
    }
    public static function maxPrice($category_id){
        return self::find()->where(['status'=> true])
            ->andWhere(['category_id' => $category_id])->max('price');
    }
}
