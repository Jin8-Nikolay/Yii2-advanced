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
            [['category_id', 'status'], 'integer'],
            [['price'], 'number'],
            [['image'], 'string'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'category_id' => Yii::t('backend', 'Category ID'),
            'price' => Yii::t('backend', 'Price'),
            'created_at' => Yii::t('backend', 'Created At'),
            'updated_at' => Yii::t('backend', 'Updated At'),
            'status' => Yii::t('backend', 'Status'),
            'image' => Yii::t('backend', 'Image'),
        ];
    }

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
}
