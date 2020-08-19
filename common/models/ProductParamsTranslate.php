<?php

namespace common\models;

use Yii;


class ProductParamsTranslate extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'product_params_translate';
    }


    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'product_params_id' => Yii::t('backend', 'Идентификатор параметров продукта'),
            'language' => Yii::t('backend', 'Язык'),
            'name' => Yii::t('backend', 'Имя'),
        ];
    }

    public function getProductParams(){
        return $this->hasOne(ProductParams::className(), ['id' => 'product_params_id']);
    }
}
