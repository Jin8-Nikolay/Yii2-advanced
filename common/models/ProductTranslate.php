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
            'product_id' => Yii::t('backend', 'ID Товара'),
            'language' => Yii::t('backend', 'Язык'),
            'meta_title' => Yii::t('backend', 'Мета Название'),
            'meta_description' => Yii::t('backend', 'Мета Описание'),
            'header' => Yii::t('backend', 'Заголовок'),
            'content' => Yii::t('backend', 'Содержание'),
            'short_content' => Yii::t('backend', 'Краткое содержание'),
        ];
    }

    public function getProduct(){
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
