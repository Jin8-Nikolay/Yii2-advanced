<?php

namespace common\models;

use Yii;


class ProductTranslate extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'product_translate';
    }


    public function rules()
    {
        return [
            [['meta_title', 'header'], 'required'],
            [['meta_description', 'content', 'short_content'], 'string'],
            [['meta_title', 'header'], 'string', 'max' => 255],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'product_id' => Yii::t('backend', 'Product ID'),
            'language' => Yii::t('backend', 'Language'),
            'meta_title' => Yii::t('backend', 'Meta Title'),
            'meta_description' => Yii::t('backend', 'Meta Description'),
            'header' => Yii::t('backend', 'Header'),
            'content' => Yii::t('backend', 'Content'),
            'short_content' => Yii::t('backend', 'Short Content'),
        ];
    }

    public function getProduct(){
        return $this->hasMany(Product::className(), ['id' => 'product_id']);
    }
}
