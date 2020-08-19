<?php

namespace common\models;

use creocoder\translateable\TranslateableBehavior;
use Yii;


class HomeBanner extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            'translate' => [
                'class' => TranslateableBehavior::className(),
                'translationAttributes' => ['big_text', 'excerpt','small_text']
            ]
        ];
    }

    public static function tableName()
    {
        return 'home_banner';
    }


    public function rules()
    {
        return [
            [['status', 'product_id', 'pos'], 'required'],
            [['status', 'product_id', 'pos'], 'integer'],
            [['image'], 'string'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'status' => Yii::t('backend', 'Статус'),
            'product_id' => Yii::t('backend', 'Код товара'),
            'image' => Yii::t('backend', 'Фото'),
            'pos' => Yii::t('backend', 'Позиция'),
        ];
    }

    public function getTranslations(){
        return $this->hasMany(HomeBannerTranslate::className(),['home_banner_id' => 'id']);
    }

    public function getProduct(){
        return $this->hasOne(Product::className(),['id' => 'product_id']);
    }

    public function getImage($image)
    {
        return ($image) ? '/upload/' . $image : '/no-image.png';
    }
}
