<?php

namespace common\models;

use Yii;


class ProductToParams extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'product_to_params';
    }


    public function rules()
    {
        return [
            [['product_params_value_id', 'product_id'], 'required'],
            [['product_params_value_id', 'product_id'], 'integer'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'product_params_value_id' => Yii::t('backend', 'Идентификатор значения параметров продукта'),
            'product_id' => Yii::t('backend', 'Код товара'),
        ];
    }

    public static function countProduct($params_id){
        return self::find()->where(['product_params_value_id' => $params_id])->count();
    }
}
