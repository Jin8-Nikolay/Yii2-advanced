<?php

namespace common\models;

use Yii;


class ProductParamsValueTranslate extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'product_params_value_translate';
    }


    public function rules()
    {
        return [
            [['value'], 'required'],
            [['value'], 'string', 'max' => 255],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'product_params_value_id' => Yii::t('backend', 'Идентификатор значения параметров продукта'),
            'language' => Yii::t('backend', 'Язык'),
            'value' => Yii::t('backend', 'Значение'),
        ];
    }

    public function getProductParamsValue(){
        return $this->hasMany(ProductParamsValue::className(), ['id' => 'product_params_value_id']);
    }
}
