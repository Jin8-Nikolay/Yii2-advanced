<?php

namespace common\models;

use Yii;


class Discount extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'discount';
    }


    public function rules()
    {
        return [
            [['title', 'value'], 'required'],
            [['value'], 'number'],
            [['title'], 'string', 'max' => 255],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'title' => Yii::t('backend', 'Заглавие'),
            'value' => Yii::t('backend', 'Стоимость'),
        ];
    }

    public function getProduct(){
        return $this->hasMany(Product::className(), ['discount_id' => 'id']);
    }
}
